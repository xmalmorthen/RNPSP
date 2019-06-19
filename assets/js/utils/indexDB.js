var iDB = {
    version: 10,
    status : false,
    vars : {
        db : null,
        selects : $('select'),
        toPopulate : 0,
        tablesChecked : 0,
        iDBSync : null,
        tables : []
    },
    init : async function(){
        iDB.vars.db = new Dexie('SGPv' + iDB.version);

        const tablas = await iDB.actions.getTablesNames();
        iDB.actions.createIDB(tablas);

        var iDBTablesCheck = setInterval(function(){
            if (iDB.vars.tablesChecked == iDB.vars.db.tables.length || iDB.status){
                clearInterval(iDBTablesCheck);
                iDB.status = true;
            }
        }, 300);
    },
    actions : {
        getTablesNames : function(){
            return new Promise (resolve => {
                var tables = {};
                $.each( iDB.vars.selects , function( key, value ) {
                    var id = this.id;
                    tables[id] = 'id,text';                    
                });            
                resolve(tables);
            });
        },
        createIDB : function(tables){
            var dbToDelete = ['SGP'];
            for (let index = 1; index < iDB.version; index++) {
                dbToDelete.push('SGPv' + index);
            }
            $.each(dbToDelete,function(key, value) {
                var oldDB = new Dexie(value);
                oldDB.delete().then(function() {}).catch(function(err) {});
                oldDB.close();
                oldDB = null;
            });
            

            iDB.vars.db.version( iDB.version ).stores(tables);
            iDB.vars.db.open();
            iDB.vars.db.on('ready',function(){iDB.actions.populateTables()});
        },
        populateTables : function(){
            //Limpiar tablas que se generaron y hubo cambio donde actualmente no debe popularse por INDEXEDDB
            // iDB.vars.db.ID_RELACION_REFERENCIAS.clear().then(function() {});

            const tables = iDB.vars.db.tables;
            tables.forEach(function (table) {
                table.count().then(function(count){
                    iDB.vars.tables.push(table.name);
                    
                    if (count > 0) {
                        iDB.vars.tablesChecked++;
                        return null;
                    }
                    
                    iDB.actions.getDataFromBD(table).then(() =>{
                        iDB.vars.tablesChecked++;
                        iDB.vars.toPopulate--;
                        
                        $.LoadingOverlay("progress", iDB.vars.tablesChecked);
                    }).catch(function(){
                        iDB.vars.tablesChecked++;

                        $.LoadingOverlay("progress", iDB.vars.tablesChecked);
                    });
                    
                }).catch(function(err){                    
                });
            });            
        },
        getDataFromBD : function(table){
            return new Promise(function (resolve, reject) {
                var obj = $('#' + table.name);
                var factory = {
                    id : obj[0].id,
                    query : obj.data('query'),
                    params : obj.data('params'),
                    cascade : obj.data('cascade'),
                    cascadeIdRef : obj.data('cascade-id-ref')
                };

                if (factory.cascade == true) {
                    reject(null);
                } else {
                    
                    var callUrl = base_url + "ajaxCatalogos/index";
                    if (factory.query) {
                        iDB.vars.toPopulate++;
                        iDB.vars.iDBSync = setInterval(function(){iDB.actions.populatedInterval();}, 300);
                        $.get(callUrl,{
                            qry : factory.query,
                            params : factory.params
                        },
                        function (data) {
                            resolve(data);
                        }).fail(function (err) {                    
                            reject(err);
                        }).always(function () {   
                            MyCookie.session.reset();
                            //options.always();
                        });
                    } else {
                        reject(err);
                    }
                }
            }).then(function (data) {
                return iDB.vars.db.transaction('rw', table, function () {
                    data.results.forEach(function (item) {
                        table.add(item);
                    });
                });
            });
        },
        populatedInterval : function(){
            //console.log('a popular ' + iDB.vars.toPopulate);
            if (iDB.vars.toPopulate > 0) {
                $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin",text:'Actualizando catálogos',progress : true});
            } else {
                clearInterval(iDB.vars.iDBSync);
                $.LoadingOverlay("hide",true);
                iDB.vars.iDBSync = null;
                iDB.status = true;
                //console.log('Populado terminado ');
            }
        },
        populateObjectFromIDB : function(obj,options){

            var selValueInterval = [];

            iDB.vars.db.tables.forEach(function (table) {
                if (table.name == obj[0].id){
                    var data = table.count().then(function(count){
                        if (count > 0){
                            //FROM INDEXED DB
                            obj.prop("disabled", false);
                            if (options.emptyOption){
                                obj.append('<option disabled selected value>Seleccione una opción</option>');
                            }
                            obj.LoadingOverlay("hide");

                            table.each(function(data) {  
                                if (data) {
                                    obj.append('<option value=' + data.id + '>' + data.text + '</option>');
                                }
                            });

                            innerInterval = setInterval(function(){
                                if (obj.find('option:enabled').length > 0 ) {
                            
                                    //SI SE ASIGNA UN VALOR Y AUN NO ESTA POPULADO
                                    //LO OBTIENE DEL DATA [INSERT]
                                    if ( obj.data('insert') ) {                                        
                                        
                                        obj.val(obj.data('insert'));

                                        if (obj.val() == obj.data('insert') && obj.data('populated') == true) {
                                        
                                            intervalRefObj = selValueInterval.find( refInterval => refInterval.nombre == obj[0].id );
                                            clearInterval( intervalRefObj.objInterval );

                                            obj.removeData('insert');

                                            obj.trigger('change').trigger('change.select2');

                                            obj.closest('form').removeData('hasChanged')

                                            options.success(data);
                                        }
                                    }
                                    
                                }
                            }, 300);

                            selValueInterval.push({ nombre: obj[0].id, objInterval : innerInterval });
                            
                            obj.data('populated',true);

                        } else {
                            //FROM AJAX
                            obj.append('<option disabled selected value><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i> Actualizando, favor de esperar...</option>');                                
                            var callUrl = base_url + "ajaxCatalogos/index";
                            $.get(callUrl,{
                                qry : options.query,
                                params : options.params
                            },
                            function (data) {
                                if (data) {
                                    obj.find("option").remove();
                                    if (options.emptyOption){
                                        obj.append('<option disabled selected value>Seleccione una opción</option>');
                                    }
                                    if (data.results) {
                                        $.each(data.results,function(key, value) 
                                        {
                                            obj.append('<option value=' + value.id + '>' + value.text + '</option>');
                                        });
                                    }
                                }
                                obj.prop("disabled", false);
                                
                                //SI SE ASIGNA UN VALOR Y AUN NO ESTA POPULADO
                                //LO OBTIENE DEL DATA [INSERT]
                                if ( obj.data('insert') ) {

                                    obj.val(obj.data('insert'));
                                    
                                    obj.removeData('insert');

                                    obj.trigger('change').trigger('change.select2');

                                }
                                
                                obj.data('populated',true);
                                
                                options.success(data);
                            }).fail(function (err) {                    
                                obj.find("option").remove();
                                obj.setError('ERROR al actualizar');
                                options.error(err);
                            }).always(function () {
                                obj.LoadingOverlay("hide");
                                MyCookie.session.reset();
                                
                                if ( $.isFunction( options.always ) )
                                    options.always();
                            });
                        }
                    });
                }
            });

        }
    }
};

iDB.init();
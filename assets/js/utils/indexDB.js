var iDB = {
    version: 18,
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
        populateObjectFromIDB : async function(obj,options){

            $data = null;

            console.log( obj.context.name + ' iniciando populando');

            $disObj = obj.prop("disabled");
            obj.prop("disabled", true);
            obj.data('populating',true);
            obj.LoadingOverlay("show");

            obj.append('<option disabled selected value><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i> Actualizando, favor de esperar...</option>');                                    

            $_tbl = iDB.vars.db.tables.find(qry => qry.name == obj.context.name);
            $count = 0;
            if ($_tbl != null)
                $count = await $_tbl.count().then( (count) => {return count;});

            if ($count > 0) {

                obj.find("option").remove();

                if (options.emptyOption)
                    obj.append('<option disabled selected value>Seleccione una opción</option>');

                $iterFnc = ($_table, $item,$_count) => {
                    return new Promise ( resolve => {
                        $_table.each( ($row) =>{
                            $item.append('<option value=' + $row.id + '>' + $row.text + '</option>');

                            if ($item.children('option:enabled').length == $_count)
                                resolve(true);
                        });                        
                    });
                };
                
                await $iterFnc(iDB.vars.db.tables.find(qry => qry.name == obj.context.name),obj,await iDB.vars.db.tables.find(qry => qry.name == obj.context.name).count().then( (count) => {return count;}));
            } else {

                $iterFnc = function($item) {                                
                    return new Promise( (resolve) => {
                                                                                                
                        $iter = 0;
                        callUrl = base_url + "ajaxCatalogos/index";
                        $.get(callUrl,{
                            qry : options.query,
                            params : options.params
                        },
                        function (data) {
                            
                            if (data) {
                                
                                $item.find("option").remove();

                                if (options.emptyOption){
                                    $item.append('<option disabled selected value>Seleccione una opción</option>');
                                }

                                if (data.results) {
                                    $.each(data.results,function(key, value) 
                                    {
                                        $item.append('<option value=' + value.id + '>' + value.text + '</option>');
                                    });
                                }
                            }
                            
                            resolve(data);

                        }).fail(function (err) {
                            
                            $item.find("option").remove();
                            $item.setError('ERROR al actualizar');
                            options.error(err);

                        }).always(function () {
                            MyCookie.session.reset();
                        });

                    });
                };

                $data = await $iterFnc(obj);
            }

            obj.data('populated',true);
            obj.removeData('populating');

            obj.prop("disabled", $disObj);
            obj.LoadingOverlay("hide",true);

            if ( obj.data('insert') )
                obj.val(obj.data('insert'));

            options.success($data);
            
            console.log( obj.context.name + ' ok populado');

        }
    }
};

iDB.init();
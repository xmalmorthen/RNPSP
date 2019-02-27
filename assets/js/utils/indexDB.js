var iDB = {
    vars : {
        db : new Dexie('SGP'),
        selects : $('select'),
        toPopulate : 0,
        iDBSync : null
    },
    init : async function(){
        const tablas = await iDB.actions.getTablesNames();
        iDB.actions.createIDB(tablas);

        // db.version(1).stores(tables);
        // db.open();
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
            iDB.vars.db.version(1).stores(tables);
            iDB.vars.db.open();
            iDB.vars.db.on('ready',iDB.actions.populateTables);
        },
        populateTables : function(){
            const tables = iDB.vars.db.tables;
            tables.forEach(function (table) {
                table.count().then(function(count){
                    if (count > 0) return null;
                    iDB.actions.getDataFromBD(table).then(() =>{
                        iDB.vars.toPopulate--;
                        console.log('Populado tabla ' + table.name);
                    });                    
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
                        iDB.vars.iDBSync = setInterval(iDB.actions.populatedInterval, 500);

                        $.get(callUrl,{
                            qry : factory.query,
                            params : factory.params
                        },
                        function (data) {
                            resolve(data);
                        }).fail(function (err) {                    
                            reject(err);
                        });
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
            console.log('a popular ' + iDB.vars.toPopulate);
            if (iDB.vars.toPopulate > 0) {
                $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin",text:'Actualizando catálogos'});
            } else {
                clearInterval(iDB.vars.iDBSync);
                $.LoadingOverlay("hide",true);
                iDB.vars.iDBSync = null;
                console.log('Populado terminado ');
            }
        }
    }
};

iDB.init();


/*
var db = new Dexie('SGP');

var tables = {};
$.each( $('select'), function( key, value ) {
    var id = this.id;
    tables[id] = 'id,text';
});

db.version(1).stores(tables);
db.open();

var tablesInIDB = 0,
    isTablesSync = false;

db.on('ready', function () {
    //GET FROM INDEXEDDB
    db.tables.forEach(function (table) {
        return table.count().then(function(count){
                tablesInIDB ++;
                if (count == 0) {
                    
                    iDBSync = setInterval(iDBSyncFnc, 500);

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
                                $.get(callUrl,{
                                    qry : factory.query,
                                    params : factory.params
                                },
                                function (data) {
                                    resolve(data);
                                }).fail(function (err) {                    
                                    reject(err);
                                });
                            }
                        }

                    }).then(function (data) {
                        return db.transaction('rw', table, function () {
                            data.results.forEach(function (item) {
                                table.add(item);
                            });
                        });
                    });
                } else 
                    reject(null);
            }).then(function(){
                if (parseInt(tablesInIDB) == parseInt(db.tables.length)){
                    isTablesSync = true;
                }
            }).catch(function(){
                if (parseInt(tablesInIDB) == parseInt(db.tables.length)){
                    isTablesSync = true;
                }
            })
    });
});

var iDBSync = null;
function iDBSyncFnc(){
    if (!isTablesSync) {
        $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin",text:'Actualizando catálogos'});
    } else {
        $.LoadingOverlay("hide",true);
        clearInterval(iDBSync);
    }
}
*/




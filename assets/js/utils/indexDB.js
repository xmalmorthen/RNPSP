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
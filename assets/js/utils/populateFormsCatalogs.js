var populate = {
    form : function(form){
        var selects = form.find('select');
        selects.each(function() {
            var factory = {
                id : $(this)[0].id,
                query : $( this ).data('query'),
                params : $( this ).data('params'),
                cascade : $( this ).data('cascade'),
                cascadeIdRef : $( this ).data('cascade-id-ref')
            };

            if (factory.cascade == true){
                var objCascadeRef = $('#' + factory.cascadeIdRef),
                    jsonFactory = JSON.stringify(factory);

                objCascadeRef.data('factory', jsonFactory);
                objCascadeRef.on('change', populate.events.change);
            } else {
                if (factory.query) {
                    $( this ).getCatalog({
                        query : factory.query,
                        params : factory.params,
                        emptyOption : true
                    });
                }
            }
        });
    },
    events : {
        change :function(e){
            var factory = JSON.parse($(this).data('factory'));
            if (factory.query) {
                if (factory.params){
                    factory.params = factory.params.replace('{0}', $('#' + factory.cascadeIdRef).val());
                }

                $('#' + factory.id ).getCatalog({
                    query : factory.query,
                    params : factory.params,
                    emptyOption : true
                });
            }
        }
    },
    reset : function(form){
        form.trigger('reset');
        form.find('select').trigger('change'); //refrescado para selects2
        form.find('.custom-file-label').html(''); //Contenedor especial para los input file
    }
}
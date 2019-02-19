$(function () {
	//$('input').setError('asdasd');
	$("form#Usuarios_form").submit(function (e) {
		e.preventDefault();
		try {
      if($('[error=true]').length > 0){
        $('[error=true]').each(function() {
          $(this).removeError();
          $(this).attr('error',false);
        });
      }

			$.LoadingOverlay("show", {
				image: "",
				fontawesome: "fa fa-cog fa-spin"
			});
			var data_send = $('form').serialize();
			$.post(base_url + "Usuarios/guardar", data_send,
				function (data) {
					$.LoadingOverlay("hide");
					if (data.status == true) {

					} else {
            $.each(data.message, function( index, value ) {
              if($('input[name='+index+']').length > 0){
                $('input[name='+index+']').attr('error',true);
                $('input[name='+index+']').setError(value);
              }
            });
					}
				}).fail(function (err) {
				$.LoadingOverlay("hide");
				var msg = err.responseText;
				swal({
					type: 'error',
					title: 'Error',
					html: msg
				});
			});
		} catch (err) {
			$.LoadingOverlay("hide");
		}
	});
});

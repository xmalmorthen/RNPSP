var _app = Backbone.View.extend({
	formChanged : false,
	initialize: function () {
		if(id_Usuario == false){
			Swal.fire({
				type: 'error',
				title: id_UsuarioMSG,
			});
		}

		$('#pCURP').on('focusout',this.cambiaCurp);

		//Rutina para verificar si se hace algún cambio en cualquier forulario
        $('#Usuarios_form').find('input, select').change(function(e) {  
			app.formChanged = true;
        });
	},
	cambiaCurp: function (){
		
		var valor = $(this).val();

		$(this).removeError();
		$('#guardar').prop('disabled', false);

		if ( !valor ) {
			
			$(this).setError('Campo obligatorio');
			$('#guardar').prop('disabled', true);

		} else if ( valor.length < 18 ) {
			
			$(this).setError('Formato incorrecto');
			$('#guardar').prop('disabled', true);

		} else if ( $('#curp').val() != $(this).val() ) {

			window.location.href = base_url+'Usuarios/Modificar?curp='+$.trim($(this).val());

		}

	},
	buscarCurp: function(){
		window.location.href = base_url+'Usuarios/Ver?curp='+$.trim($('input[name=pCURP]').val());
	},
	generarContrasena: function (length, type) {
		switch (type) {
			case 'num':
				characters = "0123456789";
				break;
			case 'alf':
				characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
				break;
			case 'rand':
				break;
			default:
				characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
				break;
		}
		var pass = "";
		for (i = 0; i < length; i++) {
			if (type == 'rand') {
				pass += String.fromCharCode((Math.floor((Math.random() * 100)) % 94) + 33);
			} else {
				pass += characters.charAt(Math.floor(Math.random() * characters.length));
			}
		}
		return pass;
	},
	starLoader: function () {
		$.LoadingOverlay("show", {
			image: "",
			fontawesome: "fa fa-cog fa-spin"
		});
	},
	stopLoader: function () {
		$.LoadingOverlay("hide",true);
	},
	hideError: function () {
		if ($('[error=true]').length > 0) {
			$('[error=true]').each(function () {
				$(this).removeError();
				$(this).attr('error', false);
			});
		}
	},
	showError: function (message) {
		var error = '';
		$.each(message, function (index, value) {
			if ($('[name=' + index + ']').length > 0) {
				$('[name=' + index + ']').attr('error', true);
				$('[name=' + index + ']').setError(value);
			} else {
				error += '<small>' + value + '</small><br/>';
			}
		});
		if (error.length > 0) {
			Swal.fire({
				type: 'error',
				html: '<p>' + error + '</p>',
			});
		}
	},
	generatePassword: function () {
		var pwd = this.generarContrasena(9);
		$('input#pCONTRASENA').val(pwd);
		$('input[name=pCONTRASENA]').val(pwd);
	},

	mostarMotivo: function(idEstatus){
		if(idEstatus == 2){
			$('div#MotivoInactivo').show();
		}else{
			$('div#MotivoInactivo').hide();
		}
	},

	confirmar: function () {
		var status_new = $('select#pID_ESTATUS option:selected').val();
		var status_old = $('select#pID_ESTATUS').attr('selector');
		var that = this;

		if(status_old != status_new){
			Swal.fire({
				type: 'question',
				title: 'Desea Guardar los cambios',
				showConfirmButton: true,
				confirmButtonText: 'Si',
				showCancelButton: true,
				cancelButtonText: 'No'
			}).then((result) => {
				if (result.value) {
					that.guardar();
				}
			});
		}else{
			that.guardar();
		}
	},

	guardar: function () {
		var that = this;
		that.hideError();

		var sendData = $('form#Usuarios_form').serializeArray();
		sendData.push({
			name: csrf.token_name,
			value: csrf.hash
		});
		
		Backbone.ajax({
			dataType: "json",
			method: 'POST',
			url: base_url + 'Usuarios/guardarModificar',
			data: sendData,
			beforeSend: function () {
				that.starLoader();
			},
			success: function (response) {
				if (response.status == true) {
					$('form').trigger("reset");
					Swal.fire({
						type: 'success',
						title: response.message
					}).then((result) => {
						window.location.href = base_url+'Usuarios/Ver?curp='+$.trim($('input[name=curp]').val());
					})
				} else {
					that.showError(response.message);
				}
			},
			complete: function () {
				that.stopLoader();
			}
		});
	},
	regresar: function () {
		if (app.formChanged){
					
			Swal.fire({
				title: 'Aviso',
				html: "Desea guardar las modificaciones",
				footer: "<div><button class='btn btn-warning discartChanges'>Regresar sin guardar</button></div>",
				type: 'question',
				allowOutsideClick : false,
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Aceptar',
				cancelButtonColor: '#d33',
				cancelButtonText: 'Cancelar'
			}).then(function(result){
				
				if (result.value === true){
					
					app.guardar();		

				}

			});
			
			$('.discartChanges').on('click',function(evnt) { Swal.close(); window.location.replace(base_url + 'Usuarios'); });

		} else {
			window.location.replace(base_url + 'Usuarios');
		}
	},
	render: function () {
		$('form#Usuarios_form select').each(function (index) {
			var selector = $(this).attr('selector');
			if(selector != ''){
				$(this).find('option').filter('[value=' + selector + ']').prop("selected", true);
			}
			$(this).select2();
		});
		return this;
	}
});
var app;
$(function () {
	app = new _app();
	app.render();
});

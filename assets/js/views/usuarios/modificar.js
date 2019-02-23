var _app = Backbone.View.extend({
	initialize: function () {
		if(id_Usuario == false){
			Swal.fire({
				type: 'error',
				title: id_UsuarioMSG,
			});
		}
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
		$.LoadingOverlay("hide");
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
		Backbone.ajax({
			dataType: "json",
			method: 'POST',
			url: base_url + 'Usuarios/guardarModificar',
			data: $('form#Usuarios_form').serialize(),
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
		window.location.replace(base_url + 'Usuarios');
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

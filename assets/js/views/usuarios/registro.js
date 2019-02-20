var _app = Backbone.View.extend({
	initialize: function () {
		this.generatePassword();
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
			if ($('input[name=' + index + ']').length > 0) {
				$('input[name=' + index + ']').attr('error', true);
				$('input[name=' + index + ']').setError(value);
			}else{
				error += '<small>'+value+'</small><br/>';
			}
		});
		if(error.length > 0){
			Swal.fire({
				type: 'error',
				html: '<p>'+error+'</p>',
			});
		}
	},
	generatePassword: function(){
		var pwd = this.generarContrasena(9);
		$('input#pCONTRASENA').val(pwd);
		$('input[name=pCONTRASENA]').val(pwd);
	},
	guardar: function () {
		var that = this;
		that.hideError();
		Backbone.ajax({
			dataType: "json",
			method: 'POST',
			url: base_url + 'Usuarios/guardar',
			data: $('form#Usuarios_form').serialize(),
			beforeSend: function () {
				that.starLoader();
			},
			success: function (response) {
				if (response.status == true) {
					$('form').trigger("reset");
					that.generatePassword();
					Swal.fire({
						type: 'success',
						title: response.message
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
	regresar: function(){
		window.location.replace(base_url + 'Usuarios');
	},
	render: function () {
		return this;
	}
});
var app;
$(function () {
	app = new _app();
	app.render();
});

var _app = Backbone.View.extend({
	formChanged: false,
	initialize: function () {
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

	guardar: function () {
		var that = this;
		var sendData = $('form#formContenedor').serializeArray();
		sendData.push({
			name: csrf.token_name,
			value: csrf.hash
		});

		Backbone.ajax({
			dataType: "json",
			method: 'POST',
			url: base_url + 'Preguntas/registroSave',
			data: sendData,
			beforeSend: function () {
				that.starLoader();
			},
			success: function (response) {
				if (response.status == 'ok') {
					window.locationf=site_url;
				} else {
					that.showError(response.message);
				}
			},
			complete: function () {
				that.stopLoader();
			}
		});


	},
	verificar: function(){
		var that = this;
		var sendData = $('form#formContenedorVeri').serializeArray();
		sendData.push({
			name: csrf.token_name,
			value: csrf.hash
		});
		Backbone.ajax({
			dataType: "json",
			method: 'POST',
			url: base_url + 'Preguntas/registroSaveVerifica',
			data: sendData,
			beforeSend: function () {
				that.starLoader();
			},
			success: function (response) {
				if (response.status == 'ok') {
					window.locationf=site_url;
				} else {
					that.showError(response.message);
				}
			},
			complete: function () {
				that.stopLoader();
			}
		});

	},
	showError: function (message) {
		var error = 'Error al guardar<br/>';
		$.each(message, function (index, value) {
			if ($('input[name=' + index + ']').length > 0) {
				$('input[name=' + index + ']').attr('error', true);
				$('input[name=' + index + ']').setError(value);			
			} else {
				error += value + '<br/>';
			}
		});
		if (error.length > 0) {
	
			$('form#Usuarios_form').setAlert({
				alertType :  'alert-danger',
				dismissible : true,
				header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
				msg : error
			});
			
		}
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

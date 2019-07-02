var mainFormActions = {	
	populateCURPFields: function (data) {
		console.log(data);
		$('[name=pCURP]').val(data.CURP);
		$('[name=pCURP]').prop('readonly', true);
		$('[name=pNOMBRE]').val(data.NOMBRE);
		$('[name=pNOMBRE]').prop('readonly', true);
		$('[name=pPATERNO]').val(data.PATERNO);
		$('[name=pPATERNO]').prop('readonly', true);
		$('[name=pMATERNO]').val(data.MATERNO);
		$('[name=pMATERNO]').prop('readonly', true);
		$('[name=pID_JEFE]').val($.trim(data.NOMBRE_JEFE + data.PATERNO_JEFE + data.MATERNO_JEFE));
		$('[name=pID_JEFE]').prop('readonly', true);
	},
	populateData: function (idRef) {
		$.LoadingOverlay("show", {
			image: "",
			fontawesome: "fa fa-cog fa-spin"
		});
		var callUrl = base_url + 'Solicitud/ajaxGetSolicitudById';

		return new Promise(function (resolve, reject) {
			$.get(callUrl, {
					idRef: idRef
				},
				function (data) {
					resolve(data);
				}).fail(function (err) {
				reject(err);
			});
		}).then(function (data) {
			if (data.results) {
				mainFormActions.fillData(data);
			} else
				throw new Error('No se encontró información');
		}).catch(function (err) {
			$.LoadingOverlay("hide",true);
			Swal.fire({
					type: 'error',
					title: 'Error',
					html: err.statusText ? err.statusText : err.message
				})
				.then(() => {
					window.location.href = base_url + 'Solicitud';
				});
		});
	},
	fillData: function (data) {
		data = data.results.data;
		$.each(data, function (index, value) {
			$('[name=' + index + ']').val(value);
			$('[name=' + index + ']').prop('readonly', true);
		});

	},
	insertValueInSelect: function (ref, value) {

		if (ref.length > 0 && value) {
			$objTypeOf = ref[0].tagName.toLowerCase();

			switch ($objTypeOf) {
				case 'input':
					$type = ref.attr('type').toLowerCase();
					switch ($type) {
						case 'text':
						case 'password':
						case 'date':
						case 'email':
						case 'hidden':
						case 'number':
							ref.val(value);
							break;
					}
					break;
				case 'select':
					if (ref.find('option:enabled').size() == 0)
						ref.data('insert', value);
					else {
						ref.val(value);
						ref.trigger('change').trigger('change.select2');
					}
					break;
				default:
					break;
			}
		}
	}
}

var _app = Backbone.View.extend({
	formChanged : false,
	initialize: function () {		
		$('select').select2();

		Swal.fire({
				title: 'Clave CURP',
				input: 'text',
				inputAttributes: {
					autocapitalize: 'off'
				},
				showCancelButton: true,
				confirmButtonText: 'Aceptar',
				showLoaderOnConfirm: true,
				preConfirm: (CURP) => {
						try {
							if (CURP.length < 18 || CURP.length > 20)
							throw new Error('Formato de CURP incorrecto');

							var sendData = [];
							sendData.push({
								name: csrf.token_name,
								value: csrf.hash
							},
							{
								name: 'pCURP',
								value: CURP
							});
						return new Promise(function (resolve, reject) {
								callUrl = base_url + 'Usuarios/buscarCurp';
								$.post(callUrl,sendData,function (data) {
										resolve(data);
									}).fail(function (err) {
										reject(err);	
									});
							}).then(function (data) {
								if(data.status == false){
									throw new Error(data.message);		
								}
								return { data: data.data};
							}).catch(function(err){
								Swal.showValidationMessage(err.statusText ? err.statusText : err.message);
							});
						} catch (error) {
							Swal.showValidationMessage(error);
						}
			},
			allowOutsideClick: false,
			onBeforeOpen: () => {
				$('.swal2-container').css('z-index', '2000');
				$('.swal2-container').data('preserve', true).data('preserveCall', 'mainTabMenu.mainInit');
			}
		}).then((result) => {
		if (typeof result.dismiss !== 'undefined') {
			window.location.href = base_url + 'Usuarios';
		} else {
			mainFormActions.populateCURPFields(result.value.data);
		}

		//Rutina para verificar si se hace algún cambio en cualquier forulario
        $('#Usuarios_form').find('input, select').change(function(e) {  
			app.formChanged = true;
        });

		this.generatePassword();

	});

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
		if ($('input[name=' + index + ']').length > 0) {
			$('input[name=' + index + ']').attr('error', true);
			$('input[name=' + index + ']').setError(value);
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
	app.formChanged = true;
},
guardar: function () {
	var that = this;
	that.hideError();

	if ( !$('form#Usuarios_form').valid() ){
		$('form#Usuarios_form').setAlert({
			alertType :  'alert-danger',
			dismissible : true,
			header : '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error',
			msg : 'Formulario incompleto'
		});
		return false;
	}

	var sendData = $('form#Usuarios_form').serializeArray();
	sendData.push({
		name: csrf.token_name,
		value: csrf.hash
	});

	Backbone.ajax({
		dataType: "json",
		method: 'POST',
		url: base_url + 'Usuarios/guardar',
		data: sendData,
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
				}).then(result => {
					location.reload();
				});
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
	return this;
}
});
var app;
$(function () {
	app = new _app();
	app.render();
});

var _app = Backbone.View.extend({
	initialize: function () {},
	tableLenguage: function () {
		return {
			"sProcessing": "Procesando...",
			"sLengthMenu": "Mostrar _MENU_ registros",
			"sZeroRecords": "No se encontraron resultados",
			"sEmptyTable": "Ningún dato disponible en esta tabla",
			"sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
			"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix": "",
			"sSearch": "Buscar:",
			"sUrl": "",
			"sInfoThousands": ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst": "Primero",
				"sLast": "Último",
				"sNext": "Siguiente",
				"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}
		};
	},
	nuevoUsuario: function () {
		location.href = base_url + 'Usuarios/Registro';
	},
	render: function () {
		var that = this;
		$('table#table').dataTable({
			language: that.tableLenguage()
		});
		return this;
	},
	borrarUsuario: function(id){

		var that = this;

		Swal.fire({
			title: 'Aviso',
			html: "¿Seguro que desea dar de baja al usuario?",                    
			type: 'question',
			allowOutsideClick : false,
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			input: 'textarea',
			inputPlaceholder: 'Motivo',
			preConfirm: (motivo) => {
				try {
					if (!motivo)
						throw new Error('Es necesario indicar el motivo');
				} catch (error) {
					Swal.showValidationMessage(error);
				}
			}
		}).then(function(result){
			if (result.value && !result.dismiss ){
				
				var sendData = [];

				sendData.push({
					name: csrf.token_name,
					value: csrf.hash
				});
				sendData.push({
					name: 'id',
					value: id
				});
				sendData.push({
					name: 'motivo',
					value: result.value
				});
				
				Backbone.ajax({
					dataType: "json",
					method: 'POST',
					url: base_url + 'Usuarios/darBaja',
					data: sendData,
					beforeSend: function () {
						that.starLoader();
					},
					success: function (response) {
						if (response){
							if ( response.status ) {
								Swal.fire({
									type: 'success',
									html: 'Usuario desactivado'
								})
								.then(() => {
									window.location.href = base_url + 'Usuarios';
								});
							}
							return null;
						}

						Swal.fire({
							type: 'error',
							title: 'Error',
							html: response.message
						});
						
					},
					complete: function () {
						that.stopLoader();
					},
					error : function( jqXHR, textStatus, errorThrown){
						Swal.fire({
							type: 'error',
							title: 'Error',
							html: errorThrown
						});
					}
				});

			}
		});

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
});
var app;
$(function () {
	app = new _app();
	app.render();
});

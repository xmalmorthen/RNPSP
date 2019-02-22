<!-- CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/vendor/datatable/jquery.dataTables.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/datatable/dataTables.bootstrap.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/vendor/plugins/select2/css/select2.min.css"); ?>">
<!-- /CSS -->

<div class="_container">
    <!-- LISTA DE TABS DEL MENU PRINCIPAL -->
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs" id="mainContainerTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="datosGenerales-tab" data-toggle="tab" href="#datosGenerales" role="tab" aria-controls="datosGenerales" aria-selected="true">Datos generales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Laboral-tab" data-toggle="tab" href="#Laboral" role="tab" aria-controls="Laboral" aria-selected="false">Laboral</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Capacitacion-tab" data-toggle="tab" href="#Capacitacion" role="tab" aria-controls="Capacitacion" aria-selected="false">Capacitación</a>
                </li>
                
                <!-- TODO: Xmal - Implementar para mostrar u ocultar sección -->
                <?php //if ($sessionUser[{perfil}] == { usuario de c4 }) { ?>
                <li class="nav-item">
                    <a class="nav-link" id="Identificacion-tab" data-toggle="tab" href="#Identificacion" role="tab" aria-controls="Identificacion" aria-selected="false">Identificación</a>
                </li>
                <?php //} ?>
            </ul>
        </div>
    </div>
    <!-- LISTA DE SUBMENUS -->
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="datosGenerales" role="tabpanel" aria-labelledby="Tab1-tab">
                <?php echo $this->load->view('Solicitud/tabs/datosGenerales/mnuTabDatosGenerales',null,TRUE) ?>
            <div class="tab-content" id="contentDatosGenerales">
                    <?php echo $this->load->view('Solicitud/tabs/datosGenerales/contenidoDatosGenerales',null,TRUE) ?>
            </div>
        </div>
        <div class="tab-pane fade" id="Laboral" role="tabpanel" aria-labelledby="profile-tab">
            <?php echo $this->load->view('Solicitud/tabs/Laboral/mnuTabLaboral',null,TRUE) ?>
            <div class="tab-content" id="contentLaboral">
                <?php echo $this->load->view('Solicitud/tabs/Laboral/contenidoLaboral',null,TRUE) ?>
            </div>
        </div>
        <div class="tab-pane fade" id="Capacitacion" role="tabpanel" aria-labelledby="Tab3-tab">
            <?php echo $this->load->view('Solicitud/tabs/Capacitacion/mnuTabCapacitacion',null,TRUE) ?>
            <div class="tab-content" id="contentCapacitacion">
                <?php echo $this->load->view('Solicitud/tabs/Capacitacion/contenidoCapacitacion',null,TRUE) ?>
            </div>
        </div>
        <!-- TODO: Xmal - Implementar para mostrar u ocultar sección -->
        <?php //if ($sessionUser[{perfil}] == { usuario de c4 }) { ?>
        <div class="tab-pane fade" id="Identificacion" role="tabpanel" aria-labelledby="Tab3-tab">
            <?php echo $this->load->view('Solicitud/tabs/Identificacion/mnuTabIdentificacion',null,TRUE) ?>
            <div class="tab-content">
                    <?php echo $this->load->view('Solicitud/tabs/Identificacion/contenidoIdentificacion',null,TRUE) ?>
            </div>
        </div>
        <?php //} ?>
    </div>
</div>

<!-- JS -->
<script src="<?php echo base_url("assets/vendor/datatable/jquery.dataTables.min.js"); ?>"></script>
<script src="<?php echo base_url('assets/vendor/plugins/select2/js/select2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/collectionGenerics.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/dom.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/populateFormsCatalogs.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/alerts.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/dynamicTabs.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/catalogs.js') ?>"></script>
<script src="<?php echo base_url('assets/js/utils/serialized.js') ?>"></script>

<script src="<?php echo base_url('assets/js/views/solicitud/datosGeneralesTab.js') ?>"></script>
<script src="<?php echo base_url('assets/js/views/solicitud/laboralTab.js') ?>"></script>
<script src="<?php echo base_url('assets/js/views/solicitud/capacitacionTab.js') ?>"></script>

<!-- TODO: Xmal - Implementar para mostrar u ocultar sección -->
<?php //if ($sessionUser[{perfil}] == { usuario de c4 }) { ?> 
    <script src="<?php echo base_url('assets/js/views/solicitud/identificacionTab.js') ?>"></script>
<?php //} ?>

<script type="text/javascript">
    var formMode = "<?php echo $this->session->flashdata('formMode'); ?>";
     
    $(function() {
        if (formMode.length == 0)
            window.location.href = base_url + 'Error/setError?err=No se especificó el modo del formulario!!!';

        dynTabs.mode = formMode;

        //CAMBIO DE TABS
        $('#mainContainerTab a[data-toggle="tab"]').on('show.bs.tab',mainTabMenu.tab.change);

        var linkRefHash = MyCookie.tabRef.get(dynTabs.mode + 'MainTab');
        if (!linkRefHash){
            linkRefHash = $('#mainContainerTab .nav-item a.nav-link.active')[0].id;
            MyCookie.tabRef.save(dynTabs.mode + 'MainTab',linkRefHash);
        }
        var linkRef = $('#' + linkRefHash);

        mainTabMenu.actions.init(
            linkRef.attr('aria-controls'),
            function(){
                linkRef.trigger('click');
            }
        );

        switch (formMode) {
            case 'edit':
                mainFormActions.populateData("<?php echo isset($id) ? $id : ''; ?>");
            break;
            case 'add' : 
                mainTabMenu.mainInit();
            break;
        }
    });

    var mainTabMenu = {
        tab : {
            change : function(e){
                var tabRef = $(e.currentTarget);
                mainTabMenu.actions.init(tabRef.attr('aria-controls'));
                MyCookie.tabRef.save(dynTabs.mode + 'MainTab',tabRef.attr('id'));
            }
        },
        actions : {
            inited : false,
            init : function(tabRef, callback){
                mainTabMenu.actions.inited = false;

                dynTabs.validForm = formMode != 'edit' ? true : false;

                switch (tabRef) {
                    case 'datosGenerales':
                        objViewDatosGenerales.init(function(){ dynTabs.validForm = true; mainTabMenu.actions.inited = true; });
                    break;
                    case 'Laboral':
                        objViewLaboral.init(function(){ dynTabs.validForm = true; mainTabMenu.actions.inited = true;});
                    break;
                    case 'Capacitacion':
                        objViewCapacitacion.init(function(){ dynTabs.validForm = true; mainTabMenu.actions.inited = true;});
                    break;
                    case 'Identificacion':
                        objViewIdentificacion.init(function(){ dynTabs.validForm = true; mainTabMenu.actions.inited = true;});
                    break;
                }
                if (callback) {
                    if ($.isFunction( callback )) {
                        callback();
                        var initInterval = setInterval(function(){
                            if (mainTabMenu.actions.inited) {
                                clearInterval(initInterval);
                                callback();
                            }
                        }, 100);
                    }
                }
            },
            changeTab : function(){
                var linkRefHash = MyCookie.tabRef.get(dynTabs.mode + 'ChildTab');
                if (!linkRefHash){
                    linkRefHash = $('#myTabContent .nav-item a.nav-link.active')[0].id;
                    MyCookie.tabRef.save(dynTabs.mode + 'ChildTab',linkRefHash);
                }
                var linkRef = $('#' + linkRefHash);
                linkRef.trigger('click');
            }
        },
        mainInit : function(){
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

                        var callUrl = base_url + `Solicitud/ajaxGetSolicitudByCURP/${CURP}`;
                        return fetch(callUrl)
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error(response.statusText);
                                }
                                return response.json();
                            })
                            .then(response => {
                                if (!response.results) {
                                    callUrl = base_url + `ajaxAPIs/curp?CURP=${CURP}`;
                                    return fetch(callUrl)
                                        .then(response => {
                                            if (!response.ok) {
                                                throw new Error(response.statusText);
                                            }
                                            return response.json();
                                        })
                                        .then(response => {
                                            return response[0];
                                        })
                                        .catch((error) => {
                                            Swal.showValidationMessage(error);
                                        });
                                } else {
                                    return response;
                                }
                            })
                            .catch(error => {
                                Swal.showValidationMessage(error);
                            });
                    } catch (error) {
                        Swal.showValidationMessage(error);
                    }
                },
                allowOutsideClick: false,
                onBeforeOpen: () => {  
                    $('.swal2-container').css('z-index','2000');
                }
            }).then((result) => {
                if (result.dismiss == "cancel")
                    window.location.href = base_url + 'Solicitud';
                else {
                    mainFormActions.populateCURPFields(result.value);
                }
            });
        }
    }

    var mainFormActions = {
        populateCURPFields : function (data) {
            objViewDatosGenerales.actions.populateCURPData(data);
        },
        populateData : function(idRef){
            $.LoadingOverlay("show", {image:"",fontawesome:"fa fa-cog fa-spin"});

            objViewDatosGenerales.init(function(){ dynTabs.validForm = true; mainTabMenu.actions.inited = true; });
            objViewLaboral.init(function(){ dynTabs.validForm = true; mainTabMenu.actions.inited = true;});
            objViewCapacitacion.init(function(){ dynTabs.validForm = true; mainTabMenu.actions.inited = true;});
            objViewIdentificacion.init(function(){ dynTabs.validForm = true; mainTabMenu.actions.inited = true;});

            var callUrl = base_url + `Solicitud/ajaxGetSolicitudById/${idRef}`;
            fetch(callUrl)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(response.statusText);
                    }
                    return response.json();
                })
                .then(response => {
                    if (!response.results) {
                        throw new Error('No se encontró información');
                    } else {
                        fncPopulate(response.results);
                    }
                })
                .catch(error => {
                    Swal.fire({ type: 'error', title: 'Error', html: error.message });
                    window.location.href = base_url + 'Solicitud';
                });            


            var fncPopulate = function(data){
                $('.consultaCURP').readOnly();

                objViewDatosGenerales.vars.datosGenerales.objs.pCURP.val('RUAM811123HCMDGG05');
                mainFormActions.insertValueInSelect($('#pTIPO_MOV'),'BE');
                mainFormActions.insertValueInSelect($('#pID_ENTIDAD_NAC'),'6');
                mainFormActions.insertValueInSelect($('#pID_MUNICIPIO_NAC'),'2');
                
                mainFormActions.insertValueInSelect($('#_dependenciaAdscripcionActual'),'2');
                mainFormActions.insertValueInSelect($('#pINSTITUCION'),'1');
                mainFormActions.insertValueInSelect($('#pID_AREA'),'1656');

                $.LoadingOverlay("hide");
            }
        },
        insertValueInSelect : function(ref,value){
            if (ref){
                if (ref.find('option').size() == 0)
                    ref.data('insert', value);
                else
                    ref.val(value).trigger('change');
                //ref.val(value).data('insert',value).trigger('change').trigger('change.select2');
            }
        }
    }
</script>
<!-- /JS -->
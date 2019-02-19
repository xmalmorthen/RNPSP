<!-- END PAGE HEADER-->
<div class="row ">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-share font-dark"></i>
                    <span class="caption-subject font-dark bold uppercase">Listado de API's</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        <ul class="nav nav-tabs tabs-left">
                            <li>
                                <a href="ui_tabs_accordions_navs.html#catalogoMarcas" data-toggle="tab"> Catalogos de Marcas </a>
                            </li>
                            <li class="active">
                                <a href="#catalogoUnidadesMedidas" data-toggle="tab"> Catalogo de <b>Unidades Medidas</b> </a>
                            </li>
                            <li>
                                <a href="ui_tabs_accordions_navs.html#catalogoDependencias" data-toggle="tab"> Catalogo de Dependencias </a>
                            </li>
                            <li>
                                <a href="ui_tabs_accordions_navs.html#catalogoDireccionesGenerales" data-toggle="tab"> Catalogo de Direccion General </a>
                            </li>
                            <li>
                                <a href="ui_tabs_accordions_navs.html#catalogoDireccionesArea" data-toggle="tab"> Catalogo de Direccion Area </a>
                            </li>
                            <li>
                                <a href="ui_tabs_accordions_navs.html#catalogoTipoArticulo" data-toggle="tab"> Catalogo de Tipo de Articulos </a>
                            </li>
                            <li>
                                <a href="ui_tabs_accordions_navs.html#catalogoUsuarios" data-toggle="tab"> Catalogo de Usuarios </a>
                            </li>
                            <li>
                                <a href="ui_tabs_accordions_navs.html#catalogoCentroCostos" data-toggle="tab"> Catalogo de centro de costros </a>
                            </li>
                            <li>
                                <a href="ui_tabs_accordions_navs.html#deAutorizadores" data-toggle="tab"> Autorizadores </a>
                            </li>
                            <li>
                                <a href="index#deAutorizadoresArt41" data-toggle="tab"> Autorizadores Articulo 41 </a>
                            </li>
                            <li>
                                <a href="index#Ca_Clasificaciones" data-toggle="tab"> Catalogo Clasificaciones </a>
                            </li>

                        </ul>
                    </div>
                    <div class="col-md-10 col-sm-10 col-xs-10">
                        <div class="tab-content">
                            <div class="tab-pane" id="catalogoMarcas">
                                <?php 
                                include '/index/Ca_Marcas.html';
                                ?>
                            </div>
                            <div class="tab-pane active" id="catalogoUnidadesMedidas">
                                <?php 
                                include '/index/Ca_UnidadesMedidas.php';
                                ?>
                            </div>
                            <div class="tab-pane" id="catalogoDependencias">
                                <?php 
                                include '/index/Ca_Dependencias.html';
                                ?>
                            </div>
                            <div class="tab-pane" id="catalogoDireccionesGenerales">
                                <?php 
                                include '/index/Ca_DireccionesGeneral.html';
                                ?>
                            </div>
                            <div class="tab-pane" id="catalogoDireccionesArea">
                                <?php 
                                include '/index/ca_DireccionesArea.html';
                                ?>
                            </div>
                            <div class="tab-pane" id="catalogoTipoArticulo">
                                <?php 
                                include '/index/ca_TipoArticulos.html';
                                ?>
                            </div>
                            <div class="tab-pane" id="catalogoUsuarios">
                                <?php
                                include '/index/ca_Usuarios.html';
                                ?>
                            </div>
                            <div class="tab-pane" id="catalogoCentroCostos">
                                <?php
                                include '/index/Ca_CentroCostos.html';
                                ?>
                            </div>
                            <div class="tab-pane" id="deAutorizadores">
                                <?php
                                include '/index/De_Autorizaciones.html';
                                ?>
                            </div>
                            <div class="tab-pane" id="deAutorizadoresArt41">
                                <?php
                                include '/index/De_AutorizacionesArt41.php';
                                ?>
                            </div>
                            <div class="tab-pane" id="Ca_Clasificaciones">
                                <?php
                                include '/index/Ca_Clasificaciones.php';
                                ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>
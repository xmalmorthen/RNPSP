<?php
$this->carabiner->display('snippet');
?>
<script>
    $(function(){
       $("pre.codigo").snippet("PHP",{style:"sh_vampire"});
    });
</script>

<div class="col-lg-6 col-xs-12 col-sm-12">
    <div class="portlet light ">
        <div class="portlet-title">
            <div class="caption caption-md">
                <i class="icon-bar-chart font-dark hide"></i>
                <span class="caption-subject font-dark bold uppercase">DATOS DE ENTRADA</span>
            </div>
        </div>
        <div class="portlet-body">
            <?php 
            $datosEntrada = (array)json_decode($bitacora['DatosEntrada']);
            ?>
            <div class="scroller" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                <div class="general-item-list">
                    <?php if( count((array)$datosEntrada['post']) > 0 ){ ?>
                    <div class="item">
                        <div class="item-head">
                            <div class="item-details">
                                <b>POST</b>
                            </div>
                        </div>
                        <div class="item-body"> 
                            <?php
                                echo '<pre class="codigo sh_php snippet-formatted sh_sourceCode">';
                                print_r($datosEntrada['post']);
                                echo '</pre>';
                            ?>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if( count((array)$datosEntrada['get']) > 0 ){ ?>
                    <div class="item">
                        <div class="item-head">
                            <div class="item-details">
                                <b>GET</b>
                            </div>
                        </div>
                        <div class="item-body"> 
                            <?php
                                echo '<pre class="codigo sh_php snippet-formatted sh_sourceCode">';
                                print_r($datosEntrada['get']);
                                echo '</pre>';
                            ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-6 col-xs-12 col-sm-12">
    <div class="portlet light ">
        <div class="portlet-title">
            <div class="caption caption-md">
                <i class="icon-bar-chart font-dark hide"></i>
                <span class="caption-subject font-dark bold uppercase">DATOS DE SALIDA</span>
            </div>
        </div>
        <div class="portlet-body">
            <?php 
            $datosSalida = (array)json_decode($bitacora['DatosSalida']);
            ?>
            <div class="scroller" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                <div class="general-item-list">
                    <?php if( count((array)$datosSalida['error']) > 0 ){ ?>
                    <div class="item">
                        <div class="item-head">
                            <div class="item-details">
                                <b>ERROR</b>
                            </div>
                        </div>
                        <div class="item-body"> 
                            <?php
                                echo '<pre class="codigo sh_php snippet-formatted sh_sourceCode">';
                                print_r($datosSalida['error']);
                                echo '</pre>';
                            ?>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if( count((array)$datosSalida['info']) > 0 ){ ?>
                    <div class="item">
                        <div class="item-head">
                            <div class="item-details">
                                <b>INFO</b>
                            </div>
                        </div>
                        <div class="item-body"> 
                            <?php
                                echo '<pre class="codigo sh_php snippet-formatted sh_sourceCode">';
                                print_r($datosSalida['info']);
                                echo '</pre>';
                            ?>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if( count((array)$datosSalida['data']) > 0 ){ ?>
                    <div class="item">
                        <div class="item-head">
                            <div class="item-details">
                                <b>DATA</b>
                            </div>
                        </div>
                        <div class="item-body"> 
                            <?php
                                echo '<pre class="codigo sh_php snippet-formatted sh_sourceCode">';
                                print_r($datosSalida['data']);
                                echo '</pre>';
                            ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sep1"></div>            
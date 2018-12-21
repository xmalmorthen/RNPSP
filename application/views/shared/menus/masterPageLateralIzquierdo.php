<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title">
            Opciones
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li class="nav-active"><a href="<?php echo site_url();?>"><i class="fa fa-home" aria-hidden="true"></i><span>Principal</span></a></li>
                    <li><a href="<?php echo site_url('cedula');?>"><i class="fa fa-copy" aria-hidden="true"></i><span>Cédula</span></a></li>
                    <li class="nav-parent">
                        <a><i class="fa fa-copy" aria-hidden="true"></i><span>Consultas</span></a>
                        <ul class="nav nav-children">
                            <li><a href="<?php echo site_url('consulta/tipo/1');?>">Consulta 1</a></li>
                            <li><a href="<?php echo site_url('consulta/tipo/2');?>">Consulta 2</a></li>
                            <li><a href="<?php echo site_url('consulta/tipo/n');?>">Consulta N</a></li>                            
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a><i class="fa fa-list-alt" aria-hidden="true"></i><span>Reportes</span></a>
                        <ul class="nav nav-children">
                            <li><a href="<?php echo site_url('reporte/tipo/1');?>">Reporte 1</a></li>
                            <li><a href="<?php echo site_url('reporte/tipo/2');?>">Reporte 2</a></li>
                            <li><a href="<?php echo site_url('reporte/tipo/n');?>">Reporte N</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo site_url('carga/tipo');?>"><i class="fa fa-external-link" aria-hidden="true"></i><span>Cargas</span></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</aside>
<!-- end: sidebar -->
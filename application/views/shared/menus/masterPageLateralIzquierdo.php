<div class="left main-sidebar">
    <div class="sidebar-inner leftscroll">
        <div id="sidebar-menu">
            <ul>
                <li class="submenu">
                    <a href="<?php echo site_url();?>"><i class="fa fa-home" aria-hidden="true"></i><span> Principal </span> </a>
                </li>
                
                <li class="submenu">
                    <a><i class="fa fa-id-card-o" aria-hidden="true"></i> <span> Cédula </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo site_url('alta/cedula/persona');?>">Alta de persona</a></li>
                        <li><a href="<?php echo site_url('alta/cedula/aspirante');?>">Alta de aspirante</a></li>
                        <li><a href="<?php echo site_url('cedula/replicar');?>">Replicar</a></li>
                    </ul>
                </li>
                                    
                <li class="submenu">
                    <a><i class="fa fa-copy" aria-hidden="true"></i> <span> Consultas </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo site_url('consulta/1');?>">Consulta 1</a></li>
                        <li><a href="<?php echo site_url('consulta/2');?>">Consulta 2</a></li>
                        <li><a href="<?php echo site_url('consulta/n');?>">Consulta N</a></li> 
                    </ul>
                </li>

                <li class="submenu">
                    <a><i class="fa fa-list-alt" aria-hidden="true"></i> <span> Reportes </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo site_url('reporte/1');?>">Reporte 1</a></li>
                        <li><a href="<?php echo site_url('reporte/2');?>">Reporte 2</a></li>
                        <li><a href="<?php echo site_url('reporte/n');?>">Reporte N</a></li>
                    </ul>
                </li>
                
                <li class="submenu">
                    <a href="<?php echo site_url('carga');?>"><i class="fa fa-external-link" aria-hidden="true"></i> <span> Cargas </span> </a>                        
                </li>

                <li class="submenu">
                    <a><i class="fa fa-list-alt" aria-hidden="true"></i> <span> Ejemplos </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo site_url('ejemplos/ejemplo1');?>">Ejemplo 1</a></li>
                        <li><a href="<?php echo site_url('ejemplos/ejemplo2');?>">Ejemplo 2</a></li>
                    </ul>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="left main-sidebar">
    <div class="sidebar-inner leftscroll">
        <div id="sidebar-menu">
            <ul>
                <li class="submenu">
                    <a href="<?php echo site_url();?>"><i class="fa fa-home" aria-hidden="true"></i><span> Principal </span> </a>
                </li>
                <?php if ($this->session->userdata(SESSIONVAR)['idTipoUsuario'] != 5) {?>
                <li class="submenu">
                   <a href="<?php echo site_url('Solicitud');?>" ><i class="fa fa-envelope-o"  aria-hidden="true"></i><span> Solicitudes </span></a>
                </li>
                <li class="submenu">
                    <a href="<?php echo site_url('Personal');?>" ><i class="fa fa-briefcase" aria-hidden="true"></i> <span> Personal </span></a>
                </li>
                <?php if ( verificaTipoUsuarioSesion() == 1 || verificaTipoUsuarioSesion() == 2 ) { // usuario super admin y administradores?>
                <li class="submenu">
                    <a href="<?php echo site_url('Usuarios');?>" ><i class="fa fa-user-o" aria-hidden="true"></i> <span> Usuarios </span></a>
                </li>
                <?php } 
                }?>
                <?php 
                //if ( (verificaTipoUsuarioSesion() == 1 && !isConsultasUser()) || $this->session->userdata(SESSIONVAR)['idTipoUsuario'] == 5 )
                if ( $this->session->userdata(SESSIONVAR)['idTipoUsuario'] == 5 )
                 { // usuario super admin que no sea de consulta y capacitadores?>
                <li class="submenu">
                    <a href="<?php echo site_url('Curso');?>" ><i class="fa fa-book" aria-hidden="true"></i> <span> Curso </span></a>
                </li>
                <?php } ?>
                <!--
                <li class="submenu">
                    <a href="<?php echo site_url('Examen');?>" ><i class="fa fa-file-text" aria-hidden="true"></i> <span> Examen </span></a>
                </li> -->
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
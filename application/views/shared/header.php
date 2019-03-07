<?php //die(var_dump($this->session->userdata(SESSIONVAR))); ?>

<div class="headerbar">
    <div class="headerbar-left">
        <a href="<?php echo site_url('/'); ?>" class="logo">
            <img alt="Logo" src="<?php echo base_url('assets/images/logo.png') ?>" width="100px" /> 
        </a>
    </div>
    <nav class="navbar-custom">        
        <ul class="list-inline float-right mb-0 sessionSection">
            <?php if ($this->session->has_userdata(SESSIONVAR)) {
                $userData = $this->session->userdata(SESSIONVAR);

                $userName = $userData['PATERNO'] ? $userData['PATERNO'] : '' . ( $userData['MATERNO'] ? $userData['MATERNO'] . ' ' : '') . $userData['NOMBRE'] ? $userData['NOMBRE'] : '';
                $userName = strlen($userName) == 0 ? $userData['username'] : $userName;
            ?>
            <li class="list-inline-item dropdown notif">
                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fa fa-user fa-2x" aria-hidden="true"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">                    
                    <div class="dropdown-item noti-title">
                        <h5 class="text-overflow"><small><?php echo $userName; ?></small></h5>
                    </div>
                    <!-- <a href="<?php echo site_url('usuario/perfil'); ?>" class="dropdown-item notify-item">
                        <i class="fa fa-user"></i> <span>Perfil</span>
                    </a> -->
                    <a href="<?php echo site_url('Sesion/Terminar'); ?>" class="dropdown-item notify-item">
                        <i class="fa fa-power-off"></i> <span>Cerrar sesión</span>
                    </a>
                </div>
            </li>
            <?php }?>
        </ul>
        <ul class="list-inline menu-left mb-0">
            <li class="float-left btnMnuMobile">
                <button class="button-menu-mobile open-left">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
            </li>
            <li class="float-left">
                <div class='titleHeader'>
                    <span >Sistema Integral de Seguridad Pública</span>
                </div>                
            </li>            
        </ul>
    </nav>
</div>
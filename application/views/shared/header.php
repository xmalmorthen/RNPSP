<div class="headerbar">
    <div class="headerbar-left">
        <a href="<?php echo site_url('/'); ?>" class="logo">
            <img alt="Logo" src="<?php echo base_url('assets/images/logo.png') ?>" width="100px" /> 
        </a>
    </div>
    <nav class="navbar-custom">        
        <ul class="list-inline float-right mb-0">
            <?php if ($this->session->has_userdata(SESSIONVAR)) {?>
            <li class="list-inline-item dropdown notif">
                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fa fa-user" aria-hidden="true"></i> Xmal Morthen
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">                    
                    <a href="pro-profile.html" class="dropdown-item notify-item">
                        <i class="fa fa-user"></i> <span>Perfil</span>
                    </a>
                    <a href="#" class="dropdown-item notify-item">
                        <i class="fa fa-power-off"></i> <span>Cerrar sesión</span>
                    </a>
                </div>
            </li>
            <?php }?>
        </ul>
        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
            </li>                        
        </ul>
    </nav>
</div>
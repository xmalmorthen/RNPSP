<!-- start: header -->
<header class="header">
    <div class="logo-container">
        <a href="<?php echo base_url(); ?>" class="logo">
            <img src="<?php echo base_url('assets/images/logo.png'); ?>" height="80" alt="Gobierno del Estado de Colima" />
        </a>
        <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <!-- start: search & user box -->
    <?php if ($this->session->has_userdata(SESSIONVAR)) {?>
    <div class="header-right">
        <span class="separator"></span>
        <div id="userbox" class="userbox">
            <a href="#" data-toggle="dropdown">
                <figure class="profile-picture">
                    <img src="<?php echo base_url('assets/images/!logged-user.jpg'); ?>" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
                </figure>
                <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                    <span class="name">John Doe Junior</span>
                    <span class="role">administrator</span>
                </div>

                <i class="fa custom-caret"></i>
            </a>

            <div class="dropdown-menu">
                <ul class="list-unstyled">
                    <li class="divider"></li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="fa fa-user"></i> Perfil</a>
                    </li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="pages-signin.html"><i class="fa fa-power-off"></i> Cerrar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php } ?>
    <!-- end: search & user box -->
</header>
<!-- end: header -->
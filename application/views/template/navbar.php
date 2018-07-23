<header class="topnavbar">

    <!-- Logo -->
    <div class="nav-logo">
        <a class="logo-img" href="<?php echo site_url().'home'; ?>">
            <img src="<?php echo site_url(); ?>assets/img/logo-small.png" alt="Logo">
        </a>
        <a class="logo-text" href="<?php echo site_url().'home'; ?>">
            <img class="navbar-brand" src="<?php echo site_url(); ?>assets/img/logo-text.png" alt="Logo">
        </a>
        <button class="navbar-toggler ml-auto btn-rounded ripple" type="button" data-toggle="collapse" data-target="collapse">
            <i class="mdi mdi-menu"></i>
        </button>
        <button class="topnavbar-toggler btn-rounded ripple">
            <i class="mdi mdi-apps"></i>    
        </button>     
    </div>
    <!-- End Logo -->
    <!-- Navbar -->
    <nav class="navbar navbar-header navbar-expand-lg">
        <div class="container-fluid">
            <div class="nav-toggler">
                <button class="btn btn-minisb btn-rounded"><i class="mdi mdi-menu"></i></button>
            </div>
            <ul class="navbar-nav ml-md-auto align-items-center">
                <li class="nav-item dropdown hidden-caret">
                    <a class="nav-link dropdown-toggle btn-rounded" href="#" data-toggle="dropdown">
                        <i class="mdi mdi-message-text-outline"></i>
                    </a>
                </li>
                <li class="nav-item dropdown hidden-caret">
                    <a class="nav-link dropdown-toggle btn-rounded" href="#" data-toggle="dropdown">
                        <i class="mdi mdi-bell-outline"></i>
                    </a>
                </li>
                <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle profile-img" href="#" data-toggle="dropdown">
                        <img class="img-circle" src="<?php echo site_url().'assets/img/users-avatar/avatar.png'; ?>" width="35" alt="avatar">
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <?php if($this->session->userdata('permission') == 1) : ?>
                                <a class="dropdown-item" href="<?= site_url('admin/dashboard'); ?>">Admin</a>
                            <?php endif; ?>
                            <a class="dropdown-item" href="#">My Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= site_url('logout'); ?>">Logout</a>
                        </li>
                    </ul>    
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->

</header>
    
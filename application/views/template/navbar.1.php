<header class="topnavbar">

    <!-- Logo -->
    <div class="nav-logo">
        <a class="logo-img" href="<?php echo site_url().'home'; ?>">
            <img src="<?php echo site_url(); ?>assets/img/logo-small.png" alt="Logo">
        </a>
        <a class="logo-text" href="<?php echo site_url().'home'; ?>">
            <img class="navbar-brand" src="<?php echo site_url(); ?>assets/img/logo-text.png" alt="Logo">
        </a>     
    </div>
    <!-- Navbar -->
    <nav class="navbar navbar-header navbar-expand-lg">

    </nav>

    <nav class="navbar topbar">
            <ul class="navbar-nav logo">
                <li class="nav-item logo-wrap">
                    <a class="text" href="<?php echo site_url().'home'; ?>">
                        <div class="brand"><img src="<?php echo site_url(); ?>assets/img/logo-small.png" alt="Logo"></div>
                        <h1 class="brand-text">LEAGUEX</h1> 
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav nav-left">
                <li class="nav-item menu-icon">
                    <a href="javascript:void(0)" id="mb-sidebarLeft" class="hidden-md">
                        <i class="mdi mdi-menu"></i>    
                    </a>
                </li>    
                <li class="nav-item menu-icon">
                    <a href="javascript:void(0)" id="sidebarLeft" class="hidden-sm">
                        <i class="mdi mdi-menu"></i>    
                    </a>
                </li>    
            </ul>
            <ul class="navbar-nav nav-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                        <i class="mdi mdi-bell-outline"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Action</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                        <i class="mdi mdi-message-outline"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Action</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                        <img src="<?php echo site_url().'assets/img/users-avatar/avatar.png'; ?>" alt="avatar">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <ul class="dropdown-user">
                            <?php if($this->session->userdata('permission') == 1) : ?>
                            <li>
                                <a href="<?= site_url('admin/dashboard'); ?>"><i class="mdi mdi-gauge"></i> Admin</a>
                            </li>
                            <?php endif; ?>
                            <li>
                                <a href="#"><i class="mdi mdi-account-outline"></i> My Profile</a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a href="<?= site_url('logout'); ?>"><i class="mdi mdi-logout-variant"></i> Logout</a>
                            </li>
                        </ul>    
                    </div>
                </li>
            </ul>
        </nav>

</header>
    
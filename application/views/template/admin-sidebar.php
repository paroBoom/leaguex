<!-- Sidebar Admin -->
<div class="sidebar-left">
    <div class="sidebar-wrapper">

        <div class="sidebar-inner">
            <div class="sb-club">
                <div class="club-pic">
                    <?php if($user->club_logo){ $clubLogo = $user->club_logo; } else { $clubLogo = 'logo_default.png'; } ?>    
                    <img src="<?= site_url().'assets/img/club-logo/'.$clubLogo ?>" alt="logo">
                </div> 
                <div class="club-info">
                    <a data-toggle="collapse" href="#sbcollapse" class="collapsed">
                        <span class="team-title">
                            <?php if($user->club_name){ $clubName = $user->club_name; } else { $clubName = lang('unemployed'); } ?>
                            <?php echo $clubName ?>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse in" id="sbcollapse">
                        <ul class="nav">
                            <li><a href="#"><span class="sb-club-menu">My Club</span></a></li>
                            <li><a href="#"><span class="sb-club-menu">Stats</span></a></li>
                            <li><a href="#"><span class="sb-club-menu">Stats</span></a></li>
                        </ul>
                    </div>
                </div>   
            </div>
            <ul class="nav">
                <li class="nav-item <?php if($this->uri->segment(1)=="home"){echo "active";}?>">
                    <a href="<?= site_url().'home'; ?>" class="ripple"><i class="mdi mdi-keyboard-return"></i> <p><?php echo lang('adminsbar_menu_gotosite'); ?></p></a>
                </li>
                <li class="nav-item <?php if($this->uri->segment(2)=="dashboard"){echo "active";}?>">
                    <a href="<?= site_url().'admin/dashboard'; ?>" class="ripple"><i class="mdi mdi-home"></i> <p><?php echo lang('adminsbar_menu_home'); ?></p></a>
                </li>
                <li class="nav-item <?php if(in_array($this->uri->segment(2), array("siteoptions", "emailoptions"))){echo "active submenu_open";}?>">
                    <a data-toggle="collapse" href="#settings" class="ripple"><i class="mdi mdi-settings"></i> <p><?php echo lang('adminsbar_menu_settings'); ?></p></a>
                    <div class="collapse <?php if(in_array($this->uri->segment(2), array("siteoptions", "emailoptions"))){echo "show";}?>" id="settings">
                        <ul class="nav nav-collapse">
                            <li class="<?php if($this->uri->segment(2)=="siteoptions"){echo "active";}?>"><a href="<?= site_url().'admin/siteoptions'; ?>"><span class="submenu"><?php echo lang('adminsbar_submenu_site_options'); ?></span></a></li>
                            <li class="<?php if($this->uri->segment(2)=="dashboard"){echo "active";}?>"><a href="#"><span class="submenu">Media</span></a></li>
                            <li class="<?php if($this->uri->segment(2)=="emailoptions"){echo "active";}?>"><a href="<?= site_url().'admin/emailoptions'; ?>"><span class="submenu">Email</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item <?php if($this->uri->segment(2)=="userslist"){echo "active";}?>">
                        <a href="<?= site_url().'admin/userslist'; ?>" class="ripple"><i class="mdi mdi-account-multiple"></i> <p><?php echo lang('adminsbar_menu_users'); ?></p></a>
                </li>
                <li class="nav-item <?php if($this->uri->segment(2)=="clubslist"){echo "active";}?>">
                        <a href="<?= site_url().'admin/clubslist'; ?>" class="ripple"><i class="mdi mdi-shield"></i> <p><?php echo lang('adminsbar_menu_clubs'); ?></p></a>
                </li>
                <li class="nav-item <?php if($this->uri->segment(2)=="managerslist"){echo "active";}?>">
                        <a href="<?= site_url().'admin/managerslist'; ?>" class="ripple"><i class="mdi mdi-face"></i> <p><?php echo lang('adminsbar_menu_managers'); ?></p></a>
                </li>                     
            </ul>
        </div>

    </div>
</div>
<!-- End Sidebar Admin -->
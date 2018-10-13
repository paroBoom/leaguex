<!-- Sidebar -->
<div class="sidebar-left">

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
                <a href="<?= site_url().'home'; ?>" class="ripple"><i class="mdi mdi-home-outline"></i> <p><?php echo lang('sbar_menu_home'); ?></p></a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(1)=="club"){echo "active";}?>">
                <a href="<?= site_url().'club'; ?>" class="ripple"><i class="mdi mdi-soccer"></i> <p>My club</p></a>
            </li>                
        </ul>
    </div>

</div>
<!-- End Sidebar -->
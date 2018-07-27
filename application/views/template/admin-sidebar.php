<!-- Sidebar Admin -->
<div class="sidebar-left">

    <div class="sidebar-inner">
        <div class="sb-club">
            <div class="club-pic">
                <img src="<?php echo site_url().'assets/img/club-logo/barcelona.png'; ?>" alt="logo">
            </div> 
            <div class="club-info">
                <a data-toggle="collapse" href="#sbcollapse" class="collapsed">
                    <span>Barcellona</span>
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
                <a href="<?= site_url().'home'; ?>" class="ripple"><i class="mdi mdi-keyboard-return"></i> <p>Vai al sito</p></a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(2)=="dashboard"){echo "active";}?>">
                <a href="<?= site_url().'admin/dashboard'; ?>" class="ripple"><i class="mdi mdi-home-outline"></i> <p>Dashboard</p></a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(2)=="settings"){echo "active";}?>">
                <a data-toggle="collapse" href="#settings" class="ripple"><i class="mdi mdi-settings-outline"></i> <p>Impostazioni</p></a>
                <div class="collapse" id="settings">
                    <ul class="nav nav-collapse">
                        <li><a href="<?= site_url().'admin/configsite'; ?>"><span class="submenu">Generale</span></a></li>
                        <li><a href="#"><span class="submenu">Media</span></a></li>
                        <li><a href="#"><span class="submenu">Email</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item <?php if($this->uri->segment(2)=="userslist"){echo "active";}?>">
                    <a href="<?= site_url().'admin/userslist'; ?>" class="ripple"><i class="mdi mdi-account-multiple-outline"></i> <p>Utenti</p></a>
            </li>                    
        </ul>
    </div>

</div>
<!-- End Sidebar Admin -->
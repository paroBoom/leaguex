<!-- Sidebar -->
<div class="sidebar-left">

    <div class="sidebar-inner">
        <div class="sb-club">
            <div class="club-pic">
                <img src="<?php echo site_url().'assets/img/club-logo/barcelona.png'; ?>" alt="logo">
            </div> 
            <div class="club-info">
                <a data-toggle="collapse" href="#sbcollapse" class="collapsed">
                    <span>Barcellona <span class="icon"><i class="mdi mdi-plus"></i></span></span>
                </a>
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
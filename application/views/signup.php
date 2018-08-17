<div class="main-wrqpper auth-wrapper">

    <div class="container container-auth">

        <form action="<?php echo site_url("user/create_user"); ?>" method="post" id="signUp" autocomplete="off" novalidate="novalidate">
            <h3 class="text-center">LEAGUEX</h3>
            <p class="text-center"><?php echo lang('register_subtitle'); ?></p>
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating"><?php echo lang('form_label_username'); ?></label>       
                <input name="username" type="text" class="form-control">
            </div>
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating"><?php echo lang('form_label_email'); ?></label>       
                <input name="email" type="email" class="form-control">
            </div>
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating"><?php echo lang('form_label_password'); ?></label>  
                <input name="password" type="password" autocomplete="new-password" class="form-control">
            </div>
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating"><?php echo lang('form_label_confirm_password'); ?></label>                          
                <input name="confirmPassword" type="password" autocomplete="new-password" class="form-control">
            </div>
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating"><?php echo lang('form_label_birthday'); ?></label>     
                <input name="birthDay" type="text" class="form-control format">
            </div>
            <div class="form-action">
                <button class="btn btn-raised btn-info load-btn" type="submit"><?php echo lang('register_button_signup'); ?></button>    
            </div>
            <div class="auth-form-link text-center">
                <span><?php echo lang('register_textlink_signin'); ?> <a href="<?php site_url(); ?>signin"><?php echo lang('register_link_signin'); ?></a></span>    
            </div>
        </form>
    
    </div>

</div>       
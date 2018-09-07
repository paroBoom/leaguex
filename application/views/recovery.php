<div class="main-wrapper auth-wrapper">

    <div class="container container-auth">
                    
        <form action="<?php echo site_url("user/do_forget"); ?>" method="post" role="form" id="accountRecovery" autocomplete="off">
            <h3 class="text-center">LEAGUEX</h3>
            <p class="text-center"><?php echo lang('recovery_subtitle'); ?></p>
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating"><?php echo lang('form_label_email'); ?></label>                                    
                <input name="email" id="email" type="email" class="form-control">
            </div>
            <div class="form-action">
                <button class="btn btn-raised btn-info load-btn" type="submit"><?php echo lang('recovery_button_send'); ?></button>
            </div>
            <div class="auth-form-link text-center">
                <span><?php echo lang('recovery_textlink_signin'); ?> <a href="<?php site_url(); ?>signin"><?php echo lang('recovery_link_signin'); ?></a></span>
            </div>
        </form>

    </div>

</div>

<div class="main-wrapper auth-wrapper">

    <div class="container container-auth">
                    
        <form action="<?php echo site_url("user/signin"); ?>" method="post" role="form" id="signIn" autocomplete="off">
            <h3 class="text-center">LEAGUEX</h3>
            <p class="text-center"><?php echo lang('login_subtitle'); ?></p>
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating"><?php echo lang('form_label_email'); ?></label>                                    
                <input name="email" id="email" type="email" class="form-control">
            </div>
            <div class="form-group bmd-form-group" style="margin-bottom: 20px;">
                <label class="bmd-label-floating"><?php echo lang('form_label_password'); ?></label>                                        
                <input name="password" id="password" type="password" autocomplete="new-password" class="form-control">
            </div>
            <div class="row form-recovery m-0">
                <div class="col col-md-6 pl-0">
                    <div class="checkbox d-inline-block">
                        <label for="rememberme">
                            <input type="checkbox" id="rememberme" name="rememberme"><?php echo lang('login_rememberme'); ?>
                        </label>
                    </div>
                </div>
                <div class="col col-md-6 pr-0">
                    <a href="<?php site_url(); ?>recovery" class="forgot-password float-right"><?php echo lang('login_forgotpassword'); ?></a>
                </div>
            </div>
            <div class="form-action">
                <button class="btn btn-raised btn-info load-btn" type="submit"><?php echo lang('login_button_signin'); ?></button>
            </div>
            <div class="auth-form-link text-center">
                <span><?php echo lang('login_textlink_signup'); ?> <a href="<?php site_url(); ?>signup"><?php echo lang('login_link_signup'); ?></a></span>
            </div>
                   
        </form>

    </div>

</div>


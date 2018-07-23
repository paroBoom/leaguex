<div class="main-wrqpper auth-wrapper">

    <div class="container container-auth">

        <form action="<?php echo site_url("user/create_user"); ?>" method="post" role="form" id="signUp" autocomplete="off" novalidate="novalidate" class="fv-form fv-form-bootstrap">
            <h2 class="text-center">LEAGUEX</h2>
            <p class="text-center">Create an account</p>
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Username</label>       
                <input name="username" type="text" class="form-control">
            </div>
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Email</label>       
                <input name="email" type="email" class="form-control">
            </div>
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Password</label>  
                <input name="password" type="password" autocomplete="new-password" class="form-control">
            </div>
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Confirm Password</label>                          
                <input name="confirmPassword" type="password" autocomplete="new-password" class="form-control">
            </div>
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Date Of Birth</label>     
                <input name="birthDay" type="text" class="form-control format">
            </div>
            <div class="form-action">
                <button class="btn btn-raised btn-info" type="submit">Sign Up</button>    
            </div>
            <div class="auth-form-link text-center">
                <span>Already have an account? <a href="<?php site_url(); ?>signin">Sign In</a></span>    
            </div>
        </form>
    
    </div>

</div>       
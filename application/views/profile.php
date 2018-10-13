<div class="page-wrapper">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-profile">
                        <div class="profile-img">
                            <img class="img-circle" src="<?php echo site_url().'assets/img/users-avatar/avatar.png'; ?>" alt="avatar">    
                        </div>
                        <div class="card-body">
                            <div class="profile-info text-center">
                                <div class="profile-name"><?php echo $user->user_name; ?></div>
                                <div class="profile-permissions">
                                    <?php if($user->user_permission == 1){
                                        echo '<span class="badge badge-danger">'.lang('sel_user_group_1').'</span>';
                                    }elseif ($user->user_permission == 2){
                                        echo '<span class="badge badge-warning">'.lang('sel_user_group_2').'</span>';                                        
                                    }elseif ($user->user_permission == 3){
                                        echo '<span class="badge badge-success">'.lang('sel_user_group_3').'</span>';
                                    }elseif ($userid->user_permission == 4){
                                        echo '<span class="badge badge-dark">'.lang('sel_user_group_4').'</span>';
                                    }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card card-tab">
                        <div class="card-header">
                            <h5 class="mb-3"><?php echo lang('user_settings_tabs_title'); ?></h5>
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a href="#" class="nav-link active" data-toggle="tab" data-target="#tab-1"><?php echo lang('user_settings_tabs_account'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link" data-toggle="tab" data-target="#tab-2">Profilo</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body pt-0 tab-content">
                            <div class="tab-pane active" id="tab-1">
                                <form action="<?php echo site_url("user/update_user_account"); ?>" method="post" role="form" id="editAccount" autocomplete="off" novalidate="novalidate" class="fv-form fv-form-bootstrap">
                                    <div class="form-row">
                                        <div class="form-group col-xs-12 col-sm-6 bmd-form-group">
                                            <label class="bmd-label-floating"><?php echo lang('form_label_email'); ?></label>
                                            <input name="email" type="text" class="form-control" value="<?php echo $user->user_email; ?>">
                                        </div>
                                        <div class="form-group col-xs-12 col-sm-6 bmd-form-group">
                                            <label class="bmd-label-floating"><?php echo lang('form_label_birthday'); ?></label>
                                            <?php $date = $user->user_birthday; $newdate = date("d/m/Y", strtotime($date));?>
                                            <input name="birthDay" type="text" class="form-control format" value="<?php echo $newdate; ?>">
                                        </div>
                                        <div class="form-group col-xs-12 col-sm-6 bmd-form-group">
                                            <label class="bmd-label-floating"><?php echo lang('form_label_newpassword'); ?></label>
                                            <input name="newpassword" type="password" class="form-control" autocomplete="new-password">
                                            <input name="password" type="hidden" class="form-control" autocomplete="new-password" value="<?php echo $user->user_password; ?>">
                                        </div>
                                        <div class="form-group col-xs-12 col-sm-6 bmd-form-group">
                                            <label class="bmd-label-floating"><?php echo lang('form_label_confirm_password'); ?></label>
                                            <input name="confirmpassword" type="password" class="form-control" autocomplete="new-password">
                                        </div>
                                        <div class="col-lg-12 mt-3 mb-3 text-left">
                                            <input type="hidden" value="<?php echo $user->ID; ?>" name="userid">
                                            <button class="btn btn-raised btn-info btn-rounded load-btn" type="submit"><?php echo lang('modal_button_confirm'); ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="tab-2">test2</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
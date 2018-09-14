<div class="page-wrapper">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card form-options">
                        <form action="<?php echo site_url('admin/settings/update_email_options'); ?>" method="post" role="form" id="emailOptions" autocomplete="off" novalidate="novalidate" class="fv-form fv-form-bootstrap">
                            <div class="card-header">
                                <h2 class="card-title"><?php echo lang('bksettings_emailoptions_header_title'); ?></h2>
                                <div class="heading-actions">
                                    <ul class="list-inline mb-0">
                                        <li class="p-0">
                                            <button class="btn btn-rounded" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo lang('tt_save'); ?>">
                                                <i class="mdi mdi-check"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="description text-muted"><?php echo lang('bksettings_emailoptions_smtp_description'); ?></p>
                                <div class="form-row">
                                    <div class="form-group col-xs-12 col-sm-6">
                                        <label><?php echo lang('bksettings_emailoptions_form_label_email'); ?></label>
                                        <input type="text" class="form-control" name="email" value="<?php echo $siteconfig->smtp_email; ?>" placeholder="<?php echo lang('bksettings_emailoptions_form_placeholder_email'); ?>">
                                        <small class="form-text text-muted"><?php echo lang('bksettings_emailoptions_form_help_email'); ?></small>
                                    </div>
                                    <div class="form-group col-xs-12 col-sm-6">
                                        <label><?php echo lang('bksettings_emailoptions_form_label_name'); ?></label>
                                        <input type="text" class="form-control" name="name" value="<?php echo $siteconfig->smtp_name; ?>" placeholder="<?php echo lang('bksettings_emailoptions_form_placeholder_name'); ?>">
                                        <small class="form-text text-muted"><?php echo lang('bksettings_emailoptions_form_help_name'); ?></small>
                                    </div>
                                    <div class="form-group col-xs-12 col-sm-6">
                                        <label><?php echo lang('bksettings_emailoptions_form_label_host'); ?></label>
                                        <input type="text" class="form-control" name="host" value="<?php echo $siteconfig->smtp_host; ?>" placeholder="<?php echo lang('bksettings_emailoptions_form_placeholder_host'); ?>">
                                        <small class="form-text text-muted"><?php echo lang('bksettings_emailoptions_form_help_host'); ?></small>
                                    </div>
                                    <div class="form-group col-xs-12 col-sm-6">
                                        <label><?php echo lang('bksettings_emailoptions_form_label_port'); ?></label>
                                        <input type="text" class="form-control" name="port" value="<?php echo $siteconfig->smtp_port; ?>" placeholder="<?php echo lang('bksettings_emailoptions_form_placeholder_port'); ?>">
                                        <small class="form-text text-muted"><?php echo lang('bksettings_emailoptions_form_help_port'); ?></small>
                                    </div>
                                    <small class="form-text text-muted mt-3 w-100"><?php echo lang('bksettings_emailoptions_smtp_description_2'); ?></small>
                                    <div class="form-group col-xs-12 col-sm-6">
                                        <label><?php echo lang('bksettings_emailoptions_form_label_username'); ?></label>
                                        <input type="text" class="form-control" name="username" value="<?php echo $siteconfig->smtp_user; ?>" placeholder="<?php echo lang('bksettings_emailoptions_form_placeholder_username'); ?>">
                                        <small class="form-text text-muted"><?php echo lang('bksettings_emailoptions_form_help_username'); ?></small>
                                    </div>
                                    <div class="form-group col-xs-12 col-sm-6">
                                        <label><?php echo lang('bksettings_emailoptions_form_label_password'); ?></label>
                                        <input type="password" class="form-control" name="password" autocomplete="new-password" value="<?php echo $siteconfig->smtp_pass; ?>">
                                        <small class="form-text text-muted"><?php echo lang('bksettings_emailoptions_form_help_password'); ?></small>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="card-body pt-0">   
                                <p class="description text-muted mt-3"><?php echo lang('bksettings_emailoptions_test_description'); ?></p>
                                <form action="<?php echo site_url('admin/settings/test_email_options'); ?>" method="post" role="form" id="testEmailOptions" autocomplete="off" novalidate="novalidate" class="form-inline fv-form fv-form-bootstrap">
                                    <div class="form-row">
                                        <div class="form-group col-sm-6">
                                            <label><?php echo lang('bksettings_emailoptions_test_form_label_email'); ?></label>    
                                            <input type="text" class="form-control" name="testemail" value="">
                                            <small class="form-text text-muted"><?php echo lang('bksettings_emailoptions_test_form_help_email'); ?></small>
                                        </div>
                                        <span class="form-group bmd-form-group">
                                            <button class="btn btn-primary"><?php echo lang('bksettings_emailoptions_test_submit_btn_text'); ?></button>
                                        </span>    
                                    </div>
                                </form>
                            </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>

</div>
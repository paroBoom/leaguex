<div class="page-wrapper">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card form-options">
                        <form action="<?php echo site_url("admin/settings/update_site_options"); ?>" method="post" role="form" id="siteOptions" autocomplete="off" novalidate="novalidate" class="fv-form fv-form-bootstrap">
                            <div class="card-header">
                                <h2 class="card-title"><?php echo lang('bksettings_siteoptions_header_title'); ?></h2>
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
                                <div class="form-row">
                                    <div class="form-group col-xs-12 col-sm-4">
                                        <label><?php echo lang('bksettings_siteoptions_form_label_sitename'); ?></label>
                                        <input type="text" class="form-control" name="sitename" value="<?php echo $siteconfig->site_name; ?>" placeholder="<?php echo lang('bksettings_siteoptions_form_placeholder_sitename'); ?>">
                                    </div>
                                    <div class="form-group col-xs-12 col-sm-4">
                                        <label><?php echo lang('bksettings_siteoptions_form_label_sitetitle'); ?></label>
                                        <input type="text" class="form-control" name="sitetitle" value="<?php echo $siteconfig->site_title; ?>" placeholder="<?php echo lang('bksettings_siteoptions_form_placeholder_sitetitle'); ?>">
                                    </div>
                                    <div class="form-group col-xs-12 col-sm-4">
                                        <label><?php echo lang('bksettings_siteoptions_form_label_language'); ?></label>
                                        <select class="select form-control" name="language">
                                            <option value="0" <?php if($siteconfig->language == 0) {echo "SELECTED";} ?>>Italiano</option>
                                            <option value="1" <?php if($siteconfig->language == 1) {echo "SELECTED";} ?>>Inglese</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
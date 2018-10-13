<div class="page-wrapper">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card material-table">
                        <div class="card-header">
                            <h2 class="card-title"><?php echo lang('bkmanagerslist_header_title'); ?></h2>
                            <div class="card-search">
                                <div id="usersList_wrapper" class="form-group">
                                    <i class="mdi mdi-magnify icon-left"></i>
                                    <input type="text" class="form-control filter-input" placeholder="<?php echo lang('datatables_filter_placeholder'); ?>" autocomplete="off">
                                    <a class="close-search" href="javascript:void(0)" data-card-search="close" ><i class="mdi mdi-close"></i></a>
                                </div>
                            </div>
                            <div class="card-delete">
                                <div class="delete-wrapper">
                                    <span class="text-delete"></span>
                                    <span class="fill-remaining"></span>
                                    <button class="btn btn-rounded" id="btnDelete"><i class="mdi mdi-delete-variant"></i></button>    
                                </div>
                            </div>
                            <div class="heading-actions">
                                <ul class="list-inline mb-0">
                                    <li class="p-0" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo lang('tt_search'); ?>">
                                        <a href="javascript:void(0)" data-card-search="open"><i class="mdi mdi-magnify"></i></a>
                                    </li>
                                    <li class="dropdown p-0" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo lang('tt_filter'); ?>">
                                        <a href="javascript:void(0)" data-toggle="dropdown"><i class="mdi mdi-filter-variant"></i></a>
                                        <div id="dataTablesLength"></div>
                                    </li>
                                    <li class="p-0" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo lang('tt_add'); ?>">
                                        <a href="javascript:void(0)" data-target="#bkAddManager" data-toggle="modal"><i class="mdi mdi-plus"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="managersList" class="dataTable mdl-data-table" width="100%" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th><span class="checkbox"><label><input type="checkbox" name="select_all" value="1" id="dt-select-all"></label></span></th>
                                        <th class="d-none"></th>
                                        <th><?php echo lang('bkmanagerslist_dtcolumn_managername'); ?></th>
                                        <th><?php echo lang('bkmanagerslist_dtcolumn_clubname'); ?></th>
                                        <th><?php echo lang('bkmanagerslist_dtcolumn_wallet'); ?></th>
                                        <th><?php echo lang('datatables_dtcolumn_created'); ?></th>
                                        <th><?php echo lang('datatables_dtcolumn_actions'); ?></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                </div>
            </div>    
        </div>
    </div>

</div>

<!-- Modal Add New -->
<div class="modal fade" id="bkAddManager" tabindex="-1" role="dialog">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="<?php echo site_url("admin/managers/create_manager"); ?>" method="post" id="addManagerForm" autocomplete="off" novalidate="novalidate">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo lang('bkmanagerslist_modal_title'); ?></h4>
                    <ul class="heading-actions">
                        <a href="javascript:void(0)" data-dismiss="modal" aria-label="Close"><i class="mdi mdi-close text-white"></i></a>
                    </ul> 
                </div>
                <div class="modal-body">
                    <!-- Modal loader -->
                    <div class="page-loader">
                        <div class="loader">
                            <div class="preloader">
                                <div class="spinner-page">
                                    <div class="circle-wrap left">
                                        <div class="circle"></div>
                                    </div>
                                    <div class="circle-wrap right">
                                        <div class="circle"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="mdi mdi-account"></i></span>
                        </div>
                        <select class="selectpicker form-control" name="username" title="<?php echo lang('sel_username');?>"></select>
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="mdi mdi-shield"></i></span>
                        </div>
                        <select class="selectpicker form-control" name="clubname" title="<?php echo lang('sel_clubname');?>"></select>
                    </div>
                    <div class="form-group input-group mb-0">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="mdi mdi-bank"></i></span>
                        </div>
                        <input type="text" class="form-control format" data-mask="<?php echo lang('mask_form'); ?>" data-mask-reverse="true" name="wallet" placeholder="<?php echo lang('form_label_wallet'); ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><?php echo lang('modal_button_confirm'); ?></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('modal_button_cancel'); ?></button>
                </div>
            </form>
        </div>
    </div>

</div>

<!-- Modal Edit Club -->
<div class="modal fade" id="bkEditManager" tabindex="-1" role="dialog">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="<?php echo site_url("admin/managers/edit_manager"); ?>" method="post" id="editManagerForm" autocomplete="off" novalidate="novalidate">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo lang('bkmanagerslist_modal_edit_title'); ?></h4>
                    <ul class="heading-actions">
                        <a href="javascript:void(0)" data-dismiss="modal" aria-label="Close"><i class="mdi mdi-close text-white"></i></a>
                    </ul> 
                </div>
                <div class="modal-body">
                    <!-- Modal loader -->
                    <div class="page-loader">
                        <div class="loader">
                            <div class="preloader">
                                <div class="spinner-page">
                                    <div class="circle-wrap left">
                                        <div class="circle"></div>
                                    </div>
                                    <div class="circle-wrap right">
                                        <div class="circle"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="mdi mdi-shield"></i></span>   
                        </div>
                        <select class="selectpicker form-control" name="clubname"></select>
                    </div>
                    <div class="form-group input-group mb-0">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="mdi mdi-bank"></i></span>
                        </div>
                        <input type="text" class="form-control format" data-mask="<?php echo lang('mask_form'); ?>" data-mask-reverse="true" name="wallet" placeholder="<?php echo lang('form_label_wallet'); ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><?php echo lang('modal_button_confirm'); ?></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('modal_button_cancel'); ?></button>
                    <input type="hidden" value="" name="managerid">
                </div>
            </form>
        </div>
    </div>

</div>

<!-- Modal Delete -->
<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog">

    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo lang('modal_title'); ?></h4>
            </div>
            <div class="modal-body"><p><?php echo lang('bkmanagerslist_modal_delete_managers'); ?></p></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-confirm"><?php echo lang('modal_button_confirm'); ?></button>
                <button type="button" class="btn btn-default" id="btn-delete" data-dismiss="modal"><?php echo lang('modal_button_cancel'); ?></button>
            </div>
        </div>
    </div>

</div>
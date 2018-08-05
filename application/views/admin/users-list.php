<div class="page-wrapper">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card material-table">
                        <div class="card-header">
                            <h2 class="card-title"><?php echo lang('bkuserslist_header_title'); ?></h2>
                            <div class="card-search">
                                <div id="usersList_wrapper" class="form-group">
                                    <i class="mdi mdi-magnify icon-left"></i>
                                    <input type="text" class="form-control filter-input" placeholder="<?php echo lang('datatables_filter_placeholder'); ?>" autocomplete="off">
                                    <a class="close-search" href="javascript:void(0)" data-card-search="close"><i class="mdi mdi-close"></i></a>
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
                                    <li class="p-0">
                                        <a href="javascript:void(0)" data-card-search="open"><i class="mdi mdi-magnify"></i></a>
                                    </li>
                                    <li class="dropdown p-0">
                                        <a href="javascript:void(0)" data-toggle="dropdown"><i class="mdi mdi-filter-variant"></i></a>
                                        <div id="dataTablesLength"></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="usersList" class="dataTable mdl-data-table" width="100%" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th><span class="checkbox"><label><input type="checkbox" name="select_all" value="1" id="dt-select-all"></label></span></th>
                                        <th><?php echo lang('bkuserslist_dtcolumn_username'); ?></th>
                                        <th><?php echo lang('bkuserslist_dtcolumn_role'); ?></th>
                                        <th><?php echo lang('bkuserslist_dtcolumn_email'); ?></th>
                                        <th><?php echo lang('bkuserslist_dtcolumn_registration_date'); ?></th>
                                        <th><?php echo lang('bkuserslist_dtcolumn_last_visite'); ?></th>
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

<!-- Modal Delete -->
<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog">

    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Avviso</h4>
            </div>
            <div class="modal-body"><p>Vuoi eliminare questo utente?</p></div>
        
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-confirm">Ok</button>
                <button type="button" class="btn btn-default btn-flat" id="btn-delete" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>

</div>
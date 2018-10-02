<?php

class Managers extends MY_Controller {

    public function __construct()
    {
        
        parent::__construct();

        // Check permission
        if (!is_logged_in() OR !is_admin()) { redirect('home','refresh'); }

        // Check activity
        user_activity();

        echo addfooter_js(array('js/vendor/datatables/jquery.dataTables.min.js','js/vendor/datatables/dataTables.material.min.js','js/vendor/datatables/dataTables.responsive.min.js','js/vendor/datatables/responsive.bootstrap4.min.js','js/vendor/moment.min.js','js/vendor/datatables/datetime-moment.js','js/vendor/jquery.mask.min.js','js/vendor/jquery.number.min.js','js/adminDataTables.js')); 
        $this->load->model('admin/managers_model', 'managers');

    }

    
    function index() {
        
        $data = array('page_title' => $this->lang->line('adminpage_title_managers'), 'page_view' => 'admin/managers-list', 'folder' => 'admin');
        $this->_render($data);
    
    }

    // Display managers
    function get_managers() {

        $this->datatables->select('manager_id, user_name, club_name, manager_wallet, manager_registered')
            ->from('lex_managers')
            ->join('lex_users', 'ID = manager_user_id')
            ->join('lex_clubs', 'club_id = manager_club_id', 'left')
            ->add_column('action',
                '<a href="javascript:void(0)" data-id="$1" class="edit-icon" data-target="#bkEditManager" data-toggle="modal"><i class="mdi mdi-pencil"></i></a>',
                'manager_id');

        echo $this->datatables->generate();

    }

    function get_clubs() {

        $result = $this->managers->get_clubs();
        $dataclubs = array();

        foreach ($result as $val) {
            $row = array();
            $row['clubid'] = $val->club_id;
            $row['clubname'] = $val->club_name;
            $dataclubs[] = $row;
        }

        $response = array(
            'success' => true,
            'errors' => '',
            'dataclubs' => $dataclubs
        );

        echo json_encode($response);

    }

    function get_users() {

        $result = $this->managers->get_users();
        $datausers = array();

        foreach ($result as $val) {
            $row = array();
            $row['userid'] = $val->ID;
            $row['username'] = $val->user_name;
            $datausers[] = $row;
        }

        $response = array(
            'success' => true,
            'errors' => '',
            'datausers' => $datausers
        );

        echo json_encode($response);

    }

    function get_manager() {

        $managerid = $this->input->post('managerid');
        
        $resultmanager = $this->managers->get_manager($managerid);
        foreach ($resultmanager as $val) {
            $clubid = $val->manager_club_id;
        }
        $resultclub = $this->managers->get_clubid($clubid);
        $data = array();
        $datamanager = array();
                        
        foreach ($resultclub as $val1) {
            foreach ($resultmanager as $val2) {
            $row = array();
                $clubid = $val1->club_id; 
                $mgclubid = $val2->manager_club_id; 
                $row['clubid'] = $val1->club_id = null ? $val2->manager_club_id : $val1->club_id;  
                $row['clubname'] = $val1->club_id = null ? $val2->club_name : $val1->club_name;  
                $row['selected'] = $clubid == $mgclubid ? 'SELECTED' : '';
                $data[] = $row;
            }
        }

        foreach ($resultmanager as $val3) {
            $row = array();
            $row['wallet'] = $val3->manager_wallet;
            $row['managerid'] = $val3->manager_id;
            $datamanager[] = $row;
        }

        $response = array(
            'success' => true,
            'errors' => '',
            'data' => $data,
            'datamanager' => $datamanager
        );

        echo json_encode($response);

    }
    
    // Add new manager
    function create_manager() {

        $output = array('error' => false);

        $manager_register = array(
            'manager_user_id' => $this->input->post('username'),
            'manager_club_id' => $this->input->post('clubname'),
            'manager_wallet' => str_replace($this->lang->line('mask_page'), '', $this->input->post('wallet'))
        );

        if($this->managers->create_manager($manager_register)) {
            $output['message'] = $this->lang->line('bkmanagerslist_alert_new_manager');
        } else {
            $output['error'] = true;
            $output['message'] = $this->lang->line('alert_error');
        }

        echo json_encode($output);

    }

    // Edit manager
    function edit_manager() {

        $managerid = $this->input->post('managerid');
        $output = array('error' => false);

        $data = array(
            'manager_club_id' =>  $this->input->post('clubname'), 
            'manager_wallet' =>  str_replace($this->lang->line('mask_page'), '', $this->input->post('wallet'))
            );    
        
        if($this->managers->edit_manager($managerid, $data)) {
            $output['message'] = $this->lang->line('alert_saved_changes');
        } else {
            $output['error'] = true;
            $output['message'] = $this->lang->line('alert_error');
        }

        echo json_encode($output);

    }

    // Delete managers
    function delete_managers() {

        $output = array('error' => false);

        $delete_id = $this->input->post('id');

        if(!empty($delete_id) && $this->managers->delete_managers($delete_id)) {
            $output['message'] = $this->lang->line('alert_saved_changes');
        } else {
            $output['error'] = true;
            $output['message'] = $this->lang->line('alert_error');
        }
        
        echo json_encode($output);
        
    }


}
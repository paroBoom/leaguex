<?php

class Clubs extends MY_Controller {

    public function __construct()
    {
        
        parent::__construct();

        // Check permission
        if (!is_logged_in() OR !is_admin()) { redirect('home','refresh'); }

        // Check activity
        user_activity();

        echo addfooter_js(array('js/vendor/datatables/jquery.dataTables.min.js','js/vendor/datatables/dataTables.material.min.js','js/vendor/datatables/dataTables.responsive.min.js','js/vendor/datatables/responsive.bootstrap4.min.js','js/vendor/moment.min.js','js/vendor/datatables/datetime-moment.js','js/vendor/jquery.mask.min.js','js/adminDataTables.js')); 
        $this->load->model('admin/clubs_model', 'clubs');

    }

    
    function index() {
        
        $data = array('page_title' => $this->lang->line('adminpage_title_clubs'), 'page_view' => 'admin/clubs-list', 'folder' => 'admin');
        $this->_render($data);
    
    }

    // Display users
    function get_clubs() {

        $this->datatables->select('club_id, club_name, club_registered')
            ->from('lex_clubs')
            ->add_column('action', '<a href="javascript:void(0)" data-id="$1" class="edit-icon" data-target="#bkEditClub" data-toggle="modal"><i class="mdi mdi-pencil"></i></a>', 'ID');

        echo $this->datatables->generate();

    }
    
    // Add new club
    function create_club() {

        $output = array('error' => false);

        $club_register = array(
            'club_name' => $this->input->post('clubname'),
        );

        if($this->clubs->create_club($club_register)) {
            $output['message'] = $this->lang->line('bkclubslist_alert_new_club');
        } else {
            $output['error'] = true;
            $output['message'] = $this->lang->line('alert_error');
        }

        echo json_encode($output);

    }

}
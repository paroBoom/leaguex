<?php

class Users extends MY_Controller {

    public function __construct()
    {
        
        parent::__construct();

        echo addfooter_js(array('js/vendor/datatables/jquery.dataTables.min.js','js/vendor/datatables/dataTables.material.min.js','js/vendor/datatables/datatables.responsive.min.js','js/vendor/datatables/responsive.bootstrap4.min.js','js/vendor/moment.min.js','js/vendor/datatables/datetime-moment.js','js/adminDataTables.js','js/vendor/jquery.mask.min.js')); 
        $this->load->model('admin/users_model', 'users');

    }

    
    public function index() {
        
        if (!is_logged_in() OR !is_admin()) { redirect('home','refresh'); }

        //Check activity
        user_activity();

        $data = array('page_title' => 'Manage User', 'page_view' => 'admin/users-list', 'folder' => 'admin');
        $this->_render($data);
    
    }
    
    // Display users table
    public function get_users() {

        $this->datatables->select('ID, user_name, user_permission, user_email, user_registered, la_time')
             ->from('lex_users')
             ->join('lex_last_activity', 'la_user_id = ID');

        echo $this->datatables->generate();

    }

    function delete_users(){

        $output = array('error' => false);

        $delete_id = $this->input->post('id');

        if(!empty($delete_id) && $this->users->delete_users($delete_id)) {
            $output['message'] = 'Utenti rimossi';
        } else {
            $output['error'] = true;
            $output['message'] = 'Qualcosa non ha funzionato';
        }
        
        echo json_encode($output);
        
    }

}
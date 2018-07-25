<?php

class Users extends MY_Controller {

    public function __construct()
    {
        
        parent::__construct();

        echo addfooter_js(array('js/vendor/datatables/jquery.dataTables.min.js','js/vendor/datatables/dataTables.material.min.js','js/vendor/datatables/datatables.responsive.min.js','js/vendor/datatables/responsive.bootstrap4.min.js','js/vendor/moment.min.js','js/vendor/datatables/datetime-moment.js','js/adminDataTables.js','js/vendor/formvalidation/formValidation.min.js','js/vendor/formvalidation/bootstrap4.min.js','js/vendor/formvalidation/language/it_IT.js','js/vendor/jquery.mask.min.js')); 
    
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

        $this->datatables->select('ID, user_name, user_permission, user_email, user_registered')
            ->from('lex_users');

        echo $this->datatables->generate();

    }

    function deleteuser(){
        $delete_id = $this->input->post('id');
        if(!empty($delete_id)) {
            $this->db->where_in('ID', $delete_id);
            $this->db->delete('lex_users'); 
            echo json_encode('true');  
        } else {
            echo json_encode('failed');
        }               
    }

}
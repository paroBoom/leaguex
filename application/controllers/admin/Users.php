<?php

class Users extends MY_Controller {

    public function __construct()
    {
        
        parent::__construct();

        echo addfooter_js(array('js/vendor/datatables/jquery.dataTables.min.js','js/vendor/datatables/dataTables.material.min.js','js/vendor/datatables/datatables.responsive.min.js','js/vendor/datatables/responsive.bootstrap4.min.js','js/vendor/moment.min.js','js/vendor/datatables/datetime-moment.js','js/vendor/jquery.mask.min.js','js/adminDataTables.js')); 
        $this->load->model('admin/users_model', 'users');

    }

    
    public function index() {
        
        if (!is_logged_in() OR !is_admin()) { redirect('home','refresh'); }

        //Check activity
        user_activity();

        $data = array('page_title' => $this->lang->line('adminpage_title_users'), 'page_view' => 'admin/users-list', 'folder' => 'admin');
        $this->_render($data);
    
    }
    
    // Display users
    public function get_users() {

        $this->datatables->select('ID, user_name, user_permission, user_email, user_registered, la_time')
             ->from('lex_users')
             ->join('lex_last_activity', 'la_user_id = ID')
             ->add_column('action', '<a href="javascript:void(0)" data-id="$1" class="edit-icon" data-target="#bkEditUser" data-toggle="modal"><i class="mdi mdi-pencil"></i></a>', 'ID');

        echo $this->datatables->generate();

    }

    public function get_user() {

        $userid = $this->input->post('userid');
        $result = $this->users->get_user($userid);
        foreach ($result as $val) {
            $datauser = array (
            'userid' => $val->ID,
            'username' => $val->user_name,
            'useremail' => $val->user_email,
            'userpassword' => $val->user_password,
            'userbirthday' => $val->user_birthday,
            'userpermission' => $val->user_permission
            );
        }

        $response = array(
            'success' => true,
            'errors' => '',
            'datauser' => $datauser
        );

        echo json_encode($response);

    }

    // Add new user
    public function create_user() {

        $output = array('error' => false);

        $user_register = array(
            'user_name' => $this->input->post('username'),
            'user_email' => $this->input->post('email'),
            'user_password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'user_birthday' => date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('birthDay'))))
        );

        if($this->users->create_user($user_register)) {
            $output['message'] = $this->lang->line('bkuserslist_alert_new_user');
        } else {
            $output['error'] = true;
            $output['message'] = $this->lang->line('alert_error');
        }

        echo json_encode($output);
        
    }

    // Edit user
    public function edit_user() {

        $userid = $this->input->post('userid');
        $output = array('error' => false);

        if($this->input->post('newpassword') == '') {
            $data = array(
                'user_name' =>  $this->input->post('username'), 
                'user_email' =>  $this->input->post('email'),
                'user_permission' => $this->input->post('permission'),
                'user_password' => $this->input->post('password'),
                'user_birthday' => date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('birthDay'))))
            );
        } else {
            $data = array(
                'user_name' =>  $this->input->post('username'), 
                'user_email' =>  $this->input->post('email'),
                'user_permission' => $this->input->post('permission'),
                'user_password' => password_hash($this->input->post('newpassword'), PASSWORD_DEFAULT),
                'user_birthday' => date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('birthDay'))))
            );    
        }

        if($this->users->edit_user($userid, $data)) {
            $output['message'] = $this->lang->line('alert_saved_changes');
        } else {
            $output['error'] = true;
            $output['message'] = $this->lang->line('alert_error');
        }

        echo json_encode($output);

    }

    // Delete users
    function delete_users(){

        $output = array('error' => false);

        $delete_id = $this->input->post('id');

        if(!empty($delete_id) && $this->users->delete_users($delete_id)) {
            $output['message'] = $this->lang->line('alert_saved_changes');
        } else {
            $output['error'] = true;
            $output['message'] = $this->lang->line('alert_error');
        }
        
        echo json_encode($output);
        
    }

    public function echeck_username() {

        $userid = $this->input->post('userid');
        $isAvailable = true;        
        $username = $this->input->post('username');
        $this->db->where('user_name', $username);
        $this->db->where('ID !=', $userid);
        $query = $this->db->get('lex_users');

        if($query->num_rows() > 0){$isAvailable = false;}

        echo json_encode(array('valid' => $isAvailable));
    
    }
        
    public function echeck_email() {

        $userid = $this->input->post('userid');
        $isAvailable = true; 
        $email = $this->input->post('email');
        $this->db->where('user_email', $email);
        $this->db->where('ID !=', $userid);
        $query = $this->db->get('lex_users');

        if($query->num_rows() > 0){$isAvailable = false;}

        echo json_encode(array('valid' => $isAvailable));
        
    }

}
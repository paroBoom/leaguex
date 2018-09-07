<?php

class User extends MY_Controller {

    public function __construct()
    {

        parent::__construct();

        echo addfooter_js(array('js/vendor/jquery.mask.min.js','js/usersFormValidation.js'));
        $this->load->model('user_model', 'user');

    }

    function index() {

        if (is_logged_in()) { redirect('home','refresh'); }

        $data = array('page_title' => $this->lang->line('page_title_signin'), 'page_view' => 'signin');
        $this->_render($data);

    }

    // login 
    function signin() {

        $output = array('error' => false);
                
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $data = $this->user->signin($email);
        $checkban = $data['user_permission'];

        if(($data) && (password_verify($password, $data['user_password'])) && ($checkban != 4)) {
            $this->session->set_userdata('loggedin', TRUE);
            $this->session->set_userdata('userID', $data['ID']);
            $this->session->set_userdata('permission', $data['user_permission']);
        } elseif($checkban == 4) {
            $output['error'] = true;
            $output['message'] = $this->lang->line('alert_banned_user');
        } else {
            $output['error'] = true;
            $output['message'] = $this->lang->line('alert_error');
        }
     
        echo json_encode($output);		

    }

    // logout    
    function logout() {

        $this->session->unset_userdata('loggedin');
        $this->session->sess_destroy();
        redirect('signin', 'refresh');
    }

    function signup() {

        if (is_logged_in()) { redirect('home','refresh'); }

        $data = array('page_title' => $this->lang->line('page_title_signup'), 'page_view' => 'signup');
        $this->_render($data);  
    
    }

    // add new user
    function create_user() {

        $output = array('error' => false);

        $user_register = array(
            'user_name' => $this->input->post('username'),
            'user_email' => $this->input->post('email'),
            'user_password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'user_birthday' => date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('birthDay'))))
        );

        if($this->user->create_user($user_register)) {
            $output['message'] = $this->lang->line('register_alert_message');
        } else {
            $output['error'] = true;
            $output['message'] = $this->lang->line('alert_error');
        }

        echo json_encode($output);
        
    }
    
    // check duplicate username
    function check_username() {

        $isAvailable = true;
        $username = $this->input->post('username');

        $this->db->where('user_name', $username);
        $query = $this->db->get('lex_users');

        if($query->num_rows() > 0){ $isAvailable = false; }

        echo json_encode(array('valid' => $isAvailable));
    }

    // check duplicate email
    function check_email() {
        
        $isAvailable = true;
        $email = $this->input->post('email');

        $this->db->where('user_email', $email);
        $query = $this->db->get('lex_users');

        if($query->num_rows() > 0){$isAvailable = false;}

        echo json_encode(array('valid' => $isAvailable));
    }

    function recovery() {

        if (is_logged_in()) { redirect('home','refresh'); }

        $data = array('page_title' => $this->lang->line('page_title_recovery'), 'page_view' => 'recovery');
        $this->_render($data);  
    
    }

    // recovery password
    function do_forget() {

        $output = array('error' => false);

        $email = $this->input->post('email');
        $check = $this->user->do_forget($email);

        foreach ($check as $val) {
            $username = $val->user_name;            
        }

        if($check) {
            $user = $check[0];
            $this->reset_password($user, $username);
            $output['message'] = $this->lang->line('recovery_alert_success');
        } else {
            $output['error'] = true;
            $output['message'] = $this->lang->line('recovery_alert_error');    
        }

        echo json_encode($output);

    }

    private function reset_password($user, $username) {
        
        $query = $this->db->query('SELECT smtp_email, smtp_name FROM lex_config');
        
        foreach ($query->result() as $val) {
            $email = $val->smtp_email;
            $name = $val->smtp_name;
        }

        date_default_timezone_set('GMT');
        $this->load->helper('string');
        $password = random_string('alnum', 8);
        $this->db->where('ID', $user->ID);
        $this->db->update('lex_users', array('user_password' => password_hash($password, PASSWORD_DEFAULT)));
        $this->load->library('email');
        $this->email->from($email, $name);
        $this->email->to($user->user_email);
        $this->email->subject($this->lang->line('recovery_object_mailreset'));
        $this->email->message(sprintf($this->lang->line('recovery_text_mailreset').':'. $password, $username));	
        $this->email->send();

    }

}
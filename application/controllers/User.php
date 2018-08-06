<?php

class User extends MY_Controller {

    public function __construct()
    {

        parent::__construct();

        echo addfooter_js(array('js/vendor/jquery.mask.min.js','js/usersFormValidation.js'));
        $this->load->model('user_model', 'user');

    }

    public function index() {

        if (is_logged_in()) { redirect('home','refresh'); }

        $data = array('page_title' => $this->lang->line('page_title_signin'), 'page_view' => 'signin');
        $this->_render($data);

    }

    // login 
    public function signin() {

        $output = array('error' => false);
                
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $data = $this->user->signin($email);

        if(($data) && (password_verify($password, $data['user_password']))) {
            $this->session->set_userdata('loggedin', TRUE);
            $this->session->set_userdata('userID', $data['ID']);
            $this->session->set_userdata('permission', $data['user_permission']);
        } else {
            $output['error'] = true;
            $output['message'] = 'Qualcosa non ha funzionato';
        }

        echo json_encode($output);		

    }

    // logout    
    public function logout() {

        $this->session->unset_userdata('loggedin');
        $this->session->sess_destroy();
        redirect('signin', 'refresh');
    }

    public function signup() {

        if (is_logged_in()) { redirect('home','refresh'); }

        $data = array('page_title' => $this->lang->line('page_title_signup'), 'page_view' => 'signup');
        $this->_render($data);  
    
    }

    // add new user
    public function create_user() {

        $output = array('error' => false);

        $user_register = array(
            'user_name' => $this->input->post('username'),
            'user_email' => $this->input->post('email'),
            'user_password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'user_birthday' => date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('birthDay'))))
        );

        if($this->user->create_user($user_register)) {
            $output['message'] = 'Benvenuto nel club! Accedi';
        } else {
            $output['error'] = true;
            $output['message'] = 'Qualcosa non ha funzionato';
        }

        echo json_encode($output);
        
    }
    
    // check duplicate username
    public function check_username() {

        $isAvailable = true;
        $username = $this->input->post('username');

        $this->db->where('user_name', $username);
        $query = $this->db->get('lex_users');

        if($query->num_rows() > 0){ $isAvailable = false; }

        echo json_encode(array('valid' => $isAvailable));
    }

    // check duplicate email
    public function check_email() {
        
        $isAvailable = true;
        $email = $this->input->post('email');

        $this->db->where('user_email', $email);
        $query = $this->db->get('lex_users');

        if($query->num_rows() > 0){$isAvailable = false;}

        echo json_encode(array('valid' => $isAvailable));
    }

}
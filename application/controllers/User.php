<?php

class User extends MY_Controller {

    public function __construct()
    {

        parent::__construct();

        // Check permissions
        if (!is_logged_in()) { redirect('signin','refresh'); }

        echo addfooter_js(array('js/vendor/jquery.mask.min.js','js/usersFormValidation.js'));
        $this->load->model('user_model', 'user');

    }

    function index() {

        $data = array('page_title' => $this->lang->line('page_title_profile'), 'page_view' => 'profile', 'folder' => 'site');
        $this->_render($data);  

    }

     // Edit user account
     function update_user_account() {

        $userid = $this->input->post('userid');
        $output = array('error' => false);

        if($this->input->post('newpassword') == '') {
            $data = array(
                'user_email' =>  $this->input->post('email'),
                'user_password' => $this->input->post('password'),
                'user_birthday' => date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('birthDay'))))
            );
        } else {
            $data = array(
                'user_email' =>  $this->input->post('email'),
                'user_password' => password_hash($this->input->post('newpassword'), PASSWORD_DEFAULT),
                'user_birthday' => date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('birthDay'))))
            );    
        }

        if($this->user->update_user_account($userid, $data)) {
            $output['message'] = $this->lang->line('alert_saved_changes');
        } else {
            $output['error'] = true;
            $output['message'] = $this->lang->line('alert_error');
        }

        echo json_encode($output);

    }

}
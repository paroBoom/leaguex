<?php

class Settings extends MY_Controller {

    public function __construct()
    {
        
        parent::__construct();
        
        // Check permission
        if (!is_logged_in() OR !is_admin()) { redirect('home','refresh'); }
        
        // Check activity
        user_activity();

        echo addfooter_js(array('js/settingsFormValidation.js')); 
        $this->load->model('admin/settings_model', 'settings');
    
    }
    
    function index() {
                  
        $data = array('page_title' => $this->lang->line('adminpage_title_settings_site_options'), 'page_view' => 'admin/site-config/site-options', 'folder' => 'admin');
            
        $this->_render($data);
    
    }

    // Update site options
    function update_site_options() {

        $output = array('error' => false);

        $data = array(
            'site_name' =>  $this->input->post('sitename'),
            'site_title' => $this->input->post('sitetitle'),
            'language' =>   $this->input->post('language')
        );

        if($this->settings->update_site_options($data)) {
            $output['message'] = $this->lang->line('alert_saved_changes');;
        } else {
            $output['error'] = true;
            $output['message'] = $this->lang->line('alert_error');
        }
        
        echo json_encode($output);
        
    }

    // Email options
    function email_options() {

        $data = array('page_title' => $this->lang->line('adminpage_title_settings_email_options'), 'page_view' => 'admin/site-config/email-options', 'folder' => 'admin');
          
        $this->_render($data);

    }

    // Update email options
    function update_email_options(){
    
        $output = array('error' => false);

        $data = array(
            'smtp_email' =>  $this->input->post('email'),
            'smtp_name' => $this->input->post('name'),
            'smtp_host' =>  $this->input->post('host'),
            'smtp_user' => $this->input->post('username'),
            'smtp_pass' =>  $this->input->post('password'),
            'smtp_port' => $this->input->post('port'),
        );

        if($this->settings->update_email_options($data)) {
            $output['message'] = $this->lang->line('alert_saved_changes');;
        } else {
            $output['error'] = true;
            $output['message'] = $this->lang->line('alert_error');
        }
        
        echo json_encode($output);

    }

     // Test email options
     function test_email_options(){
    
        $output = array('error' => false);
        
        $query = $this->db->query('SELECT smtp_email, smtp_name FROM lex_config');

        foreach($query->result() as $smtp) {
            $email = $smtp->smtp_email;
            $name = $smtp->smtp_name;
        }

        $emailTest = $this->input->post('testemail');
        date_default_timezone_set('GMT');        
        $this->load->library('email');
        $this->email->set_mailtype('html');
        $this->email->from($email, $name);
        $this->email->to($emailTest); 	
        $this->email->subject($this->lang->line('bksettings_emailoptions_test_object_mail'));
        $this->email->message($this->lang->line('bksettings_emailoptions_test_text_mail'));	
        $this->email->send();

        if($query) {
            $output['message'] = $this->lang->line('alert_saved_changes');;
        } else {
            $output['error'] = true;
            $output['message'] = $this->lang->line('alert_error');
        }
        
        echo json_encode($output);

    }

}
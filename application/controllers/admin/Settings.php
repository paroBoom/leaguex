<?php

class Settings extends MY_Controller {

    public function __construct()
    {
        
        parent::__construct();

        echo addfooter_js(array('js/settingsFormValidation.js')); 
        $this->load->model('admin/settings_model', 'settings');
    
    }

    
    public function index() {
        
        if (!is_logged_in() OR !is_admin()) { redirect('home','refresh'); }

        // Check activity
        user_activity();
              
        $data = array('page_title' => $this->lang->line('adminpage_title_settings_site_options'), 'page_view' => 'admin/site-config/site-options', 'folder' => 'admin');
        
        // Load site settings
        $data['siteconfig'] = load_options();
    
        $this->_render($data);
    
    }

    // Update site options
    function update_site_options(){

        $output = array('error' => false);

        $data = array(
            'site_name' =>  $this->input->post('sitename'),
            'site_title' => $this->input->post('sitetitle'),
            'language' =>   $this->input->post('language')
        );

        if($this->settings->update_site_options($data)) {
            $output['message'] = 'Utenti rimossi';
        } else {
            $output['error'] = true;
            $output['message'] = 'Qualcosa non ha funzionato';
        }
        
        echo json_encode($output);
        
    }


}
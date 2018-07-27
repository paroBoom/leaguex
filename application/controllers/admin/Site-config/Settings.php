<?php

class Settings extends MY_Controller {

    public function __construct()
    {
        
        parent::__construct();

        echo addfooter_js(array('js/settingsFormValidation.js')); 
        
    
    }

    
    public function index() {
        
        if (!is_logged_in() OR !is_admin()) { redirect('home','refresh'); }

        // Check activity
        user_activity();
        // Load site settings
        $data['siteconfig'] = load_options();

        $data = array('page_title' => 'Configura sito', 'page_view' => 'admin/site-config/general', 'folder' => 'admin');
        $this->_render($data);
    
    }

}
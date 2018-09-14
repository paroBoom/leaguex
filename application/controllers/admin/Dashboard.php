<?php

class Dashboard extends MY_Controller {

    public function __construct()
    {
        
        parent::__construct();
    
    }

    
    function index() {
        
        if (!is_logged_in() OR !is_admin()) { redirect('home','refresh'); }

        //Check activity
        user_activity();

        $data = array('page_title' => $this->lang->line('adminpage_title_dashboard'), 'page_view' => 'admin/dashboard', 'folder' => 'admin');
        $this->_render($data);
    
    }

}
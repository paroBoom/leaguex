<?php

class Dashboard extends MY_Controller {

    public function __construct()
    {
        
        parent::__construct();
    
    }

    
    public function index() {
        
        if (!is_logged_in() OR !is_admin()) { redirect('home','refresh'); }

        $data = array('page_title' => 'Admin', 'page_view' => 'admin/dashboard', 'folder' => 'admin');
        $this->_render($data);
    
    }

    

}
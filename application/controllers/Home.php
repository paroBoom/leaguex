<?php

class Home extends MY_Controller {

    public function __construct()
    {
        
        parent::__construct();

       
    
    }

    
    public function index() {
        
        if (!is_logged_in()) { redirect('signin','refresh'); }

        $data = array('page_title' => 'Home', 'page_view' => 'home', 'folder' => 'site');
        $this->_render($data);
    
    }

    

}
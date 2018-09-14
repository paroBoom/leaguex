<?php

class Home extends MY_Controller {

    public function __construct()
    {
        
        parent::__construct();

       
    
    }

    
    function index() {
        
        if (!is_logged_in()) { redirect('signin','refresh'); }

        //Check activity
        user_activity();
        
        $data = array('page_title' => $this->lang->line('page_title_home'), 'page_view' => 'home', 'folder' => 'site');
        $this->_render($data);
    
    }

    

}
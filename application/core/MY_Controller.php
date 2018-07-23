<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
    }
    
    //Check session
    public function is_logged_in() {

        $user = $this->session->userdata('userID');
        return isset($user);

	}
	
	protected function _render($data)
	{
		$this->load->view('template/skeleton', $data);
	}
}
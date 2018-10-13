<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
    }
    
	protected function _render($data)
	
	{	
		// Load site settings
		$data['siteconfig'] = options_data();
		
		// Load manager data
		$data['user'] =  user_data(); 

		$this->load->view('template/skeleton', $data);
	}
}
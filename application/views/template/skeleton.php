<?php
	/*
	*
	* Bring the whole template together in this file
	* This loads the header, navigation (if needed), page and footer
	*
	*/
		
	$this->load->view('template/header');

	if(is_logged_in()) { 

		$this->load->view('template/navbar');

		if($folder == 'admin') {
			$this->load->view('template/admin-sidebar');
		}
		elseif($folder == 'site') {

			$this->load->view('template/sidebar-left');
			
		}

	}

	// Load the actual page view to the template
	$this->load->view($page_view);

	$this->load->view('template/footer');
?>
<?php

class Clubs extends MY_Controller {

    public function __construct()
    {
        
        parent::__construct();

        // Check permission
        if (!is_logged_in() OR !is_admin()) { redirect('home','refresh'); }

        // Check activity
        user_activity();

        echo addfooter_js(array('js/vendor/datatables/jquery.dataTables.min.js','js/vendor/datatables/dataTables.material.min.js','js/vendor/datatables/dataTables.responsive.min.js','js/vendor/datatables/responsive.bootstrap4.min.js','js/vendor/moment.min.js','js/vendor/datatables/datetime-moment.js','js/vendor/jquery.mask.min.js','js/adminDataTables.js')); 
        $this->load->model('admin/clubs_model', 'clubs');

    }

    
    function index() {
        
        $data = array('page_title' => $this->lang->line('adminpage_title_clubs'), 'page_view' => 'admin/clubs-list', 'folder' => 'admin');
        $this->_render($data);
    
    }

    // Display clubs
    function get_clubs() {

        $this->datatables->select('club_id, club_name, club_logo, club_registered')
            ->from('lex_clubs')
            ->add_column('clubinfo',
                '<img src="../assets/img/club-logo/$1"><span class="img-cell">$2</span>',
                'club_logo, club_name')
            ->add_column('action',
                '<a href="javascript:void(0)" data-id="$1" class="edit-icon" data-target="#bkEditClub" data-toggle="modal"><i class="mdi mdi-pencil"></i></a>',
                'club_id');

        echo $this->datatables->generate();

    }

    function get_club() {

        $clubid = $this->input->post('clubid');
        $result = $this->clubs->get_club($clubid);
        foreach ($result as $val) {
            $dataclub = array (
            'clubid' => $val->club_id,
            'clubname' => $val->club_name,
            'clublogo' => $val->club_logo
            );
        }

        $response = array(
            'success' => true,
            'errors' => '',
            'dataclub' => $dataclub
        );

        echo json_encode($response);

    }
    
    // Add new club
    function create_club() {

        $output = array('error' => false);

        $club_register = array(
            'club_name' => $this->input->post('clubname'),
        );

        if($this->clubs->create_club($club_register)) {
            $output['message'] = $this->lang->line('bkclubslist_alert_new_club');
        } else {
            $output['error'] = true;
            $output['message'] = $this->lang->line('alert_error');
        }

        echo json_encode($output);

    }

    // Edit club
    function edit_club() {

        $clubid = $this->input->post('clubid');
        $output = array('error' => false);

        $data = array(
            'club_name' =>  $this->input->post('clubname'), 
            'club_logo' =>  $this->input->post('img-ghost')
            );    
        
        if($this->clubs->edit_club($clubid, $data)) {
            $output['message'] = $this->lang->line('alert_saved_changes');
        } else {
            $output['error'] = true;
            $output['message'] = $this->lang->line('alert_error');
        }

        echo json_encode($output);

    }

    // Upload image
    function do_upload() {

        if (!empty($_FILES['userfile']['name'])) { 

            $this->db->select('logo_size_maxw, logo_size_maxh, logo_size_minw, logo_size_minh');
            $query = $this->db->get('lex_config');

            foreach ($query->result() as $row){
                $maxWidth = $row->logo_size_maxw;
                $maxHeight = $row->logo_size_maxh;
                $minWidth = $row->logo_size_minw;
                $minHeight = $row->logo_size_minh;
            }

            $json = array();           

            list($width, $height) = getimagesize($_FILES['userfile']['tmp_name']);  

            $max_width = $maxWidth;  
            $max_height = $maxHeight;
            $min_width = $minWidth;
            $min_height = $minHeight;
            $dimension_error='';  

            if($width > $max_width ){  
                  $dimension_error = sprintf($this->lang->line('alert_image_max_width'),$max_width);  
              }  
              if($height > $max_height ){  
                  $dimension_error = sprintf($this->lang->line('alert_image_max_height'),$max_height);  
              }  
              if($width > $max_width && $height > $max_height){  
                  $dimension_error = sprintf($this->lang->line('alert_image_max_width_height'),$max_width,$max_height);  
              }
              if($width < $min_width ){  
                  $dimension_error = sprintf($this->lang->line('alert_image_min_width'),$min_width);  
              }  
              if($height < $min_height ){  
                  $dimension_error = sprintf($this->lang->line('alert_image_min_height'),$min_height);  
              }  
              if($width < $min_width && $height < $min_height){  
                  $dimension_error = sprintf($this->lang->line('alert_image_min_width_height'),$min_width,$min_height);  
              }              
              if($dimension_error != ''){  
                  $json['error'] = $dimension_error;  
              } 

        } else {  
            $json['error'] = 'Upload Failed';  
        }  

        if (!$json) {

        $filename = ($_FILES['userfile']['name']);            
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $imgname = sha1($filename).'.'.$extension;

        if (move_uploaded_file($_FILES['userfile']['tmp_name'], './assets/img/club-logo/'.$imgname)){
            $json['photo_file'] = $imgname;               
        }

            $json['success'] = 'Successfuly uploaded'; 
            
        }
        
        echo json_encode( $json );
                 
    }

    // Delete clubs
    function delete_clubs() {

        $output = array('error' => false);

        $delete_id = $this->input->post('id');

        if(!empty($delete_id) && $this->clubs->delete_clubs($delete_id)) {
            $output['message'] = $this->lang->line('alert_saved_changes');
        } else {
            $output['error'] = true;
            $output['message'] = $this->lang->line('alert_error');
        }
        
        echo json_encode($output);
        
    }


}

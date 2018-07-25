<?php defined('BASEPATH') OR exit('No direct script access allowed');        
    
function user_activity() {

    $ci=& get_instance();
    $ci->load->database(); 
    $log = $ci->session->userdata('loggedin');
    
    if($log) {        
        $date = date('Y-m-d H:i:s');
        $uid = $ci->session->userdata('userID');                 
           
        $ci->db->set('la_time', $date);
        $ci->db->where('la_user_id', $uid);
        $ci->db->update('lex_last_activity');        
    }
}



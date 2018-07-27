<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Load site configuration
    
function load_options() {

    $ci=& get_instance();
    $ci->load->database(); 
    $ci->db->from('lex_config');
    $query = $ci->db->get();
    $options = $query->row(); 
    return $options;

}
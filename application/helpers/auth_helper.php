<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Check Session
function is_logged_in() {

    $CI =& get_instance();
    
    $user = $CI->session->userdata('userID');
    if (!isset($user)) { return false; } else { return true; }

}

// Check Permission
function is_admin() {

    $CI =& get_instance();
    
    $admin = $CI->session->userdata('permission');
    if ($admin != 1) { return false; } else { return true; }

}
<?php

class Settings_model extends CI_Model{

    function update_site_options($data){
        $this->db->trans_start();       
        $this->db->update('lex_config', $data);          
        $this->db->trans_complete();       
        if ($this->db->trans_status() === FALSE){           
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
}

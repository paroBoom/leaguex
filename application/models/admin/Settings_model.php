<?php

class Settings_model extends CI_Model {

    function update_site_options($data) {
        $this->db->trans_start();       
        $this->db->update('lex_config', $data);          
        $this->db->trans_complete();       
        if ($this->db->affected_rows() >= 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function update_email_options($data) {
        $this->db->trans_start();       
        $this->db->update('lex_config', $data);          
        $this->db->trans_complete();       
        if ($this->db->affected_rows() >= 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
}

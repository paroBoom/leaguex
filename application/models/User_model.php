<?php 

class User_model extends CI_Model {

    function update_user_account($userid, $data) {

        $this->db->where('ID', $userid);
        $this->db->update('lex_users', $data);

        if ($this->db->affected_rows() >= 0) {
            return TRUE;
            } else {
            return FALSE;
        }
        
    }    

}


<?php

class Users_model extends CI_Model{

    public function delete_users($delete_id) {

        $this->db->trans_start();
        $this->db->where_in('ID', $delete_id);
        $this->db->delete('lex_users'); 
                        
        // Delete activity
        $this->db->where_in('la_user_id', $delete_id);
        $this->db->delete('lex_last_activity'); 
        $this->db->trans_complete();  
        if ($this->db->trans_status() === FALSE){           
            return FALSE;
        } else {
            return TRUE;
        }
    }

}

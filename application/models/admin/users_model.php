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

    public function create_user($user_register) {

        $this->db->trans_start();
        $this->db->set('user_registered', 'NOW()', FALSE);
        $this->db->insert('lex_users', $user_register);

        $user_id = $this->db->insert_id();
                        
        // Init last activity
        $this->db->set('la_user_id', $user_id, FALSE);
        $this->db->set('la_time','NOW()', FALSE);
        $this->db->insert('lex_last_activity');

        $this->db->trans_complete();  
        if ($this->db->trans_status() === FALSE){           
            return FALSE;
        } else {
            return TRUE;
        }
    }

}

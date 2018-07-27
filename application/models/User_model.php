<?php 

class User_model extends CI_Model {

    public function signin($email){

        $this->db->select('*');
        $this->db->from('lex_users');
        $this->db->where('user_email', $email);
        
        if($query = $this->db->get()){
            return $query->row_array();
        } else {
            return false; 
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


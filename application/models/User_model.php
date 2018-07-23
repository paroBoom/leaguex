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

    public function create_user($data) {

        $this->db->set('user_registered', 'NOW()', FALSE);
        return $this->db->insert('lex_users', $data);

    }

}


<?php

class Clubs_model extends CI_Model{

    function delete_clubs($delete_id) {

        $this->db->trans_start();
        $this->db->where_in('club_id', $delete_id);
        $this->db->delete('lex_clubs'); 
                
        $this->db->trans_complete();  
        if ($this->db->trans_status() === FALSE){           
            return FALSE;
        } else {
            return TRUE;
        }
    }


    function create_club($club_register) {

        $this->db->set('club_registered', 'NOW()', FALSE);
        $this->db->insert('lex_clubs', $club_register);
        
        if ($this->db->affected_rows() > 0) {
            return TRUE;
            } else {
            return FALSE;
        }
    } 
    
    function get_club($clubid) {
        $query = $this->db->get_where('lex_clubs', array('club_id' => $clubid));
        $result = $query->result();
        return $result;
    }

    function edit_club($clubid, $data) {
        $this->db->where('club_id', $clubid);
        $this->db->update('lex_clubs', $data);

        if ($this->db->affected_rows() >= 0) {
            return TRUE;
            } else {
            return FALSE;
        }
    }

}

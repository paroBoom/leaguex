<?php

class Clubs_model extends CI_Model{

    function create_club($club_register) {

        $this->db->set('club_registered', 'NOW()', FALSE);
        $this->db->insert('lex_clubs', $club_register);
        if ($this->db->affected_rows() >= 0) {
            return TRUE;
            } else {
            return FALSE;
        }
    }    

}

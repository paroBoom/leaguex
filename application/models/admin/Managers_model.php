<?php

class Managers_model extends CI_Model{

    function delete_managers($delete_id) {

        $this->db->trans_start();
        $this->db->where_in('manager_id', $delete_id);
        $this->db->delete('lex_managers'); 
                
        $this->db->trans_complete();  
        if ($this->db->trans_status() === FALSE){           
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function create_manager($manager_register) {

        $this->db->set('manager_registered', 'NOW()', FALSE);
        $this->db->insert('lex_managers', $manager_register);
        
        if ($this->db->affected_rows() > 0) {
            return TRUE;
            } else {
            return FALSE;
        }
    } 
    
    function get_clubs() {

        $this->db->select('club_name, club_id');
        $this->db->from('lex_clubs');
        $this->db->where('club_id NOT IN (SELECT manager_club_id FROM lex_managers)');
        $this->db->order_by('club_name', 'asc');
        
        $query = $this->db->get();
        $result = $query->result();
        return $result;

    }

    function get_users() {

        $this->db->select('user_name, ID');
        $this->db->from('lex_users');
        $this->db->where('user_permission != 4');
        $this->db->where('ID NOT IN (SELECT manager_user_id FROM lex_managers)');
        $this->db->order_by('user_name', 'asc');
        
        $query = $this->db->get();
        $result = $query->result();
        return $result;

    }

    function get_manager($managerid) {

        $this->db->select('manager_id, manager_club_id, club_name, manager_wallet');
        $this->db->from('lex_managers');
        $this->db->where('manager_id', $managerid);
        $this->db->join('lex_clubs', 'club_id = manager_club_id', 'left');
        
        $query = $this->db->get();
        $result = $query->result();
        return $result;

    }

    function get_clubid($clubid){

        $this->db->select('club_id, club_name');
        $this->db->from('lex_clubs');
        $this->db->where('club_id NOT IN (SELECT manager_club_id FROM lex_managers where manager_club_id NOT IN ('.$clubid.'))');
        
        $query = $this->db->get();
        $result = $query->result();        
        return $result;

    }

    function edit_manager($managerid, $data) {
        $this->db->where('manager_id', $managerid);
        $this->db->update('lex_managers', $data);

        if ($this->db->affected_rows() >= 0) {
            return TRUE;
            } else {
            return FALSE;
        }
    }

}

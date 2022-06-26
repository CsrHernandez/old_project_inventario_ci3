<?php

/* 
 * Copyright (C) 2018
 * 
 */



Class Uprofile extends CI_Model {
    
    

    public function get_all() {
        $query = $this->db->query("SELECT * FROM uprofiles");
        return $query->result_array();
    }

    public function get_by_id($id) {
        $query = $this->db->query("SELECT * FROM uprofiles where id=$id");
        return $query->row_array();
    }

    

}


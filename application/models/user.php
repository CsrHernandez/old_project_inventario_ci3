<?php

/* 
 * Copyright (C) 2018
 * 
 */

Class User extends CI_Model {
    
    function login($username, $password) {
        $this->db->select('id, username, password, realname, uprofiles_id');//agregado realname, uprofiles_id
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_users() {
        $query = $this->db->query("SELECT * FROM users");
        return $query->result_array();
    }
    
    public function get_permissions_str($uid){
        if($uid=="") return "";
        $query = $this->db->query("SELECT * FROM users as u,uprofiles as p WHERE u.uprofiles_id = p.id and u.id=$uid");
        $q = $query->result_array();
        return $q[0]["permissions"];
    }

    public function get_user_by_id($id) {
        $query = $this->db->query("SELECT * FROM users where id=$id");
        return $query->row_array();
    }

    public function set_user($id = -1) {
        $this->load->helper('url');

        $data = array(
            'username' => $this->input->post('username'),
            //'password' => md5($this->input->post('password')),
            'realname' => $this->input->post('realname'),
            'obs' => $this->input->post('obs'),
            'uprofiles_id' => $this->input->post('uprofiles_id')
        );

        if ($id != -1) {
            if ($this->input->post('password') != '') {
                $data["password"] = md5($this->input->post('password'));
            }      
            return $this->db->update('users', $data, "id = " . $id);
        } else {
            $data["password"] = md5($this->input->post('password'));
            return $this->db->insert('users', $data);
        }
    }
    
    public function remove($id=-1){

        $query = $this->db->query("SELECT `uprofiles_id` FROM `users` WHERE `id` = $id");
        //$query->row_array();
        $row = $query->row_array(0);
        
        if($id != -1 && $row['uprofiles_id'] != 1){
            $this->db->where('id',$id);
            return $this->db->delete('users');
        }
        return 0;
    }

}

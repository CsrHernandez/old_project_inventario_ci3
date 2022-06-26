<?php

/*
 * Copyright (C) 2018
 *
 */

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user');

        $this->load->helper('url_helper');

        if(!$this->session->userdata('logged_in'))
	   {
		 //If no session, redirect to login page
		 redirect('login', 'refresh');
	   }

        //$this->load->model('user');
           /*
        $this->load->model('uprofile');
        $u = $this->user->get_user_by_id($this->session->userdata('logged_in')['id']);
        $p = $this->uprofile->get_by_id($u["uprofiles_id"]);
        $nper = "[".$this->router->fetch_class().".".$this->router->fetch_method()."]";
        //echo $nper."<br/>";
        //echo $p["permissions"];
        if(strpos($p["permissions"], $nper)===FALSE && $p["permissions"]!=='*'){
            redirect('home/nopermission','refresh');
        }
            *
            */
        $session_data = $this->session->userdata('logged_in');
        //$this->load->model('user');
        $p = $this->user->get_permissions_str($session_data["id"]);
        $nper = "[".$this->router->fetch_class().".".$this->router->fetch_method()."]";
        if(strpos($p, $nper)===FALSE && $p!=='*'){
            redirect('home/nopermission','refresh');
        }
        $this->upermissions = $p;
    }

    public function index() {
        $data['users'] = $this->user->get_users();
        $data['title'] = 'Usuarios';
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');//
            $data['username'] = $session_data['username'];//
            $data['realname'] = $session_data['realname'];//

            $this->load->view('templates/header', $data);
            $this->load->view('users/index', $data);
            $this->load->view('templates/footer');
        }else {//
            //Si no se inicio session, redireccionar a pagina de login.
            redirect('login', 'refresh');
        }//
    }

    public function create($id = -1) {
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['realname'] = $session_data['realname'];
        } else {
            $data['realname'] = 'Anomimo';
        }
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = "Crear nuevo usuario";
        $data["id"] = $id;
        $data["edit"] = false;
        if ($id != -1) {
            $data["user"] = $this->user->get_user_by_id($id);
            $data["edit"] = true;
            $data['title'] = "Actualizar Usuario";
        }

        $this->form_validation->set_rules('username', 'NO puso nombre de usuario', 'required');
        if ($id == -1) {
            $this->form_validation->set_rules('password', 'No puso la contraseña', 'required');
        }

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('users/create');
            $this->load->view('templates/footer');
        } else {
            $this->user->set_user($id);
            $data["useradd"] = true;

            $data['users'] = $this->user->get_users();
            $this->load->view('templates/header', $data);
            $this->load->view('users/index', $data);
            $this->load->view('templates/footer');
        }
    }

    public function remove($id = -1) {

        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['realname'] = $session_data['realname'];
        } else {
            $data['realname'] = 'Anomimo';
        }

        if($this->user->remove($id)){
            $data["userrem"] = true;
            $data['users'] = $this->user->get_users();
            $this->load->view('templates/header', $data);
            $this->load->view('users/index', $data);
            $this->load->view('templates/footer');
        }else {
            $this->load->view('templates/header', $data);
            $this->load->view('users/noremove');
            $this->load->view('templates/footer');
        }
    }

}

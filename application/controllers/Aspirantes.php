<?php

/* 
 * Copyright (C) 2018
 *
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//session_start(); //we need to call PHP's session object to access it through CI
class Aspirantes extends CI_Controller {

    private $upermissions="";
    function __construct() {
        parent::__construct();
        
        $session_data = $this->session->userdata('logged_in');
        $this->load->model('user');            
        $this->upermissions = $this->user->get_permissions_str($session_data["id"]);
    }

    function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['realname'] = $session_data['realname'];//agregado
            //$data['uprofiles_id'] = $session_data['uprofiles_id'];//agregado

            $this->load->model('product');
            $data["lowitens"] = $this->product->get_low_qtty();

            
            
            $data["upermissions"] = $this->upermissions;
            $this->load->view('templates/header', $data);
            $this->load->view('aspirantes/index');
            $this->load->view('templates/footer');
        } else {
            //Si no se inicio session, redireccionar a pagina de login.
            redirect('login', 'refresh');
        }
    }

    function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('home', 'refresh');
    }

    public function nopermission() {
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $this->load->view('templates/header', $data);
        $this->load->view('nopermission');
        $this->load->view('templates/footer');
    }

}

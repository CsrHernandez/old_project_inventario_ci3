<?php

/* 
 * Copyright (C) 2018
 * 
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start();
class Login extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {
   $this->load->helper(array('form'));
   $this->load->view('login_view');
   if($this->session->userdata('logged_in'))
	   {
		 //If session, redirect to home
		 redirect('home/index', 'refresh');
	   }
 }
 
 public function is_logged_redir(){
   if(!$this->session->userdata('logged_in'))
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

}


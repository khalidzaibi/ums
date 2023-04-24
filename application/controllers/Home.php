<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Home extends CI_Controller {

  public function index(){
    //load user login view bedeafult
    $this->load->view('user/login');
  }
  function _404(){
    $this->load->view("errors/html/error_404");
  }
}	
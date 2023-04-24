<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Dashboard extends CI_Controller {
		function __construct(){
			parent::__construct();
			if(!$this->session->userdata('uid')){
				redirect('user/Login');
			}
			$this->load->model('user/ProfileModel');
		}

		//user Data
		public function index(){
			$userid = $this->session->userdata('uid');
			
			$userProfile=$this->ProfileModel->getProfile($userid);
			$this->load->view('user/dashboard',['profile'=>$userProfile]);

		}
}

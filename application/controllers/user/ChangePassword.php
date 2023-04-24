<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class ChangePassword extends CI_Controller {
		function __construct(){
				parent::__construct();
				if(! $this->session->userdata('uid')){
					redirect('user/login');
				}
				$this->load->model('user/ChangepasswordModel');
		}
		public function index(){
			$this->load->view('user/change_password');
		}
		public function changeUserPassword(){
				$this->form_validation->set_rules('currentpassword','Current Password','required|min_length[6]');	
				$this->form_validation->set_rules('password','Password','required|min_length[6]');
				$this->form_validation->set_rules('confirmpassword','Confirm Password','required|min_length[6]|matches[password]');
				if($this->form_validation->run()){
					$cPassword = md5($this->input->post('currentpassword'));
					$newPassword = $this->input->post('password');

					$userid = $this->session->userdata('uid');
					$userExist = $this->db->where(['id'=>$userid,'password'=>$cPassword])->get('users');
           if($userExist->num_rows() == 0){
							$this->session->set_flashdata('error', 'Current password not matched!');
							redirect('user/ChangePassword');
           }
					if($this->ChangepasswordModel->updatepassword($newPassword)){
						$this->session->set_flashdata('success', 'Password chnaged successfully!');
						redirect('user/ChangePassword');
					}
				} else {
					$this->index();
				}
		}
}
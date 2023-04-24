<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class UserProfile extends CI_Controller {
		function __construct(){
			parent::__construct();
			if(! $this->session->userdata('uid')){
				redirect('user/login');
			}
			$this->load->model('user/ProfileModel');
		}

		public function index(){
			$userid = $this->session->userdata('uid');
			$userProfile=$this->ProfileModel->getprofile($userid);
			$this->load->view('user/user_profile',['profile'=>$userProfile,'error'=>'']);
		}


		public function updateProfile(){
			$profile = '';
			$this->form_validation->set_rules('first_name','First Name','required|alpha');
			$this->form_validation->set_rules('last_name','Last  Name','required|alpha');
			$this->form_validation->set_rules('phone','Phone','required|numeric|exact_length[10]');
				if($this->form_validation->run()){
					if(!empty($_FILES['profile']['name'])){ 
							$config['upload_path']          = 'assests/img';
							$config['allowed_types']        = 'jpeg|jpg|png';
							$this->load->library('upload', $config);
							if (!$this->upload->do_upload('profile')){
									$error = $this->upload->display_errors();
									$this->session->set_flashdata('error', $error);
									redirect('user/userProfile');
							}else{
									$profileData = $this->upload->data();
									$profile =$profileData['file_name'];
									$this->session->set_userdata('profile',$profile);
							}
					}
					$data = array(
						'first_name'=>$this->input->post('first_name'),
						'last_name'=>$this->input->post('last_name'),
						'phone'=>$this->input->post('phone'),
						'profile'=>$profile,
					);
					if(!$profile) unset($data['profile']);
					$updated = $this->ProfileModel->updateUserProfile($data);
					if($updated){
						$this->session->set_flashdata('success','Profile updated successfully!');
						return redirect('user/userProfile');
					}else {
						$this->session->set_flashdata('error', 'Something went wrong!');
						redirect('user/userProfile');
					}
				}else{
					$this->index();
				}
		}
}

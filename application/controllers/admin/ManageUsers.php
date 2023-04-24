<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class ManageUsers extends CI_Controller {
    function __construct(){
      parent::__construct();
      if(!$this->session->userdata('uid')){
        redirect('user/Login');
      }
      if(!$this->session->userdata('role')=='admin'){
        redirect('user/Dashboard');
      }
      $this->load->model('admin/ManageUsersModel');
    }

    public function index(){
      $user=$this->ManageUsersModel->getAllUsers();
      $this->load->view('admin/manage_users',['allUsers'=>$user]);
    }

    // For particular Record
    public function update_user($uid){
      $udetail=$this->ManageUsersModel->getUserDetail($uid);
      $this->load->view('admin/update_user',['profile'=>$udetail]);
    }
    //save updated user
    public function saveUpdateUser(){
      $this->form_validation->set_rules('first_name','First Name','required|alpha');
			$this->form_validation->set_rules('last_name','Last  Name','required|alpha');
			$this->form_validation->set_rules('phone','Phone','required|numeric|exact_length[10]');
      $this->form_validation->set_rules('role','Role','required');
				if($this->form_validation->run()){
					$data = array(
						'first_name'=>$this->input->post('first_name'),
						'last_name'=>$this->input->post('last_name'),
						'phone'=>$this->input->post('phone'),
						'id'=>$this->input->post('id'),
						'role'=>$this->input->post('role'),
					);
					$this->ManageUsersModel->updateUserById($data);
				}else{
					$this->update_user($this->input->post('id'));
				}
    }

    public function deleteUser($uid){
      $this->ManageUsersModel->deleteUser($uid);
      $this->session->set_flashdata('success', 'User deleted successfully!');
      redirect('admin/ManageUsers');
    }


}
<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
Class ManageUsersModel extends CI_Model{
	public function getAllUsers(){
		$query=$this->db->select('*')->get('users');
		return $query->result();      
	}
	//Getting particular user deatials on the basis of id	
	public function getUserDetail($uid){
		$ret=$this->db->select('*')->where('id',$uid)->get('users');
		return $ret->row();
	}
	//updateUserById
	public function updateUserById($data){
		$userid = $data['id'];
		unset($data['id']);
    $updated = $this->db->where('id', $userid)->update('users', $data); 
		if($updated){
			$this->session->set_flashdata('success','User updated successfully!');
			return redirect('admin/ManageUsers');
		}else {
			$this->session->set_flashdata('error', 'Something went wrong!');
			redirect('admin/ManageUsers');
		}
	}

	// delete user permanently
		public function deleteUser($uid){
			$this->db->where('id', $uid)->delete('users');
	}

}
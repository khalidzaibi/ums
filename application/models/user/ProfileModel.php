<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ProfileModel extends CI_Model{

  //get current user Profile...
  public function getProfile($userid){
      $record=$this->db->select('*')->where('id',$userid)->from('users')->get();
      return $record->row();  
  }

  //update current user
  public function updateUserProfile($data){
    $userid = $this->session->userdata('uid');
   return $this->db->where('id', $userid)->update('users', $data); 
  }


}
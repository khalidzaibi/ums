<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class ChangepasswordModel extends CI_Model {
  public function updatepassword($newPassword){
    $userid = $this->session->userdata('uid');
    $data = array('password' =>md5($newPassword));
    return $this->db->where(['id'=>$userid])->update('users',$data);
	}
}

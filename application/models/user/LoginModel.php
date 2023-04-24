<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class LoginModel extends CI_Model {

public function loginUser($data){
		$email = $data['email'];
		$password = $data['password'];

		$this->db->where(['email'=>$email,'password'=>$password]);
		$record = $this->db->get('users');
		$checkUser=$record->num_rows();
		if($checkUser){
				$user = $record->row();
				return $user;
		}
			return 0;
		}
}


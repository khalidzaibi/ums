<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class SignupModel extends CI_Model{

	public function signupUser($data){
			//save data into DB
			$record=$this->db->insert('users',$data);
			if($record){return $record;}else{return null;}
	}


}
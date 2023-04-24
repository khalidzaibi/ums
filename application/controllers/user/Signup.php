<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Signup extends CI_Controller {
	function __construct(){
    parent::__construct();
    $this->load->model('user/SignupModel');
  }

  public function index(){
    $this->load->view('user/signup');
  }
  public function user_signup(){
      $this->form_validation->set_rules('first_name','First Name','required|alpha');
      $this->form_validation->set_rules('last_name','Last Name','required|alpha');
      $this->form_validation->set_rules('phone','Phone','required|numeric|exact_length[10]');
      $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');
      $this->form_validation->set_rules('password','Password','required|min_length[6]');
      $this->form_validation->set_rules('confirmpassword','Confirm Password','required|min_length[6]|matches[password]');
      if(!$this->form_validation->run()){
        $this->index();
      } 
        $data=array(
          'first_name'=>$this->input->post('first_name'),
          'last_name'=>$this->input->post('last_name'),
          'phone'=>$this->input->post('phone'),
          'email'=>$this->input->post('email'),
          'password'=>md5($this->input->post('password')),
          'is_active'=>1,
          'profile'=>'default.png'
        );
        $record = $this->SignupModel->signupUser($data);
        if(!$record){
          $this->session->set_flashdata('error', 'Somthing went worng!');
          //in error case 
          redirect('user/Signup');
        }
        //send email to register user
      $name = $this->input->post('first_name').' '.$this->input->post('last_name'); 
      $emailData = [
        'to' =>$this->input->post('email'),
        'from' =>'khalidzaibi1@gmail.com',
        'subject' =>'Welcome to our portal.',
        'message'=>'Dear, '.$name.', <br /> You are welcome to our portal, please click to login. <br/>
        <br /> <a href="'.site_url('user/Login').'"> Click To Login </a>'
      ];
      $sendMail = $this->sendMail($emailData);
      $this->session->set_flashdata('success', 'User registered successfully!');
      redirect('user/Login');
  }
 
  //send welcome Email
  public function sendMail($email_data = array()){                
    $this->load->library('email');
      $config = Array(
          'protocol' => 'smtp',
          'smtp_host' => 'sandbox.smtp.mailtrap.io',
          'smtp_port' => 2525,
          'smtp_user' => '81ace96814bc55',
          'smtp_pass' => '1ddb48f3027821',
          'crlf' => "\r\n",
          'newline' => "\r\n",
          'validation'   => true,
          'mailtype'  => 'html', 
          'charset'   => 'iso-8859-1', 
          'wordwrap'  => TRUE
      ); 
      $this->email->initialize($config);

      $this->email->set_newline("\r\n");
      $this->email->set_mailtype("html"); 
      $this->email->from('khalidzaibi1@gmail.com', "From Assignment");
      $this->email->to($email_data['to']);
      $this->email->reply_to($email_data['to'],  $email_data['from']);
      $this->email->subject($email_data['subject']);
      $this->email->message($email_data['message']);
      $result = $this->email->send();
      return $result; 
        
  }
}
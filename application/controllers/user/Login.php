<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Login extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('user/LoginModel');
  }
  
  public function index(){
    $this->load->view('user/login');
  }
  public function userLogin(){
      $this->form_validation->set_rules('email','Email','required|valid_email');
      $this->form_validation->set_rules('password','Password','required');
    
      if($this->form_validation->run()){
          $data = [
            'email'=>$this->input->post('email'),
            'password'=>md5($this->input->post('password')),
          ];
          $userData = $this->LoginModel->loginUser($data);
          if($userData) {
            $is_active = $userData->is_active;
            //if user is InActive 
            if(!$is_active){
              $this->session->set_flashdata('error', 'Account is InActive! Contact to admin.');
              return redirect('user/login');
            }
            //in successfull
            $this->session->set_userdata('uid',$userData->id);
            $this->session->set_userdata('role',$userData->role);
            $this->session->set_userdata('profile',$userData->profile);
            return redirect('user/dashboard');
          }

          //in case of invalid user
          $this->session->set_flashdata('error', 'Invalid email or password.');
          redirect('/');
          
        } 
        //in case any error 
        $this->load->view('user/login');
  }
  // Logout 
  public function logout(){
    $this->session->unset_userdata('uid');
    $this->session->sess_destroy();
    return redirect('/');
  }

  public function ForgotPassword(){
    $this->load->view('user/forgot_password');
  }
  public function resetPassword(){
    $this->form_validation->set_rules('email','Email','required|valid_email');
    if(!$this->form_validation->run()){
      return $this->ForgotPassword();
    }

    $email = $this->input->post('email');
    //check if there is active user exist
    $this->db->where(['email'=>$email,'is_active'=>1]);
		$record = $this->db->get('users');
		$checkUser = $record->num_rows();
    if($checkUser==0){
      $this->session->set_flashdata('error', 'No user found with this email.');
      redirect('user/Login/ForgotPassword');
    }

    //if user exist and then reset password and send to new password to email
    $passwordplain  = rand(99999,999999);
    $data['password'] = md5($passwordplain);
    $this->db->where('email', $email);
    $this->db->update('users', $data); 

    $user = $record->row();
    $name = $user->first_name.' '.$user->last_name; 
    $emailData = [
      'to' =>$email,
      'from' =>'khalidzaibi1@gmail.com',
      'subject' =>'Your new password, use new password to login to portal.',
      'message'=>'Dear, '.$name.', <br /> Your new password is below <br/><b>'.$passwordplain.'</b> <br/> Kindly use the above password to login.
      <br /> <a href="'.site_url('user/Login').'"> Click To Login </a>'
    ];
    $sendMail = $this->sendMail($emailData);
    //check if there is any error to sending email
    if(!$sendMail){
      $this->session->set_flashdata('error', 'Something went wrong, please try again later.');
      redirect('user/Login/ForgotPassword');
    }

    $this->session->set_flashdata('success', 'New password has been sent to your registerd email.');
      redirect('user/Login');
  }

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
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MX_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Auth_model');
    $this->load->library('form_validation');
    // date_default_timezone_set('Asia/Jakarta');
    
  }



  public function index(){
    if($this->session->userdata('logged_in')){
      redirect('Home');
    }else{
      $this->load->view('index');  
    }  	
  }

  public function login(){
  	$email = $this->input->post('email');
  	$password = $this->input->post('password');

  	$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');    

    if ($this->form_validation->run($this) == FALSE){	   
       $this->load->view('index');
    }
    else{     
    	$hashed_pass = $this->Auth_model->getPass($email);
      $match = $this->_match($password,$hashed_pass);
      // echo $match;
      // exit();
      if($match == 1){
        $query = $this->Auth_model->login($email);
        if($query){
          $ses_arr = array();
           foreach ($query as $row){
             $ses_arr = array(
               'id' => $row->id,
               'email' => $row->email,
               'username' => $row->username             
               );
             $this->session->set_userdata('logged_in',$ses_arr);
            }
            redirect('home');
        }else{
          $this->session->set_flashdata('msg', 'invalid username or password');
          redirect('auth/index');
        }
      }else{
        $this->session->set_flashdata('msg', 'invalid username or password');
        redirect('auth/index');
      }      
    }
  }

   public function logout(){
    $this->session->unset_userdata('logged_in');
    session_destroy();
    redirect('auth','refresh');
  }
  




  //Private Methods
private function _passhash($passwd){
	$options = [
	    'cost' => 12    
	];
	 return password_hash($passwd, PASSWORD_BCRYPT, $options);
	}


  private function _match($password,$hashed_pass){
    if(password_verify($password, $hashed_pass)){
      return 1;
    }else{
      return 0;
    }
  }

}
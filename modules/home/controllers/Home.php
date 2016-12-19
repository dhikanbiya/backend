<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Home_model');
    $this->load->library('form_validation');
    // date_default_timezone_set('Asia/Jakarta');
    
  }

  public function index(){
    if($this->session->userdata('logged_in')){
      
      $this->load->view('partials/header');
      $this->load->view('index');
      $this->load->view('partials/footer');
    }else{
      redirect('auth');
    }
    
  }

  public function pass(){
    if($this->session->userdata('logged_in')){
      $this->load->view('partials/header');
      $this->load->view('update_pass');
      $this->load->view('partials/footer');
    }else{
      redirect('auth');
    }
  }

  public function update(){
    if($this->session->userdata('logged_in')){
      $id = $this->session->logged_in['id'];
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        
        $this->form_validation->set_rules('password', 'Password', 'trim|required');    
        $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]');    
        $this->form_validation->set_rules('oldpass', 'Password lama', 'callback_password_check');    

        if ($this->form_validation->run($this) == FALSE){    
           $this->load->view('partials/header');
           $this->load->view('update_pass');
           $this->load->view('partials/footer');
        }
        else{     
          $pass = $this->_passhash($password);
          $params = array(
            'password' => $pass
            );
          $query = $this->Home_model->updatePass($params,$id);
          if($query){
            $this->session->set_flashdata('msg', 'Password updated');
            redirect('home');
          }else{
            $this->session->set_flashdata('msg', 'Opps.. something is wrong');
            redirect('home');
          }

        }


    }else{
      redirect('auth');
    }

  }



public function password_check($pass){
  if($this->session->userdata('logged_in')){
    $id = $this->session->logged_in['id'];
    $passdb = $this->Home_model->getPass($id);
    $verify = $this->_match($pass,$passdb);
    if($verify == 1){
      return TRUE;
    }else{
      $this->form_validation->set_message('password_check', '{field} tidak sesuai' );
      return FALSE;
    }

  }else{
    redirect('auth');
  }
  // if ($str == 'test'){
  //   $this->form_validation->set_message('username_check', 'The {field} field can not be the word "test"');
  //   return FALSE;
  // }else{
  //   return TRUE;
  // }
}


// private method

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
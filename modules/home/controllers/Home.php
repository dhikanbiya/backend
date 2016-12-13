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

}
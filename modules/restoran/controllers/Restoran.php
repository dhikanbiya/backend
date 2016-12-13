<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restoran extends MX_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Restoran_model');
    $this->load->library('form_validation');
    $this->load->helper('text');
    $this->load->helper("file");
    // date_default_timezone_set('Asia/Jakarta');    
  }

}
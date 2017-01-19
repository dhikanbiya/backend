<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {
  public function __construct()
  {
      parent::__construct();
  }


 public function login($email){
    $query = $this->db->get_where('tbl_account_backend', array('email' => $email));
    if ($query->num_rows() > 0){
      return $query->result();
    }else{
      return 0;
    }
  }

  public function getPass($email){
    $this->db->select('password');
    $this->db->from('tbl_account_backend');
    $this->db->where(array('email'=>$email));
    $query = $this->db->get();
    foreach($query->result() as $q){
      return $q->password;
    }

  }

}
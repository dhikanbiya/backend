<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
  public function __construct()
  {
      parent::__construct();
  }

 public function getPass($id){
 	$q = $this->db->get_where('tbl_account',array('id'=>$id));
 	foreach($q->result() as $r){
 		return $r->password;
 	}
 }

 public function updatePass($params,$id){
 	$this->db->where(array('id' => $id));
 	return $this->db->update('tbl_account', $params); 
 }


}
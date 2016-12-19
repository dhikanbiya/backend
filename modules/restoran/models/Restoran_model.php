<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restoran_model extends CI_Model {
	public function __construct()
  {
      parent::__construct();
  }

  public function insert($params){
  	return $this->db->insert('tbl_places_resto',$params);      
  }

  public function insert_menu($params){
    return $this->db->insert('tbl_menu_resto',$params);      
  }

  public function insert_promo($params){
  	return $this->db->insert('tbl_promo_resto',$params);      
  }

	 public function getResto(){
	 	return $this->db->get('tbl_places_resto')->result();
	 }

 public function details($id){
   return $this->db->get_where('tbl_places_resto',array('id'=>$id))->result();
 }

 public function show_menu($id){
   $this->db->select('tbl_event_mall.name as name, tbl_event_mall.description as desc, tbl_event_mall.date as date, tbl_event_mall.id_places_mall as id, tbl_event_mall.id as ids');
   $this->db->from('tbl_event_mall');
   $this->db->join('tbl_places_mall','tbl_places_mall.id = tbl_event_mall.id_places_mall');
   $this->db->where('id_places_mall',$id);
   $query = $this->db->get();
   return $query->result();
 }

 public function get_menu($id){
 	return $this->db->get_where('tbl_menu_resto',array('id_places_resto'=>$id))->result();
 }

 public function get_menu_detail($id){
  return $this->db->get_where('tbl_menu_resto',array('id'=>$id))->result();
 }

 public function updateResto($params,$id){
   $this->db->where(array('id' => $id));
   return $this->db->update('tbl_places_resto', $params); 
 }

 public function updatePromo($params,$id){
   $this->db->where(array('id' => $id));
   return $this->db->update('tbl_promo_resto', $params); 
 }

 public function updateMenu($params,$id){
   $this->db->where(array('id' => $id));
   return $this->db->update('tbl_menu_resto', $params); 
 }

public function delete($id){
    $this->db->where('id', $id);
    return $this->db->delete('tbl_menu_resto');
}

public function destroy($id){
    $this->db->where('id', $id);
    return $this->db->delete('tbl_places_resto');
}

public function get_promo($id){
  return $this->db->get_where('tbl_promo_resto', array('id_places_resto'=>$id))->result();
}

public function get_promo_detail($id){
  return $this->db->get_where('tbl_promo_resto', array('id'=>$id))->result();
}



}
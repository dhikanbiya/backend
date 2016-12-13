<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mall_model extends CI_Model {
  public function __construct()
  {
      parent::__construct();
  }  

  public function insert($params){
  return $this->db->insert('tbl_places_mall',$params);      
  }

   public function getData(){
    return $this->db->get('tbl_places_mall')->result();
  }

 
  public function mall_details($id){
    return $this->db->get_where('tbl_places_mall',array('id'=>$id))->result();
  }

  public function show_events($id){
    $this->db->select('tbl_event_mall.name as name, tbl_event_mall.description as desc, tbl_event_mall.date as date, tbl_event_mall.id_places_mall as id, tbl_event_mall.id as ids');
    $this->db->from('tbl_event_mall');
    $this->db->join('tbl_places_mall','tbl_places_mall.id = tbl_event_mall.id_places_mall');
    $this->db->where('id_places_mall',$id);
    $query = $this->db->get();
    return $query->result();
  }
  
  public function getMall($id){
    return $this->db->get_where('tbl_places_mall',array('id'=>$id))->result();
  }

  public function getEvent($id){
    return $this->db->get_where('tbl_event_mall',array('id'=>$id))->result();
  }

  public function updateMall($params,$id){
    $this->db->where(array('id' => $id));
    return $this->db->update('tbl_places_mall', $params); 
  }

   public function updateEvent($params,$id){
    $this->db->where(array('id' => $id));
    return $this->db->update('tbl_event_mall', $params); 
  }

  public function destroy($id){
    $this->db->where('id', $id);
    return $this->db->delete('tbl_places_mall');
  }

  public function delete($id){
    $this->db->where('id', $id);
    return $this->db->delete('tbl_event_mall');
  }

  public function insert_event($params){
    return $this->db->insert('tbl_event_mall',$params);      
  }


}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mall extends MX_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mall_model');
    $this->load->library('form_validation');
    $this->load->helper('text');
    $this->load->helper("file");
    // date_default_timezone_set('Asia/Jakarta');
    
  }

  public function index(){
    if($this->session->userdata('logged_in')){
      $data['content']=$this->Mall_model->getData();
      $this->load->view('partials/header');
      $this->load->view('index',$data);
      $this->load->view('partials/footer');
    }else{
      redirect('Auth');
    }    
  }

  public function add(){
    if($this->session->userdata('logged_in')){
      $data['error'] = ' ';
      $this->load->view('partials/header');
      $this->load->view('add',$data);
      $this->load->view('partials/footer');
    }else{
      redirect('Auth');
    }
  }

  public function add_event($id='NULL'){

    if($this->session->userdata('logged_in')){
      $data['error'] = ' ';
      $data['detail'] = $this->Mall_model->getMall($id);
      $this->load->view('partials/header');
      $this->load->view('add_event',$data);
      $this->load->view('partials/footer');
    }else{
      redirect('Auth');
    }
  }

public function create_event(){
  if($this->session->userdata('logged_in')){

    $this->load->library('upload');
    // $this->upload->initialize($config);
    $id = $this->input->post('id');
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('date', 'Date', 'required');
    $this->form_validation->set_rules('desc', 'Description', 'required');


    if ($this->form_validation->run($this) == FALSE){ 
       $data['error'] = '';    
       $data['detail'] = $this->Mall_model->getMall($id);    
       $this->load->view('partials/header'); 
       $this->load->view('add_event',$data);
       $this->load->view('partials/footer');
    }else{
      if ( ! $this->upload->do_upload('userfile'))
    {
      $data['error'] = $this->upload->display_errors();
      $data['detail'] = $this->Mall_model->getMall($id);
      $this->load->view('partials/header');
      $this->load->view('add_event', $data);
       $this->load->view('partials/footer');
    }
    else
    {
      $data = array('upload_data' => $this->upload->data());
      $params = array(
        'name' => $this->input->post('name'),
        'date' => $this->input->post('date'),
        'description' => $this->input->post('desc'),
        'id_places_mall' => $this->input->post('id'),
        'image' => $this->upload->data('file_name')
      );
      $query = $this->Mall_model->insert_event($params);
      if($query){
        redirect('mall/events/'.$this->input->post('id'));
      }else{
        echo "error";
      }
    }    
   }
  }else{
    redirect('Auth');
  }
 }


  public function events($id='NULL'){
    if($this->session->userdata('logged_in')){      
      $query = $this->Mall_model->show_events($id);
      $data['details'] = $this->Mall_model->mall_details($id);
      if($query){
        $data['content'] = $query;
        $this->load->view('partials/header');
        $this->load->view('events',$data);
        $this->load->view('partials/footer');  
      }else{
        redirect('Mall'); 
      }
      
    }else{
      redirect('Auth');
    }

  }
   

  public function create(){
  if($this->session->userdata('logged_in')){

    $this->load->library('upload');
    // $this->upload->initialize($config);

    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('latitude', 'Latitude', 'required');
    $this->form_validation->set_rules('longitude', 'longitude', 'required');


    if ($this->form_validation->run($this) == FALSE){ 
       $data['error'] = '';        
       $this->load->view('partials/header'); 
       $this->load->view('add',$data);
       $this->load->view('partials/footer');
    }else{
      if ( ! $this->upload->do_upload('userfile'))
    {
      $error = array('error' => $this->upload->display_errors());
      $this->load->view('partials/header');
      $this->load->view('add', $error);
       $this->load->view('partials/footer');
    }
    else
    {
      $data = array('upload_data' => $this->upload->data());
      $params = array(
        'name' => $this->input->post('name'),
        'lat' => $this->input->post('latitude'),
        'lng' => $this->input->post('longitude'),
        'image' => $this->upload->data('file_name')
      );
      $query = $this->Mall_model->insert($params);
      if($query){
        redirect('mall/index');
      }else{
        echo "error";
      }
    }    
   }
  }else{
    redirect('Auth');
  }
 }

 public function edit($id='NULL'){
   if($this->session->userdata('logged_in')){
    $query = $this->Mall_model->getMall($id);
     if($query){
        $data['error'] = ' ';
        $data['content'] = $query;
       $this->load->view('partials/header'); 
       $this->load->view('edit_mall',$data);
       $this->load->view('partials/footer'); 
     }else{
       redirect('Mall');
     }
 }else{
  redirect('Auth');
 }
}

public function edit_event($id='NULL'){
   if($this->session->userdata('logged_in')){
    $query = $this->Mall_model->getEvent($id);
     if($query){
        $data['error'] = ' ';
        $data['content'] = $query;
       $this->load->view('partials/header'); 
       $this->load->view('edit_event',$data);
       $this->load->view('partials/footer'); 
     }else{
       redirect('Mall');
     }
 }else{
  redirect('Auth');
 }
}


public function update($id='NULL'){
  if($this->session->userdata('logged_in')){
    $this->load->library('upload');
    $this->load->helper('file');   

    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('latitude', 'Latitude', 'required');
    $this->form_validation->set_rules('longitude', 'longitude', 'required');


    if ($this->form_validation->run($this) == FALSE){ 
           
       $this->load->view('partials/header'); 
       $this->load->view('edit_mall');
       $this->load->view('partials/footer');
    }else{
      if ( ! $this->upload->do_upload('userfile'))
    {
      
      $params = array(
        'name' => $this->input->post('name'),
        'lat' => $this->input->post('latitude'),
        'lng' => $this->input->post('longitude')        
      );
    }
    else
    {
      $data = array('upload_data' => $this->upload->data());
      $params = array(
        'name' => $this->input->post('name'),
        'lat' => $this->input->post('latitude'),
        'lng' => $this->input->post('longitude'),
        'image' => $this->upload->data('file_name')
      );
      $img = $this->input->post('image');
      $path = 'assets/uploads/'.$img;
      if(isset($img)){
        unlink($path);  
      }else{
        echo "error";
      }      
    }
      $id = $this->input->post('idd');
      $query = $this->Mall_model->updateMall($params,$id);
      if($query){
        redirect('Mall/index');
      }else{
        echo "error";
      }    
   }
  }else{
    redirect('Auth');
  }
}

public function update_event($id='NULL'){
  if($this->session->userdata('logged_in')){
    $this->load->library('upload');
    $this->load->helper('file');   

    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('desc', 'Description', 'required');
    $this->form_validation->set_rules('date', 'Date', 'required');


    if ($this->form_validation->run($this) == FALSE){ 
           
       $this->load->view('partials/header'); 
       $this->load->view('edit_mall');
       $this->load->view('partials/footer');
    }else{
      if ( ! $this->upload->do_upload('userfile'))
    {
      
      $params = array(
        'name' => $this->input->post('name'),
        'date' => $this->input->post('date'),
        'description' => $this->input->post('desc')        
      );
    }
    else
    {
      $data = array('upload_data' => $this->upload->data());
      $params = array(
        'name' => $this->input->post('name'),
        'date' => $this->input->post('date'),
        'description' => $this->input->post('desc'),
        'image' => $this->upload->data('file_name')
      );
      $img = $this->input->post('image');
      $path = 'assets/uploads/'.$img;
      if(isset($img)){
        unlink($path);  
      }else{
        echo "error";
      }      
    }
      $id = $this->input->post('id');
      $query = $this->Mall_model->updateEvent($params,$id);
      if($query){
        redirect('Mall/index');
      }else{
        echo "error";
      }    
   }
  }else{
    redirect('Auth');
  }
}

public function destroy($id){
  if($this->session->userdata('logged_in')){
    $query = $this->Mall_model->destroy($id);
    if($query){
      redirect('mall');
    }else{
      redirect('home');
    }  
  }else{
    redirect('auth');
  }
  
}

public function delete($id){
  if($this->session->userdata('logged_in')){
    $query = $this->Mall_model->delete($id);
    if($query){
      redirect('mall');
    }else{
      redirect('home');
    }  
  }else{
    redirect('auth');
  }
  
}


}
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
  public function index(){
  	if($this->session->userdata('logged_in')){
  		$data['content'] = $this->Restoran_model->getResto();
	  	$this->load->view('partials/header');
	  	$this->load->view('index',$data);
	  	$this->load->view('partials/footer');
	 }
  }

  public function add(){
    if($this->session->userdata('logged_in')){
      $data['error'] = ' ';
      $this->load->view('partials/header');
      $this->load->view('add_resto',$data);
      $this->load->view('partials/footer');
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
     $this->form_validation->set_rules('open', 'Jam Buka', 'required');
     $this->form_validation->set_rules('close', 'Jam Tutup', 'required');


     if ($this->form_validation->run($this) == FALSE){ 
        $data['error'] = '';        
        $this->load->view('partials/header'); 
        $this->load->view('add_resto',$data);
        $this->load->view('partials/footer');
     }else{
       if ( ! $this->upload->do_upload('userfile'))
     {
       $error = array('error' => $this->upload->display_errors());
       $this->load->view('partials/header');
       $this->load->view('add_resto', $error);
        $this->load->view('partials/footer');
     }
     else
     {
       $data = array('upload_data' => $this->upload->data());
       $params = array(
         'name' => $this->input->post('name'),
         'lat' => $this->input->post('latitude'),
         'lng' => $this->input->post('longitude'),
         'image' => $this->upload->data('file_name'),
         'open' => $this->input->post('open'),
         'close' => $this->input->post('close')

       );
       $query = $this->Restoran_model->insert($params);
       if($query){
         redirect('restoran');
       }else{
         echo "error";
       }
     }    
    }
   }else{
     redirect('Auth');
   }
  }

  public function details($id='NULL'){
  	if($this->session->userdata('logged_in')){
  		$data['details'] = $this->Restoran_model->details($id);  		
      $data['content'] = $this->Restoran_model->get_menu($id);
  		$data['promo'] = $this->Restoran_model->get_promo($id);

	  	$this->load->view('partials/header');
	  	$this->load->view('details',$data);
	  	$this->load->view('partials/footer');
	 }
  }

   public function edit($id='NULL'){
     if($this->session->userdata('logged_in')){
      $query = $this->Restoran_model->details($id);
       if($query){
          $data['error'] = ' ';
          $data['content'] = $query;
         $this->load->view('partials/header'); 
         $this->load->view('edit_resto',$data);
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
     $this->form_validation->set_rules('open', 'Jam Buka', 'required');
     $this->form_validation->set_rules('close', 'Jam Tutup', 'required');


     if ($this->form_validation->run($this) == FALSE){ 
            
        $this->load->view('partials/header'); 
        $this->load->view('edit_resto');
        $this->load->view('partials/footer');
     }else{
       if ( ! $this->upload->do_upload('userfile'))
     {
       
       $params = array(
         'name' => $this->input->post('name'),
         'lat' => $this->input->post('latitude'),
         'lng' => $this->input->post('longitude'),        
         'open' => $this->input->post('open'),        
         'close' => $this->input->post('close'),        
       );
     }
     else
     {
       $data = array('upload_data' => $this->upload->data());
       $params = array(
         'name' => $this->input->post('name'),
         'lat' => $this->input->post('latitude'),
         'lng' => $this->input->post('longitude'),
         'open' => $this->input->post('open'),
         'close' => $this->input->post('close'),
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
       $query = $this->Restoran_model->updateResto($params,$id);
       if($query){
         redirect('restoran');
       }else{
         echo "error";
       }    
    }
   }else{
     redirect('Auth');
   }
 }

 public function add_menu($id='NULL'){
   if($this->session->userdata('logged_in')){
     $data['error'] = ' ';
     $data['detail'] = $this->Restoran_model->details($id);
     $this->load->view('partials/header');
     $this->load->view('add_menu',$data);
     $this->load->view('partials/footer');
   }else{
     redirect('Auth');
   }
 }

  public function create_menu(){
  if($this->session->userdata('logged_in')){

    $this->load->library('upload');
    // $this->upload->initialize($config);

    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('desc', 'Deskripsi', 'required');
    $this->form_validation->set_rules('price', 'Harga', 'required|numeric');
   


    if ($this->form_validation->run($this) == FALSE){ 
       $data['error'] = '';        
       $this->load->view('partials/header'); 
       $this->load->view('add_menu',$data);
       $this->load->view('partials/footer');
    }else{
      if ( ! $this->upload->do_upload('userfile'))
    {
      $error = array('error' => $this->upload->display_errors());
      $this->load->view('partials/header');
      $this->load->view('add_menu', $error);
       $this->load->view('partials/footer');
    }
    else
    {
      $data = array('upload_data' => $this->upload->data());
      $params = array(
        'name' => $this->input->post('name'),
        'description' => $this->input->post('desc'),
        'price' => $this->input->post('price'),        
        'id_places_resto' => $this->input->post('id')        

      );
      $query = $this->Restoran_model->insert_menu($params);
      if($query){
        redirect('restoran');
      }else{
        echo "error";
      }
    }    
   }
  }else{
    redirect('Auth');
  }
 }

public function get_menu($id='NULL'){
    if($this->session->userdata('logged_in')){      
      $data['content'] = $this->Restoran_model->get_menu_detail($id);      
      $this->load->view('partials/header');
      $this->load->view('menu_detail',$data);
      $this->load->view('partials/footer');
   }
  }

public function edit_menu($id='NULL'){
     if($this->session->userdata('logged_in')){
      $query = $this->Restoran_model->get_menu_detail($id);
       if($query){
          $data['error'] = ' ';
          $data['detail'] = $query;
         $this->load->view('partials/header'); 
         $this->load->view('edit_menu',$data);
         $this->load->view('partials/footer'); 
       }else{
         redirect('Mall');
       }
   }else{
    redirect('Auth');
   }
  }

public function update_menu($id='NULL'){
   if($this->session->userdata('logged_in')){
     $this->load->library('upload');
     $this->load->helper('file');   

     $this->form_validation->set_rules('name', 'Name', 'required');
     $this->form_validation->set_rules('desc', 'Deskripsi', 'required');
     $this->form_validation->set_rules('price', 'Harga', 'required|numeric');
    


     if ($this->form_validation->run($this) == FALSE){ 
            
        $this->load->view('partials/header'); 
        $this->load->view('edit_menu');
        $this->load->view('partials/footer');
     }else{
       if ( ! $this->upload->do_upload('userfile'))
     {
       
       $params = array(
         'name' => $this->input->post('name'),
         'description' => $this->input->post('desc'),
         'price' => $this->input->post('price')         
       );
     }
     else
     {
       $data = array('upload_data' => $this->upload->data());
       $params = array(
         'name' => $this->input->post('name'),
         'description' => $this->input->post('desc'),
         'price' => $this->input->post('price'),         
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
       $query = $this->Restoran_model->updateMenu($params,$id);
       if($query){
         redirect('restoran');
       }else{
         echo "error";
       }    
    }
   }else{
     redirect('Auth');
   }
 }

 public function promo($id='NULL'){
    if($this->session->userdata('logged_in')){
      $data['detail'] = $this->Restoran_model->details($id);           

      $this->load->view('partials/header');
      $this->load->view('add_promo',$data);
      $this->load->view('partials/footer');
   }
  }

 public function add_promo(){
  if($this->session->userdata('logged_in')){

    $this->form_validation->set_rules('periode', 'Periode', 'required');
    $this->form_validation->set_rules('desc', 'Deskripsi', 'required');    
    


    if ($this->form_validation->run($this) == FALSE){ 
           
       $this->load->view('partials/header'); 
       $this->load->view('add_promo');
       $this->load->view('partials/footer');
    }else{
      $params = array(
        'periode' => $this->input->post('periode'),
        'description' => $this->input->post('desc'),
        'id_places_resto' => $this->input->post('id')
      );
      $id = $this->input->post('id');
      $q = $this->Restoran_model->insert_promo($params,$id);
      $success = 'restoran/details/'.$id;
      if($q){
        redirect($success);
      }else{
        redirect('restoran');
      }
    }

  }else{
    redirect('auth');
  }
 }

 public function edit_promo($id='NULL'){
  if($this->session->userdata('logged_in')){
   $data['detail'] = $this->Restoran_model->get_promo_detail($id);
   $this->load->view('partials/header'); 
   $this->load->view('edit_promo',$data);
   $this->load->view('partials/footer'); 
  }else{
    redirect('auth');
  }
 }

 public function update_promo(){
  if($this->session->userdata('logged_in')){
    $this->form_validation->set_rules('periode', 'Name', 'required');
    $this->form_validation->set_rules('desc', 'Deskripsi', 'required');


    if ($this->form_validation->run($this) == FALSE){ 
           
       $this->load->view('partials/header'); 
       $this->load->view('edit_promo');
       $this->load->view('partials/footer');
    }else{
      $params = array(
        'periode' => $this->input->post('periode'),
        'description' => $this->input->post('desc')
      );

      $id = $this->input->post('id');
      $success='restoran/details/'.$this->input->post('idresto');
       $query = $this->Restoran_model->updatePromo($params,$id);       
       if($query){
         redirect($success);
       }else{
         redirect('home');
       }    
    }

  }else{
    redirect('auth');
  }
 }

 public function delete($id='NULL'){
   if($this->session->userdata('logged_in')){
    $query = $this->Restoran_model->delete($id);
    if($query){
      redirect('restoran');
    }else{
      redirect('home');
    }
   }else{
    redirect('auth');
   }
  
 }

 public function destroy($id='NULL'){
   if($this->session->userdata('logged_in')){
    $query = $this->Restoran_model->destroy($id);
    if($query){
      redirect('restoran');
    }else{
      redirect('home');
    }
   }else{
    redirect('auth');
   }
  
 }

}
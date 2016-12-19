<body>

 <?php $this->load->view('partials/menu');?>
 <?php foreach ($detail as $d): ?>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">      
      <h1 class="page-header">Edit Menu Restoran</h1>
      <?php echo $error;?>
      <?php echo validation_errors();?>
        <form method="post" action="<?php echo base_url();?>Restoran/update_menu" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $d->id; ?>">
          <div class="form-group">
            <label for="name">Nama Menu</label>
            <input type="name" name="name" class="form-control"  placeholder="Nama" value="<?php echo $d->name; ?>">
          </div>
         <div class="form-group">
           <label for="desc">Deskripsi</label>
            <textarea class="form-control" rows="5" name="desc" id="comment"><?php echo $d->description; ?></textarea>
         </div>
         <div class="form-group">
           <label for="name">Harga</label>
           <input type="name" name="price" class="form-control"  placeholder="27000" value="<?php echo $d->price; ?>">
         </div>
          <div class="form-group">
            <label for="image">Gambar</label>
            <input type="file" id="image" name="userfile">              
          </div>
          <div class="form-group">       
             <?php $path = base_url().'assets/uploads/'.$d->image;?>             
              <img src="<?php echo base_url();?>assets/uploads/<?php echo $d->image   ?>" class="img img-responsive">  
              <input type="hidden" name="image" value="<?php echo $d->image;?>">          
            </div>            
          <a href="<?php echo base_url()?>restoran/get_menu/<?php echo $d->id?>" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-arrow-left"></i></a>
          <button type="submit" class="btn btn-success btn-sm">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>   
<?php  endforeach ?>
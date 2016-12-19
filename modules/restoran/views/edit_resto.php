  <body>
  <?php foreach($content as $c):?>
   <?php $this->load->view('partials/menu');?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Edit Restoran</h1>
        <?php echo $error;?>
        <?php echo validation_errors();?>        
          <form method="post" action="<?php echo base_url();?>restoran/update" enctype="multipart/form-data">
          <input type="hidden" name="idd" value="<?php echo $c->id;?>">
            <div class="form-group">
              <label for="name">Nama Restoran</label>
              <input type="name" name="name" class="form-control"  value="<?php echo $c->name?>">
            </div>
            <div class="form-group">
              <label for="latitude">Latitude</label>
              <input type="text" name="latitude" class="form-control" value="<?php echo $c->lat;?>">
            </div>
            <div class="form-group">
              <label for="longitude">Longitude</label>
              <input type="text" name="longitude" class="form-control" value="<?php echo $c->lng;?>">
            </div>
            <div class="form-group">
              <label for="longitude">Jam Buka</label>
              <input type="text" name="open" class="form-control" value="<?php echo $c->open;?>">
            </div>
            <div class="form-group">
              <label for="longitude">Jam Tutup</label>
              <input type="text" name="close" class="form-control" value="<?php echo $c->close;?>">
            </div>
            <div class="form-group">
              <label for="image">Gambar</label>
              <input type="file" id="image" name="userfile" value="<?php echo $c->image;?>">              
            </div>
            <div class="form-group">       
             <?php $path = base_url().'assets/uploads/'.$c->image;?>
             <?php echo $path;?>
              <img src="<?php echo base_url();?>assets/uploads/<?php echo $c->image   ?>" class="img img-responsive">  
              <input type="hidden" name="image" value="<?php echo $c->image;?>">          
            </div>

            <button type="submit" class="btn btn-success btn-sm">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>   
<?php endforeach ?>

  <body>

   <?php $this->load->view('partials/menu');?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Tambah Tempat Perbelanjaan</h1>
        <?php echo $error;?>
        <?php echo validation_errors();?>
          <form method="post" action="<?php echo base_url();?>mall/create" enctype="multipart/form-data">
            <div class="form-group">
              <label for="name">Nama Pusat Perbelanjaan</label>
              <input type="name" name="name" class="form-control"  placeholder="Nama">
            </div>
            <div class="form-group">
              <label for="latitude">Latitude</label>
              <input type="text" name="latitude" class="form-control" placeholder="-6.304556">
            </div>
            <div class="form-group">
              <label for="longitude">Longitude</label>
              <input type="text" name="longitude" class="form-control" placeholder="106.643197">
            </div>
            <div class="form-group">
              <label for="image">Gambar</label>
              <input type="file" id="image" name="userfile">              
            </div>            
            <button type="submit" class="btn btn-success btn-sm">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>   

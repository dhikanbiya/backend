<body>

 <?php $this->load->view('partials/menu');?>
 <?php foreach ($detail as $d): ?>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">      
      <h1 class="page-header">Tambah Menu Restoran <?php echo $d->name; ?></h1>
      <?php echo $error;?>
      <?php echo validation_errors();?>
        <form method="post" action="<?php echo base_url();?>Restoran/create_menu" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $d->id; ?>">
          <div class="form-group">
            <label for="name">Nama Menu</label>
            <input type="name" name="name" class="form-control"  placeholder="Nama" value="<?php echo set_value('name'); ?>">
          </div>
         <div class="form-group">
           <label for="desc">Deskripsi</label>
            <textarea class="form-control" rows="5" name="desc" id="comment"><?php echo set_value('desc'); ?></textarea>
         </div>
         <div class="form-group">
           <label for="name">Harga</label>
           <input type="name" name="price" class="form-control"  placeholder="27000" value="<?php echo set_value('price'); ?>">
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
<?php  endforeach ?>
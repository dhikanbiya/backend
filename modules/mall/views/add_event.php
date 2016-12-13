  <body>
  <?php foreach($detail as $d): ?>
   <?php $this->load->view('partials/menu');?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Tambah <?php echo $d->name ?> Event</h1>
        <?php echo $error;?>
        <?php echo validation_errors();?>
          <form method="post" action="<?php echo base_url();?>mall/create_event" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $d->id ?>">
            <div class="form-group">
              <label for="name">Nama Event</label>
              <input type="name" name="name" class="form-control"  placeholder="Nama" value="<?php echo set_value('name'); ?>">
            </div>
            <div class="form-group">
              <label for="date">Tanggal</label>
              <input type="text" name="date" class="form-control" placeholder="2016-11-15" value"<?php echo set_value('date'); ?>">
            </div>
            <div class="form-group">
              <label for="desc">Deskripsi</label>
               <textarea class="form-control" rows="5" name="desc" id="comment"><?php echo set_value('desc'); ?></textarea>
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
<?php endforeach ?>
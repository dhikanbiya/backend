<body>
 <?php $this->load->view('partials/menu');?>
 <?php foreach ($detail as $d): ?>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">      
      <h1 class="page-header">Edit Promo Restoran</h1>      
      <?php echo validation_errors();?>
        <form method="post" action="<?php echo base_url();?>Restoran/update_promo" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $d->id; ?>">
        <input type="hidden" name="idresto" value="<?php echo $d->id_places_resto; ?>">
          <div class="form-group">
            <label for="name">Periode</label>
            <input type="name" name="periode" class="form-control"  placeholder="21 Desember - 1 Januari 2016" value="<?php echo $d->periode; ?>">
          </div>
         <div class="form-group">
           <label for="desc">Deskripsi</label>
            <textarea class="form-control" rows="5" name="desc" id="comment"><?php echo $d->description; ?></textarea>
         </div>         
         <button type="submit" class="btn btn-success btn-sm">Submit</button>
    </div>
  </div>
</div>   
<?php  endforeach ?>
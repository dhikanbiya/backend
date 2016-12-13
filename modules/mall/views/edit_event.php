  <body>
  <?php foreach($content as $c):?>
   <?php $this->load->view('partials/menu');?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Edit Event Perbelanjaan</h1>
        <?php print_r($error);?>
        <?php echo validation_errors();?>        
          <form method="post" action="<?php echo base_url();?>mall/update_event" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $c->id ?>">
            <div class="form-group">
              <label for="name">Nama Event</label>
              <input type="name" name="name" class="form-control"  placeholder="Nama" value="<?php echo $c->name;?>">
            </div>
            <div class="form-group">
              <label for="latitude">Tanggal</label>
              <input type="text" name="date" class="form-control" placeholder="2016-11-15" value="<?php echo $c->date;?>">
            </div>
            <div class="form-group">
              <label for="desc">Deskripsi</label>
               <textarea class="form-control" rows="5" name="desc" id="comment" >
                 <?php echo $c->description; ?>

               </textarea>
            </div>
            <div class="form-group">
              <label for="image">Gambar</label>
              <input type="file" id="image" name="userfile">              
            </div>
            <div class="form-group">       
             <?php $path = base_url().'assets/uploads/'.$c->image;      ?>
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

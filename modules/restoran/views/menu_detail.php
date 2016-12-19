  <body>  
   <?php $this->load->view('partials/menu');?>
   <?php foreach ($content as $c): ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <img class="img-responsive img" src="<?php echo base_url();?>assets/uploads/<?php echo $c->image;?>">
          <h1 class="page-header"><?php echo $c->name; ?></h1>           
          <p><?php echo $c->price; ?></p>
          <p><?php echo $c->description; ?></p>
          <p><a href="<?php echo base_url();?>restoran/details/<?php echo $c->id_places_resto?>"><span class="btn btn-success btn-xs"><i class="glyphicon glyphicon-arrow-left"></i></span></a>&nbsp;&nbsp;<a href="<?php echo base_url();?>restoran/edit_menu/<?php echo $c->id?>"><span class="btn btn-success btn-xs">Edit</span></a></p>
        </div>
      </div>
    </div>
  </div>   
<?php endforeach ?> 
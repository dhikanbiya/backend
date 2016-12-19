  <body>
  <?php foreach ($details as $d): ?>
   <?php $this->load->view('partials/menu');?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Detail Restoran <?php echo $d->name; ?></h1> 
          <img class="img-responsive img" src="<?php echo base_url();?>assets/uploads/<?php echo $d->image;?>">
          <h3>Promo Restoran <a href="<?php echo base_url();?>restoran/promo/<?php echo $d->id;?>"<span class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Promo</span></a></h3>

          <table class="table table-striped">
          <thead>
            <tr>              
              <td>Periode</td>
              <td>Deskripsi</td>              
              <td>Opsi</td>
            </tr>
          </thead>
          <tbody>
          <?php foreach($promo as $p): ?>
            <tr>
              <td><?php echo $p->periode; ?></td>
              <?php $strings =  $p->description; ?>
              <td><?php echo $strings = word_limiter($strings, 10); ?></td>
              <td>
                <a href="<?php echo base_url()?>restoran/edit_promo/<?php echo $p->id;?>"<i class="glyphicon glyphicon-edit"></i>edit</a>&nbsp;&nbsp;<a href="<?php echo base_url()?>restoran/delete_promo/<?php echo $p->id;?>"><i class="glyphicon glyphicon-trash"></i>hapus</a>
              </td>
            </tr>
          <?php endforeach ?>
          </tbody>
          </table>



          <h3>Menu Restoran <a href="<?php echo base_url();?>restoran/add_menu/<?php echo $d->id;?>"<span class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Menu</span></a></h3>         
          <table class="table table-striped">
            <thead>
              <tr>
              <td>Nama</td>              
              <td>Deskripsi</td>              
              <td>Harga</td>
              <td>Opsi</td>              
              </tr>
            </thead>
            <tbody>              
                <?php  foreach($content as $c): ?>
                <tr>
                <td><?php echo $c->name;?></td>                
                <?php $string =  $c->description; ?>
                <td><?php echo $string = word_limiter($string, 10); ?></td>
                <td><?php echo $c->price; ?></td>
                <td><a href="<?php echo base_url()?>restoran/get_menu/<?php echo $c->id;?>"<i class="glyphicon glyphicon-info-sign"></i>detail</a>&nbsp;&nbsp;<a href="<?php echo base_url()?>restoran/edit_menu/<?php echo $c->id;?>"<i class="glyphicon glyphicon-edit"></i>edit</a>&nbsp;&nbsp;<a href="<?php echo base_url()?>restoran/delete/<?php echo $c->id;?>"><i class="glyphicon glyphicon-trash"></i>hapus</a></td>
              </tr>
              <?php endforeach?>
              
            </tbody>          
          </table>
        </div>
      </div>
    </div>
  </div>   
<?php endforeach ?>
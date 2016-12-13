  <body>
  <?php foreach ($details as $d): ?>
   <?php $this->load->view('partials/menu');?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><?php echo $d->name; ?> Events <a href="<?php echo base_url();?>mall/add_event/<?php echo $d->id;?>"<span class="pull-right btn btn-success btn-sm">Tambah</span></a></h1> 
          <img class="img-responsive img" src="<?php echo base_url();?>assets/uploads/<?php echo $d->image;?>">         
          <table class="table table-striped">
            <thead>
              <tr>
              <td>Nama</td>              
              <td>Date</td>              
              <td>Desc</td>
              <td>Opsi</td>              
              </tr>
            </thead>
            <tbody>              
                <?php  foreach($content as $c): ?>
                <tr>
               <?php $string = $c->desc;?>
                <td><?php echo $c->name; ?></td>
                <td><?php echo $c->date; ?></td>
                <td><?php echo $string = word_limiter($string, 30); ?></td>
                <td><a href="<?php echo base_url()?>mall/edit_event/<?php echo $c->ids;?>"<i class="glyphicon glyphicon-edit"></i>edit</a>&nbsp;&nbsp;<a href="<?php echo base_url()?>mall/delete/<?php echo $c->ids;?>"><i class="glyphicon glyphicon-trash"></i>hapus</a></td>
              </tr>
              <?php endforeach?>
              
            </tbody>          
          </table>
        </div>
      </div>
    </div>
  </div>   
<?php endforeach ?>
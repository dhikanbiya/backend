  <body>

   <?php $this->load->view('partials/menu');?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Tempat Perbelanjaan <a href="<?php echo base_url()?>mall/add"><span class="pull-right btn btn-success btn-sm">Tambah</span></a></h1>          
          <table class="table table-striped">
            <thead>
              <tr>
              <td>Nama</td>              
              <td>Latitude</td>              
              <td>Longitude</td>
              <td>Opsi</td>              
              </tr>
            </thead>
            <tbody>              
                <?php  foreach($content as $c): ?>
                <tr>
                <td><?php echo $c->name; ?></td>
                <td><?php echo $c->lat; ?></td>
                <td><?php echo $c->long; ?></td>
                <td><a href="<?php echo base_url()?>mall/events/<?php echo $c->id; ?>"><i class="glyphicon glyphicon-calendar"></i>event</a>&nbsp;&nbsp;<a href="<?php echo base_url();?>mall/edit/<?php echo $c->id?>"><i class="glyphicon glyphicon-edit"></i>edit</a>&nbsp;&nbsp;<a href="<?php echo base_url()?>mall/destroy/<?php echo $c->id;?>"><i class="glyphicon glyphicon-trash"></i>hapus</a></td>
              </tr>
              <?php endforeach?>
              
            </tbody>          
          </table>
        </div>
      </div>
    </div>
  </div>   

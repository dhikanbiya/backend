<body>
 <?php $this->load->view('partials/menu');?>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">      
      <h1 class="page-header">Edit Password</h1>      
      <?php echo validation_errors();?>
        <form method="post" action="<?php echo base_url();?>home/update">                
          <div class="form-group">
            <label for="password">Password Lama</label>
            <input type="password" name="oldpass" class="form-control">
          </div>
          <div class="form-group">
            <label for="password">Password Baru</label>
            <input type="password" name="password" class="form-control">
          </div>
          <div class="form-group">
            <label for="password">Konfirmasi Password Baru</label>
            <input type="password" name="passconf" class="form-control">
          </div>         
         <button type="submit" class="btn btn-success btn-sm">Submit</button>
    </div>
  </div>
</div>   
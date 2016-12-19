  <body>
     <?php $this->load->view('partials/menu'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <p><?php echo $this->session->flashdata('msg'); ?></p>
          <h1 class="page-header">Dashboard</h1>
          <div class="col-md-6">
            <h3>Total Tempat Perbelanjaan</h3>
          </div>
          <div class="col-md-6">
            <h3>Total Restoran</h3>
          </div>
        </div>
      </div>
    </div>
  </div>   

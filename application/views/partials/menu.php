 <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">CMore Backend</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
             <li><a href="#">Selamat Datang, <?php echo $this->session->logged_in['email'] ?></a></li>            
            <li><a href="<?php echo base_url()?>auth/logout">Logout</a></li>                       
          </ul>          
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
           <?php echo ($this->uri->segment(1) == "home/" ? "<li class='active'>" : "<li>") ?><a href="<?php echo base_url()?>home">Overview <span class="sr-only">(current)</span></a></li>
            <?php echo ($this->uri->segment(1) == "mall" ? "<li class='active'>" : "<li>") ?><a href="<?php echo base_url()?>mall">Tempat Perbelanjaan</a></li>
            <?php echo ($this->uri->segment(1) == "restoran" ? "<li class='active'>" : "<li>") ?><a href="<?php echo base_url()?>restoran">Restoran</a></li>            
          </ul>
          <ul class="nav nav-sidebar">          
            <?php echo ($this->uri->segment(2) == "pass" ? "<li class='active'>" : "<li>") ?><a href="<?php echo base_url()?>home/pass">Ubah Password</a></li>            
          </ul>                    
        </div>


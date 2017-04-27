  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-2">
            <img class="img-thumbnail img-responsive margin-b10" src="<?php echo base_url();?>assets/img/logoDel.png" width="100" height="100" alt="Logo SMA Karangan" />
        </div>
        
        <div class="col-md-10">
          <?php foreach ($titlesistem as $t): ?>
            <h3 class="judul-head"><?php echo $t['title']?></h3>      
          <?php endforeach ?>  
        </div>
      </div>
      
      <div>
        <div>
          <div class="row">
          <hr class="hr1 margin-b-10" />
        </div>
      </div>

      <div class="container  margin-b70">
        <div class="row">
          <div class="col-md-12">
            <?php if($msg = $this->session->flashdata('sukses')){ echo $msg; }?>
            <nav class="navbar navbar-default navbar-utama nav-admin-data" role="navigation">
              <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="#">Daftar Produk Elektronik</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                  <ul class="nav navbar-nav">
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>  
          </div>
        </div>

        <div class="table-responsive">
          <table id="table_data" class="table table-bordered table-striped table-admin">
            <thead>
              <tr>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Rating</th>
              </tr>
            </thead>
            
            <tbody>
              <?php foreach ($view_produk_electronics as $o): ?>    
              <tr>
                <td><a href="<?php echo base_url() ?>view_produk_books_form"><p><?=$o['product_name'] ?></p></a></td>
                <td><?=$o['product_price'] ?></td>
                <td><?php if($o['overall']==0 OR $o['overall']==null){
                echo "<span style='color:red'>(BELUM DIRATING) </span>" ?>
                <?php }else{ ?><?=$o['overall'] ?><?php } ?></td>
              </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
          

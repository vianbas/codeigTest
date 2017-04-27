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
                  <a class="navbar-brand" href="#">Daftar Buku</a>
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


        <div class="col-md-12">
            <?php if($msg = $this->session->flashdata('sukses')){ echo $msg; }?>
            <nav class="navbar navbar-default nav-admin-data" role="navigation">
              <div class="navbar-header">
                <a class="navbar-brand" href="#">Daftar Buku</a>
              </div>
            </nav>  
            <div class="table-responsive col-md-12">
              <table id="table_data" class="table table-bordered table-admin">
                <tr>
                  <?php foreach ($view_produk_books_form as $vbook): ?>
                  <td><img src="<?php echo base_url('assets/img/produk/'.$vbook['product_id'].'.png');?>" width="40" height="40"></td>
                  <td>
                    <br><?=$vbook['product_name'] ?>
                    <br>$ <?=$vbook['product_price'] ?>
                  </td>
                </tr>
                <?php endforeach ?>
              </table>
            </div>
          </div>

      </div>
    </div>
  </div>
</div>
          

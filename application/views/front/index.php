<div class="container">
  <div class="row">
    <div class="col-md-12">

      <div class="col-md-2">
        <img class="img-thumbnail img-responsive margin-b10" src="<?php echo base_url();?>assets/img/logoDel.png" width="100" height="100" />
      </div>

      <div class="col-md-10">
        <?php foreach ($titlesistem as $t): ?>
          <h3 class="judul-head"><?php echo $t['title']?></h3>      
        <?php endforeach ?>
      </div>

      <div class="col-md-12">
          <div class="alert alert-success fade in">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5>Selamat Datang Di Sistem kami <strong>App TA....!</strong>
             <img src="<?php echo base_url();?>assets/img/smile.png" width="20" height="20" /></h5> 
          </div>
          <div>

          <a class="btn btn-success" href="#">Kategori Buku</a>
          <a class="btn btn-warning" href="<?php echo base_url('view_electronics') ?>">Kategori Electronik</a>
          <a class="btn btn-warning" href="<?php echo base_url('view_movie') ?>">Kategori Movies & TV</a>
          <a class="btn btn-warning" href="<?php echo base_url('view_automotive') ?>">Kategori Automotive</a>
          <a class="btn btn-warning" href="<?php echo base_url('view_musical') ?>">Kategori Musical Instrument</a>
          </div>
      </div>

      <div class="ukuran500 tengah">
        <div class="head-depan tengah">
          <div class="row">
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
        
          <div class="row">
          <div class="col-md-12">
            <?php if($msg = $this->session->flashdata('sukses')){ echo $msg; }?>
            <nav class="navbar navbar-default nav-admin-data" role="navigation">
              <div class="navbar-header">
                <a class="navbar-brand" href="#">Daftar Buku</a>
              </div>
            </nav> 

              <table id="table_data" class="table table-bordered table-admin">
                <tr>
                  <?php foreach ($view as $o): ?>
                  <td>
                  <a href="<?php echo base_url('view_produk_books_form') ?>">
                    <img class="img-rounded" 
                      src="<?php echo base_url('assets/img/produk/'.$o['product_id'].'.png');?>" 
                      width="100" height="150">
                  </a>
                  <br>
                    <a href="<?php echo base_url('view_produk_books_form/'.$o['product_id']) ?>">
                    <br>
                      <?=$o['product_name'] ?></a>
                    <br>
                      $ <?=$o['product_price'] ?>
                  </td>
                  <?php endforeach ?>
                </tr>     
              </table>
          </div>
          </div>

        </div>
      </div> 

    </div>
  </div>
</div>
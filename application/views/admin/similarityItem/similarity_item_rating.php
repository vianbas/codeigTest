<div class="container margin-b70">
  <div class="row">
   <!-- <div class="col-md-12">
    <a class="btn btn-primary" href="<?php echo base_url(); ?>administrasi/generate_rata_rekomendasi">Proses Selanjutnya</a><br><br></div> -->
    <div class="col-md-12">
      <?php if($msg = $this->session->flashdata('sukses')){ echo $msg; } ?>
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
            <a class="navbar-brand" href="#">Data Item Rating</a>
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
        <tr bgcolor="#496CEA">
          <td>Produk 1</td>
          <td>Produk 2</td>
          <td>Similarity</td>
        </tr>
      </thead>
      <tbody>
        <?php foreach($data_ke_view->result_array() as $s){ ?>
        <tr>
          <td><?php echo $s['product_id1']; ?></td>
          <td><?php echo $s['product_id2']; ?></td>
          <td><?php echo $s['nilai_similarity']; ?></td>
        </tr>
        <?php } ?>
      </tbody>
      </tr>
    </table>
  </div>
</div>
<div class="container margin-b70">
  <div class="row">
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
            <a class="navbar-brand" href="#">Daftar Produk</a>
          </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav">
              <li><a href="<?php echo base_url() ?>administrasi/data_product/add"><i class="fa fa-plus-circle"></i> Tambah Data</a></li>
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
          <th>No</th>
          <th>Asin</th>
          <th>Kategori</th>
          <th>Nama Produk</th>
          <th>Gambar</th>
          <th>Harga</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data_product as $o): ?> 
       
        <tr>
          <td><?=$o['product_id'] ?></td>
          <td><?=$o['asin'] ?></td>
          <td>(<?=$o['category_id']  ?>) <?=$o['category_name'] ?></td>
          <td><?=$o['product_name'] ?></td>
          <td><img class="img-rounded" src="<?php echo base_url('assets/img/produk/'.$o['product_id'].'.png');?>" width="100" height="150">
          </td>
          <td><?=$o['product_price'] ?></td>
          <td>
            <table>
              <tr>
                <td><a href="<?=base_url();?>administrasi/data_product/edit/<?=$o['product_id'] ?>" class="btn btn-success" rel="tooltip" data-original-title="Mengubah data pada baris ini" data-placement="top"><i class="fa fa-pencil"></i> Edit</a></td>
                <td>&nbsp &nbsp</td>
                <td><a href="<?=base_url();?>administrasi/data_product/del/<?=$o['product_id'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')" class="btn btn-danger " rel="tooltip" data-original-title="Menghapus Data pada baris ini" data-placement="top"><i class="fa fa-trash-o"></i> Hapus</a></td>
              </tr>
            </table>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>
        

  
    <div class="container margin-b70">
      <div class="row">
        <div class="col-md-12">
        <?php
        if($msg = $this->session->flashdata('sukses')){
        echo $msg;
        }
        ?>
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
                <a class="navbar-brand" href="#">Data produk yang dirating oleh pengunjung</a>
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
            <thead><tr><th>No</th><th>Nama Produk</th><th>Kategory</th><th>Helpful</th><th>Rating</th><th>Nama Pengunjung</th></tr></thead>
            <tbody>
            <?php foreach ($data_produk_rating_books as $p): ?>    
            <tr>
            <td><?=$p['id'] ?></td>
            <td> <?=$p['product_name'] ?></td>
            <td><?=$p['category_name'] ?></td>
            <td><?=$p['helpful'] ?></td>
            <td><?=$p['overall'] ?></td>
            <td> <?=$p['auth_key'] ?></td>
            </tr>
            <?php endforeach ?>
            </tbody>
            </table>

          </div>

        </div>
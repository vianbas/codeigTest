
    <div class="container margin-b70">
      <div class="row">
        <div class="col-md-12">
          <?php if($msg = $this->session->flashdata('sukses')){ echo $msg; }?>
          <nav class="navbar navbar-default navbar-utama nav-data" role="navigation">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Daftar Pengunjung</a>
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
              <th>No</th>
              <th>Username Pengunjung</th>
              <th>Auth Key</th>
              <th>Email</th>
              <th>Status</th>
              <th>Created at</th>
              <th>Updated at</th>
            </tr>
          </thead>
          
          <tbody>
            <?php foreach ($data_pengunjung as $o): ?>    
            <tr>
              <td><?=$o['id'] ?></td>
              <td><?=$o['username'] ?></td>
              <td><?=$o['auth_key'] ?></td>
              <td><?=$o['email'] ?></td>
              <td><?=$o['status'] ?></td>
              <td><?=$o['created_at'] ?></td>
              <td><?=$o['updated_at'] ?></td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
        

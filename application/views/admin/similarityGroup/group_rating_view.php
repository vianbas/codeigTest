<div class="container margin-b70">
  <div class="row">
    <div class="col-md-12">
      <a class="btn btn-primary" href="<?php echo base_url(); ?>administrasi/similarity_group_rating">Proses Similarity Group Rating</a><br><br></div>
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
          <td>No Produk</td>
          <td>Nama Produk</td>
          <td>Centroid 1</td>
          <td>Centroid 2</td>
          <td>Centroid 3</td>
          <td>Centroid 4</td>
        </tr>
      </thead>
      <tbody>
        <?php foreach($group_rating_view->result_array() as $s){ ?>
        <tr>
          <td><?php echo $s['product_id']; ?></td>
          <td><?php echo $s['product_name']; ?></td>
          <td><?php echo $s['d1']; ?></td>
          <td><?php echo $s['d2']; ?></td>
          <td><?php echo $s['d3']; ?></td>
          <td><?php echo $s['d4']; ?></td>
        </tr>
        <?php } ?>
      </tbody>
      <?php 

        $qry1=mysql_query("select AVG(d1) as rata_d1 from hasil");
        $data1=mysql_fetch_array($qry1);

        $qry2=mysql_query("select AVG(d2) as rata_d2 from hasil");
        $data2=mysql_fetch_array($qry2);

        $qry3=mysql_query("select AVG(d3) as rata_d3 from hasil");
        $data3=mysql_fetch_array($qry3);

        $qry4=mysql_query("select AVG(d4) as rata_d4 from hasil");
        $data4=mysql_fetch_array($qry4);

      ?>
      <tr>      
        <td colspan="2"><strong>Rata-rata</strong></td>
        <td><?php echo number_format(($data1['rata_d1']),1);  ?></td>
        <td><?php echo number_format(($data2['rata_d2']),1); ?></td>
        <td><?php echo number_format(($data3['rata_d3']),1); ?></td>
        <td><?php echo number_format(($data4['rata_d4']),1); ?></td>
      </tr>
      <?php  
        $this->db->query('truncate table rata_rata_group');
        $simpan="insert into rata_rata_group(rata_d1,rata_d2,rata_d3,rata_d4) values('".number_format(($data1['rata_d1']),1)."','".number_format(($data2['rata_d2']),1)."','".number_format(($data3['rata_d3']),1)."','".number_format(($data4['rata_d4']),1)."')";
        $this->db->query($simpan); ?>
    </table>
  </div>
</div>
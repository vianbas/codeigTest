    <div class="container margin-b70">
      <div class="row">
        <div class="col-md-12">
          <h1>Data Akhir</h1>

          <div id="body">
          <a  class="btn btn-primary" href="<?php echo base_url(); ?>administrasi/generate_rata_rekomendasi">Proses Data Rata-Rata</a>
          <a  class="btn btn-success" href="<?php echo base_url(); ?>administrasi/generate_centroid_rekomendasi">Proses Data Akhir</a>
          <br><br>
          <div class="table-responsive">
            <table  id="table_data" class="table table-bordered table-striped table-admin">
            <tr><td>Centroid 1</td><td>Kelompok 1 (c1)</td><td><?php echo $c1a; ?> </td><td><?php echo $c1b; ?> 
            <tr><td>Centroid 2</td><td>Kelompok 2 (c2)</td><td><?php echo $c2a; ?> </td><td><?php echo $c2b; ?> 
            <tr><td>Centroid 3</td><td>Kelompok 3 (c3)</td><td><?php echo $c3a; ?> </td><td><?php echo $c3b; ?> 
            <tr><td>Centroid 4</td><td>Kelompok 4 (c4)</td><td><?php echo $c4a; ?> </td><td><?php echo $c4b; ?>
          </table>
          </div>
          <br>
          <br>
          <div class="table-responsive">
            <table  id="table_data" class="table table-bordered table-striped table-admin">
            <tr align="center" bgcolor="#496CEA">
              <td>No Produk</td>
              <td>Nama Produk</td>
              <td>Rating</td>
              <td>Rata-Rata</td>
              <td colspan="4">Distance</td>
              <td>Predikat</td></tr>
              
            <?php foreach($generate_centroid_rekomendasi->result_array() as $s){ ?>
            <tr>
              <td><?php echo $s['product_id']; ?></td>
              <td><?php echo $s['product_name']; ?></td>
              <td><?php echo $s['overall']; ?></td>
              <td><?php echo $s['rata_rata']; ?></td>
              <td><?php echo $s['d1']; ?></td>
              <td><?php echo $s['d2']; ?></td>
              <td><?php echo $s['d3']; ?></td>
              <td><?php echo $s['d4']; ?></td>
              <td><?php echo $s['predikat']; ?></td>
            </tr>
            <?php } ?>
          </table>
          </div>
          </div>
          <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
        </div>
      </div>
    </div>
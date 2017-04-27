    <div class="container margin-b70">
      <div class="row">
        <div class="col-md-12">
        <?php error_reporting(0); ?>
          <h1>Data Awal</h1>

            <div id="body">
            <a class="btn btn-primary" href="<?php echo base_url(); ?>administrasi/iterasi_kmeans_lanjut_rekomendasi">Proses Iterasi Selanjutnya</a><br><br>
            <div class="table-responsive">
            <table  id="table_data" class="table table-bordered table-admin">
              <tr align="center" bgcolor="#16D637">
                <td rowspan="2">No Produk</td>
                <td rowspan="2">Kategori</td>
                <td rowspan="2">Nama Produk</td>
                <td rowspan="2">Harga Produk</td>
                <td rowspan="2">Rating</td>
                <td colspan="2">Centroid 1</td>
                <td colspan="2">Centroid 2</td>
                <td colspan="2">Centroid 3</td>
                <td colspan="2">Centroid 4</td>
                <td rowspan="2">C1</td>
                <td rowspan="2">C2</td>
                <td rowspan="2">C3</td>
                <td rowspan="2">C4</td>
              </tr>
              <tr bgcolor="#A1B9F1">
                <td>5</td><td>13.95</td>
                <td>1</td><td>278.83</td>
                <td>3</td><td>12.95</td>
                <td>4</td><td>0.02</td>
              </tr>
              
              <?php 
              $c1a = 5;
              $c1b = 13.95;
              
              $c2a = 1;
              $c2b = 78.83;

              
              $c3a = 3;
              $c3b = 12.95;

              $c4a = 4;
              $c4b = 0.02;
    

              $c1a_b = "";
              $c1b_b = "";
              
              $c2a_b = "";
              $c2b_b = "";
              
              $c3a_b = "";
              $c3b_b = "";

              $c4a_b = "";
              $c4b_b = "";
              
              $hc1=0;
              $hc2=0;
              $hc3=0;
              $hc4=0;
              
              $no=0;
              $arr_c1 = array();
              $arr_c2 = array();
              $arr_c3 = array();
              $arr_c4 = array();
              
              $arr_c1_temp = array();
              $arr_c2_temp = array();
              
              $this->db->query('truncate table centroid_temp');
              $this->db->query('truncate table hasil_centroid');
              foreach($iterasi_kmeans_rekomendasi->result_array() as $s){ ?>
             
             <tr>
                <td><?php echo $s['id_product']; ?></td>
                <td><?php echo $s['category_name']; ?></td>
                <td><?php echo $s['product_name']; ?></td>
                <td><?php echo $s['product_price']; ?></td>
                <td><?php echo $s['overall']; ?></td>
              
              <td colspan="2">
                <?php $hc1 = sqrt(pow(($s['overall']-$c1a),2)+pow(($s['product_price']-$c1b),2));
                echo $hc1;
              ?></td>
              <td colspan="2">
                <?php $hc2 = sqrt(pow(($s['overall']-$c2a),2)+pow(($s['product_price']-$c2b),2));
                echo $hc2;?>
                </td>
              <td colspan="2">
                <?php $hc3 = sqrt(pow(($s['overall']-$c3a),2)+pow(($s['product_price']-$c3b),2));
                echo $hc3;?>
                  
                </td>
              <td colspan="2">
                <?php $hc4 = sqrt(pow(($s['overall']-$c4a),2)+pow(($s['product_price']-$c4b),2));
                echo $hc4; ?>
                  
                </td>
                
              <?php 
              
              if($hc1<=$hc2)
              {
                if($hc1<=$hc3)
                {
                  if($hc1<=$hc4)
                    {
                      $arr_c1[$no] = 1;
                    }
                    else
                    {
                      $arr_c1[$no] = '0';
                    }
                  }
                else
                {
                  $arr_c1[$no] = '0';
                }
              }
              else
              {
                $arr_c1[$no] = '0';
              }

              
              if($hc2<=$hc1)
              {
                if($hc2<=$hc3)
                {
                  if($hc2<=$hc4)
                    {
                      $arr_c2[$no] = 1;
                    }
                    else
                    {
                      $arr_c2[$no] = '0';
                    }
                  }
                else
                {
                  $arr_c2[$no] = '0';
                }
              }
              else
              {
                $arr_c2[$no] = '0';
              }

              
              if($hc3<=$hc1)
              {
                if($hc3<=$hc2)
                {
                  if($hc3<=$hc4)
                    {
                      $arr_c3[$no] = 1;
                    }
                    else
                    {
                      $arr_c3[$no] = '0';
                    }
                  }
                else
                {
                  $arr_c3[$no] = '0';
                }
              }
              else
              {
                $arr_c3[$no] = '0';
              }


              if($hc4<=$hc1)
              {
                if($hc4<=$hc2)
                {
                  if($hc4<=$hc3)
                    {
                      $arr_c4[$no] = 1;
                    }
                    else
                    {
                      $arr_c4[$no] = '0';
                    }
                  }
                else
                {
                  $arr_c4[$no] = '0';
                }
              }
              else
              {
                $arr_c4[$no] = '0';
              }
              
              $arr_c1_temp[$no] = $s['overall'];
              $arr_c2_temp[$no] = $s['product_price'];
              //$arr_c3_temp[$no] = $s['jumlah_fasilitas_total'];
              
              $warna1="";
              $warna2="";
              $warna3="";
              $warna4="";
              ?>
              <?php if($arr_c1[$no]==1){$warna1='#FFFF00';} else{$warna1='#ccc';} ?><td bgcolor="<?php echo $warna1; ?>"><?php echo $arr_c1[$no] ;?></td>
              <?php if($arr_c2[$no]==1){$warna2='#FFFF00';} else{$warna2='#ccc';} ?><td bgcolor="<?php echo $warna2; ?>"><?php echo $arr_c2[$no] ;?></td>
              <?php if($arr_c3[$no]==1){$warna3='#FFFF00';} else{$warna3='#ccc';} ?><td bgcolor="<?php echo $warna3; ?>"><?php echo $arr_c3[$no] ;?></td>
              <?php if($arr_c4[$no]==1){$warna4='#FFFF00';} else{$warna4='#ccc';} ?><td bgcolor="<?php echo $warna4; ?>"><?php echo $arr_c4[$no] ;?></td>
              </tr>
              <?php
              
              $q = "insert into centroid_temp(iterasi,c1,c2,c3,c4) values(1,'".$arr_c1[$no]."','".$arr_c2[$no]."','".$arr_c3[$no]."','".$arr_c4[$no]."')";
              $this->db->query($q);
              
              $no++; } 
              
              //centroid baru 1.a
              $jum = 0;
              $arr = array();
              for($i=0;$i<count($arr_c1);$i++)
              {
                $arr[$i] = $arr_c1_temp[$i]*$arr_c1[$i];
                if($arr_c1[$i]==1)
                {
                  $jum++;
                }
              }
              $c1a_b = array_sum($arr)/$jum;
              
              //centroid baru 1.b
              $jum = 0;
              $arr = array();
              for($i=0;$i<count($arr_c2);$i++)
              {
                $arr[$i] = $arr_c2_temp[$i]*$arr_c1[$i];
                if($arr_c1[$i]==1)
                {
                  $jum++;
                }
              }
              $c1b_b = array_sum($arr)/$jum;

              
              
      
              
              //centroid baru 2.a
              $jum = 0;
              $arr = array();
              for($i=0;$i<count($arr_c1);$i++)
              {
                $arr[$i] = $arr_c1_temp[$i]*$arr_c2[$i];
                if($arr_c2[$i]==1)
                {
                  $jum++;
                }
              }
              $c2a_b = array_sum($arr)/$jum;


              
              
              //centroid baru 2.b
              $jum = 0;
              $arr = array();
              for($i=0;$i<count($arr_c2);$i++)
              {
                $arr[$i] = $arr_c2_temp[$i]*$arr_c2[$i];
                if($arr_c2[$i]==1)
                {
                  $jum++;
                }
              }
              $c2b_b = array_sum($arr)/$jum;
          
              
              
              //centroid baru 3.a
              $jum = 0;
              $arr = array();
              for($i=0;$i<count($arr_c1);$i++)
              {
                $arr[$i] = $arr_c1_temp[$i]*$arr_c3[$i];
                if($arr_c3[$i]==1)
                {
                  $jum++;
                }
              }
              $c3a_b = array_sum($arr)/$jum;
              
              //centroid baru 3.b
              $jum = 0;
              $arr = array();
              for($i=0;$i<count($arr_c2);$i++)
              {
                $arr[$i] = $arr_c2_temp[$i]*$arr_c3[$i];
                if($arr_c3[$i]==1)
                {
                  $jum++;
                }
              }
              $c3b_b = array_sum($arr)/$jum;

              
              //centroid baru 4.a
              $jum = 0;
              $arr = array();
              for($i=0;$i<count($arr_c1);$i++)
              {
                $arr[$i] = $arr_c1_temp[$i]*$arr_c4[$i];
                if($arr_c4[$i]==1)
                {
                  $jum++;
                }
              }
              $c4a_b = array_sum($arr)/$jum;
              
              //centroid baru 4.b
              $jum = 0;
              $arr = array();
              for($i=0;$i<count($arr_c2);$i++)
              {
                $arr[$i] = $arr_c2_temp[$i]*$arr_c4[$i];
                if($arr_c4[$i]==1)
                {
                  $jum++;
                }
              }
              $c4b_b = array_sum($arr)/$jum;
           
              
              $q = "insert into hasil_centroid(c1a,c1b,c2a,c2b,c3a,c3b,c4a,c4b) values('".$c1a_b."','".$c1b_b."','".$c2a_b."','".$c2b_b."','".$c3a_b."','".$c3b_b."','".$c4a_b."','".$c4b_b."')";
              $this->db->query($q);
              
              
              
              ?>
            </table>
            </div>
            </div>

            <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
        </div>
      </div>
    </div>

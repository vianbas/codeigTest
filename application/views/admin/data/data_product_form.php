    
    <div class="container margin-b50 margin-t50">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <nav class="navbar navbar-default navbar-utama nav-admin-data" role="navigation">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <a class="navbar-brand" href="#"><i class="fa fa-plus-circle">
                <?php
                  if($status == 'baru'){
                  echo "</i> Tambah Data Produk</a>";
                  }
                  else {
                  echo "</i> Edit Data Produk</a>";
                  }
                ?>
              </div>
              
              </div><!-- /.container-fluid -->
            </nav>
            
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="well">
              <form class="form-horizontal" role="form" method="post" action="<?=base_url();?>administrasi/data_product/save" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="product_id" value="<?=$product_id ?>" />
                <input type="hidden" class="form-control" name="status" value="<?=$status ?>" />

                <div class="form-group">
                  <label for="inputppp" class="col-sm-3 control-label">Asin</label>
                  <div class="col-sm-6">
                  <div class="left-inner-addon">
                  <i class="fa fa-user"></i>
                      <input type="text" name="asin" value="<?php echo $asin ?>" required class="form-control" id="inputppp" placeholder="Produk" />
                      </div>
                  </div>
                </div>


                <div class="form-group">
                  <label for="inputpp" class="col-sm-3 control-label">Pilih Kategory</label>
                  <div class="col-sm-6">
                    <select name="category_id" class="select2" required>
                      <option value=""> -- Pilih Kategori -- </option>
                      <?php foreach ($category_id as $pp): ?>
                          <option value="<?=$pp['category_id']?>">(<?=$pp['category_id']?>) - <?=$pp['category_name']?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputppp" class="col-sm-3 control-label">Nama Produk</label>
                  <div class="col-sm-6">
                  <div class="left-inner-addon">
                  <i class="fa fa-user"></i>
                      <input type="text" name="product_name" value="<?php echo $product_name ?>" required class="form-control" id="inputppp" placeholder="Produk" />
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputppp" class="col-sm-3 control-label">Harga Produk</label>
                  <div class="col-sm-6">
                  <div class="left-inner-addon">
                  <i class="fa fa-user"></i>
                      <input type="text" name="product_price" value="<?php echo $product_price ?>" required class="form-control" id="inputppp" placeholder="Produk" />
                      </div>
                  </div>
                </div>
                
                <hr class="hr1">
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-primary bold"><i class="fa fa-save"></i>
                      <?php
                        if($status == 'baru'){
                          echo "Simpan";
                        }
                        else {
                          echo "Update";
                        }
                      ?>
                    </button>&nbsp;&nbsp;<a href="<?php echo base_url() ?>administrasi/data_product" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
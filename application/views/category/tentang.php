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
        <div class="ukuran500 tengah">
          <div class="head-depan">
            <div class="row">
              
            </div>
            <hr class="hr1 margin-b-10" />
          </div>
        </div>
          <div class="ttg-container">
          <?php foreach ($tentang as $te): ?>
            <h3 class="text-center text-warning"><?php echo $te['title'] ?></h3>
            <hr class="hr1" />
            <div class="tentang">
            <p>
              <?php echo $te['sub'] ?>
            </p>
            </div> 
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
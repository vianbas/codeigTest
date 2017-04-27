<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <link href="<?=base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/datepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/datatable-bootstrap.css">
    <link href="<?=base_url();?>assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/facebox.css">
    <link rel="stylesheet" href="<?=base_url(); ?>assets/js/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="<?=base_url(); ?>assets/js/select2/select2.css" />
  </head>

  <body class="bagianAdmin">
    <nav class="navbar navbar-default navbar-utama" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">
            <img class="img-circle" src="<?php echo base_url();?>assets/img/logo-navbar.png" class="logo-navbar">
            <strong>Administrasi</strong>
          </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-left">
            <li class="active">
              <a href="<?php echo base_url();?>administrasi/dashboard"><i class="fa fa-home"></i> Beranda</a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                <i class="fa fa-th-list"></i> Referensi <i class="fa fa-caret-down"></i>
              </a>
              <ul class="dropdown-menu tipe-kiri dropdown-menu-login2">
                <li>
                  <a href="<?php echo base_url(); ?>administrasi/data_product">
                  <i class="fa fa-tags"></i> Daftar Produk</a>
                </li>

                <li>
                  <a href="<?php echo base_url(); ?>administrasi/data_category">
                  <i class="fa fa-tags"></i> Daftar Kategori</a>
                </li>

                <li>
                  <a href="<?php echo base_url(); ?>administrasi/data_pengunjung">
                  <i class="fa fa-tags"></i> Daftar Pengunjung</a>
                </li>

                <li>
                  <a href="<?php echo base_url(); ?>administrasi/data_produk_rating">
                  <i class="fa fa-tags"></i> Data Produk yang di rating oleh pengunjung</a>
                </li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                <i class="fa fa-th-list"></i> Analisa Data <i class="fa fa-caret-down"></i>
              </a>
              <ul class="dropdown-menu tipe-kiri dropdown-menu-login2">

                 <li>
                  <a href="<?php echo base_url(); ?>administrasi/generate_awal_rekomendasi">
                  <i class="fa fa-tags"></i> Generate Nilai Rata-Rata dan Centroid Rekomendasi</a>
                </li>

                <li>
                  <a href="<?php echo base_url(); ?>administrasi/iterasi_kmeans_rekomendasi">
                  <i class="fa fa-tags"></i> Iterasi K-Means Clustering pada Rekomendasi</a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>administrasi/item_rating_view">
                  <i class="fa fa-tags"></i> Similarity Item Rating menggunakan Adjusted Cosine</a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>administrasi/group_rating_view">
                  <i class="fa fa-tags"></i> Similarity Group Rating menggunakan Pearson Corelation</a>
                </li>

              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="<?php echo base_url(); ?>administrasi/logout"><i class="fa fa-sign-out"></i><?php echo $nama ?> (Log Out)</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="tengah">
          <div class="head-depan tengah">
            <div class="row">
              <div class="col-md-1">
                <img class="img-thumbnail img-responsive margin-b10" src="<?php echo base_url();?>assets/img/logoDel.png" width="100" height="100"/>
              </div>
              <div class="col-md-11">
                <?php foreach ($titlesistem as $t): ?>
                  <h1 class="judul-head"><?php echo $t['title']?></h1>        
                <?php endforeach ?>
              </div>
            </div>
            <hr class="hr1 margin-b-10" />
          </div>
        </div>
        
      </div>
    </div>

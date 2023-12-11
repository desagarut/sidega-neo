<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view($folder_themes . '/commons/meta') ?>
  <?php $this->load->view($folder_themes . '/commons/for_css') ?>
</head>

<body>
  <?php $this->load->view($folder_themes . '/commons/header') ?>
  <?php // $this->load->view($folder_themes .'/partials/newsticker') 
  ?>
  <div class="breadcrumbs">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 col-12">
          <div class="breadcrumbs-content">
            <h1 class="page-title">Arsip Artikel</h1>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
          <ul class="breadcrumb-nav">
            <li><a href="<?= site_url("first"); ?>"><i class="lni lni-home"></i> Home</a></li>
            <li>Arsip artikel</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- End Breadcrumbs -->


  <!-- ======= Section ======= -->
  <section class="item-details section">
    <div class="container">
      <div class="product-details-info">
        <div class="row">
          <aside class="col-lg-8 col-md-12 col-12">
              <?php $this->load->view($folder_themes . '/partials/arsip.php') ?>
          </aside>
          <aside class="col-lg-4 col-md-12 col-12">
            <div class="sidebar blog-grid-page">
              <?php $this->load->view($folder_themes . '/partials/sidebar.php') ?>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </section>
  <?php $this->load->view($folder_themes . '/commons/footer') ?>
  <?php $this->load->view($folder_themes . '/commons/for_js') ?>
</body>

</html>
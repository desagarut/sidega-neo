<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view($folder_themes . '/commons/meta') ?>
  <?php $this->load->view($folder_themes . '/commons/for_css') ?>
</head>

<body>
  <?php if ($single_artikel['id']) : ?>
    <?php $this->load->view($folder_themes . '/commons/header') ?>
    <?php // $this->load->view($folder_themes .'/partials/newsticker') 
    ?>
    <div class="breadcrumbs">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 col-md-6 col-12">
            <div class="breadcrumbs-content">
              <h1 class="page-title">Artikel</h1>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-12">
            <ul class="breadcrumb-nav">
              <li><a href="<?= site_url("first"); ?>"><i class="lni lni-home"></i> Home</a></li>
              <li>artikel</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- ======= Section ======= -->
    <section class="section blog-single">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-12 col-12">
            <?php $this->load->view($folder_themes . '/partials/article.php') ?>
          </div>
          <aside class="col-lg-4 col-md-12 col-12">
            <div class="sidebar blog-grid-page">
              <?php $this->load->view($folder_themes . '/partials/sidebar.php') ?>
            </div>
        </div>
      </div>
    </section>
    <?php if (!is_null($transparansi)) $this->load->view("$folder_themes/partials/apbdesa-tema", $transparansi); ?>
    <?php $this->load->view($folder_themes . '/commons/footer') ?>
    <?php $this->load->view($folder_themes . '/commons/for_js') ?>
  <?php else : ?>
    <?php $this->load->view($folder_themes . '/commons/404') ?>
  <?php endif ?>
</body>

</html>
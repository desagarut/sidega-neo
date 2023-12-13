<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$penduduk_laki = $this->db->query('SELECT COUNT(id) AS jumlah FROM tweb_penduduk WHERE status_dasar = 1 and sex = 1')->result_array()[0]['jumlah'];
$penduduk_perempuan = $this->db->query('SELECT COUNT(id) AS jumlah FROM tweb_penduduk WHERE status_dasar = 1 and sex = 2')->result_array()[0]['jumlah'];
$keluarga_laki = $this->db->query('SELECT COUNT(id) AS jumlah FROM tweb_penduduk WHERE status_dasar = 1 and sex = 1 and kk_level = 1')->result_array()[0]['jumlah'];
$keluarga_perempuan = $this->db->query('SELECT COUNT(id) AS jumlah FROM tweb_penduduk WHERE status_dasar = 1 and sex = 2 and kk_level = 1')->result_array()[0]['jumlah'];
?>

<div class="row">
  <div class="col-md-3 mb-3">
    <div class="card shadow">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col">
            <?php foreach ($dusun as $data) : ?>
              <span class="h2 mb-0"><?= $data['jumlah'] ?></span>
            <?php endforeach; ?>
            <p class="small text-dark mb-0">Wilayah</p>
            <a href="<?= site_url('sid_core') ?>">
              <span class="badge badge-pill badge-primary"> Detail</span>
            </a>
          </div>
          <div class="col-auto">
            <span class="fe fe-32 fe-map text-primary mb-0"></span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3 mb-3">
    <div class="card shadow">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col">
            <?php foreach ($penduduk as $data) : ?>
              <span class="h2 mb-0"><?= $data['jumlah'] ?></span>
            <?php endforeach; ?>
            <p class="small text-dark mb-0">Penduduk</p>
            <a href="<?= site_url('penduduk/clear') ?>">
              <span class="badge badge-pill badge-success">L : <?= number_format($penduduk_laki, 0, '', '.') ?> </span>
              <span class="badge badge-pill badge-warning"> P : <?= number_format($penduduk_perempuan, 0, '', '.') ?></span>
              <!--<span class="badge badge-pill badge-primary"> Detail</span>-->
            </a>
          </div>
          <div class="col-auto">
            <span class="fe fe-32 fe-user text-success mb-0"></span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3 mb-3">
    <div class="card shadow">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col">
            <?php foreach ($keluarga as $data) : ?>
              <span class="h2 mb-0"><?= $data['jumlah'] ?></span>
            <?php endforeach; ?>
            <p class="small text-dark mb-0">Keluarga</p>
            <a href="<?= site_url('keluarga/clear') ?>">
              <span class="badge badge-pill badge-success">L : <?= number_format($keluarga_laki, 0, '', '.') ?></span>
              <span class="badge badge-pill badge-warning"> P : <?= number_format($keluarga_perempuan, 0, '', '.') ?></span>
              <!--<span class="badge badge-pill badge-primary"> Detail</span>-->
            </a>
          </div>
          <div class="col-auto">
            <span class="fe fe-32 fe-users text-danger mb-0"></span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3 mb-3">
    <div class="card shadow">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col">
            <?php foreach ($rtm as $data) : ?>
              <span class="h2 mb-0"><?= $data['jumlah'] ?></span>
            <?php endforeach; ?>
            <p class="small text-dark mb-0">Rumah Tangga</p>
            <a href="<?= site_url('rtm/clear') ?>">
              <span class="badge badge-pill badge-success">L : <?= number_format($rtm_laki, 0, '', '.') ?></span>
              <span class="badge badge-pill badge-warning"> P : <?= number_format($rtm_perempuan, 0, '', '.') ?></span>
              <!--<span class="badge badge-pill badge-primary"> Detail</span>-->
            </a>
          </div>
          <div class="col-auto">
            <span class="fe fe-32 fe-home text-warning mb-0"></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--
<div class="pcoded-content">
  <div class="col-xl-4 col-md-12">
    <a href="<?= site_url('sid_core') ?>">
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-6">
              <?php foreach ($dusun as $data) : ?>
                <h3><?= $data['jumlah'] ?></h3>
              <?php endforeach; ?>
              <h6 class="text-dark m-b-0">Wilayah Dusun<i class="fa fa-caret-down text-c-red m-l-10"></i></h6>
            </div>
            <div class="col-6">
              <div id="seo-chart1" class="d-flex align-items-end"></div>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>

  <div class="col-sm-3 col-xs-6">
    <div class="small-box bg-green">
      <div class="inner">
        <?php foreach ($penduduk as $data) : ?>
          <h3>
            <?= $data['jumlah'] ?>
          </h3>
        <?php endforeach; ?>
        <p>
          L : <?= number_format($penduduk_laki, 0, '', '.') ?> | P : <?= number_format($penduduk_perempuan, 0, '', '.') ?>
        </p>
      </div>
      <div class="icon"> <i class="ion ion-person"></i> </div>
      <a href="<?= site_url('penduduk/clear') ?>" class="small-card-footer" title="Lihat Daftar Penduduk">Penduduk
        <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-sm-3 col-xs-6">
    <div class="small-box bg-blue">
      <div class="inner">
        <?php foreach ($keluarga as $data) : ?>
          <h3>
            <?= $data['jumlah'] ?>
          </h3>
        <?php endforeach; ?>
        <p>
          L : <?= number_format($keluarga_laki, 0, '', '.') ?> | P : <?= number_format($keluarga_perempuan, 0, '', '.') ?>
        </p>
      </div>
      <div class="icon"> <i class="ion ion-ios-people"></i> </div>
      <a href="<?= site_url('keluarga/clear') ?>" class="small-card-footer" title="Lihat Daftar Keluarga">Kepala Keluarga<i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <div class="col-sm-3 col-xs-6">
    <div class="small-box bg-aqua">
      <div class="inner">
        <?php foreach ($rtm as $data) : ?>
          <h3>
            <?= $data['jumlah'] ?>
          </h3>
        <?php endforeach; ?>
        <p>RTM</p>
      </div>
      <div class="icon"> <i class="ion ion-ios-home"></i> </div>
      <a href="<?= site_url('rtm/clear') ?>" class="small-card-footer" title="Lihat Daftar Rumah Tangga">Rumah Tangga<i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 float-center">
      <a class="btn btn-outline-primary" href="<?= site_url('statistik') ?>"> <i class="fa fa-pie-chart"></i> Statistik </a>
      <a class="btn btn-outline-primary" href="<?= site_url('program_bantuan') ?>"> <i class="fa fa-gift"></i> Bantuan </a>
      <a class="btn btn-outline-primary" href="<?= site_url('program_bantuan') ?>"> <i class="fa fa-users"></i> Pokmas </a>
      <a class="btn btn-outline-primary" href="<?= site_url('laporan_rentan') ?>"> <i class="fa fa-wheelchair"></i>Rentan</a>
      <a class="btn btn-outline-primary" href="<?= site_url('dpt') ?>"> <i class="fa fa-hand-o-up"></i> DPT </a>
      <a class="btn btn-outline-primary" href="<?= site_url('gis') ?>"> <i class="fa fa-gift"></i> Maps </a>
    </div>
  </div>
</div>-->
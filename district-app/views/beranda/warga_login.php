<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="card timeline shadow mb-4">
  <div class="card-header">
    <strong class="card-title">Warga Login</strong>
    <a class="float-right small text-muted" href="<?php echo site_url('mandiri'); ?>">View all</a>
  </div>
  <div class="card-body scrollable" data-simplebar style="height:355px; overflow-y: auto; overflow-x: hidden;">
    <?php foreach ($last_login as $key => $data) { ?>
      <div class="pb-3 timeline-item item-success">
        <div class="pl-5">
          <div class="row">
            <div class="col-md-2">
              <?php if ($data['foto']) : ?>
                <img class="avatar-img rounded-circle" src="<?= AmbilFoto($data['foto']) ?>" alt="<?= $data['nama'] ?>" style="width:40px">
              <?php else : ?>
                <img class="avatar-img rounded-circle" src="<?= base_url() ?>assets/tiny/files/user_pict/kuser.png" alt="<?= $data['nama'] ?>" style="width:40px">
              <?php endif; ?>
            </div>
            <div class="col-md-10">
              <div class="mb-1"><a class="users-list-name" href="<?php echo site_url('penduduk/detail/1/0/' . $data['id']); ?>"><strong>@<?= $data['nama'] ?></strong></a><span class="text-muted small mx-2"></span><small>terakhir </small><span class="badge badge-warning"><?= $data['last_login'] ?></div>
              <p class="small text-muted">Warga Dusun <?= strtoupper($data['dusun']); ?> RW. <?= strtolower($data['rw']); ?> RT. <?= strtolower($data['rt']); ?> <?= strtolower($data['alamat_sekarang']); ?></span>
              </p>
            </div>
          </div>
        </div>
      <?php } ?>
      </div>
  </div>
</div>
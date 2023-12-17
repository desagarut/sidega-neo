<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="card shadow">
  <div class="card-header">
    <strong class="card-title">Login Sistem</strong>
    <a class="float-right small text-muted" href="#!">View all</a>
  </div>
  <div class="card-body scrollable" data-simplebar style="height:355px; overflow-y: auto; overflow-x: hidden;">
    <div class="list-group list-group-flush my-n3">
      <?php foreach ($last_login_operator as $key => $data) { ?>
        <div class="list-group-item">
          <div class="row align-items-center">
            <div class="col-auto">
              <?php if ($data['foto']) : ?>
                <img class="avatar-img rounded-circle" src="<?= AmbilFoto($data['foto']) ?>" alt="<?= $data['nama'] ?>" style="width:37px">
              <?php else : ?>
                <img class="avatar-img rounded-circle" src="<?= base_url() ?>assets/images/pengguna/kuser.png" alt="<?= $data['nama'] ?>" style="width:37px">
              <?php endif; ?>
            </div>
            <div class="col-auto">
              <small><strong><?= $data['nama'] ?></strong></small>
              <div class="my-0 text-muted small"><?= $data['grup'] ?></div>
            </div>
            <div class="col">
              <small class="badge badge-pill badge-light text-muted"><?= tgl_indo2($data['last_login']) ?></small>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
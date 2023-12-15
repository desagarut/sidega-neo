<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="card shadow mb-4">
  <div class="card-header">
    <strong class="card-title">Gallery Youtube</strong>
    <a class="float-right small text-muted" href="<?= site_url("gallery_youtube") ?>">View all</a>
  </div>
  <div class="card-body scrollable">
    <div class="list-group list-group-flush my-n3">
      <?php foreach ($gallery_youtube as $data) : ?>
        <?php if ($data['link']) : ?>
          <div class="list-group-item">
            <div class="row align-items-center">
              <div class="col-md-4">
                <img src="<?= base_url("assets/tiny/files/logo/youtube.png") ?>" alt="<?= $data['nama'] ?>" class="avatar-img" style="height:40px">
              </div>
              <div class=" col-md-8">
                <small><strong>
                    <?php if ($this->CI->cek_hak_akses('u')) : ?>
                      <a href="<?= site_url("gallery/sub_gallery/{$data['id']}") ?>" class="product-title" alt="<?= strtolower($data['nama']); ?>"><?= strtolower($data['nama']); ?>
                      </a>
                    <?php else : ?>
                      <?= strtolower($data['nama']); ?>
                    <?php endif; ?></strong></small>
                <div class="my-0 text-muted small"><?= $data['tgl_upload'] ?></div>
              </div>
            </div>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>
</div>
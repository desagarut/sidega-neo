<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="card shadow mb-4">
  <div class="card-header">
    <strong class="card-title">Gallery Foto</strong>
    <a class="float-right small text-muted" href="<?= site_url("gallery") ?>">View all</a>
  </div>
  <div class="card-body scrollable">
    <div class="list-group list-group-flush my-n3">
      <?php foreach ($gallery as $data) : ?>
        <?php if ($data['gambar']) : ?>
          <div class="list-group-item">
            <div class="row align-items-center">
              <div class="col-md-5">
                <?php if ($data['gambar']) : ?>
                  <img style="width:100%;height:60px" src="<?= AmbilGaleri($data['gambar'], 'sedang') ?>" alt="<?= $data['nama'] ?>">
                <?php else : ?>
                  <img style="width:100%;height:60px" src="<?= base_url() ?>assets/
files/user_pict/kuser.png" alt="<?= $data['nama'] ?>" style="width:40px">
                <?php endif; ?>
              </div>
              <div class="col-md-7">
                <small><strong>
                    <?php if ($this->CI->cek_hak_akses('u')) : ?>
                      <a href="<?= site_url("gallery/sub_gallery/{$data['id']}") ?>" class="product-title" alt="<?= $data['nama'] ?>"><?= strtolower($data['nama']) ?>
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
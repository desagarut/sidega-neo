<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="card shadow mb-4">
  <div class="card-header">
    <strong class="card-title">Posting Berita</strong>
    <a class="float-right small text-muted" href="<?= site_url("web") ?>">View all</a>
  </div>
  <div class="card-body scrollable">
    <div class="list-group list-group-flush my-n3">
      <?php foreach ($artikel as $data) : ?>
        <?php if ($data['gambar']) : ?>
          <div class="list-group-item">
            <div class="row align-items-center">
              <div class="col-md-4">
                <?php if ($data['gambar']) : ?>
                  <img style="width:100%;height:50px" src="<?= AmbilFotoArtikel($data['gambar'], 'sedang') ?>" alt="<?= $data['nama'] ?>">
                <?php else : ?>
                  <img style="width:100%;height:50px" src="<?= base_url() ?>assets/tiny/files/user_pict/kuser.png" alt="<?= $data['nama'] ?>" style="width:40px">
                <?php endif; ?>

              </div>
              <div class="col-md-8">
                <small><strong>
                    <?php if ($this->CI->cek_hak_akses('u')) : ?>
                      <a href="<?= site_url("web/form/$data[id]") ?>" class="<?= $data['judul'] ?>" alt="<?= $data['judul'] ?>"><?= strtolower($data['judul']) ?>
                      </a>
                    <?php else : ?>
                      <?= $data['judul'] ?>
                    <?php endif; ?></strong></small>
                <div class="my-0 text-muted small"><?= $data['owner'] ?></div>
                <p class="text-muted"><small><?= $data['tgl_upload'] ?></small></p>
              </div>
            </div>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>
</div>
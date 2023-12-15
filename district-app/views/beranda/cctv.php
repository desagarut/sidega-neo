<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="card shadow mb-4">
  <div class="card-header">
    <strong class="card-title">CCTV</strong>
    <a class="float-right small text-muted" href="<?= site_url("gallery_cctv") ?>">View all</a>
  </div>
  <div class="card-body scrollable">
    <div class="list-group list-group-flush my-n3">
      <?php foreach ($gallery_cctv as $data) : ?>
        <div class="list-group-item">
          <div class="row align-items-center">
            <div class="col-auto">
              <iframe class="mb-1" width="100%" height="170" src="<?= $data["link"]; ?>" frameborder="0" allowfullscreen></iframe>
              <h6 class="mb-1"><?= strtoupper($data['nama']) ?></h6>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
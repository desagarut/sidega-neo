<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="container">
    <div class="col-md-12 text-start wow fadeInUp" data-wow-delay="0.1s">
        <h5 class="mb-3"><a href="<?= site_url("first/gallery_youtube/{$data['id']}") ?>">Playlist</a></h5>
    </div>
    <?php foreach ($gallery_youtube as $data) : ?>
        <?php if ($data['link']) : ?>

            <div class="row py-2 wow fadeInUp" data-wow-delay="0.1s">
                <div class="product-img col-sm-4">
                    <iframe height="80px" width="100%" object-fit="cover" class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $data["link"]; ?>" title="<?= $data['nama'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="col-sm-8 text-end">
                    <small>
                        <a href="<?= site_url("first/sub_gallery_youtube/{$data['id']}") ?>">
                            <?= strtoupper($data['nama']) ?>
                        </a><br />
                        <span class="product-description">
                            <small><?= $data['tgl_upload'] ?></small>
                        </span>
                    </small>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
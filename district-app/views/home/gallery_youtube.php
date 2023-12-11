<!-- ======= Gallery Youtube ======= -->
<div class="card">
  <div class="card-header">
    <h5>Gallery Youtube</h5>
    <div class="card-header-right">
      <div class="btn-group card-option">
        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="feather icon-more-horizontal"></i> </button>
        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
          <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
          <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
          <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
          <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="card-body">
    <?php foreach ($gallery_youtube as $data) : ?>
      <?php if ($data['link']) : ?>
        <ul class="products-list product-list-in-card">
          <li class="item">
            <div class="product-img">
              <img src="<?= base_url("assets/files/logo/youtube.png") ?>" alt="Product Image">
            </div>
            <div class="product-info">
              <a href="<?= site_url("gallery_youtube/sub_gallery/{$data['id']}") ?>" class="product-title" alt="<?= $data['nama'] ?>"><?= $data[nama] ?>
              </a>
              <span class="product-description">
                <?= $data['tgl_upload'] ?>
              </span>
            </div>
          </li>
        </ul>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>

  <div class="card-footer text-center">
    <a href="<?= site_url("gallery_youtube") ?>" class="uppercase">View All Video</a>
  </div>
</div>

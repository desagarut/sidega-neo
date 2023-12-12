<!-- ======= Artikel ======= -->
<div class="card">
  <div class="card-header">
    <h5>Artikel</h5>
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
    <?php foreach ($artikel as $data) : ?>
      <?php if ($data['gambar']) : ?>
        <ul class="products-list product-list-in-card">
          <li class="item">
            <div class="product-img">
              <img width=50 height=80 src=<?= AmbilFotoArtikel(urldecode($data['gambar']), 'kecil') ?>>
            </div>
            <div class="product-info">
              <?php if ($this->CI->cek_hak_akses('u')) : ?>
                <a href="<?= site_url("web/form/$data[id]") ?>" class="product-title" alt="<?= $data['judul'] ?>"><?= $data['judul'] ?>
                </a>
              <?php else : ?>
                <?= $data['judul'] ?>
              <?php endif; ?>
              <span class="product-description">
                <?= $data['tgl_upload'] ?> | <?= $data['owner'] ?>
              </span>
            </div>
          </li>
        </ul>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
  <div class="card-footer text-center">
    <a href="<?= site_url("web") ?>" class="uppercase">Semua Artikel</a>
  </div>
</div>

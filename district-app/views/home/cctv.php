<div class="card">
  <div class="card-header">
    <h5>CCTV</h5>
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
    <div class="col-md-12">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <?php foreach ($gallery_cctv as $data) : ?>
            <?php //if ($data['link']) : 
            ?>
            <div class="item active">
              <iframe width="100%" height="130" src="<?= $data["link"]; ?>" frameborder="0" allowfullscreen></iframe>
              <div class="carousel-caption">
                <h6 class="mb-0"><?= strtoupper($data['nama']) ?></h6>
              </div>
            </div>
            <?php //endif; 
            ?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="card-footer text-center scroller">
    <a href="<?= site_url('gallery_cctv'); ?>"> Semua CCTV</a>
  </div>
</div>
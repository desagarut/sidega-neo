<div class="card">
  <div class="card-header">
    <h5>Video Profil</h5>
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
    <iframe height="160px" width="250px" class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $setting_desa["video"]; ?>" title="Profil Desa" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>
  <div class="card-footer text-center scroller">
    <a href="<?= site_url('identitas_desa/form'); ?>" class="btn btn-box btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Ubah Data"><i class="fa fa-edit"></i> Ubah Video</a>
  </div>
</div>

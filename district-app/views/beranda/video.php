<div class="card shadow mb-4">
  <div class="card-header">
    <strong class="card-title">Video Profil</strong>
    <a class="float-right small text-muted" href="<?= site_url("web") ?>">View all</a>
  </div>
  <div class="card-body" data-simplebar style="height:355px; overflow-y: auto; overflow-x: hidden;">
    <div class="list-group list-group-flush my-n3">
      <div class="list-group-item">
        <div class="row align-items-center">
          <div class="col-auto text-center">
            <iframe height="260px" width="355px" class="embed-responsive-item mb-1" src="https://www.youtube.com/embed/<?= $setting_desa["video"]; ?>" title="Profil Desa" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              <a href="<?= site_url('identitas_desa/form'); ?>" class="btn btn-sm btn-success mb-1" title="Ubah Data"><i class="fa fa-edit"></i> Ubah Video</a>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--
<div class="card">
    <div class="card-header">
        <h5>Warga Login</h5>
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
        <ul class="users-list clearfix">
            <?php foreach ($last_login as $key => $data) { ?>
                <li>
                    <?php if ($data['foto']) : ?>
                        <img src="<?= AmbilFoto($data['foto']) ?>" alt="Foto">
                    <?php else : ?>
                        <img class="user-image" src="<?= base_url() ?>assets/files/user_pict/kuser.png" alt="Foto">
                    <?php endif; ?>

                    <a class="users-list-name" href="<?php echo site_url('penduduk/detail/1/0/' . $data['id']); ?>"><?= $data['nama'] ?> <?= $data['nik'] ?></a>
                    <span class="users-list-date"><?= $data['dusun'] ?></span>
                </li>
            <?php } ?>
        </ul>
        <div class="card-footer text-center">
            <a href="<?= site_url('mandiri'); ?>" class="uppercase">View All Users</a>
        </div>
    </div>
</div>
                    -->
<div class="col-md-12 col-lg-12 mb-4">
  <div class="card timeline shadow">
    <div class="card-header">
      <strong class="card-title">Warga Login</strong>
      <a class="float-right small text-muted" href="<?php echo site_url('mandiri'); ?>">View all</a>
    </div>
    <div class="card-body" data-simplebar style="height:355px; overflow-y: auto; overflow-x: hidden;">
      <?php foreach ($last_login as $key => $data) { ?>
        <div class="pb-3 timeline-item item-success">
          <div class="pl-5">
            <div class="row">
              <div class="col-md-2">
                <?php if ($data['foto']) : ?>
                  <img class="avatar-img rounded-circle" src="<?= AmbilFoto($data['foto']) ?>" alt="<?= $data['nama'] ?>" style="width:40px">
                <?php else : ?>
                  <img class="avatar-img rounded-circle" src="<?= base_url() ?>assets/tiny/files/user_pict/kuser.png" alt="<?= $data['nama'] ?>" style="width:40px">
                <?php endif; ?>
              </div>
              <div class="col-md-10">
                <div class="mb-1"><a class="users-list-name" href="<?php echo site_url('penduduk/detail/1/0/' . $data['id']); ?>"><strong>@<?= $data['nama'] ?></strong></a><span class="text-muted small mx-2"></span><small>terakhir </small><span class="badge badge-warning"><?= $data['last_login'] ?></div>
                <p class="small text-muted">Warga Dusun <?= strtoupper($data['dusun']); ?> RW. <?= strtolower($data['rw']); ?> RT. <?= strtolower($data['rt']); ?> <?= strtolower($data['alamat_sekarang']); ?></span>
                </p>
              </div>
            </div>
          </div>
        <?php } ?>
        </div>
    </div>
  </div>
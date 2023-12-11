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
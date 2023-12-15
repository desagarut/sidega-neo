<div class="card shadow mb-4">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="h6 mb-0">Pertanahan</h3>
            </div>
            <div class="col-auto">
                <a class="small text-muted" href="<?= site_url('letterc'); ?>">View all</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <a href="<?= site_url('letterc') ?>">
            <div class="col-md-12 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <?php foreach ($letterc_total as $data) : ?>
                                    <span class="h2 mb-0"><?= $data['jumlah'] ?></span>
                                <?php endforeach; ?>
                                <p class="small text-muted mb-0">Daftar Letter-C</p>
                                <span class="badge badge-pill badge-info"><?php foreach ($letterc_warga_total as $data) : ?><?= $data['letterc_warga'] ?> <?php endforeach; ?><small> Warga</small> | <?php foreach ($letterc_nonwarga_total as $data) : ?><?= $data['letterc_non'] ?><?php endforeach; ?><small> Non Warga</small></span>
                            </div>
                            <div class="col-auto">
                                <span class="fe fe-32 fe-flag text-success mb-0"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="<?= site_url('letterc') ?>">
            <?php foreach ($persil_total as $data) : ?>
                <div class="col-md-12 mb-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <?php foreach ($letterc_total as $data) : ?>
                                        <span class="h2 mb-0"><?= $data['jumlah'] ?></span>
                                    <?php endforeach; ?>
                                    <p class="small text-muted mb-0">Daftar Persil</p>
                                    <span class="badge badge-pill badge-success">info bidang tanah</span>
                                </div>
                                <div class="col-auto">
                                    <span class="fe fe-32 fe-folder text-primary mb-0"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </a>
    </div>
</div>
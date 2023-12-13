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

                <div class="info-card bg-blue">
                    <?php foreach ($letterc_total as $data) : ?>
                        <span class="info-card-icon"><?= $data['jumlah'] ?></span>
                    <?php endforeach; ?>
                    <div class="info-card-content">
                        <span class="info-card-text">Daftar Letter-C</span>
                        <span class="info-card-number"><?php foreach ($letterc_warga_total as $data) : ?><?= $data['letterc_warga'] ?> <?php endforeach; ?><small> Warga</small> | <?php foreach ($letterc_nonwarga_total as $data) : ?><?= $data['letterc_non'] ?><?php endforeach; ?><small> Non Warga</small></span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 0%"></div>
                        </div>
                        <span class="progress-description">
                            Detail
                        </span>
                    </div>
                </div>

            </a>
            <a href="<?= site_url('data_persil') ?>">
                <?php foreach ($persil_total as $data) : ?>
                    <div class="info-card bg-aqua">
                        <span class="info-card-icon"><?= $data['jumlah'] ?></span>
                        <div class="info-card-content">
                            <span class="info-card-text">Daftar Persil</span>
                            <span class="info-card-number"><small>info bidang tanah</small></span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 0%"></div>
                            </div>
                            <span class="progress-description">
                                <small>Detail</small>
                            </span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </a>
        </div>
    </div>
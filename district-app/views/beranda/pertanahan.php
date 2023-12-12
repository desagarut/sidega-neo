<div class="card">
	<div class="card-header">
		<h5>Pertanahan</h5>
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
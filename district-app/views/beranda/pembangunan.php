<!--<div class="card">
	<div class="card-header">
		<h5>Pembangunan</h5>
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

    <div class="row text-center">
            
                <span class="badge bg-maroon">
                    
                </span> RKP <?= ucwords($this->setting->sebutan_desa); ?>
            </a>
            <a href="<?= site_url('pembangunan/pelaksanaan_durkp') ?>" class="btn btn-appbtn-outline-info" title="Daftar Usulan Rencana Kerja Pemerintah <?= ucwords($this->setting->sebutan_desa); ?>" style="color:purpleviolet">
                <span class="badge bg-maroon">
                    <?php foreach ($durkp_total as $data) : ?>
                        <?= $data['jumlah'] ?>
                    <?php endforeach; ?>
                </span>DU-RKP
            </a>
        </div>
        <div class="row text-center">
            <a href="<?= site_url('pembangunan/pelaksanaan_rkp') ?>" class="btn btn-app bg-green" title="Daftar Daftar Kegiatan Yang dilaksanakan">
                <span class="badge bg-maroon">
                    <?php foreach ($pelaksanaan_total as $data) : ?>
                        <?= $data['jumlah'] ?><br />
                    <?php endforeach; ?>
                </span>Pelaksanaan
            </a>
        </div>
    </div>
</div>-->

<div class="card shadow">
    <div class="card-header">
        <strong class="card-title">Pembangunan</strong>
        <a class="float-right small text-muted" href="#!">Kegiatan</a>
    </div>
    <div class="card-body">
        <div class="list-group list-group-flush my-n3">
            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col">
                        <a href="<?php if ($this->CI->cek_hak_akses('u')) : ?><?= site_url('pembangunan') ?><?php endif; ?>" title="Rencana">
                            <strong>Perencanaan</strong>
                        </a>
                        <div class="my-0 text-muted small">Usulan masyarakat</div>
                    </div>
                    <div class="col-auto">
                        <?php foreach ($usulan_total as $data) : ?>
                            <strong><?= $data['jumlah'] ?></strong>
                        <?php endforeach; ?>
                        <div class="progress mt-2" style="height: 4px;">
                            <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="<?= $data['jumlah'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col">
                        <a href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('pembangunan/penentuan_prioritas_tk_desa') ?><?php endif; ?>" title="Penentuan Prioritas">
                            <strong>Penentuan Prioritas</strong>
                        </a>
                        <div class="my-0 text-muted small">Polling & Skoring</div>
                    </div>
                    <div class="col-auto">
                        <?php foreach ($prioritas_total as $data) : ?>
                            <strong><?= $data['jumlah'] ?></strong>
                        <?php endforeach; ?>
                        <div class="progress mt-2" style="height: 4px;">
                            <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="<?= $data['jumlah'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col">
                        <a href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('pembangunan/penetapan_rkp') ?><?php endif; ?>" title="Penetapan">
                            <strong>Penetapan</strong>
                        </a>
                        <div class="my-0 text-muted small">Menentukan Program Kegiatan</div>
                    </div>
                    <div class="col-auto">
                        <?php foreach ($rkp_total as $data) : ?>
                            <strong><?= $data['jumlah'] ?></strong>
                        <?php endforeach; ?>
                        <div class="progress mt-2" style="height: 4px;">
                            <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="<?= $data['jumlah'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col">
                        <a href="<?= site_url('pembangunan/pelaksanaan_rkp') ?>" title="Pelaksanaan Rencana Kerja Pemerintah <?= ucwords($this->setting->sebutan_desa); ?>">
                            <strong>Pelaksanaan RKP <?= ucwords($this->setting->sebutan_desa); ?></strong>
                        </a>
                        <div class="my-0 text-muted small">Pelaksanaan Program</div>
                    </div>
                    <div class="col-auto">
                        <?php foreach ($pelaksanaan_total as $data) : ?>
                            <strong><?= $data['jumlah'] ?></strong>
                        <?php endforeach; ?>
                        <div class="progress mt-2" style="height: 4px;">
                            <div class="progress-bar" role="progressbar" style="width: 24%" aria-valuenow="24" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col">
                        <a href="<?= site_url('pembangunan/pelaksanaan_rkp') ?>" title="Pelaksanaan Rencana Kerja Pemerintah <?= ucwords($this->setting->sebutan_desa); ?>">
                            <strong></strong>
                        </a>
                        <div class="my-0 text-muted small"></div>
                    </div>
                    <div class="col-auto">
                       
                            <strong></strong>
                        
                        <div class="progress mt-2" style="height: 4px;">
                            <div class="progress-bar" role="progressbar" style="width: 24%" aria-valuenow="24" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
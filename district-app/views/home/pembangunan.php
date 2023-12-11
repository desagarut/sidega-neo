<div class="card">
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
            <a class="btn btn-app bg-purple" href="<?php if ($this->CI->cek_hak_akses('u')) : ?><?= site_url('pembangunan') ?><?php endif; ?>" title="Rencana">
                <span class="badge bg-maroon">
                    <?php foreach ($usulan_total as $data) : ?>
                        <?= $data['jumlah'] ?>
                    <?php endforeach; ?>
                </span> Rencana</a>
            <a class="btn btn-app bg-purple" href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('pembangunan/penentuan_prioritas_tk_desa') ?><?php endif; ?>" title="Penentuan Prioritas">
                <span class="badge bg-maroon">
                    <?php foreach ($prioritas_total as $data) : ?>
                        <?= $data['jumlah'] ?>
                    <?php endforeach; ?>
                </span>Prioritas</a>
            <a class="btn btn-app bg-purple" href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('pembangunan/penetapan_rkp') ?><?php endif; ?>" title="Penetapan">
                <span class="badge bg-maroon">
                    <?php foreach ($rkp_total as $data) : ?>
                        <?= $data['jumlah'] ?>
                    <?php endforeach; ?>
                </span>Penetapan
            </a>
        </div>
        <div class="row text-center">
            <a href="<?= site_url('pembangunan/pelaksanaan_rkp') ?>" class="btn btn-app bg-purple" title="Rencana Kerja Pemerintah <?= ucwords($this->setting->sebutan_desa); ?>" style="color:purpleviolet">
                <span class="badge bg-maroon">
                    <?php foreach ($usulan_total as $data) : ?>
                        <?= $data['jumlah'] ?>
                    <?php endforeach; ?>
                </span> RKP <?= ucwords($this->setting->sebutan_desa); ?>
            </a>
            <a href="<?= site_url('pembangunan/pelaksanaan_durkp') ?>" class="btn btn-app bg-purple" title="Daftar Usulan Rencana Kerja Pemerintah <?= ucwords($this->setting->sebutan_desa); ?>" style="color:purpleviolet">
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
</div>
<div class="card shadow">
	<div class="card-header">
		<h5 class="card-title">Inventaris</h5>
	</div>
	<div class="card-body">
		<ul class="nav nav-pills nav-stacked">
			<?php if ($this->tab_ini == 7): ?>
				<li <?php if ($tip==1): ?>class="active"<?php endif; ?>><a href="<?=site_url('laporan_inventaris')?>"><i class="fe fe-list"></i> Laporan Semua Asset</a></li>
				<li <?php if ($tip==2): ?>class="active"<?php endif; ?>><a href="<?=site_url('laporan_inventaris/mutasi')?>"><i class="fe fe-list"></i> Laporan Asset Yang Dihapus</a></li>
			<?php else: ?>
				<li class="<?php ($tip==1) and print('active')?>"><a href="<?=site_url($this->tipe);?>"><i class="fe fe-list"></i> Daftar Inventaris</a></li>
				<?php if($this->tab_ini != 6):?>
	  			<li class="<?php ($tip==2) and print('active')?>"><a href="<?=site_url($this->tipe.'/mutasi')?>"><i class="fe fe-share"></i> Mutasi Inventaris</a></li>
				<?php endif ?>
			<?php endif ?>
		</ul>
	</div>
</div>
<div class="card shadow">
	<div class="card-header">
		<h5 class="card-title">Kategori Inventaris</h5>
	</div>
	<div class="card-body">
		<ul class="nav nav-pills nav-stacked">
			<li class="<?php ($this->tab_ini == 1) and print('active')?>"><a href="<?=site_url('inventaris_tanah')?>"><i class="fe fe-tags"></i> Tanah</a></li>
			<li class="<?php ($this->tab_ini == 2) and print('active')?>"><a href="<?=site_url('inventaris_peralatan')?>"><i class="fe fe-tags"></i> Peralatan Dan Mesin</a></li>
			<li class="<?php ($this->tab_ini == 3) and print('active')?>"><a href="<?=site_url('inventaris_gedung')?>"><i class="fe fe-tags"></i> Gedung dan Bangunan</a></li>
			<li class="<?php ($this->tab_ini == 4) and print('active')?>"><a href="<?=site_url('inventaris_jalan')?>"><i class="fe fe-tags"></i> Jalan, Irigasi, dan Jaringan</a></li>
			<li class="<?php ($this->tab_ini == 5) and print('active')?>"><a href="<?=site_url('inventaris_asset')?>"><i class="fe fe-tags"></i> Asset Tetap Lainnya</a></li>
			<li class="<?php ($this->tab_ini == 6) and print('active')?>"><a href="<?=site_url('inventaris_kontruksi')?>"><i class="fe fe-tags"></i> Kontruksi dalam pengerjaan</a></li>
			<li class="<?php ($this->tab_ini == 7) and print('active')?>"><a href="<?=site_url('laporan_inventaris')?>"><i class="fe fe-tags"></i> Laporan Semua Asset</a></li>

		</ul>
	</div>
</div>


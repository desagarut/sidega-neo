<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="card shadow">
	<div class="card-header">
		<h3 class="box-title">Pengaturan Peta</h3>
		<div class="box-tools">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fe fe-minus"></i></button>
		</div>
	</div>
	<div class="box-body no-padding">
		<ul class="nav nav-pills nav-stacked">
			<li <?= jecho($tip, 3, "class='active'") ?>><a href="<?= site_url('plan/clear') ?>">Lokasi</a></li>
			<li <?= jecho($tip, 0, "class='active'") ?>><a href="<?= site_url('point/clear') ?>">Tipe Lokasi</a></li>
			<li <?= jecho($tip, 6, "class='active'") ?>><a href="<?= site_url('point/clear_simbol') ?>">Simbol Lokasi</a></li>
			<li <?= jecho($tip, 1, "class='active'") ?>><a href="<?= site_url('garis/clear') ?>">Garis</a></li>
			<li <?= jecho($tip, 2, "class='active'") ?>><a href="<?= site_url('line/clear') ?>">Tipe Garis</a></li>
			<li <?= jecho($tip, 4, "class='active'") ?>><a href="<?= site_url('area/clear') ?>">Area</a></li>
			<li <?= jecho($tip, 5, "class='active'") ?>><a href="<?= site_url('polygon/clear') ?>">Tipe Area</a></li>
		</ul>
	</div>
</div>
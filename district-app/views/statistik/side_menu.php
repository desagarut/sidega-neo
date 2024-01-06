<?php  defined('BASEPATH') OR exit('No direct script access allowed');?>

<div id="penduduk" class="card shadow  mb-2 <?= ($kategori == 'penduduk') ?: 'collapsed-card'; ?>">
	<div class="card-header">
		<h5 class="card-title">Statistik Penduduk</h5>
	</div>
	<div class="card-body no-padding">
		<ul class="nav nav-pills nav-stacked">
			<?php foreach ($stat_penduduk as $id => $nama): ?>
				<li <?= jecho((string)$id, $lap, 'class="active"'); ?>><?= anchor("statistik/clear/$id", $nama); ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
<div id="keluarga" class="card shadow mb-2 <?= ($kategori == 'keluarga') ?: 'collapsed-card'; ?>">
	<div class="card-header">
		<h5 class="card-title">Statistik Keluarga</h5>
	</div>
	<div class="card-body no-padding">
		<ul class="nav nav-pills nav-stacked">
			<?php foreach ($stat_keluarga as $id => $nama): ?>
				<li <?= jecho($id, $lap, 'class="active"'); ?>><?= anchor("statistik/clear/$id", $nama); ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
<div id="bantuan" class="card shadow mb-2 <?= ($kategori == 'bantuan') ?: 'collapsed-card'; ?>">
	<div class="card-header">
		<h5 class="card-title">Statistik Program Bantuan</h5>
	</div>
	<div class="card-body no-padding">
		<ul class="nav nav-pills nav-stacked">
			<?php foreach ($stat_kategori_bantuan as $id => $nama): ?>
				<li <?= jecho($id, $lap, 'class="active"'); ?>><?= anchor("statistik/clear/$id", $nama); ?></li>
			<?php endforeach; ?>
			<?php foreach ($stat_bantuan as $bantuan): ?>
				<li <?= jecho($bantuan['lap'], $lap, 'class="active"'); ?>><?= anchor("statistik/clear/$bantuan[lap]", "$bantuan[nama] ($bantuan[lap])"); ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>

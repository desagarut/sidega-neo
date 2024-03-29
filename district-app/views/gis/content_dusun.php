<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div id="isi_popup_dusun">
	<?php foreach ($dusun_gis as $key_dusun => $dusun): ?>
		<div id="isi_popup_dusun_<?= $key_dusun ?>" style="visibility: hidden;">
			<div id="content">
				<h5 id="firstHeading" class="firstHeading"><b>Wilayah <?= $wilayah . " " . $dusun['dusun']; ?></b></h5>
				<p><a href="#collapseStatGraph" class="btn btn-outline-info btn-smbtn-modal" title="Statistik Penduduk" data-toggle="collapse" data-target="#collapseStatGraph" aria-expanded="false" aria-controls="collapseStatGraph"><i class="fe fe-bar-chart"></i>Statistik Penduduk</a></p>
				<div class="collapse box-body no-padding" id="collapseStatGraph">
					<div id="bodyContent">
						<div class="card card-body">
							<?php foreach ($list_ref as $key => $value): ?>
								<li <?= jecho($lap, $key, 'class="active"'); ?>><a href="<?= site_url("statistik/chart_gis_dusun/$key/" . underscore($dusun[dusun])); ?>" data-remote="false" data-toggle="modal" data-target="#modalSedang" data-title="Statistik Penduduk <?= $wilayah . " " . $dusun['dusun']; ?>"><?= $value; ?></a></li>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>

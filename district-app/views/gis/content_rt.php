<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div id="isi_popup_rt">
	<?php foreach ($rt_gis as $key_rt => $rt): ?>
		<div id="isi_popup_rt_<?= $key_rt ?>" style="visibility: hidden;">
			<div id="content">
				<center><h5 id="firstHeading" class="firstHeading"><b>Wilayah RT <?= $rt['rt'] ?> RW <?= $rt['rw'] . " " . ucwords($this->setting->sebutan_dusun) . " " . $rt['dusun']; ?></b></h5></center>
				<p><center><a href="#collapseStatGraph" class="btn btn-outline-info btn-smbtn-modal" title="Statistik Penduduk" data-toggle="collapse" data-target="#collapseStatGraph" aria-expanded="false" aria-controls="collapseStatGraph"><i class="fe fe-bar-chart"></i>Statistik Penduduk</a></center></p>
				<div class="collapse box-body no-padding" id="collapseStatGraph">
					<div id="bodyContent">
						<div class="card card-body">
							<?php foreach ($list_ref as $key => $value): ?>
								<li <?= jecho($lap, $key, 'class="active"'); ?>><a href="<?= site_url("statistik/chart_gis_rt/$key/" . underscore($rt[dusun]) . "/" . underscore($rt[rw]) . "/" . underscore($rt[rt])); ?>" data-remote="false" data-toggle="modal" data-target="#modalSedang" data-title="Statistik Penduduk RT <?= $rt['rt'] ?> RW <?= $rt['rw'] . " " .$wilayah . " " . $rt['dusun']?>"><?= $value; ?></a></li>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>

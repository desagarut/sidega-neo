<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Data Terdata Suplemen</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li><a href="<?= site_url("suplemen/rincian/$suplemen[id]"); ?>"></i> Rincian Suplemen</a></li>
			<li class="active">Data Terdata Suplemen</li>
		</ol>
				<div class="card shadow">
					<div class="card-header">
						<a href="<?= site_url("suplemen/rincian/$suplemen[id]"); ?>" class="btn btn-info btn-sm "><i class="fe fe-arrow-circle-left"></i> Kembali Ke Rincian Suplemen</a>
					</div>
					<div class="box-body ">
						<h5><b>Rincian Suplemen</b></h5>
						<table class="table table-bordered table-striped table-hover tabel-rincian">
							<tbody>
								<tr>
									<td width="20%">Nama Suplemen</td>
									<td width="1%">:</td>
									<td><?= strtoupper($suplemen["nama"]); ?></td>
								</tr>
								<tr>
									<td>Sasaran</td>
									<td>:</td>
									<td><?= $sasaran[$suplemen["sasaran"]]?></td>
								</tr>
								<tr>
									<td>Keterangan</td>
									<td>:</td>
									<td><?= $suplemen["keterangan"]?></td>
								</tr>
							</tbody>
						</table>
					</div>

					<div class="box-body">
						<h5><b>Data Terdata</b></h5>
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover tabel-rincian">
								<tbody>
									<?php $judul = ($suplemen['sasaran'] == 1) ? 'Penduduk' : 'KK' ?>
									<tr>
										<td width="20%"><?= ($suplemen["sasaran"] == 1) ? 'NIK / Nama Penduduk' : 'No. KK / Nama KK'; ?></td>
										<td width="1%">:</td>
										<td> <?= $terdata["terdata_nama"] . ' / ' . $terdata["terdata_info"]?></td>
									</tr>
									<tr>
										<td>Alamat <?= $judul; ?></td>
										<td>:</td>
										<td><?= $individu['alamat_wilayah']; ?></td>
									</tr>
									<tr>
										<td>Tempat Tanggal Lahir (Umur) <?= $judul; ?></td>
										<td>:</td>
										<td><?= $individu['tempatlahir']?> <?= tgl_indo($individu['tanggallahir'])?> (<?= $individu['umur']?> Tahun)</td>
									</tr>
									<tr>
										<td>Pendidikan <?= $judul; ?></td>
										<td>:</td>
										<td><?= $individu['pendidikan']?></td>
									</tr>
									<tr>
										<td>Warganegara / Agama <?= $judul; ?></td>
										<td>:</td>
										<td><?= $individu['warganegara']?> / <?= $individu['agama']?></td>
									</tr>
									<tr>
										<td>Keterangan</td>
										<td>:</td>
										<td><?= $terdata["keterangan"]?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


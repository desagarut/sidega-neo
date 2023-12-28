<?php if ($halaman_statis) : ?>
	<style>
		.content {
			padding: 0px !important
		}

		.small-box .icon {
			padding-top: 10px;
		}
	</style>
	<!--<link rel="stylesheet" href="<? //= base_url('assets/css/app-light.css')
										?>" />-->
	<?php if (is_file($this->theme_folder . "/" . $this->theme . '/css/first.css')) : ?>
		<link rel="stylesheet" href="<?= base_url() . $this->theme_folder . '/' . $this->theme . '/css/first.css' ?>" />
	<?php endif; ?>
	<?php if (is_file("desa/themes/" . $this->theme . '/assets/css/desa-web.css')) : ?>
		<link type='text/css' href="<?= base_url() . $this->theme_folder . '/' . $this->theme . '/assets/css/desa-web.css' ?>" rel='stylesheet' />
	<?php endif; ?>
	<?php if (is_file("desa/css/" . $this->theme . "/desa-web.css")) : ?>
		<link type='text/css' href="<?= base_url() ?>desa/css/<?= $this->theme ?>/desa-web.css" rel='Stylesheet' />
	<?php endif; ?>
<?php endif; ?>

<script type="text/javascript">
	$(document).ready(function() {

		Highcharts.chart('container', {
			chart: {
				type: 'pie',
				options3d: {
					enabled: true,
					alpha: 45
				}
			},
			title: {
				text: 'Indeks Desa Membangun (IDM)'
			},
			subtitle: {
				text: 'SKOR : IKS, IKE, IKL'
			},

			plotOptions: {
				series: {
					colorByPoint: true
				},
				pie: {
					allowPointSelect: true,
					cursor: 'pointer',
					showInLegend: true,
					depth: 45,
					innerSize: 70,
					dataLabels: {
						enabled: true,
						format: '<b>{point.name}</b>: {point.y:,.2f} / {point.percentage:.1f} %'
					}
				}
			},
			series: [{
				name: 'SKOR',
				shadow: 1,
				border: 1,
				data: [
					['IKS', <?= $idm->ROW[35]->SKOR ?>],
					['IKE', <?= $idm->ROW[48]->SKOR ?>],
					['IKL', <?= $idm->ROW[52]->SKOR ?>]
				]
			}]
		});


	});
</script>

<style>
	.status-idm-kiri {
		padding-right: 5px;
	}

	.status-idm-kanan {
		padding-left: 5px;
	}

	.tabel-skor {
		padding-right: 0px;
	}

	.table-striped>tbody>tr.judul {
		background-color: lightgrey !important;
	}

	tr.judul>td,
	tr.judul>th {
		background-color: inherit !important;
	}

	.table>thead>tr>th,
	.table>tbody>tr>th,
	.table>tfoot>tr>th,
	.table>thead>tr>td,
	.table>tbody>tr>td,
	.table>tfoot>tr>td {
		font-size: 12px;
		padding: 5px;
	}

	tr.lebih {
		display: none;
	}

	.small-box .icon {
		font-size: 75px;
	}

	.small-box h3 {
		font-size: 30px;
	}

	.input-sm {
		padding: 4px 4px;
	}

	@media (max-width:780px) {
		.btn-group-vertical {
			display: block;
		}
	}

	.table-responsive {
		min-height: 275px;
	}

	#container {
		height: 352px;
	}

	.highcharts-figure,
	.highcharts-data-table table {
		min-width: 310px;
		max-width: 800px;
		margin: 1em auto;
	}

	.highcharts-data-table table {
		font-family: Verdana, sans-serif;
		border-collapse: collapse;
		border: 1px solid #EBEBEB;
		margin: 10px auto;
		text-align: center;
		width: 100%;
		max-width: 500px;
	}

	.highcharts-data-table caption {
		padding: 1em 0;
		font-size: 1.2em;
		color: #555;
	}

	.highcharts-data-table th {
		font-weight: 600;
		padding: 0.5em;
	}

	.highcharts-data-table td,
	.highcharts-data-table th,
	.highcharts-data-table caption {
		padding: 0.5em;
	}

	.highcharts-data-table thead tr,
	.highcharts-data-table tr:nth-child(even) {
		background: #f8f8f8;
	}

	.highcharts-data-table tr:hover {
		background: #f1f7ff;
	}
</style>

<main role="main" class="main-content">
	<?php if (empty($halaman_statis)) : ?>
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-12">
					<div class="row align-items-center mb-2">
						<div class="col">
							<h5 class="page-title">Status IDM <?= ucwords($this->setting->sebutan_desa) . ' ' . $tahun; ?></h5>
						</div>
						<div class="col-auto">
						</div>
					</div>
					<div class="card shadow">
						<div class="card-body">
							<div class="row">
								<div class="col-sm-12">
									<?php if ($idm->error_msg) : ?>
										<div class="alert alert-danger">
											<?= $idm->error_msg ?>
										</div>
									<?php endif; ?>
									<div class="row mb-4">
										<div class="col text-center">
											<h5 class="page-title">
												STATUS INDEKS DESA MEMBANGUN<br />
												DESA <?= $idm->IDENTITAS[0]->nama_desa ?> KECAMATAN <?= $idm->IDENTITAS[0]->nama_kecamatan ?><br />
												KABUPATEN <?= $idm->IDENTITAS[0]->nama_kab_kota ?> PROVINSI <?= $idm->IDENTITAS[0]->nama_provinsi ?><br />
												TAHUN <?= $tahun ?>
											</h5>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4 mb-4">
											<div class="card shadow mb-4">
												<div class="card-body text-center">
													<a href="#!" class="avatar avatar-lg">
														<img src="<?= gambar_desa($desa['logo']); ?>" alt="Logo Desa" class="avatar-img rounded-circle">
													</a>
													<div class="card-text my-2">
														<strong class="card-title my-0"><?= $idm->SUMMARIES->STATUS ?></strong>
														<p class="small text-muted mb-0">Status IDM Saat Ini</p>
														<p class="small"><span class="badge badge-primary">Skor : <?= number_format($idm->SUMMARIES->SKOR_SAAT_INI, 4) ?></span></p>
													</div>
												</div>
											</div>
											<div class="card shadow mb-4">
												<div class="card-body text-center">
													<a href="#!" class="avatar avatar-lg">
														<img src="<?= gambar_desa($desa['logo']); ?>" alt="Logo Desa" class="avatar-img rounded-circle">
													</a>
													<div class="card-text my-2">
														<strong class="card-title my-0"><?= $idm->SUMMARIES->TARGET_STATUS ?></strong>
														<p class="small text-muted mb-0">Target IDM Berikutnya</p>
														<p class="small"><span class="badge badge-warning">Skor Minimum : <?= number_format($idm->SUMMARIES->SKOR_MINIMAL, 4) ?></span></p>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-8 mb-4">
											<div class="card shadow mb-4">
												<div class="card-body text-center">
													<div id="container"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<table class="table datatables table-hover table-responsive" id="dataTable-1">
										<thead>
											<tr>
												<th rowspan="2" class="padat">NO</th>
												<th rowspan="2">INDIKATOR IDM</th>
												<th rowspan="2">SKOR</th>
												<th rowspan="2">KETERANGAN</th>
												<th rowspan="2" nowrap>KEGIATAN YANG DAPAT DILAKUKAN</th>
												<th rowspan="2">+NILAI</th>
												<th colspan="6" class="text-center">YANG DAPAT MELAKSANAKAN KEGIATAN</th>
											</tr>
											<tr>
												<th>PUSAT</th>
												<th>PROVINSI</th>
												<th>KABUPATEN</th>
												<th>DESA</th>
												<th>CSR</th>
												<th>LAINNYA</th>
											</tr>
										</thead>
										<tbody class="text-muted">
											<?php foreach ($idm->ROW as $data) : ?>
												<tr class="<?php empty($data->NO) and print('judul'); ?> ">
													<td class="text-center"><?= $data->NO ?></td>
													<td style="min-width: 150px;"><?= $data->INDIKATOR ?></td>
													<td class="padat"><?= $data->SKOR ?></td>
													<td style="min-width: 250px;"><?= $data->KETERANGAN ?></td>
													<td><?= $data->KEGIATAN ?></td>
													<td><?= $data->NILAI ?></td>
													<td><?= $data->PUSAT ?></td>
													<td><?= $data->PROV ?></td>
													<td><?= $data->KAB ?></td>
													<td><?= $data->DESA ?></td>
													<td><?= $data->CSR ?></td>
													<td><?= $data->SKOR[INDIKATOR['IKS 2023']] ?></td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
</main>


<!-- Pengaturan Grafik (Graph) Data Statistik-->
<script type="text/javascript">
	var chart;
	$(document).ready(function() {
		chart = new Highcharts.Chart({
			chart: {
				renderTo: 'chart',
				defaultSeriesType: 'column'
			},
			title: {
				text: ''
			},
			xAxis: {
				title: {
					text: '<?= ucwords($main['lblx']) ?>'
				},
				categories: [
					<?php foreach ($main['pengunjung'] as $data) : ?>['<?= ($main['lblx'] == 'Bulan') ? getBulan($data['Tanggal']) . " " . date('Y') : tgl_indo2($data['Tanggal']); ?>', ],
					<?php endforeach; ?>
				]
			},
			yAxis: {
				title: {
					text: 'Pengunjung (Orang)'
				}
			},
			legend: {
				layout: 'vertical',
				enabled: false
			},
			plotOptions: {
				series: {
					colorByPoint: true
				},
				column: {
					pointPadding: 0,
					borderWidth: 0
				}
			},
			series: [{
				shadow: 1,
				border: 1,
				data: [
					<?php foreach ($main['pengunjung'] as $data) : ?>['<?= ($main['lblx'] == 'Bulan') ? getBulan($data['Tanggal']) . " " . date('Y') : tgl_indo2($data['Tanggal']); ?>', <?= $data['Jumlah'] ?>],
					<?php endforeach; ?>
				]
			}]
		});
	});
</script>
<!-- Highcharts -->
<script src="<?= base_url() ?>assets/js/highcharts/exporting.js"></script>
<script src="<?= base_url() ?>assets/js/highcharts/highcharts-more.js"></script>

<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">Statistik Pengunjung Website</h5>

				<form id="mainform" name="mainform" action="" method="post">
					<div class="row">
						<div class="col-md-12">
							<div class="card shadow">
								<div class="card-header">
									<div class="row">
										<div class="col-sm-12">
											<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
												<div class="row">
													<div class="col-sm-12">
														<a href="<?= site_url("pengunjung/cetak") ?>" class="btn btn-outline-info mb-1" title="Cetak Laporan" target="_blank"><i class="fe fe-printer "></i>Cetak</a>
														<a href="<?= site_url("pengunjung/unduh") ?>" class="btn btn-outline-info mb-1" title="Unduh Laporan" target="_blank"><i class="fe fe-printer "></i>Unduh</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-4 mb-4">
											<a href="<?= site_url('pengunjung/detail/1') ?>" class="small-card-footer">
												<div class="card shadow">
													<div class="card-body">
														<div class="row align-items-center">
															<div class="col">
																<small class="text-muted mb-1">Today</small>
																<h3 class="card-title mb-0"><?= ribuan($hari_ini); ?></h3>
															</div>
															<div class="col-4 text-right">
																<div id="gauge1" class="gauge-container"></div>
															</div>
														</div>
													</div>
												</div>
											</a>
										</div>
										<div class="col-md-4 mb-4">
											<a href="<?= site_url('pengunjung/detail/2') ?>" class="small-card-footer">
												<div class="card shadow">
													<div class="card-body">
														<div class="row align-items-center">
															<div class="col">
																<small class="text-muted mb-1">Yesterday</small>
																<h3 class="card-title mb-0"><?= ribuan($kemarin); ?></h3>
															</div>
															<div class="col-4 text-right">
																<div id="gauge2" class="gauge-container"></div>
															</div>
														</div>
													</div>
												</div>
											</a>
										</div>
										<div class="col-md-4 mb-4">
											<a href="<?= site_url('pengunjung/detail/3') ?>" class="small-card-footer">
												<div class="card shadow">
													<div class="card-body">
														<div class="row align-items-center">
															<div class="col">
																<small class="text-muted mb-1">This week</small>
																<h3 class="card-title mb-0"><?= ribuan($minggu_ini); ?></h3>
															</div>
															<div class="col-4 text-right">
																<div id="gauge3" class="gauge-container"></div>
															</div>
														</div>
													</div>
												</div>
											</a>
										</div>
										<div class="col-md-4 mb-4">
											<a href="<?= site_url('pengunjung/detail/4') ?>" class="small-card-footer">
												<div class="card shadow">
													<div class="card-body">
														<div class="row align-items-center">
															<div class="col">
																<small class="text-muted mb-1">This Month</small>
																<h3 class="card-title mb-0"><?= ribuan($bulan_ini); ?></h3>
															</div>
															<div class="col-4 text-right">
																<div id="gauge4" class="gauge-container"></div>
															</div>
														</div>
													</div>
												</div>
											</a>
										</div>
										<div class="col-md-4 mb-4">
											<a href="<?= site_url('pengunjung/detail/5') ?>" class="small-card-footer">
												<div class="card shadow">
													<div class="card-body">
														<div class="row align-items-center">
															<div class="col">
																<small class="text-muted mb-1">This Year</small>
																<h3 class="card-title mb-0"><?= ribuan($tahun_ini); ?></h3>
															</div>
															<div class="col-4 text-right">
																<div id="gauge5" class="gauge-container"></div>
															</div>
														</div>
													</div>
												</div>
											</a>
										</div>
										<div class="col-md-4 mb-4">
											<a href="<?= site_url('pengunjung/detail') ?>" class="small-card-footer">
												<div class="card shadow">
													<div class="card-body">
														<div class="row align-items-center">
															<div class="col">
																<small class="text-muted mb-1">All</small>
																<h3 class="card-title mb-0"><?= ribuan($jumlah); ?></h3>
															</div>
															<div class="col-4 text-right">
																<div id="gauge6" class="gauge-container"></div>
															</div>
														</div>
													</div>
												</div>
											</a>
										</div>
									</div>
									<div class="card-header mb-4">
										<hr>
										<h4 class="text-center"><strong>Statistik Pengunjung Website <?= $main['judul'] ?><strong></h4>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="row">
												<div class="col-md-8">
													<div class="card shadow">
														<!-- Ini Grafik -->
														<br>
														<div id="chart"> </div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="card shadow">
														<!-- Tabel Data -->
														<div class="table-responsive">
															<table class="table table-bordered table-striped table-hover nowrap">
																<thead class="text-muted">
																	<tr>
																		<th class="text-center" width='5%'>No</th>
																		<th class="text-center"><?= $main['lblx'] ?></th>
																		<th class="text-center">Pengunjung (Orang)</th>
																	</tr>
																</thead>
																<tbody>
																	<?php $no = 1; ?>
																	<?php foreach ($main['pengunjung'] as $data) :	?>
																		<tr>
																			<td class="text-center"><?= $no++; ?></td>
																			<td class="text-center">
																				<?= ($main['lblx'] == 'Bulan') ? getBulan($data['Tanggal']) . " " . date('Y') : tgl_indo2($data['Tanggal']); ?>
																			</td>
																			<td class="text-center"><?= ribuan($data['Jumlah']); ?></td>
																		</tr>
																	<?php endforeach; ?>
																</tbody>
																<tfoot class="bg-gray disabled color-palette">
																	<tr>
																		<th colspan="2" class="text-center">Total</th>
																		<th class="text-center"><?= ribuan($main['Total']); ?></th>
																	</tr>
																</tfoot>
															</table>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
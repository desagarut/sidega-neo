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
					<?php foreach ($main['pengunjung'] as $data) : ?>['<?= ($main['lblx'] == 'Tanggal') ? getBulan($data['Tanggal']) . " " . date('Y') : tgl_indo2($data['Tanggal']); ?>', <?= $data['Jumlah'] ?>],
					<?php endforeach; ?>
				]
			}]
		});
	});
</script>

<!-- Highcharts -->
<script src="<?= base_url(); ?>assets/js/highcharts/exporting.js"></script>
<script src="<?= base_url(); ?>assets/js/highcharts/highcharts-more.js"></script>

<div class="card shadow mb-4">
	<div class="card-header">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="h6 mb-0">Pengunjung</h3>
			</div>
			<div class="col-auto">
				<a class="small text-muted" href="<?= site_url('pengunjung'); ?>">View all</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="col-auto">
			<div id="chart" style="height:280px; width:100%"> </div>
		</div>
	</div>
</div>
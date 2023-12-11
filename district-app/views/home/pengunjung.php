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
<script src="<?= base_url() ?>assets/js/highcharts/exporting.js"></script>
<script src="<?= base_url() ?>assets/js/highcharts/highcharts-more.js"></script>

<div class="card">
	<div class="card-header">
		<h5>Pengunjung</h5>
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
		<div class="card-group" id="accordion">
			<div class="col-md-12">
				<!-- Ini Grafik -->
				<br>
				<div id="chart" style="height:150px"> </div>
			</div>
		</div>
	</div>
</div>
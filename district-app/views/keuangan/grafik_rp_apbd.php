<style type="text/css">
	.nowrap { white-space: nowrap; }
</style>
<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Laporan Keuangan</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li><a href="<?= site_url('keuangan/laporan')?>">Laporan Keuangan</a></li>
			<li class="active">Grafik Pelaksanaan Belanja Desa</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="row">
			<?php $this->load->view('keuangan/filter_laporan', array('data' => $tahun_anggaran)); ?>
			<div class="col-md-9">
				<?php include("district-app/views/keuangan/grafik_rp_apbd_chart.php"); ?>
			</div>
		</div>
	</section>
</div>

<link rel="stylesheet" href="<?= base_url()?>assets/css/bagan.css">

<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Bagan Pemerintahan <?= ucwords($this->setting->sebutan_desa)?></h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li><a href="<?= site_url('pengurus')?>">Pemerintahan <?= ucwords($this->setting->sebutan_desa)?></a></li>
			<li class="active">Bagan Pemerintahan <?= ucwords($this->setting->sebutan_desa)?></li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-shadow">
					<div class="box-body">
						<figure class="highcharts-figure">
					    <div id="container"></div>
					    <p class="highcharts-description">
					    </p>
						</figure>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<?php include('district-app/views/home/chart_bagan.php'); ?>

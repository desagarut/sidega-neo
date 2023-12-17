<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Panduan</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li><a href="<?= site_url('Suplemen')?>"> Data Suplemen</a></li>
			<li class="active">Panduan</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="mainform" name="mainform" action="" method="post">
			<div class="card card-shadow">
				<div class="box-header with-border">
					<a href="<?=site_url('suplemen')?>" class="btn btn-social btn-box btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Daftar Suplemen"><i class="fe fe-arrow-circle-o-left"></i> Kembali Ke Daftar Suplemen</a>
				</div>
				<div class="box-body">
					<h4>Keterangan</h4>
					<p><strong>Data Suplemen</strong> adalah modul untuk pengelolaan data tambahan warga, baik secara perorangan, keluarga, rumah tangga, maupun kelompok/organisasi.</p>
					<h4>Panduan</h4>
					<p>Cara menyimpan/memperbarui Data Suplemen adalah dengan mengisikan formulir yang terdapat dari menu Tulis Data Suplemen Baru:</p>
					<p>
						<ul>
							<li>Kolom <strong>Sasaran Data</strong>
								<p>Pilihlah salah satu dari sasaran data, apakah pribadi/perorangan, keluarga/kk, Rumah Tangga, ataupu Organisasi/kelompok warga</p>
							</li>
							<li>Kolom <strong>Nama Data</strong>
								<p>Nama data wajib diisi</p>
							</li>
							<li>Kolom <strong>Keterangan Data</strong>
								<p>Isikan keterangan data suplemen ini</p>
							</li>
						</ul>
					</p>
				</div>
			</div>
		</form>
	</section>
</div>

<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Formulir Penambahan Terdata</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda') ?>"><i class="fe fe-home"></i> Home</a></li>
			<li><a href="<?= site_url('data_dtks') ?>"> Data Kemiskinan</a></li>
			<li><a href="<?= site_url() ?>data_dtks/rincian/1/<?= $data_dtks['id'] ?>"> Rincian Data Kemiskinan</a></li>
			<li class="active">Formulir Penambahan Terdata</li>
		</ol>
	</section>
	<section class="content">
		<div class="card card-shadow">
			<div class="box-header with-border">
				<a href="<?= site_url("data_dtks"); ?>" class="btn btn-social btn-box btn-primary btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Daftar Data Kemiskinan"><i class="fe fe-arrow-circle-o-left"></i> Kembali Ke Daftar Data Kemiskinan</a>
				<a href="<?= site_url("data_dtks/rincian/$data_dtks[id]"); ?>" class="btn btn-social btn-box btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fe fe-arrow-circle-left"></i> Kembali Ke Rincian Data Data Kemiskinan</a>
			</div>
			<?php $this->load->view('data_dtks/rincian'); ?>
			<div class="box-body">
				<h5><b>Tambahkan Warga Terdata</b></h5>
				<hr>
				<form action="" id="main" name="main" method="POST" class="form-horizontal">
					<div class="form-group">
						<label for="terdata" class="col-sm-3 control-label"><?= $list_sasaran['judul']; ?></label>
						<div class="col-sm-8">
							<select class="form-control select2 required" id="terdata" name="terdata" onchange="formAction('main')">
								<option selected="selected">-- Silakan Masukan <?= $list_sasaran['judul']; ?> --</option>
								<?php foreach ($list_sasaran['data'] as $item) : ?>
									<?php if (strlen($item["id"]) > 0) : ?>
										<option value="<?= $item['id'] ?>" <?= selected($individu['id'], $item['id']); ?>>Nama : <?= $item['nama'] . ' - ' . $item['info']; ?></option>
									<?php endif; ?>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</form>
				<div id="form-melengkapi-data-peserta">
					<form id="validasi" action="<?= "$form_action/$data_dtks[id]"; ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
						<input type="hidden" name="nik" id="nik" value="<?= $individu['nik'] ?>" />
						<div class="form-group">
							<label class="col-sm-3 control-label"></label>
							<div class="col-sm-8">
								<input type="hidden" name="id_terdata" value="<?= $individu['id'] ?>" class="form-control input-sm required">
							</div>
						</div>
						<?php if ($individu) : ?>
							<?php include("district-app/views/data_dtks/konfirmasi_terdata.php"); ?>
						<?php endif; ?>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="id_dtks">Nomor ID DTKS</label>
							<div class="col-sm-8">
								<input name="id_dtks" id="id_dtks" class="form-control input-sm" maxlength="100" placeholder="Nomor ID DTKS"></input>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="keterangan_padan">Keterangan Padan</label>
							<div class="col-sm-8">
								<input name="keterangan_padan" id="keterangan_padan" class="form-control input-sm" placeholder="Keterangan Padan" ></input>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="keterangan_bantuan">Keterangan Bantuan</label>
							<div class="col-sm-8">
								<input name="keterangan_bantuan" id="keterangan_bantuan" class="form-control input-sm" placeholder="Keterangan Bantuan" rows="5"></input>
							</div>
						</div>

					</form>
				</div>
			</div>
			<div class="box-footer">
				<button type="reset" class="btn btn-social btn-box btn-danger btn-sm"><i class="fe fe-times"></i> Batal</button>
				<button type="submit" class="btn btn-social btn-box btn-info btn-sm pull-right" onclick="$('#'+'validasi').submit();"><i class="fe fe-check"></i> Simpan</button>
			</div>
		</div>
	</section>
</div>
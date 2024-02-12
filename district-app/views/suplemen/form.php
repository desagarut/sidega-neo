<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Form Data Suplemen</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li><a href="<?= site_url('suplemen')?>"> Data Suplemen</a></li>
			<li class="active">Form Data Suplemen</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="card shadow">
			<div class="card-header">
				<a href="<?= site_url('suplemen')?>" class="btn btn-info btn-sm "><i class="fe fe-arrow-circle-left"></i> Kembali Ke Daftar Suplemen</a>
			</div>
			<form id="validasi" action="<?= $form_action; ?>" method="POST" class="form-horizontal">
				<div class="box-body">
					<div class="form-group">
						<label class="col-sm-3 control-label" for="id_master">Sasaran Data</label>
						<div class="col-sm-7">
							<?php if ($suplemen['jml'] <> 0): ?>
								<input type="hidden" name="sasaran" value="<?= $suplemen['sasaran']; ?>">
								<select class="form-control input-sm" disabled>
							<?php else: ?>
								<select class="form-control input-sm required" name="sasaran">
							<?php endif;?>
							<option value="">Pilih Sasaran</option>
							<?php foreach ($list_sasaran AS $key => $value): ?>
								<?php if (in_array($key, ['1', '2'])) : ?>
									<option value="<?= $key; ?>" <?= selected($suplemen['sasaran'], $key); ?>><?= $value?></option>
								<?php endif; ?>
							<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label" for="nama">Nama Data Suplemen</label>
						<div class="col-sm-7">
							<input class="form-control input-sm nomor_sk required" maxlength="100" type="text" placeholder="Nama Data Suplemen" name="nama" id="nama" value="<?= $suplemen['nama']?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label" for="keterangan">Keterangan</label>
						<div class="col-sm-7">
							 <textarea name="keterangan" id="keterangan" class="form-control input-sm" maxlength="300" placeholder="Keterangan" rows="3" style="resize:none;"><?= $suplemen['keterangan']?></textarea>
						 </div>
					</div>
				</div>
				<div class="box-footer">
					<button type="reset" class="btn btn-outline-danger btn-sm btn-sm "><i class="fe fe-times"></i> Batal</button>
					<button type="submit" class="btn btn-info btn-sm pull-right"><i class="fe fe-check"></i> Simpan</button>
				</div>
			</form>
		</div>
	</section>
</div>

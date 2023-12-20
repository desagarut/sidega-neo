<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Formulir Penambahan peserta</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li><a href="<?= site_url('pemberdayaan_masyarakat')?>"> Data Peserta</a></li>
			<li><a href="<?= site_url()?>pemberdayaan_masyarakat/rincian/1/<?= $pemberdayaan_masyarakat['id']?>"> Rincian Data Peserta</a></li>
			<li class="active">Formulir Penambahan peserta</li>
		</ol>
	</section>
	<section class="content">
		<div class="card shadow">
			<div class="card-header">
				<a href="<?= site_url("pemberdayaan_masyarakat"); ?>" class="btn btn-primary btn-sm " title="Kembali"><i class="fe fe-arrow-circle-o-left"></i> Kembali</a>
				<a href="<?= site_url("pemberdayaan_masyarakat/rincian/$pemberdayaan_masyarakat[id]"); ?>" class="btn btn-info btn-sm "><i class="fe fe-arrow-circle-left"></i> Kembali Ke Rincian Data</a>
			</div>
			<?php $this->load->view('pemberdayaan_masyarakat/rincian'); ?>
			<div class="box-body">
				<h5><b>Tambahkan Warga peserta</b></h5>
				<hr>
				<form action="" id="main" name="main" method="POST" class="form-horizontal">
					<div class="form-group" >
						<label for="peserta" class="col-sm-3 control-label"><?= $list_sasaran['judul']; ?></label>
						<div class="col-sm-8">
							<select class="form-control select2 required" id="peserta" name="peserta" onchange="formAction('main')">
								<option selected="selected">-- Silakan Masukan <?= $list_sasaran['judul']; ?>  --</option>
								<?php foreach ($list_sasaran['data'] as $item): ?>
									<?php if (strlen($item["id"])>0): ?>
										<option value="<?= $item['id']?>" <?= selected($individu['id'], $item['id']); ?>>Nama : <?= $item['nama'] . ' - ' . $item['info']; ?></option>
									<?php endif; ?>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</form>
				<div id="form-melengkapi-data-peserta">
					<form id="validasi" action="<?= "$form_action/$pemberdayaan_masyarakat[id]"; ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-3 control-label"></label>
							<div class="col-sm-8">
								<input type="hidden" name="id_peserta" value="<?= $individu['id']?>" class="form-control input-sm required">
							</div>
						</div>
						<?php if ($individu): ?>
							<?php include("district-app/views/pemberdayaan_masyarakat/konfirmasi_peserta.php"); ?>
						<?php endif; ?>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="keterangan">Keterangan</label>
							<div class="col-sm-8">
								<textarea name="keterangan" id="keterangan" class="form-control input-sm" maxlength="100" placeholder="Keterangan" rows="5"></textarea>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="box-footer">
				<button type="reset" class="btn btn-danger btn-sm"><i class="fe fe-times"></i> Batal</button>
				<button type="submit" class="btn btn-info btn-sm pull-right" onclick="$('#'+'validasi').submit();"><i class="fe fe-check"></i> Simpan</button>
			</div>
		</div>
	</section>
</div>


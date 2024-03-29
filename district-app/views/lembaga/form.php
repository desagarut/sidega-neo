<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Master lembaga</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li><a href="<?= site_url('lembaga')?>"> Daftar lembaga</a></li>
			<li class="active">Master lembaga</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card shadow">
					<div class="card-header">
						<a href="<?= site_url()?>lembaga" class="btn btn-info btn-sm "><i class="fe fe-arrow-circle-left "></i> Kembali Ke Daftar lembaga</a>
					</div>
					<form id="validasi" action="<?= $form_action?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
						<div class="box-body">
							<div class="form-group">
								<label  class="col-sm-3 control-label" for="nama">Nama lembaga</label>
								<div class="col-sm-7">
									<input  id="nama" class="form-control input-sm nama_terbatas required" type="text" placeholder="Nama lembaga" name="nama" value="<?= $lembaga['nama']?>">
								</div>
							</div>
							<div class="form-group">
								<label  class="col-sm-3 control-label" for="kode">Kode lembaga</label>
								<div class="col-sm-7">
									<input  id="kode" class="form-control input-sm nomor_sk" type="text" placeholder="Kode lembaga" name="kode" value="<?= $lembaga['kode']?>">
								</div>
							</div>
							<div class="form-group">
								<label  class="col-sm-3 control-label" for="id_master">Kategori lembaga</label>
								<div class="col-sm-7">
									<select class="form-control input-sm select2 required" id="id_master" name="id_master">
										<option value="">-- Silakan Masukkan Kategori lembaga--</option>
										<?php foreach ($list_master AS $data): ?>
											<option value="<?= $data['id']; ?>" <?= selected($lembaga['id_master'], $data['id']); ?>><?= $data['lembaga']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label  class="col-sm-3 control-label" for="id_ketua">Ketua lembaga</label>
								<div class="col-sm-7">
									<select class="form-control input-sm select2 required" id="id_ketua" name="id_ketua">
										<option value="">-- Silakan Masukkan NIK / Nama--</option>
										<?php foreach ($list_penduduk as $data): ?>
											<option value="<?= $data['id']; ?>" <?= selected($data['id'], $lembaga['id_ketua']); ?>>NIK :<?= $data['nik'] . " - " . $data['nama'] . " - " . $data['alamat']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label  class="col-sm-3 control-label" for="keterangan">Deskripsi lembaga</label>
								<div class="col-sm-7">
									 <textarea name="keterangan" class="form-control input-sm" placeholder="Deskripsi lembaga"  rows="3"><?= $lembaga['keterangan']?></textarea>
								 </div>
							</div>
						</div>
						<div class="box-footer">
							<div class="col-xs-12">
								<button type="reset" class="btn btn-outline-danger btn-sm btn-sm "><i class="fe fe-times"></i> Batal</button>
								<button type="submit" class="btn btn-info btn-sm pull-right"><i class="fe fe-check"></i> Simpan</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>

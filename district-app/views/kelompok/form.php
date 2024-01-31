<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="row align-items-center mb-2">
					<div class="col">
						<h5 class="page-title">Master Kelompok</h1>
					</div>
					<div class="col-auto">
						<a href="<?= site_url() ?>kelompok" class="btn btn-outline-primary btn-sm "><i class="fe fe-arrow-circle-left "></i> Kembali Ke Daftar Kelompok</a>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="card shadow">
							<form id="validasi" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
								<div class="card-body">
									<div class="form-group row row">
										<label class="col-sm-3 control-label" for="nama">Nama Kelompok</label>
										<div class="col-sm-7">
											<input id="nama" class="form-control input-sm nama_terbatas required" type="text" placeholder="Nama Kelompok" name="nama" value="<?= $kelompok['nama'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 control-label" for="kode">Kode Kelompok</label>
										<div class="col-sm-7">
											<input id="kode" class="form-control input-sm nomor_sk" type="text" placeholder="Kode Kelompok" name="kode" value="<?= $kelompok['kode'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 control-label" for="id_master">Kategori Kelompok</label>
										<div class="col-sm-7">
											<select class="form-control input-sm select2 required" id="id_master" name="id_master">
												<option value="">-- Silakan Masukkan Kategori Kelompok--</option>
												<?php foreach ($list_master as $data) : ?>
													<option value="<?= $data['id']; ?>" <?= selected($kelompok['id_master'], $data['id']); ?>><?= $data['kelompok']; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 control-label" for="id_ketua">Ketua Kelompok</label>
										<div class="col-sm-7">
											<select class="form-control input-sm select2 required" id="id_ketua" name="id_ketua">
												<option value="">-- Silakan Masukkan NIK / Nama--</option>
												<?php foreach ($list_penduduk as $data) : ?>
													<option value="<?= $data['id']; ?>" <?= selected($data['id'], $kelompok['id_ketua']); ?>>NIK :<?= $data['nik'] . " - " . $data['nama'] . " - " . $data['alamat']; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 control-label" for="keterangan">Deskripsi Kelompok</label>
										<div class="col-sm-7">
											<textarea name="keterangan" class="form-control input-sm" placeholder="Deskripsi Kelompok" rows="3"><?= $kelompok['keterangan'] ?></textarea>
										</div>
									</div>
								</div>
								<div class="card-footer">
									<div class="col-md-12 text-right">
										<button type="reset" class="btn btn-danger btn-sm"><i class="fe fe-x"></i> Batal</button>
										<button type="submit" class="btn btn-info btn-sm"><i class="fe fe-check"></i> Simpan</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Data Anggota Lembaga</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda'); ?>"><i class="fe fe-home"></i> Home</a></li>
			<li><a href="<?= site_url('lembaga'); ?>"> Daftar lembaga</a></li>
			<li class="active">Data Anggota lembaga</li>
		</ol>
				<div class="card shadow">
					<div class="card-header">
					<a href="<?= site_url("lembaga/anggota/$lembaga"); ?>" class="btn btn-info btn-sm "><i class="fe fe-arrow-circle-left "></i> Kembali Ke Anggota lembaga</a>
					</div>
					<form id="validasi" action="<?= $form_action?>" method="POST" enctype="multipart/form-data"  class="form-horizontal">
						<div class="col-md-3">
							<div class="card-body card-profile">
								<img class="profile-user-img img-responsive img-circle" src="<?= $pend['foto'] ? AmbilFoto($pend['foto']) : base_url() . 'assets/files/user_pict/kuser.png'; ?>" alt="Foto">
								<br/>
								<p class="text-muted text-center"><code>(Kosongkan jika tidak ingin mengubah foto)</code></p>
								<br/>
								<div class="input-group input-group-sm">
									<input type="text" class="form-control" id="file_path2" name="foto">
									<input type="file" class="hidden" id="file2" name="foto">
									<input type="hidden" name="old_foto" value="<?= $pend['foto']?>">
									<span class="input-group-btn">
										<button type="button" class="btn btn-info btn-box"  id="file_browser2"><i class="fe fe-search"></i> Browse</button>
									</span>
								</div>
							</div>
						</div>
						<div class="col-md-9">
							<div class="box-body">
								<div class="form-group">
									<label class="col-sm-3 control-label"  for="id_penduduk">Nama Anggota</label>
									<div class="col-sm-5">
										<select class="form-control input-sm select2 required" <?= jecho($pend, true, 'disabled')?> id="id_penduduk" name="id_penduduk">
											<option value="">-- Silakan Masukan NIK / Nama --</option>
											<?php foreach ($list_penduduk as $data): ?>
												<option value="<?= $data['id']; ?>" <?= selected($data['id'], $pend['id_penduduk']); ?>>NIK :<?= $data['nik'] . " - " . $data['nama'] . " - " . $data['alamat']; ?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label  class="col-sm-3 control-label" for="no_anggota">Nomor Anggota</label>
									<div class="col-sm-5">
										<input  id="no_anggota" class="form-control input-sm number" type="text" placeholder="Nomor Anggota" name="no_anggota" value="<?=$pend['no_anggota']; ?>">
									</div>
								</div>
								<div class="form-group">
									<?php if (!empty($pend)): ?>
										<input type="hidden" name="jabatan_lama" value="<?= $pend['jabatan']?>">
									<?php endif; ?>
									<label class="col-sm-3 control-label" for="jabatan">Jabatan</label>
									<div class="col-sm-5">
										<select class="form-control input-sm required" id="jabatan" name="jabatan">
											<option option value="">-- Silakan Pilih Jabatan --</option>
											<?php foreach ($list_jabatan as $key => $value): ?>
												<option value="<?= $key?>"  <?= selected($key, $pend['jabatan']); ?> ><?= $value?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label  class="col-sm-3 control-label" for="no_sk_jabatan">SK Jabatan</label>
									<div class="col-sm-5">
										<input  id="no_sk_jabatan" class="form-control input-sm nomor_sk" type="text" placeholder="SK Jabatan" name="no_sk_jabatan" value="<?=$pend['no_sk_jabatan']; ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="keterangan">Keterangan</label>
									<div class="col-sm-5">
										<textarea name="keterangan" class="form-control input-sm" maxlength="300" placeholder="Keterangan" rows="3"><?= $pend['keterangan']; ?></textarea>
								 	</div>
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



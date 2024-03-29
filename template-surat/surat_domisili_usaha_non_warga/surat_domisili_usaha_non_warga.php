<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="row align-items-center mb-2">
					<div class="col">
						<?php $this->load->view("surat/form/breadcrumb.php"); ?>
					</div>
					<div class="col-auto">
						<a href="<?= site_url("surat") ?>" class="btn btn-sm btn-outline-primary" title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i>Kembali Ke Daftar Cetak Surat
						</a>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="card shadow">
							<div class="card-body">
								<form id="validasi" action="<?= $form_action ?>" method="POST" target="_blank" class="form-surat form-horizontal">
									<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
									<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url('surat/nomor_surat_duplikat') ?>">
									<?php include("district-app/views/surat/form/nomor_surat.php"); ?>
									<div class="form-group row">
										<label for="nama_non_warga" class="col-sm-3 control-label">Nama</label>
										<div class="col-sm-9">
											<input id="nama_non_warga" class="form-control input-sm required" type="text" placeholder="Nama" name="nama_non_warga">
										</div>
									</div>
									<div class="form-group row">
										<label for="nik_non_warga" class="col-sm-3 control-label">Identitas (KTP / KK)</label>
										<div class="col-sm-4">
											<input class="form-control input-sm required" placeholder="Nomor KTP" name="nik_non_warga" type="text" />
										</div>
										<div class="col-sm-4">
											<input class="form-control input-sm required" placeholder="Nomor KK" name="kk_non_warga" type="text" />
										</div>
									</div>
									<div class="form-group row">
										<label for="lahir" class="col-sm-3 control-label">Tempat / Tanggal Lahir</label>
										<div class="col-sm-5 col-lg-4">
											<input type="text" name="tempatlahir" class="form-control input-sm required" placeholder="Tempat Lahir"></input>
										</div>
										<div class="col-sm-4 col-lg-2">
											<div class="input-group date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input title="Pilih Tanggal" class="form-control input-sm datepicker required" name="tanggallahir" type="text" />
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label for="sex" class="col-sm-3 control-label">Jenis Kelamin / Warga Negara / Agama</label>
										<div class="col-sm-3">
											<select class="form-control input-sm" name="sex" id="sex">
												<option value="">Pilih Jenis Kelamin</option>
												<?php foreach ($sex as $data) : ?>
													<option value="<?= ucwords(strtolower($data['nama'])) ?>"><?= $data['nama'] ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="col-sm-3">
											<select class="form-control input-sm" name="warga_negara" id="warga_negara">
												<option value="">Pilih Warganegara</option>
												<?php foreach ($warganegara as $data) : ?>
													<option value="<?= $data['id'] == '3' ? ucwords(strtolower($data['nama'])) : strtoupper($data['nama']) ?>"><?= $data['nama'] ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="col-sm-3">
											<select class="form-control input-sm" name="agama" id="agama">
												<option value="">Pilih Agama</option>
												<?php foreach ($agama as $data) : ?>
													<option value="<?= $data['id'] == '7' ? $data['nama'] : ucwords(strtolower($data['nama'])) ?>"><?= $data['nama'] ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label for="pekerjaan" class="col-sm-3 control-label">Pekerjaan</label>
										<div class="col-sm-4">
											<select class="form-control input-sm" name="pekerjaan" id="pekerjaan">
												<option value="">Pilih Pekerjaan</option>
												<?php foreach ($pekerjaan as $data) : ?>
													<option value="<?= $data['nama'] ?>"><?= $data['nama'] ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label for="alamat" class="col-sm-3 control-label">Tempat Tinggal</label>
										<div class="col-sm-9">
											<input id="alamat" class="form-control input-sm required" type="text" placeholder="Tempat Tinggal" name="alamat">
										</div>
									</div>
									<div class="form-group row">
										<label for="nama_usaha" class="col-sm-3 control-label">Nama Usaha / Jenis Usaha</label>
										<div class="col-sm-4">
											<input id="nama_usaha" class="form-control input-sm required" type="text" placeholder="Nama Usaha" name="nama_usaha">
										</div>
										<div class="col-sm-4">
											<input id="usaha" class="form-control input-sm required" type="text" placeholder="Jenis Usaha" name="usaha">
										</div>
									</div>
									<div class="form-group row">
										<label for="akta_usaha" class="col-sm-3 control-label">Nomor Akta / Tahun / Notaris</label>
										<div class="col-sm-3">
											<input id="akta_usaha" class="form-control input-sm required" type="text" placeholder="Nomor Akta" name="akta_usaha">
										</div>
										<div class="col-sm-3">
											<input id="akta_tahun" class="form-control input-sm required" type="text" placeholder="Tahun" name="akta_tahun">
										</div>
										<div class="col-sm-3">
											<input id="notaris" class="form-control input-sm required" type="text" placeholder="Notaris" name="notaris">
										</div>
									</div>
									<div class="form-group row">
										<label for="bangunan" class="col-sm-3 control-label">Jenis Bangunan / Peruntukan Bangunan / Status Bangunan</label>
										<div class="col-sm-3">
											<input id="bangunan" class="form-control input-sm required" type="text" placeholder="Jenis Bangunan" name="bangunan">
										</div>
										<div class="col-sm-3">
											<input id="peruntukan_bangunan" class="form-control input-sm required" type="text" placeholder="Peruntukan Bangunan" name="peruntukan_bangunan">
										</div>
										<div class="col-sm-3">
											<input id="status_bangunan" class="form-control input-sm required" type="text" placeholder="Status Bangunan" name="status_bangunan">
										</div>
									</div>
									<div class="form-group row">
										<label for="alamat_usaha" class="col-sm-3 control-label">Alamat Usaha</label>
										<div class="col-sm-9">
											<input id="alamat_usaha" class="form-control input-sm required" type="text" placeholder="Alamat Usaha" name="alamat_usaha">
										</div>
									</div>
									<?php include("district-app/views/surat/form/_pamong.php"); ?>
								</form>
							</div>
							<?php include("district-app/views/surat/form/tombol_cetak.php"); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
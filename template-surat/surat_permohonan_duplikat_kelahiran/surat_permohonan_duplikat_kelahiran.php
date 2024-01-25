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
								<form id="main" name="main" method="POST" class="form-horizontal">
									<div class="col-md-12">
										<?php include("district-app/views/surat/form/_cari_nik.php"); ?>
									</div>
								</form>
								<form id="validasi" action="<?= $form_action ?>" method="POST" target="_blank" class="form-surat form-horizontal">
									<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
									<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url('surat/nomor_surat_duplikat') ?>">
									<div class="col-md-12">
										<div class="row jar_form">
											<label for="nomor" class="col-sm-3"></label>
											<div class="col-sm-8">
												<input class="required" type="hidden" name="nik" value="<?= $individu['id'] ?>">
											</div>
										</div>
										<?php if ($individu) : ?>
											<?php include("district-app/views/surat/form/konfirmasi_pemohon.php"); ?>
										<?php endif; ?>
										<?php include("district-app/views/surat/form/nomor_surat.php"); ?>
										<div class="form-group row">
											<label for="ttl" class="col-sm-3 control-label">Hari / Jam Lahir</label>
											<div class="col-sm-4">
												<input id="hari_bayi" class="form-control input-sm" type="text" placeholder="Hari Lahir" name="hari_bayi">
											</div>
											<div class="col-sm-2">
												<div class="input-group input-group-sm date">
													<div class="input-group-addon">
														<i class="fa fa-clock-o"></i>
													</div>
													<input class="form-control input-sm required" name="jam_bayi" id="jammenit_1" type="text" />
												</div>
											</div>
										</div>
										<div class="form-group row">
											<label for="tempatlahir_bayi" class="col-sm-3 control-label">Tempat Lahir</label>
											<div class="col-sm-8">
												<input type="text" name="tempatlahir_bayi" class="form-control input-sm required" placeholder="Tempat Lahir"></input>
											</div>
										</div>
										<div class="form-group row subtitle_head">
											<label class="col-sm-3 text-right"><strong>IDENTITAS PELAPOR :</strong></label>
										</div>
										<div class="form-group row">
											<label for="nama_pelapor" class="col-sm-3 control-label">Nama Pelapor</label>
											<div class="col-sm-8">
												<input type="text" name="nama_pelapor" class="form-control input-sm required" placeholder="Nama Pelapor"></input>
											</div>
										</div>
										<div class="form-group row">
											<label for="nik_pelapor" class="col-sm-3 control-label">NIK Pelapor</label>
											<div class="col-sm-8">
												<input type="text" name="nik_pelapor" class="form-control input-sm required" placeholder="NIK Pelapor"></input>
											</div>
										</div>
										<div class="form-group row">
											<label for="sex_pelapor" class="col-sm-3 control-label">Jenis Kelamin Pelapor</label>
											<div class="col-sm-4">
												<input type="text" name="sex_pelapor" class="form-control input-sm required" placeholder="Jenis Kelamin Pelapor"></input>
											</div>
										</div>
										<div class="form-group row">
											<label for="lahir" class="col-sm-3 control-label">Tempat / Tanggal Lahir Pelapor</label>
											<div class="col-sm-4">
												<input type="text" name="tempatlahir_pelapor" class="form-control input-sm required" placeholder="Tempat Lahir Pelapor"></input>
											</div>
											<div class="col-sm-3 col-lg-2">
												<div class="input-group input-group-sm date">
													<div class="input-group-addon">
														<i class="fa fa-calendar"></i>
													</div>
													<input title="Pilih Tanggal" class="form-control input-sm datepicker required" name="tanggallahir_pelapor" type="text" />
												</div>
											</div>
										</div>
										<div class="form-group row">
											<label for="pek_pelapor" class="col-sm-3 control-label">Pekerjaan Pelapor</label>
											<div class="col-sm-8">
												<input type="text" name="pek_pelapor" class="form-control input-sm required" placeholder="Pekerjaan Pelapor"></input>
											</div>
										</div>
										<div class="form-group row">
											<label for="alamat_pelapor" class="col-sm-3 control-label">Alamat Pelapor</label>
											<div class="col-sm-8">
												<textarea id="alamat_pelapor" class="form-control input-sm required" placeholder="Alamat Pelapor" name="alamat_pelapor"></textarea>
											</div>
										</div>
										<div class="form-group row subtitle_head">
											<label class="col-sm-3 text-right"><strong>PENANDA TANGAN</strong></label>
										</div>
										<?php include("district-app/views/surat/form/_pamong.php"); ?>
									</div>
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
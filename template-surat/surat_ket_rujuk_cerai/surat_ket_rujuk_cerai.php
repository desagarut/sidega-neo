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
										<div class="form-group row subtitle_head">
											<label class="col-sm-3 text-right"><strong>DATA PASANGAN :</strong></label>
										</div>
										<div class="form-group row">
											<label for="nama_pasangan" class="col-sm-3 control-label">Nama Lengkap</label>
											<div class="col-sm-8">
												<input type="text" name="nama_pasangan" class="form-control input-sm required" placeholder="Nama Lengkap Pasangan"></input>
											</div>
										</div>
										<div class="form-group row ibu_luar_desa">
											<label for="tempatlahir_pasangan" class="col-sm-3 control-label">Tempat / Tanggal Lahir </label>
											<div class="col-sm-4">
												<input class="form-control input-sm" type="text" name="tempatlahir_pasangan" id="tempatlahir_pasanganu" placeholder="Tempat Lahir Pasangan">
											</div>
											<div class="col-sm-3 col-lg-2">
												<div class="input-group input-group-sm date">
													<div class="input-group-addon">
														<i class="fa fa-calendar"></i>
													</div>
													<input title="Pilih Tanggal" class="form-control input-sm datepicker required" name="tanggallahir_pasangan" type="text" placeholder="Tgl. Lahir">
												</div>
											</div>
										</div>
										<div class="form-group row">
											<label for="wn_pasangan" class="col-sm-3 control-label">Warganegara</label>
											<div class="col-sm-8">
												<input type="text" name="wn_pasangan" class="form-control input-sm required" placeholder="Warganegara Pasangan"></input>
											</div>
										</div>
										<div class="form-group row">
											<label for="nama_ayah_pasangan" class="col-sm-3 control-label">Nama Ayah</label>
											<div class="col-sm-8">
												<input type="text" name="nama_ayah_pasangan" class="form-control input-sm required" placeholder="Nama Ayah Pasangan"></input>
											</div>
										</div>
										<div class="form-group row">
											<label for="agama_pasangan" class="col-sm-3 control-label">Agama</label>
											<div class="col-sm-8">
												<input type="text" name="agama_pasangan" class="form-control input-sm required" placeholder="Agama Pasangan"></input>
											</div>
										</div>
										<div class="form-group row">
											<label for="pekerjaan_pasangan" class="col-sm-3 control-label">Pekerjaan</label>
											<div class="col-sm-8">
												<input type="text" name="pekerjaan_pasangan" class="form-control input-sm required" placeholder="Pekerjaan Pasangan"></input>
											</div>
										</div>
										<div class="form-group row">
											<label for="alamat_pasangan" class="col-sm-3 control-label">Tempat Tinggal</label>
											<div class="col-sm-8">
												<input type="text" name="alamat_pasangan" class="form-control input-sm required" placeholder="Tempat Tinggal Pasangan"></input>
											</div>
										</div>
										<div class="form-group row subtitle_head">
											<label class="col-sm-3 text-right"><strong>PENANDA TANGAN :</strong></label>
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
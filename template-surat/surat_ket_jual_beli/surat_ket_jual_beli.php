<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="row align-items-center mb-2">
					<div class="col">
						<?php $this->load->view("surat/form/breadcrumb.php"); ?>
					</div>
					<div class="col-auto tdk-permohonan tdk-periksa">
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
									<div class="col-sm-12">
										<div class="row">
											<?php include("district-app/views/surat/form/_cari_nik.php"); ?>
										</div>
									</div>
								</form>
								<form id="validasi" action="<?= $form_action ?>" method="POST" target="_blank" class="form-surat form-horizontal">
									<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
									<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url('surat/nomor_surat_duplikat') ?>">
									<div class="col-sm-12">
										<div class="form-group row">
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
										</div>
										<div class="form-group row subtitle_head">
											<label class="col-sm-3"><strong>BARANG JUAL BELI</strong></label>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group row">
													<label for="jenis" class="col-sm-3 control-label">Jenis Barang</label>
													<div class="col-sm-8">
														<input type="text" name="jenis" class="form-control input-sm required <?= jecho($cek_anjungan['keyboard'] == 1, TRUE, 'kbvtext'); ?>" placeholder="Jenis Barang"></input>
													</div>
												</div>
												<div class="form-group row">
													<label for="barang" class="col-sm-3 control-label">Rincian Barang</label>
													<div class="col-sm-8">
														<input type="text" name="barang" class="form-control input-sm required <?= jecho($cek_anjungan['keyboard'] == 1, TRUE, 'kbvtext'); ?>" placeholder="Rincian Barang"></input>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group row subtitle_head">
											<label class="col-sm-3"><strong>IDENTITAS PEMBELI</strong></label>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group row">
													<label for="identitas" class="col-sm-3 control-label">Nomor Identitas Pembeli</label>
													<div class="col-sm-8">
														<input type="text" name="identitas" class="form-control input-sm required <?= jecho($cek_anjungan['keyboard'] == 1, TRUE, 'kbvtext'); ?>" placeholder="Nomor Identitas Pembeli"></input>
													</div>
												</div>
												<div class="form-group row">
													<label for="nama" class="col-sm-3 control-label">Nama Pembeli</label>
													<div class="col-sm-8">
														<input type="text" name="nama" class="form-control input-sm required <?= jecho($cek_anjungan['keyboard'] == 1, TRUE, 'kbvtext'); ?>" placeholder="Nama Pembeli"></input>
													</div>
												</div>
												<div class="form-group row">
													<label for="ttl" class="col-sm-3 control-label">Tempat Tanggal Lahir Pembeli</label>
													<div class="col-sm-4">
														<input id="tempatlahir" class="form-control input-sm required <?= jecho($cek_anjungan['keyboard'] == 1, TRUE, 'kbvtext'); ?>" type="text" placeholder="Tempat Lahir" name="tempatlahir">
													</div>
													<div class="col-sm-3 col-lg-2">
														<div class="input-group input-group-sm date">
															<div class="input-group-addon">
																<i class="fa fa-calendar"></i>
															</div>
															<input title="Pilih Tanggal" class="form-control input-sm datepicker required" name="tanggallahir" type="text" />
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label for="sex" class="col-sm-3 control-label">Jenis Kelamin Pembeli</label>
													<div class="col-sm-4">
														<input type="text" name="sex" class="form-control input-sm required <?= jecho($cek_anjungan['keyboard'] == 1, TRUE, 'kbvtext'); ?>" placeholder="Jenis Kelamin"></input>
													</div>
												</div>
												<div class="form-group row">
													<label for="alamat" class="col-sm-3 control-label">Alamat Pembeli</label>
													<div class="col-sm-8">
														<textarea name="alamat" class="form-control input-sm required <?= jecho($cek_anjungan['keyboard'] == 1, TRUE, 'kbvtext'); ?>" placeholder="Alamat Pembeli"></textarea>
													</div>
												</div>
												<div class="form-group row">
													<label for="pekerjaan" class="col-sm-3 control-label">Pekerjaan Pembeli</label>
													<div class="col-sm-8">
														<input type="text" name="pekerjaan" class="form-control input-sm required <?= jecho($cek_anjungan['keyboard'] == 1, TRUE, 'kbvtext'); ?>" placeholder="Pekerjaan Pembeli"></input>
													</div>
												</div>
												<div class="form-group row">
													<label for="keterangan" class="col-sm-3 control-label">Keterangan</label>
													<div class="col-sm-8">
														<textarea id="keterangan" class="form-control input-sm required <?= jecho($cek_anjungan['keyboard'] == 1, TRUE, 'kbvtext'); ?>" placeholder="Keterangan" name="keterangan"></textarea>
													</div>
												</div>
												<div class="form-group row">
													<label for="ketua_adat" class="col-sm-3 control-label">Nama Ketua Adat</label>
													<div class="col-sm-8">
														<input type="text" name="ketua_adat" class="form-control input-sm <?= jecho($cek_anjungan['keyboard'] == 1, TRUE, 'kbvtext'); ?>" placeholder="Nama Ketua Adat"></input>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group row subtitle_head tdk-permohonan">
													<label class="col-sm-3"><strong>PENANDA TANGAN</strong></label>
												</div>

												<?php include("district-app/views/surat/form/_pamong.php"); ?>

											</div>
										</div>
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
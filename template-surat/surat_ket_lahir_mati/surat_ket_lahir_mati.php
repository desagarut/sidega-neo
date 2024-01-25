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
										<?php $this->load->view("surat/form/_cari_nik.php", array('filter_sex' => 'perempuan', 'individu' => $individu, 'pemohon' => 'Ibu')); ?>
									</div>
								</form>
								<div class="col-md-12">
									<form id="validasi" action="<?= $form_action ?>" method="POST" target="_blank" class="form-surat form-horizontal">
										<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
										<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url('surat/nomor_surat_duplikat') ?>">
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
											<label for="ttl" class="col-sm-3 control-label">Hari / Tanggal Mati</label>
											<div class="col-sm-3 col-lg-4">
												<input class="form-control input-sm required hari" type="text" name="hari" id="hari" readonly="readonly" placeholder="Hari Mati" value="<?= $_SESSION['post']['hari'] ?>">
											</div>
											<div class="col-sm-3 col-lg-2">
												<div class="input-group input-group-sm date">
													<div class="input-group-addon">
														<i class="fa fa-calendar"></i>
													</div>
													<input title="Pilih Tanggal" class="form-control input-sm datepicker data_hari required" name="tanggal_mati" type="text" placeholder="Tgl. Mati" value="<?= $_SESSION['post']['tanggal_mati'] ?>" />
												</div>
											</div>
										</div>
										<div class="form-group row">
											<label for="tempat_mati" class="col-sm-3 control-label">Tempat Mati</label>
											<div class="col-sm-8">
												<input type="text" name="tempat_mati" class="form-control input-sm required" placeholder="Tempat Mati"></input>
											</div>
										</div>
										<div class="form-group row">
											<label for="kandungan" class="col-sm-3 control-label">Lama di Kandungan (Bulan)</label>
											<div class="col-sm-2">
												<input id="input_group" type="text" name="lama_kandungan" class="form-control input-sm required" placeholder="Lama Di Kandungan (Bulan)"></input>
											</div>
										</div>
										<div class="form-group row subtitle_head">
											<label class="col-sm-3"><strong>IDENTITAS PELAPOR :</strong></label>
										</div>
										<div class="form-group row">
											<label for="nama_pelapor" class="col-sm-3 control-label">Nama Pelapor</label>
											<div class="col-sm-8">
												<input type="text" name="pelapor" class="form-control input-sm required" placeholder="Nama Pelapor"></input>
											</div>
										</div>
										<div class="form-group row">
											<label for="hubungan" class="col-sm-3 control-label">Hubungan dengan yang Lahir Mati</label>
											<div class="col-sm-8">
												<input type="text" name="hubungan" class="form-control input-sm required" placeholder="Hubungan dengan yang Lahir Mati"></input>
											</div>
										</div>
										<div class="form-group row subtitle_head">
											<label class="col-sm-3"><strong>PENANDA TANGAN :</strong></label>
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
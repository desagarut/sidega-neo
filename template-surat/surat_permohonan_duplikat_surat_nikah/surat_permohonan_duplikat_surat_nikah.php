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
									<?php include("district-app/views/surat/form/_cari_nik.php"); ?>
								</form>
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
										<label for="kua" class="col-sm-3 control-label"><?= ucwords($this->setting->sebutan_kecamatan) ?> KUA</label>
										<div class="col-sm-8">
											<input id="kecamatan_kua" class="form-control input-sm required" type="text" placeholder="Kecamatan KUA" name="kecamatan_kua">
										</div>
									</div>
									<div class="form-group row">
										<label for="tgl_nikah" class="col-sm-3 control-label">Tanggal Nikah</label>
										<div class="col-sm-3 col-lg-2">
											<div class="input-group input-group-sm date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input title="Pilih Tanggal" class="form-control input-sm datepicker required" name="tgl_nikah" type="text" />
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label for="nama_pasangan" class="col-sm-3 control-label">Nama Pasangan</label>
										<div class="col-sm-8">
											<input id="nama_pasangan" class="form-control input-sm required" type="text" placeholder="Nama Pasangan" name="nama_pasangan">
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
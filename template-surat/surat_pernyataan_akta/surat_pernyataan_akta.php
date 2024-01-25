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
										<?php $this->load->view("surat/form/_cari_nik.php"); ?>
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
											<?php $this->load->view("surat/form/konfirmasi_pemohon.php"); ?>
										<?php endif; ?>
										<?php $this->load->view("surat/form/nomor_surat.php"); ?>
										<div class="form-group row subtitle_head">
											<label class="col-sm-3 text-right"><strong>PENANDA TANGAN</strong></label>
										</div>
										<?php $this->load->view("surat/form/_pamong.php"); ?>
									</div>
								</form>
							</div>
							<?php $this->load->view("surat/form/tombol_cetak.php"); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
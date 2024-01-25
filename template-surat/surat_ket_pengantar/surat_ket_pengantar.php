<!-- TODO: Pindahkan ke external css -->
<style>
	.error {
		color: #dd4b39;
	}
</style>
<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="row align-items-center mb-2">
					<div class="col">
						<?php $this->load->view("surat/form/breadcrumb.php"); ?>
					</div>
					<div class="col-auto tdk-permohonan tdk-periksa">
						<a href="<?= site_url("surat") ?>" class="btn btn-sm btn-outline-primary" title="Kembali Ke Daftar Layanan Surat">
							<i class="fa fa-arrow-circle-left "></i>Kembali Ke Daftar Layanan Surat
						</a>
					</div>
				</div>
				<div class="card shadow">
					<div class="card-header">
						<form id="main" name="main" method="POST" class="form-horizontal">
							<?php include("district-app/views/surat/form/_cari_nik.php"); ?>
							<?php if ($individu) : ?>
								<?php include("district-app/views/surat/form/konfirmasi_pemohon.php"); ?>
							<?php endif; ?>
						</form>
					</div>
					<div class="card-body">
						<div class="col-auto">
							<form id="validasi" action="<?= $form_action ?>" method="POST" target="_blank" class="form-surat form-horizontal">
								<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
								<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url('surat/nomor_surat_duplikat') ?>">
								<div class="row jar_form">
									<label for="nomor" class="col-sm-3"></label>
									<div class="col-sm-8">
										<input class="required" type="hidden" name="nik" value="<?= $individu['id'] ?>">
									</div>
								</div>
								<?php include("district-app/views/surat/form/nomor_surat.php"); ?>
								<div class="form-group row">
									<label for="keperluan" class="col-sm-3 control-label">Keperluan</label>
									<div class="col-sm-8">
										<textarea name="keperluan" id="keperluan" class="form-control input-sm required <?= jecho($cek_anjungan['keyboard'] == 1, TRUE, 'kbvtext'); ?>" placeholder="Keperluan"></textarea>
									</div>
								</div>
								<div class="form-group row">
									<label for="keterangan" class="col-sm-3 control-label">Keterangan</label>
									<div class="col-sm-8">
										<textarea name="keterangan" id="keterangan" class="form-control input-sm required <?= jecho($cek_anjungan['keyboard'] == 1, TRUE, 'kbvtext'); ?>" placeholder="Keterangan"></textarea>
										<span class="input-group-append">
									</div>
								</div>
								<?php include("district-app/views/surat/form/tgl_berlaku.php"); ?>
								<?php include("district-app/views/surat/form/_pamong.php"); ?>
								<?php include("district-app/views/surat/form/tampil_foto.php"); 
								?>
							</form>
						</div>
					</div>
					<?php include("district-app/views/surat/form/tombol_cetak.php"); ?>
				</div>
			</div>
		</div>
	</div>
</main>
<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">Pengelolaan Data RT</h5>
				<div class="card shadow">
					<div class="card-header">
						<a href="<?= site_url("sid_core/sub_rt/$id_dusun/$id_rw") ?>" class="btn btn-sm btn-outline-info mb-1" title="Kembali Ke Daftar RT">Kembali ke Daftar RT</a>
					</div>
					<form id="validasi" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
						<div class="card-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group row">
										<label class="col-sm-3 control-label" for="rt">RT</label>
										<div class="col-sm-7">
											<input id="rt" class="form-control input-sm digits required" type="text" placeholder="Nomor RT" name="rt" value="<?= $rt ?>">
										</div>
									</div>
								</div>
								<?php if ($rt) : ?>
									<div class="col-sm-12">
										<div class="form-group row">
											<label class="col-sm-3 control-label" for="kepala_lama">Ketua RT Sebelumnya</label>
											<div class="col-sm-7">
												<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
													<strong> <?= $individu['nama'] ?></strong>
													<br />NIK - <?= $individu['nik'] ?>
												</p>
											</div>
										</div>
									</div>
								<?php endif; ?>
								<div class="col-sm-12">
									<div class="form-group row">
										<label class="col-sm-3 control-label" for="id_kepala">Ketua RT</label>
										<div class="col-sm-7">
											<select class="form-control select2 input-sm" style="width: 100%;" id="id_kepala" name="id_kepala">
												<option selected="selected">-- Silakan Masukan NIK / Nama--</option>
												<?php foreach ($penduduk as $data) : ?>
													<option value="<?= $data['id'] ?>">NIK :<?= $data['nik'] . " - " . $data['nama'] . " - " . $data['dusun'] ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class='card-footer'>
							<div class="col-md-12">
								<button type='reset' class='btn btn-outline-danger btn-sm mb-1'><i class='fe fe-x'></i> Batal</button>
								<button type='submit' class='btn btn-success btn-sm mb-1'><i class='fe fe-check'></i> Simpan</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>
<script src="<?= base_url() ?>assets/js/validasi.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/js/localization/messages_id.js"></script>
<script type="text/javascript">
	setTimeout(function() {
		$('#rt').rules('add', {
			maxlength: 10
		})
	}, 500);
</script>
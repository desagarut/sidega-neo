<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">Form <?= ucwords($this->setting->sebutan_dusun) ?></h5>
				<div class="card shadow">
					<div class="card-header">
						<a href="<?= site_url("sid_core") ?>" class="btn btn-outline-info btn-sm mb-1" title="Kembali Ke Daftar Wilayah <?= ucwords($this->setting->sebutan_dusun) ?>">Kembali Ke <?= ucwords($this->setting->sebutan_dusun) ?></a>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<form id="validasi" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
									<div class="card-body">
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group row">
													<label class="col-sm-3 control-label" for="dusun">Nama <?= ucwords($this->setting->sebutan_dusun) ?></label>
													<div class="col-sm-7">
														<input id="dusun" class="form-control input-sm nama_terbatas required" maxlength="100" type="text" placeholder="Nama  <?= ucwords($this->setting->sebutan_dusun) ?>" name="dusun" value="<?= $dusun ?>">
													</div>
												</div>
											</div>
											<?php if ($dusun) : ?>
												<div class="col-sm-12">
													<div class="form-group row">
														<label class="col-sm-3 control-label" for="kepala_lama">Kepala <?= ucwords($this->setting->sebutan_dusun) ?> Sebelumnya</label>
														<div class="col-sm-7">
															<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
																<strong><?= $individu["nama"] ?></strong>
																<br />NIK - <?= $individu["nik"] ?>
															</p>
														</div>
													</div>
												</div>
											<?php endif; ?>
											<div class="col-sm-12">
												<div class="form-group row">
													<label class="col-sm-3 control-label" for="id_kepala">NIK / Nama Kepala <?= ucwords($this->setting->sebutan_dusun) ?></label>
													<div class="col-sm-7">
														<select class="form-control select2" style="width: 100%;" id="id_kepala" name="id_kepala">
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
									<div class="card-footer">
										<div class="col-md-12">
											<button type='reset' class='btn btn-danger btn-sm mb-1'><i class='fe fe-x'></i> Reset</button>
											<button type='submit' class='btn btn-success btn-sm mb-1 text-right'><i class='fe fe-check'></i> Simpan</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
	</div>
</main>
<script src="<?= base_url() ?>assets/js/validasi.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/js/localization/messages_id.js"></script>
<script type="text/javascript">
	setTimeout(function() {
		$('#dusun').rules('add', {
			maxlength: 50
		})
	}, 500);
</script>
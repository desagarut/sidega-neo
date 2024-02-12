<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">Pengelolaan Data RW</h5>
				<div class="card shadow">
					<div class="card-header">
						<a href="<?= site_url("sid_core/sub_rw/$id_dusun") ?>" class="btn btn-sm btn-outline-info mb-1" title="Kembali Ke Daftar RW"> Kembali ke Daftar RW</a>
					</div>
					<form id="validasi" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
						<div class="card-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group row">
										<label class="col-sm-3 control-label" for="rw">Nama RW</label>
										<div class="col-sm-7">
											<?php if ($id_rw) : ?>
												<input type="hidden" name="id_rw" value="<?= $id_rw ?>">
											<?php endif; ?>
											<input id="rw" class="form-control input-sm nama_terbatas required" maxlength="100" type="text" placeholder="Nama RW" name="rw" value="<?= $rw ?>">
										</div>
									</div>
								</div>
								<?php if ($rw) : ?>
									<div class="col-sm-12">
										<div class="form-group row">
											<label class="col-sm-3 control-label" for="kepala_lama">Kepala RW Sebelumnya</label>
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
										<label class="col-sm-3 control-label" for="id_kepala">NIK / Nama Kepala RW</label>
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
						<div class='card-footer'>
							<div class="col-md-12">
								<button type='reset' class='btn btn-outline-danger btn-sm mb-1'><i class='fe fe-x'></i> Reset</button>
								<button type='submit' class='btn btn-success btn-sm mb-1'><i class='fe fe-check'></i> Simpan</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>
<script src="<?= base_url() ?>assets/
js/validasi.js"></script>
<script src="<?= base_url() ?>assets/
js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/
js/localization/messages_id.js"></script>
<script type="text/javascript">
	setTimeout(function() {
		$('#rw').rules('add', {
			maxlength: 10
		})
	}, 500);
</script>
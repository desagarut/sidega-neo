<script type="text/javascript" src="<?= base_url() ?>assets/js/script.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/validasi.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/messages_id.js"></script>
<form action="<?= $form_action ?>" method="post" id="validasi">
	<div class="modal-body">
		<div class="row">
			<div class="col-sm-12">
				<div class="card shadow">
					<div class="card-body">
						<div class="form-group">
							<label class="control-label">Tahun Laporan</label>
							<select class="form-control input-sm jenis_link" name="tahun">>
								<option value="">Pilih Tahun Laporan</option>
								<?php foreach ($tahun_laporan as $tahun) : ?>
									<option value="<?= $tahun['tahun'] ?>"><?= $tahun['tahun'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label">Pamong tertanda</label>
							<select class="form-control input-sm jenis_link" name="pamong_ttd">
								<option value="">Pilih Staf Penandatangan</option>
								<?php foreach ($pamong as $data) : ?>
									<option value="<?= $data['pamong_nama'] ?>" data-jabatan="<?= trim($data['jabatan']) ?>" <?php if (strpos(strtolower($data['jabatan']), 'sekretaris') !== false) : ?> selected <?php endif; ?>><?= $data['pamong_nama'] ?>(<?= $data['jabatan'] ?>)</option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label">Pamong mengetahui</label>
							<select class="form-control input-sm jenis_link" name="jabatan_ketahui">
								<option value="">Pilih Staf Mengetahui</option>
								<?php foreach ($pamong as $data) : ?>
									<option value="<?= $data['pamong_nama'] ?>" data-jabatan="<?= trim($data['jabatan']) ?>" <?php if (strpos(strtolower($data['jabatan']), 'kepala') !== false and strpos(strtolower($data['jabatan']), 'dusun') === false) : ?>selected<?php endif; ?>><?= $data['pamong_nama'] ?>(<?= $data['jabatan'] ?>)</option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="reset" class="btn btn-outline-danger btn-sm btn-sm " data-dismiss="modal"><i class='fe fe-sign-out'></i> Tutup</button>
			<button type="submit" class="btn btn-info btn-sm" id="ok">
				<?php if (strpos($form_action, '/cetak') !== false) : ?>
					<i class='fe fe-printer'></i> Cetak
				<?php else : ?>
					<i class='fe fe-download'></i> Unduh
				<?php endif; ?>
			</button>
		</div>
	</div>
</form>
<script type="text/javascript"></script>
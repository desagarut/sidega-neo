<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<script src="<?= base_url()?>assets/js/jquery.validate.min.js"></script>
<script src="<?= base_url()?>assets/js/validasi.js"></script>
<script src="<?= base_url()?>assets/js/localization/messages_id.js"></script>
<script>
	$('document').ready(function() {
		$('#validasi').submit(function() {
			if ($('#validasi').valid())
				$('#modalBox').modal('hide');
		});
	});
</script>
<form action="<?= $form_action?>" method="post" id="validasi" target="_blank">
	<input type="hidden" name="tahun">
	<input type="hidden" name="bulan">
	<div class="modal-body">
		<div class="form-group">
			<label for="pamong_ttd">Laporan Ditandatangani</label>
			<select class="form-control input-sm required" name="pamong_ttd">
				<option value="">Pilih Staf Pemerintah <?= ucwords($this->setting->sebutan_desa)?></option>
				<?php foreach ($pamong AS $data): ?>
					<option value="<?= $data['pamong_id']?>" <?= selected($data['pamong_ttd'], 1); ?>><?= $data['nama']?> (<?= $data['jabatan']?>)</option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group">
			<label for="laporan_no">Laporan No.</label>
			<input id="laporan_no" class="form-control input-sm required" type="text" placeholder="Laporan No." name="laporan_no" value="">
		</div>
	</div>
	<div class="modal-footer">
		<button type="reset" class="btn btn-outline-danger btn-sm btn-sm " data-dismiss="modal"><i class='fe fe-sign-out'></i> Tutup</button>
		<button type="submit" class="btn btn-info btn-sm" id="ok"><i class='fe fe-check'></i> <?= ucwords($aksi); ?></button>
	</div>
</form>

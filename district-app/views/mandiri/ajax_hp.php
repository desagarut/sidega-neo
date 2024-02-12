<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<style type="text/css">
	#ubah_hp th { width: 20%; }
</style>

<?php $this->load->view('global/validasi_form'); ?>
<form action="<?= $form_action; ?>" method="post" class="form-validasi">
	<div class="modal-body" id="ubah_hp">
		<table class="table table-hover" >
			<tr>
				<th>NIK</td>
				<td> : <?= $penduduk['nik']?></td>
			</tr>
			<tr>
				<th>Nama Warga</td>
				<td> : <?= $penduduk['nama']?></td>
			</tr>
		</table>
		<div class="box box-danger">
			<div class="box-body">
				<div class="form-group">
					<label class="control-label" for="telepon">Nomor Telepon</label>
					<input name="telepon" class="form-control input-sm digits" minlength="8" maxlength="16" type="text" placeholder="No. HP Warga" value="<?= $penduduk['telepon'] ?>"></input>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="reset" class="btn btn-outline-danger btn-sm btn-sm pull-left"><i class='fe fe-times'></i> Batal</button>
		<button type="submit" class="btn btn-info btn-sm" id="ok"><i class='fe fe-check'></i> Simpan</button>
	</div>
</form>

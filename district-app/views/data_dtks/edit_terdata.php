<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<form action="<?= $form_action; ?>" method="post" id="validasi" enctype="multipart/form-data">
	<div class='modal-body'>
		<table class="table table-bordered table-striped table-hover table-rincian">
			<tbody>
				<tr>
					<td width="20%"><?= $judul_terdata_nama; ?></td>
					<td width="1">:</td>
					<td><?= $terdata_nama; ?></td>
				</tr>
				<tr>
					<td><?= $judul_terdata_info; ?></td>
					<td>:</td>
					<td><?= $terdata_info; ?></td>
				</tr>
			</tbody>
		</table>
		<div class="form-group">
			<label for="id_dtks">ID DTKS</label>
			<input name="id_dtks" id="id_dtks" class="form-control input-sm" maxlength="100" placeholder="ID DTKS"><?= $id_dtks?></input>
			<input name="id_dtks" class="form-control input-sm" maxlength="100" type="text" value="<?= $id_dtks ?>"></input>
		</div>
		<div class="form-group">
			<label for="keterangan_padan">Keterangan Padan</label>
			<input name="keterangan_padan" class="form-control input-sm" maxlength="100" type="text" value="<?= $keterangan_padan ?>"></input>
		</div>

		<div class="form-group">
			<label for="keterangan_bantuan">Keterangan Bantuan</label>
			<input type="hidden" name="id_data_dtks" value="<?= $id_data_dtks?>"/>
			<textarea name="keterangan_bantuan" id="keterangan_bantuan" class="form-control input-sm" maxlength="100" placeholder="Keterangan Bantuan" rows="5"><?= $keterangan_bantuan?></textarea>
		</div>

	</div>
	<div class="modal-footer">
		<button type="reset" class="btn btn-outline-danger btn-sm btn-sm pull-left"><i class="fe fe-times"></i> Batal</button>
		<button type="submit" class="btn btn-info btn-sm pull-right"><i class='fe fe-check'></i> Simpan</button>
	</div>
</form>

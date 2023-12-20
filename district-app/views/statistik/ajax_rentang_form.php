<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<script src="<?= base_url('assets/js/jquery.validate.min.js')?>"></script>
<script src="<?= base_url('assets/js/validasi.js')?>"></script>
<script src="<?= base_url('assets/js/localization/messages_id.js')?>"></script>
<form action="<?= $form_action?>" method="post" id="validasi">
	<div class='modal-body'>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-12">
					<label for="nama">Rentang Umur</label>
				</div>
				<div class="col-xs-6">
					<input class="form-control input-sm required bilangan" type="text" placeholder="Dari" id="dari" name="dari" value="<?= $rentang['dari']?>"></input>
				</div>
				<div class="col-xs-6">
					<input id="sampai" class="form-control input-sm required bilangan" type="text" placeholder="Sampai" name="sampai" value="<?= $rentang['sampai']?>"></input>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="reset" class="btn btn-danger btn-sm" data-dismiss="modal"><i class='fe fe-sign-out'></i> Tutup</button>
		<button type="submit" class="btn btn-info btn-sm" id="ok"><i class='fe fe-check'></i> Simpan</button>
	</div>
</form>

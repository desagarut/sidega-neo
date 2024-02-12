<script type="text/javascript" src="<?= base_url()?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/validasi.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/localization/messages_id.js"></script>
<form action="<?= $form_action?>" method="post" id="validasi">
	<div class='modal-body'>
		<div class="row">
			<div class="col-sm-12">
				<div class="box box-danger">
					<div class="box-body">
						<div class="form-group">
							<label class="control-label" for="nama">Nama Kategori</label>
							<input name="kategori" class="form-control input-sm required nomor_sk" maxlength="50" type="text" value="<?=$subkategori['kategori']?>"></input>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="reset" class="btn btn-outline-danger btn-sm btn-sm " data-dismiss="modal"><i class='fe fe-sign-out'></i> Tutup</button>
			<button type="submit" class="btn btn-info btn-sm" id="ok"><i class='fe fe-check'></i> Simpan</button>
		</div>
	</div>
</form>

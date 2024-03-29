<script type="text/javascript" src="<?= base_url()?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/validasi.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/localization/messages_id.js"></script>
<style>
	.form-group {
		margin-bottom: 10px;
	}
</style>
<form method="post" action="<?= $form_action?>" id="validasi">
	<div class='modal-body'>
		<div class="box box-danger">
			<div class="box-body">
				<div class="row">
					<div class="col-sm-12">
						<label for="nama">Kumpulan KK</label>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<textarea class="form-control input-sm kumpulan_nik_kk" maxlength="340" type="text"
								placeholder="Isi maks 20 No. KK, dengan pemisah koma (,). Contoh: 5201140211117003, 5201140210137022" name="kumpulan_kk"
								rows="4"><?= $kumpulan_kk?></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="reset" class="btn btn-outline-danger btn-sm btn-sm " data-dismiss="modal"><i
				class='fe fe-sign-out'></i> Tutup</button>
		<button type="submit" class="btn btn-info btn-sm" id="ok"><i class='fe fe-check'></i>
			Simpan</button>
	</div>
</form>
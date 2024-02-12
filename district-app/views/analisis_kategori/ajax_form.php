<script type="text/javascript" src="<?= base_url()?>assets/js/jquery.validate.min.js"></script>

<script type="text/javascript" src="<?= base_url()?>assets/js/validasi.js"></script>

<script type="text/javascript" src="<?= base_url()?>assets/js/localization/messages_id.js"></script>

<form id="validasi" action="<?= $form_action?>" method="post">

	<div class='modal-body'>

		<div class="row">

			<div class="col-sm-12">

				<div class="box-body">

					<div class="form-group">

						<label class="control-label" for="kategori">Nama Kategori/Variabel 	</label>

						<input  id="kategori" class="form-control input-sm required nomor_sk" maxlength="50" type="text" placeholder="Kategori Indikator" name="kategori" value="<?= $analisis_kategori['kategori']?>">

					</div>

				</div>

			</div>

		</div>

	</div>

	<div class="modal-footer">

		<button type="reset" class="btn btn-outline-danger btn-sm btn-sm " data-dismiss="modal"><i class='fe fe-sign-out'></i> Tutup</button>

		<button type="submit" class="btn btn-info btn-sm" id="ok"><i class='fe fe-check'></i> Simpan</button>

	</div>

</form>




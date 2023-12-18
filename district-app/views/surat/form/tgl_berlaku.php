							<div class="form-group row">
								<label for="berlaku_dari" class="col-sm-3 control-label">Berlaku Dari - Sampai</label>
								<div class="col-sm-4 col-lg-2">
									<input class="form-control required readonly-permohonan" id="tgl_mulai" type="date" name="berlaku_dari">
									<!--		<input title="Pilih Tanggal" id="tgl_mulai" class="form-control input-sm required readonly-permohonan" name="berlaku_dari" type="text" />-->
								</div>
								<div class="col-sm-4 col-lg-2">
									<input class="form-control required readonly-permohonan" id="tgl_akhir" type="date" name="berlaku_sampai" data-masa-berlaku="<?= $masa_berlaku['masa_berlaku'] ?>" data-satuan-masa-berlaku="<?= $masa_berlaku['satuan_masa_berlaku'] ?>" />
									<!--<input title="Pilih Tanggal" id="tgl_akhir" class="form-control input-sm required readonly-permohonan" name="berlaku_sampai" type="text" data-masa-berlaku="<?= $masa_berlaku['masa_berlaku'] ?>" data-satuan-masa-berlaku="<?= $masa_berlaku['satuan_masa_berlaku'] ?>" />-->
								</div>
							</div>

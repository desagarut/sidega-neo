<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="col-md-12">
	<div class="form-group row">
		<label class="control-label col-sm-4" for="nama">Kategori Informasi Publik</label>
		<div class="col-sm-8">
			<select name="kategori_info_publik" class="form-control select2 input-sm required">
				<option value="">Pilih Kategori Informasi Publik</option>
				<?php foreach ($list_kategori_publik as $key => $value) : ?>
					<option value="<?= $key ?>" <?= selected($dokumen['kategori_info_publik'], $key) ?>><?= $value ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label class="control-label col-sm-4" for="nama">Tahun</label>
		<div class="col-sm-4">
			<input name="tahun" maxlength="4" class="form-control input-sm number required" type="text" placeholder="Contoh: 2024" value="<?= $dokumen['tahun'] ?>"></input>
		</div>
	</div>
</div>
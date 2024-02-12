<div class="col-md-3">
	<?php if (!$kk_baru) : ?>
		<input name="no_kk" type="hidden" value="<?= $penduduk['no_kk'] ?>">
	<?php endif; ?>
	<div class="card shadow">
		<div class="card-body card-profile">
			<div class="avatar avatar-xl text-center">
				<img class="avatar-img rounded-circle" src="<?= AmbilFoto($penduduk['foto'], '', $penduduk['id_sex']) ?>" alt="Foto Penduduk">

			</div>
			<br />
			<p class="text-muted text-center"> (Kosongkan jika tidak ingin mengubah foto)</p>
			<br />
			<div class="input-group input-group-sm">
				<input type="text" class="form-control" id="file_path" name="foto">
				<input type="file" class="hidden" id="file" name="foto">
				<input type="hidden" name="old_foto" value="<?= $penduduk['foto'] ?>">
				<span class="input-group-btn">
					<button type="button" class="btn btn-primary btn-box" id="file_browser"><i class="fe fe-search"></i> Browse</button>
				</span>
			</div>
		</div>
	</div>
</div>
<div class="col-md-9">
	<div class="card shadow">
		<div class="card-body">
			<?php $this->load->view('sid/kependudukan/penduduk_form_isian_bersama'); ?>
		</div>
		<?php if ($penduduk['status_dasar_id'] == 1 || !isset($penduduk['status_dasar_id'])) : ?>
			<div class="card-footer">

				<div class="col-md-12">
					<button type='reset' class='btn btn-outline-danger btn-sm ajax'><i class='fe fe-times'></i> Batal</button>
					<button type='submit' class='btn btn-primary btn-sm pull-right ajax'><i class='fe fe-check'></i> Simpan</button>
				</div>
			</div>
		<?php endif; ?>
		<div class="modal fade" id="rumah-penduduk" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class='modal-dialog'>
				<div class='modal-content'>
					<div class='modal-header'>
						<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
						<h4 class='modal-title' id='myModalLabel'><i class='fe fe-exclamation-triangle text-red'></i> Cari Lokasi Tempat Tinggal</h4>
					</div>
					<div class="fetched-data"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="card shadow">
	<div class="card-body">
		<img class="penduduk profile-user-img img-responsive img-circle" id="foto" src="<?= AmbilFoto($foto, '', $id_sex); ?>" alt="Foto">
		<br/>
		<div class="input-group input-group-sm text-center">
			<input type="file" class="hidden" id="file" name="foto">
			<input type="text" class="hidden" id="file_path" name="foto">
			<input type="hidden" name="old_foto" id="old_foto" value="<?= $foto; ?>">
			<span class="input-group-btn">
				<button type="button" class="btn btn-info btn-flat"  id="file_browser"><i class="fe fe-upload"></i> Unggah</button>
				<button type="button" class="btn btn-danger btn-flat" onclick="kamera();"><i class="fe fe-camera"></i> Kamera</button>
			</span>
		</div>
	</div>
</div>

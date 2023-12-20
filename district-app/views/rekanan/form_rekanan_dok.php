<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Form Dokumen Rekanan</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda') ?>"><i class="fe fe-home"></i> Home</a></li>
			<li><a href="<?= site_url('rekanan') ?>"><i class="fe fe-dashboard"></i> Daftar Album</a></li>
			<li><a href='<?= site_url("rekanan/dokumen_rekanan/$album") ?>'><i class="fe fe-dashboard"></i> Daftar Gambar Album</a></li>
			<li class="active">Form Dokumen Rekanan</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="validasi" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
			<div class="row">
				<div class="col-md-12">
					<div class="card shadow">
						<div class="card-header">
							<a href="<?= site_url("rekanan/dokumen_rekanan/$album") ?>" class="btn btn-sm btn-outline-info mb-1"title="Tambah Artikel">
								<i class="fe fe-arrow-circle-left "></i>Kembali ke Daftar Gambar Album
							</a>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label class="control-label col-sm-4" for="nama_rekanan">Nama Gambar</label>
								<div class="col-sm-6">
									<input name="nama_rekanan" class="form-control input-sm nomor_sk" maxlength="50" type="text" value="<?= $rekanan['nama_rekanan'] ?>"></input>
								</div>
							</div>
							<?php if ($rekanan['gambar']) : ?>
								<div class="form-group">
									<label class="control-label col-sm-4" for="nama_rekanan"></label>
									<div class="col-sm-6">
										<input type="hidden" name="old_gambar" value="<?= $rekanan['gambar'] ?>">
										<img class="attachment-img img-responsive img-circle" src="<?= AmbilGaleri($rekanan['gambar'], 'sedang') ?>" alt="Gambar Album">
									</div>
								</div>
							<?php endif; ?>
							<div class="form-group">
								<label class="control-label col-sm-4" for="upload">Unggah Gambar</label>
								<div class="col-sm-6">
									<div class="input-group input-group-sm">
										<input type="text" class="form-control <?php !($rekanan['gambar']) and print('required') ?>" id="file_path">
										<input id="file" type="file" class="hidden" name="gambar">
										<span class="input-group-btn">
											<button type="button" class="btn btn-info btn-box" id="file_browser"><i class="fe fe-search"></i> Browse</button>
										</span>
									</div>
									<?php $upload_mb = max_upload(); ?>
									<p><label class="control-label">Batas maksimal pengunggahan berkas <strong><?= $upload_mb ?> MB.</strong></label></p>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<div class="col-md-12">
								<button type='reset' class='btn btn-danger btn-sm'><i class='fe fe-times'></i> Batal</button>
								<button type='submit' class='btn btn-info btn-sm pull-right confirm'><i class='fe fe-check'></i> Simpan</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
</div>
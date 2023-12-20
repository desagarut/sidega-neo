<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Form Video</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda') ?>"><i class="fe fe-home"></i> Home</a></li>
			<li><a href="<?= site_url('gallery') ?>"><i class="fe fe-dashboard"></i> Daftar Album</a></li>
			<li><a href='<?= site_url("gallery_youtube/sub_gallery/$album") ?>'><i class="fe fe-dashboard"></i> Daftar Gambar Album</a></li>
			<li class="active">Form Video</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="validasi" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
			<div class="row">
				<div class="col-md-12">
					<div class="card shadow">
						<div class="card-header">
							<a href="<?= site_url("gallery_youtube/sub_gallery/$album") ?>" class="btn btn-sm btn-outline-info mb-1"title="Tambah Artikel">
								<i class="fe fe-arrow-circle-left "></i>Back
							</a>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label class="control-label col-sm-4" for="nama">Nama Video</label>
								<div class="col-sm-6">
									<input name="nama" class="form-control input-sm" maxlength="100" type="text" value="<?= $gallery['nama'] ?>"></input>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4" for="link">Link Youtube</label>
								<div class="col-sm-6">
									<div class="box-body text-center">
										<iframe height="160px" width="250px" class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $gallery["link"]; ?>" title="<?= $gallery['nama'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									</div>
									<input name="link" class="form-control" maxlength="100" type="text" value="<?= $gallery['link'] ?>"></input>
									<code>masukan kode embed video, Contoh: 7APs5ZduJ-0</code>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4" for="deskripsi">Deskripsi</label>
								<div class="col-sm-6">
								<textarea class="textarea" name="deskripsi" placeholder="Deskripsi video"
                          style="width: 100%; height: 200px; font-size: 12px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" type="text" value="<?= $gallery['deskripsi'] ?>"><?= $gallery['deskripsi'] ?></textarea>
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
<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="row align-items-center mb-2">
					<div class="col">
						<h2 class="h5 page-title">Form Klasifikasi Surat</h2>
					</div>
					<div class="col-auto">
						<form class="form-inline">
							<div class="form-group row">
								<a href="<?= site_url() . $this->controller . '/index/' . $kat ?>" class="btn btn-sm btn-outline-info mb-1" title="Kembali Ke Daftar Klasifikasi Surat">
									<i class="fe fe-arrow-circle-left "></i>Kembali Ke Daftar Klasifikasi Surat
								</a>
							</div>
						</form>
					</div>
				</div>
				<form id="validasi" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
					<div class="row">
						<div class="col-md-12">
							<div class="card card-shadow">
								<div class="card-body">
									<div class="form-group row">
										<label class="control-label col-sm-4" for="kode">Kode</label>
										<div class="col-sm-8">
											<input name="kode" class="form-control input-sm bilangan_titik required" type="text" placeholder="Kode" value="<?= $data['kode'] ?>"></input>
										</div>
									</div>
									<div class="form-group row">
										<label class="control-label col-sm-4" for="nama">Nama</label>
										<div class="col-sm-8">
											<input name="nama" class="form-control input-sm required" type="text" placeholder="Nama" value="<?= $data['nama'] ?>"></input>
										</div>
									</div>
									<div class="form-group row">
										<label class="control-label col-sm-4" for="uraian">Keterangan</label>
										<div class="col-sm-8">
											<textarea name="uraian" class="form-control input-sm required" placeholder="Keterangan"><?= $data['uraian'] ?></textarea>
										</div>
									</div>
								</div>
								<div class='card-footer text-center'>
									<div class='col-md-12'>
										<button type='reset' class='btn btn-danger btn-sm'><i class='fe fe-x'></i> Batal</button>
										<button type='submit' class='btn btn-info btn-sm confirm'><i class='fe fe-check'></i> Simpan</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
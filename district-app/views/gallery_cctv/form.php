<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Form CCTV <?= ucfirst($this->setting->sebutan_desa) ?></h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda') ?>"><i class="fe fe-home"></i> Home</a></li>
			<li><a href="<?= site_url('gallery_cctv') ?>">CCTV <?= ucfirst($this->setting->sebutan_desa) ?></a></li>
			<li class="active">Form</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="validasi" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
			<div class="row">
				<div class="col-md-3">
					<?php $this->load->view('gallery_cctv/menu') ?>
				</div>
				<div class="col-md-9">
					<div class="card shadow">
						<div class="card-header">
							<a href="<?= site_url("gallery_cctv") ?>" class="btn btn-sm btn-outline-info mb-1"title="Tambah Artikel">
								<i class="fe fe-arrow-circle-left "></i>Kembali
							</a>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label class="control-label col-sm-4" for="nama">Nama CCTV</label>
								<div class="col-sm-6">
									<input name="nama" class="form-control input-sm" maxlength="100" type="text" value="<?= $gallery_cctv['nama'] ?>"></input>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4" for="link">URL CCTV</label>
								<div class="col-sm-6">
									<div class="box-body text-center border">
										<iframe width="250" height="160" src="<?= $gallery_cctv["link"]; ?>" frameborder="0" allowfullscreen></iframe>
									</div>
									<input name="link" class="form-control input-sm" maxlength="100" type="text" value="<?= $gallery_cctv['link'] ?>"></input>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4" for="deskripsi">Deskripsi</label>
								<div class="col-sm-6">
									<textarea class="textarea" name="deskripsi" placeholder="Deskripsi video" style="width: 100%; height: 200px; font-size: 12px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" value="<?= $gallery_cctv['deskripsi'] ?>"><?= $gallery_cctv['deskripsi'] ?></textarea>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<div class="col-md-12">
								<button type='reset' class='btn btn-outline-danger btn-sm '><i class='fe fe-times'></i> Batal</button>
								<button type='submit' class='btn btn-info btn-sm pull-right confirm'><i class='fe fe-check'></i> Simpan</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
</div>
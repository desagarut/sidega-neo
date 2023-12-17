<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1><?= empty($data) ? 'Tambah' : 'Ubah'?> Klasifikasi Surat</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li><a href="<?= site_url().$this->controller.'/index'?>"><i class="fe fe-dashboard"></i> Daftar Klasifikasi Surat</a></li>
			<li class="active"><?= empty($data) ? 'Tambah' : 'Ubah'?> Klasifikasi Surat</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="validasi" action="<?= $form_action?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-shadow">
            <div class="box-header with-border">
							<a href="<?= site_url().$this->controller.'/index/'.$kat?>" class="btn btn-sm btn-outline-info mb-1" title="Tambah Artikel">
								<i class="fe fe-arrow-circle-left "></i>Kembali Ke Daftar Klasifikasi Surat
            	</a>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label class="control-label col-sm-4" for="kode">Kode</label>
								<div class="col-sm-6">
									<input name="kode" class="form-control input-sm bilangan_titik required" type="text" placeholder="Kode" value="<?=$data['kode']?>"></input>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4" for="nama">Nama</label>
								<div class="col-sm-6">
									<input name="nama" class="form-control input-sm required" type="text"placeholder="Nama" value="<?=$data['nama']?>"></input>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4" for="uraian">Keterangan</label>
								<div class="col-sm-6">
									<textarea name="uraian" class="form-control input-sm required" placeholder="Keterangan" ><?= $data['uraian']?></textarea>
								</div>
							</div>
						</div>
						<div class='box-footer'>
							<div class='col-md-12'>
								<button type='reset' class='btn btn-social btn-box btn-danger btn-sm' ><i class='fe fe-times'></i> Batal</button>
								<button type='submit' class='btn btn-social btn-box btn-info btn-sm pull-right confirm'><i class='fe fe-check'></i> Simpan</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
</div>

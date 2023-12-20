<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Pengaturan Kategori Tipe Garis</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li><a href="<?= site_url('line')?>"><i class="fe fe-dashboard"></i> Daftar Tipe Garis</a></li>
			<li class="active">Pengaturan Kategori Tipe Garis</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
	<form id="validasi" action="<?= $form_action?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
			<div class="row">
				<div class="col-md-3">
          <?php $this->load->view('plan/nav.php')?>
				</div>
				<div class="col-md-9">
					<div class="card shadow">
            <div class="card-header">
							<a href="<?= site_url("line")?>" class="btn btn-sm btn-outline-info mb-1" title="Tambah Artikel">
								<i class="fe fe-arrow-circle-left "></i>Kembali ke Daftar Tipe Garis
            	</a>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label class="control-label col-sm-3">Nama Jenis Garis</label>
								<div class="col-sm-7">
									<input name="nama" class="form-control input-sm nomor_sk required" maxlength="100" type="text" value="<?=$line['nama']?>"></input>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Warna</label>
								<div class="col-sm-4">
									<div class="input-group my-colorpicker2">
										<input type="text" id="color" name="color" class="form-control input-sm required" placeholder="#FFFFFF" value="<?=  $line['color']?>">
										<div class="input-group-addon input-sm">
											<i></i>
										</div>
									</div>
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


<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Pengaturan Dokumen Persyaratan Surat</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li><a href="<?= site_url('surat_mohon')?>"> Dokumen Persyaratan Surat</a></li>
			<li class="active">Pengaturan Dokumen Persyaratan Surat</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card shadow">
					<div class="card-header">
						<a href="<?=site_url("surat_mohon")?>" class="btn btn-info btn-sm btn-sm ">
							<i class="fe fe-arrow-circle-left "></i>Kembali ke Dokumen Persyaratan Surat
           	</a>
					</div>
					<div class="box-body">
						<form id="validasi" action="<?= $form_action?>" method="POST" enctype="multipart/form-data"  class="form-horizontal">
							<div class="box-body">
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label class="col-sm-3 control-label" >Nama Dokumen</label>
											<div class="col-sm-8">
													<input type="text" class="form-control input-sm required" id="ref_syarat_nama" name="ref_syarat_nama" placeholder="Nama Dokumen" value="<?= $ref_syarat_surat['ref_syarat_nama']?>"/>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="box-footer">
								<div class="col-xs-12">
									<button type="reset" class="btn btn-danger btn-sm"><i class="fe fe-times"></i> Batal</button>
									<button type="submit" class="btn btn-info btn-sm pull-right"><i class="fe fe-check"></i> Simpan</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

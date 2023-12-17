<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Pengaturan SMS</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li class="active">Pengaturan SMS</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="validasi" action="<?=$form_action?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
			<div class="row">
				<div class="col-md-3">
					<div class="card card-shadow">
						<div class="box-header with-border">
							<h3 class="box-title">SMS</h3>
							<div class="box-tools">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fe fe-minus"></i></button>
							</div>
						</div>
						<div class="box-body no-padding">
							<ul class="nav nav-pills nav-stacked">
								<li class="active"><a href="<?= site_url('sms/setting')?>"><i class="fe fe-inbox"></i> Pengaturan Balas Otomatis</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="card card-shadow">
						<div class="box-body">
							<div class="row">
								<div class="col-sm-12">
								  <div class="form-group">
									<label class="col-sm-3 control-label" for="pesan">Isi Pesan Autoreply</label>
									<div class="col-sm-8">
									  <textarea id="autoreply_text" name="autoreply_text" class="form-control input-sm required" maxlength="160" placeholder="Isi Pesan Autoreply"><?php if ($main): ?><?=$main['autoreply_text'];?><?php endif ?></textarea>
									</div>
								  </div>
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


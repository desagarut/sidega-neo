
	<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Pengaturan Komentar</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li class="active">Pengaturan Komentar</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="validasi" action="<?= $form_action?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
			<div class="row">
				<div class="col-md-12">
					<div class="card shadow">
            <div class="card-header">
							<a href="<?=site_url("komentar")?>" class="btn btn-sm btn-outline-info mb-1" title="Tambah Artikel">
								<i class="fe fe-arrow-circle-left "></i>Kembali ke Daftar Komentar
            	</a>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label class="control-label col-sm-2" for="owner">Pengirim</label>
								<div class="col-sm-9">
									<input name="owner" class="form-control input-sm required" type="text" maxlength="50" value="<?= $komentar['owner']?>"></input>
								</div>
							</div>
              <div class="form-group">
								<label class="control-label col-sm-2" for="no_hp">No. HP</label>
								<div class="col-sm-9">
									<input name="no_hp" class="form-control input-sm required bilangan" type="text" value="<?= $komentar['no_hp']?>"></input>
								</div>
							</div>
              <div class="form-group">
								<label class="control-label col-sm-2" for="email">Email</label>
								<div class="col-sm-9">
									<input name="email" class="form-control input-sm email" type="text" value="<?= $komentar['email']?>"></input>
								</div>
							</div>
              <div class="form-group">
								<label class="col-sm-2 control-label" for="komentar">Komentar</label>
								<div class="col-sm-9">
									<textarea id="komentar" name="komentar" class="form-control input-sm required" placeholder="Isi Komentar" style="height: 200px;"><?= $komentar['komentar']?></textarea>
								</div>
							</div>
              <div class="form-group">
								<label class="col-xs-12 col-sm-2 col-lg-2 control-label" for="status">Status</label>
								<div class="btn-group col-xs-12 col-sm-9" data-toggle="buttons">
									<label id="sx3" class="btn btn-info btn-box btn-sm col-xs-6 col-sm-4 col-lg-2 form-check-label <?php if ($komentar['status'] =='1' OR $komentar['status'] == NULL): ?>active<?php endif ?>">
										<input id="sx1" type="radio" name="status" class="form-check-input" type="radio" value="1" <?php if ($komentar['status'] =='1' OR $komentar['status'] == NULL): ?>checked <?php endif ?> autocomplete="off"> Aktif
									</label>
									<label id="sx4" class="btn btn-info btn-box btn-sm col-xs-6 col-sm-4 col-lg-2 form-check-label <?php if ($komentar['status'] == '2' ): ?>active<?php endif ?>">
										<input id="sx2" type="radio" name="status" class="form-check-input" type="radio" value="2" <?php if ($komentar['status'] == '2' ): ?>checked<?php endif ?> autocomplete="off"> Tidak Aktif
									</label>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<div class="col-md-12">
								<button type='button' class='btn btn-danger btn-sm' onclick="reset_form($(this).val());"><i class='fe fe-times'></i> Batal</button>
								<button type='submit' class='btn btn-info btn-sm pull-right confirm'><i class='fe fe-check'></i> Simpan</button>
							</div>
						</div>

					</div>
				</div>
			</div>
		</form>
	</section>
</div>
<script>
	function reset_form()
	{
		<?php if ($komentar['status'] =='1' OR $komentar['status'] == NULL): ?>
			$("#sx3").addClass('active');
			$("#sx4").removeClass("active");
		<?php endif ?>
		<?php if ($komentar['status'] =='2'): ?>
			$("#sx4").addClass('active');
			$("#sx3").removeClass("active");
		<?php endif ?>
	};
</script>
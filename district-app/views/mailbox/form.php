<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Kirim Pesan</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fe fe-home"></i> Home</a></li>
			<li class="active">Kirim Pesan</li>
		</ol>
				<div class="card shadow">
					<div class="card-header">
						<a href="<?= site_url("mailbox")?>" class="btn btn-social btn-flat btn-info btn-sm"  title="Tambah Artikel">
							<i class="fe fe-arrow-circle-left "></i>Kembali ke halaman Kotak Pesan
						</a>
					</div>
					<div class="box-body">
						<form action="" id="main" method="POST" class="form-horizontal" name="main">
							<div class="form-group">
								<label class="control-label col-sm-2" for="owner">Penerima</label>
								<div class="col-sm-9">
									<select class="form-control input-sm select2-nik-ajax required" id="nik" style="width:100%" name="nik" data-url="<?= site_url('mailbox/list_pendaftar_mandiri_ajax')?>" onchange="formAction('main')">
										<?php if($individu) : ?>
											<option value="<?= $individu['nik']?>" selected><?= $individu['nik'] .' - '.$individu['nama']?></option>
										<?php endif ?>
									</select>
								</div>
							</div>
						</form>
						<form action="<?= $form_action ?>" class="form form-horizontal" id="validasi" method="POST">
							<div class="row jar_form">
								<label for="nik" class="col-sm-2"></label>
								<div class="col-sm-9">
									<input class="required" type="hidden" name="nik" value="<?= $individu['nik']?>">
								</div>
							</div>
							<?php if($individu) : ?>
								<div class="form-group">
									<label class="control-label col-sm-2" for="email">NIK</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm required" id="email" name="email" value="<?= $individu['nik'] ?>" readonly>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-2" for="owner">Nama</label>
									<div class="col-sm-9">
										<input type="text" class="form-control input-sm required" id="owner" name="owner" value="<?= $individu['nama'] ?>" readonly>
									</div>
								</div>
							<?php endif ?>
						
							<div class="form-group">
								<label class="control-label col-sm-2" for="subjek">Subjek</label>
								<div class="col-sm-9">
									<input class="form-control input-sm required" id="subjek" name="subjek" value="<?php $subjek and print($subjek) ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="komentar">Pesan</label>
								<div class="col-sm-9">
									<textarea class="form-control input-sm required" name="komentar" id="komentar"></textarea>
								</div>
							</div>
							
						</div>
						<div class="card-footer">
							<div class="col-md-12">
								<button type="submit" class='btn btn-social btn-flat btn-info btn-sm pull-right confirm'><i class='fe fe-check'></i> Kirim Pesan</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>
<script>
	$(document).ready(function() {
		const sHeight = parseInt($("#komentar").get(0).scrollHeight) + 30;
		$('#komentar').attr('style', `height:${sHeight}px;`);
	})
</script>
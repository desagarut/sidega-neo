<div class="content-wrapper">

	<section class="content-header">
		<h1>Pendataan Vaksin Covid-19</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li><a href="<?= site_url('covid19_vaksin')?>"> Daftar Peserta Vaksin Covid-19</a></li>
			<li class="active">Pendataan Vaksin Covid19</li>
		</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card shadow">
					<div class="card-header">
						<div class="col-md-12">
							<a href="<?= site_url('covid19_vaksin')?>" class="btn btn-primary btn-sm " title="Kembali Ke Daftar Pemudik Saat Covid-19"><i class="fe fe-arrow-circle-o-left"></i> Kembali Ke Daftar Peserta Vaksin Covid-19</a>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="card-header">
									<h3 class="box-title">Tambahkan Peserta Vaksin</h3>
								</div>
								<div class="box-body">
									<form action="" id="main" name="main" method="POST"  class="form-horizontal">

										<div class="form-group" >
											<label class="col-sm-3 control-label required"  for="terdata">NIK / Nama Penerima Vaksin</label>
											<div class="col-sm-4">
												<select class="form-control select2 required" id="terdata" name="terdata"  onchange="formAction('main')" style="width: 100%;">
													<option value="">-- Silakan Masukan NIK / Nama--</option>
													<?php foreach ($list_penduduk as $item):
														if (strlen($item["id"])>0): ?>
															<option value="<?= $item['id']?>" <?php selected($individu['id'], $item['id']); ?>>Nama : <?= $item['nama']." - ".$item['info']?></option>
														<?php endif;
													endforeach; ?>
												</select>
											</div>
											<div class="col-sm-4">
												<a href="#" class="btn btn-social btn-block btn-success btn-sm" data-toggle="modal" data-target="#add-warga">
													<i class="fe fe-plus"></i>
													Tambah Penduduk Non Domisili
												</a>
												<span id="data_h_plus_msg" class="help-block">
													<code>Untuk penduduk pendatang/tidak tetap. Masukkan data di sini.</code>
												</span>
											</div>
										</div>

									</form>
									<div id="form-melengkapi-data-peserta">
										<form id="validasi" action="<?= $form_action?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
											<div class="form-group">
												<label  class="col-sm-3 control-label"></label>
												<div class="col-sm-8">
													 <input type="hidden" name="id_terdata" value="<?= $individu['id']?>" class="form-control input-sm required">
												 </div>
											</div>
											<?php if ($individu): ?>
												<?php include("district-app/views/kesehatan/covid19/vaksin/konfirmasi_peserta_vaksin.php"); ?>
											<?php endif; ?>

											<?php include("district-app/views/kesehatan/covid19/vaksin/form_isian_peserta_vaksin.php"); ?>

										</form>
									</div>
									<div class="box-footer">
										<div class="col-xs-12">
											<button type="reset" class="btn btn-danger btn-sm"><i class="fe fe-times"></i> Batal</button>
											<button type="submit" class="btn btn-info btn-sm pull-right" onclick="$('#'+'validasi').submit();"><i class="fe fe-check"></i> Simpan</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>

<div class='modal fade' id='add-warga' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
	<div class='modal-dialog'>
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
				<h4 class='modal-title' id='myModalLabel'><i class='fe fe-plus text-green'></i> Tambah Penduduk Pendatang / Tidak Tetap</h4>
			</div>
			<div class='modal-body'>
				<div class="row">
					<?php include("district-app/views/covid19/vaksin/form_isian_penduduk.php"); ?>
				</div>
			</div>
			<div class='modal-footer'>
				<button type="button" class="btn btn-warning btn-sm" data-dismiss="modal"><i class='fe fe-sign-out'></i> Tutup</button>
				<a class='btn-ok'>
					<button type="submit" class="btn btn-success btn-sm" onclick="$('#'+'form_penduduk').submit();"><i class='fe fe-trash-o'></i> Simpan</button>
				</a>
			</div>
		</div>
	</div>
</div>


	<script>
		$(function() {
			$('#showData').click(function() {
				$("#kel").removeClass('hide');
				$('#showData').hide();
				$('#hideData').show();
			});

			$('#hideData').click(function() {
				$('#kel').addClass('hide');
				$('#hideData').hide();
				$('#showData').show();
			});
			$('#hideData').hide();
		});
	</script>
	<main role="main" class="main-content">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-12">
					<div class="row align-items-center mb-2">
						<div class="col">
							<?php $this->load->view("surat/form/breadcrumb.php"); ?>
						</div>
						<div class="col-auto tdk-permohonan tdk-periksa">
							<a href="<?= site_url("surat") ?>" class="btn btn-sm btn-outline-primary" title="Kembali Ke Daftar Wilayah">
								<i class="fa fa-arrow-circle-left "></i>Kembali Ke Daftar Cetak Surat
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card shadow">
								<div class="card-body">
									<form id="main" name="main" method="POST" class="form-horizontal">
										<?php include("district-app/views/surat/form/_cari_nik.php"); ?>
									</form>
									<form id="validasi" action="<?= $form_action ?>" method="POST" target="_blank" class="form-surat form-horizontal">
										<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
										<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url('surat/nomor_surat_duplikat') ?>">
										<div class="row jar_form">
											<label for="nomor" class="col-sm-3"></label>
											<div class="col-sm-8">
												<input class="required" type="hidden" name="nik" value="<?= $individu['id'] ?>">
											</div>
										</div>
										<?php if ($individu) : ?>
											<?php include("district-app/views/surat/form/konfirmasi_pemohon.php"); ?>
											<div class="form-group row">
												<label for="keperluan" class="col-sm-3 control-label">Data Keluarga / KK</label>
												<div class="col-sm-8">
													<a id="showData" class="btn btn-social btn-flat btn-danger btn-sm"><i class="fa fa-search-plus"></i> Tampilkan</a>
													<a id="hideData" class="btn btn-social btn-flat btn-danger btn-sm"><i class="fa fa-search-minus"></i> Sembunyikan</a>
												</div>
											</div>
											<div id="kel" class="form-group hide">
												<label for="pengikut" class="col-sm-3 control-label">Keluarga</label>
												<div class="col-sm-8">
													<div class="table-responsive">
														<table class="table table-bordered dataTable table-hover nowrap">
															<thead class="bg-gray disabled color-palette">
																<tr>
																	<th>No</th>
																	<th>NIK</th>
																	<th>Nama</th>
																	<th>Jenis Kelamin</th>
																	<th>Tempat Tanggal Lahir</th>
																	<th>Hubungan</th>
																	<th>Status Kawin</th>
																</tr>
															</thead>
															<tbody>
																<?php if ($anggota != NULL) :
																	$i = 0; ?>
																	<?php foreach ($anggota as $data) : $i++; ?>
																		<tr>
																			<td><?= $i ?></td>
																			<td><?= $data['nik'] ?></td>
																			<td><?= $data['nama'] ?></td>
																			<td><?= $data['sex'] ?></td>
																			<td><?= $data['tempatlahir'] ?>, <?= tgl_indo($data['tanggallahir']) ?></td>
																			<td><?= $data['hubungan'] ?></td>
																			<td><?= $data['status_kawin'] ?></td>
																		</tr>
																	<?php endforeach; ?>
																<?php endif; ?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										<?php endif; ?>
										<?php include("district-app/views/surat/form/nomor_surat.php"); ?>
										<div class="form-group row">
											<label for="keperluan" class="col-sm-3 control-label">Keperluan</label>
											<div class="col-sm-8">
												<textarea name="keperluan" class="form-control input-sm required <?= jecho($cek_anjungan['keyboard'] == 1, TRUE, 'kbvtext'); ?>" placeholder="Keperluan"></textarea>
											</div>
										</div>
										<?php include("district-app/views/surat/form/_pamong.php"); ?>
									</form>
								</div>
								<?php include("district-app/views/surat/form/tombol_cetak.php"); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
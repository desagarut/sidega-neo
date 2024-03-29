<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="row align-items-center mb-2">
					<div class="col">
						<?php $this->load->view("surat/form/breadcrumb.php"); ?>
					</div>
					<div class="col-auto tdk-permohonan tdk-periksa">
						<a href="<?= site_url("surat") ?>" class="btn btn-outline-primary" title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i>Kembali Ke Daftar Cetak Surat
						</a>
						<a href="#" class="btn btn-outline-info" title="Lihat Info Isian Surat" data-toggle="modal" data-target="#infoBox" data-title="Lihat Info Isian Surat">
							<i class="fa fa-info-circle"></i> Info Isian Surat
						</a>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="card Shadow">
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
									<?php endif; ?>
									<?php include("district-app/views/surat/form/nomor_surat.php"); ?>
									<div class="form-group row">
										<label for="pengikut" class="col-sm-3 control-label">Anggota Keluarga</label>
										<div class="col-sm-8">
											<div class="table-responsive">
												<table class="table table-bordered dataTable table-hover nowrap">
													<thead class="bg-gray disabled color-palette">
														<tr>
															<th>No</th>
															<th> NIK</th>
															<th>Nama</th>
															<th>Jenis Kelamin</th>
															<th>Umur</th>
															<th>Hubungan</th>
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
																	<td><?= $data['umur'] ?></td>
																	<td><?= $data['hubungan'] ?></td>
																</tr>
															<?php endforeach; ?>
														<?php endif; ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<?php include("district-app/views/surat/form/_pamong.php"); ?>
									<?php include("district-app/views/surat/form/tampil_foto.php"); ?>
									<?php include("district-app/views/surat/form/tombol_cetak.php"); ?>

								</form>
							</div>
						</div>
						<div class='modal fade' id='infoBox' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
							<div class='modal-dialog'>
								<div class='modal-content'>
									<div class='modal-header btn-default'>
										<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
										<h4 class='modal-title' id='myModalLabel'><i class='fa fa-info-circle'></i>&nbsp;&nbsp;Info Isian Surat</h4>
									</div>
									<div class='modal-body small'>
										<h5><strong>Form ini menghasilkan:</strong></h5>
										<ol>
											<li>Surat biodata untuk pemohon</li>
											<li>Lampiran F-1.01 FORMULIR ISIAN BIODATA PENDUDUK UNTUK WNI untuk keluarga pemohon</li>
										</ol>
										<p>Pastikan semua biodata pemohon beserta keluarga sudah lengkap sebelum mencetak surat dan lampiran. </p>
										<p>Untuk melengkapi data itu, ubah data pemohon dan anggota keluarganya di form isian penduduk di modul Penduduk.</p>
									</div>
									<div class='modal-footer btn-default'>
										<button type="button" class="btn btn-social btn-flat btn-danger btn-sm" data-dismiss="modal"><i class='fa fa-sign-out'></i> Tutup</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
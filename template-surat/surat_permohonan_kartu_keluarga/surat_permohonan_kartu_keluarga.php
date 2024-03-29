<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="row align-items-center mb-2">
					<div class="col">
						<?php $this->load->view("surat/form/breadcrumb.php"); ?>
					</div>
					<div class="col-auto">
						<a href="<?= site_url("surat") ?>" class="btn btn-sm btn-outline-primary" title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i>Kembali Ke Daftar Cetak Surat
						</a>
						<a href="#" class="btn btn-sm btn-outline-primary" title="Lihat Info Isian Surat" data-toggle="modal" data-target="#infoBox" data-title="Lihat Info Isian Surat">
							<i class="fa fa-info-circle"></i> Info Isian Surat
						</a>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="card shadow">
							<div class="card-body">
								<form id="main" name="main" method="POST" class="form-horizontal">
									<div class="form-group row">
										<label for="nik" class="col-sm-3 control-label">NIK / Nama KK</label>
										<div class="col-sm-6 col-lg-4">
											<select class="form-control input-sm select2-nik" id="nik" name="nik" style="width:100%;" onchange="formAction('main')">
												<option value="">-- Cari NIK / Nama Kepala Keluarga --</option>
												<?php foreach ($kepala_keluarga as $data) : ?>
													<option value="<?= $data['id'] ?>" <?php selected($individu['nik'], $data['nik']); ?>><?= $data['info_pilihan_penduduk'] ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
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
										<label for="alasan" class="col-sm-3 control-label">Alasan Permohonan</label>
										<div class="col-sm-6 col-lg-4">
											<select class="form-control input-sm required" name="alasan_permohonan_id">
												<option value="">Pilih Alasan Permohonan</option>
												<?php foreach ($kode['alasan_permohonan'] as $key => $value) : ?>
													<option value="<?= $key ?>"><?= strtoupper($value) ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label for="nomor" class="col-sm-3 control-label">Nomor Kartu Keluarga Semula</label>
										<div class="col-sm-4">
											<input id="no_kk_semula" class="form-control input-sm required no_kk" type="text" placeholder="Nomor Kartu Keluarga Semula" name="no_kk_semula">
											<?php if ($individu['no_kk_sebelumnya']) : ?>
												&nbsp;(No. KK sebelumnya: <?= $individu['no_kk_sebelumnya'] ?>)
											<?php endif; ?>
										</div>
									</div>
									<?php include("district-app/views/surat/form/_pamong.php"); ?>
								</form>
							</div>
							<?php include("district-app/views/surat/form/tombol_cetak.php"); ?>
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
											<li>Surat keterangan permohonan kartu keluarga untuk pemohon</li>
											<li>Lampiran F-1.15 FORMULIR PERMOHOHAN KARTU KELUARGA (KK) BARU WARGA NEGARA INDONESIA untuk keluarga pemohon</li>
											<li>Lampiran F-1.01 FORMULIR ISIAN BIODATA PENDUDUK UNTUK WNI (PER KELUARGA) untuk keluarga pemohon</li>
										</ol>
										<p>Pastikan semua biodata pemohon beserta keluarga sudah lengkap sebelum mencetak surat dan lampiran.</p>
										<p>Untuk melengkapi data itu, ubah data pemohon dan anggota keluarganya di form isian penduduk di modul Penduduk.</p>
										<p>Formulir di atas mengacu pada Peraturan Menteri Dalam Negeri Nomor 19 Tahun 2010. </p>
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
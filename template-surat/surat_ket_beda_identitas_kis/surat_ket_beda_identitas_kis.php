<script>
	function submit_form_doc() {
		$('#' + 'validasi').attr('action', '<?= $form_action2 ?>');
		$('#' + 'validasi').submit();
	}

	function change_all(total) {
		for (var i = 1; i < total + 1; i++) {
			$('#check' + i).change();
		}
	}

	function pilih_anggota(pilih, no_anggota) {
		var kolom = [
			'input[name=kartu' + no_anggota + ']',
			'input[name=nama' + no_anggota + ']',
			'input[name=nik' + no_anggota + ']',
			'input[name=alamat' + no_anggota + ']',
			'input[name=tanggallahir' + no_anggota + ']',
			'input[name=faskes' + no_anggota + ']'
		];
		if (pilih.is(':checked')) {
			$('input[name=nomor' + no_anggota + ']').removeAttr("disabled");
			for (var i = 0; i < kolom.length; i++) {
				$(kolom[i]).removeClass("non-aktif");
				$(kolom[i]).removeAttr("disabled");
				$(kolom[i]).attr("style", "background-color: white;");
			}
		} else {
			$('input[name=nomor' + no_anggota + ']').attr("disabled", 'disabled');
			for (var i = 0; i < kolom.length; i++) {
				$(kolom[i]).val('');
				$(kolom[i]).attr("disabled", 'disabled');
				$(kolom[i]).addClass("non-aktif");
				$(kolom[i]).attr("style", "background-color: lightgrey;");
			}
		}
	}
</script>
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
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="card shadow">
							<div class="card-body">
								<form id="main" name="main" method="POST" class="form-horizontal">
									<div class="col-md-12">
										<?php include("district-app/views/surat/form/_cari_nik.php"); ?>
									</div>
								</form>
								<form id="validasi" action="<?= $form_action ?>" method="POST" target="_blank" class="form-surat form-horizontal">
									<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
									<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url('surat/nomor_surat_duplikat') ?>">
									<div class="col-md-12">
										<div class="row jar_form">
											<label for="nomor" class="col-sm-3"></label>
											<div class="col-sm-8">
												<input class="required" type="hidden" name="nik" value="<?= $individu['id'] ?>">
											</div>
										</div>
										<?php if ($individu) : ?>
											<?php include("district-app/views/surat/form/konfirmasi_pemohon.php"); ?>
										<?php endif; ?>
										<div class="form-group row pria_luar_desa subtitle_head">
											<label class="col-sm-3"><strong>DATA KELUARGA / KK</strong></label>
										</div>
										<div class="form-group row">
											<label for="nomor" class="col-sm-3 control-label">Keluarga</label>
											<div class="col-sm-8">
												<div class="table-responsive">
													<table class="table table-bordered dataTable table-hover">
														<thead class="bg-gray disabled color-palette">
															<tr>
																<th>No</th>
																<th><input type="checkbox" class="checkall" onchange="change_all(<?= count($anggota); ?>);" /></th>
																<th>NIK</th>
																<th>Nama</th>
																<th>Jenis Kelamin</th>
																<th>Tempat Tanggal Lahir</th>
																<th>Hubungan</th>
															</tr>
														</thead>
														<tbody>
															<?php foreach ($anggota as $key => $data) : ?>
																<tr>
																	<td align="center" width="2"><?= $key + 1 ?></td>
																	<td align="center" width="5">
																		<input id="check<?= $key + 1 ?>" type="checkbox" name="id_cb[]" value="'<?= $data['nik'] ?>'" onchange="pilih_anggota($(this), <?= $key + 1 ?>);" />
																	</td>
																	<td><?= $data['nik'] ?></td>
																	<td><?= $data['nama'] ?></td>
																	<td><?= $data['sex'] ?></td>
																	<td><?= $data['tempatlahir'] ?>, <?= tgl_indo($data['tanggallahir']) ?></td>
																	<td><?= $data['hubungan'] ?></td>
																</tr>
															<?php endforeach; ?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="form-group row pria_luar_desa subtitle_head">
											<label class="col-sm-3"><strong>DATA KELUARGA DI KARTU KIS</strong></label>
										</div>
										<div class="form-group row">
											<label for="nomor" class="col-sm-3 control-label">Keluarga</label>
											<div class="col-sm-8">
												<div class="table-responsive">
													<table class="table table-bordered dataTable table-hover">
														<thead class="bg-gray disabled color-palette">
															<tr>
																<th>No</th>
																<th>No. Kartu</th>
																<th>Nama di Kartu</th>
																<th>NIK</th>
																<th>Alamat di Kartu</th>
																<th>Tanggal Lahir</th>
																<th>Faskes Tingkat I</th>
															</tr>
														</thead>
														<tbody>
															<?php for ($i = 1; $i < MAX_ANGGOTA + 1; $i++) : ?>
																<tr>
																	<td width="7%"> <input name="nomor<?= $i ?>" type="text" class="form-control input-sm" value="<?= $i ?>" readonly disabled="disabled" /></td>
																	<td> <input name="kartu<?= $i ?>" type="text" class="form-control input-sm" disabled="disabled" style="background-color: lightgrey;" /></td>
																	<td> <input name="nama<?= $i ?>" type="text" class="form-control input-sm" disabled="disabled" style="background-color: lightgrey;" /></td>
																	<td> <input name="nik<?= $i ?>" type="text" class="form-control input-sm" disabled="disabled" style="background-color: lightgrey;" /></td>
																	<td> <input name="alamat<?= $i ?>" type="text" class="form-control input-sm" disabled="disabled" style="background-color: lightgrey;" /></td>
																	<td>
																		<input class="form-control input-sm datepicker" name="tanggallahir<?= $i ?>" type="text" disabled="disabled" style="background-color: lightgrey;" />
																	</td>
																	<td> <input name="faskes<?= $i ?>" type="text" class="form-control input-sm" disabled="disabled" style="background-color: lightgrey;" /></td>
																</tr>
															<?php endfor; ?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<?php include("district-app/views/surat/form/nomor_surat.php"); ?>
										<div class="form-group row">
											<label for="keperluan" class="col-sm-3 control-label">Keperluan</label>
											<div class="col-sm-8">
												<textarea name="keperluan" class="form-control input-sm required" placeholder="Keperluan"></textarea>
											</div>
										</div>
										<div class="form-group row subtitle_head">
											<label class="col-sm-3"><strong>PENANDA TANGAN</strong></label>
										</div>
										<?php include("district-app/views/surat/form/_pamong.php"); ?>
									</div>
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
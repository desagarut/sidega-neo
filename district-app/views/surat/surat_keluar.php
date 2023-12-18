<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="row align-items-center mb-2">
					<div class="col">
						<h2 class="h5 page-title">Arsip Layanan Surat</h2>
					</div>
					<div class="col-auto">
						<form class="form-inline">
							<div class="form-group d-none d-lg-inline">
								<label for="reportrange" class="sr-only">Date Ranges</label>
								<div id="reportrange" class="px-2 py-2 text-muted">
									<span class="small"></span>
								</div>
							</div>
							<div class="form-group">
								<button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="text-muted sr-only">Action</span>
								</button>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="<?= site_url('keluar/perorangan_clear') ?>">
										<button type="button" class="dropdown-item btn btn-outline-info btn-sm mb-1"><i class="fe fe-archive"></i> Rekam Surat Perorangan</button>
									</a>
									<a href="<?= site_url('keluar/graph') ?>" class="dropdown-item btn btn-outline-info btn-sm mb-1"><i class="fe fe-pie-chart"></i> Pie Surat Keluar</a>
									<a href="<?= site_url('keluar/dialog_cetak/cetak') ?>" class="dropdown-item btn btn-outline-info btn-sm mb-1" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak Arsip Layanan Surat"><i class="fe fe-printer"></i> Cetak</a>
									<a href="<?= site_url('keluar/dialog_cetak/unduh') ?>" class="dropdown-item btn btn-outline-info btn-sm mb-1" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh Arsip Layanan Surat"><i class="fe fe-download"></i> Unduh</a>
									<a href="<?= site_url("{$this->controller}/clear") ?>" class="dropdown-item btn btn-outline-info btn-sm mb-1"><i class="fe fe-refresh"></i>Bersihkan</a>

								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="card shadow">
					<div class="card-header">
						<form id="mainform" name="mainform" method="post">
							<div class="row mt-2">
								<div class="col-md-2">
									<select class="form-control input-sm select2" name="tahun" onchange="formAction('mainform','<?= site_url($this->controller . '/filter/tahun') ?>')">
										<option value="">Tahun</option>
										<?php foreach ($tahun_surat as $thn) : ?>
											<option value="<?= $thn['tahun'] ?>" <?php selected($tahun, $thn['tahun']) ?>><?= $thn['tahun'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-md-2">
									<select class="form-control input-sm select2" name="bulan" onchange="formAction('mainform','<?= site_url($this->controller . '/filter/bulan') ?>')" <?= ($tahun != 0) ? '' : 'disabled'; ?>>
										<option value="">Bulan</option>
										<?php foreach ($bulan_surat as $bln) : ?>
											<option value="<?= $bln['bulan'] ?>" <?php selected($bulan, $bln['bulan']) ?>><?= getBulan($bln['bulan']) ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<select class="form-control select2" name="jenis" onchange="formAction('mainform','<?= site_url($this->controller . '/filter/jenis') ?>')" style="width: 100%;">
											<option value="">Pilih Jenis Surat</option>
											<?php foreach ($jenis_surat as $data) : ?>
												<option value="<?= $data['nama_surat'] ?>" <?php selected($jenis, $data['nama_surat']) ?>><?= $data['nama_surat'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<form id="mainform" name="mainform" method="post">
									<div class="row">
										<div class="col-sm-12">
											<table class="table datatables table-hover table-responsive" id="dataTable-1">
												<thead>
													<tr>
														<th>No</th>
														<th nowrap>Kode Surat</th>
														<?php if ($o == 2) : ?>
															<th nowrap><a href="<?= site_url("keluar/index/{$p}/1") ?>">No Urut <i class='fe fe-sort-asc fa-sm'></i></a></th>
														<?php elseif ($o == 1) : ?>
															<th nowrap><a href="<?= site_url("keluar/index/{$p}/2") ?>">No Urut <i class='fe fe-sort-desc fa-sm'></i></a></th>
														<?php else : ?>
															<th nowrap><a href="<?= site_url("keluar/index/{$p}/1") ?>">No Urut <i class='fe fe-sort fa-sm'></i></a></th>
														<?php endif; ?>
														<th>Jenis Surat</th>
														<?php if ($o == 4) : ?>
															<th nowrap><a href="<?= site_url("keluar/index/{$p}/3") ?>">Nama Penduduk <i class='fe fe-sort-asc fa-sm'></i></a></th>
														<?php elseif ($o == 3) : ?>
															<th nowrap><a href="<?= site_url("keluar/index/{$p}/4") ?>">Nama Penduduk <i class='fe fe-sort-desc fa-sm'></i></a></th>
														<?php else : ?>
															<th nowrap><a href="<?= site_url("keluar/index/{$p}/3") ?>">Nama Penduduk <i class='fe fe-sort fa-sm'></i></a></th>
														<?php endif; ?>
														<th nowrap>Keterangan</th>
														<th class="text-center nowrap">Penandatangan<br />User</th>
														<?php if ($o == 6) : ?>
															<th nowrap><a href="<?= site_url("keluar/index/{$p}/5") ?>">Tanggal <i class='fe fe-sort-asc fa-sm'></i></a></th>
														<?php elseif ($o == 5) : ?>
															<th nowrap><a href="<?= site_url("keluar/index/{$p}/6") ?>">Tanggal <i class='fe fe-sort-desc fa-sm'></i></a></th>
														<?php else : ?>
															<th nowrap><a href="<?= site_url("keluar/index/{$p}/5") ?>">Tanggal <i class='fe fe-sort fa-sm'></i></a></th>
														<?php endif; ?>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach ($main as $data) :
														if ($data['nama_surat']) :
															$berkas = $data['nama_surat'];
														else :
															$berkas = $data["berkas"] . "_" . $data["nik"] . "_" . date("Y-m-d") . ".rtf";
														endif;

														$theFile = FCPATH . LOKASI_ARSIP . $berkas;
														$lampiran = FCPATH . LOKASI_ARSIP . $data['lampiran']; ?>
														<tr>
															<td class="padat"><?= $data['no'] ?></td>
															<td><?= $data['kode_surat'] ?></td>
															<td><?= $data['no_surat'] ?></td>
															<td><?= $data['format'] ?></td>
															<td>
																<?php if ($data['nama']) : ?>
																	<?= $data['nama']; ?>
																<?php elseif ($data['nama_non_warga']) : ?>
																	<strong>Non-warga: </strong><?= $data['nama_non_warga']; ?><br>
																	<strong>NIK: </strong><?= $data['nik_non_warga']; ?>
																<?php endif; ?>
															</td>
															<td><?= $data['keterangan'] ?></td>
															<td nowrap><?= $data['pamong_nama'] ?><br /> User : <?= $data['nama_user'] ?></td>
															<td class="padat"><?= tgl_indo2($data['tanggal']) ?></td>
															<td class="aksi">
																<button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																	<span class="text-muted sr-only">Action</span>
																</button>
																<div class="dropdown-menu dropdown-menu-right">
																	<?php if ($this->CI->cek_hak_akses('u')) : ?>
																		<a href="<?= site_url("keluar/edit_keterangan/{$data['id']}") ?>" title="Ubah Data" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Keterangan" class="dropdown-item btn btn-warning btn-sm"><i class="fe fe-edit"></i> Ubah</a>
																	<?php endif; ?>
																	<?php if ($this->CI->cek_hak_akses('h')) : ?>
																		<a href="#" data-href="<?= site_url("keluar/delete/{$p}/{$o}/{$data['id']}") ?>" class="btn btn-danger btn-sm dropdown-item" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash"></i> Hapus</a>
																	<?php endif; ?>
																	<?php if (is_file($data['file_rtf'])) : ?>
																		<a href="<?= site_url("{$this->controller}/unduh/rtf/{$data['id']}"); ?>" class="btn btn-primary btn-sm dropdown-item" title="Unduh Surat RTF" target="_blank"><i class="fe fe-file"></i> Unduh Surat RTF</a>
																	<?php endif; ?>
																	<?php if (is_file($data['file_pdf'])) : ?>
																		<a href="<?= site_url("{$this->controller}/unduh/pdf/{$data['id']}"); ?>" class="btn btn-info btn-sm dropdown-item" title="Cetak Surat PDF" target="_blank"><i class="fe fe-pdf"></i> Unduh Surat PDF</a>
																	<?php endif; ?>
																	<?php if (is_file($data['file_qr'])) : ?>
																		<a href="#myModal" data-fileqr="<?= base_url($data['file_qr']) ?>" data-urlqr="<?= site_url("c1/{$data['id']}"); ?>" title="Lihat QR Code" class="viewQR btn btn-info btn-sm dropdown-item"><i class="fe fe-grid"></i> QRCode </a>
																	<?php endif; ?>
																	<?php if (is_file($data['file_lampiran'])) : ?>
																		<a href="<?= site_url("{$this->controller}/unduh/lampiran/{$data['id']}"); ?>" target="_blank" class="btn btn-outline-info btn-sm dropdown-item" title="Unduh Lampiran"><i class="fe fe-paperclip"></i> Lampiran</a>
																	<?php endif; ?>
																</div>
															</td>
														</tr>
													<?php endforeach; ?>
												</tbody>
											</table>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php $this->load->view('global/confirm_delete'); ?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">
					<center>QR Code</center>
				</h4>
			</div>
			<div class="card-body">
				<div class="form-group">
					<center>
						<img id="image_qr" src="" class="img-thumbnail">
						<a id="url_qr" href="" class="btn btn-social btn-flat bg-olive btn-sm " target="_blank" rel="noopener noreferrer"><i class="fe fe-eye"></i> Lihat</a>
					</center>
				</div>
			</div>
		</div>
	</div>
</div>
<script src='<?= base_url() ?>assets/js/jquery.dataTables.min.js'></script>
<script src='<?= base_url() ?>assets/js/dataTables.bootstrap4.min.js'></script>

<script>
	$('#dataTable-1').DataTable({
		autoWidth: true,
		"lengthMenu": [
			[10, 25, 50, -1],
			[10, 25, 50, "All"]
		]
	});
</script>
<script>
	$(function() {
		var keyword = <?= $keyword ?>;
		$("#cari").autocomplete({
			source: keyword,
			maxShowItems: 10,
		});
	});

	$(document).on("click", ".viewQR", function(e) {
		e.preventDefault();

		$("#image_qr").attr('src', $(this).data('fileqr'));
		$("#url_qr").attr('href', $(this).data('urlqr'));

		$($(this).attr('href')).modal('show');
	});
</script>
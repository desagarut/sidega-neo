<?php defined('BASEPATH') || exit('No direct script access allowed');?>

<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="row align-items-center mb-2">
					<div class="col">
						<h2 class="h5 page-title">Rekam Surat Perorangan</h2>
					</div>
					<div class="col-auto">
						<form class="form-inline">
							<div class="form-group">
								<a href="<?= site_url('keluar') ?>" class="btn btn-outline-info btn-sm mb-1" title="Kembali Ke Daftar Wilayah">
									<i class="fe fe-arrow-circle-left "></i>Kembali Ke Arsip Layanan Surat
								</a>
							</div>
						</form>
					</div>
				</div>
				<div class="card shadow">
					<div class="card-header">
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover">
								<tbody>
									<form id="main" name="main" method="post">
										<tr>
											<td style="padding-top : 10px;padding-bottom : 10px;width:15%;">Nama Penduduk </td>
											<td>
												<div class="form-group">
													<div class="col-sm-6 col-lg-6">
														<select class="form-control required input-sm select2-nik-ajax" id="nik" name="nik" data-url="<?= site_url('surat/list_penduduk_bersurat_ajax') ?>" onchange="formAction('main')">
															<?php if ($individu) : ?>
																<option value="<?= $individu['id'] ?>" selected><?= $individu['nik'] . ' - ' . $individu['nama'] ?></option>
															<?php endif; ?>
														</select>
													</div>
												</div>
											</td>
										</tr>
									</form>
									<?php if ($individu) : //bagian info setelah terpilih
									?>
										<tr>
											<td style="padding-top : 10px;padding-bottom : 10px;" nowrap>Tempat/ Tanggal Lahir (Umur)</td>
											<td> <?= $individu['tempatlahir'] ?> / <?= tgl_indo($individu['tanggallahir']) ?> (<?= $individu['umur'] ?> Tahun)</td>
										</tr>
										<tr>
											<td style="padding-top : 10px;padding-bottom : 10px;">Alamat</td>
											<td> <?= $individu['alamat_wilayah']; ?></td>
										</tr>
										<tr>
											<td style="padding-top : 10px;padding-bottom : 10px;">Pendidikan</td>
											<td> <?= $individu['pendidikan'] ?></td>
										</tr>
										<tr>
											<td style="padding-top : 10px;padding-bottom : 10px;">Warganegara / Agama</td>
											<td> <?= $individu['warganegara'] ?> / <?= $individu['agama'] ?></td>
										</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-body">
						<form id="mainform" name="mainform" method="post">
							<div class="row">
								<div class="col-sm-12">
									<table class="table datatables table-hover table-responsive" id="dataTable-1">
										<thead>
											<tr>
												<th>No</th>
												<th>Aksi</th>
												<th>Kode Surat</th>
												<?php if ($o == 2) : ?>
													<th><a href="<?= site_url("keluar/perorangan/{$individu['nik']}/{$p}/1") ?>">No Urut <i class='fe fe-sort-asc fa-sm'></i></a></th>
												<?php elseif ($o == 1) : ?>
													<th><a href="<?= site_url("keluar/perorangan/{$individu['nik']}/{$p}/2") ?>">No Urut <i class='fe fe-sort-desc fa-sm'></i></a></th>
												<?php else : ?>
													<th><a href="<?= site_url("keluar/perorangan/{$individu['nik']}/{$p}/1") ?>">No Urut <i class='fe fe-sort fa-sm'></i></a></th>
												<?php endif; ?>
												<th>Jenis Surat</th>
												<?php if ($o == 4) : ?>
													<th><a href="<?= site_url("keluar/perorangan/{$individu['nik']}/{$p}/3") ?>">Nama Penduduk <i class='fe fe-sort-asc fa-sm'></i></a></th>
												<?php elseif ($o == 3) : ?>
													<th><a href="<?= site_url("keluar/perorangan/{$individu['nik']}/{$p}/4") ?>">Nama Penduduk <i class='fe fe-sort-desc fa-sm'></i></a></th>
												<?php else : ?>
													<th><a href="<?= site_url("keluar/perorangan/{$individu['nik']}/{$p}/3") ?>">Nama Penduduk <i class='fe fe-sort fa-sm'></i></a></th>
												<?php endif; ?>
												<th>Keterangan</th>
												<th>Ditandatangani Oleh</th>
												<?php if ($o == 6) : ?>
													<th nowrap><a href="<?= site_url("keluar/perorangan/{$individu['nik']}/{$p}/5") ?>">Tanggal <i class='fe fe-sort-asc fa-sm'></i></a></th>
												<?php elseif ($o == 5) : ?>
													<th nowrap><a href="<?= site_url("keluar/perorangan/{$individu['nik']}/{$p}/6") ?>">Tanggal <i class='fe fe-sort-desc fa-sm'></i></a></th>
												<?php else : ?>
													<th nowrap><a href="<?= site_url("keluar/perorangan/{$individu['nik']}/{$p}/5") ?>">Tanggal <i class='fe fe-sort fa-sm'></i></a></th>
												<?php endif; ?>
												<th>User</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($main as $data) : ?>
												<tr>
													<td><?= $data['no'] ?></td>
													<td nowrap>
														<?php if (is_file($data['file_rtf'])) : ?>
															<a href="<?= base_url($data['file_rtf']) ?>" class="btn btn-flatbtn-outline-info btn-sm" title="Unduh Surat RTF" target="_blank"><i class="fe fe-file-word-o"></i></a>
														<?php endif; ?>
														<?php if (is_file($data['file_pdf'])) : ?>
															<a href="<?= base_url($data['file_pdf']) ?>" class="btn btn-flat bg-fuchsia btn-sm" title="Cetak Surat PDF" target="_blank"><i class="fe fe-file-pdf-o"></i></a>
														<?php endif; ?>
														<?php if (is_file($data['file_qr'])) : ?>
															<a href="<?= site_url("dokumen_web/check_surat2/{$data['id']}"); ?>" class="btn btn-flat bg-green btn-sm" title="Lihat Verifikasi" target="_blank"><i class="fe fe-check"></i></a>
															<a href="#myModal" data-fileqr="<?= base_url($data['file_qr']) ?>" title="Lihat QR Code" class="viewQR btn btn-flat bg-aqua btn-sm"><i class="fe fe-qrcode"></i></a>
														<?php endif; ?>
														<?php if (is_file($data['file_lampiran'])) : ?>
															<a href="<?= base_url($data['file_lampiran']) ?>" target="_blank" class="btn btn-social btn-flat bg-olive btn-sm" title="Unduh Lampiran"><i class="fe fe-paperclip"></i> Lampiran</a>
														<?php endif; ?>
														<?php if ($this->CI->cek_hak_akses('u')) : ?>
															<a href="<?= site_url("keluar/edit_keterangan/{$data['id']}") ?>" title="Ubah Data" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Keterangan" class="btn bg-orange btn-flat btn-sm"><i class="fe fe-edit"></i></a>
														<?php endif; ?>
														<?php if ($this->CI->cek_hak_akses('h')) : ?>
															<a href="#" data-href="<?= site_url("keluar/delete/{$p}/{$o}/{$data['id']}") ?>" class="btn bg-maroon btn-flat btn-sm" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash"></i></a>
														<?php endif; ?>
													</td>
													<td><?= $data['kode_surat'] ?></td>
													<td><?= $data['no_surat'] ?></td>
													<td><?= $data['format'] ?></td>
													<td><?= $data['nama'] ?></td>
													<td><?= $data['keterangan'] ?></td>
													<td><?= $data['pamong'] ?></td>
													<td nowrap><?= tgl_indo2($data['tanggal']) ?></td>
													<td><?= $data['nama_user'] ?></td>
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
</main>
<?php $this->load->view('global/confirm_delete'); ?>
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
	$('#dataTable-2').DataTable({
		autoWidth: true,
		"lengthMenu": [
			[10, 25, 50, -1],
			[10, 25, 50, "All"]
		]
	});
</script>
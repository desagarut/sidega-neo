<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="row align-items-center mb-2">
					<div class="col">
						<h2 class="h5 page-title">Daftar Anggota Keluarga</h2>
					</div>
					<div class="col-auto">
						<div class="form-group mr-1 mb-2 ">
							<div class="btn-group btn-group-vertical">
								<?php if ($this->CI->cek_hak_akses('h')) : ?>
									<button class="btn btn-primary dropdown-toggle more-vertical" type="button" id="dr1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tambah Anggota</button>
									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr1">
										<a class="dropdown-item" href="<?= site_url("keluarga/form_a/$p/$o/$kk") ?>">Tambah Penduduk Baru</a>
										<a href="<?= site_url("keluarga/ajax_add_anggota/$p/$o/$kk") ?>" class="dropdown-item" title="Tambah Anggota Dari Penduduk Yang Sudah Ada" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Tambah Anggota Keluarga Dari Penduduk">Dari Penduduk Sudah Ada</a>
									</div>
								<?php endif; ?>
							</div>
							<a href="<?= site_url("keluarga/kartu_keluarga/$p/$o/$kk") ?>" class="btn btn-outline-primary">Kartu Keluarga</a>
							<a href="<?= site_url("keluarga/index/$p/$o") ?>" class="btn btn-outline-primary" title="Kembali Ke Daftar Keluarga"><i class="fe fe-arrow-circle-left "></i>Kembali Ke Daftar Keluarga
							</a>
						</div>
					</div>
				</div>
				<div class="card shadow">
					<div class="card-header">
						<h5><b>Rincian Keluarga</b></h5>
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover tabel-rincian">
								<tbody>
									<tr>
										<td width="20%">Nomor Kartu Keluarga (KK)</td>
										<td width="1%">:</td>
										<td><?= $kepala_kk['no_kk'] ?></td>
									</tr>
									<tr>
										<td>Kepala Keluarga</td>
										<td>:</td>
										<td><strong><?= $kepala_kk['nama'] ?></strong></td>
									</tr>
									<tr>
										<td>Alamat</td>
										<td>:</td>
										<td><?= $kepala_kk['alamat_wilayah'] ?></td>
									</tr>
									<tr>
										<td>
											<?= ($program['programkerja']) ? anchor("program_bantuan/peserta/2/$kepala_kk[no_kk]", 'Program Bantuan', 'target="_blank"') : 'Program Bantuan'; ?>
										</td>
										<td>:</td>
										<td>
											<?php if ($program['programkerja']) : ?>
												<?php foreach ($program['programkerja'] as $item) : ?>
													<?= anchor("program_bantuan/data_peserta/$item[peserta_id]", '<span class="label label-success">' . $item['nama'] . '</span>&nbsp;', 'target="_blank"'); ?>
												<?php endforeach; ?>
											<?php else : ?>
												- Tidak Ada Data -
											<?php endif; ?>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-body">
						<h5><b>Daftar Anggota Keluarga</b></h5>
						<div class="row">
							<div class="col-md-12">
								<form id="mainform" name="mainform" action="" method="post">
									<table class="table table-bordered table-striped table-hover tabel-rincian" id="dataTable-1">
										<thead>
											<tr class="text-center">
												<th>No</th>
												<th>NIK</th>
												<th>Nama</th>
												<th>Tanggal Lahir</th>
												<th>Jenis Kelamin</th>
												<th>Hubungan</th>
												<?php if ($this->CI->cek_hak_akses('h')) : ?>
													<th>Aksi</th>
												<?php endif; ?>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($main as $key => $data) : ?>
												<tr>
													<td width=1% class="text-center"><?= ($key + 1); ?></td>
													<td width=15%><?= $data['nik'] ?></td>
													<td nowrap width=25%><?= strtoupper($data['nama']) ?></td>
													<td width=20%><?= $data['tempatlahir'] ?>, <?= tgl_indo_out($data['tanggallahir']) ?></td>
													<td width=15%><?= $data['sex'] ?></td>
													<td nowrap width=15%><?= $data['hubungan'] ?></td>
													<?php if ($this->CI->cek_hak_akses('h')) : ?>
														<td width=10% class="aksi text-center">
															<div class="dropdown">
																<button class="btn btn-sm dropdown-toggle more-vertical" type="button" id="dr1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																	<span class="text-muted sr-only">Action</span>
																</button>
																<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr1">
																	<a class="dropdown-item" href="<?= site_url("penduduk/form/$p/$o/$data[id]") ?>">Ubah</a>
																	<a href="#" data-href="<?= site_url("keluarga/delete_anggota/$p/$o/$kk/$data[id]") ?>" class="dropdown-item" title="Pecah KK" data-toggle="modal" data-target="#confirm-status" data-body="Apakah Anda yakin ingin memecah Data Keluarga ini?"> Pecah KK</a>
																	<a href="<?= site_url("keluarga/edit_anggota/$p/$o/$kk/$data[id]") ?>" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Hubungan Keluarga" title="Ubah Hubungan Keluarga" class="dropdown-item"> Ubah Hubungan Keluarga</a>
																	<a href="#" data-href="<?= site_url("keluarga/keluarkan_anggota/$kk/$data[id]") ?>" class="dropdown-item" title="Keluarkan, Karena bukan anggota keluarga ini" data-toggle="modal" data-target="#confirm-status" data-body="Apakah yakin akan dikeluarkan dari keluarga ini?">Keluarkan dari KK ini</a>
																</div>
															</div>
															<!--
															<a href="<?= site_url("penduduk/form/$p/$o/$data[id]") ?>" class="btn bg-orange btn-warning btn-sm" title="Ubah Biodata Penduduk"><i class="fe fe-edit"></i></a>
															<a href="#" data-href="<?= site_url("keluarga/delete_anggota/$p/$o/$kk/$data[id]") ?>" class="btn btn-outline-info btn-sm" title="Pecah KK" data-toggle="modal" data-target="#confirm-status" data-body="Apakah Anda yakin ingin memecah Data Keluarga ini?"><i class="fe fe-scissors"></i></a>
															<a href="<?= site_url("keluarga/edit_anggota/$p/$o/$kk/$data[id]") ?>" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Hubungan Keluarga" title="Ubah Hubungan Keluarga" class="btn bg-navy btn-box btn-sm"><i class='fe fe-link'></i></a>
															<a href="#" data-href="<?= site_url("keluarga/keluarkan_anggota/$kk/$data[id]") ?>" class="btn bg-maroon btn-box btn-sm" title="Bukan anggota keluarga ini" data-toggle="modal" data-target="#confirm-status" data-body="Apakah yakin akan dikeluarkan dari keluarga ini?"><i class="fe fe-times"></i></a>
													-->
														</td>
													<?php endif; ?>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</form>
							</div>
						</div>
					</div>
					<!-- Modal Pecah KK & Keluarkan dari KK ini -->
					<div class="modal fade" id="confirm-status" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel">Konfirmasi</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body text-muted">
								</div>
								<div class="modal-footer">
									<button type="button" class="btn mb-2 btn-danger" data-dismiss="modal">Tutup</button>
									<a class="btn-ok">
										<button type="button" class="btn mb-1 btn-primary" id="ok-delete">Simpan</button>
									</a>
								</div>
							</div>
						</div>
					</div>


					<div class="modal fade" id="modalBox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel"></h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="fetched-data"></div>
							</div>
						</div>
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
</script>
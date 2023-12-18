<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="row align-items-center mb-2">
					<div class="col">
						<h2 class="h5 page-title">Layanan Pembuatan Surat</h2>
					</div>
					<div class="col-auto">
						<form class="form-inline">
							<div class="form-group">
								<button type="button" class="btn btn-sm"><span class="fe fe-refresh-ccw fe-16 text-muted"></span></button>
								<a href="<?= site_url("keluar") ?>" title="Arsip Surat">
									<button type="button" class="btn btn-outline-info mb-1"><i class="fe fe-folder"></i> Arsip Surat</button>
								</a>

							</div>
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="card shadow mb-2">
							<div class="card-body">
								<?php if ($data['favorit'] = 1) : ?>
									<div class="row">
										<div class="col-sm-12">
											<table class="table datatables table-hover table-responsive" id="dataTable-1">
												<thead>
													<tr>
														<th width="1%">No</th>
														<th width="15%">Aksi</th>
														<th width="50%">Layanan Administrasi Surat (Daftar Favorit)</th>
														<th>Kode Surat</th>
														<th>Lampiran</th>
													</tr>
												</thead>
												<tbody>
													<?php if (count($surat_favorit) > 0) : ?>
														<?php $i = 1;
														foreach ($surat_favorit as $data) : ?>
															<tr <?php if ($data['jenis'] != 1) : ?>style='background-color:#f8deb5 !important;' <?php endif; ?>>
																<td><?= $i; ?></td>
																<td>
																	<a href="<?= site_url("surat/favorit/{$data['id']}/{$data['favorit']}") ?>" class="btn btn-success mb-1" title="Keluarkan dari Daftar Favorit"><i class="fe fe-star text-light"></i></a>
																	<a href="<?= site_url() ?>surat/form/<?= $data['url_surat'] ?>" class="btn btn-sm btn-info mb-1 text-light" title="Buat Surat"><i class="fe fe-file-word-o"></i>Buat Surat</a>
																</td>
																<td><?= $data['nama'] ?></td>
																<td><?= $data['kode_surat'] ?></td>
																<td><?= kode_format($data['lampiran']); ?></td>
															</tr>
														<?php $i++;
														endforeach; ?>
													<?php else : ?>
														<tr>
															<td colspan="5">
																<div class="card-body text-center">
																	<span>Belum ada surat favorit</span>
																</div>
															</td>
														</tr>
													<?php endif; ?>
												</tbody>
											</table>
										</div>
									</div>
								<?php endif; ?>
							</div>
						</div>
						<div class="card shadow">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-12">
										<table class="table datatables table-hover table-responsive" id="dataTable-2">
											<thead>
												<tr>
													<th width="1%">No</th>
													<th width="15%">Aksi</th>
													<th width="50%">Layanan Administrasi Surat</th>
													<th>Kode Surat</th>
													<th>Lampiran</th>
												</tr>
											</thead>
											<tbody>
												<?php $nomer = 1;

												foreach ($menu_surat2 as $data) : ?>
													<?php if ($data['favorit'] != 1) : ?>
														<tr <?php if ($data['jenis'] != 1) : ?>style='background-color:#f8deb5 !important;' <?php endif; ?>>
															<td><?= $nomer; ?></td>
															<td class="nostretch">
																<?php if ($this->CI->cek_hak_akses('u')) : ?>
																	<a href="<?= site_url("surat/favorit/{$data['id']}/{$data['favorit']}") ?>" class="btn btn-secondary mb-1" title="Tambahkan ke Daftar Favorit"><i class="fe fe-star"></i></a>
																<?php endif; ?>
																<a href="<?= site_url() ?>surat/form/<?= $data['url_surat'] ?>" class="btn btn-sm btn-info mb-1 text-light" title="Buat Surat"><i class="fe fe-file-word-o"></i>Buat Surat</a>
															</td>
															<td><?= $data['nama'] ?></td>
															<td><?= $data['kode_surat'] ?></td>
															<td><?= kode_format($data['lampiran']); ?></td>
														</tr>
													<?php $nomer++;
													endif; ?>
												<?php endforeach; ?>
											</tbody>
										</table>
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

<?php $this->load->view('global/confirm_delete'); ?>
<?php $this->load->view('global/konfirmasi'); ?>
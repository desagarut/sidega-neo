<style type="text/css">
	.nowrap {
		white-space: nowrap;
	}
</style>
<script>
	$(function() {
		var keyword = <?= $keyword ?>;
		$("#cari").autocomplete({
			source: keyword,
			maxShowItems: 10,
		});
	});
</script>
<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">Klasifikasi Surat</h5>
			</div>
			<div class="col-auto">
				<form id="mainform" name="mainform" action="" method="post">
					<div class="row">
						<div class="<?php if ($this->modul_ini <> 15) : ?>col-md-9<?php else : ?>col-md-12<?php endif; ?>">
							<div class="card shadow">
								<div class="card-header">
									<a href="<?= site_url("{$this->controller}/form") ?>" class="btn btn-success btn-sm btn-sm mb-1 text-light" title="Tambah Klasifikasi Baru">
										<i class="fe fe-plus"></i>Tambah Klasifikasi Baru
									</a>
									<?php if ($this->CI->cek_hak_akses('h')) : ?>
										<a href="#confirm-delete" title="Hapus Data" onclick="deleteAllcard('mainform', '<?= site_url("{$this->controller}/delete_all/$p/$o") ?>')" class="btn btn-danger btn-sm mb-1 hapus-terpilih"><i class='fe fe-trash'></i> Hapus Data Terpilih</a>
									<?php endif; ?>
									<a href="<?= site_url("{$this->controller}/impor") ?>" class="btn btn-outline-info btn-sm mb-1" title="Impor Klasifikasi" data-remote="false" data-toggle="modal" data-target="#modalcard" data-title="Impor Klasifikasi"><i class="fe fe-upload "></i> Impor</a>
									<a href="<?= site_url("{$this->controller}/ekspor") ?>" class="btn btn-outline-info btn-sm mb-1" title="Ekspor Klasifikasi"><i class="fe fe-download"></i> Unduh</a>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-sm-12">
											<form id="mainform" name="mainform" action="" method="post">
												<input name="kategori" type="hidden" value="<?= $kat ?>">
												<div class="row">
													<div class="col-sm-4 mb-3">
														<select class="form-control input-sm " name="filter" onchange="formAction('mainform','<?= site_url($this->controller . '/filter') ?>')">
															<option value="">Semua</option>
															<option value="1" <?php selected($filter, "1") ?>>Aktif</option>
															<option value="0" <?php selected($filter, "0") ?>>Tidak Aktif</option>
														</select>
													</div>
												</div>
											</form>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<table class="table datatables table-hover table-responsive" id="dataTable-1">
												<thead>
													<tr>
														<th  style="width:1%">
															<div class="custom-control custom-checkbox">
																<input type="checkbox" class="custom-control-input" id="all2">
																<label class="custom-control-label" for="all2"></label>
															</div>
															<!--<input type="checkcard" id="checkall" />-->
														</th>
														<th style="width:1%">No</th>
														<th style="width:10%">Kode</th>														
														<th style="width:50%">Nama</th>														
														<th style="width:30%">Keterangan</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach ($main as $data) : ?>
														<tr>
															<td>
																<div class="custom-control custom-checkbox">
																	<input type="checkbox" class="custom-control-input" name="id_cb[]" id="<?= $data['id'] ?>" value="<?= $data['id'] ?>">
																	<label class="custom-control-label" for="<?= $data['id'] ?>"></label>
																</div>
																<!--<input type="checkcard" name="id_cb[]" value="<?= $data['id'] ?>" />-->
															</td>
															<td><?= $data['no'] ?></td>
															<td><?= $data['kode'] ?></td>
															<td width="30%"><?= $data['nama'] ?></td>
															<td><?= $data['uraian'] ?></td>
															<td class='nowrap'>
																<button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																	<span class="text-muted sr-only">Action</span>
																</button>
																<div class="dropdown-menu dropdown-menu-right">
																	<a href="<?= site_url("{$this->controller}/form/$p/$o/$data[id]") ?>" class="dropdown-item" title="Ubah"><i class="fe fe-edit"></i> Ubah</a>
																	<?php if ($data['enabled'] == '1') : ?>
																		<a href="<?= site_url("{$this->controller}/lock/$p/$o/$data[id]") ?>" class="dropdown-item" title="Non Aktifkan"><i class="fe fe-unlock">&nbsp;</i> Aktif</a>
																	<?php else : ?>
																		<a href="<?= site_url("{$this->controller}/unlock/$p/$o/$data[id]") ?>" class="dropdown-item" title="Aktifkan"><i class="fe fe-lock"></i> Non Aktif</a>
																	<?php endif ?>
																	<?php if ($this->CI->cek_hak_akses('h')) : ?>
																		<a href="#" data-href="<?= site_url("{$this->controller}/delete/$p/$o/$data[id]") ?>" class="dropdown-item" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash"></i> Hapus</a>
																	<?php endif; ?>
																</div>
															</td>
														</tr>
													<?php endforeach; ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
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
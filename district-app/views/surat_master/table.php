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
				<div class="row align-items-center mb-2">
					<div class="col">
						<h5 class="page-title">Format Surat Desa</h5>
					</div>
					<div class="col-auto">
							<a href="<?= site_url('surat_master/form') ?>" title="Tambah Format Surat" class="btn btn-primary mb-2"><i class="fe fe-plus"></i> Tambah Format Surat</a>
							<a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform','<?= site_url("surat_master/delete_all/$p/$o") ?>')" class="btn btn-danger mb-2 hapus-terpilih"><i class='fe fe-trash'></i> Hapus Data Terpilih</a>
					</div>
				</div>
				<div class="card shadow">
					<div class="card-header">
						<select class="form-control col-md-2" name="filter" onchange="formAction('mainform','<?= site_url('surat_master/filter') ?>')">
							<option value="">Semua</option>
							<option value="1" <?php if ($filter == 1) : ?>selected<?php endif; ?>>Surat Sistem</option>
							<option value="2" <?php if ($filter == 2) : ?>selected<?php endif; ?>>Surat Desa</option>
						</select>
						<!--<div class="input-group col-md-3 input-group-sm pull-right">
							<input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?= html_escape($cari) ?>" onkeypress="if (event.keyCode == 13)):$('#'+'mainform').attr('action','<?= site_url('surat_master/search') ?>');$('#'+'mainform').submit();};">
							<div class="input-group-btn">
								<button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action','<?= site_url("surat_master/search") ?>');$('#'+'mainform').submit();"><i class="fe fe-search"></i></button>
							</div>
						</div>-->
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<form id="mainform" name="mainform" action="" method="post">
									<table class="table datatables table-hover table-responsive" id="dataTable-1">
										<thead>
											<tr>
												<th><input type="checkbox" id="checkall" /></th>
												<th>No</th>
												<th>Aksi</th>
												<?php if ($o == 4) : ?>
													<th><a href="<?= site_url("surat_master/index/$p/3") ?>">Nama Surat <i class='fe fe-sort-asc fa-sm'></i></a></th>
												<?php elseif ($o == 3) : ?>
													<th><a href="<?= site_url("surat_master/index/$p/4") ?>">Nama Surat <i class='fe fe-sort-desc fa-sm'></i></a></th>
												<?php else : ?>
													<th><a href="<?= site_url("surat_master/index/$p/3") ?>">Nama Surat <i class='fe fe-sort fa-sm'></i></a></th>
												<?php endif; ?>
												<?php if ($o == 6) : ?>
													<th nowrap><a href="<?= site_url("surat_master/index/$p/5") ?>">Kode/Klasifikasi <i class='fe fe-sort-asc fa-sm'></i></a></th>
												<?php elseif ($o == 5) : ?>
													<th nowrap><a href="<?= site_url("surat_master/index/$p/6") ?>">Kode/Klasifikasi <i class='fe fe-sort-desc fa-sm'></i></a></th>
												<?php else : ?>
													<th nowrap><a href="<?= site_url("surat_master/index/$p/5") ?>">Kode/Klasifikasi <i class='fe fe-sort fa-sm'></i></a></th>
												<?php endif; ?>
												<th>URL</th>
												<th>Lampiran</th>
												<th>Template Surat</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($main as $data) : ?>
												<tr <?php if ($data['jenis'] != 1) : ?>style='background-color:#f8deb5 !important;' <?php endif; ?>>
													<td><input type="checkbox" name="id_cb[]" value="<?= $data['id'] ?>" /></td>
													<td><?= $data['no'] ?></td>
													<td nowrap>
														<a href="<?= site_url("surat_master/form/$p/$o/$data[id]") ?>" class="btn btn-warning" title="Ubah Data"><i class="fe fe-edit"></i></a>
														<?php if ($data['kunci'] == '0') : ?>
															<a href="<?= site_url("surat_master/lock/$data[id]/$data[kunci]") ?>" class="btn btn-success" title="Non-Aktifkan Surat"><i class="fe fe-unlock"></i></a>
															<?php if ($data['favorit'] == 1) : ?>
																<a href="<?= site_url("surat_master/favorit/$data[id]/$data[favorit]") ?>" class="btn btn-primary" title="Keluarkan dari Daftar Favorit"><i class="fe fe-star"></i></a>
															<?php else : ?>
																<a href="<?= site_url("surat_master/favorit/$data[id]/$data[favorit]") ?>" class="btn btn-secondary" title="Tambahkan ke Daftar Favorit"><i class="fe fe-star"></i></a>
															<?php endif; ?>
														<?php elseif ($data['kunci'] == '1') : ?>
															<a href="<?= site_url("surat_master/lock/$data[id]/$data[kunci]") ?>" class="btn btn-secondary" title="Aktifkan Surat"><i class="fe fe-lock"></i></a>
														<?php endif ?>
														<?php if ($data['jenis'] != 1) : ?>
															<a href="#" data-href="<?= site_url("surat_master/delete/$p/$o/$data[id]") ?>" class="btn btn-danger" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash"></i></a>
														<?php endif; ?>
													</td>
													<td><?= $data['nama'] ?></td>
													<td><?= $data['kode_surat'] ?></td>
													<td><?= $data['url_surat'] ?></td>
													<td><?= $data['lampiran'] ?></td>
													<td nowrap>
														<a href="<?= site_url("surat_master/kode_isian/$p/$o/$data[id]") ?>" class="btn btn-primary" title="Kode Isian"><i class="fe fe-code"></i> Kode Isian</a>
														<a href="<?= site_url("surat_master/form_upload/$p/$o/$data[url_surat]") ?>" data-remote="false" data-toggle="modal" data-target="#modalBox" title="Unggah Template Format Surat" data-title="Unggah Template Format Surat" class="btn btn-outline-primary"><i class='fe fe-upload'></i> Unggah</a>
														<?php $surat = SuratExport($data[url_surat]); ?>
														<?php if ($surat != "") : ?>
															<a href="<?= base_url($surat) ?>" class="btn btn-outline-primary" title="Unduh Template Format Surat"><i class="fe fe-download"></i>Unduh </a>
														<?php endif; ?>
													</td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
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
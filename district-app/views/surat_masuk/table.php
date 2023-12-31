<script>
	$(function() {
		var keyword = <?= $keyword ?>;
		$("#cari").autocomplete({
			source: keyword,
			maxShowItems: 10,
		});
	});
	$('document').ready(function() {
		$('select[name=pamong_ttd]').change(function(e) {
			$('select[name=jabatan_ttd]').val($(this).find(':selected').data('jabatan'));
		});
		$('select[name=pamong_ketahui]').change(function(e) {
			$('select[name=jabatan_ketahui]').val($(this).find(':selected').data('jabatan'));
		});
	});
</script>
<div class="card shadow">
	<div class="card-header">
		<a href="<?= site_url('surat_masuk/form') ?>" title="Tambah Surat Masuk Baru" class="btn btn-primary btn-sm mr-1"><i class="fe fe-plus"></i> Tambah Surat Masuk Baru</a>
		<a href="#confirm-delete" title="Hapus Data" title="Hapus Data Terpilih" onclick="deleteAllBox('mainform','<?= site_url("surat_masuk/delete_all/$p/$o") ?>')" class="btn btn-outline-danger btn-sm mr-1 hapus-terpilih"><i class='fe fe-trash'></i> Hapus Data Terpilih</a>
		<a href="<?= site_url("{$this->controller}/dialog_cetak/$o") ?>" class="btn btn-outline-primary btn-sm mr-1" title="Cetak Agenda Surat Masuk" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak Agenda Surat Masuk"><i class="fe fe-printer "></i> Cetak</a>
		<a href="<?= site_url("{$this->controller}/dialog_unduh/$o") ?>" title="Unduh Agenda Surat Keluar" class="btn btn-outline-primary btn-sm mr-1" title="Unduh Agenda Surat Masuk" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh Agenda Surat Masuk"><i class="fe fe-download"></i> Unduh</a>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12">
				<form id="mainform" name="mainform" action="" method="post">
					<div class="row col-md-3 mb-2">
						<select class="form-control form-control-sm mb-2" name="filter" onchange="formAction('mainform','<?= site_url($this->controller . '/filter') ?>')">
							<option value="">Tahun Penerimaan</option>
							<?php foreach ($tahun_penerimaan as $tahun) : ?>
								<option value="<?= $tahun['tahun'] ?>" <?php selected($filter, $tahun['tahun']) ?>><?= $tahun['tahun'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<table class="table datatables table-hover table-responsive" id="dataTable-1">
								<thead>
									<tr class="text-dark">
										<th class="nostretch"><input type="checkbox" id="checkall" /></th>
										<th class="nostretch text-muted">No. Urut</th>
										<th class="nostretch text-muted">Tanggal Penerimaan <i class='fe fe-sort-asc fa-sm'></i></a></th>
										<th class="nostretch text-muted">Nomor Surat</th>
										<th class="nostretch text-muted">Tanggal Surat</th>
										<th class="nostretch text-muted">Pengirim <i class='fe fe-sort-asc fa-sm'></th>
										<th class="nostretch text-muted" width="30%">Isi Singkat</th>
										<th class="nostretch text-muted">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($main as $data) : ?>
										<tr>
											<td><input type="checkbox" name="id_cb[]" value="<?= $data['id'] ?>" /></td>
											<td><?= $data['nomor_urut'] ?></td>
											<td nowrap><?= tgl_indo_out($data['tanggal_penerimaan']) ?></td>
											<td nowrap><?= $data['nomor_surat'] ?></td>
											<td nowrap><?= tgl_indo_out($data['tanggal_surat']) ?></td>
											<td nowrap><?= $data['pengirim'] ?></td>
											<td><?= $data['isi_singkat'] ?></td>
											<td>
												<button class="btn btn-sm btn-outline-primary dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<span class="text-muted sr-only">Action</span>
												</button>
												<div class="dropdown-menu dropdown-menu-right">
													<a href="<?= site_url("surat_masuk/form/$p/$o/$data[id]") ?>" class="dropdown-item" title="Ubah Data"><i class="fe fe-edit"></i> Ubah</a>
													<?php if ($data['berkas_scan']) : ?>
														<a href="<?= base_url(LOKASI_ARSIP . $data['berkas_scan']) ?>" class="dropdown-item" title="Unduh Berkas Surat" target="_blank"><i class="fe fe-download"></i> Unduh</a>
													<?php endif; ?>
													<a href="<?= site_url("surat_masuk/dialog_disposisi/$o/$data[id]") ?>" class="dropdown-item" title="Cetak Lembar Disposisi Surat" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak Lembar Disposisi Surat"><i class="fe fe-folder"></i> Cetak Disposisi</a>
													<a href="#" data-href="<?= site_url("surat_masuk/delete/$p/$o/$data[id]") ?>" class="dropdown-item" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash"></i> Hapus</a>
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
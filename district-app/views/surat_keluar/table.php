<script>
	$(function() {
		var keyword = <?= $keyword ?>;
		$("#cari").autocomplete({
			source: keyword,
			maxShowItems: 10,
		});
	});
</script>
<div class="card shadow">
	<div class="card-header">
		<a href='<?= site_url("{$this->controller}/form") ?>' title="Tambah Surat Keluar Baru" class="btn btn-primary btn-sm mr-1"><i class="fe fe-plus"></i> Tambah Surat Keluar Baru</a>
		<a href="#confirm-delete" title="Hapus Data" title="Hapus Data Terpilih" onclick="deleteAllBox('mainform','<?= site_url("{$this->controller}/delete_all/$p/$o") ?>')" class="btn btn-outline-danger btn-sm btn-sm  mr-1 hapus-terpilih"><i class='fe fe-trash'></i> Hapus Data Terpilih</a>
		<a href="<?= site_url("{$this->controller}/dialog_cetak/$o") ?>" class="btn btn-outline-info btn-sm btn-sm mr-1" title="Cetak Agenda Surat Keluar" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak Agenda Surat Keluar"><i class="fe fe-printer "></i> Cetak</a>
		<a href="<?= site_url("{$this->controller}/dialog_unduh/$o") ?>" title="Unduh Agenda Surat Keluar" class="btn btn-outline-info btn-sm btn-sm mr-1" title="Unduh Agenda Surat Keluar" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh Agenda Surat Keluar"><i class="fe fe-download"></i> Unduh</a>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12">
				<form id="mainform" name="mainform" action="" method="post">
					<div class="row col-md-3 mb-2">
						<select class="form-control input-sm " name="filter" onchange="formAction('mainform','<?= site_url($this->controller . '/filter') ?>')">
							<option value="">Tahun</option>
							<?php foreach ($tahun_surat as $tahun) : ?>
								<option value="<?= $tahun['tahun'] ?>" <?php selected($filter, $tahun['tahun']) ?>><?= $tahun['tahun'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<table class="table datatables table-hover table-responsive" id="dataTable-1">
								<thead>
									<tr>
										<th class="nostretch"><input type="checkbox" id="checkall" /></th>
										<th class="nostretch text-muted">No. Urut</th>
										<th class="nostretch text-muted">Nomor Surat</th>
										<th class="nostretch text-muted">Tanggal Surat</th>
										<th class="nostretch text-muted" nowrap>Ditujukan Kepada</th>
										<th class="nostretch text-muted" width="30%">Isi Singkat</th>
										<th class="nostretch text-muted">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($main as $data) : ?>
										<tr>
											<td><input type="checkbox" name="id_cb[]" value="<?= $data['id'] ?>" /></td>
											<td class="nostretch"><?= $data['nomor_urut'] ?></td>
											<td class="nostretch"><?= $data['nomor_surat'] ?></td>
											<td nowrap><?= tgl_indo_out($data['tanggal_surat']) ?></td>
											<td nowrap><?= $data['tujuan'] ?></td>
											<td><?= $data['isi_singkat'] ?></td>
											<td class="nostretch">
												<button class="btn btn-sm btn-outline-primary dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<span class="text-muted sr-only">Action</span>
												</button>
												<div class="dropdown-menu dropdown-menu-right">
													<a href="<?= site_url("{$this->controller}/form/$p/$o/$data[id]") ?>" class="btn btn-outline-info btn-sm" title="Ubah Data"><i class="fe fe-edit"></i></a>
													<?php if ($data['berkas_scan']) : ?>
														<a href='<?= site_url("{$this->controller}/unduh_berkas_scan/$data[id]") ?>' class="btn btn-outline-info btn-sm" title="Unduh Berkas Surat" target="_blank"><i class="fe fe-download"></i></a>
													<?php endif; ?>
													<?php if ($data['ekspedisi']) : ?>
														<a href='<?= site_url("ekspedisi/index/") ?>' class="btn bg-info btn-box btn-sm" title="Buku Ekspedisi"><i class="fe fe-envelope-open"></i></a>
													<?php else : ?>
														<a href='<?= site_url("{$this->controller}/untuk_ekspedisi/$p/$o/$data[id]") ?>' class="btn bg-blue btn-box btn-sm" title="Tambahkan ke Buku Ekspedisi"><i class="fe fe-envelope-open"></i></a>
													<?php endif; ?>
													<a href="#" data-href="<?= site_url("{$this->controller}/delete/$p/$o/$data[id]") ?>" class="btn btn-outline-info btn-sm" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash"></i></a>
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
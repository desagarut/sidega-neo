<script>
	$(function() {
		var keyword = <?= $keyword ?>;
		$("#cari").autocomplete({
			source: keyword,
			maxShowItems: 10,
		});
	});
</script>
<div class="card shadow mt-2">
	<div class="card-header">
		<a href="<?= site_url("{$this->controller}/dialog/cetak/$o") ?>" class="btn btn-outline-primary btn-sm mr-1" title="Cetak Buku Ekspedisi" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak Buku Ekspedisi"><i class="fe fe-printer "></i> Cetak</a>
		<a href="<?= site_url("{$this->controller}/dialog/unduh/$o") ?>" title="Unduh Buku Ekspedisi" class="btn btn-outline-primary btn-sm mr-1" title="Unduh Buku Ekspedisi" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh Buku Ekspedisi"><i class="fe fe-download"></i> Unduh</a>
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
										<th class="nostretch">No.</th>
										<th class="nostretch">Aksi</th>
										<?php if ($o == 8) : ?>
											<th><a href="<?= site_url("{$this->controller}/index/$p/7") ?>">Tgl Pengiriman <i class='fe fe-sort-asc fa-sm'></i></a></th>
										<?php elseif ($o == 7) : ?>
											<th><a href="<?= site_url("{$this->controller}/index/$p/8") ?>">Tgl Pengiriman <i class='fe fe-sort-desc fa-sm'></i></a></th>
										<?php else : ?>
											<th><a href="<?= site_url("{$this->controller}/index/$p/7") ?>">Tgl Pengiriman <i class='fe fe-sort fa-sm'></i></a></th>
										<?php endif; ?>
										<th class="nostretch">No. Surat</th>
										<th>Tgl Surat</th>
										<th>Isi Singkat</th>
										<?php if ($o == 6) : ?>
											<th nowrap><a href="<?= site_url("{$this->controller}/index/$p/5") ?>">Ditujukan Kepada <i class='fe fe-sort-asc fa-sm'></i></a></th>
										<?php elseif ($o == 5) : ?>
											<th nowrap><a href="<?= site_url("{$this->controller}/index/$p/6") ?>">Ditujukan Kepada <i class='fe fe-sort-desc fa-sm'></i></a></th>
										<?php else : ?>
											<th nowrap><a href="<?= site_url("{$this->controller}/index/$p/5") ?>">Ditujukan Kepada <i class='fe fe-sort fa-sm'></i></a></th>
										<?php endif; ?>
										<th>Keterangan</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($main as $indeks => $data) : ?>
										<tr>
											<td class="nostretch"><?= $indeks + 1 ?></td>
											<td class="nostretch">
												<a href="<?= site_url("{$this->controller}/form/$p/$o/$data[id]") ?>" class="btn bg-orange btn-box btn-sm" title="Ubah Data"><i class="fe fe-edit"></i></a>
												<?php if ($data['tanda_terima']) : ?>
													<a href='<?= site_url("{$this->controller}/unduh_tanda_terima/$data[id]") ?>' class="btn btn-outline-info btn-sm" title="Unduh Tanda Terima" target="_blank"><i class="fe fe-download"></i></a>
												<?php endif; ?>
												<a href="<?= site_url("{$this->controller}/bukan_ekspedisi/$p/$o/$data[id]") ?>" class="btn bg-olive btn-box btn-sm" title="Keluarkan dari Buku Ekspedisi"><i class="fe fe-undo"></i></a>
											</td>
											<td><?= tgl_indo_out($data['tanggal_pengiriman']) ?></td>
											<td class="nostretch"><?= $data['nomor_surat'] ?></td>
											<td nowrap><?= tgl_indo_out($data['tanggal_surat']) ?></td>
											<td><?= $data['isi_singkat'] ?></td>
											<td nowrap><?= $data['tujuan'] ?></td>
											<td><?= $data['keterangan'] ?></td>
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
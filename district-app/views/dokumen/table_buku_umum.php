<script type="text/javascript">
	var baseURL = "<?= base_url(); ?>";
	$(function() {
		var keyword = <?= $keyword ?>;
		$("#cari").autocomplete({
			source: keyword,
			maxShowItems: 10,
		});
	});

	$(document).ready(function() {
		$('#modalEkspor').on('show.bs.modal', function(e) {
			var link = $(e.relatedTarget);
			var title = link.data('title');
			var modal = $(this)
			modal.find('.modal-title').text(title)
			$(this).find('.fetched-data').load(link.attr('href'));
		});
	});
</script>
<div class="card shadow">
	<div class="card-header">
		<a href="<?= site_url("{$this->controller}/form/$kat") ?>" class="btn btn-primary btn-sm" title="Tambah Menu Baru">
			<i class="fe fe-plus"></i>Tambah <?= $kat_nama ?> Baru
		</a>
		<?php if ($this->CI->cek_hak_akses('h')) : ?>
			<a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '<?= site_url("{$this->controller}/delete_all/$kat/$p/$o") ?>')" class="btn btn-outline-danger btn-sm hapus-terpilih"><i class='fe fe-trash'></i> Hapus Data Terpilih</a>
		<?php endif; ?>
		<a href="<?= site_url("{$this->controller}/dialog_cetak/$kat") ?>" class="btn btn-outline-primary btn-sm" title="Cetak Dokumen" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak Laporan">
			<i class="fe fe-printer"></i> Cetak
		</a>
		<a href="<?= site_url("{$this->controller}/dialog_excel/$kat") ?>" class="btn btn-outline-primary btn-sm" title="Unduh Dokumen" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh Laporan">
			<i class="fe fe-download"></i> Unduh
		</a>
		<?php if ($kat == 1) : ?>
			<a href="<?= site_url("informasi_publik/ekspor") ?>" class="btn bg-blue btn-sm btn-sm " title="Ekspor Data" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ekspor Data Informasi Publik">
				<i class="fe fe-download"></i>Ekspor
			</a>
		<?php endif; ?>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12">
				<form id="mainform" name="mainform" action="" method="post">
					<input name="kategori" type="hidden" value="<?= $kat ?>">
					<div class="row mb-2">
						<div class="col-sm-2">
							<select class="form-control input-sm " name="filter" onchange="formAction('mainform','<?= site_url($this->controller . '/filter') ?>')">
								<option value="">Status</option>
								<option value="1" <?php selected($this->session->filter, 1); ?>>Aktif</option>
								<option value="2" <?php selected($this->session->filter, 2); ?>>Tidak Aktif</option>
							</select>
						</div>
						<div class="col-sm-3">
							<?php if ($kat == 3) : ?>
								<select class="form-control input-sm " name="jenis_peraturan" onchange="formAction('mainform','<?= site_url($this->controller . '/filter/jenis_peraturan') ?>')">
									<option value="">Jenis Peraturan</option>
									<?php foreach ($jenis_peraturan as $jenis) : ?>
										<option value="<?= $jenis ?>" <?php selected($this->session->jenis_peraturan, $jenis) ?>><?= $jenis ?></option>
									<?php endforeach; ?>
								</select>
							<?php endif; ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<table class="table datatables table-hover table-responsive" id="dataTable-1">
								<thead>
									<tr>
										<th><input type="checkbox" id="checkall" /></th>
										<th>No</th>
										<th>Aksi</th>
										<?php if ($o == 2) : ?>
											<th><a href="<?= site_url("{$this->controller}/index/$kat/$p/1") ?>">Judul <i class='fe fe-sort-asc fa-sm'></i></a></th>
										<?php elseif ($o == 1) : ?>
											<th><a href="<?= site_url("{$this->controller}/index/$kat/$p/2") ?>">Judul <i class='fe fe-sort-desc fa-sm'></i></a></th>
										<?php else : ?>
											<th><a href="<?= site_url("{$this->controller}/index/$kat/$p/1") ?>">Judul <i class='fe fe-sort fa-sm'></i></a></th>
										<?php endif; ?>
										<?php if ($kat == 1) : ?>
											<th>Kategori Info Publik</th>
											<th>Tahun</th>
										<?php elseif ($kat == 2) : ?>
											<th nowrap>No./Tgl Keputusan</th>
											<th nowrap>Uraian Singkat</th>
										<?php elseif ($kat == 3) : ?>
											<th>Jenis Peraturan</th>
											<th>No./Tgl Ditetapkan</th>
											<th>Uraian Singkat</th>
										<?php endif; ?>
										<?php if ($o == 4) : ?>
											<th nowrap><a href="<?= site_url("{$this->controller}/index/$kat/$p/3") ?>">Aktif <i class='fe fe-sort-asc fa-sm'></i></a></th>
										<?php elseif ($o == 3) : ?>
											<th nowrap><a href="<?= site_url("{$this->controller}/index/$kat/$p/4") ?>">Aktif <i class='fe fe-sort-desc fa-sm'></i></a></th>
										<?php else : ?>
											<th nowrap><a href="<?= site_url("{$this->controller}/index/$kat/$p/3") ?>">Aktif <i class='fe fe-sort fa-sm'></i></a></th>
										<?php endif; ?>
										<?php if ($o == 6) : ?>
											<th nowrap><a href="<?= site_url("{$this->controller}/index/$kat/$p/5") ?>">Dimuat Pada <i class='fe fe-sort-asc fa-sm'></i></a></th>
										<?php elseif ($o == 5) : ?>
											<th nowrap><a href="<?= site_url("{$this->controller}/index/$kat/$p/6") ?>">Dimuat Pada <i class='fe fe-sort-desc fa-sm'></i></a></th>
										<?php else : ?>
											<th nowrap><a href="<?= site_url("{$this->controller}/index/$kat/$p/5") ?>">Dimuat Pada <i class='fe fe-sort fa-sm'></i></a></th>
										<?php endif; ?>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($main as $data) : ?>
										<tr>
											<td><input type="checkbox" name="id_cb[]" value="<?= $data['id'] ?>" /></td>
											<td><?= $data['no'] ?></td>
											<td nowrap>
												<a href="<?= site_url("{$this->controller}/form/$kat/$p/$o/$data[id]") ?>" class="btn btn-warning btn-box btn-sm" title="Ubah"><i class="fe fe-edit"></i></a>
												<?php if ($data['enabled'] == '2') : ?>
													<a href="<?= site_url($this->controller . '/dokumen_lock/' . $kat . '/' . $data['id']) ?>" class="btn bg-navy btn-box btn-sm" title="Aktifkan"><i class="fe fe-lock">&nbsp;</i></a>
												<?php elseif ($data['enabled'] == '1') : ?>
													<a href="<?= site_url($this->controller . '/dokumen_unlock/' . $kat . '/' . $data['id']) ?>" class="btn bg-navy btn-box btn-sm" title="Non Aktifkan"><i class="fe fe-unlock"></i></a>
												<?php endif ?>
												<?php if (!empty($data['satuan'])) : ?>
													<a href='<?= site_url("dokumen/unduh_berkas/{$data[id]}") ?>' class="btn btn-outline-info btn-sm" title="Unduh"><i class="fe fe-download"></i></a>
												<?php else : ?>
													<a class="btn btn-outline-info btn-sm" disabled title="Unduh"><i class="fe fe-download"></i></a>
												<?php endif; ?>
												<a href="#" data-href="<?= site_url("{$this->controller}/delete/$kat/$p/$o/$data[id]") ?>" class="btn bg-maroon btn-box btn-sm" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash-o"></i></a>
											</td>
											<td width="20%"><?= $data['nama'] ?></td>
											<?php if ($kat == 1) : ?>
												<td><?= $data['kategori_info_publik'] ?></td>
												<td><?= $data['tahun'] ?></td>
											<?php elseif ($kat == 2) : ?>
												<td><?= $data['attr']['no_kep_kades'] . " / " . $data['attr']['tgl_kep_kades'] ?></td>
												<td><?= $data['attr']['uraian'] ?></td>
											<?php elseif ($kat == 3) : ?>
												<td><?= $data['attr']['jenis_peraturan'] ?></td>
												<td><?= strip_kosong($data['attr']['no_ditetapkan']) . " / " . $data['attr']['tgl_ditetapkan'] ?></td>
												<td width="20%"><?= $data['attr']['uraian'] ?></td>
											<?php endif; ?>
											<td><?= $data['aktif'] ?></td>
											<td nowrap><?= tgl_indo2($data['tgl_upload']) ?></td>
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
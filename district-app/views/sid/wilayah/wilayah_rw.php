<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="row align-items-center mb-2">
					<div class="col">
						<h5 class="page-title">Wilayah Administratif RW <?= ucwords($this->setting->sebutan_dusun) ?> <?= $dusun ?></h5>
					</div>
					<div class="col-auto">
						<?php if ($this->CI->cek_hak_akses('h')) : ?>
							<a href="<?= site_url("sid_core/form_rw/$id_dusun") ?>" class="btn btn-primary btn-sm mb-2 text-light" title="Tambah Data"><i class="fe fe-plus fe-16 mr-2 text-light"></i> Tambah</a>
						<?php endif; ?>
						<a href="<?= site_url("sid_core/cetak_rw/$id_dusun") ?>" class="btn btn-outline-primary btn-sm mb-2" title="Cetak Data" target="_blank"><i class="fe fe-printer fe-16 mr-2"></i> Cetak</a>
						<a href="<?= site_url("sid_core/excel_rw/$id_dusun") ?>" class="btn btn-outline-primary btn-sm mb-2" title="Unduh Data" target="_blank"><i class="fe fe-download fe-16 mr-2"></i> Unduh</a>
						<a href="<?= site_url("sid_core") ?>" class="btn btn-outline-primary btn-sm mb-2" title="Kembali Ke Daftar RW"><i class="fe fe-arrow-left fe-16 mr-2"></i>Kembali ke Daftar <?= ucwords($this->setting->sebutan_dusun) ?></a>
					</div>
				</div>
				<div class="card shadow">
					<div class="card-body">
						<table class="table datatables " id="dataTable-1">
							<thead>
								<tr class="text-muted">
									<th>No</th>
									<th>RW</th>
									<th>Ketua RW</th>
									<th>RT</th>
									<th>KK</th>
									<th>L+P</th>
									<th>L</th>
									<th>P</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($main as $indeks => $data) : ?>
									<tr>
										<td><?= $data['no'] ?></td>
										<td>
											<a href="<?= site_url("sid_core/sub_rt/$id_dusun/$data[id]") ?>" title="Rincian Sub Wilayah RW"><?= $data['rw'] ?></a>
										</td>
										<?php if ($data['rw'] == "-") : ?>
											<td>
												-
											</td>
										<?php else : ?>
											<td nowrap><strong><?= $data['nama_ketua'] ?></strong><br />
												<?= $data['nik_ketua'] ?></td>
										<?php endif; ?>
										<td><a href="<?= site_url("sid_core/sub_rt/$id_dusun/$data[id]") ?>" title="Rincian Sub Wilayah"><?= $data['jumlah_rt'] ?></a></td>
										<td><?= $data['jumlah_kk'] ?></td>
										<td><?= $data['jumlah_warga'] ?></td>
										<td><?= $data['jumlah_warga_l'] ?></td>
										<td><?= $data['jumlah_warga_p'] ?></td>
										<td>
											<button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<span class="text-muted sr-only">Action</span>
											</button>
											<div class="dropdown-menu dropdown-menu-left">
												<a href="<?= site_url("sid_core/sub_rt/$id_dusun/$data[id]") ?>" class="dropdown-item" title="Rincian Sub Wilayah RW">Daftar RT</a>
												<?php if ($data['rw'] != "-") : ?>
													<a href="<?= site_url("sid_core/ajax_kantor_rw_google_maps/$id_dusun/$data[id]") ?>" class="dropdown-item" title="Lokasi Kantor">Lokasi</a>
													<a href="<?= site_url("sid_core/ajax_wilayah_rw_google_maps/$id_dusun/$data[id]") ?>" class="dropdown-item" title="Peta Google">Peta Google</a>
													<a href="<?= site_url("sid_core/ajax_wilayah_rw_openstreet_maps/$id_dusun/$data[id]") ?>" class="dropdown-item" title="Peta Openstreet">Peta OSM</a>
												<?php endif; ?>
												<?php if ($this->CI->cek_hak_akses('u')) : ?>
													<?php if ($data['rw'] != "-") : ?>
														<a href="<?= site_url("sid_core/form_rw/$id_dusun/$data[id]") ?>" class="dropdown-item" title="Ubah">Ubah</a>
													<?php endif; ?>
													<?php if ($data['rw'] != "-") : ?>
														<a href="#" data-href="<?= site_url("sid_core/delete/rw/$data[id]") ?>" class="dropdown-item bg-danger text-light" title="Hapus" data-toggle="modal" data-target="#confirm-delete">Hapus</a>
													<?php endif; ?>
												<?php endif; ?>
											</div>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
							<tfoot>
								<tr>
									<th colspan="4"><label>TOTAL</label></th>
									<th><?= $total['jmlrt'] ?></th>
									<th><?= $total['jmlkk'] ?></th>
									<th><?= $total['jmlwarga'] ?></th>
									<th><?= $total['jmlwargal'] ?></th>
									<th><?= $total['jmlwargap'] ?></th>
									<th></th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php $this->load->view('global/confirm_delete'); ?>
<script src="<?= base_url('assets/js/jquery.validate.min.js') ?>"></script>
<script src="<?= base_url('assets/js/validasi.js') ?>"></script>
<script src="<?= base_url('assets/js/messages_id.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/js/dataTables.bootstrap4.min.js') ?>"></script>
<script>
	$('#dataTable-1').DataTable({
		autoWidth: true,
		"lengthMenu": [
			[10, 25, 50, -1],
			[10, 32, 64, "All"]
		]
	});
</script>
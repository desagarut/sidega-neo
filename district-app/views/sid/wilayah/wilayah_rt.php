<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="row align-items-center mb-2">
					<div class="col">
						<h5 class="page-title">Wilayah Administratif RW <?= $rw ?> <?= ucwords($this->setting->sebutan_dusun) ?> <?= $dusun ?></h5>
					</div>
					<div class="col-auto">
						<?php if ($this->CI->cek_hak_akses('h')) : ?>
							<a href="<?= site_url("sid_core/form_rt/$id_dusun/$id_rw") ?>" class="btn btn-primary btn-sm mb-2 text-light" title="Tambah Data"><i class="fe fe-plus fe-16 mr-2 text-light"></i> Tambah</a>
						<?php endif; ?>
						<a href="<?= site_url("sid_core/cetak_rt/$id_dusun/$id_rw") ?>" class="btn btn-sm mb-2 btn-outline-primary" title="Cetak Data" target="_blank"><i class="fe fe-printer fe-16 mr-2"></i> Cetak</a>
						<a href="<?= site_url("sid_core/excel_rt/$id_dusun/$id_rw") ?>" class="btn btn-sm mb-2 btn-outline-primary" title="Unduh Data" target="_blank"><i class="fe fe-download fe-16 mr-2"></i> Unduh</a>
						<a href="<?= site_url("sid_core/sub_rw/$id_dusun") ?>" class="btn btn-sm mb-2 btn-outline-primary" title="Kembali Ke Daftar RW"><i class="fe fe-arrow-left fe-16 mr-2"></i>Kembali ke Daftar RW</a>
					</div>
				</div>
				<div class="card shadow">
					<div class="card-body">
						<table class="table datatables" id="dataTable-1">
							<thead>
								<tr class="text-muted">
									<th>No</th>
									<th>RT</th>
									<th width="30%">Ketua RT</th>
									<th>NIK Ketua RT</th>
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
										<td><?= $indeks + 1 ?></td>
										<td><?= $data['rt'] ?></td>
										<?php if ($data['rt'] == "-") : ?>
											<td>
												-
											</td>
											<td>
												-
											</td>
										<?php else : ?>
											<td><strong><?= $data['nama_ketua'] ?></strong></td>
											<td><?= $data['nik_ketua'] ?></td>
										<?php endif; ?>
										<td><?= $data['jumlah_kk'] ?></td>
										<td><?= $data['jumlah_warga'] ?></td>
										<td><?= $data['jumlah_warga_l'] ?></td>
										<td><?= $data['jumlah_warga_p'] ?></td>
										<td>
											<button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<span class="text-muted sr-only">Action</span>
											</button>
											<div class="dropdown-menu dropdown-menu-left">
												<?php if ($data['rt'] != "-") : ?>
													<a href="<?= site_url("sid_core/ajax_kantor_rt_maps/$id_dusun/$id_rw/$data[id]") ?>" class="dropdown-item" title="Lokasi Kantor">Lokasi</a>
													<a href="<?= site_url("sid_core/ajax_wilayah_rt_google_maps/$id_dusun/$id_rw/$data[id]") ?>" class="dropdown-item" title="Peta Google">Peta Google</a>
													<a href="<?= site_url("sid_core/ajax_wilayah_rt_openstreet_maps/$id_dusun/$id_rw/$data[id]") ?>" class="dropdown-item" title="Peta Openstreet">Peta OSM</a>
												<?php endif; ?>
												<?php if ($this->CI->cek_hak_akses('h')) : ?>
													<?php if ($data['rt'] != "-") : ?>
														<a href="<?= site_url("sid_core/form_rt/$id_dusun/$id_rw/$data[id]") ?>" class="dropdown-item" title="Ubah">Ubah</a>
														<a href="#" data-href="<?= site_url("sid_core/delete/rt/$data[id]") ?>" class="dropdown-item bg-danger text-light" title="Hapus" data-toggle="modal" data-target="#confirm-delete">Hapus</a>
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
<script src="<?= base_url() ?>assets/
js/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/
js/validasi.js"></script>
<script src="<?= base_url() ?>assets/
js/messages_id.js"></script>
<script src='<?= base_url() ?>assets/
js/jquery.dataTables.min.js'></script>
<script src='<?= base_url() ?>assets/
js/dataTables.bootstrap4.min.js'></script>
<script>
	$('#dataTable-1').DataTable({
		autoWidth: true,
		"lengthMenu": [
			[10, 25, 50, -1],
			[10, 32, 64, "All"]
		]
	});
</script>
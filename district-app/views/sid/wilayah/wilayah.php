<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="row align-items-center mb-2">
					<div class="col">
						<h5 class="page-title">Wilayah Administratif <?= ucwords($this->setting->sebutan_dusun) ?></h5>
					</div>
					<div class="col-auto">
						<?php if ($this->CI->cek_hak_akses('h')) : ?>
							<a href="<?= site_url("sid_core/form") ?>" class="btn mb-2 btn-primary text-light" title="Tambah"><i class="fe fe-plus text-light"></i> Tambah</a>
						<?php endif; ?>
						<a href="<?= site_url("sid_core/dialog/cetak") ?>" class="btn mb-2 btn-outline-primary" data-toggle="modal" data-target="#modalBox"><i class="fe fe-printer"></i> Cetak</a>
						<a href="<?= site_url("sid_core/dialog/unduh") ?>" class="btn mb-2 btn-outline-primary" title="Unduh Data" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh Data"><i class="fe fe-download"></i> Unduh</a>
					</div>
				</div>
				<div class="card shadow">
					<div class="card-body">
						<table class="table datatables" id="dataTable-1">
							<thead>
								<tr class="text-muted">
									<th>No</th>
									<th>Nama <?= ucwords($this->setting->sebutan_dusun) ?></th>
									<th>Kepala <?= ucwords($this->setting->sebutan_dusun) ?></th>
									<th>RW</th>
									<th>RT</th>
									<th>KK</th>
									<th>L+P</th>
									<th>L</th>
									<th>P</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$total = array();
								$total['total_rw'] = 0;
								$total['total_rt'] = 0;
								$total['total_kk'] = 0;
								$total['total_warga'] = 0;
								$total['total_warga_l'] = 0;
								$total['total_warga_p'] = 0;
								foreach ($main as $data) :
								?>
									<tr>
										<td class="no_urut"><?= $data['no'] ?></td>
										<td><a href="<?= site_url("sid_core/sub_rw/$data[id]") ?>"><?= strtoupper($this->setting->sebutan_dusun) ?> <?= strtoupper($data['dusun']) ?></a></td>
										<?php if ($data['rt'] == "-") : ?>
											<td>
												-
											</td>
											<td>
												-
											</td>
										<?php else : ?>
											<td nowrap><strong><?= strtoupper($data['nama_kadus']) ?></strong><br />
												<?= $data['nik_kadus'] ?></td>
										<?php endif; ?>
										<td class="bilangan"><a href="<?= site_url("sid_core/sub_rw/$data[id]") ?>" title="Rincian Sub Wilayah"><?= $data['jumlah_rw'] ?></a></td>
										<td class="bilangan"><?= $data['jumlah_rt'] ?></td>
										<td class="bilangan"><a href="<?= site_url("sid_core/warga_kk/$data[id]") ?>"><?= $data['jumlah_kk'] ?></a></td>
										<td class="bilangan"><a href="<?= site_url("sid_core/warga/$data[id]") ?>"><?= $data['jumlah_warga'] ?></a></td>
										<td class="bilangan"><a href="<?= site_url("sid_core/warga_l/$data[id]") ?>"><?= $data['jumlah_warga_l'] ?></a></td>
										<td class="bilangan"><a href="<?= site_url("sid_core/warga_p/$data[id]") ?>"><?= $data['jumlah_warga_p'] ?></a></td>
										<td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<span class="text-muted sr-only">Action</span>
											</button>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="<?= site_url("sid_core/sub_rw/$data[id]") ?>">Daftar RW</a>
												<?php if ($this->CI->cek_hak_akses('h')) : ?>
													<a class="dropdown-item" href="<?= site_url("sid_core/ajax_kantor_dusun_maps_google/$data[id]") ?>">Lokasi</a>
													<a class="dropdown-item" href="<?= site_url("sid_core/ajax_wilayah_dusun_maps_google/$data[id]") ?>">Wilayah - GMaps</a>
													<a class="dropdown-item" href="<?= site_url("sid_core/ajax_wilayah_dusun_openstreet_maps/$data[id]") ?>">Wilayah - OSM</a>
													<a class="dropdown-item" href="<?= site_url("sid_core/form/$data[id]") ?>">Ubah</a>
													<a href="#" data-href="<?= site_url("sid_core/delete/dusun/$data[id]") ?>" class="dropdown-item bg-danger text-light" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash-o"></i> Hapus</a>
												<?php endif; ?>
											</div>
										</td>
									</tr>
								<?php
									$total['total_rw'] += $data['jumlah_rw'];
									$total['total_rt'] += $data['jumlah_rt'];
									$total['total_kk'] += $data['jumlah_kk'];
									$total['total_warga'] += $data['jumlah_warga'];
									$total['total_warga_l'] += $data['jumlah_warga_l'];
									$total['total_warga_p'] += $data['jumlah_warga_p'];
								endforeach;
								?>
							</tbody>
							<tfoot>
								<tr>
									<th colspan="3"><label>TOTAL</label></th>
									<th class="bilangan"><?= $total['total_rw'] ?></th>
									<th class="bilangan"><?= $total['total_rt'] ?></th>
									<th class="bilangan"><?= $total['total_kk'] ?></th>
									<th class="bilangan"><?= $total['total_warga'] ?></th>
									<th class="bilangan"><?= $total['total_warga_l'] ?></th>
									<th class="bilangan"><?= $total['total_warga_p'] ?></th>
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
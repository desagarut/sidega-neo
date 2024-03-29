<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<script>
	$(document).ready(function() {
		$('#tglform').validate();
	});

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
						<h5 class="page-title">Daftar Calon Pemilih</h5>
					</div>
					<div class="col-auto">
						<a href="<?= site_url("dpt/ajax_cetak/$o/cetak") ?>" class="btn btn-outline-info btn-sm" title="Cetak Data" target="_blank" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak Data"><i class="fe fe-printer "></i> Cetak</a>
						<a href="<?= site_url("dpt/ajax_cetak/$o/unduh") ?>" class="btn btn-outline-info btn-sm" title="Unduh Data" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh Data" target="_blank"><i class="fe fe-download"></i> Unduh</a>
						<a href="<?= site_url("dpt/ajax_adv_search") ?>" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Pencarian Spesifik" class="btn btn-outline-info btn-sm" title="Pencarian Spesifik"><i class='fe fe-search'></i> Pencarian Spesifik</a>
						<a href="<?= site_url("dpt/clear") ?>" class="btn btn-outline-info btn-sm" title="Bersihkan Pencarian"><i class="fe fe-refresh"></i>Bersihkan</a>
					</div>
				</div>
				<div class="card shadow">
					<div class="card-header">
						<div class="row">
							<div class="col-auto">
								<select class="form-control input-sm" name="sex" onchange="formAction('mainform', '<?= site_url('dpt/filter/sex') ?>')">
									<option value="">Jenis Kelamin</option>
									<?php foreach ($list_jenis_kelamin as $data) : ?>
										<option value="<?= $data['id'] ?>" <?php selected($sex, $data['id']); ?>><?= set_ucwords($data['nama']) ?></option>
									<?php endforeach; ?>
								</select>
							</div>

							<div class="col-auto">
								<form id="mainform" name="mainform" action="" method="post">
									<select class="form-control" name="dusun" onchange="formAction('mainform','<?= site_url('dpt/dusun') ?>')">
										<option value="">Pilih <?= ucwords($this->setting->sebutan_dusun) ?></option>
										<?php foreach ($list_dusun as $data) : ?>
											<option value="<?= $data['dusun'] ?>" <?php if ($dusun == $data['dusun']) : ?>selected<?php endif ?>><?= set_ucwords($data['dusun']) ?></option>
										<?php endforeach; ?>
									</select>
								</form>
							</div>
							<div class="col-auto">
								<form id="mainform" name="mainform" action="" method="post">
									<?php if ($dusun) : ?>
										<select class="form-control" name="rw" onchange="formAction('mainform','<?= site_url('dpt/rw') ?>')">
											<option value="">Pilih RW</option>
											<?php foreach ($list_rw as $data) : ?>
												<option value="<?= $data['rw'] ?>" <?php if ($rw == $data['rw']) : ?>selected<?php endif ?>><?= set_ucwords($data['rw']) ?></option>
											<?php endforeach; ?>
										</select>
									<?php endif; ?>
								</form>
							</div>
							<div class="col-auto">
								<form id="mainform" name="mainform" action="" method="post">
									<?php if ($rw) : ?>
										<select class="form-control" name="rt" onchange="formAction('mainform','<?= site_url('dpt/rt') ?>')">
											<option value="">Pilih RT</option>
											<?php foreach ($list_rt as $data) : ?>
												<option value="<?= $data['rt'] ?>" <?php if ($rt == $data['rt']) : ?>selected<?php endif ?>><?= $data['rt'] ?></option>
											<?php endforeach; ?>
										</select>
									<?php endif; ?>
								</form>
							</div>
							<div class="col-auto">
								<form id="tglform" name="tglform" action="<?= site_url('dpt/index/1/' . $o) ?>" method="post">
									<div class="input-group row">
										<span class="input-group-addon col-md-6">Tanggal Pemilihan</span>
										<div class="input-group input-group-sm col-md-6 date">
											<input class="form-control datepicker pull-right" onchange="$('#tglform').submit()" name="tanggal_pemilihan" type="text" value="<?= $_SESSION['tanggal_pemilihan'] ?>">
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="card-body">
						<h4 class="text-center"><strong>DAFTAR CALON PEMILIH UNTUK TANGGAL PEMILIHAN <?= $_SESSION['tanggal_pemilihan'] ?></strong></h4>
						<div class="row">
							<div class="col-sm-12">
								<form id="mainform" name="mainform" action="" method="post">
									<input type="hidden" name="rt" value="">
									<div class="row">
										<div class="col-sm-12">
											<table class="table datatables table-hover table-responsive" id="dataTable-1">
												<thead>
													<tr>
														<th>No</th>
														<?php if ($o == 2) : ?>
															<th><a href="<?= site_url("dpt/index/$p/1") ?>">NIK <i class='fe fe-sort-asc fa-sm'></i></a></th>
														<?php elseif ($o == 1) : ?>
															<th><a href="<?= site_url("dpt/index/$p/2") ?>">NIK <i class='fe fe-sort-desc fa-sm'></i></a></th>
														<?php else : ?>
															<th><a href="<?= site_url("dpt/index/$p/1") ?>">NIK <i class='fe fe-sort fa-sm'></i></a></th>
														<?php endif; ?>
														<?php if ($o == 4) : ?>
															<th nowrap><a href="<?= site_url("dpt/index/$p/3") ?>">Nama <i class='fe fe-sort-asc fa-sm'></i></a></th>
														<?php elseif ($o == 3) : ?>
															<th nowrap><a href="<?= site_url("dpt/index/$p/4") ?>">Nama <i class='fe fe-sort-desc fa-sm'></i></a></th>
														<?php else : ?>
															<th nowrap><a href="<?= site_url("dpt/index/$p/3") ?>">Nama <i class='fe fe-sort fa-sm'></i></a></th>
														<?php endif; ?>
														<?php if ($o == 6) : ?>
															<th nowrap><a href="<?= site_url("dpt/index/$p/5") ?>">No. KK <i class='fe fe-sort-asc fa-sm'></i></a></th>
														<?php elseif ($o == 5) : ?>
															<th nowrap><a href="<?= site_url("dpt/index/$p/6") ?>">No. KK <i class='fe fe-sort-desc fa-sm'></i></a></th>
														<?php else : ?>
															<th nowrap><a href="<?= site_url("dpt/index/$p/5") ?>">No. KK <i class='fe fe-sort fa-sm'></i></a></th>
														<?php endif; ?>
														<th>Alamat</th>
														<th><?= ucwords($this->setting->sebutan_dusun); ?></th>
														<th>RW</th>
														<th>RT</th>
														<th nowrap>Pendidikan dalam KK</th>
														<th>Umur</th>
														<th nowrap>Pekerjaan</th>
														<th nowrap>Kawin</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach ($main as $data) : ?>
														<tr>
															<td><?= $data['no'] ?></td>
															<td>
																<a href="<?= site_url("penduduk/detail/$p/$o/$data[id]") ?>" id="test" name="<?= $data['id'] ?>"><?= $data['nik'] ?></a>
															</td>
															<td nowrap><?= strtoupper($data['nama']) ?></td>
															<td><a href="<?= site_url("keluarga/kartu_keluarga/$p/$o/$data[id_kk]") ?>"><?= $data['no_kk'] ?> </a></td>
															<td><?= strtoupper($data['alamat']) ?></td>
															<td><?= strtoupper($data['dusun']) ?></td>
															<td><?= $data['rw'] ?></td>
															<td><?= $data['rt'] ?></td>
															<td><?= $data['pendidikan'] ?></td>
															<td><?= $data['umur_pada_pemilihan'] ?></td>
															<td><?= $data['pekerjaan'] ?></td>
															<td><?= $data['kawin'] ?></td>
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
			</div>
		</div>
	</div>
</main>
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
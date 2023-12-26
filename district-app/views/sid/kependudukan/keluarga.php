<script>
	$(function() {
		$("#cari").autocomplete({
			source: function(request, response) {
				$.ajax({
					type: "POST",
					url: '<?= site_url("keluarga/autocomplete") ?>',
					dataType: "json",
					data: {
						cari: request.term
					},
					success: function(data) {
						response(JSON.parse(data));
					}
				});
			},
			minLength: 2,
		});
	});
</script>

<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="row align-items-center mb-2">
					<div class="col">
						<h2 class="h5 page-title">Master Keluarga</h2>
					</div>
					<div class="col-auto">
						<form class="form-inline">
							<div class="form-group mr-1 mb-2 ">
								<?php if ($this->CI->cek_hak_akses('h')) : ?>
									<button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span>Tambah KK Baru</span>
									</button>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="<?= site_url('keluarga/form') ?>" class="dropdown-item" title="Tambah Data KK Baru"><i class="fe fe-plus"></i> Tambah Penduduk Baru</a>
										<a href="<?= site_url('keluarga/form_old') ?>" class="dropdown-item" title="Tambah Data KK dari keluarga yang sudah ter-input" data-remote="false" data-toggle="modal" data-target="#mymodal" data-title="Tambah Data Kepala Keluarga"><i class="fe fe-plus"></i> Dari Penduduk Sudah Ada</a>
									</div>
								<?php endif; ?>
							</div>
							<!--
							<a href="<?= site_url("keluarga/ajax_cetak/$o/cetak") ?>"><button type="button" class="btn mb-2 btn-outline-info mr-1" title="Cetak Data" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak Data" target="_blank"><span class="fe fe-printer fe-16 mr-2"></span>Cetak</button></a>
							<a href="<?= site_url("keluarga/ajax_cetak/$o/unduh") ?>"><button type="button" class="btn mb-2 btn-outline-info mr-1" title="Unduh Data" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh Data" target="_blank"><span class="fe fe-download fe-16 mr-2"></span>Unduh</button></a>
								-->
							<div class="form-group mr-1 mb-2">
								<button class="btn btn-outline-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span>Aksi terpilih</span>
								</button>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="" class="dropdown-item aksi-terpilih" id="aksi-terpilih" title="Cetak Kartu Keluarga" onclick="formAction('mainform','<?= site_url("keluarga/cetak_kk_all") ?>', '_blank'); return false;"><i class="fe fe-printer"></i> Cetak Kartu Keluarga</a>
									<a href="" class="dropdown-item aksi-terpilih" id="aksi-terpilih" title="Unduh Kartu Keluarga" onclick="formAction('mainform','<?= site_url("keluarga/doc_kk_all") ?>'); return false;"><i class="fe fe-download"></i> Unduh Kartu Keluarga</a>
									<a href="<?= site_url("keluarga/search_kumpulan_kk") ?>" class="dropdown-item" title="Pilihan Kumpulan KK" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Pilihan Kumpulan KK"><i class="fe fe-search"></i> Pilihan Kumpulan KK</a>
									<?php if ($this->CI->cek_hak_akses('h')) : ?>
										<a href="#confirm-delete" id="aksi-terpilih" class="dropdown-item hapus-terpilih" title="Hapus Data" onclick="deleteAllcard('mainform', '<?= site_url("keluarga/delete_all") ?>')"><i class="fe fe-trash"></i> Hapus Data Terpilih</a>
									<?php endif; ?>
								</div>
							</div>
							<a href="<?= site_url("{$this->controller}/clear") ?>"><button type="button" class="btn mb-2 btn-outline-info"><span class="fe fe-refresh fe-16 mr-2"></span>Bersihkan Filter</button></a>
						</form>
					</div>
				</div>
				<div class="card shadow">
					<div class="card-body">
						<form id="mainform" name="mainform" action="" method="post">
							<div class="row">
								<div class="col-auto mb-2">
									<select class="form-control input-sm" name="status_dasar" onchange="formAction('mainform', '<?= site_url('keluarga/filter/status_dasar') ?>')">
										<option value="">Pilih Status KK</option>
										<option value="1" <?= selected($status_dasar, 1); ?>>KK Aktif</option>
										<option value="2" <?= selected($status_dasar, 2); ?>>KK Hilang/Pindah/Mati</option>
										<option value="3" <?= selected($status_dasar, 3); ?>>KK Kosong</option>
									</select>
								</div>
								<div class="col-auto mb-2">
									<select class="form-control input-sm" name="sex" onchange="formAction('mainform', '<?= site_url('keluarga/filter/sex') ?>')">
										<option value="">Pilih Jenis Kelamin</option>
										<?php foreach ($list_sex as $data) : ?>
											<option value="<?= $data['id'] ?>" <?= selected($sex, $data['id']); ?>><?= set_ucwords($data['nama']) ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-auto mb-2">
									<select class="form-control input-sm " name="dusun" onchange="formAction('mainform','<?= site_url('keluarga/dusun') ?>')">
										<option value="">Pilih <?= ucwords($this->setting->sebutan_dusun) ?></option>
										<?php foreach ($list_dusun as $data) : ?>
											<option value="<?= $data['dusun'] ?>" <?= selected($dusun, $data['dusun']); ?>><?= set_ucwords($data['dusun']) ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-auto mb-2">
									<?php if ($dusun) : ?>
										<select class="form-control input-sm" name="rw" onchange="formAction('mainform','<?= site_url('keluarga/rw') ?>')">
											<option value="">Pilih RW</option>
											<?php foreach ($list_rw as $data) : ?>
												<option value="<?= $data['rw'] ?>" <?= selected($rw, $data['rw']); ?>><?= set_ucwords($data['rw']) ?></option>
											<?php endforeach; ?>
										</select>
									<?php endif; ?>
								</div>
								<div class="col-auto mb-2">
									<?php if ($rw) : ?>
										<select class="form-control input-sm" name="rt" onchange="formAction('mainform','<?= site_url('keluarga/rt') ?>')">
											<option value="">Pilih RT</option>
											<?php foreach ($list_rt as $data) : ?>
												<option value="<?= $data['rt'] ?>" <?= selected($rt, $data['rt']); ?>><?= set_ucwords($data['rt']) ?></option>
											<?php endforeach; ?>
										</select>
									<?php endif; ?>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<?php if ($judul_statistik) : ?>
										<h5 class="card-title text-center"><b><?= $judul_statistik; ?></b></h5>
									<?php endif; ?>
									<table class="table datatables table-hover table-responsive" id="dataTable-1">
										<thead>
											<tr>
												<th><input type="checkbox" id="checkall" /></th>
												<th>No</th>
												<th>Foto</th>
												<th>No.KK - NIK</th>
												<th>Nama KK</th>
												<!--<th>NIK</th>
												<th>Tag ID Card</th>-->
												<th>Jumlah Anggota</th>
												<th>Jenis Kelamin</th>
												<th>Alamat</th>
												<th nowrap>Tanggal Cetak KK</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($main as $data) : ?>
												<tr>
													<td style="width:1%"><input type="checkbox" name="id_cb[]" value="<?= $data['id']; ?>" /></td>
													<td class="padat"><?= $data['no'] ?></td>
													<td class="padat">
														<div class="user-panel">
															<div class="image2">
																<!--<img src="<?= AmbilFoto($data['foto'], '', $data['id_sex']); ?>" class="img-circle" alt="Foto Penduduk" />-->
																<img style="width:50px" class="img-circle" src="<?= AmbilFoto($data['foto'], '', $data['id_sex']) ?>" alt="foto <?= strtoupper($data['nama']); ?>" title="foto <?= strtoupper($data['nama']); ?>" />
															</div>
														</div>
													</td>
													<td>No KK: <a href="<?= site_url("keluarga/kartu_keluarga/$p/$o/$data[id]") ?>"><?= $data['no_kk'] ?></a>
												<br/>NIK : <a href="<?= site_url("penduduk/detail/1/0/$data[id_pend]") ?>"><?= strtoupper($data['nik']) ?></a></td>
													<td nowrap>
														<label data-rel="popover" data-content="<img width=200 height=230 src=<?= AmbilFoto($data['foto'], '', $data['id_sex']) ?>>">
															<strong><?= strtoupper($data['kepala_kk']) ?></strong>
														</label>
													</td>
													<!--<td></td>
													<td><?= $data['tag_id_card'] ?></td>-->
													<td><a href="<?= site_url("keluarga/anggota/$p/$o/$data[id]") ?>"><?= $data['jumlah_anggota'] ?></a></td>
													<td><?= strtoupper($data['sex']) ?></td>
													<td><?= strtoupper($data['alamat']) ?> RT.<?= strtoupper($data['rt']) ?> RW.<?= strtoupper($data['rw']) ?> Wilayah/Dusun <?= strtoupper($data['dusun']) ?></td>
													<td>Terdaftar :<br /><?= tgl_indo($data['tgl_daftar']) ?><br />Cetak :<br /><?= tgl_indo($data['tgl_cetak_kk']) ?></td>
													<td>
														<button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<span class="text-muted sr-only">Action</span>
														</button>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item text-muted" href="<?= site_url("keluarga/anggota/$p/$o/$data[id]") ?>" title="Rincian Anggota Keluarga (KK)"><i class="fe fe-search"></i> Lihat Detail</a>
															<?php if ($this->CI->cek_hak_akses('h')) : ?>
																<a class="dropdown-item" href="<?= site_url("keluarga/form_a/$p/$o/$data[id]") ?>" title="Tambah Anggota Keluarga"><i class="fe fe-plus"></i> Tambah Anggota Keluarga</a>
																<a href="<?= site_url("keluarga/edit_nokk/$p/$o/$data[id]") ?>" title="Ubah Data" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Data KK" class="dropdown-item"><i class="fe fe-edit"></i> Ubah</a>
																<a href="#" data-href="<?= site_url("keluarga/delete/$p/$o/$data[id]") ?>" class="dropdown-item" title="Hapus/Keluar Dari Daftar Keluarga" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash"></i> Hapus</a>
															<?php endif; ?>
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
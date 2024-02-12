<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="row align-items-center mb-2">
					<div class="col">
						<h5 class="page-title">Data Kelompok <?= ucwords($kelompok['nama']); ?></h5>
					</div>
					<div class="col-auto">
						<?php if ($this->CI->cek_hak_akses('h')) : ?>
							<div class="btn-group btn-group-vertical">
								<a class="btn btn-outline-info btn-sm btn-sm" data-toggle="dropdown"><i class='fe fe-plus'></i> Tambah Anggota Kelompok</a>
								<ul class="dropdown-menu" role="menu">
									<li>
										<a href="<?= site_url("kelompok/aksi/1/" . $kelompok['id']); ?>" class="btn btn-block " title="Tambah Satu Peserta Baru "><i class="fe fe-plus"></i> Tambah Satu Anggota Kelompok</a>
									</li>
									<li>
										<a href="<?= site_url("kelompok/aksi/2/" . $kelompok['id']); ?>" class="btn btn-block " title="Tambah Beberapa Peserta Baru"><i class="fe fe-plus"></i> Tambah Beberapa Anggota Kelompok</a>
									</li>
								</ul>
							</div>
							<a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform','<?= site_url("kelompok/delete_anggota_all/$kelompok[id]"); ?>')" class="btn btn-outline-danger btn-sm hapus-terpilih"><i class='fe fe-trash'></i> Hapus Data Terpilih</a>
						<?php endif; ?>
						<a href="<?= site_url("kelompok/dialog_anggota/cetak/$kelompok[id]"); ?>" class="btn btn-outline-info btn-sm " data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak Daftar Anggota Kelompok <?= $kelompok['nama']; ?>"><i class="fe fe-printer"></i> Cetak</a>
						<a href="<?= site_url("kelompok/dialog_anggota/unduh/$kelompok[id]"); ?>" class="btn btn-outline-info btn-sm " data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh Daftar Anggota Kelompok <?= $kelompok['nama']; ?>"><i class="fe fe-download"></i> Unduh</a>
						<a href="<?= site_url("kelompok"); ?>" class="btn btn-outline-info btn-sm "><i class="fe fe-arrow-circle-left "></i> Kembali</a>
					</div>
				</div>
				<form id="mainform" name="mainform" action="" method="post">
					<div class="row">
						<div class="col-md-12">
							<div class="card shadow">
								<div class="card-body">
									<h5><b>Rincian Kelompok</b></h5>
									<div class="table-responsive">
										<table class="table table-bordered table-striped table-hover tabel-rincian">
											<tbody>
												<tr>
													<td width="20%">Kode Kelompok</td>
													<td width="1">:</td>
													<td><?= strtoupper($kelompok['kode']); ?></td>
												</tr>
												<tr>
													<td>Nama Kelompok</td>
													<td>:</td>
													<td><?= strtoupper($kelompok['nama']); ?></td>
												</tr>
												<tr>
													<td>Ketua Kelompok</td>
													<td>:</td>
													<td><?= strtoupper($kelompok['nama_ketua']); ?></td>
												</tr>
												<tr>
													<td>Kategori Kelompok</td>
													<td>:</td>
													<td><?= strtoupper($kelompok['kategori']); ?></td>
												</tr>
												<tr>
													<td>Keterangan</td>
													<td>:</td>
													<td><?= $kelompok['keterangan']; ?></td>
												</tr>
											</tbody>
										</table>
									</div>
									<h5><b>Anggota Kelompok</b></h5>
									<div class="table-responsive">
										<table class="table table-bordered dataTable table-striped table-hover tabel-daftar">
											<thead class="bg-gray disabled color-palette">
												<tr>
													<th><input type="checkbox" id="checkall" /></th>
													<th>No</th>
													<?php if ($this->CI->cek_hak_akses('h')) : ?>
														<th>Aksi</th>
													<?php endif; ?>
													<th>Foto</th>
													<th>No. Anggota</th>
													<th width="5%">Jabatan</th>
													<th width="10%">SK Jabatan</th>
													<th width="10%">NIK</th>
													<th width="10%">Nama</th>
													<th width="10%">Tempat / Tanggal Lahir</th>
													<th>Umur (Tahun)</th>
													<th>Jenis Kelamin</th>
													<th width="30%">Alamat</th>
													<th width="20%">Keterangan</th>
												</tr>
											</thead>
											<tbody>
												<?php if ($main) : ?>
													<?php foreach ($main as $key => $data) : ?>
														<tr>
															<td class="padat"><input type="checkbox" name="id_cb[]" value="<?= $data['id']; ?>" /></td>
															<td class="padat"><?= ($key + 1) ?></td>
															<?php if ($this->CI->cek_hak_akses('h')) : ?>
																<td class="padat">
																	<a href="<?= site_url("kelompok/form_anggota/$kelompok[id]/$data[id_penduduk]") ?>" class="btn btn-outline-warning btn-sm" title="Ubah Anggota"><i class="fe fe-edit"></i></a>
																	<a href="#" data-href="<?= site_url("kelompok/delete_anggota/$kelompok[id]/$data[id]") ?>" class="btn btn-outline-danger btn-sm btn-sm " title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash"></i></a>
																</td>
															<?php endif; ?>
															<td class="text-center">
																<div class="user-panel">
																	<div class="image2">
																		<img src="<?= $data['foto'] ? AmbilFoto($data['foto']) : base_url() . 'assets/files/user_pict/kuser.png'; ?>" class="img-circle" alt="User Image" />
																	</div>
																</div>
															</td>
															<td class="padat"><?= $data['no_anggota'] ?></td>
															<td><?= $this->referensi_model->list_ref(JABATAN_KELOMPOK)[$data['jabatan']] ?></td>
															<td><?= $data['no_sk_jabatan'] ?>
															<td><?= $data['nik']; ?></td>
															<td><?= $data['nama']; ?></td>
															<td><?= strtoupper($data['tempatlahir'] . ' / ' . tgl_indo($data['tanggallahir'])); ?></td>
															<td class="padat"><?= $data['umur']; ?></td>
															<td><?= $data['sex']; ?></td>
															<td><?= $data['alamat']; ?></td>
															<td><?= $data['keterangan']; ?></td>
														</tr>
													<?php endforeach; ?>
												<?php else : ?>
													<tr>
														<td class="text-center" colspan="11">Data Tidak Tersedia</td>
													</tr>
												<?php endif; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
<?php $this->load->view('global/confirm_delete'); ?>
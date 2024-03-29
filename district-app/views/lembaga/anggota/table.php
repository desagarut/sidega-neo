<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Data Lembaga <?= ucwords($lembaga['nama']); ?></h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda'); ?>"><i class="fe fe-home"></i> Home</a></li>
			<li><a href="<?= site_url('lembaga'); ?>"> Daftar Lembaga</a></li>
			<li class="active"><?= ucwords($lembaga['nama']); ?></li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="mainform" name="mainform" action="" method="post">
			<div class="row">
				<div class="col-md-12">
					<div class="card shadow">
						<div class="card-header">
							<?php if ($this->CI->cek_hak_akses('h')): ?>
                            <div class="btn-group btn-group-vertical">
								<a class="btn btn-success btn-sm" data-toggle="dropdown"><i class='fe fe-plus'></i> Tambah Anggota lembaga</a>
								<ul class="dropdown-menu" role="menu">
									<li>
										<a href="<?= site_url("lembaga/aksi/1/".$lembaga['id']); ?>" class="btn btn-block btn-sm" title="Tambah Satu Peserta Baru "><i class="fe fe-plus"></i> Tambah Satu Anggota lembaga</a>
									</li>
									<li>
										<a href="<?= site_url("lembaga/aksi/2/".$lembaga['id']); ?>" class="btn btn-block btn-sm" title="Tambah Beberapa Peserta Baru"><i class="fe fe-plus"></i> Tambah Beberapa Anggota lembaga</a>
									</li>
								</ul>
                            </div>
							<a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform','<?= site_url("lembaga/delete_anggota_all/$lembaga[id]"); ?>')" class="btn btn-social btn-box	btn-danger btn-sm  hapus-terpilih"><i class='fe fe-trash'></i> Hapus Data Terpilih</a>
							<?php endif;?>
                            <a href="<?= site_url("lembaga/dialog_anggota/cetak/$lembaga[id]"); ?>" class="btn btn-outline-info btn-sm " data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak Daftar Anggota lembaga <?= $lembaga['nama']; ?>"><i class="fe fe-printer"></i> Cetak</a>
							<a href="<?= site_url("lembaga/dialog_anggota/unduh/$lembaga[id]"); ?>" class="btn btn-outline-info btn-sm" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh Daftar Anggota lembaga <?= $lembaga['nama']; ?>"><i class="fe fe-download"></i> Unduh</a>
							<a href="<?= site_url("lembaga"); ?>" class="btn btn-info btn-sm "><i class="fe fe-arrow-circle-left "></i> Kembali Ke Daftar lembaga</a>
						</div>
						<div class="box-body">
							<h5><b>Rincian lembaga</b></h5>
							<div class="table-responsive">
								<table class="table table-bordered table-striped table-hover tabel-rincian">
									<tbody>
										<tr>
											<td width="20%">Kode lembaga</td>
											<td width="1">:</td>
											<td><?= strtoupper($lembaga['kode']); ?></td>
										</tr>
										<tr>
											<td>Nama lembaga</td>
											<td>:</td>
											<td><?= strtoupper($lembaga['nama']); ?></td>
										</tr>
										<tr>
											<td>Ketua lembaga</td>
											<td>:</td>
											<td><?= strtoupper($lembaga['nama_ketua']); ?></td>
										</tr>
										<tr>
											<td>Kategori lembaga</td>
											<td>:</td>
											<td><?= strtoupper($lembaga['kategori']); ?></td>
										</tr>
										<tr>
											<td>Keterangan</td>
											<td>:</td>
											<td><?= $lembaga['keterangan']; ?></td>
										</tr>
									</tbody>
								</table>
							</div>
							<h5><b>Anggota lembaga</b></h5>
							<div class="table-responsive">
								<table class="table table-bordered dataTable table-striped table-hover tabel-daftar">
									<thead class="bg-gray disabled color-palette">
										<tr>
											<th><input type="checkbox" id="checkall"/></th>
											<th>No</th>
                                            <?php if ($this->CI->cek_hak_akses('h')): ?>
											<th>Aksi</th>
											<?php endif;?>
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
										<?php if ($main): ?>
											<?php foreach ($main as $key => $data): ?>
												<tr>
													<td class="padat"><input type="checkbox" name="id_cb[]" value="<?= $data['id']; ?>" /></td>
													<td class="padat"><?= ($key + 1) ?></td>
													<?php if ($this->CI->cek_hak_akses('h')): ?>
                                                    <td class="padat">
														<a href="<?= site_url("lembaga/form_anggota/$lembaga[id]/$data[id_penduduk]")?>" class="btn btn-outline-info btn-sm" title="Ubah Anggota" ><i class="fe fe-edit"></i></a>
														<a href="#" data-href="<?= site_url("lembaga/delete_anggota/$lembaga[id]/$data[id]")?>" class="btn btn-outline-info btn-sm" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash"></i></a>
													</td>
                                                    <?php endif; ?>
													<td class="text-center">
														<div class="user-panel">
															<div class="image2">
															<img src="<?= $data['foto'] ? AmbilFoto($data['foto']) : base_url() . 'assets/files/user_pict/kuser.png'; ?>" class="img-circle" alt="User Image"/>
															</div>
														</div>
													</td>
													<td class="padat"><?= $data['no_anggota']?></td>
													<td><?= $this->referensi_model->list_ref(JABATAN_KELOMPOK)[$data['jabatan']]?></td>
													<td><?= $data['no_sk_jabatan']?>
													<td><?= $data['nik']; ?></td>
													<td><?= $data['nama']; ?></td>
													<td><?= strtoupper($data['tempatlahir'] . ' / ' . tgl_indo($data['tanggallahir'])); ?></td>
													<td class="padat"><?= $data['umur']; ?></td>
													<td><?= $data['sex']; ?></td>
													<td><?= $data['alamat']; ?></td>
													<td><?= $data['keterangan']; ?></td>
												</tr>
											<?php endforeach; ?>
										<?php else: ?>
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
	</section>
</div>
<?php $this->load->view('global/confirm_delete');?>


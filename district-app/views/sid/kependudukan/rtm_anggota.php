<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Daftar Anggota Rumah Tangga</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li><a href="<?= site_url('rtm/clear')?>"> Daftar Rumah Tangga</a></li>
			<li class="active">Daftar Anggota Rumah Tangga</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="card shadow">
			<div class="card-header">
				<?php if ($this->CI->cek_hak_akses('h')): ?>
                <a href="<?= site_url("rtm/ajax_add_anggota/$kk")?>" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Tambah Anggota Rumah Tangga" title="Tambah Anggota Dari Penduduk Yang Sudah Ada" class="btn btn-success btn-sm "><i class='fe fe-plus'></i> Tambah Anggota</a>
				<a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform','<?= site_url("rtm/delete_all_anggota/$kk")?>')" class="btn btn-social btn-box	btn-danger btn-sm  hapus-terpilih"><i class='fe fe-trash'></i> Hapus Data Terpilih</a>
				<?php endif;?>

                <a href="<?= site_url("rtm/kartu_rtm/$kk")?>" class="btn btn-outline-info btn-sm "><i class="fe fe-book"></i> Kartu Rumah Tangga</a>
				<a href="<?= site_url("rtm/clear")?>" class="btn btn-sm btn-outline-info mb-1"title="Kembali Ke Daftar Rumah Tangga">
					<i class="fe fe-arrow-circle-left "></i>Kembali ke Daftar Rumah Tangga
				</a>
			</div>
			<div class="box-body">
				<h5><b>Rincian Keluarga</b></h5>
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover tabel-rincian">
						<tbody>
							<tr>
								<td width="20%">Nomor Rumah Tangga (RT)</td>
								<td width="1%">:</td>
								<td><?= $kepala_kk['no_kk']?></td>
							</tr>
							<tr>
								<td>Kepala Rumah Tangga</td>
								<td>:</td>
								<td><?= $kepala_kk['nama']?></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td>:</td>
								<td><?= $kepala_kk['alamat_wilayah']?></td>
							</tr>
							<tr>
								<td>
									<?= ($program['programkerja']) ? anchor("program_bantuan/peserta/3/$kepala_kk[no_kk]", 'Program Bantuan', 'target="_blank"') : 'Program Bantuan'; ?>
								</td>
								<td>:</td>
								<td>
									<?php if($program['programkerja']): ?>
										<?php foreach ($program['programkerja'] as $item): ?>
											<?= anchor("program_bantuan/data_peserta/$item[peserta_id]", '<span class="label label-success">' . $item['nama'] . '</span>&nbsp;', 'target="_blank"'); ?>
										<?php endforeach; ?>
									<?php else: ?>
										-
									<?php endif; ?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="box-body">
				<h5><b>Daftar Anggota</b></h5>
				<form id="mainform" name="mainform" action="" method="post">
					<div class="table-responsive">
						<table class="table table-bordered dataTable table-striped table-hover tabel-daftar">
							<thead class="bg-gray disabled color-palette">
								<tr>
									<th><input type="checkbox" id="checkall"/></th>
									<th>No</th>
                                    <?php if ($this->CI->cek_hak_akses('h')): ?>
									<th>Aksi</th>
                                    <?php endif;?>
									<th>NIK</th>
									<th>Nomor KK</th>
									<th width="25%">Nama</th>
									<th>Jenis Kelamin</th>
									<th width="35%">Alamat</th>
									<th>Hubungan</th>
								</tr>
							</thead>
							<tbody>
								<?php if($main): ?>
									<?php foreach ($main as $key => $data): ?>
										<tr>
											<td class="padat"><input type="checkbox" name="id_cb[]" value="<?= $data['id']?>" /></td>
											<td class="padat"><?= ($key + 1); ?></td>
											<?php if ($this->CI->cek_hak_akses('h')): ?>
                                            <td class="aksi">
												<a href="<?= site_url("rtm/edit_anggota/$kk/$data[id]")?>" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Hubungan Rumah Tangga" title="Ubah Hubungan Rumah Tangga" class="btn bg-navy btn-box btn-sm"><i class="fe fe-link"></i></a>
												<a href="#" data-href="<?= site_url("rtm/delete_anggota/$kk/$data[id]")?>" class="btn btn-outline-info btn-sm" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash"></i></a>
											</td>
                                            <?php endif;?>
											<td><?= $data['nik']?></td>
											<td><?= $data['no_kk']?></td>
											<td nowrap><?= strtoupper($data['nama']); ?></td>
											<td><?= $data['sex']?></td>
											<td><?= $data['alamat']; ?></td>
											<td nowrap><?= strtoupper($data['hubungan']); ?></td>
										</tr>
									<?php endforeach; ?>
								<?php else: ?>
									<tr>
										<td class="text-center" colspan="9">Data Tidak Tersedia</td>
									</tr>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
				</form>
			</div>
		</div>
	</section>
</div>
<?php $this->load->view('global/confirm_delete');?>


	<section class="content" id="maincontent">
		<div class="card shadow">
			<div class="card-header">
				<div class="btn-group btn-group-vertical">
					<a class="btn btn-success btn-sm" data-toggle="dropdown"><i class='fe fe-plus'></i> Tambah Anggota</a>
					<ul class="dropdown-menu" role="menu">
						<?php if ($this->CI->cek_hak_akses('h')): ?>
                        <li>
							<a href="<?= site_url("keluarga/form_a/$p/$o/$kk")?>" class="btn btn-block btn-sm" title="Tambah Anggota Keluarga" ><i class="fe fe-plus"></i> Tambah Penduduk Baru</a>
						</li>
						<li>
							<a href="<?= site_url("keluarga/ajax_add_anggota/$p/$o/$kk")?>" class="btn btn-block btn-sm" title="Tambah Anggota Dari Penduduk Yang Sudah Ada" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Tambah Anggota Keluarga"><i class="fe fe-plus"></i> Dari Penduduk Sudah Ada</a>
						</li>
                        <?php endif; ?>
					</ul>
				</div>
				<a href="<?= site_url("keluarga/kartu_keluarga/$p/$o/$kk")?>" class="btn btn-outline-info btn-sm "><i class="fe fe-book"></i> Kartu Keluarga</a>
				<a href="<?=site_url("keluarga/index/$p/$o")?>" class="btn btn-sm btn-outline-info mb-1"title="Kembali Ke Daftar Keluarga"><i class="fe fe-arrow-circle-left "></i>Kembali Ke Daftar Keluarga
				</a>
			</div>
			<div class="box-body">
				<h5><b>Rincian Keluarga</b></h5>
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover tabel-rincian">
						<tbody>
							<tr>
								<td width="20%">Nomor Kartu Keluarga (KK)</td>
								<td width="1%">:</td>
								<td><?= $kepala_kk['no_kk']?></td>
							</tr>
							<tr>
								<td>Kepala Keluarga</td>
								<td>:</td>
								<td><?= $kepala_kk['nik_kepala']?></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td>:</td>
								<td><?= $kepala_kk['alamat_wilayah']?></td>
							</tr>
							<tr>
								<td>
									<?= ($program['programkerja']) ? anchor("program_bantuan/peserta/2/$kepala_kk[no_kk]", 'Program Bantuan', 'target="_blank"') : 'Program Bantuan'; ?>
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
				<h5><b>Daftar Anggota Keluarga</b></h5>
				<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
					<form id="mainform" name="mainform" action="" method="post">
						<div class="table-responsive">
							<table class="table table-bordered dataTable table-striped table-hover tabel-daftar">
								<thead class="bg-gray disabled color-palette">
									<tr>
										<th>No</th>
										<th>Aksi</th>
										<th>NIK</th>
										<th>Nama</th>
										<th>Tanggal Lahir</th>
										<th>Jenis Kelamin</th>
										<th>Hubungan</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($main as $key => $data): ?>
										<tr>
											<td class="padat"><?= ($key + 1); ?></td>
											<td class="aksi">
												<a href="<?= site_url("penduduk/form/$p/$o/$data[id]")?>" class="btn btn-outline-info btn-sm" title="Ubah Biodata Penduduk"><i class="fe fe-edit"></i></a>
												<a href="#" data-href="<?= site_url("keluarga/delete_anggota/$p/$o/$kk/$data[id]")?>" class="btn btn-outline-info btn-sm" title="Pecah KK" data-toggle="modal" data-target="#confirm-status" data-body="Apakah Anda yakin ingin memecah Data Keluarga ini?"><i class="fe fe-cut"></i></a>
												<a href="<?= site_url("keluarga/edit_anggota/$p/$o/$kk/$data[id]")?>" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Hubungan Keluarga" title="Ubah Hubungan Keluarga" class="btn bg-navy btn-box btn-sm"><i class='fe fe-link'></i></a>
												<a href="#" data-href="<?= site_url("keluarga/keluarkan_anggota/$kk/$data[id]")?>" class="btn btn-outline-info btn-sm" title="Bukan anggota keluarga ini" data-toggle="modal" data-target="#confirm-status" data-body="Apakah yakin akan dikeluarkan dari keluarga ini?"><i class="fe fe-times"></i></a>
											</td>
											<td><?= $data['nik']?></td>
											<td nowrap width="45%"><?= strtoupper($data['nama'])?></td>
											<td nowrap><?= tgl_indo($data['tanggallahir'])?></td>
											<td><?= $data['sex']?></td>
											<td nowrap><?= $data['hubungan']?></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</form>
				</div>
			</div>
			<div class='modal fade' id='confirm-status' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
				<div class='modal-dialog'>
					<div class='modal-content'>
						<div class='modal-header'>
							<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
							<h4 class='modal-title' id='myModalLabel'><i class='fe fe-exclamation-triangle text-red'></i> Konfirmasi</h4>
						</div>
						<div class='modal-body btn-info'>
						</div>
						<div class='modal-footer'>
							<button type="button" class="btn btn-outline-danger btn-sm btn-sm " data-dismiss="modal"><i class='fe fe-sign-out'></i> Tutup</button>
							<a class='btn-ok'>
								<button type="button" class="btn btn-info btn-sm" id="ok-delete"><i class='fe fe-check'></i> Simpan</button>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="modalBox" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class='modal-dialog'>
					<div class='modal-content'>
						<div class='modal-header'>
							<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
							<h4 class='modal-title' id='myModalLabel'></h4>
						</div>
						<div class="fetched-data"></div>
					</div>
				</div>
			</div>
		</div>
	</section>

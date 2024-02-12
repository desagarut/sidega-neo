<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="row align-items-center mb-2">
					<div class="col">
						<h5 class="page-title">Salinan Kartu Keluarga</h5>
					</div>
					<div class="col-auto">
						<div class="form-group mr-1 mb-2 ">
							<a href="<?= site_url("keluarga/cetak_kk/$id_kk") ?>" class="btn btn-outline-info btn-sm " target="_blank"><i class="fe fe-printer "></i> Cetak</a>
							<a href="<?= site_url("keluarga/doc_kk/$id_kk") ?>" class="btn btn-outline-info btn-sm " target="_blank"><i class="fe fe-download"></i> Unduh</a>
							<a href="<?= site_url("keluarga/anggota/$p/$o/$id_kk") ?>" class="btn btn-outline-info btn-sm " title="Rincian Anggota Keluarga">Kembali Ke Daftar Anggota Keluarga</a>
							<a href="<?= site_url("keluarga") ?>" class="btn btn-outline-info btn-sm " title="Kembali Ke Daftar Anggota Keluarga">Kembali Ke Daftar Keluarga</a>
						</div>
					</div>
				</div>

				<div class="row align-items-center mb-2">
					<div class="col-md-12">
						<div class="card shadow">
							<div class="card-body">
								<form id="mainform" name="mainform" action="" method="post">
									<h3 class="text-center"><strong>SALINAN KARTU KELUARGA</strong></h3>
									<h5 class="text-center"><strong>No. <?= $kepala_kk['no_kk'] ?> </strong></h5>
									<div class="row">
										<div class="col-sm-8">
											<div class="form-group row">
												<label class="col-sm-3 control-label">ALAMAT</label>
												<div class="col-sm-8">
													<p class="text-muted">: <?= strtoupper($kepala_kk['alamat_plus_dusun']) ?></p>
												</div>
												<label class="col-sm-3 control-label">RT/RW</label>
												<div class="col-sm-9">
													<p class="text-muted">: <?= $kepala_kk['rt']  ?> / <?= $kepala_kk['rw']  ?></p>
												</div>
												<label class="col-sm-3 control-label">DESA / KELURAHAN</label>
												<div class="col-sm-9">
													<p class="text-muted">: <?= strtoupper($desa['nama_desa']) ?></p>
												</div>
												<label class="col-sm-3 control-label">KECAMATAN</label>
												<div class="col-sm-9">
													<p class="text-muted">: <?= strtoupper($desa['nama_kecamatan']) ?></p>
												</div>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group row">
												<label class="col-sm-5 control-label">KABUPATEN</label>
												<div class="col-sm-7">
													<p class="text-muted">: <?= strtoupper($desa['nama_kabupaten']) ?></p>
												</div>
												<label class="col-sm-5 control-label">KODE POS</label>
												<div class="col-sm-7">
													<p class="text-muted">: <?= $desa['kode_pos'] ?></p>
												</div>
												<label class="col-sm-5 control-label">PROVINSI</label>
												<div class="col-sm-7">
													<p class="text-muted">: <?= strtoupper($desa['nama_propinsi']) ?></p>
												</div>
												<label class="col-sm-5 control-label">JUMLAH ANGGOTA</label>
												<div class="col-sm-7">
													<p class="text-muted">: <?= count($main) ?></p>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="table-responsive">
												<table class="table table-bordered table-hover ">
													<thead class="bg-gray disabled color-palette">
														<tr>
															<th class="text-center">No</th>
															<th class="text-center">Nama Lengkap</th>
															<th class="text-center">NIK</th>
															<th class="text-center">Jenis Kelamin</th>
															<th class="text-center">Tempat Lahir</th>
															<th class="text-center">Tanggal Lahir</th>
															<th class="text-center">Agama</th>
															<th class="text-center">Pendidikan</th>
															<th class="text-center">Jenis Pekerjaan</th>
															<th class="text-center">Golongan Darah</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach ($main as $key => $data) : ?>
															<tr>
																<td class="text-center"><?= $key + 1 ?></td>
																<td><?= strtoupper($data['nama']) ?></td>
																<td><?= $data['nik'] ?></td>
																<td><?= $data['sex'] ?></td>
																<td><?= $data['tempatlahir'] ?></td>
																<td><?= tgl_indo_out($data['tanggallahir']) ?></td>
																<td><?= $data['agama'] ?></td>
																<td><?= $data['pendidikan'] ?></td>
																<td><?= $data['pekerjaan'] ?></td>
																<td><?= $data['golongan_darah'] ?></td>
															</tr>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="table-responsive">
												<table class="table table-bordered table-hover ">
													<thead class="bg-gray disabled color-palette">
														<tr>
															<th class="text-center">No</th>
															<th class="text-center">Status Perkawinan</th>
															<th class="text-center">Tanggal Perkawinan</th>
															<th class="text-center">Status Hubungan Dalam Keluarga</th>
															<th class="text-center">Kewarganegaraan</th>
															<th class="text-center">No. Paspor</th>
															<th class="text-center">No. KITAS / KITAP</th>
															<th class="text-center">Nama Ayah</th>
															<th class="text-center">Nama Ibu</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach ($main as $key => $data) : ?>
															<tr>
																<td class="text-center"><?= $key + 1 ?></td>
																<td><?= $data['status_kawin'] ?></td>
																<td class="text-center"><?= tgl_indo_out($data['tanggalperkawinan']) ?></td>
																<td><?= $data['hubungan'] ?></td>
																<td><?= $data['warganegara'] ?></td>
																<td><?= $data['dokumen_pasport'] ?></td>
																<td><?= $data['dokumen_kitas'] ?></td>
																<td><?= strtoupper($data['nama_ayah']) ?></td>
																<td><?= strtoupper($data['nama_ibu']) ?></td>
															</tr>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
											<div class="table-responsive">
												<table width=100%>
													<tbody>
														<tr>
															<td width="25%">&nbsp;</td>
															<td width="50%">&nbsp;</td>
															<td class="text-center" width="25%"><?= $desa['nama_desa'] ?>, <?= tgl_indo(date("Y m d")) ?></td>
														</tr>
														<tr>
															<td class="text-center">KEPALA KELUARGA</td>
															<td>&nbsp;</td>
															<td class="text-center">KEPALA <?= strtoupper($this->setting->sebutan_desa) ?> <?= strtoupper($desa['nama_desa']) ?></td>
														</tr>
														<tr height=80px>
															<td>&nbsp;</td>
															<td>&nbsp;</td>
															<td>&nbsp;</td>
														</tr>
														<tr>
															<td class="text-center"><?= strtoupper($kepala_kk['nama']) ?></td>
															<td width="50%">&nbsp;</td>
															<td class="text-center"><?= strtoupper($desa['nama_kepala_desa']) ?></td>
														</tr>
													</tbody>
												</table>
											</div>
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
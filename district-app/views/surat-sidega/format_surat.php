<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Cetak Layanan Surat</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li class="active">Cetak Layanan Surat</li>
		</ol>
				<div class="card shadow">
					<div class="card-header">
						<form id="main" name="main" action="<?= site_url()?>surat/search" method="post">
							<div class="row">
								<div class="col-sm-6">
									<select class="form-control select2 " id="nik" name="nik" onchange="formAction('main')" style="width: 100%;">
										<option selected="selected">-- Cari Judul Surat--</option>
										<?php foreach ($menu_surat2 as $data): ?>
											<option value="<?= $data['url_surat']?>"><?= strtoupper($data['nama'])?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						</form>
					</div>
					<div class="box-body">
						<?php if ($data['favorit']=1): ?>
							<div class="row">
								<div class="col-sm-12">
									<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
										<div class="row">
											<div class="col-sm-12">
												<div class="table-responsive">
													<table class="table table-bordered dataTable table-striped table-hover">
														<thead class="bg-gray disabled color-palette">
															<tr>
																<th width="1%">No</th>
																<th>Aksi</th>
																<th width="50%">Layanan Administrasi Surat (Daftar Favorit)</th>
																<th>Kode Surat</th>
																<th>Lampiran</th>
															</tr>
														</thead>
														<tbody>
															<?php if (count($surat_favorit) > 0): ?>
															<?php $i=1; foreach ($surat_favorit AS $data): ?>
																<tr <?php if ($data['jenis']!=1): ?>style='background-color:#f8deb5 !important;'<?php endif; ?>>
																	<td><?= $i;?></td>
																	<td class="nostretch">
																		<a href="<?= site_url()?>surat/form/<?= $data['url_surat']?>" class="btn btn-outline-info btn-sm"  title="Buat Surat"><i class="fe fe-file-word-o"></i>Buat Surat</a>
																		<a href="<?= site_url("surat/favorit/$data[id]/$data[favorit]")?>" class="btn btn-outline-info btn-sm" title="Keluarkan dari Daftar Favorit" ><i class="fe fe-star"></i></a>
																	</td>
																	<td><?= $data['nama']?></td>
																	<td><?= $data['kode_surat']?></td>
																	<td><?= $data['nama_lampiran']?></td>
																</tr>
															<?php $i++; endforeach; ?>
															<?php else: ?>
																<tr>
																	<td colspan="5" class="box box-warning box-solid">
																		<div class="box-body text-center">
																			<span>Belum ada surat favorit</span>
																		</div>
																	</td>
																</tr>
															<?php endif; ?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<hr/>
						<?php endif; ?>
						<div class="row">
							<div class="col-sm-12">
								<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
									<div class="row">
										<div class="col-sm-12">
											<div class="table-responsive">
												<table class="table table-bordered dataTable table-striped table-hover">
													<thead class="bg-gray disabled color-palette">
														<tr>
															<th width="1%">No</th>
															<th>Aksi</th>
															<th width="50%">Layanan Administrasi Surat</th>
															<th>Kode Surat</th>
															<th>Lampiran</th>
														</tr>
													</thead>
													<tbody>
														<?php $nomer =1; foreach ($menu_surat2 AS $data): ?>
															<?php if ($data['favorit']!=1): ?>
																<tr <?php if ($data['jenis']!=1): ?>style='background-color:#f8deb5 !important;'<?php endif; ?>>
																	<td><?= $nomer;?></td>
																	<td class="nostretch">
																		<a href="<?= site_url()?>surat/form/<?= $data['url_surat']?>" class="btn btn-outline-info btn-sm"  title="Buat Surat"><i class="fe fe-file-word-o"></i>Buat Surat</a>
																		<a href="<?= site_url("surat/favorit/$data[id]/$data[favorit]")?>" class="btn btn-outline-info btn-sm"  title="Tambahkan ke Daftar Favorit" ><i class="fe fe-star-o"></i></a>
																	</td>
																	<td><?= $data['nama']?></td>
																	<td><?= $data['kode_surat']?></td>
																	<td><?= $data['nama_lampiran']?></td>
																</tr>
															<?php $nomer++; endif; ?>
														<?php endforeach;?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


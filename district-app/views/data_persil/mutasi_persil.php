<style>
	.input-sm
	{
		padding: 4px 4px;
	}
	@media (max-width:780px)
	{
		.btn-group-vertical
		{
			display: block;
		}
	}
	.table-responsive
	{
		min-height:275px;
	}
	.padat {width: 1%;}
	th.horizontal {width: 20%}

</style>
<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Rincian Mutasi Letter-C</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('home')?>"><i class="fe fe-home"></i> Home</a></li>
			<li><a href="<?= site_url('letterc')?>"> Daftar Letter-C</a></li>
			<li><a href="<?= site_url('letterc/rincian/'.$letterc[id])?>"> Rincian Letter-C</a></li>
			<li class="active">Mutasi Letter-C</li>
		</ol>
				<div class="card shadow">
					<div class="card-header">
						<a href="<?=site_url("letterc/create_mutasi/".$letterc['id'])."/".$persil['id']?>" class="btn btn-success btn-sm"  title="Tambah Persil">
							<i class="fe fe-plus"></i>Tambah Mutasi Persil
						</a>
						<a href="<?=site_url('letterc')?>" class="btn btn-primary btn-sm " title="Kembali Ke Daftar Letter-C"><i class="fe fe-arrow-circle-o-left"></i> Kembali Ke Daftar Letter-C</a>
						</a>
						<a href="<?=site_url('letterc/rincian/'.$letterc[id])?>" class="btn btn-info btn-sm " title="Kembali Ke Daftar Letter-C"><i class="fe fe-arrow-circle-o-left"></i> Kembali Ke Rincian Letter-C</a>
						</a>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
									<form id="mainform" name="mainform" action="" method="post">
										<input type="hidden" name="id" value="<?php echo $this->uri->segment(4) ?>">
										<div class="row">
											<div class="col-sm-12">
												<div class="card-header">
													<h3 class="box-title">Rincian Letter-C</h3>
												</div>
												<div class="box-body">
													<table class="table table-bordered table-striped table-hover" >
														<tbody>
															<tr>
																<th class="horizontal">Nama Pemilik</td>
																<td> : <?= $pemilik["namapemilik"]?></td>
															</tr>
															<tr>
																<th>NIK</td>
																<td class="horizontal"> :  <?= $pemilik["nik"]?></td>
															</tr>
															<tr>
																<th class="horizontal">Alamat</td>
																<td> :  <?= $pemilik["alamat"]?></td>
															</tr>
															<tr>
																<th class="horizontal">Nomor Letter-C</td>
																<td> : <?= $letterc['nomor']?></td>
															</tr>
															<tr>
																<th class="horizontal">Nama Pemilik Tertulis di Letter-C</td>
																<td> : <?= $letterc["nama_kepemilikan"]?></td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>

											<div class="col-sm-12">
												<div class="card-header">
													<h3 class="box-title">Rincian Persil</h3>
												</div>
												<div class="box-body">
													<table class="table table-bordered table-striped table-hover" >
														<tbody>
															<tr>
																<th class="horizontal">No. Persil : No. Urut Bidang</td>
																<td> : <?= $persil['nomor'].' : '.$persil['nomor_urut_bidang']?></td>
															</tr>
															<tr>
																<th class="horizontal">Kelas Tanah</td>
																<td> :  <?= $persil["kode"].' - '.$persil["ndesc"]?></td>
															</tr>
															<tr>
																<th class="horizontal">Luas Keseluruhan (M2)</td>
																<td> :  <?= $persil["luas_persil"]?></td>
															</tr>
															<tr>
																<th class="horizontal">Lokasi</td>
																<td> :  <?= $persil["alamat"] ?: $persil["lokasi"]?></td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>

											<div class="col-sm-12">
												<div class="row">
													<div class="col-sm-9">
														<div class="card-header">
															<h3 class="box-title">Daftar Mutasi Persil <?= $persil["nomor"]?></h3>
														</div>
													</div>
												</div>
											</div>
											<div class="col-sm-12">
												<div class="table-responsive">
													<table class="table table-bordered table-striped dataTable table-hover">
														<thead class="bg-gray disabled color-palette">
															<tr>
																<th class="padat">No</th>
																<th class="padat">Aksi</th>
																<th>No. Bidang Mutasi</th>
																<th>Luas Masuk (M2)</th>
																<th>Luas Keluar (M2)</th>
																<th>NOP</th>
																<th>Tanggal Mutasi</th>
																<th>Keterangan</th>
															</tr>
														</thead>
														<tbody>
															<?php $nomer = $paging->offset;?>
															<?php foreach ($mutasi as $key => $item): $nomer++;?>
																<tr>
																	<td class="text-center"><?= $nomer?></td>
																	<td nowrap class="text-center">
																		<a href="<?= site_url("letterc/create_mutasi/$item[id_letterc_masuk]/$item[id_persil]/$item[id]")?>" class="btn btn-outline-info btn-sm" title="Ubah"><i class="fe fe-edit"></i></a>
																		<?php if ($item['jenis_mutasi'] != '9'): ?>
																			<a href="#" data-href="<?= site_url("letterc/hapus_mutasi/$letterc[id]/$item[id]")?>" class="btn btn-outline-info btn-sm"  title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash"></i></a>
																		<?php else: ?>
																			<a href="#" data-href="<?= site_url('letterc/awal_persil/'.$letterc['id'].'/' .$persil['id'].'/1')?>" class="btn btn-outline-info btn-sm"  title="Bukan pemilik awal" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash"></i></a>
																		<?php endif; ?>
																	</td>
																	<td><?= $item['no_bidang_persil']?></td>
																	<td><?= $item['luas_masuk']?>
																		<?php if ($item['letterc_keluar'] and $item['id_letterc_masuk'] == $letterc['id']): ?>
																			dari <a href="<?= site_url("letterc/mutasi/$item[letterc_keluar]/$item[id_persil]")?>">Letter-C ini</a>
																		<?php endif; ?>
																	</td>
																	<td><?= $item['luas_keluar']?>
																		<?php if ($item['id_letterc_masuk'] <> $letterc['id']): ?>
																			ke <a href="<?= site_url("letterc/mutasi/$item[id_letterc_masuk]/$item[id_persil]")?>">Letter-C ini</a>
																		<?php endif; ?>
																	</td>
																	<td><?= $item['no_objek_pajak']?></td>
																	<td><?= tgl_indo_out($item['tanggal_mutasi'])?></td>
																	<td><?= $item['keterangan']?></td>
																</tr>
															<?php endforeach; ?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class='modal fade' id='confirm-delete' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
							<div class='modal-dialog'>
								<div class='modal-content'>
									<div class='modal-header'>
										<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
										<h4 class='modal-title' id='myModalLabel'><i class='fe fe-exclamation-triangle text-red'></i> Konfirmasi</h4>
									</div>
									<div class='modal-body btn-info'>
										Apakah Anda yakin ingin menghapus data ini?
									</div>
									<div class='modal-footer'>
										<button type="button" class="btn btn-warning btn-sm" data-dismiss="modal"><i class='fe fe-sign-out'></i> Tutup</button>
										<a class='btn-ok'>
											<button type="button" class="btn btn-outline-danger btn-sm btn-sm " id="ok-delete"><i class='fe fe-trash'></i> Hapus</button>
										</a>
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


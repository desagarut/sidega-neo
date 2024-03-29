<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Daftar Inventaris Peralatan Dan Mesin</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li class="active">Daftar Inventaris Peralatan Dan Mesin</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="mainformexcel" name="mainformexcel" action="" method="post" class="form-horizontal">
			<div class="row">
				<div class="col-md-3">
					<?php $this->load->view('inventaris/menu_kiri'); ?>
				</div>
				<div class="col-md-9">
					<div class="card shadow">
            <div class="card-header">
							<a href="<?= site_url('inventaris_peralatan/form')?>" class="btn btn-success btn-sm"  title="Tambah Data Baru">
								<i class="fe fe-plus"></i>Tambah Data
            	</a>
							<a href="#" class="btn btn-outline-info btn-sm" title="Cetak Data" data-remote="false" data-toggle="modal" data-target="#cetakBox" data-title="Cetak Inventaris">
								<i class="fe fe-printer"></i>Cetak
            	</a>
							<a href="#" class="btn btn-outline-info btn-sm"  title="Unduh Data" data-remote="false" data-toggle="modal" data-target="#unduhBox" data-title="Unduh Inventaris">
								<i class="fe fe-download"></i>Unduh
            	</a>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="row">
										<div class="col-sm-12">
											<div class="table-responsive">
												<table id="tabel4" class="table table-bordered dataTable table-hover">
													<thead class="bg-gray">
														<tr>
															<th class="text-center" rowspan="2">No</th>
															<th class="text-center" rowspan="2">Aksi</th>
															<th class="text-center" rowspan="2">Nama Barang</th>
															<th class="text-center" rowspan="2">Kode Barang / Nomor Registrasi</th>
															<th class="text-center" rowspan="2">Merk/Type</th>
															<th class="text-center" rowspan="2">Tahun Pembelian</th>
															<th class="text-center" colspan="2">Nomor</th>
															<th class="text-center" rowspan="2">Asal Usul</th>
															<th class="text-center" rowspan="2">Harga (Rp)</th>
														</tr>
														<tr>
															<th class="text-center" rowspan="1">Polisi</th>
															<th class="text-center" rowspan="1">BPKB</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach ($main as $data): ?>
															<?php if ($data->status == "1"): ?>
																<tr style='background-color:#cacaca'>
															<?php else: ?>
																<tr>
															<?php endif; ?>
																<td></td>
																<td nowrap>
																	<?php if ($data->status == "0"): ?>
																		<a href="<?= site_url('inventaris_peralatan/form_mutasi/'.$data->id); ?>" title="Mutasi Data" class="btn bg-olive btn-box btn-sm"><i class="fe fe-external-link-square"></i></a>
																	<?php endif; ?>
																	<a href="<?= site_url('inventaris_peralatan/view/'.$data->id); ?>" title="Lihat Data" class="btn bg-info btn-box btn-sm"><i class="fe fe-eye"></i></a>
																	<a href="<?= site_url('inventaris_peralatan/edit/'.$data->id); ?>" title="Edit Data"  class="btn btn-outline-info btn-sm"><i class="fe fe-edit"></i> </a>
																	<a href="#" data-href="<?= site_url("api_inventaris_peralatan/delete/$data->id")?>" class="btn btn-outline-info btn-sm"  title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash"></i></a>
																</td>
																<td><?= $data->nama_barang;?></td>
																<td><?= $data->kode_barang;?><br><?= $data->register;?></td>
																<td><?= $data->merk;?></td>
																<td><?= $data->tahun_pengadaan;?></td>
																<td>
																	<?= (empty($data->no_polisi)) ? "-" : $data->no_polisi ?>
																</td>
																<td>
																	<?= (empty($data->no_bpkb)) ? "-" : $data->no_bpkb ?>
																</td>
																<td><?= $data->asal;?></td>
																<td><?= number_format($data->harga,0,".",".");?></td>
															</tr>
														<?php endforeach; ?>
													</tbody>
													<tfoot>
														<tr>
															<th colspan="9" class="text-right" >Total:</th>
															<th><?= number_format($total,0,".","."); ?></th>
														</tr>
													</tfoot>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div id="unduhBox" class="modal fade" role="dialog" style="padding-top:30px;">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Unduh Inventaris</h4>
										</div>
										<form action="" target="_blank" class="form-horizontal" method="get" >
											<div class="modal-body">
												<div class="form-group">
													<label class="col-sm-2 control-label required" style="text-align:left;" for="nama_barang">Tahun</label>
													<div class="col-sm-9">
														<select name="tahun" id="tahun" class="form-control select2 input-sm" style="width:100%;">
															<option value="1">Semua Tahun</option>
															<?php for ($i=date("Y"); $i>=date("Y")-30; $i--): ?>
																<option value="<?= $i ?>"><?= $i ?></option>
															<?php endfor; ?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label required" style="text-align:left;" for="penandatangan">Penandatangan</label>
													<div class="col-sm-9">
														<select name="penandatangan" id="penandatangan" class="form-control input-sm">
															<?php foreach ($pamong AS $data): ?>
																<option value="<?= $data['pamong_id']?>" data-jabatan="<?= trim($data['jabatan'])?>"
																	<?= (strpos(strtolower($data['jabatan']),'Kepala Desa') !== false) ? 'selected' : '' ?>>
																	<?= $data['pamong_nama']?>(<?= $data['jabatan']?>)
																</option>
															<?php endforeach; ?>
														</select>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="reset" class="btn btn-outline-danger btn-sm btn-sm " data-dismiss="modal"><i class='fe fe-sign-out'></i> Tutup</button>
												<button type="submit" class="btn btn-info btn-sm" id="form_download" name="form_download" data-dismiss="modal"><i class='fe fe-check'></i> Unduh</button>
											</div>

										</form>
									</div>
								</div>
							</div>
							<div id="cetakBox" class="modal fade" role="dialog" style="padding-top:30px;">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Cetak Inventaris</h4>
										</div>
										<form action="" target="_blank" class="form-horizontal" method="get">
											<div class="modal-body">
												<div class="form-group">
													<label class="col-sm-2 control-label required" style="text-align:left;" for="tahun_pdf">Tahun</label>
													<div class="col-sm-9">
														<select name="tahun_pdf" id="tahun_pdf" class="form-control select2 input-sm" style="width:100%;">
															<option value="1">Semua Tahun</option>
															<?php for ($i = date("Y"); $i >= date("Y")-30; $i--): ?>
																<option value="<?= $i ?>"><?= $i ?></option>
															<?php endfor; ?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label required" style="text-align:left;" for="penandatangan_pdf">Penandatangan</label>
													<div class="col-sm-9">
														<select name="penandatangan_pdf" id="penandatangan_pdf" class="form-control input-sm">
															<?php foreach ($pamong AS $data): ?>
																<option value="<?= $data['pamong_id']?>" data-jabatan="<?= trim($data['jabatan'])?>"
																	<?= (strpos(strtolower($data['jabatan']),'Kepala Desa') !== false) ? 'selected' : '' ?>>
																	<?= $data['pamong_nama']?>(<?= $data['jabatan']?>)
																</option>
															<?php endforeach; ?>
														</select>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="reset" class="btn btn-outline-danger btn-sm btn-sm " data-dismiss="modal"><i class='fe fe-sign-out'></i> Tutup</button>
												<button type="submit" class="btn btn-info btn-sm" id="form_cetak" name="form_cetak"  data-dismiss="modal"><i class='fe fe-check'></i> Cetak</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
</div>
<?php $this->load->view('global/confirm_delete');?>
<script>

	$("#form_cetak").click(function(event)
	{
		var link = '<?= site_url("inventaris_peralatan/cetak"); ?>'+ '/' + $('#tahun_pdf').val() + '/' + $('#penandatangan_pdf').val();
		window.open(link, '_blank');
  });
	$("#form_download").click(function(event)
	{
		var link = '<?= site_url("inventaris_peralatan/download"); ?>'+ '/' + $('#tahun').val() + '/' + $('#penandatangan').val();
		window.open(link, '_blank');
  });
</script>
<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Daftar Inventaris Kontruksi</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li class="active">Daftar Inventaris Kontruksi</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="mainformexcel" name="mainformexcel" action="" method="post" class="form-horizontal">
			<div class="row">
				<div class="col-md-3">
					<?php $this->load->view('inventaris/menu_kiri.php')?>
				</div>
				<div class="col-md-9">
					<div class="card shadow">
            <div class="card-header">
							<a href="<?= site_url('inventaris_kontruksi/form')?>" class="btn btn-success btn-sm"  title="Tambah Data Baru">
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
												<table id="tabel4" class="table table-bordered table-hover">
													<thead class="bg-gray">
														<tr>
															<th class="text-center" rowspan="2">No</th>
															<th class="text-center" rowspan="2">Aksi</th>
															<th class="text-center" rowspan="2">Nama Barang</th>
															<th class="text-center" rowspan="2">Fisik Bangunan (P, SP, D)</th>
															<th class="text-center" rowspan="2">Luas (M<sup>2</sup>)</th>
															<th class="text-center" colspan="2">Dokumen</th>
															<th class="text-center" rowspan="2">Tgl,bln,thn Mulai</th>
															<th class="text-center" rowspan="2">Status Tanah</th>
															<th class="text-center" rowspan="2">Asal Usul Biaya</th>
															<th class="text-center" rowspan="2">Nilai Kontrak (Rp)</th>
														</tr>
														<tr>
															<th class="text-center" rowspan="1">Tanggal</th>
															<th class="text-center" rowspan="1">Nomor</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach ($main as $data): ?>
															<tr>
																<td></td>
																<td nowrap>
																	<a href="<?= site_url('inventaris_kontruksi/view/'.$data->id); ?>" title="Lihat Data" class="btn bg-info btn-box btn-sm"><i class="fe fe-eye"></i></a>
																	<a href="<?= site_url('inventaris_kontruksi/edit/'.$data->id); ?>" title="Edit Data"  class="btn btn-outline-info btn-sm"><i class="fe fe-edit"></i> </a>
																	<a href="#" data-href="<?= site_url("api_inventaris_kontruksi/delete/$data->id")?>" class="btn btn-outline-info btn-sm"  title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash"></i></a>
																</td>
																<td><?= $data->nama_barang;?></td>
																<td><?= $data->kondisi_bangunan;?></td>
																<td>
																	<?= (empty($data->luas_bangunan)) ? "-" : $data->luas_bangunan ?>
																</td>
																<td>
																	<?= (empty(date('d M Y',strtotime($data->tanggal_dokument)))) ? "-" : date('d M Y',strtotime($data->tanggal_dokument)) ?>
																</td>
																<td>
																	<?= (empty($data->no_dokument)) ? "-" : $data->no_dokument ?>
																</td>
																<td nowrap>
																	<?= (empty(date('d M Y',strtotime($data->tanggal)))) ? "-" : date('d M Y',strtotime($data->tanggal)) ?>
																</td>
																<td>
																	<?= (empty($data->status_tanah)) ? "-" : $data->status_tanah ?>
																</td>
																<td><?= $data->asal;?></td>
																<td class="text-right"><?= number_format($data->harga,0,".",".");?></td>
															</tr>
														<?php endforeach; ?>
													</tbody>
													<tfoot>
														<tr>
															<th colspan="10" class="text-right">Total:</th>
															<th class="text-right"><?= number_format($total,0,".","."); ?></th>
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
		var link = '<?= site_url("inventaris_kontruksi/cetak"); ?>'+ '/' + $('#tahun_pdf').val() + '/' + $('#penandatangan_pdf').val();
		window.open(link, '_blank');
  });
	$("#form_download").click(function(event)
	{
		var link = '<?= site_url("inventaris_kontruksi/download"); ?>'+ '/' + $('#tahun').val() + '/' + $('#penandatangan').val();
		window.open(link, '_blank');
  });
</script>
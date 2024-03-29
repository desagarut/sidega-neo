<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Data Rumah Penduduk</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li><a href="<?= site_url('penduduk/clear')?>"> Daftar Penduduk</a></li>
			<li class="active">Kondisi Rumah Penduduk</li>
		</ol>
				<div class="card shadow">
					<div class="card-header">
						<a href="<?= site_url("penduduk/rumah_form/$penduduk[id]")?>" title="Tambah rumah" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Tambah rumah" class="btn btn-outline-info btn-sm"><i class='fe fe-plus'></i>Tambah rumah</a>
						<a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform','<?= site_url("penduduk/delete_all_rumah/$penduduk[id]")?>')" class="btn btn-social btn-box	btn-danger btn-sm  hapus-terpilih"><i class='fe fe-trash'></i> Hapus Data Terpilih</a>
						<a href="<?= site_url("penduduk/detail/1/0/$penduduk[id]")?>" class="btn btn-info btn-sm "><i class="fe fe-arrow-circle-left"></i> Kembali Ke Biodata Penduduk</a>
					</div>
					<div class="box-body ">
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover">
								<tbody>
									<tr>
										<td nowrap style="padding-top : 10px;padding-bottom : 10px; width:15%;" >Nama Penduduk</td><td nowrap > : <?= $penduduk['nama']?></td>
									</tr>
									<tr>
										<td nowrap style="padding-top : 10px;padding-bottom : 10px;" >NIK</td><td nowrap > :  <?= $penduduk['nik']?></td>
									</tr>
									<tr>
										<td nowrap style="padding-top : 10px;padding-bottom : 10px;" >Alamat</td><td nowrap > : <?= strtoupper($this->setting->sebutan_dusun)?> :  <?= $penduduk['dusun']?> <?= $penduduk['alamat']?> RW/RT :  <?= $penduduk['rw']?>/<?= $penduduk['rt']?> <?= $penduduk['alamat']?>  </td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
									<form id="mainform" name="mainform" action="" method="post">
										<div class="row">
											<div class="col-sm-12">
												<div class="table-responsive">
													<table class="table table-bordered table-hover ">
														<thead class="bg-gray disabled color-palette">
															<tr>
																<th><input type="checkbox" id="checkall"></th>
																<th>No</th>
																<th >Aksi</th>
																<th>Nama Rumah</th>
																<th>Tanggal Upload</th>
															</tr>
														</thead>
														<tbody>
															<?php foreach ($list_rumah as $data): ?>
																<tr>
																	<td><input type="checkbox" name="id_cb[]" value="<?= $data['id']?>" ></td>
																	<td><?= $key+1?></td>
																	<td nowrap>
																		<a href="<?= base_url().LOKASI_RUMAH?><?= urlencode($data['satuan'])?>" class="btn bg-info btn-box btn-sm" rel=”noopener noreferrer” target="_blank" title="Buka rumah"><i class="fe fe-eye"></i></a>
																		<?php if(!$data['hidden']): ?>
																			<a href="<?= site_url("penduduk/rumah_form/$penduduk[id]/$data[id]")?>" class="btn btn-outline-info btn-sm" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Data" title="Ubah Data"  title="Ubah Data"><i class="fe fe-edit"></i></a>
																			<a href="#" data-href="<?= site_url("penduduk/delete_rumah/$penduduk[id]/$data[id]")?>" class="btn btn-outline-info btn-sm"  title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash"></i></a>
																		<?php endif ?>
																	</td>
																	<td width="40%"><?= $data['nama']?></td>
																	<td nowrap><?= tgl_indo2($data['tgl_upload'])?></td>
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
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php $this->load->view('global/confirm_delete');?>
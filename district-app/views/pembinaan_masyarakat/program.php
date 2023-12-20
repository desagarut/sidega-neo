<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Daftar Program Pembinaan Kemasyarakatan</h1>
		<ol class="breadcrumb">
			<li><a href="<?=site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li class="active">Daftar Program Pembinaan Kemasyarakatan</li>
		</ol>
				<div class="card shadow">
					<div class="card-header">
						<?php if ($this->CI->cek_hak_akses('h')): ?>
                        <a href="<?=site_url('pembinaan_masyarakat/create')?>" class="btn bg-olive btn-sm " title="Tambah Program Bantuan"><i class="fe fe-plus"></i> Tambah</a>
						<a href="<?=site_url('pembinaan_masyarakat/impor')?>" class="btn bg-navy btn-sm " title="Impor Program Bantuan" data-target="#impor" data-remote="false" data-toggle="modal" data-backdrop="false" data-keyboard="false"><i class="fe fe-upload"></i> Impor</a>
						<?php endif;?>
                        <a href="<?=site_url('pembinaan_masyarakat/panduan')?>" class="btn btn-info btn-sm " title="Panduan"><i class="fe fe-question-circle"></i> Panduan</a>
						<?php if ($tampil != 0): ?>
							<a href="<?=site_url('pembinaan_masyarakat')?>" class="btn btn-info btn-sm " title="Kembali Ke Daftar Program Bantuan"><i class="fe fe-arrow-circle-o-left"></i> Kembali Ke Daftar Program Bantuan</a>
						<?php endif; ?>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
									<div class="row">
										<div class="col-sm-9">
											<form id="mainform" name="mainform" action="" method="post">
												<select class="form-control input-sm" name="sasaran" onchange="formAction('mainform', '<?=site_url('pembinaan_masyarakat/filter/sasaran')?>')">
													<option value="">Pilih Sasaran</option>
													<?php foreach ($list_sasaran AS $key => $value): ?>
														<option value="<?= $key; ?>" <?= selected($set_sasaran, $key); ?>><?= $value?></option>
													<?php endforeach; ?>
												</select>
											</form>
										</div>
										<div class="col-sm-12">
											<div class="table-responsive">
												<table class="table table-bordered table-striped dataTable table-hover" id="table-program">
													<thead class="bg-gray disabled color-palette">
														<tr>
															<th width="1%">No</th>
                                                            <?php if ($this->CI->cek_hak_akses('h')): ?>
															<th width="5%" class="text-center">Aksi</th>
                                                            <?php endif?>
															<th class="text-center">Nama Program</th>
															<th class="text-center">Penyelenggara</th>
															<th class="text-center">Asal Dana</th>
															<th class="text-center">Anggaran</th>
															<th class="text-center">Jumlah Peserta</th>
															<th class="text-center">Masa Berlaku</th>
															<th class="text-center">Sasaran</th>
															<th class="text-center">Status</th>
														</tr>
													</thead>
													<tbody>
														<?php $nomer = $paging->offset; ?>
														<?php foreach ($program as $item): ?>
															<?php $nomer++; ?>
															<tr>
																<td class="text-center"><?= $nomer?></td>
																<?php if ($this->CI->cek_hak_akses('h')): ?>
                                                                <td nowrap>
																	<a href="<?= site_url("pembinaan_masyarakat/detail/$item[id]")?>" class="btn btn-outline-info btn-sm" title="Rincian"><i class="fe fe-list"></i></a>
																	<a href="<?= site_url("pembinaan_masyarakat/edit/$item[id]")?>" class="btn bg-orange btn-box btn-sm" title="Ubah"><i class="fe fe-edit"></i></a>
																	<?php if ($item['jml_peserta'] != 0): ?>
																		<a href="<?= site_url("pembinaan_masyarakat/expor/$item[id]"); ?>" class="btn bg-navy btn-box btn-sm" title="Expor"><i class="fe fe-download"></i></a>
																		<a href="#" class="btn bg-maroon btn-box btn-sm disabled" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash-o"></i></a>
																	<?php endif ?>
																	<?php if ($item['jml_peserta'] == 0): ?>
																		<a href="#" data-href="<?= site_url("pembinaan_masyarakat/hapus/$item[id]")?>" class="btn bg-maroon btn-box btn-sm" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash-o"></i></a>
																	<?php endif ?>
																</td>
                                                                <?php endif;?>
																<td nowrap><a href="<?= site_url("pembinaan_masyarakat/detail/$item[id]")?>"><?= $item["nama"] ?></a></td>
																<td nowrap><?= $item['penyelenggara']?></td>
																<td nowrap><?= $item['asaldana']?></td>
																<td nowrap><?= Rupiah($item['anggaran'])?></td>
																<td align="center"><?= $item['jml_peserta']?></td>
																<td align="center"><?= fTampilTgl($item["sdate"],$item["edate"]);?></td>
																<td align="center"><?= $sasaran[$item["sasaran"]]?></td>
																<td align="center"><?= $item['status'] ?></td>
															</tr>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<?php $this->load->view('global/paging');?>
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

<?php include('district-app/views/pembinaan_masyarakat/impor.php'); ?>

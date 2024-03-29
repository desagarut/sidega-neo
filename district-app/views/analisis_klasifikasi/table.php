<script>
	$(function()
	{
		var keyword = <?= $keyword?> ;
		$( "#cari" ).autocomplete(
		{
			source: keyword,
			maxShowItems: 10,
		});
	});
</script>
<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Pengaturan Klasifikasi - <?= $analisis_master['nama']?></h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda') ?>"><i class="fe fe-home"></i> Home</a></li>
			<li><a href="<?= site_url('analisis_master') ?>"> Master Analisis</a></li>
			<li><a href="<?= site_url() ?>analisis_klasifikasi/leave"><?= $analisis_master['nama']?></a></li>
			<li class="active">Pengaturan Klasifikasi</li>
		</ol>
	</section>
	</section>
	<section class="content" id="maincontent">
		<form id="mainform" name="mainform" action="" method="post">
			<div class="row">
				<div class="col-md-4 col-lg-3">
					<?php $this->load->view('analisis_master/left', $data);?>
				</div>
				<div class="col-md-8 col-lg-9">
					<div class="card shadow">
            <div class="card-header">
							<a href="<?= site_url('analisis_klasifikasi/form') ?>" class="btn btn-success btn-sm " title="Tambah Klasifikasi Baru" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Tambah Klasifikasi Baru"><i class="fe fe-plus"></i> Tambah Klasifikasi Baru</a>
							<a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '<?= site_url("analisis_klasifikasi/delete_all/$p/$o") ?>')" class="btn btn-outline-danger btn-sm btn-sm hapus-terpilih"><i class='fe fe-trash'></i> Hapus Data Terpilih</a>
							<a href="<?= site_url() ?>analisis_klasifikasi/leave" class="btn btn-info btn-sm "><i class="fe fe-arrow-circle-left "></i> Kembali Ke <?= $analisis_master['nama']?></a>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
										<form id="mainform" name="mainform" action="" method="post">
											<div class="row">
												<div class="col-sm-12">
													<div class="input-group input-group-sm pull-right">
														<input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?=html_escape($cari)?>" onkeypress="if (event.keyCode == 13){$('#'+'mainform').attr('action', '<?= site_url("analisis_klasifikasi/search") ?>');$('#'+'mainform').submit();}">
														<div class="input-group-btn">
															<button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action', '<?= site_url("analisis_klasifikasi/search") ?>');$('#'+'mainform').submit();"><i class="fe fe-search"></i></button>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-12">
													<div class="table-responsive">
														<table class="table table-bordered table-striped dataTable table-hover nowrap">
															<thead class="bg-gray disabled color-palette">
																<tr>
																	<th><input type="checkbox" id="checkall"/></th>
																	<th>No</th>
																	<th>Aksi</th>
																	<?php if ($o==4): ?>
																		<th><a href="<?= site_url("analisis_klasifikasi/index/$p/3") ?>">Klasifikasi <i class='fe fe-sort-asc fa-sm'></i></a></th>
																	<?php elseif ($o==3): ?>
																		<th><a href="<?= site_url("analisis_klasifikasi/index/$p/4") ?>">Klasifikasi <i class='fe fe-sort-desc fa-sm'></i></a></th>
																	<?php else: ?>
																		<th><a href="<?= site_url("analisis_klasifikasi/index/$p/3") ?>">Klasifikasi <i class='fe fe-sort fa-sm'></i></a></th>
																	<?php endif; ?>
																	<?php if ($o==2): ?>
																		<th><a href="<?= site_url("analisis_klasifikasi/index/$p/1") ?>">Min <i class='fe fe-sort-asc fa-sm'></i></a></th>
																	<?php elseif ($o==1): ?>
																		<th><a href="<?= site_url("analisis_klasifikasi/index/$p/2") ?>">Min <i class='fe fe-sort-desc fa-sm'></i></a></th>
																	<?php else: ?>
																		<th><a href="<?= site_url("analisis_klasifikasi/index/$p/1") ?>">Min <i class='fe fe-sort fa-sm'></i></a></th>
																	<?php endif; ?>
																	<?php if ($o==2): ?>
																		<th><a href="<?= site_url("analisis_klasifikasi/index/$p/1") ?>">Maks <i class='fe fe-sort-asc fa-sm'></i></a></th>
																	<?php elseif ($o==1): ?>
																		<th><a href="<?= site_url("analisis_klasifikasi/index/$p/2") ?>">Maks <i class='fe fe-sort-desc fa-sm'></i></a></th>
																	<?php else: ?>
																		<th><a href="<?= site_url("analisis_klasifikasi/index/$p/1") ?>">Maks <i class='fe fe-sort fa-sm'></i></a></th>
																	<?php endif; ?>
																</tr>
															</thead>
															<tbody>
																<?php foreach ($main as $data): ?>
																	<tr>
																		<td><input type="checkbox" name="id_cb[]" value="<?= $data['id']?>" /></td>
																		<td><?= $data['no']?></td>
																		<td nowrap>
																			<a href="<?= site_url("analisis_klasifikasi/form/$p/$o/$data[id]") ?>" class="btn btn-outline-info btn-sm"  title="Ubah Data"  data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Data Kategori Indikator"><i class='fe fe-edit'></i></a>
																			<a href="#" data-href="<?= site_url("analisis_klasifikasi/delete/$p/$o/$data[id]") ?>" class="btn btn-outline-info btn-sm"  title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash"></i></a>
																		</td>
																		<td width="60%"><?= $data['nama']?></td>
																		<td><?= $data['minval']?></td>
																		<td><?= $data['maxval']?></td>
																	</tr>
																<?php endforeach; ?>
															</tbody>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</form>
										<div class="row">
											<div class="col-sm-6">
												<div class="dataTables_length">
													<form id="paging" action="<?= site_url("analisis_klasifikasi") ?>" method="post" class="form-horizontal">
														<label>
															Tampilkan
															<select name="per_page" class="form-control input-sm" onchange="$('#paging').submit()">
																<option value="20" <?php selected($per_page,20); ?> >20</option>
																<option value="50" <?php selected($per_page,50); ?> >50</option>
																<option value="100" <?php selected($per_page,100); ?> >100</option>
															</select>
															Dari
															<strong><?= $paging->num_rows?></strong>
															Total Data
														</label>
													</form>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="dataTables_paginate paging_simple_numbers">
													<ul class="pagination">
														<?php if ($paging->start_link): ?>
															<li><a href="<?= site_url("analisis_klasifikasi/index/$paging->start_link/$o") ?>" aria-label="First"><span aria-hidden="true">Awal</span></a></li>
														<?php endif; ?>
														<?php if ($paging->prev): ?>
															<li><a href="<?= site_url("analisis_klasifikasi/index/$paging->prev/$o") ?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
														<?php endif; ?>
														<?php for ($i=$paging->start_link;$i<=$paging->end_link;$i++): ?>
															<li <?=jecho($p, $i, "class='active'") ?>><a href="<?= site_url("analisis_klasifikasi/index/$i/$o") ?>"><?= $i?></a></li>
														<?php endfor; ?>
														<?php if ($paging->next): ?>
															<li><a href="<?= site_url("analisis_klasifikasi/index/$paging->next/$o") ?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
														<?php endif; ?>
														<?php if ($paging->end_link): ?>
															<li><a href="<?= site_url("analisis_klasifikasi/index/$paging->end_link/$o") ?>" aria-label="Last"><span aria-hidden="true">Akhir</span></a></li>
														<?php endif; ?>
													</ul>
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
		</form>
	</section>
</div>
<?php $this->load->view('global/confirm_delete');?>
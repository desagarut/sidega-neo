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
		<h1>Pengaturan Periode - <?= $analisis_master['nama']?></h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li><a href="<?= site_url('analisis_master')?>"> Master Analisis</a></li>
			<li><a href="<?= site_url()?>analisis_periode/leave"><?= $analisis_master['nama']?></a></li>
			<li class="active">Pengaturan Periode</li>
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
							<a href="<?= site_url('analisis_periode/form')?>" class="btn btn-success btn-sm " title="Tambah Priode Baru"><i class="fe fe-plus"></i> Tambah Periode Baru</a>
							<a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '<?= site_url("analisis_periode/delete_all/$p/$o")?>')" class="btn btn-danger btn-sm  hapus-terpilih"><i class='fe fe-trash-o'></i> Hapus Data Terpilih</a>
							<a href="<?= site_url()?>analisis_periode/leave" class="btn btn-info btn-sm "><i class="fe fe-arrow-circle-left "></i> Kembali Ke <?= $analisis_master['nama']?></a>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
										<form id="mainform" name="mainform" action="" method="post">
											<div class="row">
												<div class="col-sm-6">
													<select class="form-control input-sm " name="state" onchange="formAction('mainform','<?= site_url('analisis_periode/state')?>')">
														<option value="">-- Status Pendataan --</option>
														<?php foreach ($list_state AS $data): ?>
															<option value="<?= $data['id']?>" <?php if ($state == $data['id']): ?>selected<?php endif ?>><?= $data['nama']?></option>
														<?php endforeach;?>
													</select>
												</div>
												<div class="col-sm-6">
													<div class="input-group input-group-sm pull-right">
														<input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?=html_escape($cari)?>" onkeypress="if (event.keyCode == 13){$('#'+'mainform').attr('action', '<?= site_url("analisis_periode/search")?>');$('#'+'mainform').submit();}">
														<div class="input-group-btn">
															<button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action', '<?= site_url("analisis_periode/search")?>');$('#'+'mainform').submit();"><i class="fe fe-search"></i></button>
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
																		<th><a href="<?= site_url("analisis_periode/index/$p/3")?>">Periode <i class='fe fe-sort-asc fa-sm'></i></a></th>
																	<?php elseif ($o==3): ?>
																		<th><a href="<?= site_url("analisis_periode/index/$p/4")?>">Periode <i class='fe fe-sort-desc fa-sm'></i></a></th>
																	<?php else: ?>
																		<th><a href="<?= site_url("analisis_periode/index/$p/3")?>">Periode <i class='fe fe-sort fa-sm'></i></a></th>
																	<?php endif; ?>
																	<?php if ($o==2): ?>
																		<th><a href="<?= site_url("analisis_periode/index/$p/1")?>">Tahun Pelaksanaan <i class='fe fe-sort-asc fa-sm'></i></a></th>
																	<?php elseif ($o==1): ?>
																		<th><a href="<?= site_url("analisis_periode/index/$p/2")?>">Tahun Pelaksanaan <i class='fe fe-sort-desc fa-sm'></i></a></th>
																	<?php else: ?>
																		<th><a href="<?= site_url("analisis_periode/index/$p/1")?>">Tahun Pelaksanaan <i class='fe fe-sort fa-sm'></i></a></th>
																	<?php endif; ?>
																	<th>Tahap Pendataan</th>
																	<th>Keterangan</th>
																	<th>Aktif</th>
																</tr>
															</thead>
															<tbody>
																<?php foreach ($main as $data): ?>
																	<tr>
																		<td><input type="checkbox" name="id_cb[]" value="<?= $data['id']?>" /></td>
																		<td><?= $data['no']?></td>
																		<td nowrap>
																			<a href="<?= site_url("analisis_periode/form/$p/$o/$data[id]")?>" class="btn bg-orange btn-box btn-sm"  title="Ubah Data Priode" ><i class='fe fe-edit'></i></a>
																			<a href="#" data-href="<?= site_url("analisis_periode/delete/$p/$o/$data[id]")?>" class="btn bg-maroon btn-box btn-sm"  title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash-o"></i></a>
																		</td>
																		<td><?= $data['nama']?></td>
																		<td><?= $data['tahun_pelaksanaan']?></td>
																		<td><?= $data['status']?></td>
																		<td><?= $data['keterangan']?></td>
																		<td><?= $data['aktif']?></td>
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
													<form id="paging" action="<?= site_url("analisis_periode")?>" method="post" class="form-horizontal">
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
															<li><a href="<?= site_url("analisis_periode/index/$paging->start_link/$o")?>" aria-label="First"><span aria-hidden="true">Awal</span></a></li>
														<?php endif; ?>
														<?php if ($paging->prev): ?>
															<li><a href="<?= site_url("analisis_periode/index/$paging->prev/$o")?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
														<?php endif; ?>
														<?php for ($i=$paging->start_link;$i<=$paging->end_link;$i++): ?>
															<li <?=jecho($p, $i, "class='active'")?>><a href="<?= site_url("analisis_periode/index/$i/$o")?>"><?= $i?></a></li>
														<?php endfor; ?>
														<?php if ($paging->next): ?>
															<li><a href="<?= site_url("analisis_periode/index/$paging->next/$o")?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
														<?php endif; ?>
														<?php if ($paging->end_link): ?>
															<li><a href="<?= site_url("analisis_periode/index/$paging->end_link/$o")?>" aria-label="Last"><span aria-hidden="true">Akhir</span></a></li>
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
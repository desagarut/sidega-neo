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
		<h1>Pengaturan Widget</h1>
		<ol class="breadcrumb">
			<li><a href="<?=site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li class="active">Pengaturan Widget</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="mainform" name="mainform" action="" method="post">
			<div class="row">
				<div class="col-md-12">
					<div class="card shadow">
						<div class="card-header">
							<a href="<?=site_url("web_widget/form")?>" class="btn btn-success btn-sm"  title="Tambah Artikel">
								<i class="fe fe-plus"></i> Tambah Widget
							</a>
							<?php if ($this->CI->cek_hak_akses('h')): ?>
								<a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '<?=site_url("web_widget/delete_all/$p/$o")?>')" class="btn btn-outline-danger btn-sm btn-sm hapus-terpilih"><i class='fe fe-trash'></i> Hapus Data Terpilih</a>
							<?php endif; ?>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
										<form id="mainform" name="mainform" action="" method="post">
											<div class="row">
												<div class="col-sm-6">
													<select class="form-control input-sm " name="filter" onchange="formAction('mainform', '<?=site_url('web_widget/filter/filter')?>')">
														<option value="">Semua</option>
														<option value="1" <?php selected($filter, 1); ?>>Aktif</option>
														<option value="2" <?php selected($filter, 2); ?>>Tidak Aktif</option>
													</select>
												</div>
												<div class="col-sm-6">
													<div class="box-tools">
														<div class="input-group input-group-sm pull-right">
															<input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?=html_escape($cari)?>" onkeypress="if (event.keyCode == 13):$('#'+'mainform').attr('action', '<?=site_url('web_widget/filter/cari')?>');$('#'+'mainform').submit();endif">
															<div class="input-group-btn">
																<button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action', '<?=site_url("web_widget/filter/cari")?>');$('#'+'mainform').submit();"><i class="fe fe-search"></i></button>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-12">
													<div class="table-responsive">
														<table class="table table-bordered table-striped dataTable table-hover">
															<thead class="bg-gray disabled color-palette">
																<tr>
																	<th><input type="checkbox" id="checkall"/></th>
																	<th>No</th>
																	<th>Aksi</th>
																	<th nowrap>Judul</th>
																	<th nowrap>Jenis Widget</th>
																	<th>Aktif</th>
																	<th>Isi</th>
																</tr>
															</thead>
															<tbody>
																<?php foreach ($main as $data): ?>
																	<tr <?php if ($data['jenis_widget']!=1): ?>style='background-color:#f8deb5 !important;'<?php endif; ?>>
																		<td width="1%"><input type="checkbox" name="id_cb[]" value="<?=$data['id']?>" /></td>
																		<td width="1%"><?=$data['no']?></td>
																		<td width="5%" nowrap>
																			<a href="<?=site_url("web_widget/urut/$data[id]/1")?>" class="btn bg-olive btn-box btn-sm"  title="Pindah Posisi Ke Bawah"><i class="fe fe-arrow-down"></i></a>
																			<a href="<?=site_url("web_widget/urut/$data[id]/2")?>" class="btn bg-olive btn-box btn-sm"  title="Pindah Posisi Ke Atas"><i class="fe fe-arrow-up"></i></a>
																			<?php if ($data['jenis_widget']!=1): ?>
																				<a href="<?=site_url("web_widget/form/$p/$o/$data[id]")?>" class="btn btn-outline-info btn-sm"  title="Ubah"><i class="fe fe-edit"></i></a>
																			<?php endif; ?>
																			<?php if ($data['form_admin']): ?>
																				<a href="<?=site_url("$data[form_admin]")?>" class="btn btn-info btn-box btn-sm"  title="Form Admin"><i class="fe fe-sliders"></i></a>
																			<?php endif; ?>
																			<?php if ($data['enabled'] == '2'): ?>
																				<a href="<?=site_url("web_widget/lock/$data[id]")?>" class="btn bg-navy btn-box btn-sm"  title="Aktifkan Widget"><i class="fe fe-lock">&nbsp;</i></a>
																			<?php elseif ($data['enabled'] == '1'): ?>
																				<a href="<?=site_url("web_widget/unlock/$data[id]")?>" class="btn bg-navy btn-box btn-sm"  title="Non Aktifkan Widget"><i class="fe fe-unlock"></i></a>
																			<?php endif; ?>
																			<?php if ($this->CI->cek_hak_akses('h')): ?>
																				<?php if ($data['jenis_widget']!=1): ?>
																				<a href="#" data-href="<?=site_url("web_widget/delete/$p/$o/$data[id]")?>" class="btn btn-outline-info btn-sm"  title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash"></i></a>
																				<?php endif; ?>
																			<?php endif; ?>
																		</td>
																		<td nowrap><?=$data['judul']?></td><td>
																			<?php if ($data['jenis_widget'] == 1): ?>
																				Sistem
																			<?php elseif ($data['jenis_widget'] == 2): ?>
																				Statis
																			<?php else: ?>
																				Dinamis
																			<?php endif; ?>
																		</td>
																		<td><?=$data['aktif']?></td>
																		<td><?=$data['isi']?></td>
																	</tr>
																<?php endforeach; ?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</form>
										<?php $this->load->view('global/paging');?>
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

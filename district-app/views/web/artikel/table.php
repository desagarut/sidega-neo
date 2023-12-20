<script>
	$(function() {
		var keyword = <?= $keyword?> ;
		$( "#cari" ).autocomplete( {
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
		<h1>Artikel <?= $kategori['kategori']; ?></h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li class="active">Artikel <?= $kategori['kategori']; ?></li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="mainform" name="mainform" action="" method="post">
			<div class="row">
				<div class="col-md-3">
					<?php $this->load->view('web/artikel/menu');?>
				</div>
				<div class="col-md-9">
					<div class="card shadow">
						<div class="card-header">
							<?php if ($this->CI->cek_hak_akses('h')): ?>
							<?php if ($cat > 0): ?>
								<a href="<?= site_url("web/form")?>" class="btn btn-success btn-sm btn-sm " title="Tambah Artikel">
									<i class="fe fe-plus"></i>Tambah
									<?php if ($kategori): ?>
										<?= $kategori['kategori']; ?>
									<?php elseif ($cat == 1000): ?>
										Agenda
									<?php elseif ($cat == 1001): ?>
										Artikel Keuangan
									<?php else: ?>
										Artikel Statis
									<?php endif; ?> Baru
								</a>
							<?php endif; ?>
							
								<a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '<?= site_url("web/delete_all")?>')" class="btn btn-danger btn-sm  hapus-terpilih"><i class='fe fe-trash-o'></i> Hapus Data Terpilih</a>
							
							<?php if ($cat > 0 and $cat < 999): ?>
								<a href="#confirm-delete" title="Hapus Kategori <?=$kategori['kategori']?>" onclick="deleteAllBox('mainform', '<?= site_url("web/hapus")?>')" class="btn btn-danger btn-sm "><i class='fe fe-trash-o'></i> Hapus Kategori <?=$kategori['kategori']?></a>
							<?php endif; ?>
							<?php if ($cat == 999): ?>
								<a href="<?= site_url("web/reset")?>" class="btn btn-social btn-boxbtn-outline-info btn-sm " title="Reset Hit" data-toggle="modal" data-target="#reset-hit" data-remote="false"><i class="fe fe-spinner"></i> Reset Hit</a>
							<?php endif; ?>
							<?php endif; ?>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
										<form id="mainform" name="mainform" action="" method="post">
											<div class="row">
												<div class="col-sm-6">
													<select class="form-control input-sm " name="status" onchange="formAction('mainform', '<?= site_url("web/filter/status/$cat")?>')">
														<option value="">Semua Artikel</option>
														<option value="1" <?php selected($status, 1); ?>>Aktif</option>
														<option value="2" <?php selected($status, 2); ?>>Tidak Aktif</option>
													</select>
												</div>
												<div class="col-sm-6">
													<div class="box-tools">
														<div class="input-group input-group-sm pull-right">
															<input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?=html_escape($cari)?>" onkeypress="if (event.keyCode == 13):$('#'+'mainform').attr('action', '<?= site_url('web/filter/cari/$cat')?>');$('#'+'mainform').submit();endif">
															<div class="input-group-btn">
																<button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action', '<?= site_url("web/filter/cari/$cat")?>');$('#'+'mainform').submit();"><i class="fe fe-search"></i></button>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-12">
													<div class="table-responsive">
														<table class="table table-bordered dataTable table-striped table-hover tabel-daftar">
															<thead class="bg-gray disabled color-palette">
																<tr>
																	<th><input type="checkbox" id="checkall"/></th>
																	<th>No</th>
																	<th>Aksi</th>
																	<?php if ($o==2): ?>
																		<th width="50%"><a href="<?= site_url("web/index/$p/1")?>">Judul <i class='fe fe-sort-asc fa-sm'></i></a></th>
																	<?php elseif ($o==1): ?>
																		<th width="50%"><a href="<?= site_url("web/index/$p/2")?>">Judul <i class='fe fe-sort-desc fa-sm'></i></a></th>
																	<?php else: ?>
																		<th width="50%"><a href="<?= site_url("web/index/$p/1")?>">Judul <i class='fe fe-sort fa-sm'></i></a></th>
																	<?php endif; ?>
																	<?php if ($o==4): ?>
																		<th nowrap><a href="<?= site_url("web/index/$p/3")?>">Hit <i class='fe fe-sort-asc fa-sm'></i></a></th>
																	<?php elseif ($o==3): ?>
																		<th nowrap><a href="<?= site_url("web/index/$p/4")?>">Hit <i class='fe fe-sort-desc fa-sm'></i></a></th>
																	<?php else: ?>
																		<th nowrap><a href="<?= site_url("web/index/$p/3")?>">Hit <i class='fe fe-sort fa-sm'></i></a></th>
																	<?php endif; ?>
																	<?php if ($o==6): ?>
																		<th nowrap><a href="<?= site_url("web/index/$p/5")?>">Diposting Pada <i class='fe fe-sort-asc fa-sm'></i></a></th>
																	<?php elseif ($o==5): ?>
																		<th nowrap><a href="<?= site_url("web/index/$p/6")?>">Diposting Pada <i class='fe fe-sort-desc fa-sm'></i></a></th>
																	<?php else: ?>
																		<th nowrap><a href="<?= site_url("web/index/$p/5")?>">Diposting Pada <i class='fe fe-sort fa-sm'></i></a></th>
																	<?php endif; ?>
																</tr>
															</thead>
															<tbody>
																<?php foreach ($main as $data): ?>
																	<tr>
																		<td class="padat"><input type="checkbox" name="id_cb[]" value="<?=$data['id']?>" <?php $data['boleh_ubah'] or print('disabled')?> /></td>
																		<td class="padat"><?=$data['no']?></td>
																		<td class="aksi">
																			<?php if ($data['boleh_ubah']): ?>
																				<?php if ($this->CI->cek_hak_akses('u')): ?>
                                                                                    <a href="<?= site_url("web/form/$data[id]")?>" class="btn bg-orange btn-box btn-sm" title="Ubah Data"><i class="fe fe-edit"></i></a>
																					<a href="#" data-href="<?= site_url("web/delete/$data[id]")?>" class="btn bg-maroon btn-box btn-sm" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash-o"></i></a>
                                                                                    <a href="<?= site_url("web/ubah_kategori_form/$data[id]")?>" class="btn btn-outline-info btn-sm" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Kategori" title="Ubah Kategori"><i class="fe fe-folder-open"></i></a>
																				<?php endif; ?>
																				<?php if ($data['boleh_komentar'] == 1): ?>
																					<a href="<?= site_url("web/komentar_lock/$data[id]/2")?>" class="btn bg-info btn-box btn-sm" title="Tutup Komentar Artikel"><i class="fe fe-comment-o"></i></a>
																				<?php else: ?>
																					<a href="<?= site_url("web/komentar_lock/$data[id]/1")?>" class="btn bg-info btn-box btn-sm" title="Buka Komentar Artikel"><i class="fe fe-comment"></i></a>
																				<?php endif ?>
																				<?php if ($data['enabled'] == '1'): ?>
																					<a href="<?= site_url("web/artikel_lock/$data[id]/2"); ?>" class="btn bg-navy btn-box btn-sm" title="Non Aktifkan Artikel"><i class="fe fe-unlock"></i></a>
																					<a href="<?= site_url("web/headline/$data[id]")?>" class="btn bg-teal btn-box btn-sm" title="Jadikan Headline">
																						<i class="<?= ($data['headline']==1) ? 'fa fa-star-o' : 'fa fa-star' ?>"></i>
																					</a>
																					<a href="<?= site_url("web/slide/$data[id]"); ?>" class="btn bg-gray btn-box btn-sm" title="<?= ($data['headline']==3) ? 'Keluarkan dari slide' : 'Masukkan ke dalam slide' ?>">
																						<i class="<?= ($data['headline']==3) ? 'fa fa-pause' : 'fa fa-play' ?>"></i>
																					</a>
																				<?php else: ?>
																					<a href="<?= site_url("web/artikel_lock/$data[id]/1"); ?>" class="btn bg-navy btn-box btn-sm" title="Aktifkan Artikel"><i class="fe fe-lock"></i></a>
																				<?php endif ?>
																			<?php endif; ?>
																			<a href="<?= site_url('artikel/'.buat_slug($data)); ?>" target="_blank" class="btn bg-green btn-box btn-sm" title="Lihat Artikel"><i class="fe fe-eye"></i></a>
																		</td>
																		<td><?= $data['judul']?></td>
																		<td nowrap><?= hit($data['hit'])?></td>
																		<td nowrap><?= tgl_indo2($data['tgl_upload'])?></td>
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

<form action="<?= site_url("web/reset")?>" method="post">
	<div class='modal fade' id='reset-hit' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
					<h4 class='modal-title' id='myModalLabel'></i> Reset Hit</h4>
				</div>
				<div class='modal-body'>
					<div class="form-group">
						<code>Lakukan hapus hit ini jika artikel statis di menu atas website anda terkena kunjungan tak terduga, seperti robot(crawler), yang berlebihan. </code><br><br>
						<label for="hit">Reset Hit</label>
						<select class="form-control input-sm" required name="hit" width="100%">
							<option value="">Pilih persen hit yang akan dihapus</option>
							<?php for ($i=1; $i <= 10; $i++): ?>
								<option value="<?=($i * 10)?>"><?=($i * 10).'%'?></option>
							<?php endfor; ?>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class='fe fe-sign-out'></i> Tutup</button>
					<button type="submit" class="btn btn-info btn-sm"><i class='fe fe-check'></i> Simpan</button>
				</div>
			</div>
		</div>
	</div>
</form>

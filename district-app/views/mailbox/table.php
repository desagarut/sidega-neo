<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Kotak Pesan</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fe fe-home"></i> Home</a></li>
			<li class="active">Kotak Pesan</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="mainform" name="mainform" action="" method="post">
			<div class="row">
				<?php $this->load->view('mailbox/menu_mailbox') ?>
				<div class="col-md-9">
					<div class="card shadow">
            <div class="card-header">
							<a href="<?= site_url('mailbox/form') ?>" class="btn btn-outline-info btn-sm " title="Tulis Pesan"><i class="fe fe-plus"></i> Tulis Pesan</a>
							<a href="#confirm-delete" title="Arsipkan Data" <?php if(!$filter_archived) : ?>onclick="deleteAllBox('mainform','<?=site_url("mailbox/archive_all/$kat/$p/$o")?>')"<?php endif ?> class="btn btn-social btn-flat btn-danger btn-sm  hapus-terpilih" <?php $filter_archived and print('disabled') ?>><i class='fe fe-file-archive-o'></i> Arsipkan Data Terpilih</a>
							<a href="<?= site_url("mailbox/clear/$kat/$p/$o") ?>" class="btn btn-social btn-flatbtn-outline-info btn-sm "><i class="fe fe-refresh"></i>Bersihkan Filter</a>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
										<form id="mainform" name="mainform" action="" method="post">
											<div class="row">
												<div class="col-sm-9">
													<div class="form-group">
														<select class="form-control input-sm select2-nik-ajax" id="nik" style="width:100%" name="nik" data-url="<?= site_url('mailbox/list_pendaftar_mandiri_ajax')?>" onchange="formAction('mainform', '<?=site_url("mailbox/filter_nik/$kat")?>')">
															<?php if ($individu): ?>
																<option value="<?= $individu['nik']?>" selected><?= $individu['nik'] .' - '.$individu['nama']?></option>
																<?php else : ?>
																	<option value="0" selected>Semua Pendaftar Layanan Mandiri</option>
															<?php endif;?>
														</select>
													</div>
													<div class="form-group">
														<select class="form-control input-sm " name="status" onchange="formAction('mainform','<?=site_url("mailbox/filter_status/$kat")?>')">
															<option value="">Semua</option>
															<option value="1" <?php if ($filter_status==1): ?>selected<?php endif ?>>Sudah Dibaca</option>
															<option value="2" <?php if ($filter_status==2): ?>selected<?php endif ?>>Belum Dibaca</option>
															<option value="3" <?php if ($filter_archived): ?>selected<?php endif ?>>Diarsipkan</option>
														</select>
													</div>
													
												</div>
												<div class="col-sm-3">
													<div class="box-tools">
														<div class="input-group input-group-sm pull-right">
															<input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?=html_escape($cari)?>" onkeypress="if (event.keyCode == 13):$('#'+'mainform').attr('action','<?=site_url("mailbox/search/$kat")?>');$('#'+'mainform').submit();endif;">
															<div class="input-group-btn">
																<button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action', '<?=site_url("mailbox/search/$kat")?>');$('#'+'mainform').submit();"><i class="fe fe-search"></i></button>
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
																	<?php if ($o==2): ?>
                                    <th><a href="<?= site_url("mailbox/index/$kat/$p/1")?>"><?= $owner ?> <i class='fe fe-sort-asc fa-sm'></i></a></th>
                                  <?php elseif ($o==1): ?>
                                    <th><a href="<?= site_url("mailbox/index/$kat/$p/2")?>"><?= $owner ?> <i class='fe fe-sort-desc fa-sm'></i></a></th>
                                  <?php else: ?>
                                    <th><a href="<?= site_url("mailbox/index/$kat/$p/1")?>"><?= $owner ?> <i class='fe fe-sort fa-sm'></i></a></th>
																	<?php endif; ?>

																	<?php if ($o==4): ?>
                                    <th nowrap><a href="<?= site_url("mailbox/index/$kat/$p/3")?>">NIK <i class='fe fe-sort-asc fa-sm'></i></a></th>
                                  <?php elseif ($o==3): ?>
                                    <th nowrap><a href="<?= site_url("mailbox/index/$kat/$p/4")?>">NIK <i class='fe fe-sort-desc fa-sm'></i></a></th>
                                  <?php else: ?>
                                    <th nowrap><a href="<?= site_url("mailbox/index/$kat/$p/3")?>">NIK <i class='fe fe-sort fa-sm'></i></a></th>
																	<?php endif; ?>
																	
                                  <th>Subjek Pesan</th>

                                  <?php if ($o==8): ?>
                                    <th nowrap><a href="<?= site_url("mailbox/index/$kat/$p/7")?>">Status Pesan <i class='fe fe-sort-asc fa-sm'></i></a></th>
                                  <?php elseif ($o==7): ?>
                                    <th nowrap><a href="<?= site_url("mailbox/index/$kat/$p/8")?>">Status Pesan <i class='fe fe-sort-desc fa-sm'></i></a></th>
                                  <?php else: ?>
                                    <th nowrap><a href="<?= site_url("mailbox/index/$kat/$p/7")?>">Status Pesan <i class='fe fe-sort fa-sm'></i></a></th>
                                  <?php endif; ?>

                                  <?php if ($o==10): ?>
                                    <th><a href="<?= site_url("mailbox/index/$kat/$p/9")?>">Dikirimkan Pada <i class='fe fe-sort-asc fa-sm'></i></a></th>
                                  <?php elseif ($o==9): ?>
                                    <th><a href="<?= site_url("mailbox/index/$kat/$p/10")?>">Dikirimkan Pada <i class='fe fe-sort-desc fa-sm'></i></a></th>
                                  <?php else: ?>
                                    <th><a href="<?= site_url("mailbox/index/$kat/$p/9")?>">Dikirimkan Pada <i class='fe fe-sort fa-sm'></i></a></th>
                                  <?php endif; ?>
																</tr>
															</thead>
															<tbody>
																<?php foreach ($main as $data): ?>
																	<tr <?php if ($data['status']!=1): ?>style='background-color:#ffeeaa;'<?php endif; ?>>
																		<td><input type="checkbox" name="id_cb[]" value="<?=$data['id']?>" /></td>
																		<td><?=$data['no']?></td>
																		<td nowrap>
                                      <?php if($data['is_archived'] == 0) : ?>
																				<a href="#" data-href="<?=site_url("mailbox/archive/$kat/$p/$o/$data[id]")?>" class="btn bg-maroon btn-flat btn-sm"  title="Arsipkan" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-file-archive-o"></i></a>
																			<?php endif ?>
                                      <a href="<?=site_url("mailbox/baca_pesan/{$kat}/{$data['id']}")?>" class="btn bg-navy btn-flat btn-sm" title="Lihat detail pesan"><i class="fe fe-list">&nbsp;</i></a>
                                      <?php if($kat != 2 AND $data['is_archived'] != 1) : ?>
																				<?php if ($data['status'] == 1): ?>
																					<a href="<?=site_url('mailbox/pesan_unread/'.$data['id'])?>" class="btn bg-navy btn-flat btn-sm" title="Tandai sebagai belum dibaca"><i class="fe fe-envelope-o"></i></a>
																					<?php else : ?>
																						<a href="<?=site_url('mailbox/pesan_read/'.$data['id'])?>" class="btn bg-navy btn-flat btn-sm" title="Tandai sebagai sudah dibaca"><i class="fe fe-envelope-open-o"></i></a>
																				<?php endif; ?>
																			<?php endif ?>
                                    </td>
                                    <td nowrap><?=$data['owner']?></td>
                                    <td><?=$data['email']?></td>
                                    <td width="40%"><?=$data['subjek']?></td>
                                    <td><?=$data['status'] == 1 ? 'Sudah Dibaca' : 'Belum Dibaca' ?></td>
                                    <td nowrap><?=tgl_indo2($data['tgl_upload'])?></td>
																	</tr>
																<?php endforeach; ?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</form>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="dataTables_length">
                          <form id="paging" action="<?= site_url("mailbox/index/$kat")?>" method="post" class="form-horizontal">
                            <label>
                              Tampilkan
                              <select name="per_page" class="form-control input-sm" onchange="$('#paging').submit()">
                                <option value="20" <?php selected($per_page, 20); ?> >20</option>
                                <option value="50" <?php selected($per_page, 50); ?> >50</option>
                                <option value="100" <?php selected($per_page, 100); ?> >100</option>
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
                              <li><a href="<?=site_url("mailbox/index/$kat/$paging->start_link/$o")?>" aria-label="First"><span aria-hidden="true">Awal</span></a></li>
                            <?php endif; ?>
                            <?php if ($paging->prev): ?>
                              <li><a href="<?=site_url("mailbox/index/$kat/$paging->prev/$o")?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                            <?php endif; ?>
                            <?php for ($i=$paging->start_link;$i<=$paging->end_link;$i++): ?>
                              <li <?=jecho($p, $i, "class='active'")?>><a href="<?= site_url("mailbox/index/$i/$o")?>"><?= $i?></a></li>
                            <?php endfor; ?>
                            <?php if ($paging->next): ?>
                              <li><a href="<?=site_url("mailbox/index/$kat/$paging->next/$o")?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
                            <?php endif; ?>
                            <?php if ($paging->end_link): ?>
                              <li><a href="<?=site_url("mailbox/index/$kat/$paging->end_link/$o")?>" aria-label="Last"><span aria-hidden="true">Akhir</span></a></li>
                            <?php endif; ?>
                          </ul>
                        </div>
                      </div>
                    </div>
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
											Apakah Anda yakin ingin mengarsipkan data ini?
										</div>
										<div class='modal-footer'>
											<button type="button" class="btn btn-social btn-flat btn-warning btn-sm" data-dismiss="modal"><i class='fe fe-sign-out'></i> Tutup</button>
											<a class='btn-ok'>
												<button type="button" class="btn btn-social btn-flat btn-danger btn-sm" id="ok-delete"><i class='fe fe-file-archive-o'></i> Arsipkan</button>
											</a>
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


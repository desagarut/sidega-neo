<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>SMS</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li class="active">SMS</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="mainform" name="mainform" action="" method="post">
			<div class="row">
				<div class="col-md-3">
					<a href="<?= site_url('sms/form/0/0/2')?>" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Tulis Pesan Baru"  class="btn btn-primary btn-block margin-bottom">Tulis Pesan Baru</a>
					<div class="card shadow">
						<div class="card-header">
							<h3 class="box-title">SMS</h3>
							<div class="box-tools">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fe fe-minus"></i></button>
							</div>
						</div>
						<div class="box-body no-padding">
							<ul class="nav nav-pills nav-stacked">
								<li><a href="<?= site_url('sms/clear')?>"><i class="fe fe-inbox"></i> Kotak Masuk</a></li>
								<li><a href="<?= site_url('sms/outbox')?>"><i class="fe fe-pencil"></i> Tulis Pesan</a></li>
								<li class="active"><a href="<?= site_url('sms/sentitem')?>"><i class="fe fe-envelope-o"></i> Pesan Terkirim</a></li>
								<li><a href="<?= site_url('sms/pending')?>"><i class="fe fe-file-text-o"></i> Pesan Tertunda</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="card shadow">
            <div class="card-header">
							<a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '<?= site_url("sms/delete_all/$p/$o/2")?>')" class="btn btn-outline-danger btn-sm btn-sm hapus-terpilih"><i class='fe fe-trash'></i> Hapus Data Terpilih</a>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
										<form id="mainform" name="mainform" action="" method="post">
											<div class="row">
												<div class="col-sm-12">
													<div class="table-responsive">
														<table class="table table-bordered dataTable table-hover">
															<thead class="bg-gray disabled color-palette">
																<tr>
																	<th><input type="checkbox" id="checkall"/></th>
																	<th>No</th>
																	<th>Aksi</th>
                                  <th>Nama</th>
																	<?php if ($o==2): ?>
                                    <th><a href="<?= site_url("sms/sentitem/$p/1")?>">Nomor HP <i class='fe fe-sort-asc fa-sm'></i></a></th>
                                  <?php elseif ($o==1): ?>
                                    <th><a href="<?= site_url("sms/sentitem/$p/2")?>">Nomor HP <i class='fe fe-sort-desc fa-sm'></i></a></th>
                                  <?php else: ?>
                                    <th><a href="<?= site_url("sms/sentitem/$p/1")?>">Nomor HP <i class='fe fe-sort fa-sm'></i></a></th>
                                  <?php endif; ?>
																	<th>Isi Pesan</th>
                                  <?php if ($o==6): ?>
                                    <th nowrap><a href="<?= site_url("sms/sentitem/$p/5")?>">Dikirim <i class='fe fe-sort-asc fa-sm'></i></a></th>
                                  <?php elseif ($o==5): ?>
                                    <th nowrap><a href="<?= site_url("sms/sentitem/$p/6")?>">Dikirim <i class='fe fe-sort-desc fa-sm'></i></a></th>
                                  <?php else: ?>
                                    <th nowrap><a href="<?= site_url("sms/sentitem/$p/5")?>">Dikirim <i class='fe fe-sort fa-sm'></i></a></th>
                                  <?php endif; ?>
																</tr>
															</thead>
															<tbody>
																<?php foreach ($main as $data): ?>
																	<tr>
																		<td><input type="checkbox" name="id_cb[]" value="<?=$data['ID']?>" /></td>
																		<td><?=$data['no']?></td>
																		<td nowrap>
																			<a href="<?= site_url("sms/form/$p/$o/2/$data[ID]")?>" class="btn btn-outline-info btn-sm" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Lihat Pesan" title="Tampilkan dan Balas"><i class="fe fe-reply"></i></a>
																			<a href="#" data-href="<?= site_url("sms/delete/$p/$o/2/$data[ID]")?>" class="btn btn-outline-info btn-sm"  title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash"></i></a>
                                    </td>
                                    <td nowrap><?=$data['nama']?></td>
																		<td><?=$data['DestinationNumber']?></td>
																		<td width="40%"><?=$data['TextDecoded']?></td>
																		<td nowrap><?=tgl_indo2($data['SendingDateTime'])?></td>
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
                          <form id="paging" action="<?= site_url("sms/sentitem")?>" method="post" class="form-horizontal">
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
                              <li><a href="<?= site_url("sms/sentitem/$paging->start_link/$o")?>" aria-label="First"><span aria-hidden="true">Awal</span></a></li>
                            <?php endif; ?>
                            <?php if ($paging->prev): ?>
                              <li><a href="<?= site_url("sms/sentitem/$paging->prev/$o")?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                            <?php endif; ?>
                            <?php for ($i=$paging->start_link;$i<=$paging->end_link;$i++): ?>
                              <li <?=jecho($p, $i, "class='active'")?>><a href="<?= site_url("sms/sentitem/$i/$o")?>"><?= $i?></a></li>
                            <?php endfor; ?>
                            <?php if ($paging->next): ?>
                              <li><a href="<?= site_url("sms/sentitem/$paging->next/$o")?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
                            <?php endif; ?>
                            <?php if ($paging->end_link): ?>
                              <li><a href="<?= site_url("sms/sentitem/$paging->end_link/$o")?>" aria-label="Last"><span aria-hidden="true">Akhir</span></a></li>
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
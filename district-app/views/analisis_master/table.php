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

<div class="content-wrapper">

	<section class="content-header">

		<h1>Master Pengumpulan Data Potensi/Sumber Daya </h1>

		<ol class="breadcrumb">

			<li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>

			<li class="active">Master Pengumpulan</li>

		</ol>

	</section>

	<section class="content" id="maincontent">

		<div class="row">

			<div class="col-md-12">

				<div class="card shadow">

					<div class="card-header">

						<a href="<?= site_url('analisis_master/form')?>" class="btn btn-success btn-sm " title="Tambah Analisis Baru"><i class="fe fe-plus"></i> Tambah Analisis Baru</a>

						<a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform','<?= site_url("analisis_master/delete_all/$p/$o")?>')" class="btn btn-social btn-box	btn-danger btn-sm  hapus-terpilih"><i class='fe fe-trash'></i> Hapus Data Terpilih</a>

						<a href="<?= site_url('analisis_master/import_analisis')?>" class="btn btn-outline-info btn-sm " title="Impor Analisis" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Impor Analisis"><i class="fe fe-upload"></i> Impor Analisis</a>

						<a href="<?= site_url("{$this->controller}/clear") ?>" class="btn btn-outline-info btn-sm "><i class="fe fe-refresh"></i>Bersihkan Filter</a>

					</div>

					<div class="box-body">

						<div class="row">

							<div class="col-sm-12">

								<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">

									<form id="mainform" name="mainform" action="" method="post">

										<div class="row">

											<div class="col-sm-6">

												<select class="form-control input-sm " name="filter" onchange="formAction('mainform','<?= site_url('analisis_master/filter')?>')">

													<option value="">Pilih Subjek</option>

													<?php foreach ($list_subjek AS $data): ?>

														<option value="<?= $data['id']?>" <?php if ($filter == $data['id']): ?>selected<?php endif ?>><?= $data['subjek']?></option>

													<?php endforeach;?>

												</select>

												<select class="form-control input-sm " name="state" onchange="formAction('mainform', '<?= site_url('analisis_master/state')?>')">

													<option value="">Pilih Status</option>

													<option value="1" <?php if ($state == 1): ?>selected<?php endif ?>>Aktif</option>

													<option value="2" <?php if ($state == 2): ?>selected<?php endif ?>>Tidak Aktif</option>

												</select>

											</div>

											<div class="col-sm-6">

												<div class="box-tools">

													<div class="input-group input-group-sm pull-right">

														<input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?=html_escape($cari)?>" onkeypress="if (event.keyCode == 13){$('#'+'mainform').attr('action','<?= site_url('analisis_master/search')?>');$('#'+'mainform').submit();};">

														<div class="input-group-btn">

															<button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action','<?= site_url("analisis_master/search")?>');$('#'+'mainform').submit();"><i class="fe fe-search"></i></button>

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

																<th >Aksi</th>

																<?php if ($o==4): ?>

																	<th><a href="<?= site_url("analisis_master/index/$p/3")?>">Nama <i class='fe fe-sort-asc fa-sm'></i></a></th>

																<?php elseif ($o==3): ?>

																	<th><a href="<?= site_url("analisis_master/index/$p/4")?>">Nama <i class='fe fe-sort-desc fa-sm'></i></a></th>

																<?php else: ?>

																	<th><a href="<?= site_url("analisis_master/index/$p/3")?>">Nama <i class='fe fe-sort fa-sm'></i></a></th>

																<?php endif; ?>

																<?php if ($o==6): ?>

																	<th nowrap><a href="<?= site_url("analisis_master/index/$p/5")?>">Subjek/Unit Analisis <i class='fe fe-sort-asc fa-sm'></i></a></th>

																<?php elseif ($o==5): ?>

																	<th nowrap><a href="<?= site_url("analisis_master/index/$p/6")?>">Subjek/Unit Analisis <i class='fe fe-sort-desc fa-sm'></i></a></th>

																<?php else: ?>

																	<th nowrap><a href="<?= site_url("analisis_master/index/$p/5")?>">Subjek/Unit Analisis <i class='fe fe-sort fa-sm'></i></a></th>

																<?php endif; ?>

																<?php if ($o==2): ?>

																	<th nowrap><a href="<?= site_url("analisis_master/index/$p/1")?>">Status <i class='fe fe-sort-asc fa-sm'></i></a></th>

																<?php elseif ($o==1): ?>

																	<th nowrap><a href="<?= site_url("analisis_master/index/$p/2")?>">Status <i class='fe fe-sort-desc fa-sm'></i></a></th>

																<?php else: ?>

																	<th nowrap><a href="<?= site_url("analisis_master/index/$p/1")?>">Status <i class='fe fe-sort fa-sm'></i></a></th>

																<?php endif; ?>

															</tr>

														</thead>

														<tbody>

															<?php foreach ($main as $data): ?>

																<tr>

																	<td>

																		<?php if ($data['jenis']!=1): ?>

																			<input type="checkbox" name="id_cb[]" value="<?= $data['id']?>" />

																		<?php endif; ?>

																	</td>

																	<td><?= $data['no']?></td>

																	<td nowrap>

																		<a href="<?= site_url("analisis_master/menu/$data[id]")?>" class="btn btn-outline-info btn-sm"  title="Rincian Analisis"><i class="fe fe-list"></i></a>

																		<a href="<?= site_url("analisis_master/form/$p/$o/$data[id]")?>" class="btn btn-outline-info btn-sm"  title="Ubah Data"><i class='fe fe-edit'></i></a>

																		<?php if ($data['jenis']!=1): ?>

																			<a href="#" data-href="<?= site_url("analisis_master/delete/$p/$o/$data[id]")?>" class="btn btn-outline-info btn-sm"  title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash"></i></a>

																		<?php endif; ?>

																	</td>

																	<td width="60%"><?= $data['nama']?></td>

																	<td nowrap><?= $data['subjek']?></td>

																	<td><?= $data['lock']?></td>

																</tr>

															<?php endforeach;?>

														</tbody>

													</table>

												</div>

											</div>

										</div>

									</form>

									<div class="row">

										<div class="col-sm-6">

											<div class="dataTables_length">

												<form id="paging" action="<?= site_url("analisis_master")?>" method="post" class="form-horizontal">

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

                            <li><a href="<?= site_url("analisis_master/index/$paging->start_link/$o")?>" aria-label="First"><span aria-hidden="true">Awal</span></a></li>

                          <?php endif; ?>

                          <?php if ($paging->prev): ?>

                            <li><a href="<?= site_url("analisis_master/index/$paging->prev/$o")?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>

                          <?php endif; ?>

                          <?php for ($i=$paging->start_link;$i<=$paging->end_link;$i++): ?>

               	            <li <?=jecho($p, $i, "class='active'")?>><a href="<?= site_url("analisis_master/index/$i/$o")?>"><?= $i?></a></li>

                          <?php endfor; ?>

                          <?php if ($paging->next): ?>

                            <li><a href="<?= site_url("analisis_master/index/$paging->next/$o")?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>

                          <?php endif; ?>

                          <?php if ($paging->end_link): ?>

                            <li><a href="<?= site_url("analisis_master/index/$paging->end_link/$o")?>" aria-label="Last"><span aria-hidden="true">Akhir</span></a></li>

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

	</section>

</div>

<?php $this->load->view('global/confirm_delete');?>




<script>

	$(function() {

		var keyword = <?= $keyword; ?> ;

		$("#cari").autocomplete({

			source: keyword,

			maxShowItems: 10,

		});

	});

</script>

<?php

	$subjek = $_SESSION['subjek_tipe'];

	switch ($subjek):

		case 1: $sql = $nama="Nama"; $nomor="NIK";$asubjek="Penduduk"; break;

		case 2: $sql = $nama="Kepala Keluarga"; $nomor="Nomor KK";$asubjek="Keluarga"; break;

		case 3: $sql = $nama="Kepala Rumah Tangga"; $nomor="Nomor Rumah Tangga";$asubjek="Rumah Tangga"; break;

		case 4: $sql = $nama="Nama Kelompok"; $nomor="ID Kelompok";$asubjek="Kelompok"; break;

		default: return null;

	endswitch;

?>

<div class="content-wrapper">

	<section class="content-header">

		<h1>Data Sensus - <?= $analisis_master['nama']?></h1>

		<ol class="breadcrumb">

			<li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>

			<li><a href="<?= site_url('analisis_master')?>"> Master Analisis</a></li>

			<li><a href="<?= site_url()?>analisis_respon/leave"><?= $analisis_master['nama']?></a></li>

			<li class="active">Data Sensus</li>

		</ol>

	</section>

	<section class="content" id="maincontent">

		<div class="row">

			<div class="col-md-4 col-lg-3">

				<?php $this->load->view('analisis_master/left', $data);?>

			</div>

			<div class="col-md-8 col-lg-9">

				<div class="card shadow">

				<div class="card-header">

						<a href="<?= site_url("analisis_respon/data_ajax")?>" class="btn btn-outline-info btn-sm" title="Unduh data respon" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh Data Respon">

							<i class="fe fe-download"></i>Unduh

						</a>

						<a href="<?= site_url("analisis_respon/import")?>" class="btn btn-outline-info btn-sm" title="Impor Data Respon" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Impor Data Respon">

							<i class="fe fe-upload"></i>Impor

						</a>

						<?php if ($analisis_master['format_impor'] == 1): ?>

							<a href="<?= site_url("analisis_respon/form_impor_bdt")?>" class="btn btn-outline-info btn-sm" title="Impor Data BDT 2015" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Impor Data BDT 2015">

								<i class="fe fe-upload"></i>Impor BDT 2015

							</a>

						<?php endif; ?>

						<a href="<?= site_url()?>analisis_respon/leave" class="btn btn-info btn-sm "><i class="fe fe-arrow-circle-left "></i> Kembali Ke <?= $analisis_master['nama']?></a>

					</div>

					<div class="card-header">

						<div class="table-responsive">

							<table class="table table-bordered table-striped table-hover" >

								<tr>

									<td width="150">Nama Analisis</td>

									<td width="1">:</td>

									<td><a href="<?= site_url()?>analisis_master/menu/<?= $_SESSION['analisis_master']?>"><?= $analisis_master['nama']?></a></td>

								</tr>

								<tr>

									<td>Subjek Analisis</td>

									<td>:</td>

									<td><?= $asubjek?></td>

								</tr>

								<tr>

									<td>Periode</td>

									<td>:</td>

									<td><?= $analisis_periode?></td>

								</tr>

							</table>

						</div>

					</div>

					<div class="box-body">

						<div class="table-responsive">

							<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">

								<form id="mainform" name="mainform" action="" method="post">

									<div class="row">

										<div class="col-sm-8">

											<select class="form-control input-sm" name="isi" onchange="formAction('mainform', '<?= site_url('analisis_respon/isi')?>')">

												<option value=""> --- Semua --- </option>

												<option value="1" <?= selected($isi, 1); ?>>Sudah Terinput</option>

												<option value="2" <?= selected($isi, 2); ?>>Belum Terinput</option>

											</select>

											<select class="form-control input-sm " name="dusun" onchange="formAction('mainform','<?= site_url('analisis_respon/dusun')?>')">

												<option value="">Pilih <?= ucwords($this->setting->sebutan_dusun)?></option>

												<?php foreach ($list_dusun AS $data): ?>

													<option value="<?= $data['dusun']?>" <?php if ($dusun == $data['dusun']): ?>selected<?php endif ?>><?= strtoupper($data['dusun'])?></option>

												<?php endforeach;?>

											</select>

											<?php if ($dusun): ?>

												<select class="form-control input-sm" name="rw" onchange="formAction('mainform','<?= site_url('analisis_respon/rw')?>')" >

													<option value="">RW</option>

													<?php foreach ($list_rw AS $data): ?>

														<option value="<?= $data['rw']?>" <?php if ($rw == $data['rw']): ?>selected<?php endif ?>><?= $data['rw']?></option>

													<?php endforeach;?>

												</select>

											<?php endif; ?>

											<?php if ($rw): ?>

												<select class="form-control input-sm" name="rt" onchange="formAction('mainform','<?= site_url('analisis_respon/rt')?>')">

													<option value="">RT</option>

													<?php foreach ($list_rt AS $data): ?>

														<option value="<?= $data['rt']?>" <?php if ($rt == $data['rt']): ?>selected<?php endif ?>><?= $data['rt']?></option>

													<?php endforeach;?>

												</select>

											<?php endif; ?>

										</div>

										<div class="col-sm-4">

											<div class="input-group input-group-sm pull-right">

												<input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?=html_escape($cari)?>" onkeypress="if (event.keyCode == 13):$('#'+'mainform').attr('action', '<?= site_url("analisis_respon/search")?>');$('#'+'mainform').submit();endif">

												<div class="input-group-btn">

													<button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action', '<?= site_url("analisis_respon/search")?>');$('#'+'mainform').submit();"><i class="fe fe-search"></i></button>

												</div>

											</div>

										</div>

									</div>

									<div class="table-responsive">

										<table class="table table-bordered dataTable table-striped table-hover tabel-daftar">

											<thead class="bg-gray disabled color-palette">

												<tr>

													<th>No</th>

													<th>Aksi</th>

													<?php if ($o==2): ?>

														<th><a href="<?= site_url("analisis_respon/index/$p/1")?>"><?= $nomor?> <i class='fe fe-sort-asc fa-sm'></i></a></th>

													<?php elseif ($o==1): ?>

														<th><a href="<?= site_url("analisis_respon/index/$p/2")?>"><?= $nomor?> <i class='fe fe-sort-desc fa-sm'></i></a></th>

													<?php else: ?>

														<th><a href="<?= site_url("analisis_respon/index/$p/1")?>"><?= $nomor?> <i class='fe fe-sort fa-sm'></i></a></th>

													<?php endif; ?>

													<?php if ($o==4): ?>

														<th><a href="<?= site_url("analisis_respon/index/$p/3")?>"><?= $nama?> <i class='fe fe-sort-asc fa-sm'></i></a></th>

													<?php elseif ($o==3): ?>

														<th><a href="<?= site_url("analisis_respon/index/$p/4")?>"><?= $nama?> <i class='fe fe-sort-desc fa-sm'></i></a></th>

													<?php else: ?>

														<th><a href="<?= site_url("analisis_respon/index/$p/3")?>"><?= $nama?> <i class='fe fe-sort fa-sm'></i></a></th>

													<?php endif; ?>

													<th>L/P</th>

													<th>Dusun</th>

													<th>RW</th>

													<th>RT</th>

													<th>Status</th>

												</tr>

											</thead>

											<tbody>

												<?php if ($main): ?>

													<?php foreach ($main as $data): ?>

														<tr>

															<td class="padat"><?= $data['no']; ?></td>

															<td class="aksi">

																<a href="<?= site_url("analisis_respon/kuisioner/$p/$o/$data[id]")?>" class="btn btn-outline-info btn-sm" title="Input Data"><i class='fe fe-check-square-o'></i></a>

																<?php if ($data['bukti_pengesahan']): ?>

																	<a href="<?= base_url(LOKASI_PENGESAHAN.$data['bukti_pengesahan'])?>" class="btn bg-olive btn-box btn-sm" title="Unduh Bukti Pengesahan" target="_blank"><i class="fe fe-paperclip"></i></a>

																<?php endif; ?>

															</td>

															<td nowrap><?= $data['nid']?></td>

															<td nowrap><?= $data['nama']?></td>

															<td align="center"><?= $data['jk']?></td>

															<td><?= $data['dusun']?></td>

															<td><?= $data['rw']?></td>

															<td><?= $data['rt']?></td>

															<td align="center"><?= $data['set']?></td>

														</tr>

													<?php endforeach; ?>

												<?php else: ?>

													<tr>

														<td colspan="9" class="text-center">Data Tidak Tersedia</td>

													</tr>

												<?php endif; ?>

											</tbody>

										</table>

									</div>

								</form>

								<div class="row">

									<div class="col-sm-6">

										<div class="dataTables_length">

											<form id="paging" action="<?= site_url("analisis_respon")?>" method="post" class="form-horizontal">

												<label>

													Tampilkan

													<select name="per_page" class="form-control input-sm" onchange="$('#paging').submit()">

														<option value="20" <?= selected($per_page, 20); ?>>20</option>

														<option value="50" <?= selected($per_page, 50); ?>>50</option>

														<option value="100" <?= selected($per_page, 100); ?>>100</option>

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

													<li><a href="<?= site_url("analisis_respon/index/$paging->start_link/$o")?>" aria-label="First"><span aria-hidden="true">Awal</span></a></li>

												<?php endif; ?>

												<?php if ($paging->prev): ?>

													<li><a href="<?= site_url("analisis_respon/index/$paging->prev/$o")?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>

												<?php endif; ?>

												<?php for ($i=$paging->start_link;$i<=$paging->end_link;$i++): ?>

													<li <?=jecho($p, $i, "class='active'")?>><a href="<?= site_url("analisis_respon/index/$i/$o")?>"><?= $i?></a></li>

												<?php endfor; ?>

												<?php if ($paging->next): ?>

													<li><a href="<?= site_url("analisis_respon/index/$paging->next/$o")?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>

												<?php endif; ?>

												<?php if ($paging->end_link): ?>

													<li><a href="<?= site_url("analisis_respon/index/$paging->end_link/$o")?>" aria-label="Last"><span aria-hidden="true">Akhir</span></a></li>

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

	</section>

</div>

<?php $this->load->view('global/confirm_delete');?>


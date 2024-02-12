<script>

	$(function(){

		var keyword = <?= $keyword?> ;

		$("#cari").autocomplete({

			source: keyword,

			maxShowItems: 10,

		});

	});

</script>

<div class="content-wrapper">

	<section class="content-header">

		<h1>Laporan Statistik Jawaban</h1>

		<ol class="breadcrumb">

			<li><a href="<?= site_url('beranda'); ?>"><i class="fe fe-home"></i> Home</a></li>

			<li><a href="<?= site_url('analisis_master'); ?>"> Master Analisis</a></li>

			<li><a href="<?= site_url('analisis_statistik_jawaban/leave'); ?>"><?= $analisis_master['nama']; ?></a></li>

			<li class="active">Laporan Per Indikator</li>

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

							<a href="<?=site_url("analisis_statistik_jawaban/cetak/$o"); ?>" class="btn btn-outline-info btn-sm" title="Cetak Data" target="_blank">

								<i class="fe fe-printer"></i>Cetak

							</a>

							<a href="<?=site_url("analisis_statistik_jawaban/excel/$o"); ?>" class="btn btn-outline-info btn-sm" title="Unduh" target="_blank">

								<i class="fe fe-download"></i>Unduh

							</a>

							<a href="<?= site_url(); ?>analisis_laporan/leave" class="btn btn-sm btn-outline-info mb-1"title="Kembali Ke Daftar RW">

								<i class="fe fe-arrow-circle-left "></i>Kembali Ke <?= $analisis_master['nama']; ?>

							</a>

						</div>

						<div class="card-header">

							<h5>Analisis Statistik Jawaban - <a href="<?= site_url(); ?>analisis_master/menu/<?= $_SESSION['analisis_master']; ?>"><a href="<?= site_url(); ?>analisis_master/menu/<?= $_SESSION['analisis_master']; ?>"><?= $analisis_master['nama']; ?></a></a></h5>

						</div>

						<div class="box-body">

							<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">

								<form id="mainform" name="mainform" action="" method="post">

									<div class="row">

										<div class="col-sm-9">

											<select class="form-control input-sm" name="tipe" onchange="formAction('mainform', '<?= site_url('analisis_statistik_jawaban/tipe'); ?>')">

												<option value="">Pilih Tipe Indikator</option>

												<?php foreach ($list_tipe AS $data): ?>

													<option value="<?= $data['id']; ?>" <?php if ($tipe == $data['id']): ?>selected<?php endif ?>><?= $data['tipe']; ?></option>

												<?php endforeach;?>

											</select>

											<select class="form-control input-sm" name="kategori" onchange="formAction('mainform', '<?= site_url('analisis_statistik_jawaban/kategori'); ?>')">

												<option value="">Pilih Tipe Kategori</option>

												<?php foreach ($list_kategori AS $data): ?>

													<option value="<?= $data['id']; ?>" <?php if ($kategori == $data['id']): ?>selected<?php endif ?>><?= $data['kategori']; ?></option>

												<?php endforeach;?>

											</select>

											<select class="form-control input-sm" name="filter" onchange="formAction('mainform', '<?= site_url('analisis_statistik_jawaban/filter'); ?>')">

												<option value="">Pilih Aksi Analisis</option>

												<option value="1" <?= selected($filter, 1); ?>>Ya</option>

												<option value="2" <?= selected($filter, 2); ?>>Tidak</option>

											</select>

											<select class="form-control input-sm " name="dusun" onchange="formAction('mainform','<?= site_url('analisis_statistik_jawaban/dusun'); ?>')">

												<option value="">Pilih <?= ucwords($this->setting->sebutan_dusun); ?></option>

												<?php foreach ($list_dusun AS $data): ?>

													<option value="<?= $data['dusun']; ?>" <?= selected($dusun, $data['dusun']); ?>><?= strtoupper($data['dusun']); ?></option>

												<?php endforeach;?>

											</select>

											<?php if ($dusun): ?>

												<select class="form-control input-sm" name="rw" onchange="formAction('mainform','<?= site_url('analisis_statistik_jawaban/rw'); ?>')" >

													<option value="">Pilih RW</option>

													<?php foreach ($list_rw AS $data): ?>

														<option value="<?= $data['rw']; ?>" <?= selected($rw, $data['rw']); ?>><?= $data['rw']; ?></option>

													<?php endforeach;?>

												</select>

											<?php endif; ?>

											<?php if ($rw): ?>

												<select class="form-control input-sm" name="rt" onchange="formAction('mainform','<?= site_url('analisis_statistik_jawaban/rt'); ?>')">

													<option value="">Pilih RT</option>

													<?php foreach ($list_rt AS $data): ?>

														<option value="<?= $data['rt']; ?>" <?= selected($rt, $rt['dusun']); ?>><?= $data['rt']; ?></option>

													<?php endforeach;?>

												</select>

											<?php endif; ?>

										</div>

										<div class="col-sm-3">

											<div class="input-group input-group-sm pull-right">

												<input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?=html_escape($cari); ?>" onkeypress="if (event.keyCode == 13){$('#'+'mainform').attr('action', '<?=site_url("analisis_statistik_jawaban/search"); ?>');$('#'+'mainform').submit();}">

												<div class="input-group-btn">

													<button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action', '<?=site_url("analisis_statistik_jawaban/search"); ?>');$('#'+'mainform').submit();"><i class="fe fe-search"></i></button>

												</div>

											</div>

										</div>

									</div>

									<div class="table-responsive">

										<table class="table table-bordered dataTable table-striped table-hover tabel-daftar">

											<thead class="bg-gray disabled color-palette">

												<tr>

													<th>No</th>

													<?php if ($o==4): ?>

														<th><a href="<?= site_url("analisis_statistik_jawaban/index/$p/3"); ?>">Pertanyaan/Indikator <i class='fe fe-sort-asc fa-sm'></i></a></th>

													<?php elseif ($o==3): ?>

														<th><a href="<?= site_url("analisis_statistik_jawaban/index/$p/4"); ?>">Pertanyaan/Indikator <i class='fe fe-sort-desc fa-sm'></i></a></th>

													<?php else: ?>

														<th><a href="<?= site_url("analisis_statistik_jawaban/index/$p/3"); ?>">Pertanyaan/Indikator <i class='fe fe-sort fa-sm'></i></a></th>

													<?php endif; ?>

													<th>Total</th>

													<?php if ($o==2): ?>

														<th><a href="<?= site_url("analisis_statistik_jawaban/index/$p/1"); ?>">Kode <i class='fe fe-sort-asc fa-sm'></i></a></th>

													<?php elseif ($o==1): ?>

														<th><a href="<?= site_url("analisis_statistik_jawaban/index/$p/2"); ?>">Kode <i class='fe fe-sort-desc fa-sm'></i></a></th>

													<?php else: ?>

														<th><a href="<?= site_url("analisis_statistik_jawaban/index/$p/1"); ?>">Kode <i class='fe fe-sort fa-sm'></i></a></th>

													<?php endif; ?>

													<th colspan="2">Jawaban</th>

													<th>Responden</th>

													<th>Jumlah</th>

													<?php if ($o==6): ?>

														<th><a href="<?= site_url("analisis_statistik_jawaban/index/$p/5"); ?>">Tipe Pertanyaan <i class='fe fe-sort-asc fa-sm'></i></a></th>

													<?php elseif ($o==5): ?>

														<th><a href="<?= site_url("analisis_statistik_jawaban/index/$p/6"); ?>">Tipe Pertanyaan <i class='fe fe-sort-desc fa-sm'></i></a></th>

													<?php else: ?>

														<th><a href="<?= site_url("analisis_statistik_jawaban/index/$p/5"); ?>">Tipe Pertanyaan <i class='fe fe-sort fa-sm'></i></a></th>

													<?php endif; ?>

													<?php if ($o==6): ?>

														<th><a href="<?= site_url("analisis_statistik_jawaban/index/$p/5"); ?>">Kategori/Variabel <i class='fe fe-sort-asc fa-sm'></i></a></th>

													<?php elseif ($o==5): ?>

														<th><a href="<?= site_url("analisis_statistik_jawaban/index/$p/6"); ?>">Kategori/Variabel <i class='fe fe-sort-desc fa-sm'></i></a></th>

													<?php else: ?>

														<th><a href="<?= site_url("analisis_statistik_jawaban/index/$p/5"); ?>">Kategori/Variabel <i class='fe fe-sort fa-sm'></i></a></th>

													<?php endif; ?>

													<?php if ($o==2): ?>

														<th><a href="<?= site_url("analisis_statistik_jawaban/index/$p/1"); ?>">Aksi Analisis <i class='fe fe-sort-asc fa-sm'></i></a></th>

													<?php elseif ($o==1): ?>

														<th><a href="<?= site_url("analisis_statistik_jawaban/index/$p/2"); ?>">Aksi Analisis <i class='fe fe-sort-desc fa-sm'></i></a></th>

													<?php else: ?>

														<th><a href="<?= site_url("analisis_statistik_jawaban/index/$p/1"); ?>">Aksi Analisis <i class='fe fe-sort fa-sm'></i></a></th>

													<?php endif; ?>

												</tr>

											</thead>

											<tbody>

												<?php $total = 0; foreach ($main as $key => $data): ?>

													<tr>

														<td class="padat"><?= ($key + 1); ?></td>

														<td width="30%"><?= $data['pertanyaan']; ?></a></td>

														<td class="padat"><a href="<?= site_url("analisis_statistik_jawaban/grafik_parameter/$data[id]"); ?>" ><?= $data['bobot']; ?></a></td>

														<td class="padat"><?= $data['nomor']; ?></td>

														<td class="padat">

															<?php foreach ($data['par'] as $par): ?>

															<?= $par['kode_jawaban']; ?>.<br>

															<?php endforeach; ?>

														</td>

														<td width="30%" nowrap>

															<?php foreach ($data['par'] as $par): ?>

																<?= $par['jawaban']; ?><br>

															<?php endforeach; ?>

														</td>

														<td class="padat">

															<?php foreach ($data['par'] as $par): ?>

																<a href="<?= site_url("analisis_statistik_jawaban/subjek_parameter/$data[id]/$par[id]"); ?>" ><?= $par['jml_p']; ?></a><br>

															<?php endforeach; ?>

														</td>

														<td class="padat"><?= $data['jumlah']; ?></td>

														<td><?= $data['tipe_indikator']; ?></td>

														<td><?= $data['kategori']; ?></td>

														<td class="padat"><?= $data['act_analisis']; ?></td>

													</tr>

													<?php

														if ($data['jumlah'] != "-"):

															$total += $data['jumlah'];

														endif;

													?>

												<?php endforeach; ?>

											</tbody>

											<?php if ($total != 0): ?>

												<tfooty>

													<tr>

														<td colspan="7"><b>TOTAL</b></td>

														<td><b><?= $total; ?></b></td>

														<td colspan="3"></td>

													</tr>

												</tfoot>

											<?php endif; ?>

										</table>

									</div>

								</form>

								<?php $this->load->view('global/paging'); ?>

							</div>

						</div>

					</div>

				</div>

			</div>

		</form>

	</section>

</div>


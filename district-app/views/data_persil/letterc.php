<script>
	$(function() {
		$("#cari").autocomplete({
			source: function(request, response) {
				$.ajax({
					type: "POST",
					url: '<?= site_url("letterc/autocomplete") ?>',
					dataType: "json",
					data: {
						cari: request.term
					},
					success: function(data) {
						response(JSON.parse(data));
					}
				});
			},
			minLength: 1,
		});
	});
</script>
<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Daftar Letter-C <?= ucwords($this->setting->sebutan_desa) ?> <?= $kelurahan["nama_desa"]; ?></h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('home') ?>"><i class="fe fe-home"></i> Home</a></li>
			<li class="active">Daftar Letter-C</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="mainform" name="mainform" action="" method="post">
			<div class="row">
				<div class="col-md-4 col-lg-3">
					<?php $this->load->view('data_persil/menu_kiri.php') ?>
				</div>
				<div class="col-md-8 col-lg-9">
					<div class="card shadow">
						<div class="box-header">
							<h4 class="text-center"><strong>DAFTAR LETTER C</strong></h4>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
										<a href='<?= site_url("letterc/create") ?>' class="btn bg-green btn-sm btn-sm " title="Cetak Data">
											<i class="fe fe-plus"></i>Tambah
										</a>
										<a href='<?= site_url("letterc/cetak") ?>' class="btn btn-social btn-boxbtn-outline-info btn-sm btn-sm " title="Cetak Data" target="_blank">
											<i class="fe fe-printer"></i>Cetak
										</a>
										<a href="<?= site_url("letterc/unduh") ?>" class="btn bg-navy btn-sm btn-sm " title="Unduh Data" target="_blank">
											<i class="fe fe-download"></i>Unduh
										</a>
										<a href="<?= site_url("letterc/clear") ?>" class="btn btn-social btn-boxbtn-outline-info btn-sm "><i class="fe fe-refresh"></i>Bersihkan</a>
										<form id="mainform" name="mainform" action="" method="post">
											<div class="row">
												<div class="col-sm-12">
													<div class="box-tools">
														<div class="input-group input-group-sm pull-right">
															<input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?= html_escape($cari) ?>" onkeypress="if (event.keyCode == 13){$('#'+'mainform').attr('action', '<?= site_url("letterc/search") ?>');$('#'+'mainform').submit();}">
															<div class="input-group-btn">
																<button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action', '<?= site_url("letterc/search") ?>');$('#'+'mainform').submit();"><i class="fe fe-search"></i></button>
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
																	<th>No</th>
																	<th>Aksi</th>
																	<th nowrap>No. Letter-C</th>
																	<th>Nama di Letter-C</th>
																	<th>Nama Pemilik</th>
																	<th>NIK</th>
																	<th nowrap>Jumlah Persil</th>
																	<!--<th>Dokumen</th>-->
																</tr>
															</thead>
															<tbody>
																<?php foreach ($letterc as $item) : ?>
																	<tr>
																		<td><?= $item['no'] ?></td>
																		<td nowrap>
																			<a href="<?= site_url("letterc/rincian/" . $item["id_letterc"]) ?>" class="btn btn-outline-info btn-sm" title="Rincian"><i class="fe fe-bars"></i></a>
																			<a href="<?= site_url("letterc/create_mutasi/" . $item["id_letterc"]) ?>" class="btn bg-green btn-box btn-sm" title="Tambah Data"><i class="fe fe-plus"></i></a>
																			<!--<a href="<?= site_url("letterc/create_dokumen/" . $item["id_letterc"]) ?>" class="btn bg-navy btn-box btn-sm" title="Tambah Data"><i class="fe fe-folder"></i></a>-->
																			<!--<a href="<?= site_url("letterc/form_dokumen/" . $item["id_letterc"]) ?>"  data-remote="false" data-toggle="modal" data-target="#modalBox" data-title=" Upload Dokumen" class="btn bg-navy btn-box btn-sm"><i class='fe fe-sign-out'></i> Upload</a>-->
																			<!--<a href="<?= site_url("letterc/rincian_dokumen/" . $item["id_letterc"]) ?>" class="btn bg-primary btn-box btn-sm" title="Ubah Data">Dokumen</a>-->
																			<a href="<?= site_url("letterc/create/edit/" . $item["id_letterc"]) ?>" class="btn bg-yellow btn-box btn-sm" title="Ubah Data"><i class="fe fe-edit"></i></a>
																			<a href="#" data-href="<?= site_url("letterc/hapus/" . $item["id_letterc"]) ?>" class="btn bg-maroon btn-box btn-sm" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash-o"></i></a>
																		</td>
																		<td><?= sprintf("%04s", $item["nomor"]) ?></td>
																		<td><?= $item['nama_kepemilikan'] ?>
																		<td><?= strtoupper($item["namapemilik"]) ?></td>
																		<td><a href='<?= site_url("penduduk/detail/1/0/$item[id_pend]") ?>'><?= $item["nik"] ?></a></td>
																		<td><?= $item["jumlah"] ?></td>
																		<!--<td><iframe src="<?= base_url() ?>desa/upload/dokumen/<?= $item['link_dokumen'] ?>" width=250px height=200px></iframe></a>-->
																	</tr>
																<?php endforeach; ?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</form>
										<?php $this->load->view('global/paging'); ?>
									</div>
								</div>
							</div>
							<?php $this->load->view('global/confirm_delete'); ?>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
</div>
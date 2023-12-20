<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Pengelolaan DTKS</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda'); ?>"><i class="fe fe-home"></i> Home</a></li>
			<li><a href="<?= site_url('data_dtks')?>"> Program Bantuan</a></li>
			<li class="active">Pengelolaan DTKS</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="mainform" name="mainform" action="" method="post">
			<div class="card shadow">
				<div class="card-header">
					<a href="<?=site_url('data_dtks/form')?>" class="btn bg-olive btn-sm " title="Tambah data_dtks Baru"><i class="fe fe-plus"></i> Tambah Kategori Data</a>
					<!--<a href="<?=site_url('data_dtks/panduan')?>" class="btn btn-info btn-sm " title="Tambah Program Bantuan Baru"><i class="fe fe-question-circle"></i> Panduan</a>-->
				</div>
				<div class="box-body">
					<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
						<form id="mainform" name="mainform" action="" method="post">
							<select class="form-control input-sm" name="sasaran" onchange="formAction('mainform', '<?= site_url('data_dtks'); ?>')">
								<option value="">Pilih Sasaran</option>
								<?php foreach ($list_sasaran AS $key => $value): ?>
									<?php if (in_array($key, ['1', '2'])) : ?>
										<option value="<?= $key; ?>" <?= selected($set_sasaran, $key); ?>><?= $value?></option>
									<?php endif; ?>
								<?php endforeach; ?>
							</select>
						</form>
						<div class="table-responsive">
							<table class="table table-bordered table-striped dataTable table-hover tabel-daftar">
								<thead class="bg-gray disabled color-palette">
									<tr>
										<th>No</th>
										<th>Aksi</th>
										<th>Tahun</th>
										<th>Nama Kelompok Data</th>
										<th>Jumlah Terdata</th>
										<th>Sasaran</th>
										<th>Keterangan</th>
									</tr>
								</thead>
								<tbody>
									<?php if ($data_dtks): ?>
										<?php	foreach ($data_dtks as $key => $item):	?>
											<tr>
												<td class="padat"><?= ($key + 1); ?></td>
												<td class="aksi">
													<a href="<?= site_url("data_dtks/clear/$item[id]"); ?>" class="btn btn-outline-info btn-sm" title="Rincian Data"><i class="fe fe-list-ol"></i></a>
													<a href="<?= site_url("data_dtks/form/$item[id]"); ?>" class="btn bg-orange btn-box btn-sm" title="Ubah Data"><i class='fe fe-edit'></i></a>
													<a
														<?php if ($item['jml'] <= 0): ?>
															href="#" data-href="<?= site_url("data_dtks/hapus/$item[id]")?>" data-toggle="modal" data-target="#confirm-delete"
														<?php endif; ?>
														class="btn bg-maroon btn-box btn-sm" title="Hapus" <?= jecho($item['jml'] > 0, true, 'disabled'); ?>><i class="fe fe-trash-o"></i>
													</a>
												</td>
												<td class="padat"><?= $item['tahun']?></td>
												<td width="20%"><a href="<?= site_url("data_dtks/rincian/$item[id]"); ?>"><?= $item["nama"] ?></a></td>
												<td class="padat"><?= $item['jml']?></td>
												<td class="nostretch"><?= $sasaran[$item["sasaran"]]?></td>
												<td><?= $item['keterangan']?></td>
											</tr>
										<?php endforeach; ?>
									<?php else: ?>
										<tr>
											<td class="text-center" colspan="6">Data Tidak Tersedia</td>
										</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
</div>
<?php $this->load->view('global/confirm_delete');?>

<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Program Kegiatan Pemberdayaan Masyarakat <?= ($set_sasaran == 0) ? '' : "Sasaran $sasaran[$set_sasaran]"; ?></h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda'); ?>"><i class="fe fe-home"></i> Home</a></li>
			<li class="active">Daftar Program Kegiatan Pemberdayaan Masyarakat</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="mainform" name="mainform" action="" method="post">
			<div class="card shadow">
				<div class="card-header">
					<a href="<?= site_url('pemberdayaan_masyarakat/form_kegiatan') ?>" class="btn btn-outline-info btn-sm" title="Tambah Kegiatan"><i class="fe fe-plus"></i> Tambah Kegiatan</a>
					<a href="<?= site_url('pemberdayaan_masyarakat/panduan') ?>" class="btn btn-info btn-sm " title="Panduan Program"><i class="fe fe-question-circle"></i> Panduan</a>
				</div>
				<div class="box-body">
					<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
						<form id="mainform" name="mainform" action="" method="post">
							<select class="form-control input-sm" name="sasaran" onchange="formAction('mainform', '<?= site_url('pemberdayaan_masyarakat'); ?>')">
								<option value="">Pilih Sasaran</option>
								<?php foreach ($list_sasaran as $key => $value) : ?>
									<?php if (in_array($key, ['1', '2'])) : ?>
										<option value="<?= $key; ?>" <?= selected($set_sasaran, $key); ?>><?= $value ?></option>
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
										<th>Nama Kegiatan</th>
										<th>Penyelenggara</th>
										<th>Tanggal</th>
										<th>Sumber Dana</th>
										<th>Anggaran</th>
										<th>Lokasi</th>
										<th>Sasaran - Jumlah</th>
										<th>Keterangan</th>
									</tr>
								</thead>
								<tbody>
									<?php if ($pemberdayaan_masyarakat) : ?>
										<?php foreach ($pemberdayaan_masyarakat as $key => $item) :	?>
											<tr>
												<td class="padat"><?= ($key + 1); ?></td>
												<td class="aksi">
													<a href="<?= site_url("pemberdayaan_masyarakat/clear/$item[id]"); ?>" class="btn btn-outline-info btn-sm" title="daftar peserta Data"><i class="fe fe-list"></i></a>
													<a href="<?= site_url("pemberdayaan_masyarakat/form_kegiatan/$item[id]"); ?>" class="btn btn-outline-info btn-sm" title="Ubah Data"><i class='fe fe-edit'></i></a>
													<a <?php if ($item['jml'] <= 0) : ?> href="#" data-href="<?= site_url("pemberdayaan_masyarakat/hapus/$item[id]") ?>" data-toggle="modal" data-target="#confirm-delete" <?php endif; ?> class="btn btn-outline-info btn-sm" title="Hapus" <?= jecho($item['jml'] > 0, true, 'disabled'); ?>><i class="fe fe-trash"></i>
													</a>
												</td>
												<td width="20%"><a href="<?= site_url("pemberdayaan_masyarakat/daftar_peserta/$item[id]"); ?>"><?= $item["nama_kegiatan"] ?></a></td>
												<td class="padat pull-left"><?= $item['nama_penyelenggara'] ?></td>
												<td class="text-center"><?= tgl_indo_out($item['tgl_mulai']) ?><br />s.d<br /><?= tgl_indo_out($item['tgl_selesai']) ?></td>
												<td class="padat"><?= $item['sumber_dana'] ?></td>
												<td class="padat"><?= rupiah($item['anggaran']) ?></td>
												<td class="padat"><?= $item['lokasi'] ?></td>
												<td class="padat"><?= $sasaran[$item["sasaran"]] ?><br /><?= $item['jml'] ?></td>
												<td><?= $item['keterangan'] ?></td>
											</tr>
										<?php endforeach; ?>
									<?php else : ?>
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
<?php $this->load->view('global/confirm_delete'); ?>
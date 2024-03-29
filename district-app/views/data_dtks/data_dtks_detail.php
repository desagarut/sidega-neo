<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<script>
	$(function() {
		var keyword = <?= $keyword ?>;
		$("#cari").autocomplete({
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
		<h1>Rincian Data Kelompok</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda') ?>"><i class="fe fe-home"></i> Home</a></li>
			<li><a href="<?= site_url('data_dtks') ?>"> Data Kemiskinan</a></li>
			<li class="active">Rincian Data Kelompok</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="card shadow">
			<div class="card-header">
				<a href="<?= site_url("data_dtks/form_terdata/" . $data_dtks['id']) ?>" title="Tambah Data Warga" class="btn btn-outline-info btn-sm"><i class="fe fe-plus"></i> Tambah Warga Terdata</a>
				<a href="<?= site_url("data_dtks/dialog_daftar/$data_dtks[id]/cetak") ?>" class="btn btn-outline-info btn-sm " data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak Data data_dtks <?= $sasaran[$data_dtks["sasaran"]]; ?> "><i class="fe fe-printer "></i> Cetak</a>
				<a href="<?= site_url("data_dtks/dialog_daftar/$data_dtks[id]/unduh") ?>" class="btn btn-outline-info btn-sm" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh Data data_dtks <?= $sasaran[$data_dtks["sasaran"]]; ?> "><i class="fe fe-download "></i> Unduh</a>
				<a href="<?= site_url("data_dtks") ?>" class="btn btn-sm btn-outline-info mb-1"title="Kembali Ke Data Kemiskinan">
					<i class="fe fe-arrow-circle-left "></i>Kembali ke daftar kelompok
				</a>
			</div>
			<?php $this->load->view('data_dtks/rincian'); ?>
			<div class="box-body">
				<h5>Daftar Penduduk Terdata: <b><?= strtoupper($data_dtks["nama"]); ?></b></h5>
				<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
					<form id="mainform" name="mainform" action="" method="post">
						<div class="row">
							<div class="col-sm-12">
								<div class="input-group input-group-sm pull-right">
									<input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?= html_escape($cari) ?>" value="<?= $cari ?>" onkeypress="if (event.keyCode == 13){$('#'+'mainform').attr('action', '<?= site_url("data_dtks/filter/cari") ?>');$('#'+'mainform').submit();}">
									<div class="input-group-btn">
										<button type="submit" class="btn btn-default" value="<?= $cari ?>" onclick="$('#'+'mainform').attr('action', '<?= site_url("data_dtks/filter/cari") ?>');$('#'+'mainform').submit();"><i class="fe fe-search"></i></button>
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
										<th><?= $judul['judul_terdata_foto']; ?></th>
										<th>ID DTKS</th>
										<th>Alamat</th>
										<th><?= $judul['judul_terdata_info']; ?></th>
										<th><?= $judul['judul_terdata_plus']; ?> </th>
										<th><?= $judul['judul_terdata_nama']; ?></th>
										<th>Tempat Lahir</th>
										<th>Tanggal Lahir</th>
										<th>Jenis-kelamin</th>
										<th>Pekerjaan</th>
										<th>Ibu Kandung</th>
										<th>Hub Keluarga</th>
										<th>Keterangan Padan</th>
										<th>Keterangan Bantuan</th>

									</tr>
								</thead>
								<tbody>
									<?php if ($terdata) : ?>
										<?php foreach ($terdata as $key => $item) : ?>
											<tr>
												<td class="padat"><?= ($key + $paging->offset + 1); ?></td>
												<td class="aksi" align="center">
													<?php if ($this->CI->cek_hak_akses('h')) : ?>
														<a href="<?= site_url("data_dtks/data_terdata/$item[id]"); ?>" class="btn bg-green btn-box btn-sm" title="Lihat Detail"><i class="fe fe-search"></i></a>
														<a href="<?= site_url("data_dtks/edit_terdata_form/$item[id]"); ?>" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Terdata" title="Ubah Terdata" class="btn btn-warning btn-box btn-sm"><i class="fe fe-edit"></i></a>
														<a href="#" data-href="<?= site_url("data_dtks/hapus_terdata/$data_dtks[id]/$item[id]"); ?>" class="btn btn-outline-info btn-sm" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash"></i></a>
													<?php endif; ?>
												</td>
												<td class="padat">
													<div class="user-panel">
														<div class="image2">
															<img class="img-circle" alt="Foto Penduduk" src="<?= AmbilFoto($item['terdata_foto'], '', $item['id_sex']) ?>" />
														</div>
													</div>
												</td>
												<td nowrap>
												<label data-rel="popover" data-content="<img width=200 height=200 src=<?= AmbilFoto($item['terdata_foto'], '', $item['id_sex']) ?>>"><?= $item["id_dtks"]; ?></label></td>
												<td nowrap><?= $item["info"]; ?></td>
												<td nowrap><?= $item["terdata_info"]; ?></td>
												<td nowrap><a href="<?= site_url("data_dtks/terdata/$data_dtks[sasaran]/$item[id_terdata]"); ?>" title="Daftar Data Kemiskinan untuk terdata"><?= $item["terdata_plus"]; ?></a></td>
												<td nowrap>
													<label data-rel="popover" data-content="<img width=200 height=200 src=<?= AmbilFoto($item['terdata_foto'], '', $item['id_sex']) ?>>"><a href="<?= site_url("data_dtks/data_terdata/$item[id]"); ?>" title="Data Individu terdata"><?= $item['terdata_nama']; ?></a></label>
												</td>
												<td><?= $item["tempat_lahir"]; ?></td>
												<td nowrap><?= $item["tanggal_lahir"]; ?></td>
												<td nowrap><?= $item["sex"]; ?></td>
												<td nowrap><?= $item["pekerjaan_id"]; ?></td>
												<td nowrap><?= $item["nama_ibu"]; ?></td>
												<td nowrap><?= $item["kk_level"]; ?></td>
												<td width="25%"><?= $item["keterangan_padan"]; ?></td>
												<td width="25%"><?= $item["keterangan_bantuan"]; ?></td>
											</tr>
										<?php endforeach; ?>
									<?php else : ?>
										<tr>
											<td class="text-center" colspan="10">Data Tidak Tersedia</td>
										</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
					</form>
					<?php $this->load->view('global/paging'); ?>
				</div>
			</div>
		</div>
	</section>
</div>
<?php $this->load->view('global/confirm_delete'); ?>
<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

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

<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Daftar Peserta Kegiatan</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li><a href="<?= site_url('pemberdayaan_masyarakat')?>"> Pemberdayaan Masyarakat</a></li>
			<li class="active">Daftar Peserta</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="card shadow">
			<div class="card-header">
				<a href="<?= site_url("pemberdayaan_masyarakat/form_peserta/".$pemberdayaan_masyarakat['id'])?>" title="Tambah Data Warga" class="btn bg-olive btn-sm "><i class="fe fe-plus"></i> Tambah Peserta</a>
				<a href="<?= site_url("pemberdayaan_masyarakat/dialog_daftar/$pemberdayaan_masyarakat[id]/cetak")?>" class="btn btn-social btn-boxbtn-outline-info btn-sm " data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak Data <?= $sasaran[$pemberdayaan_masyarakat["sasaran"]]; ?> "><i class="fe fe-printer "></i> Cetak</a>
				<a href="<?= site_url("pemberdayaan_masyarakat/dialog_daftar/$pemberdayaan_masyarakat[id]/unduh")?>" class="btn bg-navy btn-sm " data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh Data <?= $sasaran[$pemberdayaan_masyarakat["sasaran"]]; ?> "><i class="fe fe-download "></i> Unduh</a>
				<a href="<?= site_url("pemberdayaan_masyarakat")?>" class="btn btn-sm btn-outline-info mb-1"title="Kembali">
					<i class="fe fe-arrow-circle-left "></i>Kembali
				</a>
			</div>
			<?php $this->load->view('pemberdayaan_masyarakat/rincian'); ?>
			<div class="box-body">
				<h5><b>Daftar Peserta Program Kegiatan</b></h5>
				<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
					<form id="mainform" name="mainform" action="" method="post">
						<div class="row">
							<div class="col-sm-12">
								<div class="input-group input-group-sm pull-right">
									<input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?=html_escape($cari)?>" value="<?= $cari ?>" onkeypress="if (event.keyCode == 13){$('#'+'mainform').attr('action', '<?=site_url("pemberdayaan_masyarakat/filter/cari")?>');$('#'+'mainform').submit();}">
									<div class="input-group-btn">
										<button type="submit" class="btn btn-default" value="<?= $cari ?>" onclick="$('#'+'mainform').attr('action', '<?=site_url("pemberdayaan_masyarakat/filter/cari")?>');$('#'+'mainform').submit();"><i class="fe fe-search"></i></button>
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
										<th><?= $judul['judul_peserta_info']; ?></th>
										<th><?= $judul['judul_peserta_plus']; ?> </th>
										<th><?= $judul['judul_peserta_nama']; ?></th>
										<th>Tempat Lahir</th>
										<th>Tanggal Lahir</th>
										<th>Jenis-kelamin</th>
										<th>Alamat</th>
										<th>Keterangan</th>
									</tr>
								</thead>
								<tbody>
									<?php if($peserta): ?>
										<?php foreach ($peserta as $key => $item): ?>
											<tr>
												<td class="padat"><?= ($key + $paging->offset + 1); ?></td>
												<td class="aksi">
													<?php if ($this->CI->cek_hak_akses('h')): ?>
														<a href="<?= site_url("pemberdayaan_masyarakat/edit_peserta_form/$item[id]"); ?>" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah peserta" title="Ubah peserta" class="btn btn-warning btn-box btn-sm"><i class="fe fe-edit"></i></a>
														<a href="#" data-href="<?= site_url("pemberdayaan_masyarakat/hapus_peserta/$pemberdayaan_masyarakat[id]/$item[id]"); ?>" class="btn bg-maroon btn-box btn-sm" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash-o"></i></a>
													<?php endif; ?>
												</td>
												<td nowrap><?= $item["peserta_info"]; ?></td>
												<td nowrap><a href="<?= site_url("pemberdayaan_masyarakat/peserta/$pemberdayaan_masyarakat[sasaran]/$item[id_peserta]"); ?>" title="Daftar pemberdayaan_masyarakat untuk peserta"><?= $item["peserta_plus"]; ?></a></td>
												<td nowrap><a href="<?= site_url("pemberdayaan_masyarakat/data_peserta/$item[id]"); ?>" title="Data peserta"><?= $item['peserta_nama'];?></a></td>
												<td><?= $item["tempat_lahir"]; ?></td>
												<td nowrap><?= $item["tanggal_lahir"]; ?></td>
												<td nowrap><?= $item["sex"]; ?></td>
												<td nowrap><?= $item["info"];?></td>
												<td width="25%"><?= $item["keterangan"]; ?></td>
											</tr>
										<?php endforeach; ?>
									<?php else: ?>
										<tr>
											<td class="text-center" colspan="10">Data Tidak Tersedia</td>
										</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
					</form>
					<?php $this->load->view('global/paging');?>
				</div>
			</div>
		</div>
	</section>
</div>
<?php $this->load->view('global/confirm_delete');?>

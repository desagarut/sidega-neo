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
		<h1>Daftar Terdata Suplemen</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li><a href="<?= site_url('suplemen')?>"> Data Suplemen</a></li>
			<li class="active">Daftar Terdata Suplemen</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="card shadow">
			<div class="card-header">
				<a href="<?= site_url("suplemen/form_terdata/".$suplemen['id'])?>" title="Tambah Data Warga" class="btn btn-outline-info btn-sm"><i class="fe fe-plus"></i> Tambah Warga Terdata</a>
				<a href="<?= site_url("suplemen/dialog_daftar/$suplemen[id]/cetak")?>" class="btn btn-outline-info btn-sm " data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak Data Suplemen <?= $sasaran[$suplemen["sasaran"]]; ?> "><i class="fe fe-printer "></i> Cetak</a>
				<a href="<?= site_url("suplemen/dialog_daftar/$suplemen[id]/unduh")?>" class="btn btn-outline-info btn-sm" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh Data Suplemen <?= $sasaran[$suplemen["sasaran"]]; ?> "><i class="fe fe-download "></i> Unduh</a>
				<a href="<?= site_url("suplemen")?>" class="btn btn-sm btn-outline-info mb-1"title="Kembali Ke Data Suplemen">
					<i class="fe fe-arrow-circle-left "></i>Kembali ke Data Suplemen
				</a>
			</div>
			<?php $this->load->view('suplemen/rincian'); ?>
			<div class="box-body">
				<h5><b>Daftar Terdata</b></h5>
				<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
					<form id="mainform" name="mainform" action="" method="post">
						<div class="row">
							<div class="col-sm-12">
								<div class="input-group input-group-sm pull-right">
									<input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?=html_escape($cari)?>" value="<?= $cari ?>" onkeypress="if (event.keyCode == 13){$('#'+'mainform').attr('action', '<?=site_url("suplemen/filter/cari")?>');$('#'+'mainform').submit();}">
									<div class="input-group-btn">
										<button type="submit" class="btn btn-default" value="<?= $cari ?>" onclick="$('#'+'mainform').attr('action', '<?=site_url("suplemen/filter/cari")?>');$('#'+'mainform').submit();"><i class="fe fe-search"></i></button>
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
										<th><?= $judul['judul_terdata_info']; ?></th>
										<th><?= $judul['judul_terdata_plus']; ?> </th>
										<th><?= $judul['judul_terdata_nama']; ?></th>
										<th>Tempat Lahir</th>
										<th>Tanggal Lahir</th>
										<th>Jenis-kelamin</th>
										<th>Alamat</th>
										<th>Keterangan</th>
									</tr>
								</thead>
								<tbody>
									<?php if($terdata): ?>
										<?php foreach ($terdata as $key => $item): ?>
											<tr>
												<td class="padat"><?= ($key + $paging->offset + 1); ?></td>
												<td class="aksi">
													<?php if ($this->CI->cek_hak_akses('h')): ?>
														<a href="<?= site_url("suplemen/edit_terdata_form/$item[id]"); ?>" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Terdata" title="Ubah Terdata" class="btn btn-warning btn-box btn-sm"><i class="fe fe-edit"></i></a>
														<a href="#" data-href="<?= site_url("suplemen/hapus_terdata/$suplemen[id]/$item[id]"); ?>" class="btn btn-outline-info btn-sm" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash"></i></a>
													<?php endif; ?>
												</td>
												<td nowrap><?= $item["terdata_info"]; ?></td>
												<td nowrap><a href="<?= site_url("suplemen/terdata/$suplemen[sasaran]/$item[id_terdata]"); ?>" title="Daftar suplemen untuk terdata"><?= $item["terdata_plus"]; ?></a></td>
												<td nowrap><a href="<?= site_url("suplemen/data_terdata/$item[id]"); ?>" title="Data terdata"><?= $item['terdata_nama'];?></a></td>
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

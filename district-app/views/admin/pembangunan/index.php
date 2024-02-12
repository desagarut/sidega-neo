<?php defined('BASEPATH') || exit('No direct script access allowed');?>


<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Pembangunan</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid'); ?>"><i class="fe fe-home"></i> Home</a></li>
			<li class="active">Pembangunan</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="mainformexcel" name="mainformexcel"method="post" class="form-horizontal">
			<div class="card shadow">
				<div class="card-header">
					<?php if ($this->CI->cek_hak_akses('u')): ?>
						<a href="<?= site_url("{$this->controller}/form")?>" class="btn btn-outline-info btn-sm" title="Tambah Data Baru"><i class="fe fe-plus"></i>Tambah Data</a>
					<?php endif; ?>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-sm-2">
						<select class="form-control input-sm select2" id="tahun" name="tahun">
							<option selected value="semua">Semua Tahun</option>
							<?php foreach ($list_tahun as $list) : ?>
								<option value="<?= $list->tahun_anggaran ?>"><?= $list->tahun_anggaran ?></option>
							<?php endforeach; ?>
						</select>
						</div>
					</div>
					<hr>
					<div class="table-responsive">
						<table id="tabel-pembangunan" class="table table-bordered dataTable table-hover">
							<thead class="bg-gray">
								<tr>
									<th class="text-center">No</th>
									<th width="230px" class="text-center">Aksi</th>
									<th class="text-center">Nama Kegiatan</th>
									<th class="text-center">Sumber Dana</th>
									<th class="text-center">Anggaran</th>
									<th class="text-center">Persentase</th>
									<th class="text-center">Volume</th>
									<th class="text-center">Tahun</th>
									<th class="text-center">Pelaksana</th>
									<th class="text-center">Lokasi</th>
									<th class="text-center">Gambar</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</form>
	</section>
</div>
<?php $this->load->view('global/confirm_delete'); ?>
<script>
	$(document).ready(function() {
		let tabelPembangunan = $('#tabel-pembangunan').DataTable({
			'processing': true,
			'serverSide': true,
			'autoWidth': false,
			'pageLength': 10,
			'order': [
				[7, 'desc'],
			],
			'columnDefs': [{
				'orderable': false,
				'targets': [0, 1, 10],
			}],
			'ajax': {
				'url': "<?= site_url($this->controller) ?>",
				'method': 'POST',
				'data': function(d) {
					d.tahun = $('#tahun').val();
				}
			},
			'columns': [
				{
					'data': null,
				},
				{
					'data': function(data) {
						let status;
						if (data.status == 1) {
							status = `<a href="<?= site_url($this->controller . '/lock/') ?>${data.id}" class="btn bg-navy btn-flat btn-sm" title="Non Aktifkan Pembangunan"><i class="fe fe-unlock"></i></a>`
						} else {
							status = `<a href="<?= site_url($this->controller . '/unlock/') ?>${data.id}" class="btn bg-navy btn-flat btn-sm" title="Aktifkan Pembangunan"><i class="fe fe-lock"></i></a>`
						}

						return `
							<?php if ($this->CI->cek_hak_akses('u')): ?>
								<a href="<?= site_url("{$this->controller}/form/"); ?>${data.id}" title="Ubah Data"  class="btn bg-orange btn-flat btn-sm"><i class="fe fe-edit"></i></a>
							<?php endif; ?>
							<a href="<?= site_url($this->controller . '/lokasi_maps/'); ?>${data.id}" class="btn bg-olive btn-flat btn-sm" title="Lokasi Pembangunan"><i class="fe fe-map"></i></a>
							<a href="<?= site_url($this->controller . '/dokumentasi/'); ?>${data.id}" class="btnbtn-outline-info btn-flat btn-sm" title="Rincian Dokumentasi Kegiatan"><i class="fe fe-list"></i></a>
							<?php if ($this->CI->cek_hak_akses('u')): ?>
								${status}
							<?php endif; ?>
							<?php if ($this->CI->cek_hak_akses('h')): ?>
								<a href="#" data-href="<?= site_url($this->controller . '/delete/'); ?>${data.id}" class="btn bg-maroon btn-flat btn-sm" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash"></i></a>
							<?php endif; ?>
							<a href="<?= site_url('pembangunan/'); ?>${data.slug}" target="_blank" class="btn bg-blue btn-flat btn-sm" title="Lihat Summary"><i class="fe fe-eye"></i></a>
							`
					}
				},
				{
					'data': 'judul'
				},
				{
					'data': 'sumber_dana'
				},
				{
					'data': 'jml_anggaran',
					'render': $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' )
				},
				{
					'data': 'max_persentase'
				},
				{
					'data': 'volume'
				},
				{
					'data': 'tahun_anggaran'
				},
				{
					'data': 'pelaksana_kegiatan'
				},
				{
					'data': 'alamat'
				},
				{
					'data': function (data) {
						if (data.foto) {
							return `<img src="<?= base_url(LOKASI_GALERI) ?>${data.foto}" class="penduduk_kecil text-center" alt="Gambar Dokumentasi">`
						}

						return null
					}
				},
			],
			'language': {
				'url': "<?= base_url('/assets/bootstrap/js/dataTables.indonesian.lang') ?>"
			}
		});

		tabelPembangunan.on('draw.dt', function() {
			let PageInfo = $('#tabel-pembangunan').DataTable().page.info();
			tabelPembangunan.column(0, {
				page: 'current'
			}).nodes().each(function(cell, i) {
				cell.innerHTML = i + 1 + PageInfo.start;
			});
		});

		$('#tahun').on('select2:select', function (e) {
			tabelPembangunan.ajax.reload();
		});
	});
</script>

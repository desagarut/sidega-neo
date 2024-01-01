<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>
<div class="row mb-2">
	<div class="col-md-12">
		<?php if ($this->CI->cek_hak_akses('u')) : ?>
			<a href="<?= site_url('ba_tanah_desa/form') ?>" class="btn btn-primary btn-sm btn-sm " title="Tambah Data Baru"> <i class="fe fe-plus"></i>Tambah Data </a>
		<?php endif; ?>
		<a href="#" class="btn btn-outline-primary btn-sm " title="Cetak Buku Tanah di Desa" data-remote="false" data-toggle="modal" data-href="<?= site_url('ba_tanah_desa/cetak_tanah_desa/cetak'); ?>" data-target="#cetakBox" data-aksi="Cetak" data-title="Buku Tanah di Desa"><i class="fe fe-printer "></i> Cetak</a>
		<a href="#" class="btn btn-outline-primary btn-sm " title="Unduh Buku Tanah di Desa" data-remote="false" data-toggle="modal" data-href="<?= site_url('ba_tanah_desa/cetak_tanah_desa/unduh'); ?>" data-target="#cetakBox" data-aksi="Unduh" data-title="Buku Tanah di Desa"><i class="fe fe-download"></i> Unduh</a>
	</div>
	<div class="col-md-12">
	</div>
</div>
<div class="card shadow">
	<div class="card-body">
				<div class="row">
					<div class="col-sm-12">
						<table id="tabel-tanahdesa" class="table table-bordered dataTable table-hover">
							<thead class="bg-gray">
								<tr>
									<th class="text-center text-muted">No</th>
									<th width="120" class="text-center text-muted">Aksi</th>
									<th class="text-center text-muted">Nama Perorangan &nbsp/ <br> Badan Hukum</th>
									<th class="text-center text-muted">Luas Total (M<sup>2</sup>)</th>
									<th class="text-center text-muted">Mutasi</th>
									<th class="text-center text-muted">Keterangan</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
		<?php $this->load->view('global/cetak_box'); ?>
	</div>
</div>
<?php $this->load->view('global/confirm_delete'); ?>
<script>
	$(document).ready(function() {
		let tabelTanahDesa = $('#tabel-tanahdesa').DataTable({
			'processing': true,
			'serverSide': true,
			'autoWidth': false,
			'pageLength': 10,
			'order': [],
			'columnDefs': [{
				'orderable': false,
				'targets': [0, 1, 2, 3, 4, 5],
			}],
			'ajax': {
				'url': "<?= site_url('ba_tanah_desa') ?>",
				'method': 'POST',
				'data': function(d) {}
			},
			'columns': [{
					'data': null,
				},
				{
					'data': function(data) {
						return `
							<a href="<?= site_url('ba_tanah_desa/view_tanah_desa/') ?>${data.id}" title="Lihat Data" class="btn bg-info btn-flat btn-sm"><i class="fe fe-eye"></i></a>
							<?php if ($this->CI->cek_hak_akses('u')) : ?>
								<a href="<?= site_url('ba_tanah_desa/form/') ?>${data.id}" title="Edit Data" class="btn bg-orange btn-flat btn-sm"><i class="fe fe-edit"></i> </a>
							<?php endif; ?>
							<?php if ($this->CI->cek_hak_akses('h')) : ?>
							<a href="#" data-href="<?= site_url('ba_tanah_desa/delete_tanah_desa/') ?>${data.id}" class="btn bg-maroon btn-flat btn-sm" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash-o"></i></a>
							<?php endif; ?>
							`
					}
				},
				{
					'data': function(data) {
						return data.nama_pemilik_asal ? data.nama_pemilik_asal : data.nama;
					}
				},
				{
					'data': 'luas'
				},
				{
					'data': 'mutasi'
				},
				{
					'data': 'keterangan'
				},
			],
			'language': {
				'url': "<?= base_url('/assets/bootstrap/js/dataTables.indonesian.lang') ?>"
			}
		});

		tabelTanahDesa.on('draw.dt', function() {
			let PageInfo = $('#tabel-tanahdesa').DataTable().page.info();
			tabelTanahDesa.column(0, {
				page: 'current'
			}).nodes().each(function(cell, i) {
				cell.innerHTML = i + 1 + PageInfo.start;
			});
		});
	});
</script>
<script src='<?= base_url() ?>assets/js/jquery.dataTables.min.js'></script>
<script src='<?= base_url() ?>assets/js/dataTables.bootstrap4.min.js'></script>

<script>
	$('#dataTable-1').DataTable({
		autoWidth: true,
		"lengthMenu": [
			[10, 25, 50, -1],
			[10, 25, 50, "All"]
		]
	});
</script>
<?php defined('BASEPATH') || exit('No direct script access allowed');?>

<div class="card shadow">
	<div class="card-header">
		<?php if ($this->CI->cek_hak_akses('u')): ?>
			<a href="<?= site_url('ba_tanah_kas_desa/form')?>" class="btn btn-social btn-flat btn-success btn-sm btn-sm " title="Tambah Data Baru"> <i class="fe fe-plus"></i>Tambah Data</a>
		<?php endif; ?>
		<a href="#" class="btn btn-social btn-flatbtn-outline-info btn-sm " title="Cetak Buku Tanah Kas Desa" data-remote="false" data-toggle="modal" data-href="<?= site_url('ba_tanah_kas_desa/cetak_tanah_kas_desa/cetak'); ?>" data-target="#cetakBox" data-aksi="Cetak" data-title="Buku Tanah Kas Desa"><i class="fe fe-printer "></i> Cetak</a>
		<a href="#" class="btn btn-social btn-flat bg-navy btn-sm " title="Unduh Buku Tanah Kas Desa" data-remote="false" data-toggle="modal" data-href="<?= site_url('ba_tanah_kas_desa/cetak_tanah_kas_desa/unduh'); ?>" data-target="#cetakBox" data-aksi="Unduh" data-title="Buku Tanah Kas Desa"><i class="fe fe-download"></i> Unduh</a>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-12">
						<div class="table-responsive">
							<table id="tabel-tanahkasdesa" class="table table-bordered dataTable table-hover">
								<thead class="bg-gray">
									<tr>
										<th class="text-center">No</th>
										<th width="120" class="text-center">Aksi</th>
										<th class="text-center">Asal Tanah</th>
										<th width="100" class="text-center">Nomor Sertifikat Buku Letter C / <br> Persil</th>
										<th class="text-center">Kelas</th>
										<th class="text-center">Luas Total (M<sup>2</sup>)</th>
										<th class="text-center">Tanggal Perolehan</th>
										<th class="text-center">Lokasi</th>
										<th class="text-center">Mutasi</th>
										<th class="text-center">Keterangan</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php $this->load->view('global/cetak_box'); ?>
	</div>
</div>
<?php $this->load->view('global/confirm_delete'); ?>

<script>
	$(document).ready(function()
	{
		let tabelTanahKasDesa = $('#tabel-tanahkasdesa').DataTable({
			'processing': true,
			'serverSide': true,
			'autoWidth': false,
			'pageLength': 10,
			'order': [
				[2, 'asc'],
			],
			'columnDefs': [{
				'orderable': false,
				'targets': [0, 1, 3, 4, 5, 7, 8, 9],
			}],
			'ajax': {
				'url': "<?= site_url('ba_tanah_kas_desa') ?>",
				'method': 'POST',
				'data': function(d) {
				}
			},
			'columns': [
				{
					'data': null,
				},
				{
					'data': function(data)
					{
						return `
							<a href="<?= site_url('ba_tanah_kas_desa/view_tanah_kas_desa/') ?>${data.id}" title="Lihat Data" class="btn bg-info btn-flat btn-sm"><i class="fe fe-eye"></i></a>
							<?php if ($this->CI->cek_hak_akses('u')): ?>
								<a href="<?= site_url('ba_tanah_kas_desa/form/') ?>${data.id}" title="Edit Data" class="btn bg-orange btn-flat btn-sm"><i class="fe fe-edit"></i> </a>
							<?php endif; ?>
							<?php if ($this->CI->cek_hak_akses('u')): ?>
							<a href="#" data-href="<?= site_url('ba_tanah_kas_desa/delete_tanah_kas_desa/') ?>${data.id}" class="btn bg-maroon btn-flat btn-sm" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash-o"></i></a>
							<?php endif; ?>
						`
					}
				},
				{
					'data': function(data)
					{
						return data.nama.toUpperCase();
					}
				},
				{
					'data': 'letter_c',
				},
				{
					'data': 'kode',
				},
				{
					'data': 'luas'
				},
				{
					'data': 'tanggal_perolehan'
				},
				{
					'data': 'lokasi'
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

		tabelTanahKasDesa.on('draw.dt', function()
		{
			let PageInfo = $('#tabel-tanahkasdesa').DataTable().page.info();
			tabelTanahKasDesa.column(0, {
				page: 'current'
			}).nodes().each(function(cell, i) {
				cell.innerHTML = i + 1 + PageInfo.start;
			});
		});
	});
</script>

<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Anjungan Layanan Mandiri</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li class="active">Anjungan Layanan Mandiri</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="row">
			<div class="col-md-12">
				<div class="card shadow">
	        <div class="card-header">
						<a href="<?=site_url('anjungan/form')?>" class="btn bg-olive btn-sm " title="Tambah Anjungan Layanan Mandiri"><i class="fe fe-plus"></i> Tambah Anjungan Layanan Mandiri</a>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="table-responsive">
									<table class="table table-bordered table-striped dataTable table-hover">
										<thead class="bg-gray disabled color-palette">
											<tr>
												<th>No</th>
												<th>Aksi</th>
												<th>IP Address</th>
												<th>Keterangan</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($main as $i => $data): ?>
												<tr>
													<td class="padat"><?= $i + 1 ?></td>
													<td class="aksi">
														<a href="<?= site_url("anjungan/form/$data[id]"); ?>" class="btn bg-orange btn-box btn-sm" title="Ubah Data"><i class='fe fe-edit'></i></a>
														<?php if ($data['status'] == '1'): ?>
															<a href="<?= site_url("anjungan/lock/$data[id]/2")?>" class="btn bg-navy btn-box btn-sm"  title="Non Aktifkan"><i class="fe fe-unlock"></i></a>
														<?php else: ?>
															<a href="<?= site_url("anjungan/lock/$data[id]/1")?>" class="btn bg-navy btn-box btn-sm"  title="Aktifkan"><i class="fe fe-lock">&nbsp;</i></a>
														<?php endif ?>
														<a href="#" data-href="<?=site_url('anjungan/delete/'.$data[id])?>" class="btn bg-maroon btn-box btn-sm" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash-o"></i></a>
													</td>
													<td><?= $data['ip_address'] ?></td>
													<td><?= $data['keterangan']; ?></td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php $this->load->view('global/confirm_delete');?>


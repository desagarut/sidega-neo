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
				<div class="row align-items-center mb-2">
					<div class="col">
						<h5 class="page-title">Manajemen Pengguna</h5>
					</div>
					<div class="col-auto">
						<a href="<?= site_url('man_user/form') ?>" class="btn btn-primary mb-2"><i class="fe fe-plus"></i> Tambah Pengguna Baru</a>
						<a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform','<?= site_url("man_user/delete_all/$p/$o") ?>')" class="btn btn-outline-danger mb-2 hapus-terpilih"><i class='fe fe-trash-o'></i> Hapus Data Terpilih</a>
					</div>
				</div>
				<div class="card shadow">
					<div class="card-header">
						<select class="form-control input-sm" name="filter" onchange="formAction('mainform','<?= site_url('man_user/filter') ?>')">
							<option value="">Semua</option>
							<?php foreach ($user_group as $item) : ?>
								<option <?php selected($filter, $item['id']); ?> value="<?= $item[id] ?>"><?= $item['nama'] ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<table class="table datatables table-hover table-responsive" id="dataTable-1">
									<thead>
										<tr>
											<th><input type="checkbox" id="checkall" /></th>
											<th>No</th>
											<th width=20%>Username</th>
											<th width=30%>Nama</th>
											<th width=15%>Group</th>
											<th width=25%>Login Terakhir</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($main as $data) : ?>
											<tr>
												<td>
													<?php if ($data['id'] != 1) : ?>
														<input type="checkbox" name="id_cb[]" value="<?= $data['id'] ?>" />
													<?php endif; ?>
												</td>
												<td><?= $data['no'] ?></td>
												<td><?= $data['username'] ?></td>
												<td><?= $data['nama'] ?></td>
												<td><?= $data['grup'] ?></td>
												<td><?= tgl_indo2($data['last_login']) ?></td>
												<td nowrap>
													<a href="<?= site_url("Man_user/form/$p/$o/$data[id]") ?>" class="btn btn-outline-primary btn-sm" title="Ubah"><i class="fe fe-edit"></i></a>
													<?php if ($data['id'] != 1) : ?>
														<?php if ($data['active'] == '0') : ?>
															<a href="<?= site_url('Man_user/user_unlock/' . $data['id']) ?>" class="btn btn-secondary btn-sm" title="Aktifkan Pengguna"><i class="fe fe-lock">&nbsp;</i></a>
														<?php elseif ($data['active'] == '1') : ?>
															<a href="<?= site_url('Man_user/user_lock/' . $data['id']) ?>" class="btn btn-success btn-sm" title="Non Aktifkan Pengguna"><i class="fe fe-unlock"></i></a>
														<?php endif; ?>
														<a href="#" data-href="<?= site_url("Man_user/delete/$p/$o/$data[id]") ?>" class="btn btn-danger btn-sm" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash"></i></a>
													<?php endif; ?>
												</td>
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
	</div>
</main>
<?php $this->load->view('global/confirm_delete'); ?>
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
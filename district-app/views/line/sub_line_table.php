<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Pengaturan Kategori Garis</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li><a href="<?= site_url('line')?>"> Daftar Tipe Garis</a></li>
			<li class="active">Pengaturan Kategori Garis</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="mainform" name="mainform" action="" method="post">
			<div class="row">
				<div class="col-md-3">
          <?php $this->load->view('plan/nav.php')?>
				</div>
				<div class="col-md-9">
					<div class="card shadow">
            <div class="card-header">
							<a href="<?= site_url("line/ajax_add_sub_line/$line[id]")?>" class="btn btn-success btn-sm"  title="Tambah Kategori <?= $line['nama'] ?>" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Tambah Kategori <?= $line['nama'] ?>">
								<i class="fe fe-plus"></i>Tambah Kategori <?= $line['nama'] ?>
            	</a>
							<a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '<?=site_url("line/delete_all_sub_line/")?>')" class="btn btn-outline-danger btn-sm btn-sm hapus-terpilih"><i class='fe fe-trash'></i> Hapus Data Terpilih</a>
							<a href="<?= site_url("line")?>" class="btn btn-sm btn-outline-info mb-1" title="Tambah Artikel">
								<i class="fe fe-arrow-circle-left "></i>Kembali ke Daftar Tipe Garis
           		</a>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
										<form id="mainform" name="mainform" action="" method="post">
											<div class="row">
												<div class="col-sm-12">
													<div class="table-responsive">
														<h5 class="box-title text-center">Daftar Kategori <?= $line['nama']; ?></h5>
														<table class="table table-bordered dataTable table-hover">
															<thead class="bg-gray disabled color-palette">
																<tr>
																	<th><input type="checkbox" id="checkall"/></th>
																	<th>No</th>
																	<th>Aksi</th>
																	<th>Kategori</th>
																	<th>Aktif</th>
																	<th>Warna</th>
																</tr>
															</thead>
															<tbody>
																<?php foreach ($subline as $data): ?>
																	<tr>
																		<td><input type="checkbox" name="id_cb[]" value="<?=$data['id']?>" /></td>
																		<td><?=$data['no']?></td>
																		<td nowrap>
																			<a href="<?= site_url("line/ajax_add_sub_line/$line[id]/$data[id]")?>" class="btn btn-warning btn-box btn-sm"  title="Ubah" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Kategori <?= $line['nama'] ?>"><i class="fe fe-edit"></i></a>
																			<?php if ($data['enabled'] == '2'): ?>
																				<a href="<?= site_url("line/line_lock_sub_line/$line[id]/$data[id]")?>" class="btn bg-navy btn-box btn-sm" title="Aktifkan"><i class="fe fe-lock">&nbsp;</i></a>
																			<?php elseif ($data['enabled'] == '1'): ?>
																				<a href="<?= site_url("line/line_unlock_sub_line/$line[id]/$data[id]")?>" class="btn bg-navy btn-box btn-sm" title="Non Aktifkan"><i class="fe fe-unlock"></i></a>
																			<?php endif; ?>
																			<a href="#" data-href="<?= site_url("line/delete_sub_line/$line[id]/$data[id]")?>" class="btn btn-outline-info btn-sm"  title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash"></i></a>
																	  </td>
																		<td width="70%"><?= $data['nama']?></td>
																		<td><?= $data['aktif']?></td>
																		<td><div style="background-color:<?= $data['color']?>">&nbsp;<div></td>
																	</tr>
																<?php endforeach; ?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
</div>
<?php $this->load->view('global/confirm_delete');?>

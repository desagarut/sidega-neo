<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Pengaturan Sub Menu Statis</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li><a href="<?= site_url('menu')?>"><i class="fe fe-dashboard"></i> Daftar Menu</a></li>
			<li class="active">Pengaturan Sub Menu Statis</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="mainform" name="mainform" action="" method="post">
			<div class="row">
				<div class="col-md-3">
					<?php $this->load->view('kategori/menu_kiri.php')?>
				</div>
				<div class="col-md-9">
					<div class="card shadow">
						<div class="card-header">
							<a href="<?= site_url("menu/ajax_add_sub_menu/$tip/$menu")?>" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Tambah Sub Menu"  class="btn btn-success btn-sm "><i class='fe fe-plus'></i> Tambah Sub Menu</a>
							<a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '<?=site_url("menu/delete_all_sub_menu/$tip/$menu")?>')" class="btn btn-outline-danger btn-sm btn-sm hapus-terpilih"><i class='fe fe-trash'></i> Hapus Data Terpilih</a>
							<a href="<?= site_url("menu")?>" class="btn btn-sm btn-outline-info mb-1" title="Tambah Artikel">
								<i class="fe fe-arrow-circle-left "></i>Kembali ke Daftar Menu
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
														<table class="table table-bordered table-striped dataTable table-hover">
															<thead class="bg-gray disabled color-palette">
																<tr>
																	<th><input type="checkbox" id="checkall"/></th>
																	<th>No</th>
																	<th>Aksi</th>
																	<th>Nama Sub Menu</th>
																	<th>Link</th>
																</tr>
															</thead>
															<tbody>
																<?php foreach ($submenu as $data): ?>
																	<tr>
																		<td><input type="checkbox" name="id_cb[]" value="<?=$data['id']?>" /></td>
																		<td><?=$data['no']?></td>
																		<td nowrap>
																			<a href="<?= site_url("menu/urut/$tip/$data[id]/1/$menu")?>" class="btn bg-olive btn-box btn-sm"  title="Pindah Posisi Ke Bawah"><i class="fe fe-arrow-down"></i></a>
																			<a href="<?= site_url("menu/urut/$tip/$data[id]/2/$menu")?>" class="btn bg-olive btn-box btn-sm"  title="Pindah Posisi Ke Atas"><i class="fe fe-arrow-up"></i></a>
																			<a href="<?=site_url("menu/ajax_add_sub_menu/$tip/$menu/$data[id]")?>" class="btn btn-outline-info btn-sm" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Data" title="Ubah Data"><i class="fe fe-edit"></i></a>
																			<?php if ($data['enabled'] == '2'): ?>
																				<a href="<?= site_url("menu/menu_lock_sub_menu/$tip/$menu/$data[id]")?>" class="btn bg-navy btn-box btn-sm"  title="Aktifkan"><i class="fe fe-lock">&nbsp;</i></a>
																			<?php elseif ($data['enabled'] == '1'): ?>
																				<a href="<?= site_url("menu/menu_unlock_sub_menu/$tip/$menu/$data[id]")?>" class="btn bg-navy btn-box btn-sm"  title="Non Aktifkan"><i class="fe fe-unlock"></i></a>
																			<?php endif ?>
																			<a href="#" data-href="<?= site_url("menu/delete_sub_menu/$tip/$menu/$data[id]")?>" class="btn btn-outline-info btn-sm"  title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash"></i></a>
																		</td>
																		<td nowrap width="40%"><?= $data['nama']?></td>
																		<td nowrap><a href="<?= $data['link']?>" target="_blank"><?= $data['link']?></a></td>
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

<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="row justify-content-center">
	<div class="col-12">
		<form id="mainform" name="mainform" action="" method="post">
			<div class="row align-items-center mb-2">
				<div class="col">
					<?php if ($this->CI->cek_hak_akses('h')) : ?>
						<a href="<?= site_url('pengurus/form') ?>"><button type="button" class="btn btn-primary btn-sm mb-1"><span class="fe fe-filter fe-12 mr-2"></span>Create</button></a>
						<a href="#confirm-delete" class="hapus-terpilih" title="Hapus Data" onclick="deleteAllBox('mainform', '<?= site_url("pengurus/delete_all") ?>')">
							<button type="button" class="btn btn-outline-danger btn-sm btn-sm  mb-1"><span class="fe fe-trash fe-12 mr-2"></span>Hapus Data Terpilih</button>
						</a>
					<?php endif; ?>
					<?php if ($this->CI->cek_hak_akses('h')) : ?>
						<div class="btn-group btn-group-vertical ">
							<a class="btn btn-outline-info btn-sm mb-1 btn-sm " data-toggle="dropdown"> Aksi Data Terpilih</a>
							<ul class="dropdown-menu" role="menu">

								<li>
									<a href="<?= site_url("pengurus/atur_bagan") ?>" title="Ubah Data" data-remote="false" data-toggle="modal" data-target="#modalKecil" data-title="Atur Struktur Bagan" class="btn btn-sm aksi-terpilih"> Atur Struktur Bagan</a>
								</li>
								<li>
									<a href="#confirm-delete" class="btn btn-sm hapus-terpilih" title="Hapus Data" onclick="deleteAllBox('mainform', '<?= site_url("pengurus/delete_all") ?>')"> Hapus Data Terpilih</a>
								</li>

							</ul>
						</div>
					<?php endif; ?>
					<a href="<?= site_url("pengurus/dialog/cetak") ?>" title="Cetak Data" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak Data">
						<button type="button" class="btn btn-outline-info btn-sm btn-sm mb-1"><span class="fe fe-printer fe-12 mr-2"></span>Cetak</button>
					</a>
					<a href="<?= site_url("pengurus/dialog/unduh") ?>" title="Unduh Data" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh Data">
						<button type="button" class="btn btn-outline-info btn-sm btn-sm mb-1"><span class="fe fe-download fe-12 mr-2"></span>Unduh</button>
					</a>
					<?php if ($this->CI->cek_hak_akses('h')) : ?>
						<div class="btn-group btn-group-vertical">
							<a data-toggle="dropdown">
								<button type="button" class="btn btn-outline-info btn-sm btn-sm mb-1"><span class="fe fe-square fe-12 mr-2"></span>Bagan Organisasi</button>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li>
									<a href="<?= site_url("pengurus/bagan") ?>" title="Bagan Tanpa BPD" class="btn btn-block btn-sm"><i class="fe fe-sitemap"></i> Bagan Tanpa BPD</a>
								</li>
								<li>
									<a href="<?= site_url("pengurus/bagan/bpd") ?>" title="Bagan Dengan BPD" class="btn btn-block btn-sm"><i class="fe fe-sitemap"></i> Bagan Dengan BPD</a>
								</li>
								<li>
									<a href="<?= site_url("pengurus/atur_bagan_layout") ?>" title="Atur Ukuran Bagan" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Atur Ukuran Bagan" class="btn btn-block btn-sm"><i class="fe fe-cogs"></i> Atur Ukuran Bagan</a>
								</li>
							</ul>
						</div>
					<?php endif; ?>
				</div>
				<div class="col-auto">
					<!--<input type="checkbox" id="checkall">-->
					<select class="form-control form-control-sm mb-2" name="status" onchange="formAction('mainform','<?= site_url('pengurus/filter/status') ?>')">
						<option value="">Semua</option>
						<option value="1" <?php selected($status, 1); ?>>Aktif</option>
						<option value="2" <?php selected($status, 2); ?>>Tidak Aktif</option>
					</select>

				</div>
			</div>
			<div class="row">
				<?php foreach ($main as $key => $data) : ?>
					<div class="col-md-3">
						<div class="card shadow mb-4">
							<div class="card-body text-center" style="height:250px">
								<div class="avatar avatar-lg mt-1">
									<a href="">
										<?php if ($data['foto']) : ?>
											<img src="<?= AmbilFoto($data['foto']) ?>" class="avatar-img " alt="<?= $data['nama'] ?>" />
										<?php else : ?>
											<img src="<?= base_url() ?>assets/files/user_pict/kuser.png" class="avatar-img " alt="<?= $data['nama'] ?>" />
										<?php endif ?>
									</a>
								</div>
								<div class="card-text my-2">
									<strong class="card-title my-0"><?= $data['nama'] ?></strong>
									<p class="small text-muted mb-0"><?= strtoupper($data['jabatan']); ?></p>
									<p class="small">
										<span class="badge badge-light text-muted">
											<?php if (!empty($data['pamong_nip']) and $data['pamong_nip'] != '-') : ?>
												<i>NIP :<?= $data['pamong_nip'] ?></i></br>
											<?php else : ?>
												<i><?= $this->setting->sebutan_nip_desa  ?> :<?= $data['pamong_niap'] ?></i></br>
											<?php endif; ?>
											<i>NIK :<?= $data['nik'] ?></i>
										</span><br />
										<?php if ($data['pamong_ttd'] == '1') : ?>
											<a href="<?= site_url("pengurus/ttd/$data[pamong_id]/2") ?>" class="btn btn-success btn-sm" title="Bukan TTD a.n">a.n</a>
										<?php else : ?>
											<a href="<?= site_url("pengurus/ttd/$data[pamong_id]/1") ?>" class="btn btn-outline-secondary btn-sm" title="Jadikan TTD a.n">a.n</a>
										<?php endif ?>
										<?php if ($data['pamong_ub'] == '1') : ?>
											<a href="<?= site_url("pengurus/ub/$data[pamong_id]/2") ?>" class="btn btn-success btn-sm" title="Bukan TTD u.b">u.b</a>
										<?php else : ?>
											<a href="<?= site_url("pengurus/ub/$data[pamong_id]/1") ?>" class="btn btn-outline-secondary btn-sm" title="Jadikan TTD u.b">u.b</a>
										<?php endif ?>
									</p>
								</div>
							</div> <!-- ./card-text -->
							<div class="card-footer">
								<div class="row align-items-center justify-content-between">
									<div class="col-auto">
										<small>
											<a href="<?= site_url("pengurus/urut/$paging->page/$data[pamong_id]/1") ?>" class="btn btn-info btn-sm <?php ($data['no'] == $paging->num_rows) and print('disabled'); ?>" title="Pindah Posisi Ke Bawah"><i class="fe fe-arrow-down"></i></a>
											<a href="<?= site_url("pengurus/urut/$paging->page/$data[pamong_id]/2") ?>" class="btn btn-info btn-sm <?php ($data['no'] == 1 and $paging->page == $paging->start_link) and print('disabled'); ?>" title="Pindah Posisi Ke Atas"><i class="fe fe-arrow-up"></i></a>
										</small>
										<input type="checkbox" name="id_cb[]" value="<?= $data['pamong_id'] ?>"></input>
									</div>
									<div class="col-auto">
										<div class="file-action">
											<button type="button" class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<span class="text-muted sr-only">Action</span>
											</button>
											<?php if ($this->CI->cek_hak_akses('h')) : ?>
												<div class="dropdown-menu m-2">
													<a class="dropdown-item" href="<?= site_url("pengurus/profile/$data[pamong_id]") ?>"><i class="fe fe-meh fe-12 mr-4"></i>Profile</a>
													<a class="dropdown-item" href="#"><i class="fe fe-message-circle fe-12 mr-4"></i>Chat</a>
													<a class="dropdown-item" href="#"><i class="fe fe-mail fe-12 mr-4"></i>Contact</a>
													<?php if ($data['pamong_status'] == '1') : ?>
														<a href="<?= site_url("pengurus/lock/$data[pamong_id]/2") ?>" class="dropdown-item" title="Non Aktifkan"><i class="fe fe-unlock fe-12 mr-4"></i>Aktif</a>
													<?php else : ?>
														<a href="<?= site_url("pengurus/lock/$data[pamong_id]/1") ?>" class="dropdown-item" title="Aktifkan"><i class="fe fe-lock fe-12 mr-4"></i>Non Aktif</a>
													<?php endif ?>
													<a class="dropdown-item" href="<?= site_url("pengurus/form/$data[pamong_id]") ?>"><i class="fe fe-edit fe-12 mr-4"></i>Ubah</a>
													<a href="#" data-href="<?= site_url("pengurus/delete/$data[pamong_id]") ?>" class="dropdown-item" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-x fe-12 mr-4"></i>Hapus</a>
													<a class="dropdown-item" href="#confirm-delete" onclick="deleteAllBox('mainform', '<?= site_url('pengurus/delete_all'); ?>')" title="Hapus Data">
														<i class="fe fe-x fe-12 mr-4"></i>Hapus Data Terpilih
													</a>

												</div>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</form>
	</div>
</div>

<?php $this->load->view('global/confirm_delete'); ?>
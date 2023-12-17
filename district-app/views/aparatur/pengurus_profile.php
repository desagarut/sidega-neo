<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<h5 class="mb-2 page-title">Profile Aparatur Pemerintah <?= ucwords($this->setting->sebutan_desa) ?></h5>
			</div>
		</div>
		<div class="row">
			<div class="col-3">
				<?php $this->load->view('aparatur/side'); ?>
			</div>
			<div class="col-9">
				<div class="row">
					<div class="card shadow">
						<div class="card-header">
							<div class="row align-items-center">
								<div class="col">
									<h3 class="h6 mb-0">Profile</h3>
								</div>
								<div class="col-auto">
									<a class="text-info" href="<?= site_url('pengurus') ?>">Kembali</a>
								</div>
							</div>
						</div>
						<div class="card-body my-n2">
							<div class="row align-items-center my-2">
								<div class="col">
									<div class="row mt-5 align-items-center">
										<div class="col-md-3 text-center mb-5">
											<div class="avatar avatar-xl">
												<?php if ($pamong['foto']) : ?>
													<img class="avatar-img rounded-circle" src="<?= AmbilFoto($pamong['foto']) ?>" alt="Foto">
												<?php else : ?>
													<img class="avatar-img rounded-circle" src="<?= base_url() ?>assets/files/user_pict/kuser.png" alt="Foto">
												<?php endif; ?>
											</div>
										</div>
										<div class="col">
											<div class="row align-items-center">
												<div class="col-md-7">
													<h4 class="mb-1"><?= strtoupper($pamong['pamong_nama']) ?></h4>
													<p class="mb-3">Jabatan <?= $pamong['jabatan'] ?></p>
												</div>
											</div>
											<div class="row mb-4">
												<div class="col-md-7">
													<p class="text-muted">
														Lahir di <?= $individu['tempatlahir'] ?> pada Tanggal <?= tgl_indo_out($pamong['pamong_tanggallahir']) ?>.
														Menjabat sebagai <?= $pamong['jabatan'] ?> sejak Tanggal <?= tgl_indo_out($pamong['pamong_tglsk']) ?> dengan masa jabatan selama <?= $pamong['pamong_masajab'] ?>
													</p>
												</div>
												<div class="col">
													<p class="small mb-0 text-muted">Dusun <?= $individu['dusun'] ?> RW. <?= $individu['rw'] ?> RT. <?= $individu['rt'] ?></p>
													<p class="small mb-0 text-muted">Phone. <?= $individu['telepon'] ?></p>
													<p class="small mb-0 text-muted">Email <?= $individu['email'] ?></p>
												</div>
											</div>
										</div>
									</div>
									<hr class="my-4">
									<div class="col-auto">
										<h5 class="h5 mb-4 page-title">Profile Lengkap</h5>
										<div class="form-group row">
											<label class="col-md-4">Nama Lengkap</label>
											<label class="col-md-8"><?= $pamong['pamong_nama'] ?></label>
											<label class="col-md-4">Jenis Kelamin</label>
											<label class="col-md-8"><?= $individu['sex'] ?><?= $pamong['pamong_sex'] ?></label>
											<label class="col-md-4">Agama</label>
											<label class="col-md-8"><?= $individu['agama'] ?><?= $pamong['pamong_agama'] ?></label>
											<label class="col-md-4">Golongan/Pangkat</label>
											<label class="col-md-8"><?= $pamong['pamong_pangkat'] ?></label>
											<label class="col-md-4">Pendidikan Terakhir</label>
											<label class="col-md-8"><?= $individu['pendidikan_kk'] ?></label>
											<label class="col-md-4">SK Pengangkatan</label>
											<label class="col-md-8"><?= $pamong['pamong_nosk'] ?></label>
											<label class="col-md-4">Tanggal SK Pengangkatan</label>
											<label class="col-md-8"><?= tgl_indo_out($pamong['pamong_tglsk']); ?></label>
											<label class="col-md-4">SK Pemberhentian</label>
											<label class="col-md-8"><?= $pamong['pamong_nohenti'] ?></label>
											<label class="col-md-4">Tanggal SK Pemberhentian</label>
											<label class="col-md-8"><?= tgl_indo_out($pamong['pamong_tglhenti']); ?></label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
</main>
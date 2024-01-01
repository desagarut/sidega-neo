<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="row align-items-center mb-2">
					<div class="col">
						<h2 class="h5 page-title">Pengaturan <?= $kat_nama ?></h5>
					</div>
					<div class="col-auto">
						<?php if (in_array($kat, array('2', '3'))) : ?>
							<a href="<?= $kembali_ke ?: site_url("$this->controller/peraturan_desa/$kat"); ?>" class="btn btn-sm btn-outline-info mb-1" title="Tambah Artikel">
								<i class="fe fe-arrow-circle-left "></i>Kembali Ke Daftar <?= $kat_nama ?>
							</a>
						<?php else : ?>
							<a href="<?= site_url("$this->controller/index/$kat"); ?>" class="btn btn-sm btn-outline-primary mb-1" title="Tambah Artikel">
								<i class="fe fe-arrow-circle-left "></i>Kembali Ke Daftar <?= $kat_nama ?>
							</a>
						<?php endif; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<?php $this->load->view('ba/umum/side') ?>
					</div>
					<div class="col-md-9">
						<form id="validasi" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
							<div class="card shadow">
								<div class="card-body">
									<div class="form-group row">
										<label class="control-label col-sm-4" for="nama">Judul Dokumen</label>
										<div class="col-sm-8">
											<input name="nama" class="form-control input-sm nomor_sk required" type="text" maxlength="200" value="<?= $dokumen['nama'] ?>"></input>
										</div>
									</div>
									<div class="form-group row">
										<label class="control-label col-sm-4" for="nama">Nama Dokumen</label>
										<div class="col-sm-8">
											<input name="nama" class="form-control input-sm nomor_sk required" type="text" maxlength="100" value="<?= $dokumen['nama'] ?>"></input>
										</div>
									</div>
									<?php if ($dokumen['satuan']) : ?>
										<div class="form-group row">
											<label class="col-sm-4 control-label">Dokumen</label>
											<div class="col-sm-4">
												<input type="hidden" name="old_file" value="<?= $dokumen['satuan'] ?>">
												<img class="attachment-img img-responsive img-circle" src="<?= base_url() . LOKASI_DOKUMEN . $dokumen['satuan'] ?>" alt="<?= $dokumen['satuan'] ?>">
											</div>
										</div>
									<?php endif; ?>
									<div class="form-group row">
										<label class="control-label col-sm-4" for="upload">Unggah Dokumen</label>
										<div class="col-sm-8">
											<div class="input-group">
												<input type="text" class="form-control <?php empty($dokumen) and print('required') ?>" id="file_path" name="satuan">
												<input id="file" type="file" class="hidden" name="satuan">
												<span class="input-group-btn">
													<button type="button" class="btn btn-info btn-box" id="file_browser"><i class="fe fe-search"></i> Browse</button>
												</span>
											</div>
											<?php if ($dokumen) : ?>
												<p class="small">(Kosongkan jika tidak ingin mengubah dokumen)</p>
											<?php endif; ?>
										</div>
									</div>
									<div class="form-group row">
										<input name="kategori" type="hidden" value="<?= $dokumen['kategori'] ?: $kat; ?>">
										<?php
										if ($kat == 2 or $dokumen['kategori'] == 2)
											include("district-app/views/dokumen/_sk_kades.php");
										elseif ($kat == 3 or $dokumen['kategori'] == 3)
											include("district-app/views/dokumen/_perdes.php");
										else
											include("district-app/views/dokumen/_informasi_publik.php");
										?>
									</div>
								</div>
								<div class="card-footer">
									<button type='reset' class='btn btn-danger'><i class='fe fe-x'></i> Batal</button>
									<button type='submit' class='btn btn-info pull-right confirm'><i class='fe fe-check'></i> Simpan</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
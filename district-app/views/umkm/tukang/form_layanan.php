<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Form Tambah/Ubah</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li><a href="<?= site_url('tukang')?>"><i class="fe fe-dashboard"></i> Daftar Tukang</a></li>
			<li><a href='<?= site_url("tukang/layanan/$album")?>'><i class="fe fe-dashboard"></i> Daftar Layanan</a></li>
			<li class="active">Tambah/Ubah</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="validasi" action="<?= $form_action?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
			<div class="row">
				<div class="col-md-12">
					<div class="card shadow">
            <div class="card-header">
							<a href="<?= site_url("tukang/layanan/$album")?>" class="btn btn-sm btn-outline-info mb-1" title="Tambah Artikel">
								<i class="fe fe-arrow-circle-left "></i>Kembali
            	</a>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label class="control-label col-sm-4" for="nama">Nama Layanan</label>
								<div class="col-sm-6">
									<input name="nama" class="form-control input-sm nomor_sk required" maxlength="50" type="text" placeholder="Nama Layanan" value="<?=$tukang['nama']?>"></input>
								</div>
							</div>
                              <div class="form-group">
                                <label class="col-sm-4 control-label" style="text-align:left;" for="sebutan_biaya">Sebutan Biaya</label>
                                <div class="col-sm-2">
                                  <select class="form-control input-sm select2 required" id="sebutan_biaya" name="sebutan_biaya" style="width:100%;">
                                    <?php foreach ($sebutan_biaya as $value) : ?>
                                    <option <?= $value === $tukang['sebutan_biaya'] ? 'selected' : '' ?> value="<?= $value ?>">
                                    <?= $value ?>
                                    </option>
                                    <?php endforeach; ?>
                                  </select>
                                </div>
                              </div>
							<div class="form-group">
								<label class="control-label col-sm-4" for="harga">Nominal</label>
								<div class="col-sm-2">
									<input name="harga" class="form-control input-sm required" maxlength="20" type="text" placeholder="" value="<?= $tukang['harga']?>"></input>
								</div>
							</div>
                              <div class="form-group">
                                <label class="col-sm-4 control-label" style="text-align:left;" for="sebutan_ukuran">Sebutan Ukuran</label>
                                <div class="col-sm-2">
                                  <select class="form-control input-sm select2 required" id="sebutan_ukuran" name="sebutan_ukuran" style="width:100%;">
                                    <?php foreach ($sebutan_ukuran as $value) : ?>
                                    <option <?= $value === $tukang['sebutan_ukuran'] ? 'selected' : '' ?> value="<?= $value ?>">
                                    <?= $value ?>
                                    </option>
                                    <?php endforeach; ?>
                                  </select>
                                </div>
                              </div>
							<div class="form-group">
								<label class="control-label col-sm-4" for="deskripsi">Deskripsi Pekerjaan</label>
								<div class="col-sm-6">								
								<textarea name="deskripsi" class="form-control input-sm required" style="height:50px;"><?=$tukang['deskripsi']?></textarea><code>tuliskan kode  < br/> untuk membuat baris baru.</code>
                                </div>
                                
							</div>
							<?php if ($tukang['gambar']): ?>
								<div class="form-group">
									<label class="control-label col-sm-4" for="nama"></label>
									<div class="col-sm-6">
										<input type="hidden" name="old_gambar" value="<?=  $tukang['gambar']?>">
                                        <input type="hidden" name="old_gambar" value="<?=  $tukang['no_hp_pengelola']?>">
									  <img class="attachment-img img-responsive img-circle" src="<?= AmbilGaleri($tukang['gambar'], 'sedang') ?>" alt="Gambar Album" width="200px">
									</div>
								</div>
							<?php endif; ?>
							<div class="form-group">
									<label class="control-label col-sm-4" for="upload">Unggah Gambar</label>
									<div class="col-sm-6">
										<div class="input-group input-group-sm">
											<input type="text" class="form-control <?php !($tukang['gambar']) and print('required') ?>" id="file_path">
											<input id="file" type="file" class="hidden" name="gambar">
											<span class="input-group-btn">
												<button type="button" class="btn btn-info btn-box"  id="file_browser"><i class="fe fe-search"></i> Browse</button>
											</span>
										</div>
										<?php $upload_mb = max_upload();?>
										<p><label class="control-label">Batas maksimal pengunggahan berkas <strong><?=$upload_mb?> MB.</strong></label></p>
									</div>
								</div>
						</div>
						<div class="card-footer">
							<div class="col-md-12">
								<button type='reset' class='btn btn-outline-danger btn-sm ' ><i class='fe fe-times'></i> Batal</button>
								<button type='submit' class='btn btn-info btn-sm pull-right confirm'><i class='fe fe-check'></i> Simpan</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
</div>

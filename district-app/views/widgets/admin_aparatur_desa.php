<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Pengaturan Aparatur Desa</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li class="active">Pengaturan Aparatur Desa</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="validasi" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-12">
					<div class="card shadow">
            <div class="card-header">
              <a href="<?=site_url("web_widget")?>" class="btn btn-sm btn-outline-info mb-1" title="Tambah Artikel">
								<i class="fe fe-arrow-circle-left "></i>Kembali ke Daftar Widget
            	</a>
						</div>
						<div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="container-fluid">
                    <div class="jumbotron">
                      <p>Widget Aparatur Desa menampilkan foto staf pemerintah desa. Klik tombol berikut untuk mengubah data aparatur desa, termasuk foto staf pemerintah desa</p>
                      <a class="btn btn-primary btn-large" href="<?= site_url('pengurus/clear')?>">
                        Pemerintah Desa
                      </a>
                    </div>
                  </div>
                </div>
              </div>
							<div class="row">
								<div class="col-sm-12">
									<form id="mainform" name="mainform" action="" method="post">
										<div class="row">
											<div class="col-sm-12">
                        <div class="form-group">
                          <label class="col-xs-12 col-md-3 col-lg-2">Tampilkan nama/jabatan</label>
                          <div class="col-xs-12 col-sm-2">
                            <select class="form-control input-sm" name="setting[overlay]">
                            <option value="1" <?php selected($setting['overlay'], true)?>>Ya</option>
                              <option value="0" <?php selected($setting['overlay'], false)?>>Tidak</option>
                            </select>
                          </div>
                        </div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
            <div class="box-footer">
						  <div class="col-xs-12">
							  <button type="reset" class="btn btn-outline-danger btn-sm btn-sm "><i class="fe fe-times"></i> Batal</button>
								<button type="submit" class="btn btn-info btn-sm pull-right"><i class="fe fe-check"></i> Simpan</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
</div>


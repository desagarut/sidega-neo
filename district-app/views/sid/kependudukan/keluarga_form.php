<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="row align-items-center mb-2">
					<div class="col">
						<h2 class="h5 page-title">Form Keluarga</h2>
					</div>
					<div class="col-auto">
					</div>
				</div>
				<div class="card shadow">
					<form id="mainform" name="mainform" action="<?= $form_action ?>" method="post" enctype="multipart/form-data">
						<div class="row">
							<div id="nik_kepala" name="nik_kepala"></div>
							<div class="col-md-12">
								<div class="card shadow">
									<div class="card-header">
										<a href="<?= site_url("keluarga") ?>" class="btn btn-sm btn-outline-info mb-1" title="Kembali Ke Daftar Penduduk">
											<i class="fe fe-arrow-circle-left "></i>Kembali Ke Daftar Keluarga
										</a>
									</div>
									<div class="card-body">
										<div class="row">
											<div class='col-sm-7'>
												<div class="form-group">
													<label for="alamat"> Nomor KK</label>
													<?php
													// $penduduk dipakai kalau validasi data gagal
													if ($penduduk) :
														$no_kk = $penduduk['no_kk'];
													else :
														$no_kk = $kk['no_kk'];
													endif;
													?>
													<input id="no_kk" name="no_kk" class="form-control input-sm nik" type="text" placeholder="Nomor KK" value="<?= $no_kk ?>"></input>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group bg-primary" style="padding:10px">
											<strong>DATA KEPALA KELUARGA :</strong>
										</div>
									</div>
									<?php include("district-app/views/sid/kependudukan/penduduk_form_isian.php"); ?>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>
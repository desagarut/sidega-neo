<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="row align-items-center mb-2">
					<div class="col">
						<h2 class="h5 page-title">Selamat Datang <?= $nama ?>!</h2>
					</div>
					<!--<div class="col-auto">
						<form class="form-inline">
							<div class="form-group d-none d-lg-inline">
								<label for="reportrange" class="sr-only">Date Ranges</label>
								<div id="reportrange" class="px-2 py-2 text-muted">
									<span class="small"></span>
								</div>
							</div>
							<div class="form-group">
								<button type="button" class="btn btn-sm"><span class="fe fe-refresh-ccw fe-16 text-muted"></span></button>
								<button type="button" class="btn btn-sm mr-2"><span class="fe fe-filter fe-16 text-muted"></span></button>
							</div>
						</form>
					</div>-->
				</div>
				<?php $this->load->view('beranda/kependudukan.php'); ?>

				<div class="row">
					<div class="col-md-4">
						<?php $this->load->view('beranda/link_tupoksi.php'); ?>
						<?php $this->load->view('beranda/kependudukan_progres.php'); ?>
					</div>
					<div class="col-md-8">
						<?php $this->load->view('beranda/peta.php'); ?>
					</div>
				</div>
<!--
				<div class="row">
					<div class="col-md-6 col-xl-3 mb-4">
						<div class="card shadow">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-3 text-center">
										<span class="circle circle-sm bg-primary">
											<i class="fe fe-16 fe-activity text-white mb-0"></i>
										</span>
									</div>
									<div class="col">
										<p class="small text-muted mb-0">Layanan Surat</p>
										<span class="h3 mb-0">80</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-xl-3 mb-4">
						<div class="card shadow">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-3 text-center">
										<span class="circle circle-sm bg-primary">
											<i class="fe fe-16 fe-activity text-white mb-0"></i>
										</span>
									</div>
									<div class="col">
										<p class="small text-muted mb-0">Surat Masuk</p>
										<span class="h3 mb-0">80</span>
									</div>
								</div>
							</div>
						</div>
					</div><br />
					<div class="col-md-6 col-xl-3 mb-4">
						<div class="card shadow">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-3 text-center">
										<span class="circle circle-sm bg-primary">
											<i class="fe fe-16 fe-activity text-white mb-0"></i>
										</span>
									</div>
									<div class="col">
										<p class="small text-muted mb-0">Surat Keluar</p>
										<span class="h3 mb-0">80</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-xl-3 mb-4">
						<div class="card shadow">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-3 text-center">
										<span class="circle circle-sm bg-primary">
											<i class="fe fe-16 fe-activity text-white mb-0"></i>
										</span>
									</div>
									<div class="col">
										<p class="small text-muted mb-0">AVG Orders</p>
										<span class="h3 mb-0">80</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
-->
				<div class="row">
					<div class="col-md-4">
						<?php $this->load->view('beranda/pembangunan.php'); ?>
					</div>
					<div class="col-md-4">
						<?php $this->load->view('beranda/layanan.php'); ?>
						<?php $this->load->view('beranda/umkm.php'); ?>
					</div>
					<div class="col-md-4">
						<?php $this->load->view('beranda/pengunjung.php'); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<?php $this->load->view('beranda/rekap_sppt.php'); ?>
					</div>
					<div class="col-md-4">
						<?php $this->load->view('beranda/pertanahan.php'); ?>
					</div>
					<div class="col-md-4">
						<?php $this->load->view('beranda/pertanahan.php'); ?>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="row btn-page">
					<div class="col-md-3">
						<?php $this->load->view('beranda/artikel.php'); ?>
					</div>
					<div class="col-md-3">
						<?php $this->load->view('beranda/gallery.php'); ?>
					</div>
					<div class="col-md-3">
						<?php $this->load->view('beranda/gallery_youtube.php'); ?>
					</div>
					<div class="col-md-3">
						<?php $this->load->view('beranda/cctv.php'); ?>
					</div>
				</div>
			</div>
			<div class="col-md-12 col-lg-12 mb-4">
				<div class="row">
					<div class="col-md-4">
						<?php $this->load->view('beranda/video.php'); ?>
					</div>
					<div class="col-md-4">
						<?php $this->load->view('beranda/aparat_login.php'); ?>
					</div>
					<div class="col-md-4">
						<?php $this->load->view('beranda/warga_login.php'); ?>
					</div>
				</div>
			</div>
			<div class="col-md-12 col-lg-12 mb-4">
				<div class="row">
					<div class="col-md-4">
						<?php $this->load->view('beranda/changelog.php'); ?>
					</div>
					<div class="col-md-4">
						<?php $this->load->view('beranda/helpdesk.php'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
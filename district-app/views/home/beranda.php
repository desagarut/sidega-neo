<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="row align-items-center mb-2">
					<div class="col">
						<h2 class="h5 page-title">Selamat Datang <?= $nama ?>!</h2>
					</div>
					<div class="col-auto">
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
					</div>
				</div>
				<?php $this->load->view('home/kependudukan.php'); ?>

				<div class="row">
					<div class="col-md-4">
						<?php $this->load->view('home/kependudukan_progres.php'); ?>
						<?php $this->load->view('home/rekap_sppt.php'); ?>

						<div class="card shadow mb-4">
							<div class="card-body">
								<div class="py-5 text-center">
									<p class="text-muted mb-2">Real time</p>
									<h2 class="mb-1">1,254</h2>
									<span class="small text-success">+2%</span>
								</div>
								<div class="row align-items-center mb-1">
									<div class="col-auto">
										<div class="my-2 text-center">
											<small class="text-danger pr-2 mr-2">High</small>
											<span class="text-warning px-2 mx-2">Medium</span>
											<span class="text-success px-2 mx-2">Low</span>
										</div>
									</div>
									<div class="col">
										<small class="h6 mb-0 text-muted">Statistics</small>
									</div>
								</div>
								<div class="progress rounded mb-3" style="height:14px">
									<div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">15%</div>
									<div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">30%</div>
									<div class="progress-bar bg-success" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20%</div>
								</div>
							</div> <!-- .card-body -->
						</div> <!-- .card -->
						<div class="card shadow mb-4">
							<div class="card-body">
								<div class="chart-box">
									<div id="gradientRadial"></div>
								</div>
								<div class="row items-align-center">
									<div class="col-4 text-center">
										<p class="text-muted mb-1">Cost</p>
										<h6 class="mb-1">$1,823</h6>
										<p class="text-muted mb-0">+12%</p>
									</div>
									<div class="col-4 text-center">
										<p class="text-muted mb-1">Revenue</p>
										<h6 class="mb-1">$6,830</h6>
										<p class="text-muted mb-0">+8%</p>
									</div>
									<div class="col-4 text-center">
										<p class="text-muted mb-1">Earning</p>
										<h6 class="mb-1">$4,830</h6>
										<p class="text-muted mb-0">+8%</p>
									</div>
								</div>
							</div> <!-- .card-body -->
						</div> <!-- .card -->

						<div class="card shadow mb-4">
							<div class="card-header">
								<strong class="card-title mb-0">Status</strong>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-6 text-center">
										<p class="small text-muted mb-0">Maximum</p>
										<strong class="text-uppercase">126</strong>
										<p class="small text-muted mb-0">+5.5%</p>
									</div>
									<div class="col-6 text-center">
										<p class="small text-muted mb-0">Minimum</p>
										<strong class="text-uppercase">89</strong>
										<p class="small text-muted mb-0">-5.5%</p>
									</div>
								</div>
								<div class="chart-box">
									<div id="heatmapChartWidget"></div>
								</div>
							</div> <!-- /.card-body -->
						</div> <!-- /.card -->
						<div class="card shadow mb-4">
							<div class="card-header">
								<strong class="card-title">Notification List</strong>
								<a class="float-right small text-muted" href="#!">View all</a>
							</div>
							<div class="card-body scrollable">
								<div class="list-group list-group-flush my-n3">
									<div class="list-group-item">
										<div class="row align-items-center">
											<div class="col-auto">
												<span class="fe fe-link fe-24"></span>
											</div>
											<div class="col">
												<small><strong>Link was attached to menu</strong></small>
												<div class="my-0 text-muted small">New layout has been attached to the menu</div>
											</div>
											<div class="col-auto">
												<small class="badge badge-pill badge-light text-muted">1h ago</small>
											</div>
										</div>
									</div>
									<div class="list-group-item">
										<div class="row align-items-center">
											<div class="col-auto">
												<span class="fe fe-box fe-24"></span>
											</div>
											<div class="col">
												<small><strong>Package has uploaded successfull</strong></small>
												<div class="my-0 text-muted small">Package is zipped and uploaded</div>
											</div>
											<div class="col-auto">
												<small class="badge badge-pill badge-light text-muted">1m ago</small>
											</div>
										</div>
									</div>
									<div class="list-group-item">
										<div class="row align-items-center">
											<div class="col-auto">
												<span class="fe fe-download fe-24"></span>
											</div>
											<div class="col">
												<small><strong>Widgets are updated successfull</strong></small>
												<div class="my-0 text-muted small">Just create new layout Index, form, table</div>
											</div>
											<div class="col-auto">
												<small class="badge badge-pill badge-light text-muted">2m ago</small>
											</div>
										</div>
									</div>
									<div class="list-group-item mb-2">
										<div class="row align-items-center">
											<div class="col-auto">
												<span class="fe fe-inbox fe-24"></span>
											</div>
											<div class="col">
												<small><strong>Notifications have been sent</strong></small>
												<div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo</div>
											</div>
											<div class="col-auto">
												<small class="badge badge-pill badge-light text-muted">30m ago</small>
											</div>
										</div> <!-- / .row -->
									</div>
								</div> <!-- / .list-group -->
							</div> <!-- / .card-body -->
						</div> <!-- / .card -->
						<div class="col-md-6">
							<div class="card shadow mb-4">
								<div class="card-header">
									<div class="row align-items-center">
										<div class="col">
											<h3 class="h6 mb-0">Users</h3>
										</div>
										<div class="col-auto">
											<a class="small text-muted" href="#!">View all</a>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="d-flex mb-2">
										<div class="flex-fill pt-2">
											<p class="mb-0 text-muted">Total</p>
											<h4 class="mb-0">108</h4>
											<span class="small text-muted">+37.7%</span>
										</div>
										<div class="flex-fill chart-box mb-n1">
											<div id="barChartWidget"></div>
										</div>
									</div> <!-- .d-flex -->
									<div class="row border-top">
										<div class="col-md-6 pt-4">
											<h6 class="mb-0">108 <span class="small text-muted">+37.7%</span></h6>
											<p class="mb-0 text-muted">Cost</p>
										</div>
										<div class="col-md-6 pt-4">
											<h6 class="mb-0">1168 <span class="small text-muted">-18.9%</span></h6>
											<p class="mb-0 text-muted">Revenue</p>
										</div>
									</div> <!-- .row -->
								</div> <!-- .card-body -->
							</div> <!-- .card -->
						</div> <!-- .col-md -->
					</div> <!-- ./col -->
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-4 mb-4">
								<div class="card shadow">
									<div class="card-body">
										<div class="row align-items-center">
											<div class="col">
												<h4 class="mb-0">15%</h4>
												<p class="small text-muted mb-0">Cpu Usage</p>
											</div>
											<div class="col-5">
												<div id="gauge1" class="gauge-container"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4 mb-4">
								<div class="card shadow">
									<div class="card-body">
										<div class="row align-items-center">
											<div class="col">
												<h4 class="mb-0">65%</h4>
												<p class="small text-muted mb-0">Ram Usage</p>
											</div>
											<div class="col-5">
												<div id="gauge2" class="gauge-container"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4 mb-4">
								<div class="card shadow">
									<div class="card-body">
										<div class="row align-items-center">
											<div class="col">
												<p class="small text-muted mb-0">Network</p>
												<h4 class="mb-0">20%</h4>
											</div>
											<div class="col-5">
												<div id="gauge3" class="gauge-container"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> <!-- end section -->
						<?php $this->load->view('home/peta.php'); ?>
					</div> <!-- .col-md -->
				</div>
			</div>
			<div class="row btn-page">
				<div class="col-lg-8 col-md-12">
					<?php //$this->load->view('home/peta.php'); 
					?>
					<?php $this->load->view('home/umkm.php'); ?>
				</div>
				<div class="col-lg-4 col-md-12">
					<?php //$this->load->view('home/kependudukan_2.php'); 
					?>

					<?php //$this->load->view('home/link_tupoksi.php'); 
					?>
					<?php // $this->load->view('home/umkm.php'); 
					?>
					<?php // $this->load->view('home/layanan.php'); 
					?>
				</div>
			</div>
			<div class="row btn-page">
				<div class="col-lg-12 col-md-12">
					<?php $this->load->view('home/layanan.php'); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<?php //$this->load->view('home/rekap_sppt.php'); 
					?>
				</div>
				<div class="col-md-3">
					<?php //$this->load->view('home/pertanahan.php'); 
					?>
				</div>
				<div class="col-md-3">
					<?php //$this->load->view('home/kependudukan_2.php'); 
					?>
				</div>
				<div class="col-md-3">
					<?php //$this->load->view('home/pembangunan.php'); 
					?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<?php // $this->load->view('home/artikel.php'); 
					?>
				</div>
				<div class="col-md-3">
					<?php // $this->load->view('home/gallery.php'); 
					?>
				</div>
				<div class="col-md-3">
					<?php // $this->load->view('home/gallery_youtube.php'); 
					?>
				</div>
				<div class="col-md-3">
					<?php // $this->load->view('home/cctv.php'); 
					?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<?php // $this->load->view('home/helpdesk.php'); 
					?>
				</div>
				<div class="col-md-3">
					<?php // $this->load->view('home/aparat_login.php'); 
					?>
				</div>
				<div class="col-md-3">
					<?php // $this->load->view('home/warga_login.php'); 
					?>
				</div>
				<div class="col-md-3">
					<?php // $this->load->view('home/pengunjung.php'); 
					?>
					<?php //$this->load->view('home/artikel.php'); 
					?>
					<?php // $this->load->view('home/changelog.php'); 
					?>
					<?php //$this->load->view('home/video.php'); 
					?>

				</div>
			</div>
		</div>
	</div>
</main>
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
										<p class="small text-muted mb-0">AVG Orders</p>
										<span class="h3 mb-0">$80</span>
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
										<span class="h3 mb-0">$80</span>
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
										<p class="small text-muted mb-0">AVG Orders</p>
										<span class="h3 mb-0">$80</span>
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
										<span class="h3 mb-0">$80</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
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
					<?php $this->load->view('beranda/pertanahan.php'); ?>
				</div>
			</div>

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
							</div>
						</div>
					</div>
				</div>
			</div>
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
						</div>
						<div class="row border-top">
							<div class="col-md-6 pt-4">
								<h6 class="mb-0">108 <span class="small text-muted">+37.7%</span></h6>
								<p class="mb-0 text-muted">Cost</p>
							</div>
							<div class="col-md-6 pt-4">
								<h6 class="mb-0">1168 <span class="small text-muted">-18.9%</span></h6>
								<p class="mb-0 text-muted">Revenue</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>-->
	</div>
	<div class="row btn-page">
		<div class="col-lg-8 col-md-12">
			<?php //$this->load->view('beranda/peta.php'); 
			?>
			<?php //$this->load->view('beranda/umkm.php'); 
			?>
		</div>
		<div class="col-lg-4 col-md-12">
			<?php //$this->load->view('beranda/kependudukan_2.php'); 
			?>
		</div>
	</div>
	<div class="row btn-page">
		<div class="col-lg-12 col-md-12">
			<?php //$this->load->view('beranda/layanan.php'); 
			?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<?php //$this->load->view('beranda/rekap_sppt.php'); 
			?>
		</div>
		<div class="col-md-3">
			<?php //$this->load->view('beranda/pertanahan.php'); 
			?>
		</div>
		<div class="col-md-3">
			<?php //$this->load->view('beranda/kependudukan_2.php'); 
			?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<?php $this->load->view('beranda/artikel.php');
			?>
		</div>
		<div class="col-md-3">
			<?php $this->load->view('beranda/gallery.php');
			?>
		</div>
		<div class="col-md-3">
			<?php $this->load->view('beranda/gallery_youtube.php');
			?>
		</div>
		<div class="col-md-3">
			<?php $this->load->view('beranda/cctv.php');
			?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<?php $this->load->view('beranda/helpdesk.php');
			?>
		</div>
		<div class="col-md-3">
			<?php $this->load->view('beranda/aparat_login.php');
			?>
		</div>
		<div class="col-md-3">
			<?php $this->load->view('beranda/warga_login.php');
			?>
		</div>
		<div class="col-md-3">
			<?php //$this->load->view('beranda/pengunjung.php'); 
			?>
			<?php $this->load->view('beranda/artikel.php');
			?>
			<?php $this->load->view('beranda/changelog.php');
			?>
			<?php $this->load->view('beranda/video.php');
			?>

		</div>
	</div>
	</div>
	</div>
</main>
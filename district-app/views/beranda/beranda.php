<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="row align-items-center mb-2">
					<div class="col">
						<h2 class="h5 page-title">Selamat Datang <?= $nama ?>!</h2>
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
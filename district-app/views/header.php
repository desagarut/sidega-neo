<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta name="theme-color" content="#E08E0B">

	<?php if (is_file(LOKASI_LOGO_DESA . "favicon.ico")) : ?>
		<link rel="shortcut icon" href="<?= base_url() ?><?= LOKASI_LOGO_DESA ?>favicon.ico" />
	<?php else : ?>
		<link rel="shortcut icon" href="<?= base_url() ?>favicon.ico" />
	<?php endif; ?>
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?= base_url() ?>rss.xml" />

	<!-- Simple bar CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/tiny/css/simplebar.css">
	<!-- Fonts CSS -->
	<link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<!-- Icons CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/tiny/css/feather.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/tiny/css/feather.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/tiny/css/select2.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/tiny/css/dropzone.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/tiny/css/uppy.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/tiny/css/jquery.steps.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/tiny/css/jquery.timepicker.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/tiny/css/quill.snow.css">
	<!-- Date Range Picker CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/tiny/css/daterangepicker.css">
	<!-- App CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/tiny/css/app-light.css" id="lightTheme">
	<link rel="stylesheet" href="<?= base_url() ?>assets/tiny/css/app-dark.css" id="darkTheme" disabled>

	<!-- OpenStreetMap Css -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/tiny/css/osm/leaflet.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/tiny/css/osm/leaflet-geoman.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/tiny/css/osm/L.Control.Locate.min.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/tiny/css/osm/MarkerCluster.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/tiny/css/osm/MarkerCluster.Default.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/tiny/css/osm/leaflet-measure-path.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/tiny/css/osm/mapbox-gl.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/tiny/css/osm/L.Control.Shapefile.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/tiny/css/osm/leaflet.groupedlayercontrol.min.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/tiny/css/osm/peta.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/tiny/css/osm/toastr.min.css">

	<!-- Untuk ubahan style desa -->
	<?php if (is_file("instansi/css/insidega.css")) : ?>
		<link type='text/css' href="<?= base_url() ?>instansi/css/insidega.css" rel='Stylesheet' />
	<?php endif; ?>
	<!-- Diperlukan untuk script jquery khusus halaman -->
	<script src="<?= base_url() ?>assets/tiny/bootstrap/js/jquery.min.js"></script>

	<!-- OpenStreetMap Js-->
	<script src="<?= base_url() ?>assets/tiny/js/osm/leaflet.js"></script>
	<script src="<?= base_url() ?>assets/tiny/js/osm/turf.min.js"></script>
	<script src="<?= base_url() ?>assets/tiny/js/osm/leaflet-geoman.min.js"></script>
	<script src="<?= base_url() ?>assets/tiny/js/osm/leaflet.filelayer.js"></script>
	<script src="<?= base_url() ?>assets/tiny/js/osm/togeojson.js"></script>
	<script src="<?= base_url() ?>assets/tiny/js/osm/togpx.js"></script>
	<script src="<?= base_url() ?>assets/tiny/js/osm/leaflet-providers.js"></script>
	<script src="<?= base_url() ?>assets/tiny/js/osm/L.Control.Locate.min.js"></script>
	<script src="<?= base_url() ?>assets/tiny/js/osm/leaflet.markercluster.js"></script>
	<script src="<?= base_url() ?>assets/tiny/js/osm/peta.js"></script>
	<script src="<?= base_url() ?>assets/tiny/js/osm/leaflet-measure-path.js"></script>
	<script src="<?= base_url() ?>assets/tiny/js/osm/apbdes_manual.js"></script>
	<script src="<?= base_url() ?>assets/tiny/js/osm/mapbox-gl.js"></script>
	<script src="<?= base_url() ?>assets/tiny/js/osm/leaflet-mapbox-gl.js"></script>
	<script src="<?= base_url() ?>assets/tiny/js/osm/shp.js"></script>
	<script src="<?= base_url() ?>assets/tiny/js/osm/leaflet.shpfile.js"></script>
	<script src="<?= base_url() ?>assets/tiny/js/osm/leaflet.groupedlayercontrol.min.js"></script>
	<script src="<?= base_url() ?>assets/tiny/js/osm/leaflet.browser.print.js"></script>
	<script src="<?= base_url() ?>assets/tiny/js/osm/leaflet.browser.print.utils.js"></script>
	<script src="<?= base_url() ?>assets/tiny/js/osm/leaflet.browser.print.sizes.js"></script>
	<script src="<?= base_url() ?>assets/tiny/js/osm/dom-to-image.min.js"></script>
	<script src="<?= base_url() ?>assets/tiny/js/osm/toastr.min.js"></script>

	<!-- Diperlukan untuk global automatic base_url oleh external js file -->
	<script type="text/javascript">
		var BASE_URL = "<?= base_url(); ?>";
		var SITE_URL = "<?= site_url(); ?>";
	</script>

	<!-- Highcharts JS -->
	<script src="<?= base_url() ?>assets/tiny/js/highcharts/highcharts.js"></script>
	<script src="<?= base_url() ?>assets/tiny/js/highcharts/highcharts-3d.js"></script>
	<script src="<?= base_url() ?>assets/tiny/js/highcharts/exporting.js"></script>
	<script src="<?= base_url() ?>assets/tiny/js/highcharts/highcharts-more.js"></script>
	<script src="<?= base_url() ?>assets/tiny/js/highcharts/sankey.js"></script>
	<script src="<?= base_url() ?>assets/tiny/js/highcharts/organization.js"></script>
	<script src="<?= base_url() ?>assets/tiny/js/highcharts/accessibility.js"></script>

	<?php require __DIR__ . '/head_tags.php' ?>

	<title>
		<?= $this->setting->admin_title
			. ' ' . ucwords($this->setting->sebutan_desa)
			. (($desa['nama_desa']) ? ' ' . $desa['nama_desa'] : '')
			. get_dynamic_title_page_from_path();
		?>
	</title>
</head>

<body class="vertical light">
	<div class="wrapper">

		<nav class="topnav navbar navbar-light">
			<button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3  <?php if ($minsidebar == 1) : ?> collapseSidebar <?php endif ?>">
				<i class="fe fe-menu navbar-toggler-icon"></i>
			</button>
			<form class="form-inline mr-auto searchform text-muted">
				<input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search" placeholder="Type something..." aria-label="Search">
			</form>
			<ul class="nav">
				<li class="nav-item">
					<a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
						<i class="fe fe-sun fe-16"></i>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
						<span class="fe fe-grid fe-16"></span>
					</a>
				</li>
				<li class="nav-item nav-notif">
					<a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-notif">
						<span class="fe fe-bell fe-16"></span>
						<span class="dot dot-md bg-success"></span>
					</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="avatar avatar-sm mt-2">
							<img src="<?= AmbilFoto($foto); ?>" alt="<?= $nama ?>" class="avatar-img rounded-circle">
						</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="#">Profile</a>
						<a class="dropdown-item" href="#">Settings</a>
						<a class="dropdown-item" href="<?= site_url('insidega/logout'); ?>">Logout</a>
					</div>
				</li>
			</ul>
		</nav>
		<!--
<body class="<?= $this->setting->warna_tema_admin; ?> sidebar-mini fixed <?php if ($minsidebar == 1) : ?>sidebar-collapse<?php endif ?>">
	<div class="wrapper">
		<header class="main-header">
			<a href="<?= site_url() ?>first" target="_blank" class="logo">
				<span class="logo-mini logo-text" style="padding-top:7px"><img src="<?php echo base_url() . 'assets/files/logo/sidega.png'; ?>" class="img-circle logo-desa" alt="User Image" width="30px"></span> <span class="logo-lg logo-text"><img src="<?php echo base_url() . 'assets/files/logo/sidega.png'; ?>" class="img-circle logo-desa" alt="User Image" width="30px"><b> <?= $this->setting->website_title ?>
					</b></span> </a>
			<nav class="navbar navbar-static-top">
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"><span class="sr-only">Toggle navigation</span> </a>
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">

						<?php if (ENVIRONMENT == 'development') : ?>
							<li> <a> <i class="fa fa-cog fa-lg" title="Development"></i><span class="badge">Development</span> </a> </li>
						<?php endif; ?>
						<li><span><?php $this->load->view('jam.php'); ?></span></li>
						<?php if ($this->CI->cek_hak_akses('b', 'permohonan_surat_admin')) : ?>
							<li> <a href="<?= site_url('permohonan_surat_admin/clear'); ?>"> <span><i class="fa fa-print fa-lg" title="Permohonan Surat"></i>&nbsp;</span> <span class="badge" id="b_permohonan_surat" style="display: none;"></span> </a> </li>
						<?php endif; ?>
						<?php if ($this->CI->cek_hak_akses('b', 'komentar')) : ?>
							<li> <a href="<?= site_url('komentar'); ?>"> <span><i class="fa fa-commenting-o fa-lg" title="Komentar"></i>&nbsp;</span> <span class="badge" id="b_komentar" style="display: none;"></span> </a> </li>
						<?php endif; ?>
						<?php if ($this->CI->cek_hak_akses('b', 'mailbox')) : ?>
							<li> <a href="<?= site_url('mailbox'); ?>"> <span><i class="fa fa-envelope-o fa-lg" title="Pesan Masuk"></i>&nbsp;</span> <span class="badge" id="b_inbox" style="display: none;"></span> </a> </li>
						<?php endif; ?>
						<li class="dropdown user user-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="<?= AmbilFoto($foto); ?>" class="user-image" alt="User Image" /> <span class="hidden-xs">
									<?= $nama ?>
								</span> </a>
							<ul class="dropdown-menu">
								<li class="user-header"> <img src="<?= AmbilFoto($foto); ?>" class="img-circle" alt="User Image" />
									<p><small> Anda Login Sebagai </small><strong style="color:#090">
											<?= $nama ?>
										</strong> </p>
								</li>
								<li class="user-footer">
									<div class="pull-left"> <a href="<?= site_url('user_setting'); ?>" data-remote="false" data-toggle="modal" data-tittle="Pengaturan Pengguna" data-target="#modalBox" class="btn bg-purple btn-box btn-sm">Profil</a> </div>
									<div class="pull-right"> <a href="<?= site_url('insidega/logout'); ?>" class="btn bg-maroon btn-box btn-sm">Keluar</a> </div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<code>$(document).ajaxStart(function() { Pace.restart(); });</code>-->
		<input id="success-code" type="hidden" value="<?= $_SESSION['success'] ?>">
		<!-- Untuk menampilkan modal bootstrap umum -->
		<!--
		<div class="modal fade" id="modalBox" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class='modal-dialog'>
				<div class='modal-content'>
					<div class='modal-header'>
						<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
						<h4 class='modal-title' id='myModalLabel'> Pengaturan Pengguna</h4>
					</div>
					<div class="fetched-data"></div>
				</div>
			</div>
		</div>-->


		<div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="list-group list-group-flush my-n3">
							<div class="list-group-item bg-transparent">
								<?php if ($this->CI->cek_hak_akses('b', 'mailbox')) : ?>
									<a href="<?= site_url('mailbox'); ?>">
										<div class="row align-items-center">
											<div class="col-auto">
												<span class="fe fe-box fe-24"></span>
											</div>
											<div class="col">
												<span><i class="fe fe-envelope-o fe-lg" title="Pesan Masuk"></i></span>
												<small><strong>Package has uploaded successfull</strong></small>
												<div class="my-0 text-muted small">Package is zipped and uploaded</div>
												<small class="badge badge-pill badge-light text-muted">1m ago</small>
											</div>
										</div>
									</a>
								<?php endif; ?>

							</div>
							<div class="list-group-item bg-transparent">
								<div class="row align-items-center">
									<div class="col-auto">
										<span class="fe fe-download fe-24"></span>
									</div>
									<div class="col">
										<small><strong>Widgets are updated successfull</strong></small>
										<div class="my-0 text-muted small">Just create new layout Index, form, table</div>
										<small class="badge badge-pill badge-light text-muted">2m ago</small>
									</div>
								</div>
							</div>
							<div class="list-group-item bg-transparent">
								<div class="row align-items-center">
									<div class="col-auto">
										<span class="fe fe-inbox fe-24"></span>
									</div>
									<div class="col">
										<small><strong>Notifications have been sent</strong></small>
										<div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo</div>
										<small class="badge badge-pill badge-light text-muted">30m ago</small>
									</div>
								</div> <!-- / .row -->
							</div>
							<div class="list-group-item bg-transparent">
								<div class="row align-items-center">
									<div class="col-auto">
										<span class="fe fe-link fe-24"></span>
									</div>
									<div class="col">
										<small><strong>Link was attached to menu</strong></small>
										<div class="my-0 text-muted small">New layout has been attached to the menu</div>
										<small class="badge badge-pill badge-light text-muted">1h ago</small>
									</div>
								</div>
							</div> <!-- / .row -->
						</div> <!-- / .list-group -->
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body px-5">
						<div class="row align-items-center">
							<div class="col-6 text-center">
								<div class="squircle bg-success justify-content-center">
									<i class="fe fe-cpu fe-32 align-self-center text-white"></i>
								</div>
								<p>Control area</p>
							</div>
							<div class="col-6 text-center">
								<div class="squircle bg-primary justify-content-center">
									<i class="fe fe-activity fe-32 align-self-center text-white"></i>
								</div>
								<p>Activity</p>
							</div>
						</div>
						<div class="row align-items-center">
							<div class="col-6 text-center">
								<div class="squircle bg-primary justify-content-center">
									<i class="fe fe-droplet fe-32 align-self-center text-white"></i>
								</div>
								<p>Droplet</p>
							</div>
							<div class="col-6 text-center">
								<div class="squircle bg-primary justify-content-center">
									<i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
								</div>
								<p>Upload</p>
							</div>
						</div>
						<div class="row align-items-center">
							<div class="col-6 text-center">
								<div class="squircle bg-primary justify-content-center">
									<i class="fe fe-users fe-32 align-self-center text-white"></i>
								</div>
								<p>Users</p>
							</div>
							<div class="col-6 text-center">
								<div class="squircle bg-primary justify-content-center">
									<i class="fe fe-settings fe-32 align-self-center text-white"></i>
								</div>
								<p>Settings</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta name="theme-color" content="#ffff">
	<?php if (is_file(LOKASI_LOGO_DESA . "favicon.ico")) : ?>
	<link rel="shortcut icon" href="<?= base_url() ?><?= LOKASI_LOGO_DESA ?>favicon.ico" />
	<?php else : ?>
	<link rel="shortcut icon" href="<?= base_url() ?>favicon.ico" />
	<?php endif; ?>
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?= base_url() ?>rss.xml" />

	<!-- Simple bar CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/simplebar.css">
	<!-- Fonts CSS -->
	<link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<!-- Icons CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/feather.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/select2.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/dropzone.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/uppy.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/jquery.steps.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/jquery.timepicker.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/quill.snow.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/dataTables.bootstrap4.css">
	<!-- Date Range Picker CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/daterangepicker.css">
	<!-- App CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/app-light.css" id="lightTheme">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/app-dark.css" id="darkTheme" disabled>
	<!-- OpenStreetMap Css -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/osm/leaflet.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/osm/leaflet-geoman.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/osm/L.Control.Locate.min.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/osm/MarkerCluster.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/osm/MarkerCluster.Default.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/osm/leaflet-measure-path.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/osm/mapbox-gl.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/osm/L.Control.Shapefile.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/osm/leaflet.groupedlayercontrol.min.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/osm/peta.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/osm/toastr.min.css">

	<!-- Untuk ubahan style desa -->
	<?php if (is_file("instansi/css/insidega.css")) : ?>
	<link type='text/css' href="<?= base_url() ?>instansi/css/insidega.css" rel='Stylesheet' />
	<?php endif; ?>
	<!-- Diperlukan untuk script jquery khusus halaman -->
	<script src="<?= base_url() ?>assets/bootstrap/js/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>

	<!-- Diperlukan untuk global automatic base_url oleh external js file -->
	<script type="text/javascript">
		var BASE_URL = "<?= base_url(); ?>";
		var SITE_URL = "<?= site_url(); ?>";
	</script>

	<!-- Highcharts JS -->
	<script src="<?= base_url() ?>assets/js/highcharts/highcharts.js"></script>
	<script src="<?= base_url() ?>assets/js/highcharts/highcharts-3d.js"></script>
	<script src="<?= base_url() ?>assets/js/highcharts/exporting.js"></script>
	<script src="<?= base_url() ?>assets/js/highcharts/highcharts-more.js"></script>
	<script src="<?= base_url() ?>assets/js/highcharts/sankey.js"></script>
	<script src="<?= base_url() ?>assets/js/highcharts/organization.js"></script>
	<script src="<?= base_url() ?>assets/js/highcharts/accessibility.js"></script>
	<?php require __DIR__ . '/head_tags.php' ?>
	<title>
    <?= $this->setting->admin_title
			. ' ' . ucwords($this->setting->sebutan_desa)
			. (($desa['nama_desa']) ? ' ' . $desa['nama_desa'] : '')
			. get_dynamic_title_page_from_path();
		?>
    </title>
	</head>

	<body class="vertical light <?php if ($minsidebar == 1) : ?> collapsed <?php endif ?>">
    <div class="wrapper">
      <nav class="topnav navbar navbar-light">
        <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar"> <i class="fe fe-menu navbar-toggler-icon"></i> </button>
        <ul class="nav">
          <a class="nav-link text-muted my-2" href="<?= site_url('first'); ?>" target="_blank"><i class="fe fe-monitor fe-16"></i></a>
          <li class="nav-item"> <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light"> <i class="fe fe-sun fe-16"></i> </a> </li>
          <li class="nav-item"> <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut"> <span class="fe fe-grid fe-16"></span> </a> </li>
          <li class="nav-item nav-notif">
            <?php if ($this->CI->cek_hak_akses('b', 'mailbox')) : ?>
            <a class="nav-link text-muted my-2" href="<?= site_url('mailbox'); ?>" data-toggle="modal" data-target=".modal-notif"> <span class="fe fe-bell fe-16"></span> <span class="dot dot-md bg-success" id="b_inbox" style="display: none;"></span> </a>
            <?php endif; ?>
          </li>
          <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="avatar avatar-sm mt-2"> <img src="<?= AmbilFoto($foto); ?>" alt="<?= $nama ?>" class="avatar-img rounded-circle"> </span> </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink"> <a class="dropdown-item" href="<?= site_url('user_setting'); ?>" data-toggle="modal" data-target="#modalBox">Profile</a> <a class="dropdown-item" href="<?= site_url('setting'); ?>">Settings</a> <a class="dropdown-item" href="<?= site_url('insidega/logout'); ?>">Logout</a> </div>
          </li>
        </ul>
      </nav>
      <input id="success-code" type="hidden" value="<?= $_SESSION['success'] ?>">
      <div class="modal fade" id="modalBox" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class='modal-dialog'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h4 class='modal-title' id='myModalLabel'> Pengaturan Pengguna</h4>
              <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
            </div>
            <div class="fetched-data"></div>
          </div>
        </div>
      </div>
      <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body">
              <div class="list-group list-group-flush my-n3">
                <div class="list-group-item bg-transparent">
                  <?php if ($this->CI->cek_hak_akses('b', 'mailbox')) : ?>
                  <a href="<?= site_url('mailbox'); ?>">
                  <div class="row align-items-center">
                    <div class="col-auto"> <span class="fe fe-mail fe-24"></span> </div>
                    <div class="col"> <span id="b_inbox" style="display: none;"><i class="fe fe-envelope-o fe-lg" title="Pesan Masuk"></i></span> <small><strong>Package has uploaded successfull</strong></small>
                      <div class="my-0 text-muted small">Package is zipped and uploaded</div>
                      <small class="badge badge-pill badge-light text-muted">1m ago</small> </div>
                  </div>
                  </a>
                  <?php endif; ?>
                </div>
                <div class="list-group-item bg-transparent">
                  <div class="row align-items-center">
                    <div class="col-auto"> <span class="fe fe-download fe-24"></span> </div>
                    <div class="col"> <small><strong>Widgets are updated successfull</strong></small>
                      <div class="my-0 text-muted small">Just create new layout Index, form, table</div>
                      <small class="badge badge-pill badge-light text-muted">2m ago</small> </div>
                  </div>
                </div>
                <div class="list-group-item bg-transparent">
                  <div class="row align-items-center">
                    <div class="col-auto"> <span class="fe fe-inbox fe-24"></span> </div>
                    <div class="col"> <small><strong>Notifications have been sent</strong></small>
                      <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo</div>
                      <small class="badge badge-pill badge-light text-muted">30m ago</small> </div>
                  </div>
                </div>
                <div class="list-group-item bg-transparent">
                  <div class="row align-items-center">
                    <div class="col-auto"> <span class="fe fe-link fe-24"></span> </div>
                    <div class="col"> <small><strong>Link was attached to menu</strong></small>
                      <div class="my-0 text-muted small">New layout has been attached to the menu</div>
                      <small class="badge badge-pill badge-light text-muted">1h ago</small> </div>
                  </div>
                </div>
              </div>
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
              <h5 class="modal-title" id="defaultModalLabel">Akses Cepat</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body px-5">
              <div class="row align-items-center">
                <div class="col-6 text-center"> <a href="<?php if ($this->CI->cek_hak_akses('u')) : ?><?= site_url('surat') ?><?php endif; ?>" title="Tulis Berita" class="btn">
                  <div class="squircle bg-success justify-content-center"> <i class="fe fe-mail fe-32 align-self-center text-white"></i> </div>
                  <p>Buat Surat</p>
                  </a> </div>
                <div class="col-6 text-center"> <a href="<?php if ($this->CI->cek_hak_akses('u')) : ?><?= site_url('web') ?><?php endif; ?>" title="Tulis Berita" class="btn">
                  <div class="squircle bg-primary justify-content-center"> <i class="fe fe-edit fe-32 align-self-center text-white"></i> </div>
                  <p>Tulis Berita</p>
                  </a> </div>
              </div>
              <div class="row align-items-center">
                <div class="col-6 text-center"> <a href="<?php if ($this->CI->cek_hak_akses('u')) : ?><?= site_url('surat_masuk') ?><?php endif; ?>" title="Tulis Berita" class="btn">
                  <div class="squircle bg-primary justify-content-center"> <i class="fe fe-log-in fe-32 align-self-center text-white"></i> </div>
                  <p>Surat Masuk</p>
                  </a> </div>
                <div class="col-6 text-center"> <a href="<?php if ($this->CI->cek_hak_akses('u')) : ?><?= site_url('surat_keluar') ?><?php endif; ?>" title="Tulis Berita" class="btn">
                  <div class="squircle bg-warning justify-content-center"> <i class="fe fe-log-out fe-32 align-self-center text-white"></i> </div>
                  <p>Surat Keluar</p>
                  </a> </div>
              </div>
              <div class="row align-items-center">
                <div class="col-6 text-center">
                  <div class="squircle bg-primary justify-content-center"> <i class="fe fe-users fe-32 align-self-center text-white"></i> </div>
                  <p>Users</p>
                </div>
                <div class="col-6 text-center">
                  <div class="squircle bg-primary justify-content-center"> <i class="fe fe-settings fe-32 align-self-center text-white"></i> </div>
                  <p>Settings</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

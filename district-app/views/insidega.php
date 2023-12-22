<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title> <?= $this->setting->login_title
				. ' ' . ucwords($this->setting->sebutan_desa)
				. (($header['nama_desa']) ? ' ' . $header['nama_desa'] : '')
				. get_dynamic_title_page_from_path();
			?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">

	<?php if (is_file(LOKASI_LOGO_DESA . "favicon.ico")) : ?>
		<link rel="shortcut icon" href="<?= base_url() ?><?= LOKASI_LOGO_DESA ?>favicon.ico" />
	<?php else : ?>
		<link rel="shortcut icon" href="<?= base_url() ?>favicon.ico" />
	<?php endif; ?>

	<!-- Simple bar CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/simplebar.css">
	<!-- Fonts CSS -->
	<link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<!-- Icons CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/feather.css">
	<!-- Date Range Picker CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/daterangepicker.css">
	<!-- App CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/app-light.css" id="lightTheme">
	<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/validasi.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/messages_id.js"></script>
	<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/js/popper.min.js"></script>
	<script src="<?= base_url() ?>assets/js/moment.min.js"></script>
	<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/js/simplebar.min.js"></script>
	<script src='<?= base_url() ?>assets/js/daterangepicker.js'></script>
	<script src='<?= base_url() ?>assets/js/jquery.stickOnScroll.js'></script>
	<script src="<?= base_url() ?>assets/js/tinycolor-min.js"></script>
	<script src="<?= base_url() ?>assets/js/config.js"></script>
	<script src="<?= base_url() ?>assets/js/apps.js"></script>
	<?php require __DIR__ . '/head_tags.php' ?>
</head>

<body class="light ">
	<div class="wrapper vh-100" style="<?php include(''); ?>">
		<div class="row align-items-center h-100">
			<form id="validasi" class="col-lg-3 col-md-4 col-10 mx-auto text-center" action="<?= site_url('insidega/auth') ?>" method="post">
				<a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="<?= base_url('') ?>">
					<img src="<?= gambar_desa($header['logo']); ?>" alt="<?= $header['nama_desa'] ?>" class="img-responsive" style="max-width: 80px; max-height: 80px" />
				</a>
				<h1 class="h6 mb-3"><?= ucwords($this->setting->sebutan_desa) ?> <?= $header['nama_desa'] ?></h1>
				<?php if ($this->session->insidega_wait == 1) : ?>
					<div class="error login-footer-top">
						<p id="countdown" style="color:red; text-transform:uppercase"></p>
					</div>
				<?php else : ?>
					<div class="form-group">
						<label for="username" class="sr-only">Username</label>
						<input name="username" type="text" class="form-control" placeholder="username" required="" autofocus="" value="" <?php jecho($this->session->insidega_wait, 1, "disabled") ?>>
					</div>
					<div class="form-group">
						<label for="password" class="sr-only">Password</label>
						<input name="password" id="password" type="password" class="form-control " placeholder="Password" required="" value="" <?php jecho($this->session->insidega_wait, 1, "disabled") ?>>
					</div>
					<div class="checkbox mb-3">
						<input type="checkbox" id="checkbox" class="form-checkbox"> Tampilkan kata sandi
					</div>
					<button type="submit" class="btn btn-primary btn-block">Let me in</button>
					<?php if ($this->session->insidega == -1 && $this->session->insidega_try < 4) : ?>
						<div class="error">
							<p style="color:red; text-transform:uppercase">Login Gagal.<br />Nama pengguna atau kata sandi yang Anda masukkan salah!<br />
								<?php if ($this->session->insidega_try) : ?>
									Kesempatan mencoba <?= ($this->session->insidega_try - 1); ?> kali lagi.</p>
						<?php endif; ?>
						</div>
					<?php elseif ($this->session->insidega == -2) : ?>
						<div class="error">
							Redaksi belum boleh masuk, SID belum memiliki sambungan internet!
						</div>
					<?php endif; ?>
				<?php endif; ?>
			</form>
		</div>
	</div>
</body>

</html>
<script>
	function start_countdown() {
		var times = eval(<?= json_encode($this->session->insidega_timeout) ?>) - eval(<?= json_encode(time()) ?>);
		var menit = Math.floor(times / 60);
		var detik = times % 60;
		timer = setInterval(function() {
			detik--;
			if (detik <= 0 && menit >= 1) {
				detik = 60;
				menit--;
			}
			if (menit <= 0 && detik <= 0) {
				clearInterval(timer);
				location.reload();
			} else {
				document.getElementById("countdown").innerHTML = "<b>Anda telah gagal sebanyak 3 kali percobaan login, silakan coba kembali dalam " + menit + " MENIT " + detik + " DETIK </b>";
			}
		}, 1000)
	}

	$('document').ready(function() {
		var pass = $("#password");
		$('#checkbox').click(function() {
			if (pass.attr('type') === "password") {
				pass.attr('type', 'text');
			} else {
				pass.attr('type', 'password')
			}
		});

		if ($('#countdown').length) {
			start_countdown();
		}
	});
</script>
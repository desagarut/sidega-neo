<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar menu-light">
	<div class="navbar-wrapper ">
		<div class="navbar-content scroll-div">

			<div>
				<div class="main-menu-header">
					<img class="img-radius" src="<?= gambar_desa($desa['logo']); ?>" alt="User-Profile-Image">
					<div class="user-details">
						<div id="more-details"><?= ucwords($this->setting->sebutan_desa . " " . $desa['nama_desa']); ?> <i class="fa fa-caret-down"></i></div>
					</div>
				</div>
				<div class="collapse" id="nav-user-link">
					<ul class="list-unstyled">
						<li class="list-group-item"><a href="<?= site_url('identitas_desa'); ?>"><i class="feather icon-user m-r-5"></i>View Profile</a></li>
						<li class="list-group-item"><a href="<?= site_url('setting'); ?>"><i class="feather icon-settings m-r-5"></i>Settings</a></li>
						<li class="list-group-item"><a href="<?= site_url('insidega/logout'); ?>"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
					</ul>
				</div>
			</div>

			<ul class="nav pcoded-inner-navbar sidenav-inner">
				<li class="nav-item pcoded-menu-caption">
					<label><a href="<?= site_url() ?>beranda">Menu</a></label>
				</li>

				<?php foreach ($modul as $mod) : ?>
					<?php if ($this->CI->cek_hak_akses('b', $mod['url'])) : ?>
						<?php if (count($mod['submodul']) == 0) : ?>
							<li class="<?= jecho($this->modul_ini, $mod['id'], 'nav-item active'); ?>">
								<a href="<?= site_url("$mod[url]"); ?>"><span class="pcoded-micon">
										<i class="fa <?= $mod['ikon']; ?>" <?= jecho($this->modul_ini, $mod['id'], 'text-aqua'); ?>></i></span><span class="pcoded-mtext"><?= $mod['modul']; ?></span>
								</a>
							</li>

						<?php else : ?>

							<li class="nav-item pcoded-hasmenu <?= jecho($this->modul_ini, $mod['id'], 'active'); ?>">
								<!--<a href="<?= site_url("$mod[url]"); ?>" class="nav-link "><span class="pcoded-micon"><i class="fa <?= $mod['ikon']; ?> <?= jecho($this->modul_ini, $mod['id'], 'text-aqua'); ?>"></i></span><span class="pcoded-mtext"><?= $mod['modul']; ?></span></a>-->
								<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="fa <?= $mod['ikon']; ?> <?= jecho($this->modul_ini, $mod['id'], 'text-aqua'); ?>"></i></span><span class="pcoded-mtext"><?= $mod['modul']; ?></span></a>
								<ul class="pcoded-submenu <?= jecho($this->modul_ini, $mod['id'], 'active'); ?>">
									<?php foreach ($mod['submodul'] as $submod) : ?>
										<li class="<?= jecho($this->sub_modul_ini, $submod['id'], 'active'); ?>"><a href="<?= site_url("$submod[url]"); ?>">
												<i class="fa <?= ($submod['ikon'] != NULL) ? $submod['ikon'] : 'fa-circle-o'; ?> <?= jecho($this->sub_modul_ini, $submod['id'], 'text-red'); ?>"></i> <?= $submod['modul']; ?></a>
										</li>
									<?php endforeach; ?>
								</ul>
							</li>
						<?php endif; ?>
					<?php endif; ?>
				<?php endforeach; ?>

			</ul>

			<div class="card text-center">
				<div class="card-block">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<img src="<?php echo base_url() . 'assets/files/logo/neosidega.fw.png'; ?>" style="width:40px" alt="" class="logo">
					<h6 class="mt-3">Selamat</h6>
					<p>Anda sedang menggunakan <br />SIDeGa Versi <?= AmbilVersi() ?></p>
					<a href="https://desagarut.id" target="_blank" class="btn btn-primary btn-sm text-white m-0">Website SIDeGa</a>
				</div>
			</div>

		</div>
	</div>
</nav>
<!-- [ navigation menu ] end -->
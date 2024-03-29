<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar> <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle"> <i class="fe fe-x"><span class="sr-only"></span></i> </a>
  <nav class="vertnav navbar navbar-light"> 
    <!-- nav bar -->
    <div class="w-100 mb-4 flex-fill text-center">
      <div class="row">
        <div class="col-md-2"> <img src="<?= gambar_desa($desa['logo']); ?>" style="width:50px" class="img-circle" alt="<?= ucwords($this->setting->sebutan_desa . " " . $desa['nama_desa']); ?>"> </div>
        <div class="col-md-10 nav-heading"> <span class="h5 mb-0 text-center">
          <?= ucwords($desa['nama_desa']); ?>
          </span>
          <p class="small text-muted mb-0">
            <?= ucwords($this->setting->sebutan_kecamatan_singkat . " " . $desa['nama_kecamatan']); ?>
          </p>
          <p class="small text-muted mb-0">
            <?= ucwords($this->setting->sebutan_kabupaten_singkat . " " . $desa['nama_kabupaten']); ?>
          </p>
        </div>
      </div>
    </div>
    <p class="text-muted nav-heading mt-4 mb-1"> <span>menu</span> </p>
    <ul class="navbar-nav flex-fill w-100 mb-2 ">
      <?php foreach ($modul as $mod) : ?>
      <?php if ($this->CI->cek_hak_akses('b', $mod['url'])) : ?>
      <?php if ($mod['submodul'] == 0) : ?>
      <li class="nav-item w-100 <?= jecho($this->modul_ini, $mod['id'], 'active'); ?>"> <a class="nav-link" href="<?= site_url("$mod[url]"); ?>"> <i class="fe <?= $mod['ikon']; ?> fe-16"></i> <span class="ml-3 item-text">
        <?= $mod['modul']; ?>
        </span> 
        </a> </li>
      <?php else : ?>
      <li class="nav-item dropdown <?= jecho($this->modul_ini, $mod['id'], 'active'); ?>"> <a href="#<?= ($mod['url']); ?>" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link"> <i class="fe <?= $mod['ikon']; ?> fe-16"></i> <span class="ml-3 item-text">
        <?= $mod['modul']; ?>
        </span> </a>
        <ul class="collapse list-unstyled pl-4 w-100 <?= jecho($this->modul_ini, $mod['id'], 'active'); ?>" id="<?= $mod['url']; ?>">
          <?php foreach ($mod['submodul'] as $submod) : ?>
          <li class="nav-item <?= jecho($this->sub_modul_ini, $submod['id'], 'active'); ?>"> <a class="nav-link pl-3" href="<?= site_url("$submod[url]"); ?>"><span class="ml-1 item-text"><i class="fe fe-check"></i>
            <?= $submod['modul']; ?>
            </span></a> </li>
          <?php endforeach; ?>
        </ul>
      </li>
      
      <?php endif; ?>
      <?php endif; ?>
      <?php endforeach; ?>
    </ul>
  </nav>
</aside>

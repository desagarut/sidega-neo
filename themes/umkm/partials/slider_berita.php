<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<section class="hero-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-12 custom-padding-right">
        <div class="slider-head">
          <div class="hero-slider">
            <?php $active = true; ?>
            <?php foreach ($slider_gambar['gambar'] as $gambar) : ?>
            <?php $file_gambar = $slider_gambar['lokasi'] . 'sedang_' . $gambar['gambar']; ?>
            <?php if(is_file($file_gambar)) : ?>
            <div class="single-slider lazy" style="background-image: url('<?php echo base_url().$slider_gambar['lokasi'].'sedang_'.$gambar['gambar']?>" alt="<?= $gambar['judul'] ?>');">
              <div class="content">
                <h4 style="color:#FFF; text-shadow: 4px 4px 4px #081828; -webkit-text-stroke: 0.25px #081828;">
                  <?= $gambar['kategori_toko'] ?>
                </h4>
                <!--<h2 style="color:#FFF; text-shadow: 5px 5px 5px #081828; -webkit-text-stroke: 0.25px #081828;">
                  <?= $gambar['judul'] ?>
                </h2>-->
                <div class="row"> <a class="" href="<?='artikel/'.buat_slug($gambar); ?>">
                  <button class="button btn btn-warning"><i class="ri-store-2-fill" style="color:#fff;"></i>
                  <?= $gambar['judul'] ?>
                  </button>
                  </a> <a href="<?='artikel/'.buat_slug($gambar); ?>" title="Selengkapnya">
                  <button class="button btn btn-success"><i class="icofont-whatsapp"></i> Baca</button>
                  </a> </div>
              </div>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
            <?php $active = false; ?>
          </div>
        </div>
      </div>
    <div class="col-lg-4 col-12">
      <div class="row">
        <div class="col-lg-12 col-md-6 col-12 md-custom-padding"> 
          <!-- Start Small Banner -->
          <div class="hero-small-banner lazy">
            <iframe style="width: 100%; height: 100%" src="https://www.youtube.com/embed/<?= $setting_desa["video"]; ?>" title="Profil Desa" frameborder="0" allow="clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <!-- End Small Banner --> 
        </div>
        <div class="col-lg-12 col-md-6 col-12" style="padding-top: 11px;"> 
          <!-- Start Small Banner -->
          <div class="hero-small-banner lazy" style="background-image: url('<?= gambar_desa($setting_desa['kantor_desa'], TRUE); ?>');">
            <div class="content">
              <div class="button"> <a class="btn" href="https://cekbansos.kemensos.go.id/">Cek Bantuan Sosial</a> </div><br/>
              <div class="button"> <a class="btn" href="https://ereg.pajak.go.id/ceknpwp">Cek NPWP</a> </div><br/>
              <div class="button"> <a class="btn" href="https://ereg.pajak.go.id/daftar">Pendaftaran NPWP</a> </div>
            </div>
          </div>
          <!-- Start Small Banner --> 
        </div>
      </div>
    </div>
  </div>
  </div>
</section>

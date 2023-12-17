<?php if ($this->CI->cek_hak_akses('u')) : ?>
  <div class="card shadow">
    <div class="card-header">
      <strong class="card-title">Menu</strong>
    </div>
    <div class="card-body py-4 mb-1">
      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link <?php compared_return($selected_nav, "peraturan", "active"); ?>" role="tab" aria-controls="v-pills-settings" aria-selected="false" href="<?= site_url('dokumen_sekretariat/clear/3') ?>">Buku Peraturan Desa</a>
        <a class="nav-link <?php compared_return($selected_nav, "keputusan", "active"); ?>" href="<?= site_url('dokumen_sekretariat/clear/2') ?>">Buku Keputusan Kepala Desa</a>
        <a class="nav-link <?php compared_return($selected_nav, "aparat", "active"); ?>" href="<?= site_url('pengurus') ?>">Buku Aparat Pemerintah Desa</a>
        <a class="nav-link <?php compared_return($selected_nav, 'inventaris', 'active'); ?>" href="<?= site_url('ba_inventaris_kekayaan') ?>">Buku Inventaris dan Kekayaan <?= ucwords($this->setting->sebutan_desa); ?></a>
        <a class="nav-link <?php compared_return($selected_nav, 'tanah_kas', 'active'); ?>" href="<?= site_url('ba_tanah_kas_desa/clear') ?>">Buku Tanah Kas <?= ucwords($this->setting->sebutan_desa); ?></a>
        <a class="nav-link <?php compared_return($selected_nav, 'tanah', 'active'); ?>" href="<?= site_url('ba_tanah_desa/clear') ?>">Buku Tanah di <?= ucwords($this->setting->sebutan_desa); ?></a>
        <a class="nav-link <?php compared_return($selected_nav, "agenda_masuk", "active"); ?>" href="<?= site_url('surat_masuk') ?>">Buku Agenda - Surat Masuk</a>
        <a class="nav-link <?php compared_return($selected_nav, "agenda_keluar", "active"); ?>" href="<?= site_url('surat_keluar') ?>">Buku Agenda - Surat Keluar</a>
        <a class="nav-link <?php compared_return($selected_nav, "ekspedisi", "active"); ?>" href="<?= site_url('ekspedisi/clear') ?>">Buku Ekspedisi</a>
        <a class="nav-link <?php compared_return($selected_nav, "lembaran", "active"); ?>" href="<?= site_url('buku_umum/lembaran_desa/clear') ?>">Buku Lembaran Desa dan Berita Desa</a>
        <a class="nav-link <?php compared_return($selected_nav, "dokumen_lainnya", "active"); ?>" href="<?= site_url('dokumen/dokumen_lainnya') ?>">Buku Peraturan Lainnya</a>
        <a class="nav-link <?php compared_return($selected_nav, "agenda", "active"); ?>" href="<?= site_url('web/tab/1000') ?>">Agenda Desa</a>
      </div>
    </div>
  </div>
<?php endif; ?>
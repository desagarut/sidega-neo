<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.js" integrity="sha512-/F8GvcdSUiYuL8wFMLRspx/PemIOOZBMiro7M9Wwn9V/wfzIH+RwIauASTQdJqaaZdSHBP4lmtq6VH5bbTNaJw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->

<div class="card shadow mb-4">
  <div class="card-body">
      <button type="button" class="btn btn-outline-info mb-1" href="<?php if ($this->CI->cek_hak_akses('u')) : ?><?= site_url('web') ?><?php endif; ?>" title="Tulis Berita"><i class="feather mr-2 icon-edit"></i>Tulis Berita</button>
      <button type="button" class="btn btn-outline-primary mb-1" href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('surat') ?><?php endif; ?>" title="Buat Surat"><i class="feather mr-2 icon-folder"></i>Buat Surat</button>
      <button type="button" class="btn btn-outline-success mb-1" href="<?php if ($this->CI->cek_hak_akses('u')) : ?><?= site_url('permohonan_surat_admin') ?><?php endif; ?>" title="permohonan surat online"><i class="feather mr-2 icon-check-circle"></i>Permohonan</button>
      <button type="button" class="btn btn-outline-warning mb-1" href="<?php if ($this->CI->cek_hak_akses('u')) : ?><?= site_url('mailbox') ?><?php endif; ?>" title="Pesan Masuk"><i class="feather mr-2 icon-message-square"></i>Pesan</button>
      <button type="button" class="btn btn-outline-info mb-1" href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('surat_masuk') ?><?php endif; ?>" title="Surat Masuk"><i class="feather mr-2 icon-mail"></i>Surat Masuk</button>
      <button type="button" class="btn btn-outline-danger mb-1" href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('mandiri') ?><?php endif; ?>" title="Pembuatan PIN Layanan Masyarakat"><i class="feather mr-2 icon-command"></i>PIN</button>
      <button type="button" class="btn btn-info mb-1" href="<?php if ($this->CI->cek_hak_akses('u')) : ?><?= site_url('komentar') ?><?php endif; ?>"><i class="feather mr-2 icon-info"></i>Info</button>
  </div>
</div>
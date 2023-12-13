<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.js" integrity="sha512-/F8GvcdSUiYuL8wFMLRspx/PemIOOZBMiro7M9Wwn9V/wfzIH+RwIauASTQdJqaaZdSHBP4lmtq6VH5bbTNaJw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->

<div class="card shadow">
  <div class="card-body">
    <a href="<?php if ($this->CI->cek_hak_akses('u')) : ?><?= site_url('web') ?><?php endif; ?>" title="Tulis Berita">
      <button type="button" class="btn btn-outline-info"><i class="feather mr-2 icon-edit"></i>Tulis Berita</button>
    </a>
    <a href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('surat') ?><?php endif; ?>" title="Buat Surat">
      <button type="button" class="btn btn-outline-primary"><i class="feather mr-2 icon-folder"></i>Buat Surat</button>
    </a>
    <a href="<?php if ($this->CI->cek_hak_akses('u')) : ?><?= site_url('permohonan_surat_admin') ?><?php endif; ?>" title="permohonan surat online">
      <button type="button" class="btn btn-outline-success"><i class="feather mr-2 icon-check-circle"></i>Permohonan</button>
    </a>
    <a href="<?php if ($this->CI->cek_hak_akses('u')) : ?><?= site_url('mailbox') ?><?php endif; ?>" title="Pesan Masuk">
      <button type="button" class="btn btn-outline-warning"><i class="feather mr-2 icon-message-square"></i>Pesan</button>
    </a>
    <a href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('surat_masuk') ?><?php endif; ?>" title="Surat Masuk">
      <button type="button" class="btn btn-outline-info"><i class="feather mr-2 icon-mail"></i>Surat Masuk</button>
    </a>
    <a href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('mandiri') ?><?php endif; ?>" title="Pembuatan PIN Layanan Masyarakat">
      <button type="button" class="btn btn-outline-danger"><i class="feather mr-2 icon-command"></i>PIN</button>
    </a>
    <!--<a class="btn btn-app" href="<?php if ($this->CI->cek_hak_akses('u')) : ?><?= site_url('komentar') ?><?php endif; ?>">
        <button type="button" class="btn btn-info"><i class="feather mr-2 icon-info"></i>Info</button>
      </a>-->
    <a href="<?php if ($this->CI->cek_hak_akses('u')) : ?><?= site_url('komentar') ?><?php endif; ?>">
      <button type="button" class="btn btn-info"><i class="feather mr-2 icon-info"></i>Info</button>
    </a>
  </div>
</div>
<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="card shadow mb-4">
  <div class="card-body">
      <button type="button" class="btn btn-outline-info mb-2" href="<?php if ($this->CI->cek_hak_akses('u')) : ?><?= site_url('web') ?><?php endif; ?>" title="Tulis Berita">Tulis Berita</button>
      <button type="button" class="btn btn-outline-info btn-sm mb-2" href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('surat') ?><?php endif; ?>" title="Buat Surat"><i class="feather mr-2 icon-folder"></i>Buat Surat</button>
      <button type="button" class="btn btn-outline-success mb-2" href="<?php if ($this->CI->cek_hak_akses('u')) : ?><?= site_url('permohonan_surat_admin') ?><?php endif; ?>" title="permohonan surat online">Permohonan</button>
      <button type="button" class="btn btn-outline-warning mb-2" href="<?php if ($this->CI->cek_hak_akses('u')) : ?><?= site_url('mailbox') ?><?php endif; ?>" title="Pesan Masuk">Pesan</button>
      <button type="button" class="btn btn-outline-info mb-2" href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('surat_masuk') ?><?php endif; ?>" title="Surat Masuk">Surat Masuk</button>
      <button type="button" class="btn btn-outline-danger btn-sm mb-2" href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('mandiri') ?><?php endif; ?>" title="Pembuatan PIN Layanan Masyarakat">PIN</button>
      <button type="button" class="btn btn-info mb-2" href="<?php if ($this->CI->cek_hak_akses('u')) : ?><?= site_url('komentar') ?><?php endif; ?>">Info</button>
  </div>
</div>
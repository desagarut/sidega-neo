<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$towa = $this->db->query('SELECT COUNT(id) AS jumlah FROM tbl_toko_warga WHERE parrent = 0 AND enabled = 1')->result_array()[0]['jumlah'];
$tawa = $this->db->query('SELECT COUNT(id) AS jumlah FROM tbl_tawa WHERE parrent = 0 AND enabled = 1')->result_array()[0]['jumlah'];
$tukang = $this->db->query('SELECT COUNT(id) AS jumlah FROM tbl_tukang WHERE parrent = 0 AND enabled = 1')->result_array()[0]['jumlah'];
$wisata = $this->db->query('SELECT COUNT(id) AS jumlah FROM tbl_wisata WHERE parrent = 0 AND enabled = 1')->result_array()[0]['jumlah'];
?>

<div class="card">
        <div class="card-body">
                <a href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('toko_warga') ?><?php endif; ?>" title="Toko Warga"><button type="button" class="btn btn-danger">Toko <span class="badge badge-light"> <?= number_format($towa, 0, '', '.') ?></span></button></a>
                <a href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('tawa') ?><?php endif; ?>" title="Transportasi Warga"><button type="button" class="btn btn-success">Transportasi <span class="badge badge-light"> <?= number_format($tawa, 0, '', '.') ?></span></button></a>
                <a href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('tukang') ?><?php endif; ?>" title="Pertukangan"><button type="button" class="btn btn-warning">Pertukangan <span class="badge badge-light"> <?= number_format($tukang, 0, '', '.') ?></span></button></a>
                <a href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('wisata') ?><?php endif; ?>" title="Pariwisata"><button type="button" class="btn btn-info">Wisata <span class="badge badge-light"> <?= number_format($wisata, 0, '', '.') ?></span></button></a>
        </div>
</div>
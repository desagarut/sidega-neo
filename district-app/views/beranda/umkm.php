<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$towa = $this->db->query('SELECT COUNT(id) AS jumlah FROM tbl_toko_warga WHERE parrent = 0 AND enabled = 1')->result_array()[0]['jumlah'];
$tawa = $this->db->query('SELECT COUNT(id) AS jumlah FROM tbl_tawa WHERE parrent = 0 AND enabled = 1')->result_array()[0]['jumlah'];
$tukang = $this->db->query('SELECT COUNT(id) AS jumlah FROM tbl_tukang WHERE parrent = 0 AND enabled = 1')->result_array()[0]['jumlah'];
$wisata = $this->db->query('SELECT COUNT(id) AS jumlah FROM tbl_wisata WHERE parrent = 0 AND enabled = 1')->result_array()[0]['jumlah'];
?>
<!--
<div class="card">
        <div class="card-body">
                <a href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('toko_warga') ?><?php endif; ?>" title="Toko Warga"><button type="button" class="btn btn-danger">Toko <span class="badge badge-light"> <?= number_format($towa, 0, '', '.') ?></span></button></a>
                <a href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('tawa') ?><?php endif; ?>" title="Transportasi Warga"><button type="button" class="btn btn-success">Transportasi <span class="badge badge-light"> <?= number_format($tawa, 0, '', '.') ?></span></button></a>
                <a href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('tukang') ?><?php endif; ?>" title="Pertukangan"><button type="button" class="btn btn-warning">Pertukangan <span class="badge badge-light"> <?= number_format($tukang, 0, '', '.') ?></span></button></a>
                <a href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('wisata') ?><?php endif; ?>" title="Pariwisata"><button type="button" class="btn btn-info">Wisata <span class="badge badge-light"> <?= number_format($wisata, 0, '', '.') ?></span></button></a>
        </div>
</div>
                -->
<div class="card shadow mb-4">
        <div class="card-header">
                <strong>UMKM</strong>
        </div>
        <div class="card-body">
                <!--<div class="mb-2">
                        <div id="pieChartWidget"></div>
                </div>-->
                <div class="row mt-2">
                        <div class="col-3 text-center">
                                <div class="circle circle-md bg-light">
                                <span class="fe fe-shopping-bag fe-24 text-muted"></span>
                                </div>
                                <div class="mt-2">
                                        <strong> <?= number_format($towa, 0, '', '.') ?></strong><br />
                                        <span class="my-0 text-muted small"><a href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('toko_warga') ?><?php endif; ?>">ToWa</a></span>
                                </div>
                        </div>
                        <div class="col-3 text-center">
                                <div class="circle circle-md bg-light">
                                        <span class="fe fe-truck fe-24 text-muted"></span>
                                </div>
                                <div class="mt-2">
                                        <strong> <?= number_format($tawa, 0, '', '.') ?></strong><br />
                                        <span class="my-0 text-muted small"><a href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('tawa') ?><?php endif; ?>">Tawa</a></span>
                                </div>
                        </div>
                        <div class="col-3 text-center">
                                <div class="circle circle-md bg-light">
                                        <span class="fe fe-tool fe-24 text-muted"></span>
                                </div>
                                <div class="mt-2">
                                        <strong><?= number_format($tukang, 0, '', '.') ?></strong><br />
                                        <span class="my-0 text-muted small"><a href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('tukang') ?><?php endif; ?>">Tukang</a></span>
                                </div>
                        </div>
                        <div class="col-3 text-center">
                                <div class="circle circle-md bg-light">
                                        <span class="fe fe-sunrise fe-24 text-muted"></span>
                                </div>
                                <div class="mt-2">
                                        <strong><?= number_format($wisata, 0, '', '.') ?></strong><br />
                                        <span class="my-0 text-muted small"><a href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('wisata'); ?><?php endif; ?>">Wisata</a></span>
                                </div>
                        </div>
                </div>
        </div> <!-- card-body -->
</div> <!-- .card -->
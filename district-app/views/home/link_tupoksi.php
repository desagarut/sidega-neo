<div class="card">
    <div class="card-body">
        <a href="<?php if ($this->CI->cek_hak_akses('u')) : ?><?= site_url('penduduk/clear') ?><?php endif; ?>" title="Pemerintahan"><button type="button" class="btn btn-outline-primary">Pemerintahan</button></a>
        <a href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('pembangunan') ?><?php endif; ?>" title="Pembangunan"><button type="button" class="btn btn-outline-primary">Pembangunan</button></a>
        <a href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('pemberdayaan_masyarakat') ?><?php endif; ?>" title="Pemberdayaan Masyarakat"><button type="button" class="btn btn-outline-danger">Pemberdayaan</button></a>
        <a href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('pembinaan_masyarakat') ?><?php endif; ?>" title="Pembinaan Kemasyarakatan"><button type="button" class="btn btn-outline-danger">Pembinaan</button></a>
        <a href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('bidang_bencana_darurat_mendesak') ?><?php endif; ?>" title="Kebencanaan"><button type="button" class="btn btn-outline-warning">Kebencanaan</button></a>
        <a href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('#') ?><?php endif; ?>" title="Tupoksi"><button type="button" class="btn btn-outline-info">Tupoksi</button></a>
    </div>
</div>
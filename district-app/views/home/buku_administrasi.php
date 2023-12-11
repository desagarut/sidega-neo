    <div class="card card-success card-solid">
        <div class="card-header">
            <h3 class="card-title">Buku Administrasi Desa</h3>
            <div class="card-tools pull-right">
                <span class="label label-danger"> New</span>
                <button type="button" class="btn btn-card-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-card-tool" data-widget="remove"><i class="fa fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body text-center">
            <div class="card-body">
                <a class="btn btn-app" href="<?php if ($this->CI->cek_hak_akses('u')) : ?><?= site_url('surat_masuk') ?><?php endif; ?>" title="Tulis Berita"><i class="fa fa-info text-blue"></i>Umum</a>
                <a class="btn btn-app" href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('ba_penduduk_induk/clear') ?><?php endif; ?>" title="Buat Surat"> <i class="fa fa-users text-green"></i> Kependudukan</a>
                <a class="btn btn-app" href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('ba_rencana_pembangunan') ?><?php endif; ?>" title="Surat Masuk"><span class="badge bg-aqua"></span><i class="fa fa-building text-orange"></i> Pembangunan </a>
            </div>
        </div>
    </div>
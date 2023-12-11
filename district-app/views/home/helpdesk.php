<div class="card">
    <div class="card-header">
        <h5>Helpdesk</h5>
        <div class="card-header-right">
            <div class="btn-group card-option">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="feather icon-more-horizontal"></i> </button>
                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                    <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card-body">
        <a href="<?= site_url('webmail') ?>" target="_blank"><img src="<?= base_url("assets/files/logo/email.fw.png") ?>" class="img-fluid responsive" width="70px" height="70px" alt=""></a>
        <a href="https://help.desagarut.id" target="_blank"><img src="<?= base_url("assets/files/logo/helpdesk.fw.png") ?>" class="img-fluid responsive" width="70px" height="70px" alt=""></a>
        <a href="https://chat.whatsapp.com/IR2VtLpT2Fx0ujlNMm3nD9" target="_blank"><img src="<?= base_url("assets/files/logo/whatsapp.fw.png") ?>" class="img-fluid responsive" width="70px" height="70px" alt="Whatsapp Komunitas Desa Garut"></a>
        <a href="https://kecamatancisompet.id" target="_blank"><img src="<?= base_url("assets/files/logo/pemda_garut.png") ?>" class="img-fluid responsive" width="70px" height="70px" alt="Dashboard Kecamatan"></a>
    </div>
    <div class="card-footer text-center">
        <p><i>Gunakan email & password untuk login ke halaman <strong>Email, Helpdesk dan Dashboard Kecamatan</strong><br />
                <strong>Klik </strong>salah satu icon di atas untuk menuju halaman login</i></p>
        <p class="text-left">
            <i>Email : </i>
            <strong class="pull-right"> <?= $setting_desa['email_desa']; ?></strong><br />
            <i>Password : </i>
            <strong class="pull-right"> @Desagarut.id</strong>

        </p>
    </div>
</div>
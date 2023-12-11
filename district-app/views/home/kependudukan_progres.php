<div class="row">
  <div class="col-md-12">
    <div class="card shadow mb-4">
      <div class="card-header">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="h6 mb-0">Progres Kependudukan</h3>
          </div>
          <div class="col-auto">
            <a class="small text-muted" href="#!">View all</a>
          </div>
        </div>
      </div>
      <div class="card-body my-n2">
        <?php
        if (isset($data_ktp)) {
          $d = $data_ktp->row();
        ?>
          <div class="row align-items-center my-2">
            <div class="col">
              <strong>KTP </strong>
              <div class="my-0 text-muted small">Elektronik</div>
            </div>
            <div class="col-auto">
              <small><?= $d->ktp_el_ya ?>/<?= $d->penduduk_total ?></small><br/>
              <strong><?= $d->persentase_ktp_el ?>%</strong>
            </div>
            <div class="col-3">
              <div class="progress" style="height: 4px;">
                <div class="progress-bar" role="progressbar" style="width: <?= $d->persentase_ktp_el ?>%" aria-valuenow="<?= $d->persentase_ktp_el ?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
          <div class="row align-items-center my-2">
            <div class="col">
              <strong>FOTO</strong>
              <div class="my-0 text-muted small">Penduduk</div>
            </div>
            <div class="col-auto">
              <strong>+75%</strong>
            </div>
            <div class="col-3">
              <div class="progress" style="height: 4px;">
                <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
          <div class="row align-items-center my-2">
            <div class="col">
              <strong>Dokumen</strong>
              <div class="my-0 text-muted small">KTP</div>
            </div>
            <div class="col-auto">
              <strong><?= $d->persentase_dokumen ?>%</strong>
            </div>
            <div class="col-3">
              <div class="progress" style="height: 4px;">
                <div class="progress-bar" role="progressbar" style="width: <?= $d->persentase_dokumen ?>%" aria-valuenow="<?= $d->persentase_dokumen ?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
          <div class="row align-items-center my-2">
            <div class="col">
              <strong>PETA</strong>
              <div class="my-0 text-muted small">Rumah</div>
            </div>
            <div class="col-auto">
              <strong><?= $d->persentase_lokasi ?>%</strong>
            </div>
            <div class="col-3">
              <div class="progress" style="height: 4px;">
                <div class="progress-bar" role="progressbar" style="width: <?= $d->persentase_lokasi ?>%" aria-valuenow="<?= $d->persentase_lokasi ?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        <?php
        }
        ?>

      </div>
    </div> <!-- .card -->
  </div> <!-- .col-md -->
</div>


<!--
<div class="card">
  <div class="card-header">
    <h5>Progres Kependudukan</h5>
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

  <?php
  if (isset($data_ktp)) {
    $d = $data_ktp->row();
  ?>

    <div class="card-body">
      <!-- /.progress-group -->
<!--
      <div class="progress-group">
        <span class="progress-text">KTP Elektronik </span>
        <span class="progress-number">
          <?= $d->ktp_el_ya ?>/<?= $d->penduduk_total ?> <b>(<?= $d->persentase_ktp_el ?>%)</b> </span>

        <div class="progress sm">
          <div class="progress-bar progress-bar-red" style="width: <?= $d->persentase_ktp_el ?>%"></div>
        </div>
      </div>

      <div class="progress-group">
        <span class="progress-text">Foto Penduduk</span>
        <span class="progress-number"><?= $d->foto_y ?>/<?= $d->penduduk_total ?> <b>(<?= $d->persentase_foto ?>%)</b></span>
        <div class="progress sm">
          <div class="progress-bar progress-bar-aqua" style="width: <?= $d->persentase_foto ?>%"></div>
        </div>
      </div>
      <!-- /.progress-group -->
<!--<div class="progress-group">
          <span class="progress-text">Arsip Dokumen </span>
          <span class="progress-number"><b><?= $d->ktp_el_ya ?></b>/<?= $d->penduduk_total ?> <b>(<?= $d->persentase_ktp_el ?>%)</b></span>

          <div class="progress sm">
            <div class="progress-bar progress-bar-green" style="width: 80%"></div>
          </div>
        </div>-->
<!-- /.progress-group -->
<!--
      <div class="progress-group">
        <span class="progress-text">Foto Rumah </span>
        <span class="progress-number"><?= $d->rumah_y ?>/<?= $d->penduduk_total ?> <b>(<?= $d->persentase_rumah ?>%)</b></span>

        <div class="progress sm">
          <div class="progress-bar progress-bar-green" style="width: <?= $d->persentase_rumah ?>%"></div>
        </div>
      </div>
      <!-- /.progress-group -->
<!-- /.progress-group -->
<!--
      <div class="progress-group">
        <span class="progress-text">Peta Lokasi Rumah </span>
        <span class="progress-number"><?= $d->lokasi_y ?>/<?= $d->penduduk_total ?> <b>(<?= $d->persentase_lokasi ?>%)</b></span>

        <div class="progress sm">
          <div class="progress-bar progress-bar-yellow" style="width: <?= $d->persentase_lokasi ?>%"></div>
        </div>
      </div>
      <!-- /.progress-group -->
<!--
    </div>
  <?php
  }
  ?>
</div>-->
<div class="content-wrapper">
  <section class="content-header">
    <h1>Detil Data Balita</h1>
    <ol class="breadcrumb">
      <li><a href="<?= site_url('beranda') ?>"><i class="fe fe-home"></i> Home</a></li>
      <li><a href="<?= site_url('kesehatan_balita') ?>"><i class="fe fe-home"></i> Kesehatan</a></li>
      <li class="active">Data Balita</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div id="kesehatan" class="col-sm-2">
        <?php $this->load->view('kesehatan/balita/menu') ?>
      </div>
      <div class="col-md-10">
        <div class="row">
          <div class="col-md-12">
            <div class="card shadow">

              <div class="card-header">
                <a href="<?= site_url('kesehatan_balita') ?>" class="btn btn-info btn-sm "><i class="fe fe-arrow-circle-left"></i> Kembali Ke Data Balita</a>
                <?php if ($penduduk['id_status'] === '2' or $penduduk['id_status'] === '3') : ?>
                  <a href="#" class="btn btn-social btn-success btn-sm" data-toggle="modal" data-target="#edit-warga">
                    <i class="fe fe-edit"></i>
                    Ubah Data Penduduk Non Domisili
                  </a>
                <?php endif ?>
              </div>

              <div class="card-header">
                <h3 class="box-title">Detil Data Balita</h3>
              </div>


              <div class="box-body">
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <td style="padding-top : 10px;padding-bottom : 10px;width:20%;">NIK /Nama</td>
                        <td><b> <?= $terdata["terdata_nama"] . " / " . $terdata["terdata_nik"] ?></b></td>
                      </tr>
                      <tr>
                        <td style="padding-top : 10px;padding-bottom : 10px;width:20%;">Alamat</td>
                        <td> <?= $individu['alamat_wilayah']; ?> </td>
                      </tr>
                      <tr>
                        <td style="padding-top : 10px;padding-bottom : 10px;width:20%;">Tempat Tanggal Lahir (Umur)</td>
                        <td> <?= $individu['tempatlahir'] ?> <?= tgl_indo($individu['tanggallahir']) ?> (<?= $individu['umur'] ?> Tahun) </td>
                      </tr>
                      <tr>
                        <td style="padding-top : 10px;padding-bottom : 10px;width:20%;">Pendidikan</td>
                        <td> <?= $individu['pendidikan'] ?> </td>
                      </tr>
                      <tr>
                        <td style="padding-top : 10px;padding-bottom : 10px;width:20%;">Warganegara / Agama</td>
                        <td> <?= $individu['warganegara'] ?> / <?= $individu['agama'] ?> </td>
                      </tr>
                      <tr>
                        <td style="padding-top : 10px;padding-bottom : 10px;">Puskesmas</td>
                        <td> <?= $terdata["nama_puskesmas"] ?></td>
                      </tr>
                      <tr>
                        <td style="padding-top : 10px;padding-bottom : 10px;">Posyandu</td>
                        <td> <?= $terdata["nama_posyandu"] ?></td>
                      </tr>

                      <tr>
                        <td style="padding-top : 10px;padding-bottom : 10px;">Tanggal Terdaftar</td>
                        <td> <?= $terdata["tanggal_terdaftar"] ?></td>
                      </tr>
                      <tr>
                        <td style="padding-top : 10px;padding-bottom : 10px;">Berat Badan Lahir</td>
                        <td> <?= $terdata["bb_lahir"] ?></td>
                      </tr>
                      <tr>
                        <td style="padding-top : 10px;padding-bottom : 10px;">Tinggi Badan Lahir</td>
                        <td> <?= $terdata["tb_lahir"] ?></td>
                      </tr>
                      <tr>
                        <td style="padding-top : 10px;padding-bottom : 10px;">HP Orang Tua</td>
                        <td> <?= $terdata["hp_ortu"] ?></td>
                      </tr>
                      <tr>
                        <td style="padding-top : 10px;padding-bottom : 10px;">Email Orang Tua</td>
                        <td> <?= $terdata["email_ortu"] ?></td>
                      </tr>
                      <tr>
                        <td style="padding-top : 10px;padding-bottom : 10px;">Riwayat Penyakit</td>
                        <td> <?= $terdata["riwayat_penyakit"] ?></td>
                      </tr>
                      <tr>
                        <td style="padding-top : 10px;padding-bottom : 10px;">Keterangan</td>
                        <td> <?= $terdata["keterangan"] ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

            </div>
          </div>
        </div>
  </section>
</div>

<div class='modal fade' id='edit-warga' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
        <h4 class='modal-title' id='myModalLabel'><i class='fe fe-plus text-green'></i> Ubah Penduduk Pendatang / Tidak Tetap</h4>
      </div>

      <div class='modal-body'>
        <div class="row">
          <?php include("district-app/views/covid19/form_isian_penduduk.php"); ?>
        </div>
      </div>

      <div class='modal-footer'>
        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal"><i class='fe fe-sign-out'></i> Tutup</button>
        <a class='btn-ok'>
          <button type="submit" class="btn btn-success btn-sm" onclick="$('#'+'form_penduduk').submit();"><i class='fe fe-trash'></i> Simpan</button>
        </a>
      </div>
    </div>
  </div>
</div>
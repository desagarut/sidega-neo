<main role="main" class="main-content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="row align-items-center mb-2">
          <div class="col">
            <h2 class="h5 page-title">Detail Penduduk</h2>
          </div>
          <div class="col-auto">
            <?php if ($this->CI->cek_hak_akses('h')) : ?>
              <a href="<?= site_url("penduduk/dokumen/$penduduk[id]") ?>" class="btn btn-primary mb-2" title="Manajemen Dokumen Penduduk"><i class="fe fe-file"></i> Manajemen Dokumen</a>
              <!--<a href="<?= site_url("penduduk/rumah/$penduduk[id]") ?>" class="btn btn-success btn-sm " title="Rumah Penduduk" ><i class="fe fe-book"></i> Rumah Penduduk</a>-->
              <?php if ($penduduk['status_dasar_id'] == 1) : ?>
                <a href="<?= site_url("penduduk/form/$p/$o/$penduduk[id]") ?>" class="btn btn-warning mb-2" title="Ubah Biodata"><i class="fe fe-edit"></i> Ubah Biodata</a>
              <?php endif; ?>
            <?php endif; ?>
            <a href="<?= site_url("penduduk/cetak_biodata/$penduduk[id]") ?>" class="btn btn-outline-primary mb-2" title="Cetak Biodata" target="_blank"><i class="fe fe-printer"></i>Cetak Biodata</a>
            <?php if ($penduduk['status_dasar_id'] == 1 and !empty($penduduk['id_kk'])) : ?>
              <a href="<?= site_url("keluarga/anggota/$p/$o/$penduduk[id_kk]") ?>" class="btn btn-outline-primary mb-2" title="Anggota Keluarga"><i class="fe fe-users"></i> Anggota Keluarga</a>
            <?php endif; ?>
            <a href="<?= site_url("penduduk/clear") ?>" class="btn btn-outline-primary mb-2" title="Kembali Ke Daftar Penduduk"> <i class="fe fe-arrow-circle-left"></i>Kembali Ke Daftar Penduduk </a>
          </div>
        </div>

        <form id="mainform" name="mainform" action="" method="post">
          <div class="row">
            <div class="col-md-3">
              <!-- Profile Image -->
              <div class="card shadow mb-2">
                <div class="card-body">
                  <div class="row mt-5 align-items-center">
                    <div class="col-md-12 text-center mb-5">
                      <div class="avatar avatar-xl mb-2">
                        <img class="avatar-img rounded-circle" src="<?= AmbilFoto($penduduk['foto'], '', $penduduk['id_sex']) ?>" alt="Foto Penduduk">
                      </div>
                      <h3 class="profile-username text-center">
                        <?= strtoupper($penduduk['nama']) ?>
                      </h3>
                      <p class="text-center">
                        <?= strtoupper($penduduk['sex']) ?><br />
                        <?= strtoupper($penduduk['umur']) ?> Tahun<br />
                        NIK: <?= $penduduk['nik'] ?><br />
                        KK : <?= $penduduk['no_kk'] ?><br />
                        Alamat: <?= strtoupper($penduduk['alamat']) ?>, RT. <?= strtoupper($penduduk['rt']) ?> RW. <?= strtoupper($penduduk['rw']) ?> Wilayah/Dusun <?= $penduduk['dusun'] ?>
                        Telepon: <?= $penduduk['telepon'] ?><br />
                        Email: <?= $penduduk['telepon'] ?><br />
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-9">
              <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link" id="biodata-tab" data-toggle="tab" href="#biodata" role="tab" aria-controls="biodata" aria-selected="false">Biodata</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="keluarga-tab" data-toggle="tab" href="#keluarga" role="tab" aria-controls="Keluarga" aria-selected="false">Keluarga</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="dokumen-tab" data-toggle="tab" href="#dokumen" role="tab" aria-controls="dokumen" aria-selected="false">Dokumen</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="rumah-tab" data-toggle="tab" href="#rumah" role="tab" aria-controls="rumah" aria-selected="false">Rumah</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="bantuan-tab" data-toggle="tab" href="#bantuan" role="tab" aria-controls="bantuan" aria-selected="false">Bantuan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" id="resume-tab" data-toggle="tab" href="#resume" role="tab" aria-controls="resume" aria-selected="true">Resume</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="resume" role="tabpanel" aria-labelledby="resume-tab">
                  <div class="active tab-pane" id="resume">
                    <!-- The Resume -->
                    <div class="card shadow mb-2">
                      <div class="card-header">
                        <strong class="card-title">Lokasi</strong>
                        <a class="float-right small text-muted" href="<?= site_url('gis/clear') ?>">Peta</a>
                      </div>

                      <div class="card-body">
                        <?php $this->load->view($folder_themes . '/sid/kependudukan/penduduk_map.php') ?>
                      </div>
                      <div class="card-footer" align="right">
                        <label>Lat: </label>
                        <input type="text" disabled="disabled" name="lat" id="lat" value="<?= $penduduk_map['lat'] ?>" />
                        <label>Lng: </label>
                        <input type="text" disabled="disabled" name="lng" id="lng" value="<?= $penduduk_map['lng'] ?>" />
                        <a href="<?= site_url("penduduk/ajax_penduduk_maps_koordinat/$p/$o/$penduduk[id]/1") ?>" title="Lokasi <?= $penduduk['nama'] ?>" class="btn btn-outline-primary btn-sm" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Input Koordinat Rumah : <?= strtoupper($penduduk['nama']) ?>"><i class='fe fe-map-marker'></i> Ubah Koordinat</a> <a href="<?= site_url("penduduk/ajax_penduduk_maps_openstreet/$p/$o/$penduduk[id]/1") ?>" title="Lokasi <?= $penduduk['nama'] ?>" class="btn  bg-navy btn-sm"><i class='fe fe-map-o'></i> Ubah di Openstreet</a> <a href="<?= site_url("penduduk/ajax_penduduk_maps_google/$p/$o/$penduduk[id]/1") ?>" title="Lokasi <?= $penduduk['nama'] ?>" class="btn btn-primary btn-sm" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Lokasi Rumah"><i class='fe fe-google'></i> Ubah di GoogleMap</a>
                      </div>
                    </div>
                    <div class="card shadow mb-2">
                      <div class="card-header">
                        <strong class="card-title">Foto Rumah</strong>
                        <a class="float-right small text-muted" href="#!"></a>
                      </div>
                      <div class="card-body">
                        <table class="table table-bordered table-striped table-hover detail">
                          <tr>
                            <th class="padat">No</th>
                            <th width="10%">Aksi</th>
                            <th width="40%">Nama </th>
                            <th width="50%">Foto</th>
                            <!--<th width="15%">File</th>
                                  <th width="15%">Tanggal Upload</th>-->
                          </tr>
                          <?php foreach ($list_rumah as $key => $data) : ?>
                            <tr>
                              <td class="text-center"><?= $key + 1; ?></td>
                              <td nowrap><a href="<?= base_url() . LOKASI_RUMAH ?><?= urlencode($data['satuan']) ?>" class="btn bg-primary btn-card btn-sm" rel=”noopener noreferrer” target="_blank" title="Buka Rumah"><i class="fe fe-eye"></i></a></br>
                                <?php if (!$data['hidden']) : ?>
                                  <a href="<?= site_url("penduduk/rumah_form/$penduduk[id]/$data[id]") ?>" class="btn bg-orange btn-card btn-sm" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Data" title="Ubah Data" title="Ubah Data"><i class="fe fe-edit"></i></a></br>
                                  <a href="#" data-href="<?= site_url("penduduk/delete_rumah/$penduduk[id]/$data[id]") ?>" class="btn bg-maroon btn-card btn-sm" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash-o"></i></a>
                                <?php endif ?>
                              </td>
                              <td><?= $data['nama'] ?>
                                <br />
                                Tanggal Upload:
                                <?= tgl_indo2($data['tgl_upload']); ?>
                              </td>
                              <td><img class="avatar-img rounded-circle" src="<?= base_url() . LOKASI_RUMAH ?><?= urlencode($data['satuan']); ?>" alt="Foto Rumah Penduduk"></td>
                              <!--<td><a href="<?= base_url() . LOKASI_RUMAH ?><?= urlencode($data['satuan']); ?>" >
                                    <?= $data['satuan']; ?>
                                    </a></td>
                                  <td><?= tgl_indo2($data['tgl_upload']); ?></td>-->
                            </tr>
                          <?php endforeach; ?>
                        </table>
                      </div>
                      <div class="card-footer" align="right"> <a href="<?= site_url("penduduk/rumah/$penduduk[id]") ?>" class="btn bg-maroon 	btn-danger btn-sm " title="Hapus Rumah"><i class="fe fe-trash-o"></i>Hapus Rumah</a> <a href="<?= site_url("penduduk/rumah_form/$penduduk[id]") ?>" title="Tambah rumah" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Tambah rumah" class="btn  bg-olive btn-sm "><i class='fe fe-plus'></i>Tambah rumah</a> </div>
                    </div>

                    <div class="card shadow mb-2">
                      <div class="card-header">
                        <strong class="card-title">Program Bantuan</strong>
                      </div>
                      <div class="card-body">
                        <table class="table table-striped table-hover">
                          <tr>
                            <th class="padat">No</th>
                            <th>Waktu / Tanggal</th>
                            <th>Nama Program</th>
                            <th>Keterangan</th>
                          </tr>
                          <?php foreach ($program['programkerja'] as $key => $item) : ?>
                            <tr>
                              <td class="text-center"><?= $key + 1 ?></td>
                              <td><?= fTampilTgl($item["sdate"], $item["edate"]); ?></td>
                              <td><a href="<?= site_url("program_bantuan/data_peserta/$item[peserta_id]"); ?>">
                                  <?= $item["nama"]; ?>
                                </a></td>
                              <td><?= $item["ndesc"]; ?></td>
                            </tr>
                          <?php endforeach; ?>
                        </table>
                      </div>
                      <div class="card-footer"> </div>
                    </div>

                    <div class="card card-success">
                      <div class="card-header">
                        <strong><i class="fe fe-file-text-o margin-r-5"></i> Catatan:</strong> <br>
                        <p class="kecil"> Terdaftar pada:
                          <?= tgl_indo2($penduduk['created_at']); ?> | Oleh: <?= $penduduk['nama_pendaftar'] ?>
                        </p>
                        <p class="kecil"> Terakhir diubah: <?= tgl_indo2($penduduk['updated_at']); ?> | Oleh: <?= $penduduk['nama_pengubah'] ?>
                        </p>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="tab-pane fade show" id="biodata" role="tabpane1" aria-labelledby="biodata-tab">
                  <div class="post">
                    <div class="user-block">
                      <table class="table">
                        <tbody>
                          <tr>
                            <td width="300">Nama</td>
                            <td width="1">:</td>
                            <td>
                              <h4><strong><?= strtoupper($penduduk['nama']) ?></strong></h4>
                            </td>
                          </tr>
                          <tr>
                            <td>Status Dasar</td>
                            <td>:</td>
                            <td><span class="<?= ($penduduk['status_dasar_id'] != 1) ? 'label label-danger' : '' ?>"><strong>
                                  <?= strtoupper($penduduk['status_dasar']) ?>
                                </strong></span></td>
                          </tr>
                          <tr>
                            <td>Status Kepemilikan KTP</td>
                            <td>:</td>
                            <td>
                              <table class="table">
                                <tr>
                                  <th>Wajib KTP</th>
                                  <th>KTP-EL</th>
                                  <th>Status Rekam</th>
                                  <th>Tag ID Card</th>
                                </tr>
                                <tr>
                                  <td><?= strtoupper($penduduk['wajib_ktp']) ?></td>
                                  <td><?= strtoupper($penduduk['ktp_el']) ?></td>
                                  <td><?= strtoupper($penduduk['status_rekam']) ?></td>
                                  <td><?= $penduduk['tag_id_card'] ?></td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                          <tr>
                            <td>Nomor Kartu Keluarga</td>
                            <td>:</td>
                            <td><?= $penduduk['no_kk'] ?>
                              <?php if ($penduduk['status_dasar_id'] <> '1' and $penduduk['no_kk'] <> $penduduk['log_no_kk']) : ?>
                                (waktu peristiwa {
                                <?= $penduduk['status_dasar'] ?>
                                }: {
                                <?= $penduduk['log_no_kk'] ?>
                                })
                              <?php endif; ?></td>
                          </tr>
                          <tr>
                            <td>Nomor KK Sebelumnya</td>
                            <td>:</td>
                            <td><?= $penduduk['no_kk_sebelumnya'] ?></td>
                          </tr>
                          <tr>
                            <td>Hubungan Dalam Keluarga</td>
                            <td>:</td>
                            <td><?= $penduduk['hubungan'] ?></td>
                          </tr>
                          <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td><?= strtoupper($penduduk['sex']) ?></td>
                          </tr>
                          <tr>
                            <td>Agama</td>
                            <td>:</td>
                            <td><?= strtoupper($penduduk['agama']) ?></td>
                          </tr>
                          <tr>
                            <td>Status Penduduk</td>
                            <td>:</td>
                            <td><?= strtoupper($penduduk['status']) ?></td>
                          </tr>
                          <tr>
                            <th colspan="3" class="subtitle_head"><strong>DATA KELAHIRAN</strong></th>
                          </tr>
                          <tr>
                            <td>Akta Kelahiran</td>
                            <td>:</td>
                            <td><?= strtoupper($penduduk['akta_lahir']) ?></td>
                          </tr>
                          <tr>
                            <td>Tempat / Tanggal Lahir</td>
                            <td>:</td>
                            <td><?= strtoupper($penduduk['tempatlahir']) ?>
                              /
                              <?= strtoupper($penduduk['tanggallahir']) ?></td>
                          </tr>
                          <tr>
                            <td>Tempat Dilahirkan</td>
                            <td>:</td>
                            <td><?= $penduduk['tempat_dilahirkan_nama'] ?></td>
                          </tr>
                          <tr>
                            <td>Jenis Kelahiran</td>
                            <td>:</td>
                            <td><?= $penduduk['jenis_kelahiran_nama'] ?></td>
                          </tr>
                          <tr>
                            <td>Kelahiran Anak Ke</td>
                            <td>:</td>
                            <td><?= $penduduk['kelahiran_anak_ke'] ?></td>
                          </tr>
                          <tr>
                            <td>Penolong Kelahiran</td>
                            <td>:</td>
                            <td><?= $penduduk['penolong_kelahiran_nama'] ?></td>
                          </tr>
                          <tr>
                            <td>Berat Lahir</td>
                            <td>:</td>
                            <td><?= $penduduk['berat_lahir'] ?>
                              Gram</td>
                          </tr>
                          <tr>
                            <td>Panjang Lahir</td>
                            <td>:</td>
                            <td><?= $penduduk['panjang_lahir'] ?>
                              cm</td>
                          </tr>
                          <tr>
                            <th colspan="3" class="subtitle_head"><strong>PENDIDIKAN DAN PEKERJAAN</strong></th>
                          </tr>
                          <tr>
                            <td>Pendidikan dalam KK</td>
                            <td>:</td>
                            <td><?= strtoupper($penduduk['pendidikan_kk']) ?></td>
                          </tr>
                          <tr>
                            <td>Pendidikan sedang ditempuh</td>
                            <td>:</td>
                            <td><?= strtoupper($penduduk['pendidikan_sedang']) ?></td>
                          </tr>
                          <tr>
                            <td>Pekerjaan</td>
                            <td>:</td>
                            <td><?= strtoupper($penduduk['pekerjaan']) ?></td>
                          </tr>
                          <tr>
                            <th colspan="3" class="subtitle_head"><strong>DATA KEWARGANEGARAAN</strong></th>
                          </tr>
                          <tr>
                            <td>Warga Negara</td>
                            <td>:</td>
                            <td><?= strtoupper($penduduk['warganegara']) ?></td>
                          </tr>
                          <tr>
                            <td>Nomor Paspor</td>
                            <td>:</td>
                            <td><?= strtoupper($penduduk['dokumen_pasport']) ?></td>
                          </tr>
                          <tr>
                            <td>Tanggal Berakhir Paspor</td>
                            <td>:</td>
                            <td><?= strtoupper($penduduk['tanggal_akhir_paspor']) ?></td>
                          </tr>
                          <tr>
                            <td>Nomor KITAS/KITAP</td>
                            <td>:</td>
                            <td><?= strtoupper($penduduk['dokumen_kitas']) ?></td>
                          </tr>
                          <tr>
                            <th colspan="3" class="subtitle_head"><strong>ORANG TUA</strong></th>
                          </tr>
                          <tr>
                            <td>NIK Ayah</td>
                            <td>:</td>
                            <td><?= strtoupper($penduduk['ayah_nik']) ?></td>
                          </tr>
                          <tr>
                            <td>Nama Ayah</td>
                            <td>:</td>
                            <td><?= strtoupper($penduduk['nama_ayah']) ?></td>
                          </tr>
                          <tr>
                            <td>NIK Ibu</td>
                            <td>:</td>
                            <td><?= strtoupper($penduduk['ibu_nik']) ?></td>
                          </tr>
                          <tr>
                            <td>Nama Ibu</td>
                            <td>:</td>
                            <td><?= strtoupper($penduduk['nama_ibu']) ?></td>
                          </tr>
                          <tr>
                            <th colspan="3" class="subtitle_head"><strong>ALAMAT</strong></th>
                          </tr>
                          <tr>
                            <td>Nomor Telepon</td>
                            <td>:</td>
                            <td><?= strtoupper($penduduk['telepon']) ?></td>
                          </tr>
                          <tr>
                            <td>Alamat Email</td>
                            <td>:</td>
                            <td><?= strtoupper($penduduk['email']) ?></td>
                          </tr>
                          <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?= strtoupper($penduduk['alamat']) ?></td>
                          </tr>
                          <tr>
                            <td>Dusun</td>
                            <td>:</td>
                            <td><?= strtoupper($penduduk['dusun']) ?></td>
                          </tr>
                          <tr>
                            <td>RT/ RW</td>
                            <td>:</td>
                            <td><?= strtoupper($penduduk['rt']) ?>
                              /
                              <?= $penduduk['rw'] ?></td>
                          </tr>
                          <tr>
                            <td>Alamat Sebelumnya</td>
                            <td>:</td>
                            <td><?= strtoupper($penduduk['alamat_sebelumnya']) ?></td>
                          </tr>
                          <tr>
                            <th colspan="3" class="subtitle_head"><strong>STATUS KAWIN</strong></th>
                          </tr>
                          <tr>
                            <td>Status Kawin</td>
                            <td>:</td>
                            <td><?= strtoupper($penduduk['kawin']) ?></td>
                          </tr>
                          <?php if ($penduduk['status_kawin'] <> 1) : ?>
                            <tr>
                              <td>Akta perkawinan</td>
                              <td>:</td>
                              <td><?= strtoupper($penduduk['akta_perkawinan']) ?></td>
                            </tr>
                            <tr>
                              <td>Tanggal perkawinan</td>
                              <td>:</td>
                              <td><?= strtoupper($penduduk['tanggalperkawinan']) ?></td>
                            </tr>
                          <?php endif ?>
                          <?php if ($penduduk['status_kawin'] <> 1 and $penduduk['status_kawin'] <> 2) : ?>
                            <tr>
                              <td>Akta perceraian</td>
                              <td>:</td>
                              <td><?= strtoupper($penduduk['akta_perceraian']) ?></td>
                            </tr>
                            <tr>
                              <td>Akta perceraian</td>
                              <td>:</td>
                              <td><?= strtoupper($penduduk['tanggalperceraian']) ?></td>
                            </tr>
                          <?php endif ?>
                          <tr>
                            <th colspan="3" class="subtitle_head"><strong>DATA KESEHATAN</strong></th>
                          </tr>
                          <tr>
                            <td>Golongan Darah</td>
                            <td>:</td>
                            <td><?= $penduduk['golongan_darah'] ?></td>
                          </tr>
                          <tr>
                            <td>Cacat</td>
                            <td>:</td>
                            <td><?= strtoupper($penduduk['cacat']) ?></td>
                          </tr>
                          <tr>
                            <td>Sakit Menahun</td>
                            <td>:</td>
                            <td><?= strtoupper($penduduk['sakit_menahun']) ?></td>
                          </tr>
                          <?php if ($penduduk['status_kawin'] == 2) : ?>
                            <tr>
                              <td>Akseptor KB</td>
                              <td>:</td>
                              <td><?= strtoupper($penduduk['cara_kb']) ?></td>
                            </tr>
                          <?php endif ?>
                          <?php if ($penduduk['id_sex'] == 2) : ?>
                            <tr>
                              <td>Status Kehamilan</td>
                              <td>:</td>
                              <td><?= empty($penduduk['hamil']) ? 'TIDAK HAMIL' : 'HAMIL' ?></td>
                            </tr>
                          <?php endif; ?>
                          <tr>
                            <td>Nama Asuransi</td>
                            <td>:</td>
                            <td><?= $penduduk['asuransi'] ?></td>
                          </tr>
                          <?php if (!empty($penduduk['id_asuransi']) and $penduduk['id_asuransi'] <> '1') : ?>
                            <tr>
                              <td><?= ($penduduk['id_asuransi'] == '99') ? 'Nama/nomor Asuransi' : 'No Asuransi' ?></td>
                              <td>:</td>
                              <td><?= strtoupper($penduduk['no_asuransi']) ?></td>
                            </tr>
                          <?php endif; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade show" id="keluarga" role="tabpanel" aria-labelledby="keluarga-tab">
                  <div class="tab-pane" id="keluarga">
                    <div class="post">
                      <div class="user-block"> <a href="<?= site_url("keluarga/anggota/$p/$o/$penduduk[id_kk]") ?>" class="btn btn-danger btn-block"> <b>Daftar Keluarga</b></a> </div>
                    </div>
                  </div>
                </div>

                <div class="tab-pane fade show" id="dokumen" role="tabpanel" aria-labelledby="dokumen-tab">
                  <h5>Daftar Dokumen Penduduk</h5>
                  <table class="table table-bordered table-hover ">
                    <thead class="bg-gray disabled color-palette">
                      <tr>
                        <th><input type="checkbox" id="checkall"></th>
                        <th>No</th>
                        <th>Aksi</th>
                        <th>Nama Dokumen</th>
                        <th>Jenis Dokumen</th>
                        <th>Tanggal Upload</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($list_dokumen as $data) : ?>
                        <tr>
                          <td><input type="checkbox" name="id_cb[]" value="<?= $data['id'] ?>"></td>
                          <td><?= $key + 1 ?></td>
                          <td nowrap><a href="<?= base_url() . LOKASI_DOKUMEN ?><?= urlencode($data['satuan']) ?>" class="btn btn-primary btn-card btn-sm" rel=”noopener noreferrer” target="_blank" title="Buka Dokumen"><i class="fe fe-eye"></i></a>
                            <?php if (!$data['hidden']) : ?>
                              <a href="<?= site_url("penduduk/dokumen_form/$penduduk[id]/$data[id]") ?>" class="btn bg-orange btn-card btn-sm" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Data" title="Ubah Data" title="Ubah Data"><i class="fe fe-edit"></i></a> <a href="#" data-href="<?= site_url("penduduk/delete_dokumen/$penduduk[id]/$data[id]") ?>" class="btn bg-maroon btn-card btn-sm" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash-o"></i></a>
                            <?php endif ?>
                          </td>
                          <td width="40%">
                            <label data-rel="popover" data-content="<img width=550 height=400 src=<?= base_url() . LOKASI_DOKUMEN ?><?= urlencode($data['satuan']) ?>>">
                              <strong><?= strtoupper($data['nama']); ?></strong>
                            </label>
                          </td>
                          <td width="30%"><?= $jenis_syarat_surat[$data['id_syarat']]['ref_syarat_nama'] ?>
                            </a></td>
                          <td nowrap><?= tgl_indo2($data['tgl_upload']) ?></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                  <div class="timeline-footer" align="right"> <a href="<?= site_url("penduduk/dokumen_form/$penduduk[id]") ?>" title="Tambah Dokumen" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Tambah Dokumen" class="btn  bg-olive btn-sm "><i class='fe fe-plus'></i>Tambah Dokumen</a> <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform','<?= site_url("penduduk/delete_all_dokumen/$penduduk[id]") ?>')" class="btn 	btn-danger btn-sm  hapus-terpilih"><i class='fe fe-trash-o'></i> Hapus Data Terpilih</a> </div>
                </div>

                <div class="tab-pane fade show" id="rumah" role="tabpanel" aria-labelledby="rumah-tab">
                  <!-- The Rumah -->
                  <h5 class="timeline-header"><a href="#">Foto Rumah </a></h5>
                  <div class="card-body">
                    <table class="table table-bordered table-striped table-hover detail">
                      <tr>
                        <th class="padat">No</th>
                        <th width="10%">Aksi</th>
                        <th width="40%">Nama </th>
                        <th width="50%">Foto</th>
                        <!--<th width="15%">File</th>
                                  <th width="15%">Tanggal Upload</th>-->
                      </tr>
                      <?php foreach ($list_rumah as $key => $data) : ?>
                        <tr>
                          <td class="text-center"><?= $key + 1; ?></td>
                          <td nowrap><a href="<?= base_url() . LOKASI_RUMAH ?><?= urlencode($data['satuan']) ?>" class="btn bg-primary btn-card btn-sm" rel=”noopener noreferrer” target="_blank" title="Buka Rumah"><i class="fe fe-eye"></i></a></br>
                            <?php if (!$data['hidden']) : ?>
                              <a href="<?= site_url("penduduk/rumah_form/$penduduk[id]/$data[id]") ?>" class="btn bg-orange btn-card btn-sm" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Data" title="Ubah Data" title="Ubah Data"><i class="fe fe-edit"></i></a></br>
                              <a href="#" data-href="<?= site_url("penduduk/delete_rumah/$penduduk[id]/$data[id]") ?>" class="btn bg-maroon btn-card btn-sm" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash-o"></i></a>
                            <?php endif ?>
                          </td>
                          <td><?= $data['nama'] ?>
                            <br />
                            Tanggal Upload:
                            <?= tgl_indo2($data['tgl_upload']); ?>
                          </td>
                          <td><img class="avatar-img rounded-circle" src="<?= base_url() . LOKASI_RUMAH ?><?= urlencode($data['satuan']); ?>" alt="Foto Rumah Penduduk"></td>
                          <!--<td><a href="<?= base_url() . LOKASI_RUMAH ?><?= urlencode($data['satuan']); ?>" >
                                    <?= $data['satuan']; ?>
                                    </a></td>
                                  <td><?= tgl_indo2($data['tgl_upload']); ?></td>-->
                        </tr>
                      <?php endforeach; ?>
                    </table>
                    <div class="timeline-footer" align="right"> <a href="<?= site_url("penduduk/rumah/$penduduk[id]") ?>" class="btn bg-maroon 	btn-danger btn-sm " title="Hapus Rumah"><i class="fe fe-trash-o"></i>Hapus Rumah</a> <a href="<?= site_url("penduduk/rumah_form/$penduduk[id]") ?>" title="Tambah rumah" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Tambah rumah" class="btn  bg-olive btn-sm "><i class='fe fe-plus'></i>Tambah rumah</a> </div>
                  </div>
                </div>


                <div class="tab-pane fade" id="bantuan" role="tabpanel" aria-labelledby="bantuan-tab">
                  <h4> Daftar Program Bantuan Individu yang diterima</h4>
                  <table class="table table-bordered table-striped table-hover detail">
                    <tr>
                      <th class="padat">No</th>
                      <th>Waktu / Tanggal</th>
                      <th>Nama Program</th>
                      <th>Keterangan</th>
                    </tr>
                    <?php foreach ($program['programkerja'] as $key => $item) : ?>
                      <tr>
                        <td class="text-center"><?= $key + 1 ?></td>
                        <td><?= fTampilTgl($item["sdate"], $item["edate"]); ?></td>
                        <td><a href="<?= site_url("program_bantuan/data_peserta/$item[peserta_id]"); ?>">
                            <?= $item["nama"]; ?>
                          </a></td>
                        <td><?= $item["ndesc"]; ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
<?php $this->load->view('global/confirm_delete'); ?>
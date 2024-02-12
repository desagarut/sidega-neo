
<main role="main" class="main-content">
  <div class="container-fluid">
    <div class="row justify-content-center mb-2">
      <div class="col">
        <h5 class="mb-2 page-title">Laporan Kelompok Rentan</h5>
      </div>
      <div class="col-auto"> <a href="<?= site_url("laporan_rentan/cetak")?>" class="btn btn-outline-info btn-sm"  target="_blank"><i class="fe fe-printer "></i> Cetak</a> <a href="<?= site_url("laporan_rentan/excel/$lap")?>" class="btn btn-outline-info btn-sm "  target="_blank"><i class="fe fe-download"></i> Unduh</a> </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <form id="mainform" name="mainform" action="<?= site_url('laporan/bulan')?>" method="post" class="form-horizontal">
          <div class="card shadow">
            <div class="card-header  with-border">
              <h4 class="text-center"><strong>LAPORAN KELOMPOK RENTAN</strong></h4>
              <h5 class="text-center">
                <?= strtoupper(ucwords($this->setting->sebutan_desa))?>
                <?= strtoupper($config['nama_desa'])?>
                <?= strtoupper(ucwords($this->setting->sebutan_kecamatan))?>
                <?= strtoupper($config['nama_kecamatan'])?>
                KABUPATEN
                <?= strtoupper($config['nama_kabupaten'])?>
                BULAN
                <?php $bln = date("m");?>
                <?= $bln?>
              </h5>
              <h5 class="text-center"><strong>DATA PILAH KEPENDUDUKAN MENURUT UMUR DAN FAKTOR KERENTANAN (LAMPIRAN A - 9)</strong></h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-12">
                  <div class="table-responsive">
                    <select class="form-control col-md-3 input-sm mb-2" name="dusun" onchange="formAction('mainform','<?= site_url('laporan_rentan/dusun')?>')">
                      <option value="">Pilih
                      <?= ucwords($this->setting->sebutan_dusun)?>
                      </option>
                      <?php foreach ($list_dusun as $data): ?>
                      <option value="<?= $data['dusun']?>" <?php if ($dusun==$data['dusun']): ?>selected<?php endif; ?>>
                      <?= $data['dusun']?>
                      </option>
                      <?php endforeach;?>
                    </select>
                    <table class="table table-bordered table-striped table-hover nowrap">
                      <thead class="bg-gray">
                        <tr>
                          <th rowspan="2" class="text-center"><?= ucwords($this->setting->sebutan_dusun)?></th>
                          <th rowspan="2" class="text-center">RW</th>
                          <th rowspan="2" class="text-center">RT</th>
                          <th colspan="2" class="text-center">KK</th>
                          <th colspan="6" class="text-center">Kondisi dan Kelompok Umur</th>
                          <th colspan="7" class="text-center">Cacat</th>
                          <th colspan="2" class="text-center">Sakit Menahun</th>
                          <th rowspan="2" class="text-center" >Hamil</th>
                        </tr>
                        <tr>
                          <th class="text-center">L</th>
                          <th class="text-center">P</th>
                          <th class="text-center">Dibawah 1 Tahun</th>
                          <th class="text-center">1-5 Tahun</th>
                          <th class="text-center">6-12 Tahun</th>
                          <th class="text-center">13-15 Tahun</th>
                          <th class="text-center">16-18 Tahun</th>
                          <th class="text-center">Diatas 60 Tahun</th>
                          <th class="text-center">Cacat Fisik</th>
                          <th class="text-center">Cacat Netra/ Buta</th>
                          <th class="text-center">Cacat Rungu/ Wicara</th>
                          <th class="text-center">Cacat Mental/ Jiwa</th>
                          <th class="text-center">Cacat Fisik dan Mental</th>
                          <th class="text-center">Cacat Lainnya</th>
                          <th class="text-center">Tidak Cacat</th>
                          <th class="text-center">L</th>
                          <th class="text-center">P</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
													$bayi=0;
													$balita=0;
													$sd=0;
													$smp=0;
													$sma=0;
													$lansia=0;
													$cacat=0;
													$sakit_L=0;
													$sakit_P=0;
													$hamil=0;
													$jenis_cacat=array('cacat_fisik','cacat_netra','cacat_rungu','cacat_mental','cacat_fisik_mental','cacat_lainnya','tidak_cacat');
													$total_cacat=array();
												?>
                        <?php foreach ($main as $data): $id_cluster=$data['id_cluster'];?>
                        <tr>
                          <td class="text-left"><?= $data['dusunnya']?></td>
                          <td class="text-center"><?= $data['rw']?></td>
                          <td class="text-center"><?= $data['rt']?></td>
                          <td class="text-center"><a href="<?= site_url("penduduk/lap_statistik/$id_cluster/1")?>">
                            <?= $data['L']?>
                            </a></td>
                          <td class="text-center"><a href="<?= site_url("penduduk/lap_statistik/$id_cluster/2")?>">
                            <?= $data['P']?>
                            </a></td>
                          <td class="text-center"><a href="<?= site_url("penduduk/lap_statistik/$id_cluster/3")?>">
                            <?= $data['bayi']?>
                            </a></td>
                          <td class="text-center"><a href="<?= site_url("penduduk/lap_statistik/$id_cluster/4")?>">
                            <?= $data['balita']?>
                            </a></td>
                          <td class="text-center"><a href="<?= site_url("penduduk/lap_statistik/$id_cluster/5")?>">
                            <?= $data['sd']?>
                            </a></td>
                          <td class="text-center"><a href="<?= site_url("penduduk/lap_statistik/$id_cluster/6")?>">
                            <?= $data['smp']?>
                            </a></td>
                          <td class="text-center"><a href="<?= site_url("penduduk/lap_statistik/$id_cluster/7")?>">
                            <?= $data['sma']?>
                            </a></td>
                          <td class="text-center"><a href="<?= site_url("penduduk/lap_statistik/$id_cluster/8")?>">
                            <?= $data['lansia']?>
                            </a></td>
                          <?php foreach ($jenis_cacat as $key => $cacat): ?>
                          <?php $kode_cacat = $key + 1;?>
                          <td class="text-center"><a href="<?= site_url("penduduk/lap_statistik/$id_cluster/9$kode_cacat")?>">
                            <?= $data[$cacat]?>
                            </a></td>
                          <?php endforeach; ?>
                          <td class="text-center"><a href="<?= site_url("penduduk/lap_statistik/$id_cluster/10")?>">
                            <?= $data['sakit_L']?>
                            </a></td>
                          <td class="text-center"><a href="<?= site_url("penduduk/lap_statistik/$id_cluster/11")?>">
                            <?= $data['sakit_P']?>
                            </a></td>
                          <td class="text-center"><a href="<?= site_url("penduduk/lap_statistik/$id_cluster/12")?>">
                            <?= $data['hamil']?>
                            </a></td>
                          <?php
															$bayi=$bayi+$data['bayi'];
															$balita=$balita+$data['balita'];
															$sd=$sd+$data['sd'];
															$smp=$smp+$data['smp'];
															$sma=$sma+$data['sma'];
															$lansia=$lansia+$data['lansia'];
															$cacat=$cacat+$data['cacat'];
															$sakit_L=$sakit_L+$data['sakit_L'];
															$sakit_P=$sakit_P+$data['sakit_P'];
															$hamil=$hamil+$data['hamil'];
															foreach ($jenis_cacat as $key => $val):
																$total_cacat[$key] += $data[$val];
															endforeach;
														?>
                        </tr>
                        <?php endforeach;?>
                      </tbody>
                      <tfoot class="bg-gray disabled color-palette">
                        <tr>
                          <th colspan="5" class="text-center">Total</th>
                          <th class="text-center"><?= $bayi;?></th>
                          <th class="text-center"><?= $balita;?></th>
                          <th class="text-center"><?= $sd;?></th>
                          <th class="text-center"><?= $smp;?></th>
                          <th class="text-center"><?= $sma;?></th>
                          <th class="text-center"><?= $lansia;?></th>
                          <?php foreach ($total_cacat as $cacat): ?>
                          <th class="total text-center"><?= $cacat;?></th>
                          <?php endforeach; ?>
                          <th class="text-center"><?= $sakit_L;?></th>
                          <th class="text-center"><?= $sakit_P;?></th>
                          <th class="text-center"><?= $hamil;?></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>

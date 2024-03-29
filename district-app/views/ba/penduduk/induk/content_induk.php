<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!-- TODO: Buat script / js autocomplete global -->

<div class="card shadow">
  <div class="card-header"> <a href="<?= site_url($this->controller . "/ajax_cetak/$order_by/cetak"); ?>" class="btn btn-outline-info btn-sm " title="Cetak Buku Induk Penduduk" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak Buku Induk Penduduk"><i class="fe fe-printer "></i> Cetak</a> <a href="<?= site_url($this->controller . "/ajax_cetak/$order_by/unduh"); ?>?>" title="Unduh Buku Induk Penduduk" class="btn btn-outline-info btn-sm " title="Unduh Buku Induk Penduduk" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh Buku Induk Penduduk"><i class="fe fe-download"></i> Unduh</a> <a href="<?= site_url($this->controller . "/clear") ?>" class="btn btn-outline-info btn-sm "><i class="fe fe-refresh"></i>Bersihkan</a> </div>
  <div class="card-body">
    <form id="mainform" name="mainform" action="" method="post">
      <div class="row">
        <div class="col-sm-3">
          <!--<select class="form-control select2 input-sm " name="filter_tahun" onchange="formAction('mainform','<?//= site_url($this->controller . '/filter/filter_tahun') ?>')">
            <option value="">Pilih Tahun</option>
            <?php //foreach ($list_tahun as $l_tahun) : ?>
            <option value="<?//= $l_tahun['tahun'] ?>" <?php //selected($tahun, $l_tahun['tahun']); ?>>
            <?//= $l_tahun['tahun'] ?>
            </option>
            <?php //endforeach; ?>
          </select>-->
        </div>
        <div class="col-sm-3">
          <select class="form-control select2 input-sm" name="filter_bulan" onchange="formAction('mainform','<?= site_url($this->controller . '/filter/filter_bulan') ?>')" width="100%">
            <option value="">Pilih bulan</option>
            <?php foreach (bulan() as $idx => $nama_bulan) : ?>
            <option value="<?= $idx ?>" <?php selected($bulan, $idx); ?>>
            <?= $nama_bulan ?>
            </option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="table-responsive table-min-height mt-2">
        <table class="table datatables table-hover table-responsive" id="dataTable-1">
          <thead>
            <tr>
              <th rowspan="2">Nomor Urut</th>
              <th rowspan="2" style="width: 5px;">Nama Lengkap / Panggilan</th>
              <th rowspan="2">Jenis Kelamin</th>
              <th rowspan="2">Status Perkawinan</th>
              <th colspan="2">Tempat & Tanggal Lahir</th>
              <th rowspan="2">Agama</th>
              <th rowspan="2">Pendidikan Terakhir</th>
              <th rowspan="2">Pekerjaan</th>
              <th rowspan="2">Dapat Membaca Huruf</th>
              <th rowspan="2">Kewarganegaraan</th>
              <th rowspan="2">Alamat Lengkap</th>
              <th rowspan="2">Kedudukan Dlm Keluarga</th>
              <th rowspan="2">NIK'</th>
              <th rowspan="2">No. KK'</th>
              <th rowspan="2">Ket</th>
            </tr>
            <tr>
              <th>Tempat Lahir</th>
              <th width="50px">Tgl</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($main) : ?>
            <?php foreach ($main as $key => $data) : ?>
            <tr>
              <td class="padat"><?= ($key + $paging->offset + 1); ?></td>
              <td><?= strtoupper($data['nama']) ?></td>
              <td><?= strtoupper($data['sex']) ?></td>
              <td><?= (strpos($data['kawin'], 'KAWIN') !== false) ? $data['kawin'] : (($data['sex'] == 'LAKI-LAKI') ? 'DUDA' : 'JANDA') ?></td>
              <td><?= $data['tempatlahir'] ?></td>
              <td><?= tgl_indo_out($data['tanggallahir']) ?></td>
              <td><?= $data['agama'] ?></td>
              <td><?= $data['pendidikan'] ?></td>
              <td><?= $data['pekerjaan'] ?></td>
              <td><?= strtoupper($data['bahasa_nama']) ?></td>
              <td><?= $data['warganegara'] ?></td>
              <td><?= strtoupper($data['alamat'] . " RT " . $data['rt'] . " / RW " . $data['rw'] . " " . $this->setting->sebutan_dusun . " " . $data['dusun']) ?></td>
              <td><?= $data['hubungan'] ?></td>
              <td>
                <?= $data['nik']; ?>
                </td>
              <td>
                <?= $data['no_kk']; ?>
               </td>
              <td><?= $data['ket'] ?></td>
            </tr>
            <?php endforeach; ?>
            <?php else : ?>
            <tr>
              <td class="text-center" colspan="16">Data Tidak Tersedia</td>
            </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </form>
  </div>
</div>
<script src='<?= base_url() ?>assets/js/jquery.dataTables.min.js'></script> 
<script src='<?= base_url() ?>assets/js/dataTables.bootstrap4.min.js'></script> 
<script>
	$('#dataTable-1').DataTable({
		autoWidth: true,
		"lengthMenu": [
			[10, 25, 50, -1],
			[10, 25, 50, "All"]
		]
	});
</script>
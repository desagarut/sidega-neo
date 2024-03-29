<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<main role="main" class="main-content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="row align-items-center">
          <div class="col">
            <h2 class="h5 page-title">Master Penduduk</h2>
          </div>
          <div class="col-auto">
            <form class="form-inline">
              <div class="form-group mb-2 ">
                <?php if ($this->CI->cek_hak_akses('h')) : ?>
                <a href="<?= site_url('penduduk/form'); ?>" class="btn btn-outline-primary btn-sm mr-1" title="Tambah Data"><i class="fe fe-plus"></i> Penduduk Domisili</a> <a href="#confirm-delete" title="Hapus Data Terpilih" onclick="deleteAllBox('mainform', '<?= site_url("penduduk/delete_all/$p/$o"); ?>')" class="btn btn-outline-danger btn-sm mr-1 hapus-terpilih"><i class='fe fe-trash'></i> Hapus Data Terpilih</a>
                <?php endif; ?>
                <button class="btn btn-outline-info dropdown-toggle btn-sm  mr-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi Lainnya <span class="text-muted sr-only">Action</span></button>
                <div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item" href="<?= site_url("penduduk/ajax_cetak/$o/cetak"); ?>" title="Cetak Data" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak Data"><i class="fe fe-printer"></i> Cetak</a> <a class="dropdown-item" href="<?= site_url("penduduk/ajax_cetak/$o/unduh"); ?>" title="Unduh Data" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh Data"><i class="fe fe-download"></i> Unduh</a> <a class="dropdown-item" href="<?= site_url("penduduk/ajax_adv_search"); ?>" title="Pencarian Spesifik" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Pencarian Spesifik"><i class="fe fe-search"></i> Pencarian Spesifik</a> <a class="dropdown-item" href="<?= site_url("penduduk/search_kumpulan_nik"); ?>" title="Pilihan Kumpulan NIK" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Pilihan Kumpulan NIK"><i class="fe fe-users"></i> Pilihan Kumpulan NIK</a> <a class="dropdown-item" href="<?= site_url("penduduk_log/clear"); ?>" title="Log Data Penduduk"><i class="fe fe-book"></i> Log Penduduk</a> </div>
                <a href="<?= site_url("{$this->controller}/clear"); ?>" class="btn btn-outline-info btn-sm mr-1"><i class="fe fe-refresh"></i>Bersihkan</a> </div>
            </form>
          </div>
        </div>
        <div class="card shadow">
          <div class="card-body">
            <form id="mainform" name="mainform" action="" method="post">
              <div class="row">
                <div class="col-auto mb-2">
                  <select class="form-control input-sm" name="filter" onchange="formAction('mainform', '<?= site_url('penduduk/filter/filter'); ?>')">
                    <option value="">Status Penduduk</option>
                    <?php foreach ($list_status_penduduk as $data) : ?>
                    <option value="<?= $data['id']; ?>" <?= selected($filter, $data['id']); ?>>
                    <?= set_ucwords($data['nama']); ?>
                    </option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-auto mb-2">
                  <select class="form-control input-sm" name="status_dasar" onchange="formAction('mainform', '<?= site_url('penduduk/filter/status_dasar'); ?>')">
                    <option value="">Status Dasar</option>
                    <?php foreach ($list_status_dasar as $data) : ?>
                    <option value="<?= $data['id']; ?>" <?= selected($status_dasar, $data['id']); ?>>
                    <?= set_ucwords($data['nama']); ?>
                    </option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-auto mb-2">
                  <select class="form-control input-sm" name="sex" onchange="formAction('mainform', '<?= site_url('penduduk/filter/sex'); ?>')">
                    <option value="">Jenis Kelamin</option>
                    <?php foreach ($list_jenis_kelamin as $data) : ?>
                    <option value="<?= $data['id']; ?>" <?= selected($sex, $data['id']); ?>>
                    <?= set_ucwords($data['nama']); ?>
                    </option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-auto mb-2">
                  <?php $this->load->view('global/filter_wilayah', ['form' => 'mainform']); ?>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <?php if ($judul_statistik) : ?>
                  <h5 class="card-title text-center"><b>
                    <?= $judul_statistik; ?>
                    </b></h5>
                  <?php endif; ?>
                  <table class="table datatables table-hover table-responsive" id="dataTable-1">
                    <thead>
                      <tr>
                        <th><input type="checkbox" id="checkall" /></th>
                        <th>No</th>
                        <th>Foto</th>
                        <th>NIK - No.KK</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Alamat</th>
                        <th>Pendidikan<br />
                          Pekerjaan<br />
                          Perkawinan </th>
                        <th>Aksi</th>
                        <!--<th>Created</th>--> 
                      </tr>
                    </thead>
                    <tbody>
                      <?php if ($main) : ?>
                      <?php foreach ($main as $key => $data) : ?>
                      <tr>
                        <td><input type="checkbox" name="id_cb[]" value="<?= $data['id']; ?>" /></td>
                        <td><?= ($key + $paging->offset + 1); ?></td>
                        <td><div class="user-panel">
                            <div class="image2"> <img style="width:50px" class="img-circle" src="<?= AmbilFoto($data['foto'], '', $data['id_sex']) ?>" alt="foto <?= strtoupper($data['nama']); ?>" title="foto <?= strtoupper($data['nama']); ?>" /> </div>
                          </div></td>
                        <td><small>NIK : </small><a href="<?= site_url("penduduk/detail/$p/$o/$data[id]"); ?>" id="test" name="<?= $data['id']; ?>">
                          <?= $data['nik']; ?>
                          </a><br />
                          <small>KK : </small><a href="<?= site_url("keluarga/kartu_keluarga/$p/$o/$data[id_kk]"); ?>">
                          <?= $data['no_kk']; ?>
                          </a></td>
                        <td nowrap><label data-rel="popover" data-content="<img width=200 height=230 src=<?= AmbilFoto($data['foto'], '', $data['id_sex']) ?>>"> <strong>
                            <?= strtoupper($data['nama']); ?>
                            </strong> </label>
                          </br>
                          Ayah :
                          <?= $data['nama_ayah']; ?>
                          </br>
                          Ibu :
                          <?= $data['nama_ibu']; ?></td>
                        <td class="text-center"><strong>
                          <?= $data['umur']; ?>
                          </strong> <small>tahun</small><br />
                          <small class="text-muted">
                          <?= $data['sex']; ?>
                          </small><br />
                          <small class="text-muted">
                          <?= $data['tempatlahir']; ?>
                          ,
                          <?= strtoupper($data['tanggallahir']); ?>
                          </small></td>
                        <td><?= strtoupper($data['alamat']); ?>
                          , RT
                          <?= strtoupper($data['rt']); ?>
                          / RW
                          <?= strtoupper($data['rw']); ?>
                          Dusun
                          <?= strtoupper($data['dusun']); ?></td>
                        <td>-
                          <?= $data['pendidikan']; ?>
                          <br />
                          -
                          <?= $data['pekerjaan']; ?>
                          <br />
                          -
                          <?= $data['kawin']; ?></td>
                        <td><button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="text-muted sr-only">Action</span> </button>
                          <div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item" href="<?= site_url("penduduk/detail/$p/$o/$data[id]"); ?>" title="Lihat Detail">Detail Biodata</a>
                            <?php if ($data['status_dasar'] == 9) : ?>
                            <a class="dropdown-item" href="#" data-href="<?= site_url("penduduk/kembalikan_status/$p/$o/$data[id]"); ?>" data-remote="false" data-toggle="modal" data-target="#confirm-status">Kembalikan ke Status HIDUP</a>
                            <?php endif; ?>
                            <?php if ($data['status_dasar'] == 1) : ?>
                            <?php if ($this->CI->cek_hak_akses('u')) : ?>
                            <a class="dropdown-item" href="<?= site_url("penduduk/form/$p/$o/$data[id]"); ?>">Ubah Biodata Penduduk</a>
                            <?php endif; ?>
                            <a class="dropdown-item" href="<?= site_url("penduduk/ajax_penduduk_maps_google/$p/$o/$data[id]/0"); ?>" data-remote="false" data-toggle="modal" data-target="#modalBox" title="Lokasi <?= $data['nama'] ?> " data-title="Lokasi <?= $data['nama'] ?> - <?= strtoupper($data['dusun']); ?>, RW <?= $data['rw']; ?> / RT <?= $data['rt']; ?>">Lokasi Tempat Tinggal</a> 
                            <!--<a href="<?= site_url("penduduk/ajax_penduduk_maps_google/$p/$o/$data[id]/0"); ?>" title="Lokasi <?= $data['nama'] ?> - <?= strtoupper($data['dusun']); ?>, RW <?= $data['rw']; ?> / RT <?= $data['rt']; ?>" class="btn btn-block btn-sm"><i class='fe fe-map-marker'></i> Lokasi Tempat Tinggal</a>-->
                            <?php if ($this->CI->cek_hak_akses('h')) : ?>
                            <a class="dropdown-item" href="<?= site_url("penduduk/edit_status_dasar/$p/$o/$data[id]"); ?>" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Status Dasar">Ubah Status Dasar</a>
                            <?php endif; ?>
                            <a class="dropdown-item" href="<?= site_url("penduduk/dokumen/$data[id]"); ?>">Upload Dokumen Penduduk</a> <a class="dropdown-item" href="<?= site_url("penduduk/rumah_form/$data[id]"); ?>" title="Tambah rumah" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Tambah rumah">Tambah Rumah</a> <a class="dropdown-item" href="<?= site_url("penduduk/cetak_biodata/$data[id]"); ?>" target="_blank">Cetak Biodata Penduduk</a>
                            <?php if ($this->CI->cek_hak_akses('h')) : ?>
                            <a class="dropdown-item" href="#" data-href="<?= site_url("penduduk/delete/$p/$o/$data[id]"); ?>" data-toggle="modal" data-target="#confirm-delete">Hapus</a>
                            <?php endif; ?>
                            <?php endif; ?>
                          </div></td>
                        <!--<td><?= $data['nama_pendaftar']; ?><br /><?= $data['created_at']; ?></td>--> 
                      </tr>
                      <?php endforeach; ?>
                      <?php else : ?>
                      <tr>
                        <td class="text-center" colspan="20">Data Tidak Tersedia</td>
                      </tr>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php $this->load->view('global/confirm_delete'); ?>
<?php $this->load->view('global/konfirmasi'); ?>
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
<script src="<?= base_url() ?>assets/js/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/js/validasi.js"></script>
<script src="<?= base_url() ?>assets/js/messages_id.js"></script>

<div class='modal fade' id='confirm-status' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
        <h4 class='modal-title' id='myModalLabel'><i class='fe fe-exclamation-triangle text-red'></i> Konfirmasi</h4>
      </div>
      <div class='modal-body btn-primary'> Apakah Anda yakin ingin mengembalikan status data penduduk ini?? </div>
      <div class='modal-footer'>
        <button type="button" class="btn btn-outline-danger btn-sm btn-sm " data-dismiss="modal"><i class='fe fe-sign-out'></i> Tutup</button>
        <a class='btn-ok'>
        <button type="button" class="btn btn-primary btn-sm" id="ok-status"><i class='fe fe-check'></i> Simpan</button>
        </a> </div>
    </div>
  </div>
</div>

<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<script>
  $(function() {

    var keyword = <?= $keyword ?>;

    $("#cari").autocomplete({

      source: keyword,

      maxShowItems: 10,

    });

  });
</script>

<main role="main" class="main-content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="row align-items-center mb-2">
          <div class="col">
            <h5 class="page-title">Pengelolaan Kelompok</h5>
          </div>
          <div class="col-auto">
            <?php if ($this->CI->cek_hak_akses('h')) : ?>
              <a href="<?= site_url('kelompok/form'); ?>" title="Tambah kelompok Baru" class="btn btn-outline-info btn-sm btn-sm"><i class="fe fe-plus"></i> Tambah Kelompok Baru</a>
              <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform','<?= site_url("kelompok/delete_all"); ?>')" class="btn btn-outline-danger btn-sm btn-sm  hapus-terpilih"><i class='fe fe-trash'></i> Hapus Data Terpilih</a>
            <?php endif; ?>
            <a href="<?= site_url("kelompok/dialog/cetak"); ?>" class="btn btn-outline-info btn-sm" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak Data Kelompok"><i class="fe fe-printer "></i> Cetak</a>
            <a href="<?= site_url("kelompok/dialog/unduh"); ?>" class="btn btn-outline-info btn-sm" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh Data Kelompok"><i class="fe fe-download"></i> Unduh</a>
            <a href="<?= site_url("{$this->controller}/clear"); ?>" class="btn btn-outline-info btn-sm"><i class="fe fe-refresh"></i>Bersihkan</a>
          </div>
        </div>
        <form id="mainform" name="mainform" action="" method="post">
          <div class="row">
            <div class="col-md-3">
              <div class="card shadow">
                <div class="card-header">
                  <h5 class="card-title">Kategori Kelompok</h5>
                </div>
                <div class="card-body">
                  <div class="d-flex flex-row tab-icon">
                    <div class="nav flex-column nav-pills" id="v-pills-tab3" role="tablist" aria-orientation="vertical">
                      <?php if ($this->CI->cek_hak_akses('h')) : ?>
                        <?php foreach ($list_master as $data) : ?>

                          <a class="nav-link <?= jecho($filter, $data['id'], 'class="active"'); ?> <?php // compared_return($selected_nav, "peraturan", "active"); 
                                                                                                    ?>" role="tab" aria-controls="v-pills-settings" aria-selected="false" href="<?= site_url("kelompok/to_master/$data[id]"); ?>"><?= $data['kelompok']; ?></a>
                        <?php endforeach; ?>
                      <?php endif; ?>
                      <a class="btn btn-primary btn-sm" href="<?= site_url("kelompok_master/clear"); ?>">Kelola Kategori Kelompok</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="card shadow">
                <div class="card-header">
                  <select class="form-control input-sm col-md-4" name="filter" onchange="formAction('mainform', '<?= site_url('kelompok/filter/filter'); ?>')">
                    <option value="">Kategori Kelompok</option>
                    <?php foreach ($list_master as $data) : ?>
                      <option value="<?= $data['id']; ?>" <?php selected($filter, $data['id']); ?>>
                        <?= $data['kelompok']; ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="card-body">
                  <form id="mainform" name="mainform" action="" method="post">
                    <div class="row">
                      <div class="col-sm-12">
                        <table class="table datatables table-hover table-responsive" id="dataTable-1">
                          <thead>
                            <tr>
                              <th><input type="checkbox" id="checkall" /></th>
                              <th>No</th>
                              <th>Kode Kelompok</th>
                              <th width="50%"><?= url_order($o, "{$this->controller}/{$func}/$p", 1, 'Nama Kelompok'); ?></th>
                              <th><?= url_order($o, "{$this->controller}/{$func}/$p", 3, 'Ketua Kelompok'); ?></th>
                              <th><?= url_order($o, "{$this->controller}/{$func}/$p", 5, 'Kategori Kelompok'); ?></th>
                              <th>Jumlah Anggota</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php if ($main) : ?>
                              <?php foreach ($main as $key => $data) : ?>
                                <tr>
                                  <td class="padat"><input type="checkbox" name="id_cb[]" value="<?= $data['id']; ?>" /></td>
                                  <td class="padat"><?= ($key + $paging->offset + 1); ?></td>

                                  <td nowrap><?= $data['kode']; ?></td>
                                  <td nowrap><?= $data['nama']; ?></td>
                                  <td nowrap><?= $data['ketua']; ?></td>
                                  <td><?= $data['master']; ?></td>
                                  <td class="padat"><?= $data['jml_anggota']; ?></td>
                                  <td class="aksi">
                                    <a href="<?= site_url("kelompok/anggota/$data[id]"); ?>" class="btn btn-outline-info btn-sm" title="Rincian Kelompok"><i class="fe fe-list"></i></a>
                                    <?php if ($this->CI->cek_hak_akses('h')) : ?>
                                      <a href="<?= site_url("kelompok/form/$p/$o/$data[id]"); ?>" class="btn btn-outline-warning btn-sm" title="Ubah Data Kelompok"><i class='fe fe-edit'></i></a>
                                      <a href="#" data-href="<?= site_url("kelompok/delete/$data[id]"); ?>" class="btn btn-outline-danger btn-sm btn-sm " title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash"></i></a>
                                    <?php endif; ?>
                                  </td>
                                </tr>
                              <?php endforeach; ?>
                            <?php else : ?>
                              <tr>
                                <td class="text-center" colspan="7">Data Tidak Tersedia</td>
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
        </form>
      </div>
    </div>
  </div>
</main>
<?php $this->load->view('global/confirm_delete'); ?>
<script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/js/dataTables.bootstrap4.min.js') ?>"></script>
<script>
  $('#dataTable-1').DataTable({
    autoWidth: true,
    "lengthMenu": [
      [10, 25, 50, -1],
      [10, 32, 64, "All"]
    ]
  });
</script>
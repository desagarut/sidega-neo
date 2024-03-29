<?php ?>
<script>
  $(function() {
    $("#cari").autocomplete({
      source: function(request, response) {
        $.ajax({
          type: "POST",
          url: '<?= site_url("data_sppt/autocomplete") ?>',
          dataType: "json",
          data: {
            cari: request.term
          },
          success: function(data) {
            response(JSON.parse(data));
          }
        });
      },
      minLength: 1,
    });
  });
</script>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Pengelolaan SPPT
      <?= ucwords($this->setting->sebutan_deskel) ?>
      <?= $deskel["nama_deskel"]; ?>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= site_url('home') ?>"><i class="fe fe-"></i> Home</a></li>
      <li class="active">Daftar SPPT PBB</li>
    </ol>
  </section>
  <section class="content" id="maincontent">
    <form id="mainform" name="mainform" action="" method="post">
      <div class="row">
        <div class="col-md-4 col-lg-3">
          <?php $this->load->view('data_sppt/menu.php') ?>
        </div>
        <div class="col-md-8 col-lg-9">
          <div class="card shadow">
            <div class="box-header">
              <div class="card-header">
                <a href="<?= site_url("data_sppt/sppt_form/") ?>" class="btn btn-social btn-success btn-sm" title="Tambah Data SPPT"> <i class="fe fe-plus"></i>Tambah SPPT </a>
                <a href="<?= site_url("data_sppt/cetak") ?>" class="btn btn-social bg-blue btn-sm" title="Cetak Data" target="_blank"> <i class="fe fe-printer"></i> Cetak </a>
                <a href="<?= site_url("data_sppt/unduh") ?>" class="btn btn-outline-info btn-sm" title="Unduh Data" target="_blank"> <i class="fe fe-download"></i>Unduh </a>

                <a href="<?= site_url('data_sppt/import') ?>" class="btn btn-social bg-teal btn-sm" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unggah Data SPPT" title="Unggah Data SPPT"> <i class="fe fe-upload"></i>Unggah </a>
                <a href="<?= site_url("data_sppt/clear") ?>" class="btn btn-social bg-yellow btn-sm "><i class="fe fe-refresh"></i>Bersihkan</a>
              </div>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-sm-12">
                  <div class="box-body">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                          <form id="mainform" name="mainform" action="" method="post">
                            <div class="row">
                              <div class="col-sm-12">
                                <div class="col-sm-6">
                                  <h4 class="text-left"><strong>DAFTAR SPPT PBB</strong></h4>
                                </div>
                                <div class="col-sm-6">
                                  <div class="box-tools">
                                    <div class="input-group input-group-sm pull-right">
                                      <input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?= html_escape($cari) ?>" onkeypress="if (event.keyCode == 13){$('#'+'mainform').attr('action', '<?= site_url("data_persil/search") ?>');$('#'+'mainform').submit();}">
                                      <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action', '<?= site_url("data_sppt/search") ?>');$('#'+'mainform').submit();"><i class="fe fe-search"></i></button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-12">
                                <div class="table-responsive">
                                  <table class="table table-bordered table-striped dataTable table-hover table-responsive">
                                    <thead class="bg-purple">
                                      <tr>
                                        <th class="text-center" width="5%">No</th>
                                        <th class="text-center" width="12%">Pilih Aksi</th>
                                        <th class="text-center" width="8%">Tahun</th>
                                        <th class="text-center" width="10%">NOP</th>
                                        <th class="text-center" width="12%">Nama Wajib Pajak</th>
                                        <th class="text-center" width="10%">Pajak Awal</th>
                                        <th class="text-center" width="15%">Letak Objek Pajak</th>
                                        <th class="text-center" width="13%">Nama Tertagih</th>
                                        <th class="text-center" width="15%">Alamat Tagih</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach ($data_sppt as $item) : ?>
                                        <tr>
                                          <td align="center"><?= $item['no'] ?></td>
                                          <td align="center">
                                            <div class="btn-group">
                                              <button type="button" class="btn btn-info btn-box btn-sm dropdown-toggle" data-toggle="dropdown" title="Detail Info Pajak">Detail <span class="fe fe-caret-down"></span></button>
                                              <ul class="dropdown-menu" role="menu">
                                                <li><a href="<?= site_url("data_sppt/sppt_detail/" . $item["id_sppt"]) ?>" class="btn btn-socialbtn-outline-info btn-box btn-block btn-sm" title="Rincian"><i class="fe fe-eye"></i> Detail</a></li>
                                                <li><a href="<?= site_url("data_sppt/tagihan_tambah/edit/" . $item["id_sppt"]) ?>" class="btn btn-social bg-green btn-box btn-block btn-sm" title="Buat Tagihan Pajak" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Buat Tagihan Pajak"><i class="fe fe-dollar"></i> Buat Tagihan</a> </li>
                                                <li><a href="<?= site_url("data_sppt/ajax_lokasi_maps/" . $item["id_sppt"]) ?>" class="btn btn-social bg-aqua btn-box btn-sm" title="Lokasi <?= $data['nama'] ?>"><i class="fe fe-map"></i>Peta</a></li>
                                                <li><a href="<?= site_url("data_sppt/sppt_form/edit/" . $item["id_sppt"]) ?>" class="btn btn-social bg-yellow btn-box btn-block btn-sm" title="Ubah Data"><i class="fe fe-edit"></i> Ubah</a></li>
                                                <li><a href="#" data-href="<?= site_url("data_sppt/hapus/" . $item["id_sppt"]) ?>" class="btn btn-social bg-red btn-box btn-block btn-sm" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash"></i> Hapus</a></li>
                                              </ul>
                                            </div>
                                          </td>
                                          <td align="center"><?= sprintf("%04s", $item["tahun_awal"]) ?></td>
                                          <!--<td><a href="<? //= site_url("data_sppt/sppt_detail/".$item["id_sppt"])
                                                            ?>" class="btn bg-green disabled btn-box btn-sm"  title="Lihat Detail Objek Pajak"><?= sprintf("%04s", $item["nomor"]) ?></a></td>-->
                                          <td><?= $item['nomor'] ?></td>
                                          <td><?= $item['nama_wp'] ?></td>
                                          <td align="right"><?= $rupiah($item["pbb_terhutang"]) ?></td>
                                          <td><?= $item['letak_op'] ?></td>
                                          <td><?= strtoupper($item["namatertagih"]) ?>
                                            </br>
                                            <i style="color:#090">NIK : </i><i><a href='<?= site_url("penduduk/detail/1/0/$item[id_pend]") ?>'>
                                                <?= $item["nik"] ?>
                                              </a></i>
                                          </td>
                                          <td><?= $item['alamat'] ?></td>
                                        </tr>
                                      <?php endforeach; ?>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </form>
                          <?php $this->load->view('global/paging'); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </section>
</div>
<?php $this->load->view('global/confirm_delete'); ?>
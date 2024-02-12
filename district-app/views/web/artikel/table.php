<main role="main" class="main-content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="row align-items-center mb-2">
          <div class="col">
            <h5 class="page-title">Artikel
              <?= $kategori['kategori']; ?>
            </h5>
          </div>
          <div class="col-auto">
            <?php if ($this->CI->cek_hak_akses('h')): ?>
            <?php if ($cat > 0): ?>
            <a href="<?= site_url("web/form")?>" class="btn btn-success btn-sm" title="Tambah Artikel"> <i class="fe fe-plus"></i>Tambah
            <?php if ($kategori): ?>
            <?= $kategori['kategori']; ?>
            <?php elseif ($cat == 1000): ?>
            Agenda
            <?php elseif ($cat == 1001): ?>
            Artikel Keuangan
            <?php else: ?>
            Artikel Statis
            <?php endif; ?>
            Baru </a>
            <?php endif; ?>
            <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '<?= site_url("web/delete_all")?>')" class="btn btn-outline-danger btn-sm btn-sm hapus-terpilih"><i class='fe fe-trash'></i> Hapus Data Terpilih</a>
            <?php if ($cat > 0 and $cat < 999): ?>
            <a href="#confirm-delete" title="Hapus Kategori <?=$kategori['kategori']?>" onclick="deleteAllBox('mainform', '<?= site_url("web/hapus")?>')" class="btn btn-outline-danger btn-sm btn-sm "><i class='fe fe-trash'></i> Hapus Kategori
            <?=$kategori['kategori']?>
            </a>
            <?php endif; ?>
            <?php if ($cat == 999): ?>
            <a href="<?= site_url("web/reset")?>" class="btn btn-outline-info btn-sm " title="Reset Hit" data-toggle="modal" data-target="#reset-hit" data-remote="false"><i class="fe fe-spinner"></i> Reset Hit</a>
            <?php endif; ?>
            <?php endif; ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <?php $this->load->view('web/artikel/menu');?>
          </div>
          <div class="col-md-9">
            <div class="card shadow">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-12">
                    <table class="table datatables table-hover table-responsive" id="dataTable-1">
                      <thead>
                        <tr>
                          <th><input type="checkbox" id="checkall"/></th>
                          <th>No</th>
                          <?php if ($o==2): ?>
                          <th width="50%"><a href="<?= site_url("web/index/$p/1")?>">Judul <i class='fe fe-sort-asc fa-sm'></i></a></th>
                          <?php elseif ($o==1): ?>
                          <th width="50%"><a href="<?= site_url("web/index/$p/2")?>">Judul <i class='fe fe-sort-desc fa-sm'></i></a></th>
                          <?php else: ?>
                          <th width="50%"><a href="<?= site_url("web/index/$p/1")?>">Judul <i class='fe fe-sort fa-sm'></i></a></th>
                          <?php endif; ?>
                          <?php if ($o==4): ?>
                          <th nowrap><a href="<?= site_url("web/index/$p/3")?>">Hit <i class='fe fe-sort-asc fa-sm'></i></a></th>
                          <?php elseif ($o==3): ?>
                          <th nowrap><a href="<?= site_url("web/index/$p/4")?>">Hit <i class='fe fe-sort-desc fa-sm'></i></a></th>
                          <?php else: ?>
                          <th nowrap><a href="<?= site_url("web/index/$p/3")?>">Hit <i class='fe fe-sort fa-sm'></i></a></th>
                          <?php endif; ?>
                          <?php if ($o==6): ?>
                          <th nowrap><a href="<?= site_url("web/index/$p/5")?>">Diposting Pada <i class='fe fe-sort-asc fa-sm'></i></a></th>
                          <?php elseif ($o==5): ?>
                          <th nowrap><a href="<?= site_url("web/index/$p/6")?>">Diposting Pada <i class='fe fe-sort-desc fa-sm'></i></a></th>
                          <?php else: ?>
                          <th nowrap><a href="<?= site_url("web/index/$p/5")?>">Diposting Pada <i class='fe fe-sort fa-sm'></i></a></th>
                          <?php endif; ?>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($main as $data): ?>
                        <tr>
                          <td class="padat"><input type="checkbox" name="id_cb[]" value="<?=$data['id']?>" <?php $data['boleh_ubah'] or print('disabled')?> /></td>
                          <td class="padat"><?=$data['no']?></td>
                          <td><?= $data['judul']?></td>
                          <td nowrap><?= hit($data['hit'])?></td>
                          <td nowrap><?= tgl_indo2($data['tgl_upload'])?></td>
                          <td class="aksi"><?php if ($data['boleh_ubah']): ?>
                            <?php if ($this->CI->cek_hak_akses('u')): ?>
                            <div class="dropdown">
                              <button class="btn btn-sm dropdown-toggle more-vertical" type="button" id="dr2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="text-muted sr-only">Action</span> </button>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr2"> <a href="<?= site_url("web/form/$data[id]")?>" class="dropdown-item" title="Ubah Data">Edit</a> <a href="#" data-href="<?= site_url("web/delete/$data[id]")?>" class="dropdown-item" title="Hapus" data-toggle="modal" data-target="#confirm-delete">Hapus</a> <a href="<?= site_url("web/ubah_kategori_form/$data[id]")?>" class="dropdown-item" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Kategori" title="Ubah Kategori">Ubah Kategori</i></a>
                                <?php endif; ?>
                                <?php if ($data['boleh_komentar'] == 1): ?>
                                <a href="<?= site_url("web/komentar_lock/$data[id]/2")?>" class="dropdown-item" title="Tutup Komentar Artikel">Komentar Buka</a>
                                <?php else: ?>
                                <a href="<?= site_url("web/komentar_lock/$data[id]/1")?>" class="dropdown-item" title="Buka Komentar Artikel">Komentar Tutup</a>
                                <?php endif ?>
                                <?php if ($data['enabled'] == '1'): ?>
                                <a href="<?= site_url("web/artikel_lock/$data[id]/2"); ?>" class="dropdown-item" title="Non Aktifkan Artikel">Artikel Aktiv</a> <a href="<?= site_url("web/headline/$data[id]")?>" class="dropdown-item" title="Jadikan Headline">
                                <?= ($data['headline']==1) ? 'Headline Yes' : 'Headline No' ?>
                                </a> <a href="<?= site_url("web/slide/$data[id]"); ?>" class="dropdown-item" title="<?= ($data['headline']==3) ? 'Keluarkan dari slide' : 'Masukkan ke dalam slide' ?>"> <i class="<?= ($data['headline']==3) ? 'fa fa-pause' : 'fa fa-play' ?>"></i> </a>
                                <?php else: ?>
                                <a href="<?= site_url("web/artikel_lock/$data[id]/1"); ?>" class="dropdown-item" title="Aktifkan Artikel">Non Aktif</a>
                                <?php endif ?>
                                <?php endif; ?>
                                <a href="<?= site_url('artikel/'.buat_slug($data)); ?>" target="_blank" class="dropdown-item" title="Lihat Artikel">Lihat Artikel</a> </div>
                            </div></td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php $this->load->view('global/confirm_delete');?>
<form action="<?= site_url("web/reset")?>" method="post">
  <div class='modal fade' id='reset-hit' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title' id='myModalLabel'></i> Reset Hit</h4>
        </div>
        <div class='modal-body'>
          <div class="form-group"> <code>Lakukan hapus hit ini jika artikel statis di menu atas website anda terkena kunjungan tak terduga, seperti robot(crawler), yang berlebihan. </code><br>
            <br>
            <label for="hit">Reset Hit</label>
            <select class="form-control input-sm" required name="hit" width="100%">
              <option value="">Pilih persen hit yang akan dihapus</option>
              <?php for ($i=1; $i <= 10; $i++): ?>
              <option value="<?=($i * 10)?>">
              <?=($i * 10).'%'?>
              </option>
              <?php endfor; ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger btn-sm btn-sm " data-dismiss="modal"><i class='fe fe-sign-out'></i> Tutup</button>
          <button type="submit" class="btn btn-info btn-sm"><i class='fe fe-check'></i> Simpan</button>
        </div>
      </div>
    </div>
  </div>
</form>
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
<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<main role="main" class="main-content">
<div class="container-fluid">
  <div class="row justify-content-center mb-2">
    <div class="col">
      <h5 class="mb-2 page-title">Pengelolaan Lembaga</h5>
    </div>
    <div class="col-auto">
      <?php if ($this->CI->cek_hak_akses('h')): ?>
      <a href="<?= site_url('lembaga/form'); ?>" title="Tambah lembaga Baru" class="btn btn-outline-info btn-sm"><i class="fe fe-plus"></i> Tambah lembaga Baru</a> <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform','<?= site_url("lembaga/delete_all"); ?>')" class="btn btn-outline-danger btn-sm btn-sm hapus-terpilih"><i class='fe fe-trash'></i> Hapus Data Terpilih</a>
      <?php endif;?>
      <a href="<?= site_url("lembaga/dialog/cetak"); ?>" class="btn btn-outline-info btn-sm " data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak Data lembaga"><i class="fe fe-printer "></i> Cetak</a> <a href="<?= site_url("lembaga/dialog/unduh"); ?>" class="btn btn-outline-info btn-sm" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh Data lembaga"><i class="fe fe-download"></i> Unduh</a> <a href="<?= site_url("{$this->controller}/clear"); ?>" class="btn btn-outline-info btn-sm "><i class="fe fe-refresh"></i>Bersihkan</a> </div>
  </div>
  <form id="mainform" name="mainform" action="" method="post">
  <div class="row">
  <div class="col-md-3">
    <div id="bantuan" class="card card-info">
      <div class="card-header">
        <h5 class="card-title">Kategori lembaga</h5>
      </div>
      <div class="card-body">
        <ul class="nav nav-pills nav-stacked">
          <?php if ($this->CI->cek_hak_akses('h')): ?>
          <?php foreach ($list_master AS $data): ?>
          <li <?= jecho($filter, $data['id'], 'class="active"'); ?>> <a href="<?= site_url("lembaga/to_master/$data[id]"); ?>">
            <?= $data['lembaga']; ?>
            </a> </li>
          <?php endforeach; ?>
          <li> <a class="btn btn-outline-info btn-sm" href="<?= site_url("lembaga_master/clear"); ?>"><i class="fe fe-plus"></i> Kelola Kategori lembaga</a> </li>
          <?php endif;?>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-md-9">
  <div class="card shadow">
  <div class="card-body">
  <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
  <form id="mainform" name="mainform" action="" method="post">
    <div class="row">
      <div class="col-sm-9">
        <select class="form-control input-sm" name="filter" onchange="formAction('mainform', '<?= site_url('lembaga/filter/filter'); ?>')">
          <option value="">Kategori lembaga</option>
          <?php foreach ($list_master AS $data): ?>
          <option value="<?= $data['id']; ?>" <?php selected($filter, $data['id']); ?> >
          <?= $data['lembaga']; ?>
          </option>
          <?php endforeach;?>
        </select>
      </div>
      <div class="col-sm-3">
        <div class="input-group input-group-sm pull-right">
          <input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?=html_escape($cari); ?>" onkeypress="if (event.keyCode == 13){$('#'+'mainform').attr('action', '<?= site_url("lembaga/filter/cari"); ?>');$('#'+'mainform').submit();}">
          <div class="input-group-btn">
            <button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action', '<?= site_url("lembaga/filter/cari"); ?>');$('#'+'mainform').submit();"><i class="fe fe-search"></i></button>
          </div>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-bordered dataTable table-striped table-hover tabel-daftar">
        <thead class="bg-gray disabled color-palette">
          <tr>
            <th><input type="checkbox" id="checkall"/></th>
            <th>No</th>
            <th>Aksi</th>
            <th>Kode lembaga</th>
            <th width="50%"><?= url_order($o, "{$this->controller}/{$func}/$p", 1, 'Nama lembaga'); ?></th>
            <th><?= url_order($o, "{$this->controller}/{$func}/$p", 3, 'Ketua lembaga'); ?></th>
            <th><?= url_order($o, "{$this->controller}/{$func}/$p", 5, 'Kategori lembaga'); ?></th>
            <th>Jumlah Anggota</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($main): ?>
          <?php foreach ($main as $key => $data): ?>
          <tr>
            <td class="padat"><input type="checkbox" name="id_cb[]" value="<?= $data['id']; ?>" /></td>
            <td class="padat"><?= ($key + $paging->offset + 1); ?></td>
            <td class="aksi"><a href="<?= site_url("lembaga/anggota/$data[id]"); ?>" class="btn btn-outline-info btn-sm" title="Rincian lembaga"><i class="fe fe-list"></i></a>
              <?php if ($this->CI->cek_hak_akses('h')): ?>
              <a href="<?= site_url("lembaga/form/$p/$o/$data[id]"); ?>" class="btn btn-outline-info btn-sm" title="Ubah Data lembaga"><i class='fe fe-edit'></i></a> <a href="#" data-href="<?= site_url("lembaga/delete/$data[id]"); ?>" class="btn btn-outline-info btn-sm" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fe fe-trash"></i></a>
              <?php endif;?></td>
            <td nowrap><?= $data['kode']; ?></td>
            <td nowrap><?= $data['nama']; ?></td>
            <td nowrap><?= $data['ketua']; ?></td>
            <td><?= $data['master']; ?></td>
            <td class="padat"><?= $data['jml_anggota']; ?></td>
          </tr>
          <?php endforeach; ?>
          <?php else: ?>
          <tr>
            <td class="text-center" colspan="7">Data Tidak Tersedia</td>
          </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </form>
  <?php $this->load->view('global/paging'); ?>
</div>
</div>
</div>
</div>
</div>
</form>
</div>
</mai>
<?php $this->load->view('global/confirm_delete'); ?>

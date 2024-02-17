<style>
select {
	font-family: fontAwesome
}
</style>
<main role="main" class="main-content">
<div class="container-fluid">
  <div class="row justify-content-center mb-2">
    <div class="col-12">
      <div class="row align-items-center">
        <div class="col">
          <?php if ($modul['parent']!='0'): ?>
          <h5 class="mb-2 page-title">Pengaturan Sub Modul</h5>
          <?php else: ?>
          <h5 class="mb-2 page-title">Pengaturan Modul</h5>
          <?php endif; ?>
        </div>
        <div class="col-auto"> <a href="<?= site_url('modul/clear')?>" class="btn btn-outline-info btn-sm mb-2"><i class="fe fe-arrow-circle-o-left"></i> Kembali Ke Daftar Modul</a>
          <?php if ($modul['parent']!='0'): ?>
          <a href="<?= site_url()?>modul/sub_modul/<?=($modul['parent'])?>" class="btn btn-outline-primary btn-sm mb-2"><i class="fe fe-arrow-circle-o-left"></i> Kembali Ke Daftar Sub Modul</a>
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>
  <div class="card shadow">
    <div class="card-body">
    <form id="validasi" action="<?=$form_action?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
      <div class="form-group row">
        <label class="col-sm-4 control-label" for="pamong_nama">
          <?php if ($modul['parent']!='0'): ?>
          Nama Sub Modul
          <?php else: ?>
          Nama Modul
          <?php endif ?>
        </label>
        <div class="col-sm-6">
          <input type="hidden" name="modul" value="1">
          <input type="hidden" name="parent" value="<?=($modul['parent'])?>">
          <input id="modul" name="modul" class="form-control input-sm required" type="text" placeholder="Nama Modul/Sub Modul" value="<?=($modul['modul'])?>" maxlength="30">
          </input>
        </div>
      </div>
            <div class="form-group row">
        <label class="col-sm-4 control-label" for="pamong_nama">
          <?php if ($modul['parent']!='0'): ?>
          Url Sub Modul
          <?php else: ?>
          Url Modul
          <?php endif ?>
        </label>
        <div class="col-sm-6">
          <input type="hidden" name="url" value="1">
          <input type="hidden" name="parent" value="<?=($modul['parent'])?>">
          <input id="url" name="url" class="form-control input-sm required" type="text" placeholder="Url Modul/Sub Modul" value="<?=($modul['url'])?>" maxlength="30">
          </input>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-4 control-label" for="ikon">Ikon</label>
        <div class="col-sm-6">
          <select class="form-control select2-ikon" id="ikon" name="ikon">
            <option selected="selected">Pilih Icon</option>
            <?php foreach ($list_icon as $icon): ?>
            <option value="<?=$icon?>" <?php selected($icon, $modul['ikon']); ?>>
            <?=$icon?>
            </option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-xs-12 col-sm-4 col-lg-4 control-label" for="status">Status</label>
        <div class="btn-group col-xs-12 col-sm-7" data-toggle="buttons">
          <label id="sx3" class="btn btn-info btn-box btn-sm col-xs-6 col-sm-4 col-lg-2 form-check-label <?php ($modul['aktif'] =='1' OR $modul['aktif'] == NULL) and print('active'); ?>">
            <input id="g1" type="radio" name="aktif" class="form-check-input" type="radio" value="1" <?php ($modul['aktif'] =='1' OR $modul['aktif'] == NULL) and print('checked'); ?> autocomplete="off">
            Aktif </label>
          <label id="sx4" class="btn btn-info btn-box btn-sm col-xs-6 col-sm-4 col-lg-2 form-check-label <?php ($modul['aktif'] == '2' ) and print('active'); ?>">
            <input id="g2" type="radio" name="aktif" class="form-check-input" type="radio" value="2" <?php selected($modul['aktif'], '2', true); ?> autocomplete="off">
            Tidak Aktif </label>
        </div>
      </div>
      </div>
      <div class="card-footer">
        <div class="col-md-12 text-right">
          <button type='reset' class='btn btn-outline-danger btn-sm ' onclick="reset_form($(this).val());"><i class='fe fe-x'></i> Batal</button>
          <button type='submit' class='btn btn-info btn-sm pull-right confirm'><i class='fe fe-check'></i> Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>
</main>
<script>
	function reset_form()
	{
		<?php if ($modul['aktif'] =='1' OR $modul['aktif'] == NULL): ?>
			$("#sx3").addClass('active');
			$("#sx4").removeClass("active");
		<?php endif; ?>
		<?php if ($modul['aktif'] =='2'): ?>
			$("#sx4").addClass('active');
			$("#sx3").removeClass("active");
		<?php endif; ?>
	};
</script> 

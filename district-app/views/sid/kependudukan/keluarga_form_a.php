<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Biodata Anggota Keluarga</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
      <li><a href="<?= site_url('keluarga/clear')?>"> Daftar Keluarga</a></li>
			<li class="active">Biodata Anggota Keluarga</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
    <form id="mainform" name="mainform" action="<?= $form_action?>" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-3">
              <div class="card shadow">
                <div class="card-body card-profile">
                  <?php if ($penduduk['foto']): ?>
                    <img class="penduduk profile-user-img img-responsive img-circle" src="<?= AmbilFoto($penduduk['foto'])?>" alt="Foto">
                  <?php else: ?>
                    <img class="penduduk profile-user-img img-responsive img-circle" src="<?= base_url()?>assets/files/user_pict/kuser.png" alt="Foto">
                  <?php endif; ?>
                  <br/>
                  <p class="text-muted text-center"> (Kosongkan jika tidak ingin mengubah foto)</p>
                  <br/>
                  <div class="input-group input-group-sm">
                    <input type="text" class="form-control" id="file_path" name="foto">
                    <input type="file" class="hidden" id="file" name="foto">
                    <input type="hidden" name="old_foto" value="<?= $penduduk['foto']?>">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-box"  id="file_browser"><i class="fe fe-search"></i> Browse</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="card shadow">
        			  <div class="card-header">
  								<a href="<?=site_url("keluarga")?>" class="btn btn-sm btn-outline-info mb-1"title="Kembali Ke Daftar Keluarga">
  									<i class="fe fe-arrow-circle-left"></i>Kembali Ke Daftar Keluarga
  								</a>
                  <a href="<?=site_url("keluarga/anggota/1/0/$id_kk")?>" class="btn btn-sm btn-outline-info mb-1"title="Kembali Ke Daftar Keluarga">
                    <i class="fe fe-arrow-circle-left"></i>Kembali Ke Daftar Anggota Keluarga
                  </a>
  							</div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group subtitle_head">
                        <label class="text-right"><strong>DATA KELUARGA :</strong></label>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label >No. KK </label>
                        <input class="form-control input-sm" type="text" value="<?= $kk['no_kk']?>" disabled></input>
                        <input name="id_kk" type="hidden" value="<?= $id_kk?>">
                        <input name="kk_level" type="hidden" value="0">
                        <input name="id_cluster" type="hidden" value="<?= $kk['id_cluster']?>">
                      </div>
                    </div>
                    <div class="col-sm-8">
                      <div class="form-group">
                        <label>Kepala KK</label>
                        <input class="form-control input-sm" type="text" value="<?= $kk['nama']?>" disabled></input>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Alamat </label>
                        <input class="form-control input-sm" type="text" value="<?= $kk['alamat']?> Dusun <?= $kk['dusun']?> - RW <?= $kk['rw']?> - RT <?= $kk['rt']?>" disabled></input>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group subtitle_head">
                        <label class="text-right"><strong>DATA ANGGOTA :</strong></label>
                      </div>
                    </div>
                  </div>
                  <?php $this->load->view('sid/kependudukan/penduduk_form_isian_bersama'); ?>
                </div>
                <div class="card-footer">
                  <div class="col-md-12">
                    <button type='reset' class='btn btn-outline-danger btn-sm ' ><i class='fe fe-times'></i> Batal</button>
                    <button type='submit' class='btn btn-info btn-sm pull-right'><i class='fe fe-check'></i> Simpan</button>
                  </div>
                </div>
                <div  class="modal fade" id="rumah-penduduk" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class='modal-dialog'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                        <h4 class='modal-title' id='myModalLabel'><i class='fe fe-exclamation-triangle text-red'></i> Cari Lokasi Tempat Tinggal</h4>
                      </div>
                      <div class="fetched-data"></div>
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

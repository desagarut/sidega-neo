<script src="<?= base_url()?>assets/js/jquery.validate.min.js"></script>
<script src="<?= base_url()?>assets/js/localization/messages_id.js"></script>
<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Tambah Program Pembinaan Masyarakat</h1>
		<ol class="breadcrumb">
			<li><a href="<?=site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li><a href="<?=site_url('pembinaan_masyarakat')?>"> Daftar Program Pembinaan Masyarakat</a></li>
			<li class="active">Tambah </li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="card shadow">
			<div class="card-header">
				<a href="<?=site_url('pembinaan_masyarakat')?>" class="btn btn-info btn-sm " title="Kembali Ke Daftar Program"><i class="fe fe-arrow-circle-o-left"></i> Kembali Ke Daftar Program</a>
			</div>
			<form id="validasi" action="<?= $form_action?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
				<div class="box-body">
					<?php $cid = @$_REQUEST["cid"]; ?>
					<div class="form-group">
						<label class="col-sm-3 control-label">Sasaran Program</label>
						<div class="col-sm-3">
							<select class="form-control input-sm required" name="cid" id="cid">
								<option value="">Pilih Sasaran Program <?= $cid; ?></option>
								<option value="1" <?php selected($cid, 1); ?>>Penduduk Perorangan</option>
								<option value="2" <?php selected($cid, 2); ?>>Keluarga - KK</option>
								<option value="3" <?php selected($cid, 3); ?>>Rumah Tangga</option>
								<option value="4" <?php selected($cid, 4); ?>>Kelompok / Organisasi</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="nama">Nama Program</label>
						<div class="col-sm-8">
							<input name="nama" class="form-control input-sm nomor_sk required" maxlength="100" placeholder="Nama Program"  type="text"></input>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label" for="ndesc">Keterangan</label>
						<div class="col-sm-8">
							<textarea id="ndesc" name="ndesc" class="form-control input-sm required" placeholder="Isi Keterangan" rows="8"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="penyelenggara">Penyelenggara</label>
						<div class="col-sm-8">
							<input name="penyelenggara" class="form-control input-sm required" maxlength="100" placeholder="Nama Penyelenggara"  type="text"></input>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label" for="asaldana">Asal Dana</label>
						<div class="col-sm-3">
							<select class="form-control input-sm required" name="asaldana" id="asaldana">
								<option value="">Asal Dana</option>
								<?php foreach ($asaldana AS $ad): ?>
									<option value="<?= $ad?>"><?= $ad?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="anggaran">Pagu Anggaran</label>
						<div class="col-sm-8">
							<input name="anggaran" class="form-control input-sm required" maxlength="100" placeholder="Pagu Anggaran"  type="text"></input>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="lokasi">Lokasi</label>
						<div class="col-sm-8">
							<input name="lokasi" class="form-control input-sm required" maxlength="100" placeholder="Lokasi"  type="text"></input>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label" for="tgl_post">Rentang Waktu Program</label>
						<div class="col-sm-4">
							<div class="input-group input-group-sm date">
								<div class="input-group-addon">
									<i class="fe fe-calendar"></i>
								</div>
								<input class="form-control input-sm pull-right required" id="tgl_1" name="sdate" placeholder="Tgl. Mulai" type="text">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="input-group input-group-sm date">
								<div class="input-group-addon">
									<i class="fe fe-calendar"></i>
								</div>
								<input class="form-control input-sm pull-right required" id="tgl_2" name="edate" placeholder="Tgl. Akhir" type="text">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label" for="status">Status</label>
						<div class="col-sm-3">
							<select class="form-control input-sm required" name="status" id="status">
								<option value="1">Aktif</option>
								<option value="0">Tidak Aktif</option>
								<!-- Default Value Aktif -->
							</select>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<button type='reset' class='btn btn-outline-danger btn-sm '><i class='fe fe-times'></i> Batal</button>
					<button type='submit' class='btn btn-info btn-sm pull-right confirm'><i class='fe fe-check'></i> Simpan</button>
				</div>
			</form>
		</div>
	</section>
</div>


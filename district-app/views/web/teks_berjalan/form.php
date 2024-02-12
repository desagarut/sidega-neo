<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Pengaturan Teks Berjalan</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li class="active">Pengaturan Teks Berjalan</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="validasi" action="<?= $form_action?>" method="POST">
			<div class="row">
				<div class="col-md-12">
					<div class="card shadow">
						<div class="card-header">
							<a href="<?= site_url().$this->controller?>" class="btn btn-sm btn-outline-info mb-1" title="Tambah Artikel">
								<i class="fe fe-arrow-circle-left "></i>Kembali Ke Daftar Teks
							</a>
						</div>
						<div class="box-body">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label" for="isi_teks_berjalan">Isi teks berjalan</label>
									<textarea id="teks" class="form-control input-sm required" placeholder="Isi teks berjalan" name="teks" rows="5" style="resize:none;"><?= $teks['teks']?></textarea>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label class="control-label">Tautan ke artikel</label>
									<select class="form-control select2 " id="tautan" name="tautan" style="width: 100%;">
										<option value="">-- Cari Judul Artikel --</option>
										<?php foreach ($list_artikel as $artikel): ?>
											<option value="<?= $artikel['id']?>" <?php selected($artikel['id'], $teks['tautan']); ?>><?=tgl_indo($artikel['tgl_upload']).' | '.$artikel['judul']?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label">Judul tautan</label>
									<input class="form-control input-sm required" placeholder="Judul tautan ke artikel atau url" name="judul_tautan" value="<?= $teks['judul_tautan'] ? $teks['judul_tautan'] : '-- selengkapnya...' ?>" maxlength="150"></input>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<div class="col-md-12">
								<button type='reset' class='btn btn-outline-danger btn-sm ' ><i class='fe fe-times'></i> Batal</button>
								<button type='submit' class='btn btn-info btn-sm pull-right confirm'><i class='fe fe-check'></i> Simpan</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
</div>

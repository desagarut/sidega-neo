<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Kode Isian Form Surat</h1>
		<ol class="breadcrumb">
      <li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li><a href="<?= site_url('surat_master')?>"> Format Surat Desa</a></li>
			<li class="active">Kode Isian Form Surat</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card shadow">
				  <div class="card-header">
						<a href="<?=site_url("surat_master")?>" class="btn btn-sm btn-outline-info mb-1" title="Kembali Ke Daftar Wilayah">
							<i class="fe fe-arrow-circle-left "></i>Kembali ke Daftar Format Surat
           	</a>
					</div>
					<div class="card-header">
						<h3 class="box-title"><i class="fe fe-info-circle"></i> <strong>Kode Isian Format Surat <?= $surat_master['nama']?></strong></h3>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-sm-7">
								<p>
									Kode isian pada tabel di bawah dapat dimasukkan ke dalam template/Format RTF Ekspor Dok untuk jenis surat ini.
								</p>
								<p>
									Pada waktu mencetak surat Ekspor Dok memakai template itu, kode isian di bawah akan diganti dengan data yang diisi pada form isian untuk jenis surat ini.
								</p>
							</div>
							<div class="col-sm-5">
								<table class="table table-bordered table-hover ">
									<thead class="bg-gray disabled color-palette">
										<tr>
											<th>Kode</th>
											<th >Data di Form Isian</th>
										</tr>
									</thead>
									<tbody>
										 <?php foreach ($inputs as $kode => $keterangan): ?>
											<tr>
												<td style="padding-top : 10px;padding-bottom : 10px; " >[form_<?= $kode?>]</td>
												<td><?= $keterangan?></td>
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
	</section>
</div>

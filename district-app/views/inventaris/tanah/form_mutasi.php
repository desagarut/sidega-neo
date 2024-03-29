<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Isi Data Mutasi Inventaris Tanah</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fe fe-home"></i> Home</a></li>
			<li><a href="<?= site_url() ?>inventaris_tanah"><i class="fe fe-dashboard"></i>Daftar Inventaris Tanah</a></li>
			<li class="active">Isi Data Mutasi</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form class="form-horizontal" id="validasi" name="form_mutasi_tanah" method="post" action="<?= site_url("api_inventaris_tanah/add_mutasi"); ?>">
			<input type="hidden" name="id_inventaris_tanah" id="id_inventaris_tanah" value="<?= $main->id; ?>">
			<div class="row">
				<div class="col-md-3">
          <?php	$this->load->view('inventaris/menu_kiri.php')?>
				</div>
				<div class="col-md-9">
					<div class="card shadow">
            <div class="card-header">
							<a href="<?= site_url() ?>inventaris_tanah" class="btn btn-info btn-sm "><i class="fe fe-arrow-circle-left"></i> Kembali Ke Daftar Inventaris Tanah</a>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="col-sm-3 control-label required" style="text-align:left;" for="nama_barang">Nama Barang</label>
										<div class="col-sm-8">
											<input maxlength="50" value="<?= $main->nama_barang; ?>"  class="form-control input-sm required" type="text" disabled/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" style="text-align:left;" for="kode_barang">Kode Barang</label>
										<div class="col-sm-8">
											<input maxlength="50" value="<?= $main->kode_barang; ?>"  class="form-control input-sm required" type="text" disabled/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" style="text-align:left;" for="nomor_register">Nomor Register</label>
										<div class="col-sm-8">
											<input maxlength="50" value="<?= $main->register; ?>"  class="form-control input-sm required" type="text" disabled/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" style="text-align:left;" for="mutasi">Jenis Mutasi </label>
										<div class="col-sm-4">
											<select name="mutasi" id="mutasi" class="form-control input-sm required">
												<option value="Rusak">Status Rusak</option>
												<option value="Diperbaiki">Status Diperbaiki</option>
												<optgroup label="Barang Masih Baik">
													<option value="Masih Baik Disumbangkan">Sumbangakan</option>
													<option value="Masih Baik Dijual">Jual</option>
												</optgroup>
												<optgroup label="Barang Sudah Rusak">
													<option value="Barang Rusak Disumbangkan">Sumbangakan</option>
													<option value="Barang Rusak Dijual">Jual</option>
												</optgroup>
											</select>
										</div>
									</div>
									<div class="form-group disumbangkan">
										<label class="col-sm-3 control-label" style="text-align:left;" for="sumbangkan">Disumbangkan ke-</label>
										<div class="col-sm-8">
											<input maxlength="50"  class="form-control input-sm" name="sumbangkan" id="sumbangkan" type="text" value="<?= $main->sumbangkan; ?>"/>
										</div>
									</div>
									<div class="form-group harga_jual">
										<label class="col-sm-3 control-label " style="text-align:left;" for="harga_jual">Harga Penjualan</label>
										<div class="col-sm-4">
											<input maxlength="50"  class="form-control input-sm number" name="harga_jual" id="harga_jual" type="text" value="<?= $main->harga_jual; ?>"/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" style="text-align:left;" for="tahun">Tahun Pengadaan </label>
										<div class="col-sm-4">
											<select name="tahun" id="tahun" class="form-control input-sm required" disabled>
												<option value="<?= $main->tahun_pengadaan; ?>"><?= $main->tahun_pengadaan; ?></option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label required" style="text-align:left;" for="tahun_mutasi">Tahun Mutasi</label>
										<div class="col-sm-4">
											<input type="date" maxlength="50" class="form-control input-sm required" name="tahun_mutasi" id="tahun_mutasi" value="<?= $main->tahun_mutasi; ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" style="text-align:left;" for="keterangan">Keterangan</label>
										<div class="col-sm-8">
											<textarea rows="5" class="form-control input-sm required" name="keterangan" id="keterangan" ></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="box-footer">
							<div class="col-xs-12">
								<button type="reset" class="btn btn-outline-danger btn-sm btn-sm "><i class="fe fe-times"></i> Batal</button>
								<button type="submit" class="btn btn-info btn-sm pull-right"><i class="fe fe-check"></i> Simpan</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
</div>
<script>
	$(document).ready(function()
	{
		$(".disumbangkan").hide();
		$(".harga_jual").hide();
		$("#mutasi").change(function()
		{
			if ($("#mutasi").val() == "Masih Baik Disumbangkan" | $("#mutasi").val() == "Barang Rusak Disumbangkan" )
			{
				$(".disumbangkan").show();
				$(".harga_jual").hide();
			}
			else if ($("#mutasi").val() == "Masih Baik Dijual" | $("#mutasi").val() == "Barang Rusak Dijual" )
			{
				$(".disumbangkan").hide();
				$(".harga_jual").show();
			} else if ($("#mutasi").val() == "Rusak" | $("#mutasi").val() == "Diperbaiki" )
			{
				$(".disumbangkan").hide();
				$(".harga_jual").hide();
			}
		});
	});
</script>

<div class="card shadow">
	<div class="card-header">
		<table id="judul-laporan" width="100%" style="border: solid 0px black; text-align: center;">
			<tr>
				<td>
					<h4>LAPORAN REALISASI PELAKSANAAN</h4>
					<h4>ANGGARAN PENDAPATAN DAN BELANJA DESA</h4>
					<h4>PEMERINTAH <?= strtoupper(ucwords($this->setting->sebutan_desa))?> <?= strtoupper($desa['nama_desa'])?></h4>
					<h4>TAHUN ANGGARAN <?= $ta ?></h4>
				</td>
			</tr>
		</table>

		<?php $this->load->view('keuangan/tabel_laporan_rp_apbd_isi.php', array('jenis' => 'bidang')); ?>

	</div>
</div>

<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="single_page_area">

	<div class="single_page_area">
		<h4>Perkiraan Calon Pemilih Per Tanggal: <?= $tanggal_pemilihan ?></h4>

		<div class="table-responsive">
		<table id="dpt" class="table table-bordered table-striped">
		<thead>
		<tr>
			<th class="text-center">No</th>
			<th class="text-center">Nama Dusun</th>
			<th class="text-center">RW</th>
			<th class="text-center">L</th>
			<th class="text-center">P</th>
			<th class="text-center">Jumlah Jiwa</th>
		</tr>
		</thead><?php
		if(count($main) > 0){ ?>
			<tbody><?php
			foreach($main as $data){ ?>
				<tr>
					<td class="text-center"><?= $data["no"] ?></td>
					<td class="text-left"><?= strtoupper($data["dusun"]) ?></td>
					<td class="text-center"><?= strtoupper($data["rw"]) ?></td>
					<td class="text-center"><?= $data["jumlah_warga_l"] ?></td>
					<td class="text-center"><?= $data["jumlah_warga_p"] ?></td>
					<td class="text-center"><?= $data["jumlah_warga"] ?></td>
				</tr><?php
			} ?>
			</tbody>
			<tr>
				<th colspan="3" class="text-right">TOTAL</th>
				<th class="text-center"><?= $total["total_warga_l"] ?></th>
				<th class="text-center"><?= $total["total_warga_p"] ?></th>
				<th class="text-center"><?= $total["total_warga"] ?></th>
			</tr><?php
		} else { ?>
			<tr><td colspan=6 class="text-center">Daftar masih kosong</td></tr><?php
		} ?>
		</table>
		</div>
	</div>
</div> <!-- .list-frame -->

<div class="card shadow mb-4">
	<div class="card-body">
		<?php
		if (isset($data)) {
			$d = $data->row();
		?>
			<div class="row items-align-center">
				<div class="col-md-6 my-4">
					<p class="mb-0"><strong class="mb-0 text-uppercase text-muted">REALISASI SPPT PBB</strong></p>
					<h3><?= $d->presentase_pbb; ?>%</h3>
					<p class="text-muted">Total Tagihan PBB.</p>
					<h3><?= rupiah($d->total_tagih); ?></h3>
				</div>
				<div class="col-md-6 my-4 text-center">
					<div lass="chart-box mx-4">
						<canvas id="pieChartjs" width="400" height="300"></canvas>
					</div>
				</div>
				<div class="col-md-6 border-top pt-3">
					<p class="mb-1"><strong class="text-muted">Lunas</strong></p>
					<h4 class="mb-0"><?= $rupiah($d->pajak_lunas) ?></h4>
					<p class="small text-muted mb-0"><span>37.7% Last week</span></p>
				</div> <!-- .col -->
				<div class="col-md-6 border-top pt-3">
					<p class="mb-1"><strong class="text-muted">Belum</strong></p>
					<h4 class="mb-0"><?= $rupiah($d->pajak_terhutang); ?></h4>
					<p class="small text-muted mb-0"><span>-18.9% Last week</span></p>
				</div> <!-- .col -->
			</div>
		<?php
		}
		?>
	</div>
</div>

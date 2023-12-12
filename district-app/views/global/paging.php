<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!--
<div class="row paging">
	<div class="col-sm-3 dataTables_length">
		<form class="form-horizontal" id="paging" action="<?= ($func == 'index') ? site_url("$this->controller") : site_url("$this->controller/$func"); ?>" method="POST">
			<label>
				Tampilkan
				<select class="form-control input-sm" name="per_page" onchange="$('#paging').submit()">
					<?php foreach ($set_page as $set) : ?>
						<option value="<?= $set; ?>" <?= selected($per_page = $per_page ?: $paging->per_page, $set); ?>><?= $set; ?></option>
					<?php endforeach; ?>
				</select>
				Dari <strong><?= $paging->num_rows; ?></strong> Total Data
			</label>
		</form>
	</div>
	
	<div class="col-sm-9 dataTables_paginate">
		<ul class="pagination">
			<?php if ($paging->start_link) : ?>
				<li <?= jecho($paging->page, 1, "class='disabled'"); ?>><a href="<?= site_url("$this->controller/$func/1/$o");
																					jecho($paging->page . '!', 1, "#"); ?>" aria-label="First"><span aria-hidden="true">Awal</span></a></li>
			<?php endif; ?>
			<?php if ($paging->prev) : ?>
				<li><a href="<?= site_url("$this->controller/$func/$paging->prev/$o"); ?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
			<?php endif; ?>
			<?php for ($i = $paging->start_link; $i <= $paging->end_link; $i++) : ?>
				<li <?= jecho($paging->page, $i, "class='active'"); ?>><a href="<?= ($i == 1) ? site_url("$this->controller/$func") : site_url("$this->controller/$func/$i/$o"); ?>"><?= $i; ?></a></li>
			<?php endfor; ?>
			<?php if ($paging->next) : ?>
				<li><a href="<?= site_url("$this->controller/$func/$paging->next/$o"); ?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
			<?php endif; ?>
			<?php if ($paging->end) : ?>
				<li <?= jecho($paging->page . '!', $paging->end, "class='disabled'"); ?>><a href="<?= site_url("$this->controller/$func/$paging->end/$o");
																									jecho($paging->page, $paging->end_link, "#"); ?>" aria-label="Last"><span aria-hidden="true">Akhir</span></a></li>
			<?php endif; ?>
		</ul>
	</div>
			
</div>
-->
<div class="row">
	<div class="col-md-2">
		<form class="form-horizontal" id="paging" action="<?= ($func == 'index') ? site_url("$this->controller") : site_url("$this->controller/$func"); ?>" method="POST">

			<div class="form-group col-auto mr-auto">
				<label class="my-1 mr-2 sr-only" for="inlineFormCustomSelectPref1">Show</label>
				<select class="custom-select mr-sm-2" id="inlineFormCustomSelectPref1" onchange="$('#paging').submit()">
					<?php foreach ($set_page as $set) : ?>
						<option value="<?= $set; ?>" <?= selected($per_page = $per_page ?: $paging->per_page, $set); ?>><?= $set; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</form>
	</div>
	<div class="col-md-8">
		<nav aria-label="Table Paging" class="mb-0 text-muted">
			<ul class="pagination justify-content-center mb-0">
				<?php if ($paging->start_link) : ?>
					<li <?= jecho($paging->page, 1, "class='page-item disabled'"); ?>><a class="page-link" href="<?= site_url("$this->controller/$func/1/$o");
																													jecho($paging->page . '!', 1, "#"); ?>">Sebelumnya</a></li>
				<?php endif; ?>
				<?php if ($paging->prev) : ?>
					<li class="page-item"><a class="page-link" href="<?= site_url("$this->controller/$func/$paging->prev/$o"); ?>"></a></li>
				<?php endif; ?>
				<?php for ($i = $paging->start_link; $i <= $paging->end_link; $i++) : ?>
					<li <?= jecho($paging->page, $i, "class='page-item active'"); ?>><a class="page-link" href="<?= ($i == 1) ? site_url("$this->controller/$func") : site_url("$this->controller/$func/$i/$o"); ?>"><?= $i; ?></a></li>
				<?php endfor; ?>
				<?php if ($paging->next) : ?>
					<li class="page-item"><a class="page-link" href="<?= site_url("$this->controller/$func/$paging->next/$o"); ?>">3</a></li>
				<?php endif; ?>
				<?php if ($paging->end) : ?>
					<li <?= jecho($paging->page . '!', $paging->end, "class='page-item disabled'"); ?>><a class="page-link" href="#">Selanjutnya</a></li>
				<?php endif; ?>
			</ul>
		</nav>
	</div>
	<div class="col-md-2 text-muted">Jumlah Data: <?= $paging->num_rows; ?></div>
</div>
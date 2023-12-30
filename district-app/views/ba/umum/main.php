<style type="text/css">
	.disabled {
		pointer-events: none;
		cursor: default;
	}
</style>
<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">Buku Administrasi Umum - <?= $subtitle ?></h5>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-3 mb-4">
				<?php $this->load->view('ba/umum/side') ?>
			</div>
			<div class="col-md-9 mb-4">
				<?php $this->load->view($main_content) ?>
			</div>
		</div>
	</div>
</main>
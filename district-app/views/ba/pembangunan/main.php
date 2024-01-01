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
				<h5 class="mb-2 page-title">Buku Administrasi Pembangunan</h5>
			</div>
			<div class="row">
				<div class="col-md-3">
					<?php $this->load->view('ba/pembangunan/side') ?>
				</div>
				<div class="col-md-9">
					<?php $this->load->view($main_content) ?>
				</div>
			</div>
		</div>
	</div>
</main>
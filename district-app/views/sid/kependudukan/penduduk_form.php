<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="row align-items-center">
					<div class="col">
						<h5 class="mb-2 page-title">Form Biodata Penduduk</h5>
					</div>
					<div class="col-auto">
						<a href="<?= site_url("penduduk/clear"); ?>" class="btn btn-outline-primary mb-2" title="Kembali Ke Daftar Penduduk"><i class="fe fe-arrow-circle-o-left"></i> Kembali Ke Daftar Penduduk</a>
					</div>
				</div>
				<form id="mainform" name="mainform" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data" onreset="reset_hamil();">
					<div class="row">
						<?php include("district-app/views/sid/kependudukan/penduduk_form_isian.php"); ?>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
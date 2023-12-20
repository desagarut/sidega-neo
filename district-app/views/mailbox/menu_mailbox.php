<div class="col-md-3">
	<div class="card shadow">
		<div class="card-header">
			<h3 class="box-title">Kategori</h3>
			<div class="box-tools">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fe fe-minus"></i></button>
			</div>
		</div>
		<div class="box-body no-padding">
			<ul class="nav nav-pills nav-stacked">
				<?php foreach($submenu as $id => $nama_menu) : ?>
					<li class="<?php ($_SESSION['submenu'] == $id) and print('active') ?>">
						<a href="<?= site_url("mailbox/clear/$id") ?>"><?= $nama_menu ?></a>
					</li>
				<?php endforeach ?>
			</ul>
		</div>
	</div>
</div>
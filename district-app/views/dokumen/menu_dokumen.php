	<div class="card shadow">
		<div class="card-header">
			<h5 class="card-title">Jenis Produk Hukum</h5>
		</div>
		<div class="card-body">
			<ul class="nav nav-pills nav-stacked">
				<?php for ($i = 1; $i < count($submenu); $i++) : ?>
					<li class="<?php ($_SESSION['submenu'] == $submenu[$i]['id']) and print('active') ?>"><a href="<?= site_url('dokumen_sekretariat/peraturan_desa/' . $submenu[$i]['id']) ?>"><?= $submenu[$i]['nama'] ?></a></li>
				<?php endfor; ?>
			</ul>
		</div>
	</div>
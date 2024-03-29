<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Pesan <?= $tipe_mailbox ?></h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fe fe-home"></i> Home</a></li>
			<li class="active"><?= $tipe_mailbox ?></li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form action="<?= site_url('mailbox/form') ?>" class="form-horizontal" method="post">
			<div class="row">
				<div class="col-md-12">
					<div class="card shadow">
            <div class="card-header">
							<a href="<?= site_url("mailbox/index/$kat")?>" class="btn btn-social btn-flat btn-info btn-sm"  title="Tambah Artikel">
								<i class="fe fe-arrow-circle-left "></i>Kembali ke <?= $tipe_mailbox ?>
            	</a>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label class="control-label col-sm-2" for="owner"><?= $owner ?></label>
								<div class="col-sm-9">
									<div class="form-control input-sm"><?= $pesan['owner']?></div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="email">NIK</label>
								<div class="col-sm-9">
									<div class="form-control input-sm"><?= $pesan['email']?></div>
									<input type="hidden" name="nik" value="<?= $pesan['email']?>">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="subjek">Subjek</label>
								<div class="col-sm-9">
									<div class="form-control input-sm"><?= $pesan['subjek']?></div>
									<input type="hidden" name="subjek" value="<?= $pesan['subjek']?>">
								</div>
							</div>
              <div class="form-group">
								<label class="col-sm-2 control-label" for="pesan">Pesan</label>
								<div class="col-sm-9">
									<textarea class="form-control input-sm" readonly id="pesan"><?= $pesan['komentar']?></textarea>
								</div>
							</div  
						</div>
						<div class="card-footer">
							<div class="col-md-12">
								<button type="submit" class='btn btn-social btn-flat btn-info btn-sm pull-right confirm'><i class='fe fe-reply'></i> Balas Pesan</button>
							</div>
						</div>

					</div>
				</div>
			</div>
		</form>
	</section>
</div>
<script>
	$(document).ready(function() {
		const sHeight = parseInt($("#pesan").get(0).scrollHeight) + 30;
		$('#pesan').attr('style', `height:${sHeight}px; resize:none`);
	})
</script>
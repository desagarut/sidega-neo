<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="row align-items-center mb-2">
					<div class="col">
						<h5 class="page-title">Form Manajemen Pengguna</h5>
					</div>
					<div class="col-auto">
						<a href="<?= site_url() ?>man_user" class="btn btn-outline-primary mb-2"><i class="fe fe-arrow-circle-o-left"></i> Kembali Ke Manajemen Pengguna</a>
					</div>
				</div>
			</div>
		</div>
		<form id="validasi" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
			<div class="row">
				<div class="col-md-3">
					<div class="card shadow">
						<div class="card-body">
							<div class="avatar avatar-xl text-center">
								<?php if ($user['foto']) : ?>
									<img class="avatar-img rounded-circle" src="<?= AmbilFoto($user['foto']) ?>" alt="Pengguna">
								<?php else : ?>
									<img class="avatar-img rounded-circle" src="<?= base_url() ?>assets/files/user_pict/kuser.png" alt="Pengguna">
								<?php endif ?>
								<br />
								<p class="text-center text-bold">Foto Pengguna</p>
								<p class="text-muted text-center text-red">(Kosongkan, jika foto tidak berubah)</p>
								<br />
								<div class="input-group">
									<input type="text" class="form-control" id="file_path" name="foto">
									<input type="file" class="hidden" id="file" name="foto">
									<span class="input-group-btn">
										<button type="button" class="btn btn-info" id="file_browser"><i class="fe fe-search"></i> Browse</button>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="card shadow">
						<div class="card-body">
							<div class="form-group row">
								<label class="col-sm-3 control-label" for="group">Group</label>
								<div class="col-sm-8">
									<select class="form-control input-sm required" id="id_grup" name="id_grup">
										<?php if ($user['id'] == '1') : ?>
											<option <?php selected($user['id_grup'], '1'); ?> value="1">Administrator</option>
										<?php else : ?>
											<?php foreach ($user_group as $item) : ?>
												<option <?php selected($user['id_grup'], $item['id']); ?> value="<?= $item[id] ?>"><?= $item['nama'] ?></option>
											<?php endforeach ?>
										<?php endif ?>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 control-label" for="username">Username</label>
								<div class="col-sm-8">
									<input id="username" name="username" class="form-control input-sm required username" type="text" placeholder="Username" value="<?= $user['username'] ?>"></input>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 control-label" for="password">Kata Sandi</label>
								<div class="col-sm-8">
									<input id="password" name="password" class="form-control input-sm required pwdLengthNist_atau_kosong" type="password" placeholder="Kata Sandi" <?php if ($user) : ?>value="radiisi" <?php endif ?>></input>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 control-label" for="nama">Nama</label>
								<div class="col-sm-8">
									<input id="nama" name="nama" class="form-control input-sm required nama" minlength="3" maxlength="50" type="text" placeholder="Nama" value="<?= $user['nama'] ?>"></input>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 control-label" for="phone">Nomor HP</label>
								<div class="col-sm-8">
									<input id="phone" name="phone" class="form-control input-sm bilangan" minlength="8" maxlength="15" type="text" placeholder="Nomor HP" value="<?= $user['phone'] ?>"></input>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 control-label" for="email">Mail</label>
								<div class="col-sm-8">
									<input id="email" name="email" class="form-control input-sm email" type="text" placeholder="Alamat E-mail" value="<?= $user['email'] ?>"></input>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<div class="col-md-12 text-right">
								<button type="reset" class="btn btn-danger"><i class="fe fe-times"></i> Batal</button>
								<button type="submit" class="btn btn-info pull-right"><i class="fe fe-check"></i> Simpan</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</main>
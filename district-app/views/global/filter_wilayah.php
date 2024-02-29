<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="row">
	<div class="col-auto mb-3">
		<select class="form-control row input-sm " name="dusun" onchange="formAction('<?= $form; ?>','<?= site_url("{$this->controller}/filter/dusun"); ?>')">
			<option value="">Pilih <?= ucwords($this->setting->sebutan_dusun); ?></option>
			<?php foreach ($list_dusun as $data) : ?>
				<option value="<?= $data['dusun']; ?>" <?= selected($dusun, $data['dusun']); ?>><?= set_ucwords($data['dusun']); ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="col-auto mb-3">
		<?php if ($dusun) : ?>
			<select class="form-control row input-sm" name="rw" onchange="formAction('<?= $form; ?>','<?= site_url("{$this->controller}/filter/rw"); ?>')">
				<option value="">Pilih RW</option>
				<?php foreach ($list_rw as $data) : ?>
					<option value="<?= $data['rw']; ?>" <?= selected($rw, $data['rw']); ?>><?= set_ucwords($data['rw']); ?></option>
				<?php endforeach; ?>
			</select>
		<?php endif; ?>
	</div>
	<div class="col-auto mb-3">
		<?php if ($rw) : ?>
			<select class="form-control row input-sm" name="rt" onchange="formAction('<?= $form; ?>','<?= site_url("{$this->controller}/filter/rt"); ?>')">
				<option value="">Pilih RT</option>
				<?php foreach ($list_rt as $data) : ?>
					<option value="<?= $data['rt']; ?>" <?= selected($rt, $data['rt']); ?>><?= set_ucwords($data['rt']); ?></option>
				<?php endforeach; ?>
			</select>
		<?php endif; ?>
	</div>
</div>
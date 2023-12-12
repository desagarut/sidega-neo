<script src="<?= base_url('assets/tiny/js/jquery.validate.min.js'); ?>"></script>
<script src="<?= base_url('assets/tiny/js/validasi.js'); ?>"></script>
<script src="<?= base_url('assets/tiny/js/messages_id.js'); ?>"></script>
<script src="<?= base_url('assets/tiny/js/script.js'); ?>"></script>
<?php if (empty($web_ui) || $web_ui == false) : ?>
	<script src="<?= base_url('assets/tiny/js/custom-select2.js'); ?>"></script>
	<script src="<?= base_url('assets/tiny/js/custom-datetimepicker.js'); ?>"></script>
<?php endif; ?>
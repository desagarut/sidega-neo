<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<script src="<?= base_url() ?>assets/tiny/js/analytics.js"></script>

<script src="<?= base_url() ?>assets/tiny/js/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/tiny/js/popper.min.js"></script>
<script src="<?= base_url() ?>assets/tiny/js/moment.min.js"></script>
<script src="<?= base_url() ?>assets/tiny/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/tiny/js/simplebar.min.js"></script>
<script src='<?= base_url() ?>assets/tiny/js/daterangepicker.js'></script>
<script src='<?= base_url() ?>assets/tiny/js/jquery.stickOnScroll.js'></script>
<script src="<?= base_url() ?>assets/tiny/js/tinycolor-min.js"></script>
<script src="<?= base_url() ?>assets/tiny/js/config.js"></script>
<script src="<?= base_url() ?>assets/tiny/js/d3.min.js"></script>
<script src="<?= base_url() ?>assets/tiny/js/topojson.min.js"></script>
<script src="<?= base_url() ?>assets/tiny/js/datamaps.all.min.js"></script>
<script src="<?= base_url() ?>assets/tiny/js/datamaps-zoomto.js"></script>
<script src="<?= base_url() ?>assets/tiny/js/datamaps.custom.js"></script>
<script src="<?= base_url() ?>assets/tiny/js/Chart.min.js"></script>
<script>
  /* defind global options */
  Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
  Chart.defaults.global.defaultFontColor = colors.mutedColor;
</script>
<script src="<?= base_url() ?>assets/tiny/js/gauge.min.js"></script>
<script src="<?= base_url() ?>assets/tiny/js/jquery.sparkline.min.js"></script>
<script src="<?= base_url() ?>assets/tiny/js/apexcharts.min.js"></script>
<script src="<?= base_url() ?>assets/tiny/js/apexcharts.custom.js"></script>
<script src="<?= base_url() ?>assets/tiny/js/apps.js"></script>

<!-- NOTIFICATION-->

<script type="text/javascript">
  $('document').ready(function() {
    setTimeout(function() {
      refresh_badge($("#b_permohonan_surat"), "<?= site_url('notif/permohonan_surat'); ?>");
      refresh_badge($("#b_komentar"), "<?= site_url('notif/komentar'); ?>");
      refresh_badge($("#b_inbox"), "<?= site_url('notif/inbox'); ?>");
    }, 500);
    if ($('#success-code').val() == 1) {
      notify = 'success';
      notify_msg = 'Data berhasil disimpan';
    } else if ($('#success-code').val() == -1) {
      notify = 'error';
      notify_msg = 'Data gagal disimpan <?= $_SESSION["error_msg"] ?>';
    } else if ($('#success-code').val() == -2) {
      notify = 'error';
      notify_msg = 'Data gagal disimpan, nama id sudah ada!';
    } else if ($('#success-code').val() == -3) {
      notify = 'error';
      notify_msg = 'Data gagal disimpan, nama id sudah ada!';
    } else if ($('#success-code').val() == 4) {
      notify = 'success';
      notify_msg = 'Data berhasil dihapus';
    } else if ($('#success-code').val() == -4) {
      notify = 'error';
      notify_msg = 'Data gagal dihapus';
    } else {
      notify = '';
      notify_msg = '';
    }
    notification(notify, notify_msg);
    $('#success-code').val('');
  });
</script>
<?php $_SESSION['success'] = 0; ?>
</body>

</html>
<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<script src="<?= base_url() ?>assets/js/analytics.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/js/popper.min.js"></script>
<script src="<?= base_url() ?>assets/js/moment.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/simplebar.min.js"></script>
<script src='<?= base_url() ?>assets/js/daterangepicker.js'></script>
<script src='<?= base_url() ?>assets/js/jquery.stickOnScroll.js'></script>
<script src="<?= base_url() ?>assets/js/tinycolor-min.js"></script>
<script src="<?= base_url() ?>assets/js/config.js"></script>
<script src="<?= base_url() ?>assets/js/d3.min.js"></script>
<script src="<?= base_url() ?>assets/js/topojson.min.js"></script>
<script src="<?= base_url() ?>assets/js/datamaps.all.min.js"></script>
<script src="<?= base_url() ?>assets/js/datamaps-zoomto.js"></script>
<script src="<?= base_url() ?>assets/js/datamaps.custom.js"></script>
<script src="<?= base_url() ?>assets/js/Chart.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/js/select2.min.js"></script>
<script src='<?= base_url() ?>assets/js/jquery.timepicker.js'></script>
<script src='<?= base_url() ?>assets/js/dropzone.min.js'></script>
<script src='<?= base_url() ?>assets/js/uppy.min.js'></script>
<script src='<?= base_url() ?>assets/js/quill.min.js'></script>

<script>
  /* defind global options */
  Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
  Chart.defaults.global.defaultFontColor = colors.mutedColor;
</script>
<script src="<?= base_url() ?>assets/js/gauge.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.sparkline.min.js"></script>
<script src="<?= base_url() ?>assets/js/apexcharts.min.js"></script>
<script src="<?= base_url() ?>assets/js/apexcharts.custom.js"></script>
<script src="<?= base_url() ?>assets/js/apps.js"></script>
<script src="<?= base_url() ?>assets/js/validasi.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/js/messages_id.js"></script>
<!-- Numeral js -->
<script src="<?= base_url() ?>assets/js/numeral.min.js"></script>
<!-- Script-->
<script src="<?= base_url() ?>assets/js/script.js"></script>

<!-- OpenStreetMap Js-->
<script src="<?= base_url() ?>assets/js/osm/leaflet.js"></script>
<script src="<?= base_url() ?>assets/js/osm/turf.min.js"></script>
<script src="<?= base_url() ?>assets/js/osm/leaflet-geoman.min.js"></script>
<script src="<?= base_url() ?>assets/js/osm/leaflet.filelayer.js"></script>
<script src="<?= base_url() ?>assets/js/osm/togeojson.js"></script>
<script src="<?= base_url() ?>assets/js/osm/togpx.js"></script>
<script src="<?= base_url() ?>assets/js/osm/leaflet-providers.js"></script>
<script src="<?= base_url() ?>assets/js/osm/L.Control.Locate.min.js"></script>
<script src="<?= base_url() ?>assets/js/osm/leaflet.markercluster.js"></script>
<script src="<?= base_url() ?>assets/js/osm/peta.js"></script>
<script src="<?= base_url() ?>assets/js/osm/leaflet-measure-path.js"></script>
<script src="<?= base_url() ?>assets/js/osm/apbdes_manual.js"></script>
<script src="<?= base_url() ?>assets/js/osm/mapbox-gl.js"></script>
<script src="<?= base_url() ?>assets/js/osm/leaflet-mapbox-gl.js"></script>
<script src="<?= base_url() ?>assets/js/osm/shp.js"></script>
<script src="<?= base_url() ?>assets/js/osm/leaflet.shpfile.js"></script>
<script src="<?= base_url() ?>assets/js/osm/leaflet.groupedlayercontrol.min.js"></script>
<script src="<?= base_url() ?>assets/js/osm/leaflet.browser.print.js"></script>
<script src="<?= base_url() ?>assets/js/osm/leaflet.browser.print.utils.js"></script>
<script src="<?= base_url() ?>assets/js/osm/leaflet.browser.print.sizes.js"></script>
<script src="<?= base_url() ?>assets/js/osm/dom-to-image.min.js"></script>
<script src="<?= base_url() ?>assets/js/osm/toastr.min.js"></script>

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
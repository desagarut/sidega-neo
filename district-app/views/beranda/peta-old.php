<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOKTzsvtw8j-TJI8dmJ228bXASq4C-S7U&callback=initMap&v=weekly" defer></script>

<script>
  var map
  var kantorDesa

  function initMap() {
    <?php if (!empty($desa['lat']) && !empty($desa['lng'])) : ?>
      var center = {
        lat: <?= $desa['lat'] ?>,
        lng: <?= $desa['lng'] ?>
      }
    <?php else : ?>
      var center = {
        lat: -7.34298008144879,
        lng: 107.217667252986,
      }
    <?php endif; ?>

    var zoom = 13
    //Jika posisi kantor desa belum ada, maka posisi peta akan menampilkan seluruh Indonesia
    map = new google.maps.Map(document.getElementById("map-wilayah-desa"), {
      center,
      zoom: <?= $desa['zoom'] ?>,
      mapTypeId: google.maps.MapTypeId.<?= $desa['map_tipe'] ?>
    });

    kantorDesa = new google.maps.Marker({
      position: center,
      map: map,
      title: 'Kantor <?php echo ucwords($this->setting->sebutan_desa) . " " ?><?php echo ucwords($desa['nama_desa']) ?>',
      //animation: google.maps.Animation.BOUNCE,
      content: "Tampilan Info Window",
    });

    <?php if (!empty($desa['path'])) : ?>
      let polygon_desa = <?= $desa['path']; ?>;

      polygon_desa[0].map((arr, i) => {
        polygon_desa[i] = {
          lat: arr[0],
          lng: arr[1]
        }
      })

      //Style polygon
      var batasWilayah = new google.maps.Polygon({
        paths: polygon_desa,
        strokeColor: '#c31b68',
        strokeOpacity: 0.9,
        strokeWeight: 3,
        fillColor: '#fd7e14',
        fillOpacity: 0.25
      });

      batasWilayah.setMap(map)

      var infowindow = new google.maps.InfoWindow({
        content: "<div class='media text-center'><img src='<?= gambar_desa($desa['kantor_desa'], TRUE); ?>' width='140px' height='100px'><br/> <p>Kantor <?php echo ucwords($this->setting->sebutan_desa) . " " ?><?php echo ucwords($desa['nama_desa']) ?></p></div>"
      });
      infowindow.open(map, kantorDesa);

    <?php endif; ?>
  }
</script>

<!-- widget Peta Wilayah Desa -->

<div class="card table-card">
  <div class="card-header">
    <h5>Kependudukan</h5>
    <div class="card-header-right">
      <div class="btn-group card-option">
        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="feather icon-more-horizontal"></i>
        </button>
        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
          <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
          <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
          <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
          <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="card-body p-0">
    <div class="row">
      <div class="basic-map">
        <div id="map-wilayah-desa" style="height: 275px"></div>
      </div>
    </div>
    &nbsp;
    <div class="row">
      <?php $this->load->view('home/kependudukan.php'); ?>
    </div>
  </div>
</div>
 <!-- Required Js -->
 <script src="<?= base_url() ?>assets/js/vendor-all.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/js/ripple.js"></script>
    <script src="<?= base_url() ?>assets/js/pcoded.min.js"></script>

<!-- google-map Js -->
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyDsucrEdmswqYrw0f6ej3bf4M4suDeRgNA"></script>
<script src="<?= base_url() ?>assets/js/plugins/gmaps.min.js"></script>
<script src="<?= base_url() ?>assets/js/pages/google-maps.js"></script>


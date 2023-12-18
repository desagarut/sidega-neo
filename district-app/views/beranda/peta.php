<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOKTzsvtw8j-TJI8dmJ228bXASq4C-S7U&callback=initMap&v=weekly" defer></script>
<!--<script src="<?= base_url() ?>assets/
js/mapsJavaScriptAPI.js"></script>-->

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
    map = new google.maps.Map(document.getElementById("peta-desa"), {
      center,
      zoom: <?= $desa['zoom'] ?>,
      mapTypeId: google.maps.MapTypeId.<?= $desa['map_tipe'] ?>
    });

    kantorDesa = new google.maps.Marker({
      position: center,
      map: map,
      //title: 'Kantor <?php echo ucwords($this->setting->sebutan_desa) . " " ?><?php echo ucwords($desa['nama_desa']) ?>',
      animation: google.maps.Animation.BOUNCE,
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
        strokeColor: '#007bff',
        strokeOpacity: 1,
        strokeWeight: 3,
        fillColor: '<?= $desa['warna'] ?>',
        fillOpacity: 0.25
      });

      batasWilayah.setMap(map)

      var infowindow = new google.maps.InfoWindow({
                content: "<div class='avatar avatar-xl'><img src='<?= gambar_desa($desa['kantor_desa'], TRUE); ?>' class='avatar-img'><br/> <p class='text-center'><?php echo ucwords($this->setting->sebutan_desa) . " " ?><?php echo ucwords($desa['nama_desa']) ?></p></div>"
            });
            infowindow.open(map, kantorDesa);

    <?php endif; ?>
  }
</script>

<!-- widget Peta Wilayah Desa -->

<div class="mb-4 align-items-center shadow" style="position: relative;">
  <div class="map-box" style="height:450px; overflow:hidden">
    <div id="peta-desa" style="min-height:450px;"></div>
  </div>
</div>
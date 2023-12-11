<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOKTzsvtw8j-TJI8dmJ228bXASq4C-S7U&callback=initMap&v=weekly" defer></script>-->
<script src="<?= base_url() ?>assets/tiny/js/mapsJavaScriptAPI.js"></script>

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

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class='modal-body'>
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="map-wilayah-desa"></div>
                            <input type="hidden" name="lat" id="lat" value="<?= $wil_ini['lat'] ?>" />
                            <input type="hidden" name="lng" id="lng" value="<?= $wil_ini['lng'] ?>" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
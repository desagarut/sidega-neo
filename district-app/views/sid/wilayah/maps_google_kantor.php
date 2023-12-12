<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!--<script src="<?= base_url() ?>assets/js/mapsJavaScriptAPI.js"></script>-->
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOKTzsvtw8j-TJI8dmJ228bXASq4C-S7U&callback=initMap&v=weekly" defer></script>

<script>
    <?php if (!empty($wil_ini['lat'] && !empty($wil_ini['lng']))) : ?>
        var center = {
            lat: <?= $wil_ini['lat'] . ", lng: " . $wil_ini['lng']; ?>
        };
    <?php else : ?>
        var center = {
            lat: <?= $wil_atas['lat'] . ", lng: " . $wil_atas['lng'] ?>
        };
    <?php endif; ?>

    function initMap() {
        var myLatlng = new google.maps.LatLng(center.lat, center.lng);
        var mapOptions = {
            zoom: 14,
            center,
            mapTypeId: google.maps.MapTypeId.HYBRID
        }
        var map = new google.maps.Map(document.getElementById("map_lokasi"), mapOptions);

        // Place a draggable marker on the map
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            draggable: true,
            title: 'Lokasi Kantor <?php echo ucwords($this->setting->sebutan_desa) . " " ?><?php echo ucwords($desa['nama_desa']) ?>',
            animation: google.maps.Animation.BOUNCE,
        });

        marker.addListener('dragend', (e) => {
            document.getElementById('lat').value = e.latLng.lat();
            document.getElementById('lng').value = e.latLng.lng();
        })
    }
</script>
<style>
    #map_lokasi {
        z-index: 1;
        width: 100%;
        height: 400px;
        border: 1px solid #000;
        margin-top: auto;
    }
</style>

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="h5 page-title">Kantor <?= $nama_wilayah ?></h2>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form action="<?= $form_action ?>" method="post" id="validasi" enctype="multipart/form-data">
                                <div class='modal-body'>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div id="map_lokasi"></div>
                                            <input type="hidden" name="id" id="id" value="<?= $wil_ini['id'] ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class='col-sm-12'>
                                        <div class="row col-sm-7">
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label class="col-sm-4 control-label " for="lat">Lat: </label>
                                                    <input type="text" class="col-md-6" name="lat" id="lat" value="<?= $wil_ini['lat'] ?>" /><br />
                                                    <label class="col-sm-4 control-label " for="lng"> Lng: </label>

                                                    <input type="text" class="col-md-6" name="lng" id="lng" value="<?= $wil_ini['lng'] ?>" />
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="col-sm-4" for="zoom"> Zoom: </label>

                                                    <input type="text" class="col-md-6" width="5px" name="zoom" id="zoom" value="<?= $wil_ini['zoom'] ?>" /><br />
                                                    <label class="col-sm-4" for="map_tipe"> Map Tipe: </label>

                                                    <select class="input-sm pull-left" name="map_tipe" id="map_tipe">
                                                        <option value="ROADMAP" <?php selected($map_tipe, 'ROADMAP'); ?>>ROADMAP</option>
                                                        <option value="SATELLITE" <?php selected($map_tipe, 'SATELLITE'); ?>>SATELLITE</option>
                                                        <option value="HYBRID" <?php selected($map_tipe, 'HYBRID'); ?>>HYBRID</option>
                                                    </select>
                                                    <!-- <input type="text" class="col-md-6" width="5px" name="map_tipe" id="map_tipe" value="<?= $wil_ini['map_tipe'] ?>" />-->
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row col-sm-5">
                                            <a href="<?= site_url('identitas_desa') ?>" class="btn btn-social btn-box bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali"><i class="fa fa-arrow-circle-o-left"></i> Kembali</a>
                                            <?php if ($this->CI->cek_hak_akses('h')) : ?>
                                                <a href="#" class="btn btn-social btn-box btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" download="SIDeGa_Lokasi_Wilayah_<?php echo ucwords($desa['nama_desa']) ?>.gpx" id="exportGPX"><i class='fa fa-download'></i> Export ke GPX</a>
                                                <button type="reset" class="btn btn-social btn-box btn-danger btn-sm" data-dismiss="modal"><i class='fa fa-sign-out'></i> Tutup</button>
                                                <button type="submit" class="btn btn-social btn-box btn-info btn-sm"><i class='fa fa-check'></i> Simpan</button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
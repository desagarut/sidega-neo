<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!--<script src="<?= base_url() ?>assets/js/mapsJavaScriptAPI.js"></script>-->
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOKTzsvtw8j-TJI8dmJ228bXASq4C-S7U&callback=initMap&v=weekly" defer></script>

<script>
  $(document).ready(function() {
    $('#simpan_wilayah').click(function() {
      var path = $('#path').val();
      $.ajax({
          type: "POST",
          url: "<?= $form_action ?>",
          dataType: 'json',
          data: {
            path
          },
        })
        .always(function(e) {
          alert('Perubahan yang dilakukan telah berhasil disimpan! Klik Kembali untuk pindah ke halaman sebelumnya!')
        });
    });
  });

  var batasWilayah
  var map
  var gmaps

  var daerah_desa = <?= $wil_ini['path'] ?: 'null' ?>

  daerah_desa && daerah_desa[0].map((arr, i) => {
    daerah_desa[i] = {
      lat: arr[0],
      lng: arr[1]
    }
  })

  function initMap() {
    gmaps = google.maps

    <?php if (!empty($wil_ini['lat']) && !empty($wil_ini['lng'])) : ?>
      var center = {
        lat: <?= $wil_ini['lat'] ?>,
        lng: <?= $wil_ini['lng'] ?>
      }
    <?php else : ?>
      var center = {
        lat: <?= $wil_atas['lat'] ?>,
        lng: <?= $wil_atas['lat'] ?>
      }
    <?php endif; ?>


    var zoom = 13;
    map = new gmaps.Map($('#map')[0], {
      center,
      zoom,
      streetViewControl: true,
      mapTypeId: google.maps.MapTypeId.HYBRID,
    })

    <?php if (!empty($wil_ini['path'])) : ?>
      //Style polygon
      batasWilayah = new gmaps.Polygon({
        paths: daerah_desa,
        strokeColor: '#007bff',
        strokeOpacity: 1,
        strokeWeight: 3,
        fillColor: '<?= $desa['warna'] ?>',
        fillOpacity: 0.15,
        editable: true,
        draggable: false
      });

      batasWilayah.setMap(map)
      batasWilayah.addListener('mouseup', editPath)
      batasWilayah.addListener('dragend', editPath)
    <?php endif; ?>
  }

  function editPath() {
    const PATHS = this.getPath()
    const NEWPATH = []

    for (var i = 0; i < PATHS.getLength(); i++) {
      const {
        lat,
        lng
      } = PATHS.getAt(i)
      NEWPATH.push([lat(), lng()])
    }

    $('#path').val(JSON.stringify([NEWPATH]))
  }

  function polygonDelete() {
    batasWilayah.setMap(null)
    batasWilayah = null
    $('#path').val(null);
  }

  function polygonAdd() {
    const {
      lat,
      lng
    } = map.getCenter()

    // Clear existing polygon
    if (batasWilayah) polygonDelete()

    // Re new polygon in new position
    batasWilayah = new gmaps.Polygon({
      paths: [{
          lat: lat() - 0.001,
          lng: lng() - 0.002
        }, // Left
        {
          lat: lat() + 0.001,
          lng: lng() - 0.002
        }, // Right
        {
          lat: lat() + 0.001,
          lng: lng()
        }, // Top
      ],
      strokeColor: '#007bff',
      strokeOpacity: 1,
      strokeWeight: 3,
      fillColor: '<?= $desa['warna'] ?>',
      fillOpacity: 0.15,
      editable: true,
      draggable: false
    });

    batasWilayah.setMap(map)
    batasWilayah.addListener('mouseup', editPath)
    batasWilayah.addListener('dragend', editPath)
  }

  function polygonReset() {
    // Clear existing polygon
    polygonDelete()

    // Create initial / last saved polygon
    batasWilayah = new gmaps.Polygon({
      paths: daerah_desa,
      strokeColor: '#007bff',
      strokeOpacity: 1,
      strokeWeight: 3,
      fillColor: '<?= $desa['warna'] ?>',
      fillOpacity: 0.15,
      editable: true,
      draggable: false
    });

    batasWilayah.setMap(map)
    batasWilayah.addListener('mouseup', editPath)
    batasWilayah.addListener('dragend', editPath)
  }
</script>
<style>
  #float-btn {
    position: absolute;
    top: 10px;
    right: 15%;
    z-index: 5;
    font-family: 'Roboto', 'sans-serif';
  }

  #float-btn button {
    line-height: 20px;
    margin: 1px 0;
    margin-right: -5px;
    padding: 10px 15px;
    background: #ffffff;
    border: none;
    border-radius: 2px;
    font-size: initial;
    box-shadow: 1px 1px 4px 0px silver;
  }

  #float-btn button:hover {
    background: #ddd
  }

  #map {
    width: 100%;
    height: 450px;
    border: 0px solid #000;
  }
</style>

<main role="main" class="main-content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="h5 page-title">Peta <?= $nama_wilayah ?></h2>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <form action="<?= $form_action ?>" method="post" id="validasi" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <div id="float-btn">
                        <button type="button" onclick="polygonAdd()">Tambah</button>
                        <button type="button" onclick="polygonDelete()">Hapus</button>
                        <button type="button" onclick="polygonReset()">Reset</button>
                      </div>
                      <div class="map-box" style="height:450px; overflow:hidden">
                        <div id="map"></div>
                      </div>
                      <input type="hidden" id="path" name="path" value="<?= $wil_ini['path'] ?>">
                      <input type="hidden" name="id" id="id" value="<?= $wil_ini['id'] ?>" />
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-md-2 control-label">Warna blok</label>
                      <div class="col-md-2">
                        <div class="input-group my-colorpicker2">
                          <input type="text" id="warna" name="warna" class="form-control input-sm required" placeholder="#FFFFFF" value="<?= $wil_ini['warna'] ?>">
                          <div class="input-group-addon input-sm"> <i></i> </div>
                        </div>
                      </div>
                    
                      <label class="col-md-2 control-label" for="zoom"> Zoom </label>
                      <input type="text" class="col-md-2" width="5px" name="zoom" id="zoom" value="<?= $wil_ini['zoom'] ?>" /><br />
                      <label class="col-md-2" for="map_tipe"> Map Tipe: </label>
                      <div class="col-md-2">
                        <select class="input pull-left" name="map_tipe" id="map_tipe">
                          <option value="ROADMAP" <?php selected($map_tipe, 'ROADMAP'); ?>>ROADMAP</option>
                          <option value="SATELLITE" <?php selected($map_tipe, 'SATELLITE'); ?>>SATELLITE</option>
                          <option value="HYBRID" <?php selected($map_tipe, 'HYBRID'); ?>>HYBRID</option>
                        </select>
                      </div>
                    </div>
                    <?php if ($this->CI->cek_hak_akses('h')) : ?>
                      <button type="reset" class="btn btn-outline-danger btn-sm btn-sm mb-1" data-dismiss="modal"><i class='fe fe-sign-out'></i> Tutup</button>
                      <!--<button type="submit" class="btn btn-info btn-sm" data-dismiss="modal" id="simpan_wilayah"><i class='fe fe-check'></i> Simpan</button>-->
                      <button type="submit" class="btn btn-info btn-sm mb-1"><i class='fe fe-check'></i> Simpan</button>
                      <a href="#" class="btn btn-success btn-sm mb-1" download="SIDeha.gpx" id="exportGPX"><i class='fe fe-download'></i> Export ke GPX</a>
                    <?php endif; ?>
                    <a href="<?= site_url('identitas_desa') ?>" class="btn btn-outline-info btn-sm mb-1" title="Kembali"><i class="fe fe-arrow-circle-o-left"></i> Kembali</a>
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
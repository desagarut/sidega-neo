<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!--<script src="<?= base_url()?>assets/js/mapsJavaScriptAPI.js"></script>-->
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOKTzsvtw8j-TJI8dmJ228bXASq4C-S7U&callback=initMap&v=weekly"
      defer
    ></script>

<script>
<?php if (!empty($wisata['lat'] && !empty($wisata['lng']))): ?>
	var center = { lat: <?= $wisata['lat'].", lng: ".$wisata['lng']; ?> };
<?php else: ?>
	var center = { lat: <?=$desa['lat'].", lng: ".$desa['lng']?> };
<?php endif; ?>

function initMap() {
	var myLatlng = new google.maps.LatLng(center.lat, center.lng);
	var mapOptions = { zoom: 18, center, mapTypeId:google.maps.MapTypeId.HYBRID }
	var map = new google.maps.Map(document.getElementById("map_penduduk"), mapOptions);
	
	// Place a draggable marker on the map
	var marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			draggable: true,
			title: "Lokasi, <?= $wisata['nama'];?>"
	});

	marker.addListener('dragend', (e) => {
		document.getElementById('lat').value = e.latLng.lat();
		document.getElementById('lng').value = e.latLng.lng();
	})
	marker.addListener("click", () => {
    map.setZoom(19);
    map.setCenter(marker.getPosition());
  });
}
</script>
<style>
  #map_penduduk
  {
	z-index: 1;
    width: 100%;
    height: 400px;
    border: none;
	margin-top:auto;
  }
</style>

<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<h5 class="mb-2 page-title">
		<h1>Lokasi : <?=$wisata['nama']?></h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda') ?>"><i class="fe fe-home"></i> Home</a></li>
			<li><a href="<?= site_url('wisata') ?>"> Wisata</a></li>
			<li class="active">Lokasi <?=$wisata['nama']?></li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card shadow">
                <form id="validasi1" action="<?= $form_action?>" method="POST" enctype="multipart/form-data" class="form-horizontal">	
                <div class='modal-body'>
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="map_penduduk"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-12">
                           <a href="<?= site_url("wisata")?>" class="pull-left"> <button type="#" class="btn btn-primary btn-sm"><i class='fe fe-arrow-left'></i> Kembali</button></a>
                            <input type="text" name="lat" id="lat" value="<?= $wisata['lat']?>"/>
                            <input type="text" name="lng" id="lng" value="<?= $wisata['lng']?>" />
                            <button type="reset" class="btn btn-outline-danger btn-sm btn-sm " data-dismiss="modal"><i class='fe fe-refresh'></i> Reset</button>
                            <button type="submit" class="btn btn-success btn-sm"><i class='fe fe-check'></i> Simpan</button>
                        </div>
                    </div>
                </div>
                </form>
				</div>
            </div>
        </div>
	</section>
</div>
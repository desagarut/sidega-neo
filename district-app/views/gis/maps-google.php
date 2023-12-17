<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!--<script src="<?= base_url() ?>assets/js/mapsJavaScriptAPI.js"></script>-->
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOKTzsvtw8j-TJI8dmJ228bXASq4C-S7U&callback=initMap&v=weekly" defer></script>
<script src="<?= base_url() ?>assets/js/mapsJavaScriptAPI.js"></script>

<script>
	var PetaDesa
	var kantorDesa
	var BatasWilayah

	function initMap() {
		<?php if (!empty($desa['lat']) && !empty($desa['lng'])) : ?>
			var center = {
				lat: <?= $desa['lat'] ?>,
				lng: <?= $desa['lng'] ?>
			}
		<?php else : ?>
			var center = {
				lat: -7.202686,
				lng: 107.8866398,
			}
		<?php endif; ?>

		var zoom = 14
		//Jika posisi kantor desa belum ada, maka posisi peta akan menampilkan seluruh Indonesia
		PetaDesa = new google.maps.Map(document.getElementById("peta_wilayah_desa"), {
			center,
			zoom: <?= $desa['zoom'] ?>,
			mapTypeId: google.maps.MapTypeId.<?= $desa['map_tipe'] ?>
		});

		kantorDesa = new google.maps.Marker({
			position: center,
			map: PetaDesa,
			//title: 'Kantor <?php //echo ucwords($this->setting->sebutan_desa) . " " ?><?php //echo ucwords($desa['nama_desa']) ?>'.true,
            title: 'Kantor <?php echo ucwords($this->setting->sebutan_desa) . " " ?><?php echo ucwords($desa['nama_desa']) ?>',
			//icon: '<?//= gambar_desa($desa['logo']); ?>',
			content: "Tampil Foto Kantor",

		});

		<?php if (!empty($desa['path'])) : ?>
			let polygon_desa = <?= $desa['path']; ?>;

			polygon_desa[0].map((arr, i) => {
				polygon_desa[i] = {
					lat: arr[0],
					lng: arr[1]
				}
			})

			//Style polygon batas wilayah desa
			var BatasWilayah = new google.maps.Polygon({
				paths: polygon_desa,
				strokeColor: '#c31b68',
				strokeOpacity: 0.5,
				strokeWeight: 3,
				fillColor: '#fd7e14',
				fillOpacity: 0.25,
				labels: true,
			});

			BatasWilayah.setMap(PetaDesa)

			var infowindow = new google.maps.InfoWindow({
                content: "<div class='text-center'><img src='<?= gambar_desa($desa['kantor_desa'], TRUE); ?>' width='140px' height='100px'><br/> <p><?php echo ucwords($this->setting->sebutan_desa) . " " ?><?php echo ucwords($desa['nama_desa']) ?></p></div>"
            });
            infowindow.open(PetaDesa, kantorDesa);

		<?php endif; ?>

		//PENDUDUK
		<?php if ($layer_penduduk == 1 or $layer_keluarga == 1 and !empty($penduduk)) : ?>
			//Data penduduk
			var penduduk = JSON.parse('<?= addslashes(json_encode($penduduk)) ?>');
			var jml = penduduk.length;
			var foto;
			var content;
			var point_style = L.icon({
				iconUrl: '<?= base_url(LOKASI_SIMBOL_LOKASI) ?>penduduk.png',
				iconSize: [25, 36],
				iconAnchor: [13, 36],
				popupAnchor: [0, -28],
			});
			for (var x = 0; x < jml; x++) {
				if (penduduk[x].lat || penduduk[x].lng) {
					//Jika penduduk ada foto, maka pakai foto tersebut
					//Jika tidak, pakai foto default
					if (penduduk[x].foto) {
						foto = '<td><tr><img src="' + AmbilFoto(penduduk[x].foto) + '" class="foto_pend"/></td>';
					} else
						foto = '<td><img src="<?= base_url() ?>assets/files/user_pict/kuser.png" class="foto_pend"/></td>';

					//Konten yang akan ditampilkan saat marker diklik
					content =
						'<table border=0><tr>' + foto +
						'<td style="padding-left:2px"><font size="2.5" style="bold">Nama : ' + penduduk[x].nama + '</font> - ' + penduduk[x].sex +
						'<p>' + penduduk[x].umur + ' Tahun ' + penduduk[x].agama + '</p>' +
						'<p>' + penduduk[x].alamat + '</p>' +
						'<p><a href="<?= site_url("penduduk/detail/1/0/") ?>' + penduduk[x].id + '" target="ajax-modalx" rel="content" header="Rincian Data ' + penduduk[x].nama + '" >Data Rincian</a></p></td>' +
						'</tr></table>';
					//Menambahkan point ke marker
					semua_marker.push(turf.point([Number(penduduk[x].lng), Number(penduduk[x].lat)], {
						content: content,
						style: point_style
					}));
				}
			}
		<?php endif; ?>
	}
</script>
<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<form id="mainform_map" name="mainform_map" action="" method="post">
					<div class="row">
						<div class="col-md-12">
							<div class="map">
								<div id="peta_wilayah_desa" style="height: 520px"></div>
							</div>
							<?php //include("district-app/views/gis/cetak_peta.php"); ?>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
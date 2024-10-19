<?php include "header.php"; ?>
<?php
$id = $_GET['id_pasar'];
include_once "ambildata_id.php";
$obj = json_decode($data);
$id_pasar = "";
$nama_pasar_tradisional = "";
$alamat = "";
$deskripsi = "";
$jam_operasional = "";
$jumlah_kios_dan_los = "";
$lat = "";
$long = "";
$gambar = ""; // Tambahkan variabel untuk gambar

foreach ($obj->results as $item) {
  $id_pasar .= $item->id_pasar;
  $nama_pasar_tradisional .= $item->nama_pasar;
  $alamat .= $item->alamat;
  $deskripsi .= $item->deskripsi;
  $jam_operasional .= $item->jam_operasional;
  $jumlah_kios_dan_los .= $item->jumlah_kios_dan_los;
  $lat .= $item->latitude;
  $long .= $item->longitude;
  // $gambar .= $item->gambar; // Ambil data gambar
}

$title = "Detail dan Lokasi : " . $nama_pasar_tradisional;
?>

<!-- Google Maps API -->
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&callback=initMap"></script>

<script>
  function initialize() {
    var myLatlng = new google.maps.LatLng(<?php echo $lat ?>, <?php echo $long ?>);
    var mapOptions = {
      zoom: 13,
      center: myLatlng
    };

    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    var contentString = '<div id="content">' +
      '<div id="siteNotice">' +
      '</div>' +
      '<h1 id="firstHeading" class="firstHeading"><?php echo $nama_pasar_tradisional ?></h1>' +
      '<div id="bodyContent">' +
      '<p><?php echo $alamat ?></p>' +
      '</div>' +
      '</div>';

    var infowindow = new google.maps.InfoWindow({
      content: contentString
    });

    var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Maps Info',
      icon: 'img/markermap.png'
    });
    google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map, marker);
    });
  }

  google.maps.event.addDomListener(window, 'load', initialize);
</script>

<!-- start banner Area -->
<section class="about-banner relative">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
          Detail Informasi Pasar Tradisional
        </h1>
      </div>
    </div>
  </div>
</section>
<!-- End banner Area -->
<!-- Start about-info Area -->
<section class="about-info-area section-gap">
  <div class="container" style="padding-top: 120px;">
    <div class="row">
      <div class="col-md-12" data-aos="fade-up" data-aos-delay="200">
        <div class="panel panel-info panel-dashboard">
          <div class="panel-heading centered">
            <h2 class="panel-title"><strong>Informasi Pasar Tradisional</strong></h2>
          </div>
          <div class="panel-body">
            <table class="table">
              <tr>
                <th>Detail</th>
              </tr>
              <tr>
                <td>Nama Pasar Tradisional</td>
                <td>
                  <h5><?php echo $nama_pasar_tradisional ?></h5>
                </td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>
                  <h5><?php echo $alamat ?></h5>
                </td>
              </tr>
              <tr>
                <td>Deskripsi</td>
                <td>
                  <h5><?php echo $deskripsi ?></h5>
                </td>
              </tr>
              <tr>
                <td>Jam Operasional</td>
                <td>
                  <h5><?php echo $jam_operasional ?></h5>
                </td>
              </tr>
              <tr>
                <td>Jumlah Kios dan Los</td>
                <td>
                  <h5><?php echo $jumlah_kios_dan_los ?></h5>
                </td>
              </tr>
            </table>
            <div id="map"></div>
            <script>
              mapboxgl.accessToken = 'pk.eyJ1Ijoic2F0cmlhdGFtYSIsImEiOiJjbTF3Zmh6ZmwwbWx3MmtwZjQ5b25waTV5In0.2WgL12lJPTY2nbcYPP-49g';

              const map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v12',
                center: [110.84123799367941, -7.67881856209625], // Titik tujuan
                zoom: 13
              });
              console.log("<?php echo $long; ?>");
              console.log("<?php echo $lat; ?>");
              const destination = [parseFloat("<?php echo $lat; ?>"), parseFloat("<?php echo $long; ?>")]; // Titik B yang sudah ditentukan

              // Get user's current location and calculate route
              if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(position => {
                  const userLocation = [position.coords.longitude, position.coords.latitude]; // Lokasi saat ini

                  // Call the API to get route
                  getRoute(userLocation, destination);

                  // Optionally zoom the map to the user's location

                  map.flyTo({
                    center: userLocation,
                    zoom: 11
                  });
                });
              } else {
                alert("Geolocation is not supported by this browser.");
              }

              // Function to get the route from point A to point B
              async function getRoute(start, end) {
                const url = `https://api.mapbox.com/directions/v5/mapbox/driving/${start[0]},${start[1]};${end[0]},${end[1]}?geometries=geojson&access_token=${mapboxgl.accessToken}`;
                const response = await fetch(url);
                const data = await response.json();
                const route = data.routes[0].geometry.coordinates;

                // Add the route as a new layer to the map
                map.addLayer({
                  id: 'route',
                  type: 'line',
                  source: {
                    type: 'geojson',
                    data: {
                      type: 'Feature',
                      properties: {},
                      geometry: {
                        type: 'LineString',
                        coordinates: route
                      }
                    }
                  },
                  layout: {
                    'line-join': 'round',
                    'line-cap': 'round'
                  },
                  paint: {
                    'line-color': '#1DB954',
                    'line-width': 5
                  }
                });

                // Add markers for start and end points
                addMarkers(start, end);
              }

              // Function to add markers for the start and end points
              function addMarkers(start, end) {
                // Add start point marker (User's current location)
                new mapboxgl.Marker({
                    color: 'blue'
                  })
                  .setLngLat(start)
                  .addTo(map);

                // Add end point marker (Destination)
                new mapboxgl.Marker({
                    color: 'red'
                  })
                  .setLngLat(end)
                  .addTo(map)
                  .setPopup(popup);
              }

              const popup = new mapboxgl.Popup({
                offset: 25
              }).setText(
                'Pasar Ir Soekarno Sukoharjo. Jl. Ir. Soekarno, Sukoharjo, Kabupaten Sukoharjo, Jawa Tengah 57511'
              );
            </script>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- End about-info Area -->
<?php include "footer.php"; ?>
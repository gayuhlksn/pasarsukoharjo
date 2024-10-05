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
  $gambar .= $item->gambar; // Ambil data gambar
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
                <td>Gambar</td>
                <td>
                  <?php if (!empty($gambar)): ?>
                    <img src="../uploads/<?php echo htmlspecialchars($gambar); ?>" alt="Gambar Pasar" style="max-width: 100px; max-height: 100px;">
                  <?php else: ?>
                    <p>Gambar tidak tersedia</p>
                  <?php endif; ?>
                </td>
              </tr>
              <tr>
                <td>Jumlah Kios dan Los</td>
                <td>
                  <h5><?php echo $jumlah_kios_dan_los ?></h5>
                </td>
              </tr>
            </table>
            <div id="map-canvas" style="width:100%;height:380px;"></div>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- End about-info Area -->
<?php include "footer.php"; ?>
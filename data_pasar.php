<?php include "header.php"; ?>
<!-- start banner Area -->
<section class="about-banner relative">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
          Data Pasar Tradisional
        </h1>
        <p class="text-white link-nav">Halaman ini memuat informasi Pasar Tradisional di Kabupaten Sukoharjo</p>
      </div>
    </div>
  </div>
</section>
<!-- End banner Area -->

<!-- Start about-info Area -->
<section class="about-info-area section-gap">
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-8">
        <div class="panel panel-info panel-dashboard">
          <div class="panel-heading centered">
            <!-- Bisa diisi dengan judul atau teks lainnya -->
          </div>
          <div class="panel-body">
            <table class="table table-bordered table-striped table-admin">
              <thead>
              <tr>
                <th width="5%" style="text-align: center;">No.</th>
                <th width="30%" style="text-align: center;">Nama Pasar Tradisional</th>
                <th width="50%" style="text-align: center;">Alamat</th>
                <th width="35%" style="text-align: center;">Aksi</th>
              </tr>
              </thead>
              <tbody>
                <?php
                $data = file_get_contents('http://localhost/SIG-Pasar_Tradisional/ambildata.php');
                $no = 1;
                if (json_decode($data, true)) {
                  $obj = json_decode($data);
                  foreach ($obj->results as $item) {
                ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $item->nama_pasar; ?></td>
                      <td><?php echo $item->alamat; ?></td>
                      <td class="ctr" style="text-align: center; vertical-align: middle;">
                        <div class="btn-group">
                          <a href="detail.php?id_pasar=<?php echo $item->id_pasar; ?>" rel="tooltip" data-original-title="Lihat File" data-placement="top" class="btn btn-outline-primary">
                            <i class="fa fa-map-marker"></i> Detail dan Lokasi
                          </a>
                        </div>
                      </td>
                    </tr>
                <?php $no++;
                  }
                } else {
                  echo "<tr><td colspan='4' style='text-align: center;'>Data tidak ada.</td></tr>";
                } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End about-info Area -->

<?php include "footer.php"; ?>

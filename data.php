<?php
$title = "Daftar Pasar Tradisional";
include_once "header.php";
include_once "connection.php"; ?>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-info panel-dashboard">
      <div class="panel-heading centered">
        <h2 class="panel-title"><strong> - <?php echo $title ?> - </strong></h2>
      </div>
      <div class="panel-body">
        <table class="table table-bordered table-striped table-admin">
          <thead>
            <tr>
              <th width="10%">No.</th>
              <th width="30%">Nama Pasar Tradisional</th>
              <th width="13%">Alamat</th>
              <th width="20%">Jumlah Kios dan Los</th>
              <th width="27%">Aksi</th>
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
                  <td><?php echo $item->jumlah_kios_dan_los; ?></td>
                  <td class="ctr">
                    <div class="btn-group">
                      <a target="_blank" href="detail.php?id=<?php echo $item->id_sekolah; ?>" rel="tooltip" data-original-title="Lihat File" data-placement="top" class="btn btn-primary">
                        <i class="fa fa-map-marker"> </i> Detail dan Lokasi</a>&nbsp;
                    </div>
                  </td>
                </tr>
            <?php $no++;
              }
            } else {
              echo "data tidak ada.";
            } ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<?php include_once "footer.php" ?>
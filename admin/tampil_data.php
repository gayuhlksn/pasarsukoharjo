<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../tampil_data.php?pesan=belum_login");
    exit();
}
include "../connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<?php include "header.php"; ?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include "menu_sidebar.php"; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php include "menu_topbar.php"; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pasar Tradisional Kabupaten Sukoharjo</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Nama Pasar</th>
                                            <th>Alamat</th>
                                            <th>Jumlah Kios dan Los</th>
                                            <th>Deskripsi</th>
                                            <th>Jam Operasional</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $data = mysqli_query($connection, "SELECT * FROM pasar");
                                        while ($d = mysqli_fetch_array($data)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><b><a href="detail_data.php?id_pasar=<?php echo $d['id_pasar']; ?>"> <?php echo $d['nama_pasar']; ?> </a> </b></td>
                                                <td><?php echo $d['alamat']; ?></td>
                                                <td><?php echo $d['jumlah_kios_dan_los']; ?></td>
                                                <td><?php echo $d['deskripsi']; ?></td>
                                                <td><?php echo $d['jam_operasional']; ?></td>
                                                <td><?php echo $d['latitude']; ?></td>
                                                <td><?php echo $d['longitude']; ?></td>
                                                <td>
                                                    <a href="edit_data.php?id_pasar=<?php echo $d['id_pasar']; ?>" class="btn-sm btn-primary"><span class="fas fa-edit"></span></a>
                                                    <a href="hapus_aksi.php?id_pasar=<?php echo $d['id_pasar']; ?>" class="btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><span class="fas fa-trash"></span></a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Main Content -->

                <?php include "footer.php"; ?>
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->

</body>

</html>
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
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tambah Data Pasar Tradisional</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                        </div>
                        <div class="card-body">

                            <!-- Main content -->
                            <form class="form-horizontal style-form" style="margin-top: 10px;" action="tambah_aksi.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Nama Pasar*</label>
                                    <div class="col-sm-6">
                                        <input name="nama_pasar" type="text" class="form-control" placeholder="Nama Pasar" required />
                                        <small class="form-text text-muted">*Wajib diisi</small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Alamat*</label>
                                    <div class="col-sm-6">
                                        <input name="alamat" class="form-control" type="text" placeholder="Alamat" required />
                                        <small class="form-text text-muted">*Wajib diisi</small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Deskripsi*</label>
                                    <div class="col-sm-6">
                                        <input name="deskripsi" class="form-control" type="text" placeholder="Deskripsi" required />
                                        <small class="form-text text-muted">*Wajib diisi</small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Jumlah Kios dan Los*</label>
                                    <div class="col-sm-6">
                                        <input name="jumlah_kios_dan_los" class="form-control" type="text" placeholder="Jumlah Kios dan Los" required />
                                        <small class="form-text text-muted">*Wajib diisi</small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Jam Operasional*</label>
                                    <div class="col-sm-6">
                                        <input name="jam_operasional" class="form-control" type="text" placeholder="Jam Operasional" required />
                                        <small class="form-text text-muted">*Wajib diisi</small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Latitude</label>
                                    <div class="col-sm-6">
                                        <input name="latitude" class="form-control" type="text" placeholder="109.2550945" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-4 control-label">Longitude</label>
                                    <div class="col-sm-6">
                                        <input name="longitude" class="form-control" type="text" placeholder="-7.3811577" />
                                    </div>
                                </div>
                                <div class="form-group" style="margin-bottom: 20px;">
                                    <label class="col-sm-2 col-sm-4 control-label"></label>
                                    <div class="col-sm-8">
                                        <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />
                                    </div>
                                </div>
                                <div style="margin-top: 20px;"></div>
                            </form>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <?php include "footer.php"; ?>
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
</body>

</html>
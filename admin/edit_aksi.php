<?php
// koneksi database
include '../connection.php';

// menangkap data yang di kirim dari form
$id = $_POST['id_pasar'];
$nama = $_POST['nama_pasar'];
$alamat = $_POST['alamat'];
$deskripsi = $_POST['deskripsi'];
$jumlah_kios_dan_los = $_POST['jumlah_kios_dan_los'];
$jam_operasional = $_POST['jam_operasional'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

// update data ke database
mysqli_query($connection, "update pasar set nama_pasar='$nama', alamat='$alamat', deskripsi='$deskripsi', jumlah_kios_dan_los='$jumlah_kios_dan_los',jam_operasional='$jam_operasional', gambar='$gambar', latitude='$latitude', longitude='$longitude' where id_pasar='$id'");

// mengalihkan halaman kembali ke index.php
header("location:tampil_data.php");

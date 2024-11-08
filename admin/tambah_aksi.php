<?php
$host = "localhost";
$user = "userpasar";
$pass = "gayuhlksn";
$name = "sig_map4";

// Koneksi ke database
$connection = mysqli_connect($host, $user, $pass, $name);
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Mengecek apakah formulir telah di-submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari formulir
    $nama_pasar = mysqli_real_escape_string($connection, $_POST['nama_pasar']);
    $alamat = mysqli_real_escape_string($connection, $_POST['alamat']);
    $deskripsi = mysqli_real_escape_string($connection, $_POST['deskripsi']);
    $jumlah_kios_dan_los = mysqli_real_escape_string($connection, $_POST['jumlah_kios_dan_los']);
    $jam_operasional = mysqli_real_escape_string($connection, $_POST['jam_operasional']);
    $latitude = mysqli_real_escape_string($connection, $_POST['latitude']);
    $longitude = mysqli_real_escape_string($connection, $_POST['longitude']);

    // Simpan data ke database
    $query = "INSERT INTO pasar (nama_pasar, alamat, deskripsi, jumlah_kios_dan_los, jam_operasional, latitude, longitude) 
              VALUES ('$nama_pasar', '$alamat', '$deskripsi', '$jumlah_kios_dan_los', '$jam_operasional', '$latitude', '$longitude')";

    if (mysqli_query($connection, $query)) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }

    mysqli_close($connection);
}

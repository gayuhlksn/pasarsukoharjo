<?php
$host = "localhost";
$user = "root";
$pass = "";
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

    // Proses upload gambar
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($_FILES['gambar']['name']);
        $fileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

        // Validasi tipe file gambar
        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($fileType, $allowedTypes)) {
            // Pindahkan file ke direktori uploads
            if (move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadFile)) {
                echo "File valid dan berhasil diupload.\n";
            } else {
                echo "File tidak dapat diupload.\n";
                exit();
            }
        } else {
            echo "Tipe file tidak diizinkan. Hanya JPG, JPEG, PNG, dan GIF yang diperbolehkan.\n";
            exit();
        }
    } else {
        echo "Tidak ada file yang diupload atau terjadi kesalahan.\n";
        exit();
    }

    // Simpan data ke database
    $query = "INSERT INTO pasar (nama_pasar, alamat, deskripsi, jumlah_kios_dan_los, jam_operasional, gambar, latitude, longitude) 
              VALUES ('$nama_pasar', '$alamat', '$deskripsi', '$jumlah_kios_dan_los', '$jam_operasional', '".basename($_FILES['gambar']['name'])."', '$latitude', '$longitude')";

    if (mysqli_query($connection, $query)) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }

    mysqli_close($connection);
}
?>

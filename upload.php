<?php
// Konfigurasi database
$host = "localhost";
$user = "root";
$pass = "";
$name = "sig_map4";

// Membuat koneksi ke database
$connection = mysqli_connect($host, $user, $pass, $name);

if (!$connection) {
    die("Koneksi database mysqli gagal: " . mysqli_connect_error());
}

// Mengecek apakah file gambar di-upload
if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == UPLOAD_ERR_OK) {
    // Mengambil informasi file
    $fileTmpPath = $_FILES['gambar']['tmp_name'];
    $fileName = $_FILES['gambar']['name'];
    $fileSize = $_FILES['gambar']['size'];
    $fileType = $_FILES['gambar']['type'];
    
    // Menentukan lokasi penyimpanan file
    $uploadDir = 'uploads/';
    $destFilePath = $uploadDir . basename($fileName);
    
    // Memindahkan file dari temporary directory ke lokasi penyimpanan
    if (move_uploaded_file($fileTmpPath, $destFilePath)) {
        // Menyimpan informasi gambar ke database
        $sql = "INSERT INTO tabel_gambar (nama_gambar, path_gambar, ukuran, tipe) VALUES (?, ?, ?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssis", $fileName, $destFilePath, $fileSize, $fileType);

        if ($stmt->execute()) {
            echo "Gambar berhasil di-upload dan informasi disimpan ke database.";
        } else {
            echo "Terjadi kesalahan saat menyimpan informasi gambar ke database: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Terjadi kesalahan saat meng-upload gambar.";
    }
} else {
    echo "Tidak ada file gambar yang di-upload atau terjadi kesalahan saat upload.";
}

mysqli_close($connection);
?>

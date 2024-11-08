<?php
// Informasi konfigurasi database
$host = "localhost";
$user = "root";
$pass = "";
$name = "sig_map4";

// Membuat koneksi
$connection = mysqli_connect($host, $user, $pass, $name);

// Cek koneksi
if (!$connection) {
    die("Koneksi database gagal: " . mysqli_connect_error());
} else {
    echo "Koneksi berhasil!"; // Tampilkan ini hanya saat debugging, bisa dihapus saat produksi.
}

// Menutup koneksi (gunakan hanya jika dibutuhkan, atau di bagian akhir script)
mysqli_close($connection);

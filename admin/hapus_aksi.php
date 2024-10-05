<?php
// koneksi database
include '../connection.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id_pasar'];


// menghapus data dari database
$query = mysqli_query($connection, "delete from pasar where id_pasar='$id'");
if ($query) {
    echo "<script>alert('Data Berhasil Dihapus!'); window.location = 'tampil_data.php'</script>";
} else {
    echo "<script>alert('Data Gagal Dihapus!'); window.location = 'tampil_data.php'</script>";
}

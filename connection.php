<?php
$host = "localhost";
$user = "userpasar";
$pass = "gayuhlksn";
$name = "sig_map4";

// local
// $host = "localhost";
// $user = "root";
// $pass = "";
// $name = "sig_map4";


$connection = mysqli_connect($host, $user, $pass, $name);
if (mysqli_connect_errno()) {
    echo "connectionx database mysqli gagal!!! : " . mysqli_connect_error();
}

//mysqli_select_db($name, $koneksi) or die("Tidak ada database yang dipilih!");

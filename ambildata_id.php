<?php
include "connection.php";

// Pastikan $id telah di-set dengan benar
$id = $_GET['id_pasar']; // Misalnya dari query string

// Prepared statement untuk menghindari SQL Injection
$stmt = $connection->prepare("SELECT * FROM pasar WHERE id_pasar = ?");
$stmt->bind_param("i", $id); // 'i' untuk integer
$stmt->execute();

$result = $stmt->get_result();
$posts = array();

if ($result->num_rows > 0) {
        while ($post = $result->fetch_assoc()) {
                $posts[] = $post;
        }
}

// Data JSON diubah menjadi array PHP yang dapat digunakan di HTML
$data = json_encode(array('results' => $posts), true);

$stmt->close();
$connection->close();

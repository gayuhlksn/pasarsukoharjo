<?php
include "connection.php";
$Q = mysqli_query($connection, "SELECT * FROM pasar");
if ($Q) {
        $posts = array();
        if (mysqli_num_rows($Q)) {
                while ($post = mysqli_fetch_assoc($Q)) {
                        $posts[] = $post;
                }
        }
        $data = json_encode(array('results' => $posts));
        echo $data;
}

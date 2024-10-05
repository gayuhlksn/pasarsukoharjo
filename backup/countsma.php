<?php
include "connection.php";
$Q = mysqli_query($connection, "select count(nama_pasar) as sma FROM `pasar`")or die(mysqli_error());
if($Q){
 $posts = array();
      if(mysqli_num_rows($Q))
      {
             while($post = mysqli_fetch_assoc($Q)){
                     $posts[] = $post;
             }
      }  
      $data = json_encode(array('results'=>$posts));             
}

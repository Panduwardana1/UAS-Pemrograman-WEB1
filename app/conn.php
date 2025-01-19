<?php 

// Coneksi database
$conn = mysqli_connect('localhost','root','','data_akademik');
if(!$conn) {
  die("Koneksi gagal".mysqli_connect_error($conn));
}

?>
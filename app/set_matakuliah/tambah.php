<?php 
include '../conn.php';

if(isset($_POST['kirim'])) {
  if (empty($_POST['kode_matakuliah']) && empty($_POST['nama_matakuliah']) 
  && empty($_POST['sks'])){

  echo "<script>
    alert('DATA TIDAK BOLEH KOSONG');
    window.location.href = 'tambah.php';
  </script>";
  }

  $kode_matakuliah = $_POST['kode_matakuliah'];
  $nama_matakuliah = $_POST['nama_matakuliah'];
  $sks = $_POST['sks'];

  $query = "INSERT INTO matakuliah (
            kode_matakuliah,
            nama_matakuliah,
            sks)
  VALUES (
  '$kode_matakuliah', '$nama_matakuliah','$sks')";

  $result =  mysqli_query($conn, $query);

  if($result) {
    header('location:../matakuliah.php');
  }
  return $result;

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data</title>
</head>
<body>

<h1>Data Matakuliah</h1>

<form action="" method="POST">

<ul>
  <li>
    <label for="kode_mk">Kode MK</label>
    <input type="text" name="kode_matakuliah" id="kode_mk">
  </li>
  <li>
    <label for="nama_mk">Nama Matakuliah</label>
    <input type="text" name="nama_matakuliah" id="nama_mk">
  </li>
  <li>
    <label for="sks">SKS</label>
    <input type="text" name="sks" id="sks">
  </li>
  <button type="submit" name="kirim">Kirim</button>
</ul>
</form>

<a href="../matakuliah.php">Kembali</a>

</body>
</html>



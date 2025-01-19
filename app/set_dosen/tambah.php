<?php 
include '../conn.php';



if(isset($_POST['kirim'])) {
  if (empty($_POST['nidn']) && empty($_POST['nama_dosen'])){
  echo "<script>
    alert('DATA TIDAK BOLEH KOSONG');
    window.location.href = 'tambah.php';
  </script>";
  }

  $nidn = $_POST['nidn'];
  $namaDosen = $_POST['nama_dosen'];

  $query = "INSERT INTO dosen (
            nidn,
            nama_dosen)
  VALUES (
  '$nidn', '$namaDosen')";

  $result =  mysqli_query($conn, $query);

  return $result;

  if($result) {
    header('Location:../dosen.php');
    exit;
  } else {
    echo "
    <script>
      alert('Data GAGAL di tambahkan');
      window.Location.href = '../dosen.php';
    </script>
    ";
  }

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

<h1>Data Dosen</h1>

<form action="" method="POST">

<ul>
  <li>
    <label for="NIDN">NIDN</label>
    <input type="text" name="nidn" id="nidn">
  </li>
  <li>
    <label for="nama_dosen">Nama Dosen</label>
    <input type="text" name="nama_dosen" id="nama_dosen">
  </li>
  <button type="submit" name="kirim">Kirim</button>
</ul>
</form>

<a href="../dosen.php">Kembali</a>

</body>
</html>
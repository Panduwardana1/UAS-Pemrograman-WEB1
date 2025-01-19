<?php
include "function.php";
include "conn.php";

$dosen = "SELECT * FROM dosen ORDER BY nidn ASC";
$result = mysqli_query($conn, $dosen);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">  
  <title>Pusat Data Akademik</title>
</head>
<body>
  <nav class="container">
    <div class="menu">
      <h1>SSH</h1>
      <li>
        <a href="perkuliahan.php">Perkuliahan</a>
        <a href="mahasiswa.php">Mahasiswa</a>
        <a href="dosen.php">Dosen</a>
        <a href="matakuliah.php">Matakuliah</a>
      </li>
    </div>
  </nav>

  <a href="set_dosen/tambah.php" class="tambah_data">Tambah data</a>

  <table cellspacing="1" cellpadding="10" border="1">
    <tr>
      <td>No</td>
      <td>NIDN</td>
      <td>Nama Dosen</td>
      <td>Aksi</td>
      
    </tr>
  <?php $i = 1; ?>
  <?php while ($dosen = mysqli_fetch_assoc($result)) : ?>
    <tr>
      <td><?= $i++ ?></td>
      <td><?= $dosen["nidn"] ?></td>
      <td><?= $dosen["nama_dosen"] ?></td>
      <td>
      <a href="set_dosen/edit.php?nim=<?= $dosen['nidn'] ?>">Edit</a>
      <a href="set_dosen/hapus.php?nim=<?= $dosen['nidn'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
    </td>
    </tr>
  <?php endwhile ; ?>
  </table>
</body>
</html>

<?php
include "function.php";
include "conn.php";

$mahasiswa = "SELECT * FROM mahasiswa ORDER BY nim ASC";
$result = mysqli_query($conn, $mahasiswa);

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
      <li>
        <a href="perkuliahan.php">Perkuliahan</a>
        <a href="mahasiswa.php">Mahasiswa</a>
        <a href="dosen.php">Dosen</a>
        <a href="matakuliah.php">Matakuliah</a>
      </li>
    </div>
  </nav>

  <a href="set mahasiswa/tambah.php" class="tambah_data">Tambah data</a>

  <table cellspacing="1" cellpadding="10" border="1">
    <tr>
      <td>No</td>
      <td>NIM</td>
      <td>Nama</td>
      <td>Tgl Lahir</td>
      <td>Alamat</td>
      <td>Jeniskel</td>
      <td>Action</td>
    </tr>
  <?php $i = 1; ?>
  <?php while ($mhs = mysqli_fetch_assoc($result)) : ?>
    <tr>
      <td><?= $i++ ?></td>
      <td><?= $mhs["nim"] ?></td>
      <td><?= $mhs["nama_mahasiswa"] ?></td>
      <td><?= $mhs["tgl_lahir"] ?></td>
      <td><?= $mhs["alamat"] ?></td>
      <td><?= $mhs["jenis_kelamin"] ?></td>
      <td>
      <a href="set mahasiswa/edit.php?nim=<?= $mhs['nim'] ?>">Edit</a>
      <a href="set mahasiswa/hapus.php?nim=<?= $mhs['nim'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
    </td>
    </tr>
  <?php endwhile ; ?>
  </table>
</body>
</html>

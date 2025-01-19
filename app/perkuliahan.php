<?php
include "function.php";
include "conn.php";

$perkuliahan = "SELECT * FROM perkuliahan ORDER BY nim ASC";
$result = mysqli_query($conn, $perkuliahan);
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
      <li class="list">
        <a href="perkuliahan.php">Perkuliahan</a>
        <a href="mahasiswa.php">Mahasiswa</a>
        <a href="dosen.php">Dosen</a>
        <a href="matakuliah.php">Matakuliah</a>
      </li>
    </div>
  </nav>

  <a href="set_perkuliahan/tambah.php" class="tambah_data">Tambah data</a>

  <table cellspacing="1" cellpadding="10" border="1">
    <tr>
      <td>No</td>
      <td>NIM</td>
      <td>Kode Mk</td>
      <td>NIDN</td>
      <td>Nilai</td>
      <td>Action</td>
    </tr>
    <?php $i = 1; ?>
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
      <tr>
        <td><?= $i++ ?></td>
        <td><?= $row["nim"] ?></td>
        <td><?= $row["kode_matakuliah"] ?></td>
        <td><?= $row["nidn"] ?></td>
        <td><?= $row["nilai"] ?></td>
        <td>
          <a href="set_perkuliahan/edit.php?nim=<?= $row['nim'] ?>&kode_matakuliah=<?= $row['kode_matakuliah'] ?>&nidn=<?= $row['nidn'] ?>">Edit</a>
          <a href="set_perkuliahan/hapus.php?nim=<?= $row['nim'] ?>&kode_matakuliah=<?= $row['kode_matakuliah'] ?>&nidn=<?= $row['nidn'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
        </td>
      </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>

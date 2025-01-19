<?php
include "function.php";
include "conn.php";

$matakuliah = "SELECT * FROM matakuliah ORDER BY kode_matakuliah ASC";
$result = mysqli_query($conn, $matakuliah);

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
        <a href="perkuliahan.php">dashboard</a>
        <a href="mahasiswa.php">Mahasiswa</a>
        <a href="dosen.php">Dosen</a>
        <a href="matakuliah.php">Matakuliah</a>
      </li>
    </div>
  </nav>
  <a href="set_matakuliah/tambah.php" class="tambah_data">Tambah data</a>

  <table cellspacing="1" cellpadding="10" border="1">
    <tr>
      <td>No</td>
      <td>Kode Mk</td>
      <td>Nama Mk</td>
      <td>SKS</td>
      <td>Action</td>
    </tr>
  <?php $i = 1; ?>
  <?php while ($kdMk = mysqli_fetch_assoc($result)) : ?>
    <tr>
      <td><?= $i++ ?></td>
      <td><?= $kdMk["kode_matakuliah"] ?></td>
      <td><?= $kdMk["nama_matakuliah"] ?></td>
      <td><?= $kdMk["sks"] ?></td>
      <td>
      <a href="set_matakuliah/edit.php?kode_matakuliah=<?= $kdMk['kode_matakuliah'] ?>">Edit</a>
      <a href="set_matakuliah/hapus.php?kode_matakuliah=<?= $kdMk['kode_matakuliah'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
    </td>
    </tr>
  <?php endwhile;?>
  </table>
</body>
</html>

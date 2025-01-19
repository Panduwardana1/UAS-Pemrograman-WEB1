<?php
include "../conn.php";

if (isset($_GET['nim']) && isset($_GET['kode_matakuliah']) && isset($_GET['nidn'])) {
  $nim = $_GET['nim'];
  $kode_matakuliah = $_GET['kode_matakuliah'];
  $nidn = $_GET['nidn'];

  // Mengambil data perkuliahan berdasarkan NIM, Kode Mata Kuliah, dan NIDN
  $query = "SELECT * FROM perkuliahan WHERE nim='$nim' AND kode_matakuliah='$kode_matakuliah' AND nidn='$nidn'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['submit'])) {
  $nim = $_POST['nim'];
  $kode_matakuliah = $_POST['kode_matakuliah'];
  $nidn = $_POST['nidn'];
  $nilai = $_POST['nilai'];

  // Update data perkuliahan
  $updateQuery = "UPDATE perkuliahan SET nilai='$nilai' WHERE nim='$nim' AND kode_matakuliah='$kode_matakuliah' AND nidn='$nidn'";
  if (mysqli_query($conn, $updateQuery)) {
    echo "Data berhasil diperbarui!";
    header("Location: ../perkuliahan.php"); // Redirect kembali ke halaman perkuliahan
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data Perkuliahan</title>
</head>
<body>
  <h1>Edit Data Perkuliahan</h1>
  <form method="POST">
    <label for="nim">NIM: </label>
    <input type="text" name="nim" value="<?= $row['nim'] ?>" readonly><br><br>

    <label for="kode_matakuliah">Kode Mata Kuliah: </label>
    <input type="text" name="kode_matakuliah" value="<?= $row['kode_matakuliah'] ?>" readonly><br><br>

    <label for="nidn">NIDN: </label>
    <input type="text" name="nidn" value="<?= $row['nidn'] ?>" readonly><br><br>

    <label for="nilai">Nilai: </label>
    <input type="text" name="nilai" value="<?= $row['nilai'] ?>"><br><br>

    <input type="submit" name="submit" value="Simpan Perubahan">
  </form>
  <a href="../perkuliahan.php">Kembali</a>
</body>
</html>

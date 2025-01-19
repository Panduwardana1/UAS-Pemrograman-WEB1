<?php
include "../conn.php";

// Query untuk mengambil data dari tabel mahasiswa, dosen, dan matakuliah
$mahasiswa = mysqli_query($conn, "SELECT nim, nama_mahasiswa FROM mahasiswa");
$dosen = mysqli_query($conn, "SELECT nidn, nama_dosen FROM dosen");
$matakuliah = mysqli_query($conn, "SELECT kode_matakuliah, nama_matakuliah FROM matakuliah");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nim = $_POST['nim'];
    $kode_matakuliah = $_POST['kode_matakuliah'];
    $nidn = $_POST['nidn'];
    $nilai = $_POST['nilai'];

    // Query untuk menyimpan data ke tabel perkuliahan
    $sql = "INSERT INTO perkuliahan (nim, kode_matakuliah, nidn, nilai) VALUES ('$nim', '$kode_matakuliah', '$nidn', '$nilai')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='../perkuliahan.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Perkuliahan</title>
</head>
<body>
  <h1>Tambah Data Perkuliahan</h1>
  <form action="" method="POST">
    <label for="nim">Mahasiswa</label>
    <select name="nim" id="nim" required>
      <option value="">Pilih Mahasiswa</option>
      <!-- Dropdown mahasiswa -->
      <?php while ($row = mysqli_fetch_assoc($mahasiswa)) : ?>
        <option value="<?= $row['nim'] ?>"><?= $row['nim'] ?> - <?= $row['nama_mahasiswa'] ?></option>
      <?php endwhile; ?>
    </select><br><br>

    <label for="kode_matakuliah">Matakuliah</label>
    <select name="kode_matakuliah" id="kode_matakuliah" required>
      <option value="">Pilih Matakuliah</option>
      <!-- Dropdown matakuliah -->
      <?php while ($row = mysqli_fetch_assoc($matakuliah)) : ?>
        <option value="<?= $row['kode_matakuliah'] ?>"><?= $row['kode_matakuliah'] ?> - <?= $row['nama_matakuliah'] ?></option>
      <?php endwhile; ?>
    </select><br><br>

    <label for="nidn">Dosen</label>
    <select name="nidn" id="nidn" required>
      <option value="">Pilih Dosen</option>
      <!-- Dropdown dosen -->
      <?php while ($row = mysqli_fetch_assoc($dosen)) : ?>
        <option value="<?= $row['nidn'] ?>"><?= $row['nidn'] ?> - <?= $row['nama_dosen'] ?></option>
      <?php endwhile; ?>
    </select><br><br>

    <label for="nilai">Nilai</label>
    <input type="text" name="nilai" id="nilai" maxlength="3" required><br><br>

    <button type="submit">Simpan</button>
  </form>
  <a href="../perkuliahan.php">Kembali</a>
</body>
</html>

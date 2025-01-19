<?php 
include "../function.php";
include "../conn.php";

if (isset($_POST['tambah'])) {
if (tambahDataMhs($_POST)){
  echo"
    <script>
      alert('Data berhasil di tambahkan');
      window.location.href = '../mahasiswa.php';
    </script>
  ";
} else {
  echo"
    <script>
      alert('Data gagal ditambahkan');
      window.location.href = 'tambah.php';
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
  <title>Tambah data</title>
</head>
<body>
  <h1> Tambah data mahasiswa</h1><br>
  <a href="../mahasiswa.php">Kembali</a>
  <form action="" method="POST">
    <label for="nim">NIM</label><br>
    <input type="text" name="nim" id="nim"><br>
    <label for="nama_mahasiswa">Nama</label><br>
    <input type="text" name="nama_mahasiswa" id="nama_mahasiswa"><br>
    <label for="tgl_lahir">Tanggal Lahir</label><br>
    <input type="date" name="tgl_lahir" id="tgl_lahir"><br>
    <label for="tgl_lahir">Alamat</label><br>
    <input type="text" name="alamat" id="alamat"><br>
    <label for="alamat">Jneis Kelamin</label><br>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
          <option value="P">Laki-laki</option>
          <option value="P">Perempuan</option>
        </select><br>
    <button type="submit" name="tambah" id="tambah">Tambah</button>
  </form>
  <a href="../index.php">Dashboard</a>
</body>
</html>


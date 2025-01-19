<?php
include "../conn.php";

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];

    $query = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
    $result = mysqli_query($conn, $query);
    $mhs = mysqli_fetch_assoc($result);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $old_nim = $_POST['old_nim'];
    $new_nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    $update_query = "UPDATE mahasiswa SET
        nama_mahasiswa = '$nama', 
        tgl_lahir = '$tgl_lahir', 
        alamat = '$alamat', 
        jenis_kelamin = '$jenis_kelamin' 
        WHERE nim = '$old_nim'";

    if (mysqli_query($conn, $update_query)) {
        echo "Data berhasil diupdate!";
        header("Location: ../mahasiswa.php");
        exit;
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
</head>
<body>
    <h1>Edit Data Mahasiswa</h1>
    <form action="" method="POST">
        <input type="hidden" name="old_nim" value="<?= $mhs['nim'] ?>">
        
        <label for="nim">NIM:</label><br>
        <input type="text" id="nim" name="nim" value="<?= $mhs['nim'] ?>" required><br><br>
        
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" value="<?= $mhs['nama_mahasiswa'] ?>" required><br><br>
        
        <label for="tgl_lahir">Tanggal Lahir:</label><br>
        <input type="date" id="tgl_lahir" name="tgl_lahir" value="<?= $mhs['tgl_lahir'] ?>" required><br><br>
        
        <label for="alamat">Alamat:</label><br>
        <input type="text" id="alamat" name="alamat" value="<?= $mhs['alamat'] ?>" required><br><br>
        
        <label for="jenis_kelamin">Jenis Kelamin:</label><br>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="L" <?= $mhs['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
            <option value="P" <?= $mhs['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
        </select><br><br>
        
        <button type="submit">Simpan</button>
    </form>
</body>
</html>

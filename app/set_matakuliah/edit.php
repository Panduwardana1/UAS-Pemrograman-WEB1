<?php
include "../conn.php";


if (isset($_GET['kode_matakuliah'])) {
    $matakuliah = $_GET['kode_matakuliah'];


    $query = "SELECT * FROM matakuliah WHERE kode_matakuliah = '$matakuliah'";
    $result = mysqli_query($conn, $query);

    
    if ($result) {
        $matakuliah = mysqli_fetch_assoc($result);
    } else {
        echo "Data MATAKULIAH tidak ditemukan";
        exit;
    }
} else {
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode_matakuliah = $_POST['kode_matakuliah'];
    $nama_matakuliah = $_POST['nama_matakuliah'];
    $sks = $_POST['sks'];


    $update_query = "UPDATE matakuliah SET
        kode_matakuliah = '$kode_matakuliah',
        nama_matakuliah = '$nama_matakuliah',
        sks = '$sks'
        WHERE kode_matakuliah = '$kode_matakuliah'";

    if (mysqli_query($conn, $update_query)) {
        echo "Data berhasil diupdate!";
        header("Location: ../matakuliah.php"); 
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
    <title>Edit Data</title>
</head>
<body>
    <h1>Edit Data Matakuliah</h1>
    <form action="" method="POST">
        
        <label for="kode_matakuliah">Kode matakuliah</label><br>
        <input type="text" id="kode_matakuliah" name="kode_matakuliah" value="<?= $matakuliah['kode_matakuliah'] ?>" readonly required><br><br>
        
        <label for="nama_matakuliah">Nama Matakuliah</label><br>
        <input type="text" id="nama_matakuliah" name="nama_matakuliah" value="<?= $matakuliah['nama_matakuliah'] ?>" required><br><br>
        
        <label for="sks">SKS</label><br>
        <input type="text" id="sks" name="sks" value="<?= $matakuliah['sks'] ?>" required><br><br>
        
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>

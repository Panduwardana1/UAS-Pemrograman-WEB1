<?php
include "../conn.php";


if (isset($_GET['nim'])) {
    $nidn = $_GET['nim'];


    $query = "SELECT * FROM dosen WHERE nidn = '$nidn'";
    $result = mysqli_query($conn, $query);

    
    if ($result) {
        $dosen = mysqli_fetch_assoc($result);
    } else {
        echo "Data dosen tidak ditemukan.";
        exit;
    }
} else {
    echo "NIDN tidak ditemukan di URL.";
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nidn = $_POST['nidn'];
    $nama_dosen = $_POST['nama_dosen'];


    $update_query = "UPDATE dosen SET
        nama_dosen = '$nama_dosen' 
        WHERE nidn = '$nidn'";

    if (mysqli_query($conn, $update_query)) {
        header("Location: ../dosen.php");
        exit;
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
    <title>Edit Data Dosen</title>
</head>
<body>
    <h1>Edit Data Dosen</h1>
    <form action="" method="POST">
        
        <label for="nidn">NIDN:</label><br>
        <input type="text" id="nidn" name="nidn" value="<?= $dosen['nidn'] ?>"><br><br>
        
        <label for="nama_dosen">Nama:</label><br>
        <input type="text" id="nama_dosen" name="nama_dosen" value="<?= $dosen['nama_dosen'] ?>" ><br><br>
        
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>

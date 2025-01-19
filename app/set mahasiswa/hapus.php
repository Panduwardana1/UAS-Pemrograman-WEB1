<?php
include "../conn.php";

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];

    // Query untuk menghapus data berdasarkan NIM
    $delete_query = "DELETE FROM mahasiswa WHERE nim = '$nim'";

    if (mysqli_query($conn, $delete_query)) {
        echo "Data mahasiswa berhasil dihapus!";
        header("Location: ../mahasiswa.php");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    echo "NIM tidak ditemukan!";
    exit;
}
?>

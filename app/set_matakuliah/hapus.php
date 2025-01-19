<?php
include "../conn.php";

if (isset($_GET['kode_matakuliah'])) {
    $kodeMk = $_GET['kode_matakuliah'];

    $delete_query = "DELETE FROM matakuliah WHERE kode_matakuliah = '$kodeMk'";

    if (mysqli_query($conn, $delete_query)) {
        echo "
            <script>
                alert('Data Mata kuliah berhasil dihapus!');
            </script>
        ";
        header ("Location:../matakuliah.php");
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    echo "Kode Mata Kuliah tidak ditemukan!";
    exit;
}
?>

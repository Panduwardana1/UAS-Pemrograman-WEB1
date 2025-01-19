<?php
include "../conn.php";

// Pastikan parameter 'nidn' ada di URL
if (isset($_GET['nim'])) {
    $nidn = $_GET['nim'];

    $delete_query = "DELETE FROM dosen WHERE nidn = '$nidn'";

    if (mysqli_query($conn, $delete_query)) {
        echo "
            <script>
                alert('Data dosen berhasil dihapus!');
            </script>
        ";
        header ("Location:../dosen.php");
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    echo "NIDN tidak ditemukan!";
    exit;
}
?>

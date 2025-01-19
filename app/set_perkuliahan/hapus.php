<?php
include "../conn.php";

if (isset($_GET['nim']) && isset($_GET['kode_matakuliah']) && isset($_GET['nidn'])) {
  $nim = $_GET['nim'];
  $kode_matakuliah = $_GET['kode_matakuliah'];
  $nidn = $_GET['nidn'];


  $hapusData = "DELETE FROM perkuliahan WHERE nim='$nim' AND kode_matakuliah='$kode_matakuliah' AND nidn='$nidn'";

  if (mysqli_query($conn, $hapusData)) {
    echo "Data berhasil dihapus!";
    header("Location: ../perkuliahan.php");
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}
?>

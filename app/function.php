<?php 
include "conn.php";

// Function query
function query($query){
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result) ){
      $rows[] = $row;
  };
  return $rows;
};

//Tambah data mahasiswa
function tambahDataMhs ($data) {
    global $conn;

    $nim = $data['nim'];
    $namaMhs = $data['nama_mahasiswa'];
    $tgl_lhair = $data['tgl_lahir'];
    $alamat = $data['alamat'];
    $jenis_kelamin = $data['jenis_kelamin'];

    $query = "INSERT INTO mahasiswa (
              nim,
              nama_mahasiswa,
              tgl_lahir,
              alamat,
              jenis_kelamin)
    VALUES (
    '$nim', '$namaMhs','$tgl_lhair','$alamat','$jenis_kelamin')";

    $result =  mysqli_query($conn, $query);

    return $result;
}

//Tambah data Matakuliah
function tambahMatakuliah ($data) {
    global $conn;

    $kodeMk = $data['kode_matakuliah'];
    $namaMk = $data['nama_matakuliah'];
    $sks = $data['sks'];

    $query = "INSERT INTO matakuliah (
              kode_matakuliah,
              nama_matakuliah,
              sks)
    VALUES (
    '$kodeMk', '$namaMk','$sks')";

    $result =  mysqli_query($conn, $query);

    return $result;

}

function perkuliahan ($data) {
    global $conn;

    $nim = $data['nim'];
    $kodeMk = $data['kode_matakuliah'];
    $nidn = $data['nidn'];
    $nilai = $data['nilai'];

    $query = "INSERT INTO perkuliahan (
              nim,
              kode_matakuliah,
              nidn,
              nilai)
    VALUES (
    '$nim', '$kodeMk','$nidn','$nilai')";

    $result =  mysqli_query($conn, $query);

    return $result;

}

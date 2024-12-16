<?php
include '../../inc/koneksi.php';

if(isset($_GET["kecamatan_id"])){
  $kecamatan_id = intval($_GET["kecamatan_id"]);
  
  $query = "SELECT id, nama FROM tb_desa WHERE kecamatan_id = $kecamatan_id";
  $sql = mysqli_query($koneksi, $query);
  $desaList = [];
  while ($hasil = mysqli_fetch_assoc($sql)){
    $desaList[] = $hasil;
  }

  header('Content-Type: application/json');
  echo json_encode($desaList);
}
?>
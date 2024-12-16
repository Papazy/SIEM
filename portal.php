<?php
//Mulai Sesion
//KONEKSI DB
include "inc/koneksi.php";
session_start();
// cek apakah sesi sudah ada atau belum
if (isset($_SESSION["ses_username"]) != "") {
    $data_id = $_SESSION["ses_id"];
    $data_nama = $_SESSION["ses_nama"];
    $data_user = $_SESSION["ses_username"];
    $data_level = $_SESSION["ses_level"];
}


$total_data = 0;
$query = "SELECT COUNT(id) as total FROM tb_penduduk";
$result = mysqli_query($koneksi, $query);
$raw_data = mysqli_fetch_assoc($result);
$total_data = $raw_data['total'];
// mendapatkan data
$data = [];
$query = "SELECT * FROM tb_penduduk";
$result = mysqli_query($koneksi, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
// mengubah data menjadi JSON
// $data = json_encode($data);

// echo $data;

$query = "
    SELECT k.nama AS kecamatan, COUNT(p.id) AS jumlah_orang
    FROM tb_penduduk p
    JOIN tb_desa d ON p.desa = d.id
    JOIN tb_kecamatan k ON d.kecamatan_id = k.id
    GROUP BY k.id
";

// Eksekusi query
$result = mysqli_query($koneksi, $query);


$max_jumlah_orang = 0;
$max_jumlah_orang_bulat = 0;
$data_kecamatan = [];
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['jumlah_orang'] > $max_jumlah_orang) {
        $max_jumlah_orang = $row['jumlah_orang'];
    }
    $data_kecamatan[] = $row;
}
$max_jumlah_orang_bulat = ceil($max_jumlah_orang / 50) * 50;

// mendapatkan jumlah data laki-laki dan perempuan
$query = "SELECT COUNT(id) as total FROM tb_penduduk WHERE jk = 'LK'";
$result = mysqli_query($koneksi, $query);
$raw_data = mysqli_fetch_assoc($result);
$total_laki_laki = $raw_data['total'];
$total_perempuan = $total_data - $total_laki_laki;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa Aktif</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="dist/css/style.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <div class="mx-auto d-flex align-items-center " style="position: relative; gap: 50rem;">
                <a href="index.php" class="navbar-brand d-flex align-items-center">
                    <img src="dist/img/logo.png" alt="Logo" class="brand-image" style="opacity: .8;" width="50px">
                    <div class="d-flex flex-column" style="text-align: start;">
                        <span class="font-weight-bold text-primary" style="font-size: 1.2rem;">PORTAL DATA</span>
                        <span class="font-weight-medium text-secondary" style="font-size: 1rem;">Sistem Informasi Ekonomi Masyarakat</span>
                    </div>
                </a>


                <!-- jika ada session maka tombol mengarah ke dashbaoard -->
                <?php if (isset($_SESSION["ses_username"])) : ?>
                    <a href="./" class="btn btn-primary">Dashboard</a>
                <?php else : ?>
                    <a href="login.php" class="btn btn-primary">Login</a>
                <?php endif; ?>

            </div>
        </div>
    </nav>

    <div class="container-fluid bg-primary text-white p-4">
        <h2 class="text-center">Data Masyarakat Miskin</h2>
        <p class="text-center">Sistem Informasi Ekonomi Masyarakat Kota Banda Aceh</p>
        <!-- <p class="text-center text-danger">Data diperbaharui pada <span id="update-time">16/12/2024 07:28:19 AM</span></p> -->


        <!-- Filter -->
        <!-- <div class="container mt-4">
            <div class="row">
                <div class="col-md-3">
                    <label>Jenis Kelamin</label>
                    <select class="form-control" id="semester">
                        <option value="ganjil2024">Laki-laki</option>
                        <option value="ganjil2024">Perempuan</option>
                    </select>
                </div>

            </div>
        </div> -->

        <!-- Total Data -->
        <div class="d-flex flex-column justify-content-center align-items-center w-100 my-4" style="gap:2rem;">

            <div class="text-center">
                <h1 id="total-data" style="font-size: 4rem;"><?= $total_data ?></h1>
                <p>Total Data</p>
            </div>
            <div class="d-flex justify-content-center align-items-end w-100" style="gap:2rem; margin-top: -2rem;">
                <div class="text-center">
                    <h1 id="total-data" style="font-size: 1.5rem;  color:lightgrey"><?= $total_laki_laki ?></h1>
                    <p style="font-size: 0.8rem;">Laki-laki</p>
                </div>
                <div class="text-center">
                    <h1 id="total-data" style="font-size: 1.5rem;  color:lightgrey"><?= $total_perempuan ?></h1>
                    <p style="font-size: 0.8rem;">Perempuan</p>
                </div>
            </div>

        </div>

        <!-- Grafik Bar -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="list-unstyled">
                        <?php

                        // Menampilkan data dalam bentuk bar chart
                        foreach ($data_kecamatan as $kecamatan_data) {
                            echo "<li class='mb-2'>
                                <div class='d-flex justify-content-between'>
                                    <span>{$kecamatan_data['kecamatan']}</span>
                                    <span>{$kecamatan_data['jumlah_orang']}</span>
                                </div>
                                <div class='progress'>
                                    <div class='progress-bar bg-warning' role='progressbar' style='width: " . ($kecamatan_data['jumlah_orang'] / $max_jumlah_orang_bulat * 100) . "%'></div>
                                </div>
                              </li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Menampilkan berdasarkan umur -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center my-4">Data Berdasarkan Umur</h2>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data as $row) {
                            echo "<tr>
                                <td>{$no}</td>
                                <td>{$row['nik']}</td>
                                <td>{$row['nama']}</td>
                                <td>{$row['tempat_lahir']}, {$row['tgl_lahir']}</td>
                                <td>{$row['jk']}</td>
                                <td>{$row['alamat']}</td>
                            </tr>";
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    

    <!-- Bootstrap JS & jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
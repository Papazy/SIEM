<?php

    if(isset($_GET['id'])){
        $sql_cek = "SELECT * from tb_penduduk where id ='".$_GET['id']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-user"></i> Detail Penduduk</h3>
		</h3>
		<div class="card-tools">
		</div>
	</div>
	<div class="card-body p-0">
	<table class="table">
    <tbody>
        <tr>
            <td style="width: 150px">
                <b>NIK</b>
            </td>
            <td>:
                <?php echo $data_cek['nik']; ?>
            </td>
        </tr>
        <tr>
            <td style="width: 150px">
                <b>Nama</b>
            </td>
            <td>:
                <?php echo $data_cek['nama']; ?>
            </td>
        </tr>
        <tr>
            <td style="width: 150px">
                <b>TTL</b>
            </td>
            <td>:
                <?php echo $data_cek['tempat_lahir']; ?>
                /
                <?php echo $data_cek['tgl_lahir']; ?>
            </td>
        </tr>
        <tr>
            <td style="width: 150px">
                <b>Jenis Kelamin</b>
            </td>
            <td>:
                <?php echo $data_cek['jk']; ?>
            </td>
        </tr>
        <tr>
            <td style="width: 150px">
                <b>Alamat</b>
            </td>
            <td>:
                <?php 
                    // Menampilkan nama desa berdasarkan id
                    $queryDesa = "SELECT * FROM tb_desa WHERE id='".$data_cek['desa']."'";
                    $desaData = mysqli_query($koneksi, $queryDesa);
                    $desa = mysqli_fetch_array($desaData, MYSQLI_ASSOC);
                    
                    // Menampilkan nama kecamatan berdasarkan kecamatan_id dari desa
                    $queryKecamatan = "SELECT nama FROM tb_kecamatan WHERE id='".$desa['kecamatan_id']."'";
                    $kecamatanData = mysqli_query($koneksi, $queryKecamatan);
                    $kecamatan = mysqli_fetch_array($kecamatanData, MYSQLI_ASSOC);
                    
                    // Menampilkan desa, kecamatan, RT, dan RW
                    echo $desa['nama'] . ", " . $kecamatan['nama']; 
                ?>
            </td>
        </tr>
        <tr>
            <td style="width: 150px">
                <b>Agama</b>
            </td>
            <td>:
                <?php echo $data_cek['agama']; ?>
            </td>
        </tr>
        <tr>
            <td style="width: 150px">
                <b>Status Kawin</b>
            </td>
            <td>:
                <?php echo $data_cek['status']; ?>
            </td>
        </tr>
        <tr>
            <td style="width: 150px">
                <b>Pekerjaan</b>
            </td>
            <td>:
                <?php echo $data_cek['pekerjaan']; ?>
            </td>
        </tr>
        <tr>
            <td style="width: 150px">
                <b>Pendidikan</b>
            </td>
            <td>:
                <?php echo $data_cek['pendidikan']; ?>
            </td>
        </tr>
    </tbody>
</table>

		<div class="card-footer">
			<a href="?page=data-pend" class="btn btn-warning">Kembali</a>
		</div>
	</div>
</div>
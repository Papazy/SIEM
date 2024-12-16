<?php

if (isset($_GET['id'])) {
	$sql_cek = "SELECT * FROM tb_penduduk WHERE id='" . $_GET['id'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
	$queryDesa = "SELECT * FROM tb_desa WHERE id='" . $data_cek["desa"] . "'";
	$desaData = mysqli_query($koneksi, $queryDesa);
	$desa = mysqli_fetch_array($desaData, MYSQLI_BOTH);

	$queryKecamatan = "SELECT * FROM tb_kecamatan WHERE id='" . $desa["kecamatan_id"] . "'";
	$kecamatanData = mysqli_query($koneksi, $queryKecamatan);
	$kecamatan = mysqli_fetch_array($kecamatanData, MYSQLI_BOTH);
}
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<div class="col-sm-2">
					<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data_cek['id']; ?>"
						readonly />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIK</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nik" name="nik" value="<?php echo $data_cek['nik']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">TTL</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="tempat_lh" name="tempat_lh" value="<?php echo $data_cek['tempat_lahir']; ?>" />
				</div>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="tgl_lh" name="tgl_lh" value="<?php echo $data_cek['tgl_lahir']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-3">
					<select name="jekel" id="jekel" class="form-control">
						<option value="">-- Pilih jekel --</option>
						<?php
						//menhecek data yg dipilih sebelumnya
						if ($data_cek['jk'] == "LK") echo "<option value='LK' selected>LK</option>";
						else echo "<option value='LK'>LK</option>";

						if ($data_cek['jk'] == "PR") echo "<option value='PR' selected>PR</option>";
						else echo "<option value='PR'>PR</option>";
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kecamatan</label>
				<div class="col-sm-6">
					<select class="custom-select" name="kecamatan" id="kecamatan" onchange="loadDesa()">
						<option disabled value>- Pilih -</option>
						<?php
						// Query kecamatan
						$queryKecamatan = "SELECT * FROM tb_kecamatan";
						$resultKecamatan = mysqli_query($koneksi, $queryKecamatan);
						while ($rowKecamatan = mysqli_fetch_assoc($resultKecamatan)) {
							$selected = ($rowKecamatan['id'] == $kecamatan['id']) ? "selected" : "";
							echo "<option value='{$rowKecamatan['id']}' $selected>{$rowKecamatan['nama']}</option>";
						}
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Desa</label>
				<div class="col-sm-6">
					<select class="custom-select" name="desa" id="desa">
						<option disabled value>- Pilih -</option>
						<?php
						// Query desa untuk kecamatan awal
						$queryDesa = "SELECT * FROM tb_desa WHERE kecamatan_id = '{$kecamatan['id']}'";
						$resultDesa = mysqli_query($koneksi, $queryDesa);
						while ($rowDesa = mysqli_fetch_assoc($resultDesa)) {
							$selected = ($rowDesa['id'] == $data_cek['desa']) ? "selected" : "";
							echo "<option value='{$rowDesa['id']}' $selected>{$rowDesa['nama']}</option>";
						}
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Jalan X, No X" value="<?= $data_cek["alamat"] ?>" required>
				</div>

			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Agama</label>
				<div class="col-sm-6">
					<select class="custom-select" name="agama" id="agama">
						<option disabled selected value>- Pilih -</option>
						<option value="Islam" <?php echo ($data_cek["agama"] == "Islam") ? "selected" : ""; ?>>Islam</option>
						<option value="Kristen" <?php echo ($data_cek["agama"] == "Kristen") ? "selected" : ""; ?>>Kristen</option>
						<option value="Katolik" <?php echo ($data_cek["agama"] == "Katolik") ? "selected" : ""; ?>>Katolik</option>
						<option value="Hindu" <?php echo ($data_cek["agama"] == "Hindu") ? "selected" : ""; ?>>Hindu</option>
						<option value="Budha" <?php echo ($data_cek["agama"] == "Budha") ? "selected" : ""; ?>>Budha</option>
						<option value="Konghucu" <?php echo ($data_cek["agama"] == "Konghucu") ? "selected" : ""; ?>>Konghucu</option>
						<option value="Ateis" <?php echo ($data_cek["agama"] == "Ateis") ? "selected" : ""; ?>>Ateis</option>

					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Perkawinan</label>
				<div class="col-sm-3">
					<select name="kawin" id="kawin" class="form-control">
						<option disabled selected value>- Pilih -</option>

						<option value="Sudah Nikah" <?php echo ($data_cek["status"] == "Sudah Nikah") ? "selected" : ""; ?>>Sudah Nikah</option>
						<option value="Belum Nikah" <?php echo ($data_cek["status"] == "Belum Nikah") ? "selected" : ""; ?>>Belum Nikah</option>
						<option value="Cerai Mati" <?php echo ($data_cek["status"] == "Cerai Mati") ? "selected" : ""; ?>>Cerai Mati</option>
						<option value="Cerai Hidup" <?php echo ($data_cek["status"] == "Cerai Hidup") ? "selected" : ""; ?>>Cerai Hidup</option>

					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pekerjaan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" value="<?= $data_cek['pekerjaan']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
				<div class="col-sm-6">
					<select class="custom-select" name="pendidikan" id="pendidikan">
						<option disabled selected value>- Pilih -</option>
						<option value="Tidak Sekolah" <?php echo ($data_cek["pendidikan"] == "Tidak Sekolah") ? "selected" : ""; ?>>Tidak Sekolah</option>
						<option value="TK" <?php echo ($data_cek["pendidikan"] == "TK") ? "selected" : ""; ?>>TK</option>
						<option value="SD" <?php echo ($data_cek["pendidikan"] == "SD") ? "selected" : ""; ?>>SD</option>
						<option value="SMP" <?php echo ($data_cek["pendidikan"] == "SMP") ? "selected" : ""; ?>>SMP</option>
						<option value="SMA" <?php echo ($data_cek["pendidikan"] == "SMA") ? "selected" : ""; ?>>SMA</option>
						<option value="D3" <?php echo ($data_cek["pendidikan"] == "D3") ? "selected" : ""; ?>>D3</option>
						<option value="D4" <?php echo ($data_cek["pendidikan"] == "D4") ? "selected" : ""; ?>>D3</option>
						<option value="S1" <?php echo ($data_cek["pendidikan"] == "S1") ? "selected" : ""; ?>>S1</option>
						<option value="S2" <?php echo ($data_cek["pendidikan"] == "S2") ? "selected" : ""; ?>>S2</option>
						<option value="S3" <?php echo ($data_cek["pendidikan"] == "S3") ? "selected" : ""; ?>>S3</option>
					</select>
				</div>
			</div>


		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-pend" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<script>
	function loadDesa() {
		var kecamatanId = document.getElementById('kecamatan').value;
		var desaSelector = document.getElementById('desa');

		desaSelector.innerHTML = '<option disabled selected value>- Pilih -</option>'

		if (kecamatanId) {
			var xhr = new XMLHttpRequest();
			xhr.open('GET', 'admin/pend/get_desa.php?kecamatan_id=' + kecamatanId, true);
			xhr.onload = function() {
				if (xhr.status === 200) {
					var response = JSON.parse(xhr.responseText);
					response.forEach((desa) => {
						var option = document.createElement('option');
						option.value = desa.id;
						option.textContent = desa.nama;
						desaSelector.appendChild(option);
					})
				}
			}
			xhr.send();
		}
	}
</script>
<?php

if (isset($_POST['Ubah'])) {
	$sql_ubah = "UPDATE tb_penduduk SET 
		nik='" . $_POST['nik'] . "',
    nama='" . $_POST['nama'] . "',
    tempat_lahir='" . $_POST['tempat_lh'] . "',
    tgl_lahir='" . $_POST['tgl_lh'] . "',
    jk='" . $_POST['jekel'] . "',
    desa='" . $_POST['desa'] . "',
    agama='" . $_POST['agama'] . "',
    status='" . $_POST['kawin'] . "',
    pekerjaan='" . $_POST['pekerjaan'] . "',
    alamat='" . $_POST['alamat'] . "',
    pendidikan='" . $_POST['pendidikan'] . "'
		WHERE id='" . $_POST['id'] . "'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
	mysqli_close($koneksi);

	if ($query_ubah) {
		echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pend';
        }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pend';
        }
      })</script>";
	}
}

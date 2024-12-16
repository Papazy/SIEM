<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIK</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Penduduk" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">TTL</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="tempat_lh" name="tempat_lh" placeholder="Tempat Lahir" required>
				</div>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="tgl_lh" name="tgl_lh" placeholder="Tanggal Lahir" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-3">
					<select name="jekel" id="jekel" class="form-control">
						<option disabled selected value>- Pilih -</option>
						<option>LK</option>
						<option>PR</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
    <label class="col-sm-2 col-form-label">Kecamatan</label>
    <div class="col-sm-6">
        <select class="custom-select" name="kecamatan" id="kecamatan" onchange="loadDesa()">
            <option disabled selected value>- Pilih -</option>
            <?php
            $query = "SELECT * FROM tb_kecamatan";
            $sql = mysqli_query($koneksi, $query);
            while ($hasil = mysqli_fetch_array($sql)) {
                echo "<option value='" . $hasil['id'] . "'>" . $hasil['nama'] . "</option>";
            }
            ?>
        </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Desa</label>
    <div class="col-sm-6">
        <select class="custom-select" name="desa" id="desa">
            <option disabled selected value>- Pilih -</option>
        </select>
    </div>
</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Jalan X, No X" required>
				</div>
		
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Agama</label>
				<div class="col-sm-6">
					<select class="custom-select" name="agama" id="agama">
						<option disabled selected value>- Pilih -</option>
						<option value="Islam">Islam</option>
						<option value="Kristen">Kristen</option>
						<option value="Katolik">Katolik</option>
						<option value="Hindu">Hindu</option>
						<option value="Budha">Budha</option>
						<option value="Konghucu">Konghucu</option>
						<option value="Ateis">Ateis</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Perkawinan</label>
				<div class="col-sm-3">
					<select name="kawin" id="kawin" class="form-control">
						<option disabled selected value>- Pilih -</option>
						<option>Sudah Nikah</option>
						<option>Belum Nikah</option>
						<option>Cerai Mati</option>
						<option>Cerai Hidup</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pekerjaan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
				<div class="col-sm-6">
					<select class="custom-select" name="pendidikan" id="pendidikan">
						<option disabled selected value>- Pilih -</option>
						<option>Tidak Sekolah</option>
						<option>TK</option>
						<option>SD</option>
						<option>SMP</option>
						<option>SMA</option>
						<option>D3</option>
						<option>D4</option>
						<option>S1</option>
						<option>S2</option>
						<option>S3</option>
					</select>
				</div>
			</div>




		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-pend" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<script>
	function loadDesa() {
		// console.log("load Desa ..")
		var kecamatanId = document.getElementById("kecamatan").value;
		var desaSelect = document.getElementById("desa");

		// mengosongkan opsi desa sebelum mengisi ulang
		desaSelect.innerHTML = '<option disabled selected value>- Pilih -</option>';

		if(kecamatanId){
			var xhr = new XMLHttpRequest();
			xhr.open("GET", "admin/pend/get_desa.php?kecamatan_id=" + kecamatanId, true);
			xhr.onload = function() {
				if(xhr.status === 200){
					var response = JSON.parse(xhr.responseText);
					response.forEach(function (desa) {
						var option = document.createElement("option");
						option.value = desa.id;
						option.textContent = desa.nama;
						desaSelect.appendChild(option);
					})
				}
			};
			xhr.send();
		}
	}

</script>

<?php

if (isset($_POST['Simpan'])) {
	//mulai proses simpan data
	$sql_simpan = "INSERT INTO tb_penduduk (nik, nama, tempat_lahir, tgl_lahir, jk, desa, agama, status, pekerjaan, alamat, pendidikan) VALUES (
            '" . $_POST['nik'] . "',
            '" . $_POST['nama'] . "',
			'" . $_POST['tempat_lh'] . "',
			'" . $_POST['tgl_lh'] . "',
            '" . $_POST['jekel'] . "',
            '" . $_POST['desa'] . "',
			'" . $_POST['agama'] . "',
			'" . $_POST['kawin'] . "',
			'" . $_POST['pekerjaan'] . "',
			'" . $_POST['alamat'] . "',
			'" . $_POST['pendidikan'] . "'
						)";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);

	if ($query_simpan) {
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-pend';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-pend';
          }
      })</script>";
	}
}
     //selesai proses simpan data

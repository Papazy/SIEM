<?php

if (isset($_GET['id'])) {
  $sql_cek = "SELECT * FROM tb_desa WHERE id='" . $_GET['id'] . "'";
  $query_cek = mysqli_query($koneksi, $sql_cek);
  $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
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
        <label class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-3">
          <input type='hidden' class="form-control" id="id" name="id" value="<?php echo $data_cek['id']; ?>" />
          <input type='text' class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>" />
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Kecamatan</label>
        <div class="col-sm-6">
          <select class="custom-select" name="kecamatan" id="kecamatan">
            <?php
            $query = "SELECT * FROM tb_kecamatan";
            $sql = mysqli_query($koneksi, $query);
            while ($hasil = mysqli_fetch_array($sql)) {
              if($hasil['id'] == $data_cek['kecamatan_id']){
                echo "<option value='" . $hasil['id'] . "' selected>" . $hasil['nama'] . "</option>";
              }else{
                echo "<option value='" . $hasil['id'] . "'>" . $hasil['nama'] . "</option>";
              }
            }
            ?>
          </select>
        </div>
      </div>



    </div>
    <div class="card-footer">
      <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
      <a href="?page=data-desa" title="Kembali" class="btn btn-secondary">Batal</a>
    </div>
  </form>
</div>



<?php

if (isset($_POST['Ubah'])) {
  $sql_ubah = "UPDATE tb_desa SET 
    nama='" . $_POST['nama'] . 
    "', kecamatan_id='" . $_POST['kecamatan'] .
    "' WHERE id='" . $_POST['id'] . "'";
  $query_ubah = mysqli_query($koneksi, $sql_ubah);
  mysqli_close($koneksi);

  if ($query_ubah) {
    echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-desa';
        }
      })</script>";
  } else {
    echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-desa';
        }
      })</script>";
  }
}

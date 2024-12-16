<?php

  $sql = $koneksi->query("SELECT COUNT(id) as pend  from tb_penduduk");
  while ($data= $sql->fetch_assoc()) {
    $pend=$data['pend'];
  }

  $sql = $koneksi->query("SELECT COUNT(id) as desa  from tb_desa");
  while ($data= $sql->fetch_assoc()) {
    $desa=$data['desa'];
  }

  $sql = $koneksi->query("SELECT COUNT(id) as laki  from tb_penduduk where jk='LK'");
  while ($data= $sql->fetch_assoc()) {
    $laki=$data['laki'];
  }

  $sql = $koneksi->query("SELECT COUNT(id) as prem  from tb_penduduk where jk='PR'");
  while ($data= $sql->fetch_assoc()) {
    $prem=$data['prem'];
  }

  $sql = $koneksi->query("SELECT COUNT(id) as kecamatan from tb_kecamatan");
  while ($data= $sql->fetch_assoc()) {
    $kecamatan=$data['kecamatan'];
  }

  $sql = $koneksi->query("SELECT COUNT(id) as mendu  from tb_penduduk");
  while ($data= $sql->fetch_assoc()) {
    $mendu=$data['mendu'];
  }

  $sql = $koneksi->query("SELECT COUNT(id) as datang  from tb_penduduk");
  while ($data= $sql->fetch_assoc()) {
    $datang=$data['datang'];
  }

  $sql = $koneksi->query("SELECT COUNT(id) as pindah  from tb_penduduk");
  while ($data= $sql->fetch_assoc()) {
    $pindah=$data['pindah'];
  }

?>
<!-- tombol menuju portal -->
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-12">
						<h3 class="text-center ">Selamat Datang di Aplikasi Sistem Informasi Ekonomi Masyarakat Kota Banda Aceh</h3>
						<p class="text-center">Silahkan pilih menu berikut untuk menuju portal</p>
					</div>
				</div>
				<div class="row d-flex ">
					<div class="col-5"></div>
					<div class="col-2">
						<a href="portal.php" class="btn btn-primary btn-block">
							<i class="ion ion-podium"></i> Portal
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row ">
	<div class="col-lg-4 col-6">
		<!-- small box -->
		<div class="small-box bg-info">
			<div class="inner">
				<h3>
					<?php echo $pend;  ?>
				</h3>

				<p>Penduduk</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="index.php?page=data-pend" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-4 col-6">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3>
					<?php echo $laki;  ?>
				</h3>

				<p>Laki-laki</p>
			</div>
			<div class="icon">
				<i class="ion ion-male"></i>
			</div>
			<a href="index.php?page=data-pend" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-4 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h3>
					<?php echo $prem;  ?>
				</h3>

				<p>Perempuan</p>
			</div>
			<div class="icon">
				<i class="ion ion-female"></i>
			</div>
			<a href="index.php?page=data-pend" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-4 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3>
					<?php echo $desa;  ?>
				</h3>

				<p>Desa</p>
			</div>
			<div class="icon">
				<i class="ion ion-home"></i>
			</div>
			<a href="index.php?page=data-desa" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	

	<div class="col-lg-4 col-6">
		<!-- small box -->
		<div class="small-box bg-info">
			<div class="inner">
				<h3>
					<?php echo $kecamatan;  ?>
				</h3>

				<p>Kecamatan</p>
			</div>
			<div class="icon">
				<i class="ion ion-podium"></i>
			</div>
			<a href="index.php?page=data-kecamatan" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
</div>




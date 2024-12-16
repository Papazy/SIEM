<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Penduduk Miskin</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-pend" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped" style="white-space: nowrap;">
				<thead>
					<tr>
						<th>No</th>
						<th>NIK</th>
						<th>Nama</th>
						<th>JK</th>
						<th>Alamat</th>
						<th>Umur</th>
						<th>Tanggal Lahir</th>
						<th>Tempat Lahir</th>
						<th>Status</th>
						<th>Pekerjaan</th>
						<th>Pendidikan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT * from tb_penduduk");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['nik']; ?>
						</td>
						<td>
							<?php echo $data['nama']; ?>
						</td>
						<td>
							<?php echo $data['jk']; ?>
						</td>
						<td>
							<?php echo $data['alamat']; ?>
						</td>
						<td>
							<?php 
							// mendapatkan umur dari tanggal lahir
							$lahir = new DateTime($data['tgl_lahir']);
							$hari_ini = new DateTime();
							$diff = $hari_ini->diff($lahir);
							echo $diff->y;
							
							?>
						</td>
						<td>
							<?php echo $data['tgl_lahir']; ?>
						</td>
						<td>
							<?php echo $data['tempat_lahir']; ?>
						</td>
						<td>
							<?php echo $data['status']; ?>
						</td>
						<td>
							<?php echo $data['pekerjaan']; ?>
						</td>
						<td>
							<?php echo $data['pendidikan']; ?>
						</td>

						<td>
							<a href="?page=view-pend&id=<?php echo $data['id']; ?>" title="Detail"
							 class="btn btn-info btn-sm">
								<i class="fa fa-user"></i>
							</a>
							<a href="?page=edit-pend&id=<?php echo $data['id']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-pend&id=<?php echo $data['id']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
								</>
						</td>
					</tr>

					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->
<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Desa</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-desa" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Kecamatan</th>
						
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;

							// mengambil id dan nama dari tbl desa dan join dengan nama kecamatan dari tbl kecamatan
              $sql = $koneksi->query("select tb_desa.id, tb_desa.nama, tb_kecamatan.nama as nama_kecamatan from tb_desa join tb_kecamatan on tb_desa.kecamatan_id=tb_kecamatan.id");

              while ($data= $sql->fetch_assoc()) {

            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['nama']; ?>
						</td>
						<td>
							<?php echo $data['nama_kecamatan']; ?>
						</td>
						
						</td>
						
						<td>
							<a href="?page=edit-desa&id=<?php echo $data['id']; ?>" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-desa&id=<?php echo $data['id']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
							</a>
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
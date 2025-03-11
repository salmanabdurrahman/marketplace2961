<div class="container">
	<h5>Data Kategori</h5>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Foto</th>
				<th>Opsi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($kategori as $k => $v): ?>
				<tr>
					<td><?php echo $k + 1 ?></td>
					<td><?php echo $v["nama_kategori"]; ?></td>
					<td><?php echo $v["foto_kategori"] ?></td>
					<td>
						<a href="" class="btn btn-warning">Edit</a>
						<a href="" class="btn btn-danger">Hapus</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<a href="" class="btn btn-primary">Tambah Data</a>
</div>
<div class="container">
    <h5>Produk Jual <?php echo $this->session->userdata("nama_member"); ?></h5>
    <table class="table table-bordered table-hover" id="myTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Foto</th>
                <th>Berat</th>
                <th>Harga</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produk as $k => $v): ?>
                <tr>
                    <td><?php echo $k + 1 ?></td>
                    <td><?php echo $v["nama_produk"]; ?></td>
                    <td>
                        <img src="<?php echo $this->config->item("url_produk") . $v["foto_produk"]; ?>"
                            alt="<?php echo $v["nama_produk"]; ?>" class="d-block" width="200" loading="lazy">
                    </td>
                    <td><?php echo number_format($v["berat_produk"], 0, ',', '.') ?> gr</td>
                    <td><?php echo number_format($v["harga_produk"], 0, ',', '.') ?></td>
                    <td>
                        <a href="<?php echo base_url('/seller/produk/edit/' . $v["id_produk"]); ?>"
                            class="btn btn-warning">Edit</a>
                        <a href="<?php echo base_url('/seller/produk/hapus/' . $v["id_produk"]); ?>" class="btn btn-danger"
                            onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?php echo base_url('/seller/produk/tambah'); ?>" class="btn btn-primary">Tambah Data</a>
</div>
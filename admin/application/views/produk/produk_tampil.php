<div class="container">
    <h5>Data Produk</h5>
    <table class="table table-bordered table-hover" id="myTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Foto</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produk as $k => $v): ?>
                <tr>
                    <td><?php echo $k + 1 ?></td>
                    <td><?php echo $v["nama_produk"]; ?></td>
                    <td><?php echo number_format($v["harga_produk"], 0, ',', '.') ?></td>
                    <td><img src="<?php echo $this->config->item("url_produk") . $v["foto_produk"]; ?>"
                            alt="<?php echo $v["nama_produk"]; ?>" width="200" loading="lazy"></td>
                    <td>
                        <a href="" class="btn btn-info">Detail</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="" class="btn btn-primary">Tambah Data</a>
</div>
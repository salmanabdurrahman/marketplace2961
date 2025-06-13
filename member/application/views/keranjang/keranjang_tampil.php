<div class="container">
    <?php foreach ($keranjang as $key => $value): ?>
        <div class="mb-5">
            <h3><?php echo $value['nama_member']; ?></h3>
            <table class="table table-sm table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Foto Produk</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($value['produk'] as $key => $value): ?>
                        <tr>
                            <td>
                                <img src="<?php echo $this->config->item("url_produk") . $value["foto_produk"]; ?>"
                                    alt=" <?php echo $value['nama_produk']; ?>" width="100">
                            </td>
                            <td><?php echo $value['nama_produk']; ?></td>
                            <td><?php echo number_format($value['harga_produk'], 0, ',', '.'); ?></td>
                            <td><?php echo $value['jumlah']; ?></td>
                            <td>
                                <a href="<?php echo site_url("keranjang/hapus/" . $value['id_keranjang']); ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <a href="<?php echo site_url("keranjang/checkout/" . $value['id_member_jual']); ?>"
                class="btn btn-primary">Checkout</a>
        </div>
    <?php endforeach ?>
</div>
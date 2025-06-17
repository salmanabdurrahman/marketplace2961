<div class="container">
    <div class="mb-5">
        <h5>Checkout</h5>
        <table class="table">
            <thead>
                <tr>
                    <th>Foto Produk</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $sub_total = 0 ?>
                <?php foreach ($keranjang as $item): ?>
                    <?php $sub_total += $item['harga_produk'] * $item['jumlah']; ?>
                    <tr>
                        <td>
                            <img src="<?php echo $this->config->item("url_produk") . $item["foto_produk"]; ?>"
                                alt=" <?php echo $item['nama_produk']; ?>" width="100">
                        </td>
                        <td><?php echo $item['nama_produk']; ?></td>
                        <td><?php echo number_format($item['harga_produk'], 0, ',', '.'); ?></td>
                        <td><?php echo $item['jumlah']; ?></td>
                        <td><?php echo number_format($item['harga_produk'] * $item['jumlah'], 0, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Total</th>
                    <th><?php echo number_format($sub_total, 0, ',', '.'); ?></th>
                </tr>
            </tfoot>
        </table>
        <div class="row">
            <div class="col-md-4">
                <h6>Dikirim oleh</h6>
                <p><?php echo $member_jual['nama_member']; ?></p>
                <p><?php echo $member_jual['nama_distrik_member']; ?></p>
                <p><?php echo $member_jual['alamat_member']; ?></p>
                <p><?php echo $member_jual['wa_member']; ?></p>
            </div>
            <div class="col-md-4">
                <h6>Diterima oleh</h6>
                <p><?php echo $member_beli['nama_member']; ?></p>
                <p><?php echo $member_beli['nama_distrik_member']; ?></p>
                <p><?php echo $member_beli['alamat_member']; ?></p>
                <p><?php echo $member_beli['wa_member']; ?></p>
            </div>
            <div class="col-md-4">
                <h6>Pengiriman</h6>
                <form method="POST" action="">
                    <select name="ongkir" id="ongkir" class="form-select mb-2">
                        <option value="">Pilih Jasa Pengiriman</option>
                        <?php foreach ($biaya[0]['costs'] as $key => $value): ?>
                            <option value="<?php echo $key; ?>">
                                <?php echo $value['description'] ?>
                                - <?php echo number_format($value['cost'][0]['value'], 0, ',', '.'); ?>
                                (<?php echo $value['service']; ?>)
                                - Estimasi <?php echo $value['cost'][0]['etd']; ?> hari
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" class="btn btn-primary mt-2">Checkout</button>
                </form>
            </div>
        </div>
    </div>
</div>
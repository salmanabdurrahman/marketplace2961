<div class="container">
    <h5>Data Transaksi</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Status</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transaksi as $k => $v): ?>
                <tr>
                    <td><?php echo $k + 1 ?></td>
                    <td><?php echo $v["tanggal_transaksi"]; ?></td>
                    <td><?php echo $v["total_transaksi"]; ?></td>
                    <td><?php echo $v["status_transaksi"]; ?></td>
                    <td>
                        <a href="" class="btn btn-info">Detail</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="" class="btn btn-primary">Tambah Data</a>
</div>
<style>
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 310px;
        max-width: 800px;
        margin: 1em auto;
    }
</style>

<main class="container py-5">
    <div class="row">
        <div class="col-lg-3 mb-4 mb-lg-0">
            <?php require APPPATH . 'views/layout/customer-sidebar.php'; ?>
        </div>
        <div class="col-lg-9">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">Laporan Penjualan Produk - <?php echo $this->session->userdata("nama_member"); ?>
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form method="post" class="mb-4 p-3 bg-light rounded">
                        <div class="row g-3 align-items-end">
                            <div class="col-md-4">
                                <label for="tanggal_mulai" class="form-label small">Tanggal Mulai</label>
                                <input type="date" class="form-control form-control-sm" id="tanggal_mulai"
                                    name="tanggal_mulai" value="<?php echo $tanggal_mulai; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="tanggal_selesai" class="form-label small">Tanggal Selesai</label>
                                <input type="date" class="form-control form-control-sm" id="tanggal_selesai"
                                    name="tanggal_selesai" value="<?php echo $tanggal_selesai; ?>">
                            </div>
                            <div class="col-md-2">
                                <label for="status" class="form-label small">Status</label>
                                <select class="form-select form-select-sm" id="status" name="status">
                                    <option value="selesai" <?php if ($status == 'selesai')
                                        echo 'selected'; ?>>Selesai
                                    </option>
                                    <option value="pesan" <?php if ($status == 'pesan')
                                        echo 'selected'; ?>>Pesan</option>
                                    <option value="batal" <?php if ($status == 'batal')
                                        echo 'selected'; ?>>Batal</option>
                                    <option value="semua" <?php if ($status == 'semua')
                                        echo 'selected'; ?>>Semua</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary btn-sm w-100">Filter</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th class="text-end">Jumlah Terjual</th>
                                    <th class="text-end">Nominal Terjual</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($produk)): ?>
                                    <tr>
                                        <td colspan="4" class="text-center text-muted py-4">Tidak ada data untuk periode dan
                                            status yang dipilih.</td>
                                    </tr>
                                <?php else: ?>
                                    <?php $no = 1;
                                    foreach ($produk as $item): ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $item['nama_beli']; ?></td>
                                            <td class="text-end">
                                                <?php echo number_format($item['jumlah_terjual'], 0, ',', '.'); ?>
                                            </td>
                                            <td class="text-end">Rp.
                                                <?php echo number_format($item['nominal_terjual'], 0, ',', '.'); ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php if (!empty($produk)): ?>
                        <hr class="my-5">
                        <figure class="highcharts-figure">
                            <div id="container-chart"></div>
                        </figure>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const chartDataExists = <?php echo !empty($produk) ? 'true' : 'false'; ?>;

        if (chartDataExists) {
            Highcharts.chart('container-chart', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Grafik Penjualan Produk'
                },
                xAxis: {
                    categories: [
                        <?php foreach ($produk as $item): ?>
                                                                                                            '<?php echo addslashes($item['nama_beli']); ?>',
                        <?php endforeach; ?>
                    ],
                    crosshair: true,
                    accessibility: {
                        description: 'Produk'
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Jumlah Item Terjual'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y} item</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0,
                        color: '#3A5A40'
                    }
                },
                series: [{
                    name: 'Terjual',
                    data: [
                        <?php foreach ($produk as $item): ?>
                                                                                                            <?php echo $item['jumlah_terjual']; ?>,
                        <?php endforeach; ?>
                    ]
                }],
                credits: {
                    enabled: false
                }
            });
        }
    });
</script>
<style>
    .account-nav .list-group-item.active {
        background-color: var(--green-dark);
        border-color: var(--green-dark);
        color: white;
    }

    .account-nav .list-group-item-action:hover,
    .account-nav .list-group-item-action:focus {
        background-color: var(--green-light);
    }

    .account-nav .list-group-item.active {
        background-color: var(--green-dark);
        border-color: var(--green-dark);
        color: white;
    }

    .account-nav .list-group-item-action:hover,
    .account-nav .list-group-item-action:focus {
        background-color: var(--green-light);
    }

    .account-nav .nav-section-title {
        font-size: 0.8rem;
        font-weight: 800;
        color: #6c757d;
        text-transform: uppercase;
        letter-spacing: .5px;
        padding: 0.75rem 1.25rem;
        margin: 0.3rem 0;
    }
</style>

<nav class="account-nav">
    <div class="list-group shadow-sm">
        <div class="nav-section-title">Dashboard</div>
        <a href="<?php echo base_url('home'); ?>"
            class="list-group-item list-group-item-action <?php echo $this->uri->segment(1) == 'home' ? 'active' : ''; ?>">
            <i class="bi bi-house-door-fill me-2"></i> Dashboard
        </a>
        <div class="nav-section-title">Menu Pembelian</div>
        <a href="<?php echo base_url('transaksi'); ?>"
            class="list-group-item list-group-item-action <?php echo $this->uri->segment(1) == 'transaksi' ? 'active' : ''; ?>">
            <i class="bi bi-receipt me-2"></i> Pembelian Saya
        </a>
        <div class="nav-section-title">Menu Penjualan</div>
        <a href="<?php echo base_url('/seller/produk'); ?>"
            class="list-group-item list-group-item-action <?php echo ($this->uri->segment(2) == 'produk' && $this->uri->segment(3) != 'laporan_terjual') ? 'active' : ''; ?>">
            <i class="bi bi-box-seam me-2"></i> Produk Saya
        </a>
        <a href="<?php echo base_url('/seller/transaksi'); ?>"
            class="list-group-item list-group-item-action <?php echo $this->uri->segment(2) == 'transaksi' ? 'active' : ''; ?>">
            <i class="bi bi-receipt-cutoff me-2"></i> Penjualan Saya
        </a>
        <a href="<?php echo base_url('/seller/produk/laporan_terjual'); ?>"
            class="list-group-item list-group-item-action <?php echo $this->uri->segment(3) == 'laporan_terjual' ? 'active' : ''; ?>">
            <i class="bi bi-bar-chart-line me-2"></i> Laporan Penjualan
        </a>
        <div class="nav-section-title">Pengaturan</div>
        <a href="<?php echo base_url('akun'); ?>"
            class="list-group-item list-group-item-action <?php echo $this->uri->segment(1) == 'akun' ? 'active' : ''; ?>">
            <i class="bi bi-person-circle me-2"></i> Profil Saya
        </a>
        <a href="<?php echo base_url('logout'); ?>" class="list-group-item list-group-item-action text-danger">
            <i class="bi bi-box-arrow-right me-2"></i> Logout
        </a>
    </div>
</nav>
<!doctype html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TokoKita | <?php echo (isset($title)) ? $title : "Marketplace" ?></title>
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Bootstrap Icons -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
		rel="stylesheet">
	<!-- Custom CSS -->
	<style>
		:root {
			/* Definisikan palet warna hijau kita */
			--green-dark: #3A5A40;
			/* Hijau tua yang elegan */
			--green-light: #E9F5E9;
			/* Hijau muda untuk background */
			--green-accent: #588157;
			/* Hijau aksen untuk hover/link */
		}

		body {
			font-family: 'Plus Jakarta Sans', sans-serif;
			background-color: #fdfdfd;
			/* Jarak agar konten tidak tertutup navbar */
			padding-top: 80px;
		}

		.navbar-custom {
			background-color: var(--green-light);
			border-bottom: 1px solid rgba(0, 0, 0, 0.05);
		}

		.navbar-brand .text-primary {
			color: var(--green-dark) !important;
		}

		.btn-primary {
			background-color: var(--green-dark);
			border-color: var(--green-dark);
		}

		.btn-primary:hover {
			background-color: var(--green-accent);
			border-color: var(--green-accent);
		}

		.btn-outline-secondary {
			border-color: var(--green-dark);
			color: var(--green-dark);
		}

		.btn-outline-secondary:hover {
			background-color: var(--green-dark);
			color: white;
		}

		.dropdown-menu {
			border-radius: 0.75rem;
			border: 1px solid #eee;
			box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, .1);
		}

		.dropdown-item:active {
			background-color: var(--green-accent);
		}
	</style>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light fixed-top px-lg-4 navbar-custom">
		<div class="container">
			<a class="navbar-brand fw-bold" href="<?php echo base_url('/'); ?>">Toko<span
					class="text-primary">Kita</span></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
				aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<?php if (isset($_SESSION["id_member"])) { ?>
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url('/'); ?>">Beranda</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url('/produk'); ?>">Produk</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url('/kategori'); ?>">Kategori</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url('/artikel'); ?>">Artikel</a>
						</li>
					</ul>
				<?php } ?>
				<div class="d-flex align-items-center ms-auto">
					<?php if (isset($_SESSION["id_member"])) { ?>
						<a href="<?php echo base_url('/keranjang'); ?>"
							class="btn btn-outline-secondary me-2 position-relative" title="Keranjang Belanja">
							<i class="bi bi-cart fs-5"></i>
							<?php
							$cart_count = isset($_SESSION['icon_keranjang']) ? $_SESSION['icon_keranjang'] : 0;
							if ($cart_count > 0) {
								?>
								<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
									<?php echo $cart_count; ?>
									<span class="visually-hidden">item di keranjang</span>
								</span>
							<?php } ?>
						</a>
						<div class="vr d-none d-lg-block me-2"></div>
						<div class="nav-item dropdown">
							<a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown"
								aria-expanded="false">
								Hi, <?php echo strtok($_SESSION["nama_member"], " "); ?>
							</a>
							<ul class="dropdown-menu dropdown-menu-end">
								<li>
									<h6 class="dropdown-header">Menu Pembeli</h6>
								</li>
								<li><a class="dropdown-item" href="<?php echo base_url('/transaksi'); ?>">Pembelian Saya</a>
								</li>
								<li><a class="dropdown-item" href="<?php echo base_url('/akun'); ?>">Pengaturan Akun</a>
								</li>
								<li>
									<hr class="dropdown-divider">
								</li>
								<li>
									<h6 class="dropdown-header">Menu Penjual</h6>
								</li>
								<li><a class="dropdown-item" href="<?php echo base_url('/seller/produk'); ?>">Produk
										Saya</a></li>
								<li><a class="dropdown-item"
										href="<?php echo base_url('/seller/produk/etalase'); ?>">Etalase
										Saya</a></li>
								<li><a class="dropdown-item" href="<?php echo base_url('/seller/transaksi'); ?>">Penjualan
										Saya</a></li>
								<li>
									<hr class="dropdown-divider">
								</li>
								<li><a class="dropdown-item text-danger" href="<?php echo base_url('logout'); ?>"><i
											class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
							</ul>
						</div>
					<?php } else { ?>
						<!-- <button class="btn btn-outline-secondary me-2" data-bs-toggle="modal"
							data-bs-target="#loginModal">Login</button> -->
						<a href="<?php echo base_url('/login'); ?>" class="btn btn-outline-secondary me-2">Login</a>
						<a href="<?php echo base_url('/register'); ?>" class="btn btn-primary">Daftar</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</nav>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Member Marketplace</title>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container">
			<a href="<?php echo base_url('/'); ?>" class="navbar-brand fw-semibold fs-4">Member</a>
			<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#naff">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="naff">
				<?php if (isset($_SESSION["id_member"])) { ?>
					<ul class="navbar-nav me-auto">
						<li class="nav-item">
							<a href="<?php echo base_url('/'); ?>" class="nav-link">Home</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('/kategori'); ?>" class="nav-link">Kategori</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('/produk'); ?>" class="nav-link">Produk</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('/keranjang'); ?>" class="nav-link">Keranjang</a>
						</li>
						<!-- <li class="nav-item">
							<a href="<?php echo base_url('/transaksi'); ?>" class="nav-link">Transaksi</a>
						</li> -->
					</ul>
				<?php } ?>
				<ul class="navbar-nav ms-auto">
					<?php if (isset($_SESSION["id_member"])) { ?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
								aria-expanded="false">
								Seller
							</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="<?php echo base_url('/seller/produk'); ?>">Produk
										Saya</a></li>
								<li><a class="dropdown-item" href="<?php echo base_url('/seller/transaksi'); ?>">Transaksi
										Saya</a>
								</li>
								<li><a class="dropdown-item" href="<?php echo base_url('/transaksi'); ?>">Pembelian
										Saya</a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
								aria-expanded="false">
								<?php echo $_SESSION["nama_member"]; ?>
							</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="<?php echo base_url('/akun'); ?>">Ubah Akun</a></li>
								<li><a class="dropdown-item" href="<?php echo base_url('logout'); ?>">Logout</a></li>
							</ul>
						</li>
					<?php } else { ?>
						<li class="nav-item">
							<button data-bs-toggle="modal" data-bs-target="#loginModal" class="nav-link">Login</button>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('/register'); ?>" class="nav-link">Register</a>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</nav>
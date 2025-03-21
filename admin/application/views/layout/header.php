<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Marketplace</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
		<div class="container">
			<a href="<?php echo base_url('/'); ?>" class="navbar-brand fw-semibold fs-4">Admin</a>
			<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#naff">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="naff">
				<ul class="navbar-nav ms-auto">
					<li class="nav-item">
						<a href="<?php echo base_url('/home'); ?>" class="nav-link">Home</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo base_url('/kategori'); ?>" class="nav-link">Kategori</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo base_url('/produk'); ?>" class="nav-link">Produk</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo base_url('/member'); ?>" class="nav-link">Member</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo base_url('/transaksi'); ?>" class="nav-link">Transaksi</a>
					</li>
					<?php if (isset($_SESSION["id_admin"])) { ?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
								aria-expanded="false">
								<?php echo $_SESSION["nama"]; ?>
							</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="#">Profile</a></li>
								<li><a class="dropdown-item" href="<?php echo base_url('logout'); ?>">Logout</a></li>
							</ul>
						</li>
					<?php } else { ?>
						<li class="nav-item">
							<a href="<?php echo base_url('/login'); ?>" class="nav-link">Login</a>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</nav>
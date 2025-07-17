<style>
	/* Mengambil variabel warna dari header.php */
	.section-title h2 {
		font-weight: 600;
	}

	.text-primary-green {
		color: var(--green-dark);
	}

	.btn-light {
		--bs-btn-bg: #fff;
		--bs-btn-border-color: #fff;
		--bs-btn-hover-bg: #f8f9fa;
		--bs-btn-hover-border-color: #f8f9fa;
	}

	/* --- Hero Section --- */
	.hero-minimalist {
		height: 60vh;
		min-height: 450px;
		max-height: 550px;
		background-size: cover;
		background-position: center;
		border-radius: 0.75rem;
		position: relative;
		color: white;
		display: flex;
		align-items: center;
		justify-content: center;
		text-align: center;
	}

	.hero-minimalist::before {
		content: '';
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		background: rgba(0, 0, 0, 0.4);
		border-radius: 0.75rem;
	}

	.hero-minimalist .hero-content {
		position: relative;
		z-index: 2;
	}

	.hero-minimalist h1 {
		font-weight: 700;
		text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.3);
	}

	.hero-minimalist .btn {
		border-radius: 50px;
		padding: 10px 25px;
		font-weight: 600;
	}

	/* --- Kategori Section --- */
	.kategori-item-minimalist a {
		display: block;
		text-decoration: none;
		color: #212529;
		border: 1px solid transparent;
		border-radius: 0.75rem;
		padding: 1rem;
		transition: all 0.2s ease-in-out;
	}

	.kategori-item-minimalist a:hover {
		transform: translateY(-5px);
		box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.08);
		border-color: rgba(0, 0, 0, 0.1);
	}

	.kategori-item-minimalist img {
		width: 80px;
		height: 80px;
		object-fit: cover;
		border-radius: 50%;
		margin-bottom: 1rem;
		border: 2px solid #eee;
	}

	.kategori-item-minimalist h6 {
		font-weight: 500;
	}

	/* --- Product & Article Card --- */
	.card-product,
	.card-article {
		border: 1px solid rgba(0, 0, 0, 0.1);
		box-shadow: none;
		transition: all 0.2s ease-in-out;
		height: 100%;
		border-radius: 0.75rem;
	}

	.card-product:hover,
	.card-article:hover {
		transform: translateY(-5px);
		box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.08);
		border-color: var(--green-accent);
	}

	.card-product .card-img-top,
	.card-article .card-img-top {
		aspect-ratio: 1 / 1;
		object-fit: cover;
		border-top-left-radius: 0.75rem;
		border-top-right-radius: 0.75rem;
	}

	.card-product .card-title,
	.card-article .card-title {
		font-weight: 600;
		font-size: 1rem;
	}

	.card-product .card-price {
		font-size: 1.1rem;
		font-weight: 700;
		color: var(--green-dark);
	}
</style>

<main class="container py-4">
	<!-- Hero Section / Slider -->
	<?php if (!empty($slider)): ?>
		<header id="heroCarouselMinimalist" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-inner" style="border-radius: 0.75rem;">
				<?php foreach ($slider as $key => $value): ?>
					<div class="carousel-item <?php echo $key === 0 ? 'active' : '' ?>">
						<div class="hero-minimalist"
							style="background-image: url('<?php echo $this->config->item("url_slider") . $value["foto_slider"]; ?>');">
							<div class="hero-content">
								<h1 class="display-5"><?php echo $value["caption_slider"] ?></h1>
								<div class="search-form-container">
									<form action="<?php echo base_url('produk/search'); ?>" method="get">
										<div class="input-group search-input-group">
											<input type="text" class="form-control" name="keyword"
												placeholder="Cari produk, merek, atau kategori..." aria-label="Cari produk">
											<button class="btn btn-primary px-4" type="submit"><i
													class="bi bi-search"></i></button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<?php if (count($slider) > 1): ?>
				<button class="carousel-control-prev" type="button" data-bs-target="#heroCarouselMinimalist"
					data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span></button>
				<button class="carousel-control-next" type="button" data-bs-target="#heroCarouselMinimalist"
					data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span></button>
			<?php endif; ?>
		</header>
	<?php endif; ?>
	<!-- Kategori Section -->
	<section id="kategori" class="py-5 mt-4">
		<div class="section-title text-center mb-5">
			<h2>Jelajahi Kategori</h2>
		</div>
		<div class="row row-cols-3 row-cols-sm-4 row-cols-md-6 g-3 text-center">
			<?php foreach ($kategori as $key => $value): ?>
				<div class="col">
					<div class="kategori-item-minimalist">
						<a href="<?php echo base_url('kategori/detail/' . $value['id_kategori']); ?>">
							<img src="<?php echo $this->config->item("url_kategori") . $value["foto_kategori"]; ?>"
								alt="<?php echo $value["nama_kategori"] ?>">
							<h6><?php echo $value["nama_kategori"] ?></h6>
						</a>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</section>
	<!-- Produk Terbaru Section -->
	<section id="produk" class="py-5" style="background-color: var(--green-light); border-radius: 0.75rem;">
		<div class="container">
			<div class="d-flex justify-content-between align-items-center mb-4">
				<h2 class="mb-0">Produk Terbaru</h2>
				<a href="<?php echo base_url('/produk') ?>" class="text-decoration-none fw-semibold"
					style="color: var(--green-accent);">Lihat Semua <i class="bi bi-arrow-right"></i></a>
			</div>
			<div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
				<?php foreach ($produk as $key => $value): ?>
					<div class="col">
						<a href="<?php echo base_url('produk/detail/' . $value["id_produk"]); ?>"
							class="text-decoration-none text-dark">
							<div class="card card-product">
								<img src="<?php echo $this->config->item("url_produk") . $value["foto_produk"]; ?>"
									class="card-img-top" alt="<?php echo $value["nama_produk"] ?>">
								<div class="card-body p-3">
									<h3 class="card-title"><?= $value["nama_produk"] ?></h3>
									<p class="card-price">Rp.
										<?php echo number_format($value["harga_produk"], 0, ',', '.') ?>
									</p>
								</div>
							</div>
						</a>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</section>
	<!-- Artikel Terbaru Section -->
	<section id="artikel" class="py-5 mt-5">
		<div class="d-flex justify-content-between align-items-center mb-4">
			<h2 class="mb-0">Tips & Artikel</h2>
			<a href="<?php echo base_url('/artikel') ?>" class="text-decoration-none fw-semibold"
				style="color: var(--green-accent);">Lihat Semua <i class="bi bi-arrow-right"></i></a>
		</div>
		<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
			<?php foreach ($artikel as $key => $value): ?>
				<div class="col">
					<a href="<?php echo base_url('artikel/detail/' . $value['id_artikel']); ?>"
						class="text-decoration-none text-dark">
						<div class="card card-article">
							<img src="<?php echo $this->config->item("url_artikel") . $value["foto_artikel"]; ?>"
								class="card-img-top" alt="<?php echo $value["judul_artikel"] ?>">
							<div class="card-body p-3">
								<p class="text-muted small mb-2">Inspirasi</p>
								<h3 class="card-title"><?php echo $value["judul_artikel"] ?></h3>
							</div>
						</div>
					</a>
				</div>
			<?php endforeach ?>
		</div>
	</section>
</main>
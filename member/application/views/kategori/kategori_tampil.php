<style>
	.card-kategori {
		border: 1px solid rgba(0, 0, 0, 0.1);
		box-shadow: none;
		transition: all 0.2s ease-in-out;
	}

	.card-kategori:hover {
		transform: translateY(-5px);
		box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.08);
		border-color: var(--green-accent);
	}

	.card-kategori img {
		aspect-ratio: 1.5 / 1;
		object-fit: cover;
	}
</style>

<main class="container py-5">
	<div class="pb-4 mb-4 border-bottom">
		<h2>Semua Kategori</h2>
		<p class="text-muted">Temukan produk berdasarkan kategori yang kamu inginkan.</p>
	</div>
	<div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
		<?php foreach ($kategori as $k): ?>
			<div class="col">
				<a href="<?php echo base_url('kategori/' . $k['id_kategori']); ?>" class="text-decoration-none text-dark">
					<div class="card card-kategori">
						<img src="<?php echo $this->config->item("url_kategori") . $k["foto_kategori"]; ?>"
							class="card-img-top" alt="<?php echo $k["nama_kategori"]; ?>">
						<div class="card-body text-center">
							<h6 class="card-title mb-0"><?php echo $k["nama_kategori"]; ?></h6>
						</div>
					</div>
				</a>
			</div>
		<?php endforeach; ?>
	</div>
</main>
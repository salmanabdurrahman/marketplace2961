<div id="carouselExampleCaptions" class="carousel slide">
	<php class="carousel-inner">
		<?php foreach ($slider as $key => $value): ?>
			<div class="carousel-item <?php echo $key === 0 ? 'active' : '' ?>">
				<img src="<?php echo $this->config->item("url_slider") . $value["foto_slider"]; ?>" class="d-block w-100"
					style="height: 700px;background-size: contain;" alt="<?php echo $value["caption_slider"] ?>">
				<div class="carousel-caption d-none d-md-block">
					<h5><?php echo $value["caption_slider"] ?></h5>
				</div>
			</div>
		<?php endforeach ?>
	</php>
	<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Previous</span>
	</button>
	<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Next</span>
	</button>
</div>
<div class="bg-white py-5">
	<div class="container">
		<h5 class="text-center mb-5">Kategori Produk</h5>
		<div class="row">
			<?php foreach ($kategori as $key => $value): ?>
				<div class="col-md-3 text-center py-3">
					<img src="<?php echo $this->config->item("url_kategori") . $value["foto_kategori"]; ?>"
						class="w-75 rounded-circle" alt="">
					<h5 class="mt-3"><?php echo $value["nama_kategori"] ?></h5>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</div>
<div class="bg-light py-5">
	<div class="container">
		<h5 class="text-center mb-5">Produk Terbaru</h5>
		<div class="row">
			<?php foreach ($produk as $key => $value): ?>
				<div class="col-md-3">
					<a href="<?php echo base_url('produk/detail/' . $value["id_produk"]); ?>" class="text-decoration-none">
						<div class="card mb-3 border-0 shadow" style="width: 18rem;">
							<img src="<?php echo $this->config->item("url_produk") . $value["foto_produk"]; ?>" alt="">
							<div class="card-body text-center">
								<h6><?= $value["nama_produk"] ?></h6>
								<span>Rp. <?php echo number_format($value["harga_produk"], 0, ',', '.') ?></span>
							</div>
						</div>
					</a>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</div>
<div class="bg-white py-5">
	<div class="container">
		<h5 class="text-center mb-5">Artikel Terbaru</h5>
		<div class="row">
			<?php foreach ($artikel as $key => $value): ?>
				<div class="col-md-3 text-center py-3">
					<img src="<?php echo $this->config->item("url_artikel") . $value["foto_artikel"]; ?>" class="w-100"
						alt="">
					<h6 class="mt-3"><?php echo $value["judul_artikel"] ?></h6>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="loginModalLabel">Login</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="<?php echo base_url('login'); ?>" method="post">
					<div class="form-group mb-3">
						<label for="email">Email</label>
						<input type="text" class="form-control" id="email" name="email_member" autofocus
							value="<?php echo set_value("email_member"); ?>">
						<div class="text-danger small"><?php echo form_error("email_member"); ?></div>
					</div>
					<div class="form-group mb-3">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password_member"
							value="<?php echo set_value("password_member"); ?>">
						<div class="text-danger small"><?php echo form_error("password_member"); ?></div>
					</div>
					<button type="submit" class="btn btn-primary">Login</button>
				</form>
			</div>
		</div>
	</div>
</div>
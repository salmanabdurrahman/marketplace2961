<div class="container">
	<h5>Data Kategori</h5>
	<div class="row">
		<?php foreach ($kategori as $k): ?>
			<div class="col-md-3 my-3">
				<div class="card border-0 shadow-sm">
					<img src="<?php echo base_url("assets/kategori/" . urlencode($k["foto_kategori"])); ?>"
						alt="<?php echo $k["nama_kategori"]; ?>" loading="lazy">
					<div class="card-body text-center">
						<h6><?php echo $k["nama_kategori"]; ?></h6>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
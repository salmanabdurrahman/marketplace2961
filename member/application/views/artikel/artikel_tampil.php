<style>
    /* Menggunakan style yang konsisten dengan halaman home */
    .card-article {
        border: 1px solid rgba(0, 0, 0, 0.1);
        box-shadow: none;
        transition: all 0.2s ease-in-out;
        height: 100%;
        border-radius: 0.75rem;
        display: flex;
        flex-direction: column;
    }

    .card-article:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.08);
        border-color: var(--green-accent);
    }

    .card-article .card-img-top {
        aspect-ratio: 16 / 9;
        object-fit: cover;
    }

    .card-article .card-body {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .card-article .card-title {
        font-weight: 600;
        font-size: 1.1rem;
        color: #212529;
        flex-grow: 1;
    }

    .card-article .card-link {
        color: var(--green-accent);
        font-weight: 600;
    }
</style>

<main class="container py-5">
    <div class="pb-4 mb-4 border-bottom">
        <h2>Artikel & Inspirasi</h2>
        <p class="text-muted">Temukan tips, panduan, dan cerita menarik seputar produk kami.</p>
    </div>
    <?php if (empty($artikel)): ?>
        <div class="text-center py-5">
            <i class="bi bi-file-earmark-x" style="font-size: 5rem; color: #ccc;"></i>
            <h4 class="mt-3">Belum ada artikel yang dipublikasikan</h4>
        </div>
    <?php else: ?>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php foreach ($artikel as $a): ?>
                <div class="col">
                    <div class="card card-article">
                        <a href="<?php echo base_url('artikel/detail/' . ($a["id_artikel"] ?? '')); ?>">
                            <img src="<?php echo $this->config->item("url_artikel") . ($a["foto_artikel"] ?? ''); ?>"
                                class="card-img-top" alt="<?php echo $a["judul_artikel"] ?? ''; ?>" loading="lazy">
                        </a>
                        <div class="card-body p-4">
                            <h3 class="card-title mb-3"><?php echo $a["judul_artikel"] ?? 'Judul Artikel'; ?></h3>
                            <a href="<?php echo base_url('artikel/detail/' . ($a["id_artikel"] ?? '')); ?>"
                                class="text-decoration-none card-link align-self-start">
                                Baca Selengkapnya <i class="bi bi-arrow-right-short"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</main>
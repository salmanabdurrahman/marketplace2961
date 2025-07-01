<style>
    .article-header {
        text-align: center;
        padding: 2rem 0;
    }

    .article-title {
        font-weight: 700;
    }

    .article-meta {
        color: #6c757d;
        font-size: 0.9rem;
    }

    .article-image {
        width: 100%;
        height: 400px;
        object-fit: cover;
        border-radius: 0.75rem;
        margin-bottom: 2rem;
    }

    /* Styling untuk konten hasil Markdown */
    .article-content {
        line-height: 1.8;
    }

    .article-content h1,
    .article-content h2,
    .article-content h3 {
        font-weight: 600;
        margin-top: 2rem;
        margin-bottom: 1rem;
    }

    .article-content p {
        margin-bottom: 1rem;
    }

    .article-content ul,
    .article-content ol {
        padding-left: 1.5rem;
        margin-bottom: 1rem;
    }

    .article-content blockquote {
        border-left: 4px solid var(--green-light);
        padding-left: 1rem;
        font-style: italic;
        color: #6c757d;
        margin: 2rem 0;
    }

    .article-content a {
        color: var(--green-accent);
        text-decoration: none;
        font-weight: 600;
    }

    .article-content a:hover {
        text-decoration: underline;
    }
</style>

<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <article>
                <header class="article-header">
                    <h1 class="article-title display-5"><?php echo $artikel['judul_artikel'] ?? 'Judul Artikel'; ?></h1>
                    <p class="article-meta">
                        Dipublikasikan pada <?php echo date('d F Y', strtotime($artikel['tanggal_dibuat'] ?? 'now')); ?>
                    </p>
                </header>
                <img src="<?php echo $this->config->item("url_artikel") . ($artikel["foto_artikel"] ?? ''); ?>"
                    alt="<?php echo $artikel["judul_artikel"] ?? ''; ?>" class="article-image shadow-sm">
                <div class="article-content">
                    <?php
                    $parsedown = new Parsedown();
                    echo $parsedown->text($artikel['isi_artikel'] ?? '');
                    ?>
                </div>
            </article>
        </div>
    </div>
</main>
<section class="cards" id="cards">
    <div class="row">
        <?php foreach ($refferences as $reff) : ?>
            <div class="col-lg-4">
                <div class="card mb-3" style="max-width: 540px; cursor: pointer;">
                    <div class="row g-0">
                        <div class="col-md-4 d-flex align-items-center">
                            <img src="<?= base_url('assets/images/file.svg'); ?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($reff['title']) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($reff['short_description']) ?></p>
                                <p class="card-text"><small class="text-muted">Last updated <?= htmlspecialchars($reff['time_ago']) ?></small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

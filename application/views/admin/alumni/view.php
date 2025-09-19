<div id="main">
    <div class="main-container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/alumni') ?>">Alumni</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="d-flex justify-content-end align-items-center gap-2 my-1">
            <a href="<?= base_url('admin/alumni') ?>" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Back
            </a>
            <a href="<?= base_url('admin/alumni/edit/'.$alumni['id']) ?>" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $alumni['id'] ?>">
                <i class="bi bi-trash"></i> Delete
            </button>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-bottom">
                        <h5 class="card-title mb-0 text-dark">Alumni Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person-badge text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Student</small>
                                        <span class="fw-semibold"><?= htmlspecialchars(($alumni['last_name'] ?? '').', '.($alumni['first_name'] ?? '').' ('.($alumni['sid'] ?? '').')') ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-mortarboard text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Course</small>
                                        <span class="fw-semibold"><?= htmlspecialchars($alumni['course_name'] ?? 'N/A') ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-calendar text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Graduation Year</small>
                                        <span class="fw-semibold"><?= (int)$alumni['graduation_year'] ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-briefcase text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Employment</small>
                                        <span class="fw-semibold"><?= htmlspecialchars($alumni['employment_status']) ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-building text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Company</small>
                                        <span class="fw-semibold"><?= htmlspecialchars($alumni['company'] ?? '-') ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person-workspace text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Position</small>
                                        <span class="fw-semibold"><?= htmlspecialchars($alumni['position'] ?? '-') ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-circle-fill text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Status</small>
                                        <?php if ((int)$alumni['status'] === 0): ?>
                                            <span class="badge bg-success">Active</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">Inactive</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-header bg-white border-bottom">
                        <h6 class="card-title mb-0 text-dark">Quick Actions</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="<?= base_url('admin/alumni/edit/'.$alumni['id']) ?>" class="btn btn-warning">
                                <i class="bi bi-pencil me-2"></i>Edit Alumni
                            </a>
                            <a href="<?= base_url('admin/alumni') ?>" class="btn btn-outline-secondary">
                                <i class="bi bi-list me-2"></i>All Alumni
                            </a>
                            <a href="<?= base_url('admin/alumni/create') ?>" class="btn btn-primary">
                                <i class="bi bi-plus-circle me-2"></i>New Alumni
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal<?= $alumni['id'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $alumni['id'] ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="deleteModalLabel<?= $alumni['id'] ?>">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Delete alumni record for <strong><?= htmlspecialchars(($alumni['last_name'] ?? '').', '.($alumni['first_name'] ?? '')) ?></strong>?
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="<?= base_url('admin/alumni/delete/'.$alumni['id']) ?>" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>


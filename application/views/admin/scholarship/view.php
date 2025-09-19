<div id="main">
    <div class="main-container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/scholarships') ?>">Scholarships</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Scholarship</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="d-flex justify-content-end my-2">
            <a href="<?= base_url('admin/scholarships') ?>" class="btn btn-success">Back</a>
        </div>

        <?php if ($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
        <?php endif; ?>

        <div class="row">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-bottom">
                        <h5 class="card-title mb-0 text-dark">Scholarship Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-hash text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Application ID</small>
                                        <span class="fw-semibold">#<?= $scholarship->id ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person-badge text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Student ID</small>
                                        <span class="fw-semibold"><?= htmlspecialchars($scholarship->student_id) ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-ui-checks-grid text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Application Type</small>
                                        <span class="badge bg-secondary"><?= htmlspecialchars($scholarship->application_type) ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-journal text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Semester</small>
                                        <span class="fw-semibold"><?= htmlspecialchars($scholarship->semester) ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-telephone text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Contact</small>
                                        <span class="fw-semibold"><?= htmlspecialchars($scholarship->contact_no) ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-envelope text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Email</small>
                                        <span class="fw-semibold"><?= htmlspecialchars($scholarship->email) ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-start">
                                    <i class="bi bi-geo-alt text-muted me-2 mt-1"></i>
                                    <div>
                                        <small class="text-muted d-block">Address</small>
                                        <p class="mb-0 mt-1"><?= htmlspecialchars($scholarship->address) ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-calendar-event text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Birth Date</small>
                                        <span class="fw-semibold"><?= htmlspecialchars($scholarship->birth_date) ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-gender-ambiguous text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Gender</small>
                                        <span class="fw-semibold"><?= htmlspecialchars($scholarship->gender) ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-book text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Religion</small>
                                        <span class="fw-semibold"><?= htmlspecialchars($scholarship->religion) ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-flag text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Application Status</small>
                                        <?php $status = $scholarship->application_status ?: 'Pending'; ?>
                                        <?php if ($status === 'Approved'): ?>
                                            <span class="badge bg-success">Approved</span>
                                        <?php elseif ($status === 'Rejected'): ?>
                                            <span class="badge bg-danger">Rejected</span>
                                        <?php elseif ($status === 'Under Review'): ?>
                                            <span class="badge bg-warning text-dark">Under Review</span>
                                        <?php elseif ($status === 'On Hold'): ?>
                                            <span class="badge bg-info text-dark">On Hold</span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary">Pending</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex gap-2">
                            <a href="<?= base_url('admin/scholarship/edit/' . $scholarship->id) ?>" class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <a href="<?= base_url('admin/scholarship/delete/' . $scholarship->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this application?');">
                                <i class="bi bi-trash"></i> Delete
                            </a>
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
                            <a href="<?= base_url('admin/scholarship/edit/' . $scholarship->id) ?>" class="btn btn-warning">
                                <i class="bi bi-pencil me-2"></i>Edit Application
                            </a>
                            <a href="<?= base_url('admin/scholarships') ?>" class="btn btn-outline-secondary">
                                <i class="bi bi-list me-2"></i>All Applications
                            </a>
                            <a href="<?= base_url('admin/scholarship/create') ?>" class="btn btn-primary">
                                <i class="bi bi-plus-circle me-2"></i>New Application
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-bottom">
                        <h6 class="card-title mb-0 text-dark">Status Actions</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="<?= base_url('admin/scholarship/edit/' . $scholarship->id) ?>#status" class="btn btn-success">
                                <i class="bi bi-check-circle me-2"></i>Approve
                            </a>
                            <a href="<?= base_url('admin/scholarship/edit/' . $scholarship->id) ?>#status" class="btn btn-danger">
                                <i class="bi bi-x-circle me-2"></i>Reject
                            </a>
                            <a href="<?= base_url('admin/scholarship/edit/' . $scholarship->id) ?>#status" class="btn btn-warning text-dark">
                                <i class="bi bi-hourglass-split me-2"></i>Under Review
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

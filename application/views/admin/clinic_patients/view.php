<div id="main">
    <div class="main-container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/clinic-patients') ?>">Clinic Patients</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Record</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="d-flex justify-content-end align-items-center gap-2 my-1">
            <a href="<?= base_url('admin/clinic-patients') ?>" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Back
            </a>
            <a href="<?= base_url('admin/clinic-patients/edit/'.$patient['id']) ?>" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $patient['id'] ?>">
                <i class="bi bi-trash"></i> Delete
            </button>
        </div>
<div class="row">

        <div class="col-lg-12">

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom">
                <h5 class="card-title mb-0 text-dark">Clinic Patient Record</h5>
            </div>
            <div class="card-body">
                
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-person-badge text-muted me-2"></i>
                            <div>
                                <small class="text-muted d-block">Student</small>
                                <span class="fw-semibold"><?= htmlspecialchars(($patient['last_name'] ?? '').', '.($patient['first_name'] ?? '').' ('.($patient['sid'] ?? '').')') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-123 text-muted me-2"></i>
                            <div>
                                <small class="text-muted d-block">Age</small>
                                <span class="fw-semibold"><?= (int)$patient['age'] ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-gender-ambiguous text-muted me-2"></i>
                            <div>
                                <small class="text-muted d-block">Sex</small>
                                <span class="fw-semibold"><?= htmlspecialchars($patient['sex']) ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-activity text-muted me-2"></i>
                            <div>
                                <small class="text-muted d-block">Weight</small>
                                <span class="fw-semibold"><?= (int)$patient['weight'] ?> kg</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-arrows-expand text-muted me-2"></i>
                            <div>
                                <small class="text-muted d-block">Height</small>
                                <span class="fw-semibold"><?= (int)$patient['height'] ?> cm</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-thermometer-half text-muted me-2"></i>
                            <div>
                                <small class="text-muted d-block">Temperature</small>
                                <span class="fw-semibold"><?= (int)$patient['temperature'] ?> °C</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-heart-pulse text-muted me-2"></i>
                            <div>
                                <small class="text-muted d-block">Blood Pressure</small>
                                <span class="fw-semibold"><?= htmlspecialchars($patient['blood_pressure']) ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-activity text-muted me-2"></i>
                            <div>
                                <small class="text-muted d-block">Pulse</small>
                                <span class="fw-semibold"><?= htmlspecialchars($patient['pulse']) ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-wind text-muted me-2"></i>
                            <div>
                                <small class="text-muted d-block">Respiration</small>
                                <span class="fw-semibold"><?= htmlspecialchars($patient['respiration']) ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>

    
        
                </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModal<?= $patient['id'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $patient['id'] ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="deleteModalLabel<?= $patient['id'] ?>">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Delete record for <strong><?= htmlspecialchars(($patient['last_name'] ?? '').', '.($patient['first_name'] ?? '')) ?></strong>?
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <a href="<?= base_url('admin/clinic-patients/delete/'.$patient['id']) ?>" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



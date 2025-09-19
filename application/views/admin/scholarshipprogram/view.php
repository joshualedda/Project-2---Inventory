<div id="main">
    <div class="main-container">
        <!-- Breadcrumb -->
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/scholarshipprogram') ?>">Scholarship Programs</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Program</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Header with Back Button -->
        <div class="d-flex justify-content-end align-items-center mb-4">
    <a href="<?= base_url('admin/scholarshipprogram') ?>" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Back to Programs
    </a>
</div>



        <div class="row">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-bottom">
                        <h5 class="card-title mb-0 text-dark">Program Information</h5>
                    </div>
                    <div class="card-body">
                        <!-- Program Name -->
                        <div class="mb-4">
                            <h3 class="text-primary mb-2"><?= htmlspecialchars($program->scholarship_name) ?></h3>
                            <p class="text-muted mb-0">Scholarship Program</p>
                        </div>

                        <!-- Program Details -->
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-hash text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Program ID</small>
                                        <span class="fw-semibold">#<?= $program->id ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-tag text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Program Type</small>
                                        <?php
                                        $types = [
                                            1 => 'Academic Excellence',
                                            2 => 'Financial Need',
                                            3 => 'Athletic',
                                            4 => 'Cultural',
                                            5 => 'Merit-Based',
                                            6 => 'Need-Based',
                                            7 => 'Special Category'
                                        ];
                                        $type_colors = [
                                            1 => 'bg-primary',
                                            2 => 'bg-success',
                                            3 => 'bg-warning',
                                            4 => 'bg-info',
                                            5 => 'bg-secondary',
                                            6 => 'bg-danger',
                                            7 => 'bg-dark'
                                        ];
                                        $type_name = isset($types[$program->type]) ? $types[$program->type] : 'Type ' . $program->type;
                                        $type_color = isset($type_colors[$program->type]) ? $type_colors[$program->type] : 'bg-info';
                                        ?>
                                        <span class="badge <?= $type_color ?>"><?= $type_name ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-start">
                                    <i class="bi bi-building text-muted me-2 mt-1"></i>
                                    <div>
                                        <small class="text-muted d-block">Funding Source</small>
                                        <span class="badge bg-light text-dark border"><?= htmlspecialchars($program->source) ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-start">
                                    <i class="bi bi-file-text text-muted me-2 mt-1"></i>
                                    <div>
                                        <small class="text-muted d-block">Description</small>
                                        <p class="mb-0 mt-1"><?= nl2br(htmlspecialchars($program->description)) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <!-- Quick Actions -->
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-header bg-white border-bottom">
                        <h6 class="card-title mb-0 text-dark">Quick Actions</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="<?= base_url('admin/scholarshipprogram/edit/' . $program->id) ?>" 
                               class="btn btn-warning">
                                <i class="bi bi-pencil me-2"></i>Edit Program
                            </a>
                            <a href="<?= base_url('admin/scholarship/create') ?>" 
                               class="btn btn-primary">
                                <i class="bi bi-plus-circle me-2"></i>Create Application
                            </a>
                            <a href="<?= base_url('admin/scholarshipprogram') ?>" 
                               class="btn btn-outline-secondary">
                                <i class="bi bi-list me-2"></i>All Programs
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Program Statistics -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-bottom">
                        <h6 class="card-title mb-0 text-dark">Program Statistics</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="text-center">
                                    <div class="d-flex align-items-center justify-content-center mb-2">
                                        <i class="bi bi-file-earmark-text text-primary me-2"></i>
                                        <h4 class="text-primary mb-0">0</h4>
                                    </div>
                                    <small class="text-muted">Applications</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center">
                                    <div class="d-flex align-items-center justify-content-center mb-2">
                                        <i class="bi bi-check-circle text-success me-2"></i>
                                        <h4 class="text-success mb-0">0</h4>
                                    </div>
                                    <small class="text-muted">Approved</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

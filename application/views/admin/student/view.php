<div id="main">
    <div class="main-container">
        <!-- Breadcrumb -->
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/student') ?>">Students</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Student</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Header with Back Button -->
        <div class="d-flex justify-content-end align-items-center mb-4">
            <a href="<?= base_url('admin/student') ?>" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Back to Students
            </a>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-bottom">
                        <h5 class="card-title mb-0 text-dark">Student Information</h5>
                    </div>
                    <div class="card-body">
                        <!-- Student Name -->
                        <div class="mb-4">
                            <h3 class="text-primary mb-2"><?= htmlspecialchars($student->first_name . ' ' . $student->last_name) ?></h3>
                            <p class="text-muted mb-0">Student Profile</p>
                        </div>

                        <!-- Student Details -->
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-hash text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Student ID</small>
                                        <span class="fw-semibold">#<?= $student->id ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Full Name</small>
                                        <span class="fw-semibold"><?= htmlspecialchars($student->first_name . ' ' . $student->last_name) ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-mortarboard text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Course</small>
                                        <span class="badge bg-primary"><?= $student->course_name ?? 'No Course' ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-calendar text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Year Level</small>
                                        <span class="badge bg-info"><?= $student->year_level ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-calendar-check text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Admission Date</small>
                                        <span class="fw-semibold"><?= $student->admission_date ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-telephone text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Contact</small>
                                        <span class="fw-semibold"><?= htmlspecialchars($student->contact ?? 'N/A') ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-circle-fill text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Status</small>
                                        <?php if ($student->status == 0): ?>
                                            <span class="badge bg-success">Active</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">Inactive</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php if (!empty($student->middle_name)): ?>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person-badge text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Middle Name</small>
                                        <span class="fw-semibold"><?= htmlspecialchars($student->middle_name) ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if (!empty($student->section)): ?>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-people text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Section</small>
                                        <span class="fw-semibold"><?= htmlspecialchars($student->section) ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if (!empty($student->school_year)): ?>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-calendar-range text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">School Year</small>
                                        <span class="fw-semibold"><?= htmlspecialchars($student->school_year) ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if (!empty($student->date_of_birth)): ?>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-calendar-event text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Date of Birth</small>
                                        <span class="fw-semibold"><?= $student->date_of_birth ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if (!empty($student->gender)): ?>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-gender-ambiguous text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Gender</small>
                                        <span class="fw-semibold"><?= ucfirst($student->gender) ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if (!empty($student->address)): ?>
                            <div class="col-12">
                                <div class="d-flex align-items-start">
                                    <i class="bi bi-geo-alt text-muted me-2 mt-1"></i>
                                    <div>
                                        <small class="text-muted d-block">Address</small>
                                        <p class="mb-0 mt-1"><?= htmlspecialchars($student->address) ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if (!empty($student->guardian_name)): ?>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person-hearts text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Guardian Name</small>
                                        <span class="fw-semibold"><?= htmlspecialchars($student->guardian_name) ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if (!empty($student->guardian_contact)): ?>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-telephone text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Guardian Contact</small>
                                        <span class="fw-semibold"><?= htmlspecialchars($student->guardian_contact) ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
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
                            <a href="<?= base_url('admin/student/edit/' . $student->id) ?>" 
                               class="btn btn-warning">
                                <i class="bi bi-pencil me-2"></i>Edit Student
                            </a>
                            <a href="<?= base_url('admin/scholarship/create?student_id=' . $student->id) ?>" 
                               class="btn btn-primary">
                                <i class="bi bi-plus-circle me-2"></i>Create Scholarship
                            </a>
                            <a href="<?= base_url('admin/students') ?>" 
                               class="btn btn-outline-secondary">
                                <i class="bi bi-list me-2"></i>All Students
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Student Statistics -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-bottom">
                        <h6 class="card-title mb-0 text-dark">Student Statistics</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="text-center">
                                    <div class="d-flex align-items-center justify-content-center mb-2">
                                        <i class="bi bi-file-earmark-text text-primary me-2"></i>
                                        <h4 class="text-primary mb-0">0</h4>
                                    </div>
                                    <small class="text-muted">Scholarships</small>
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
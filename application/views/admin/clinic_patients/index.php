<div id="main">
    <div class="main-container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Clinic Patients</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="d-flex justify-content-end my-1">
            <a href="<?= base_url('admin/clinic-patients/create') ?>" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Add Record
            </a>
        </div>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
        <?php endif; ?>

        <!-- Statistics Cards (consistent style) -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-body py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-1 text-dark"><?= $statistics['total_visits'] ?? 0 ?></h5>
                                <p class="card-text mb-0 small text-muted">Total Visits</p>
                            </div>
                            <div>
                                <i class="bi bi-hospital text-primary" style="font-size: 1.8rem;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-body py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-1 text-dark"><?= $statistics['unique_students'] ?? 0 ?></h5>
                                <p class="card-text mb-0 small text-muted">Unique Students</p>
                            </div>
                            <div>
                                <i class="bi bi-people-fill text-success" style="font-size: 1.8rem;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-body py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-1 text-dark"><?= $statistics['male_count'] ?? 0 ?></h5>
                                <p class="card-text mb-0 small text-muted">Male Visits</p>
                            </div>
                            <div>
                                <i class="bi bi-gender-male text-info" style="font-size: 1.8rem;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-body py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-1 text-dark"><?= $statistics['female_count'] ?? 0 ?></h5>
                                <p class="card-text mb-0 small text-muted">Female Visits</p>
                            </div>
                            <div>
                                <i class="bi bi-gender-female text-danger" style="font-size: 1.8rem;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Clinic Patients</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="datatable">
                        <thead>
                            <tr>
                         
                                <th>Student</th>
                                <th>Age</th>
                                <th>Sex</th>
                                <th>Weight</th>
                                <th>Height</th>
                                <th>Temperature</th>
                                <th>BP</th>
                                <th>Pulse</th>
                                <th>Respiration</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($patients)): ?>
                                <?php foreach ($patients as $p): ?>
                                    <tr>
                                     
                                        <td><?= htmlspecialchars(($p['last_name'] ?? '').', '.($p['first_name'] ?? '').' ('.($p['sid'] ?? '').')') ?></td>
                                        <td><?= (int)$p['age'] ?></td>
                                        <td><?= htmlspecialchars($p['sex']) ?></td>
                                        <td><?= (int)$p['weight'] ?></td>
                                        <td><?= (int)$p['height'] ?></td>
                                        <td><?= (int)$p['temperature'] ?></td>
                                        <td><?= htmlspecialchars($p['blood_pressure']) ?></td>
                                        <td><?= htmlspecialchars($p['pulse']) ?></td>
                                        <td><?= htmlspecialchars($p['respiration']) ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/clinic-patients/view/'.$p['id']) ?>" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                                            <a href="<?= base_url('admin/clinic-patients/edit/'.$p['id']) ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $p['id'] ?>">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="11" class="text-center">No records found.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php if (!empty($patients)): ?>
            <?php foreach ($patients as $p): ?>
                <div class="modal fade" id="deleteModal<?= $p['id'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $p['id'] ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header border-0">
                                <h5 class="modal-title" id="deleteModalLabel<?= $p['id'] ?>">Confirm Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Delete record for <strong><?= htmlspecialchars(($p['last_name'] ?? '').', '.($p['first_name'] ?? '')) ?></strong>?
                            </div>
                            <div class="modal-footer border-0">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <a href="<?= base_url('admin/clinic-patients/delete/'.$p['id']) ?>" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>



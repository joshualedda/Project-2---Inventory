<div id="main">
    <div class="main-container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Scholarship Programs</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="d-flex justify-content-end my-1">
            <a href="<?= base_url('admin/scholarshipprogram/create') ?>" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Add New Program
            </a>
        </div>


        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
        <?php endif; ?>

        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-body py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-1 text-dark"><?= $statistics['total'] ?></h5>
                                <p class="card-text mb-0 small text-muted">Total Programs</p>
                            </div>
                            <div>
                                <i class="bi bi-mortarboard-fill text-primary" style="font-size: 1.8rem;"></i>
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
                                <h5 class="card-title mb-1 text-dark"><?= count($statistics['by_type']) ?></h5>
                                <p class="card-text mb-0 small text-muted">Program Types</p>
                            </div>
                            <div>
                                <i class="bi bi-collection-fill text-success" style="font-size: 1.8rem;"></i>
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
                                <h5 class="card-title mb-1 text-dark"><?= count($statistics['by_source']) ?></h5>
                                <p class="card-text mb-0 small text-muted">Funding Sources</p>
                            </div>
                            <div>
                                <i class="bi bi-building text-info" style="font-size: 1.8rem;"></i>
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
                                <h5 class="card-title mb-1 text-dark">Active</h5>
                                <p class="card-text mb-0 small text-muted">System Status</p>
                            </div>
                            <div>
                                <i class="bi bi-check-circle-fill text-warning" style="font-size: 1.8rem;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    Scholarship Programs List
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table datatable table-striped table-hover" id="datatable">

                        <thead>
                            <tr>

                                <th>Scholarship Name</th>
                                <th>Description</th>

                                <th>Type</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($programs)): ?>
                                <?php foreach ($programs as $program): ?>
                                    <tr>

                                        <td>
                              <?= htmlspecialchars($program->scholarship_name) ?>
                                        </td>
                                        <td>
                                            <span class="text-muted">
                                                <?= strlen($program->description) > 20 ?
                                                    substr(htmlspecialchars($program->description), 0, 20) . '...' :
                                                    htmlspecialchars($program->description) ?>
                                            </span>
                                        </td>


                                        <td>
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
                                            $type_name = isset($types[$program->type]) ? $types[$program->type] : 'Type ' . $program->type;
                                            $type_colors = [
                                                1 => 'bg-primary',
                                                2 => 'bg-success',
                                                3 => 'bg-warning',
                                                4 => 'bg-info',
                                                5 => 'bg-secondary',
                                                6 => 'bg-danger',
                                                7 => 'bg-dark'
                                            ];
                                            $type_color = isset($type_colors[$program->type]) ? $type_colors[$program->type] : 'bg-info';
                                            ?>
                                            <span class="badge <?= $type_color ?>"><?= $type_name ?></span>
                                        </td>
                                        <td>

                                            <a href="<?= base_url('admin/scholarshipprogram/view/' . $program->id) ?>"
                                                class="btn btn-sm btn-primary" title="View Details">
                                                <i class="bi bi-eye"></i> View
                                            </a>


                                            <a href="<?= base_url('admin/scholarshipprogram/edit/' . $program->id) ?>"
                                                class="btn btn-sm btn-warning" title="Edit Program">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a>
                                            <button type="button"
                                                class="btn btn-sm btn-danger"
                                                title="Delete Program"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteModal<?= $program->id ?>">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted">No scholarship programs found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modals -->
<?php if (!empty($programs)): ?>
    <?php foreach ($programs as $program): ?>
        <div class="modal fade" id="deleteModal<?= $program->id ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $program->id ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="deleteModalLabel<?= $program->id ?>">
                            <i class="bi bi-exclamation-triangle text-warning me-2"></i>Confirm Delete
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-3">Are you sure you want to delete this scholarship program?</p>
                        <div class="alert alert-warning d-flex align-items-center" role="alert">
                            <i class="bi bi-info-circle me-2"></i>
                            <div>
                                <strong><?= htmlspecialchars($program->scholarship_name) ?></strong><br>
                                <small>This action cannot be undone.</small>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle me-1"></i>Cancel
                        </button>
                        <a href="<?= base_url('admin/scholarshipprogram/delete/' . $program->id) ?>"
                            class="btn btn-danger">
                            <i class="bi bi-trash me-1"></i>Delete Program
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<script>
    $(document).ready(function() {
        $('#programsTable').DataTable({
            "responsive": true,
            "pageLength": 10,
            "order": [
                [0, "desc"]
            ],
            "columnDefs": [{
                "orderable": false,
                "targets": 5
            }]
        });
    });
</script>
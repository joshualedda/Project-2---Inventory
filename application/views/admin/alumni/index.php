<div id="main">
    <div class="main-container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Alumni</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="d-flex justify-content-end my-2">
            <a href="<?= base_url('admin/alumni/create') ?>" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Add Alumni
            </a>
        </div>

        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-body py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-1 text-dark"><?= $statistics['total_alumni'] ?? 0 ?></h5>
                                <p class="card-text mb-0 small text-muted">Total Alumni</p>
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
                                <h5 class="card-title mb-1 text-dark"><?= $statistics['total_employed'] ?? 0 ?></h5>
                                <p class="card-text mb-0 small text-muted">Total Employed</p>
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
                                <h5 class="card-title mb-1 text-dark"><?= $statistics['total_unemployed'] ?? 0 ?></h5>
                                <p class="card-text mb-0 small text-muted">Total Unemployed</p>
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
                                <h5 class="card-title mb-1 text-dark"><?= $statistics['total_graduated'] ?? 0 ?></h5>
                                <p class="card-text mb-0 small text-muted">Total Graduated (Students)</p>
                            </div>
                            <div>
                                <i class="bi bi-check-circle-fill text-warning" style="font-size: 1.8rem;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
        <?php endif; ?>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Alumni Records</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>Student</th>
                                <th>Course</th>
                                <th>Graduation Year</th>
                                <th>Employment</th>
                                <th>Company</th>
                                <th>Position</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($alumni)): ?>
                                <?php foreach ($alumni as $a): ?>
                                    <tr>
                                        <td><?= htmlspecialchars(($a['last_name'] ?? '').', '.($a['first_name'] ?? '').' ('.($a['sid'] ?? '').')') ?></td>
                                        <td><?= htmlspecialchars($a['course_name'] ?? 'N/A') ?></td>
                                        <td><?= (int)$a['graduation_year'] ?></td>
                                        <td><?= htmlspecialchars($a['employment_status']) ?></td>
                                        <td><?= htmlspecialchars($a['company'] ?? '-') ?></td>
                                        <td><?= htmlspecialchars($a['position'] ?? '-') ?></td>
                                        <td>
                                            <?php if ((int)$a['status'] === 0): ?>
                                                <span class="badge bg-success">Active</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger">Inactive</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('admin/alumni/view/'.$a['id']) ?>" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                                            <a href="<?= base_url('admin/alumni/edit/'.$a['id']) ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $a['id'] ?>">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="8" class="text-center">No records found.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php if (!empty($alumni)): ?>
            <?php foreach ($alumni as $a): ?>
                <div class="modal fade" id="deleteModal<?= $a['id'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $a['id'] ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header border-0">
                                <h5 class="modal-title" id="deleteModalLabel<?= $a['id'] ?>">Confirm Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Delete alumni record for <strong><?= htmlspecialchars(($a['last_name'] ?? '').', '.($a['first_name'] ?? '')) ?></strong>?
                            </div>
                            <div class="modal-footer border-0">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <a href="<?= base_url('admin/alumni/delete/'.$a['id']) ?>" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

</div>
<!-- DataTables Script with Filters -->
<script>
    $(document).ready(function () {
        var table = $('#datatable').DataTable();

        // Course filter
        $('#courseFilter').on('change', function () {
            var course = $(this).val();
            if (course === '') {
                table.column(2).search('').draw();
            } else {
                table.column(2).search('^' + course + '$', true, false).draw();
            }
        });

        // Year Level filter
        $('#yearFilter').on('change', function () {
            var year = $(this).val();
            if (year === '') {
                table.column(3).search('').draw();
            } else {
                table.column(3).search('^' + year + '$', true, false).draw();
            }
        });

        // Status filter
        $('#statusFilter').on('change', function () {
            var status = $(this).val();
            if (status === '') {
                table.column(5).search('').draw();
            } else {
                table.column(5).search('^' + status + '$', true, false).draw();
            }
        });

        // Custom date range filter (Date Enrolled)
        $.fn.dataTable.ext.search.push(
            function (settings, data, dataIndex) {
                var min = $('#minDate').val();
                var max = $('#maxDate').val();
                var date = data[4]; // Date Enrolled column index = 4

                if (!date) return true;

                // Convert to comparable format
                var enrolledDate = new Date(date);
                var minDate = min ? new Date(min) : null;
                var maxDate = max ? new Date(max) : null;

                if (
                    (!minDate && !maxDate) ||
                    (!minDate && enrolledDate <= maxDate) ||
                    (!maxDate && enrolledDate >= minDate) ||
                    (enrolledDate >= minDate && enrolledDate <= maxDate)
                ) {
                    return true;
                }
                return false;
            }
        );

        $('#minDate, #maxDate').on('change', function () {
            table.draw();
        });
    });
</script>
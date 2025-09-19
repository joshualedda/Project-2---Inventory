<div id="main">
    <!-- Breadcrumb -->
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb" class="rounded-3 mb-4">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Scholarships</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="d-flex justify-content-end my-2">
        <a href="<?= base_url('admin/scholarship/create') ?>" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Upload Scholar
        </a>
    </div>

    <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
        <?php endif; ?>

    <!-- My Scholarships Section -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                 <div class="card-header">
                <h5 class="card-title mb-0">Scholar Students</h5>
            </div>
                    <div class="card-body">

                      

                        <div class="table-responsive mb-3">
                            <!-- Filters -->
                            <div class="row mb-2">
                                <!-- Scholarship Type Filter -->
                                <div class="col-md-2">
                                    <label for="scholarTypeFilter" class="form-label fw-bold">Filter by Type:</label>
                                    <select id="scholarTypeFilter" class="form-select">
                                        <option value="">All Types</option>
                                        <option value="Academic">Academic</option>
                                        <option value="Athletic">Athletic</option>
                                        <option value="Financial Aid">Financial Aid</option>
                                    </select>
                                </div>

                                <!-- Year Level Filter -->
                                <div class="col-md-2">
                                    <label for="yearLevelFilter" class="form-label fw-bold">Filter by Year:</label>
                                    <select id="yearLevelFilter" class="form-select">
                                        <option value="">All Years</option>
                                        <option value="1st Year">1st Year</option>
                                        <option value="2nd Year">2nd Year</option>
                                        <option value="3rd Year">3rd Year</option>
                                        <option value="4th Year">4th Year</option>
                                    </select>
                                </div>

                                <!-- Course Filter -->
                                <div class="col-md-2">
                                    <label for="courseFilter" class="form-label fw-bold">Filter by Course:</label>
                                    <select id="courseFilter" class="form-select">
                                        <option value="">All Courses</option>
                                        <option value="BSIT">BSIT</option>
                                        <option value="BSBA">BSBA</option>
                                        <option value="BSED">BSED</option>
                                    </select>
                                </div>

                                <!-- Date Filter -->
                                <div class="col-md-2">
                                    <label for="minDate" class="form-label fw-bold">From:</label>
                                    <input type="date" id="minDate" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <label for="maxDate" class="form-label fw-bold">To:</label>
                                    <input type="date" id="maxDate" class="form-control">
                                </div>
                            </div>

                            <table class="table datatable table-striped table-hover" id="scholarTable">
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Course</th>
                                        <th>Year Level</th>
                                        <th>Program</th>
                                        <th>Application</th>
                                        <th>Created</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($scholarships)): ?>
                                        <?php foreach ($scholarships as $s): ?>
                                            <tr>
                                                <td>
                                                    <?php 
                                                        $name = trim(($s->last_name ?? '') . ', ' . ($s->first_name ?? '') . ' ' . ($s->middle_name ?? '')); 
                                                        echo htmlspecialchars($name ?: $s->student_id);
                                                    ?>
                                                </td>
                                                <td><?= htmlspecialchars($s->course_name ?? 'N/A') ?></td>
                                                <td><?= htmlspecialchars($s->year_level ?? 'N/A') ?></td>
                                                <td><?= htmlspecialchars($s->scholarship_name ?? 'N/A') ?></td>
                                                <td><span class="badge bg-secondary"><?= htmlspecialchars($s->application_type) ?></span></td>
                                                <td><?= htmlspecialchars(isset($s->created_at) ? $s->created_at : '') ?></td>
                                                <td>
                                                    <?php if (($s->application_status ?? 'Pending') === 'Approved'): ?>
                                                        <span class="badge bg-success">Approved</span>
                                                    <?php elseif (($s->application_status ?? 'Pending') === 'Rejected'): ?>
                                                        <span class="badge bg-danger">Rejected</span>
                                                    <?php elseif (($s->application_status ?? 'Pending') === 'Under Review'): ?>
                                                        <span class="badge bg-warning text-dark">Under Review</span>
                                                    <?php elseif (($s->application_status ?? 'Pending') === 'On Hold'): ?>
                                                        <span class="badge bg-info text-dark">On Hold</span>
                                                    <?php else: ?>
                                                        <span class="badge bg-secondary">Pending</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('admin/scholarship/view/' . $s->id) ?>" class="btn btn-sm btn-success">View</a>
                                                    <a href="<?= base_url('admin/scholarship/edit/' . $s->id) ?>" class="btn btn-sm btn-primary">Edit</a>
                                                    <a href="<?= base_url('admin/scholarship/delete/' . $s->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this application?');">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="8" class="text-center">No scholarship applications found.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- DataTables Script for Scholarships -->
    <script>
        $(document).ready(function() {
            var table = $('#scholarTable').DataTable({
                order: [
                    [5, "desc"]
                ] // Sort by Created column
            });

            // Scholarship Type filter
            $('#scholarTypeFilter').on('change', function() {
                table.column(3).search(this.value).draw();
            });

            // Year Level filter
            $('#yearLevelFilter').on('change', function() {
                table.column(2).search(this.value).draw();
            });

            // Course filter
            $('#courseFilter').on('change', function() {
                table.column(1).search(this.value).draw();
            });

            // Date range filter
            $.fn.dataTable.ext.search.push(function(settings, data) {
                var min = $('#minDate').val();
                var max = $('#maxDate').val();
                var date = data[4]; // Date Awarded column

                if (!date) return true;

                var d = new Date(date);
                var minDate = min ? new Date(min) : null;
                var maxDate = max ? new Date(max) : null;

                if (
                    (!minDate && !maxDate) ||
                    (!minDate && d <= maxDate) ||
                    (!maxDate && d >= minDate) ||
                    (d >= minDate && d <= maxDate)
                ) {
                    return true;
                }
                return false;
            });

            $('#minDate, #maxDate').on('change', function() {
                table.draw();
            });
        });
    </script>

</div>
</div>

<!-- DataTables Script with Filters -->
<script>
    $(document).ready(function() {
        var table = $('#datatable').DataTable();

        // Category filter
        $('#categoryFilter').on('change', function() {
            var category = $(this).val();
            table.column(3).search(category).draw(); // Category column index = 3
        });

        // Department filter
        $('#departmentFilter').on('change', function() {
            var dept = $(this).val();
            table.column(1).search(dept).draw(); // Department column index = 1
        });

        // Field Office filter
        $('#fieldOfficeFilter').on('change', function() {
            var office = $(this).val();
            table.column(2).search(office).draw(); // Field Office column index = 2
        });

        // Custom date range filter
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = $('#minDate').val();
                var max = $('#maxDate').val();
                var date = data[4]; // Date Uploaded column index = 4

                if (!date) return true;

                if (
                    (min === "" && max === "") ||
                    (min === "" && date <= max) ||
                    (max === "" && date >= min) ||
                    (date >= min && date <= max)
                ) {
                    return true;
                }
                return false;
            }
        );

        $('#minDate, #maxDate').on('change', function() {
            table.draw();
        });
    });
</script>
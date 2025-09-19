<div id="main">
    <!-- Breadcrumb -->
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb" class="rounded-3 mb-4">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Students</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="d-flex justify-content-end my-2">
        <a href="<?= base_url('admin/student/create') ?>" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Upload Student
        </a>
    </div>

    <!-- My Students Section -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title mb-2">Students</h5>

                        <div class="table-responsive mb-3">
                            <!-- Filters -->
                            <div class="row mb-2">
                                <!-- Course Filter -->
                                <div class="col-md-2">
                                    <label for="courseFilter" class="form-label fw-bold">Filter by Course:</label>
                                    <select id="courseFilter" class="form-select">
                                        <option value="">All Courses</option>
                                        <option value="BSIT">BSIT</option>
                                        <option value="BSED">BSED</option>
                                        <option value="BSBA">BSBA</option>
                                        <option value="BSN">BSN</option>
                                    </select>
                                </div>

                                <!-- Year Level Filter -->
                                <div class="col-md-2">
                                    <label for="yearFilter" class="form-label fw-bold">Filter by Year:</label>
                                    <select id="yearFilter" class="form-select">
                                        <option value="">All Years</option>
                                        <option value="1st Year">1st Year</option>
                                        <option value="2nd Year">2nd Year</option>
                                        <option value="3rd Year">3rd Year</option>
                                        <option value="4th Year">4th Year</option>
                                    </select>
                                </div>

                                <!-- Status Filter -->
                                <div class="col-md-2">
                                    <label for="statusFilter" class="form-label fw-bold">Status:</label>
                                    <select id="statusFilter" class="form-select">
                                        <option value="">All</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>

                                <!-- Date Filters -->
                                <div class="col-md-2">
                                    <label for="minDate" class="form-label fw-bold">From:</label>
                                    <input type="date" id="minDate" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <label for="maxDate" class="form-label fw-bold">To:</label>
                                    <input type="date" id="maxDate" class="form-control">
                                </div>
                            </div>

                            <!-- Student Table -->
                            <table class="table datatable table-striped table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Course</th>
                                        <th>Year Level</th>
                                        <th>Date Enrolled</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($students)): ?>
                                        <?php foreach ($students as $student): ?>
                                            <tr>
                                                <td><?= $student->first_name ?></td>
                                                <td><?= $student->last_name ?></td>
                                                <td>
                                                    <span class="badge bg-primary"><?= $student->course_name ?? 'No Course' ?></span>
                                                </td>
                                                <td><?= $student->year_level ?></td>
                                                <td><?= $student->admission_date ?></td>
                                                <td>
                                                    <?php if ($student->status == 0): ?>
                                                        <span class="badge rounded-pill bg-success">Active</span>
                                                    <?php else: ?>
                                                        <span class="badge rounded-pill bg-danger">Inactive</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('admin/student/edit/' . $student->id) ?>"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="bi bi-pencil"></i> Edit
                                                    </a>
                                                   
                                                    <a href="<?= base_url('admin/student/view/' . $student->id) ?>"
                                                        class="btn btn-sm btn-success">View</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="7" class="text-center">No students found.</td>
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
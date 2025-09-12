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
        <a href="<?= base_url('admin/student/create') ?>" class="btn btn-success">
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
                                    <!-- Row 1 -->
                                    <tr>
                                        <td>Juan</td>
                                        <td>Dela Cruz</td>
                                        <td><span class="badge bg-primary">BSIT</span></td>
                                        <td>1st Year</td>
                                        <td>2025-09-01</td>
                                        <td><span class="badge rounded-pill bg-success">Active</span></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-secondary">
                                                <i class="bi bi-printer"></i> Print
                                            </a>
                                            <a href="#" class="btn btn-sm btn-success">View</a>
                                        </td>
                                    </tr>

                                    <!-- Row 2 -->
                                    <tr>
                                        <td>Maria</td>
                                        <td>Santos</td>
                                        <td><span class="badge bg-info">BSED</span></td>
                                        <td>2nd Year</td>
                                        <td>2025-08-20</td>
                                        <td><span class="badge rounded-pill bg-danger">Inactive</span></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-secondary">
                                                <i class="bi bi-printer"></i> Print
                                            </a>
                                            <a href="#" class="btn btn-sm btn-success">View</a>
                                        </td>
                                    </tr>

                                    <!-- Row 3 -->
                                    <tr>
                                        <td>Carlos</td>
                                        <td>Reyes</td>
                                        <td><span class="badge bg-warning text-dark">BSBA</span></td>
                                        <td>3rd Year</td>
                                        <td>2025-07-15</td>
                                        <td><span class="badge rounded-pill bg-success">Active</span></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-secondary">
                                                <i class="bi bi-printer"></i> Print
                                            </a>
                                            <a href="#" class="btn btn-sm btn-success">View</a>
                                        </td>
                                    </tr>

                                    <!-- Row 4 -->
                                    <tr>
                                        <td>Ana</td>
                                        <td>Lopez</td>
                                        <td><span class="badge bg-danger">BSN</span></td>
                                        <td>4th Year</td>
                                        <td>2025-06-05</td>
                                        <td><span class="badge rounded-pill bg-success">Active</span></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-secondary">
                                                <i class="bi bi-printer"></i> Print
                                            </a>
                                            <a href="#" class="btn btn-sm btn-success">View</a>
                                        </td>
                                    </tr>
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
    $(document).ready(function() {
        var table = $('#datatable').DataTable();

        // Course filter
        $('#courseFilter').on('change', function() {
            var course = $(this).val();
            table.column(2).search(course).draw(); // Course column index = 2
        });

        // Year Level filter
        $('#yearFilter').on('change', function() {
            var year = $(this).val();
            table.column(3).search(year).draw(); // Year Level column index = 3
        });

        // Status filter
        $('#statusFilter').on('change', function() {
            var status = $(this).val();
            table.column(5).search(status).draw(); // Status column index = 5
        });

        // Custom date range filter (Date Enrolled)
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
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

        $('#minDate, #maxDate').on('change', function() {
            table.draw();
        });
    });
</script>

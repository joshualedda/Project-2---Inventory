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

    <!-- My Scholarships Section -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title mb-2">Scholar Students</h5>

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
                                        <th>Scholarship Type</th>
                                        <th>Date Awarded</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Row 1 -->
                                    <tr>
                                        <td>Juan Dela Cruz</td>
                                        <td>BSIT</td>
                                        <td>2nd Year</td>
                                        <td>Academic</td>
                                        <td>2025-08-15</td>
                                        <td><span class="badge rounded-pill bg-success">Active</span></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-success">View</a>
                                            <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <!-- Row 2 -->
                                    <tr>
                                        <td>Maria Santos</td>
                                        <td>BSBA</td>
                                        <td>3rd Year</td>
                                        <td>Athletic</td>
                                        <td>2025-07-10</td>
                                        <td><span class="badge rounded-pill bg-danger">Inactive</span></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-success">View</a>
                                            <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <!-- Row 3 -->
                                    <tr>
                                        <td>Ana Lopez</td>
                                        <td>BSED</td>
                                        <td>1st Year</td>
                                        <td>Financial Aid</td>
                                        <td>2025-09-01</td>
                                        <td><span class="badge rounded-pill bg-success">Active</span></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-success">View</a>
                                            <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
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

    <!-- DataTables Script for Scholarships -->
    <script>
        $(document).ready(function() {
            var table = $('#scholarTable').DataTable({
                order: [
                    [4, "desc"]
                ] // Sort by Date Awarded
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
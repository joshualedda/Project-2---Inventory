<div id="main">
    <!-- Breadcrumb -->
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb" class="rounded-3 mb-4">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Files</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="d-flex justify-content-end my-2">
        <a href="<?= base_url('files/create') ?>" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Upload File
        </a>
    </div>

    <!-- My Files Section -->
     <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title mb-2">Files</h5>

                        <div class="table-responsive mb-3">
                            <!-- Filters -->
                            <div class="row mb-2">
                                <!-- Category Filter -->
                                <div class="col-md-2">
                                    <label for="categoryFilter" class="form-label fw-bold">Filter by Category:</label>
                                    <select id="categoryFilter" class="form-select">
                                        <option value="">All Categories</option>
                                        <option value="Reports">Reports</option>
                                        <option value="Plans">Plans</option>
                                        <option value="Study">Study</option>
                                    </select>
                                </div>

                                <!-- Department Filter -->
                                <div class="col-md-2">
                                    <label for="departmentFilter" class="form-label fw-bold">Filter by Department:</label>
                                    <select id="departmentFilter" class="form-select">
                                        <option value="">All Departments</option>
                                        <option value="Research">Research</option>
                                        <option value="Extension">Extension</option>
                                    </select>
                                </div>

                                <!-- Field Office Filter -->
                                <div class="col-md-2">
                                    <label for="fieldOfficeFilter" class="form-label fw-bold">Filter by Field Office:</label>
                                    <select id="fieldOfficeFilter" class="form-select">
                                        <option value="">All Field Offices</option>
                                        <option value="FO1">FO1</option>
                                        <option value="FO2">FO2</option>
                                        <option value="FO3">FO3</option>
                                    </select>
                                </div>


                                <div class="col-md-2">
                                    <label for="minDate" class="form-label fw-bold">From:</label>
                                    <input type="date" id="minDate" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <label for="maxDate" class="form-label fw-bold">To:</label>
                                    <input type="date" id="maxDate" class="form-control">
                                </div>
                            </div>

                            <table class="table datatable table-striped table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th>File Name</th>
                                        <th>Department</th>
                                        <th>Field Office</th>
                                        <th>Category</th>
                                        <th>Date Uploaded</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Row 1 -->
                                    <tr>
                                        <td>Annual Research Report 2025.pdf</td>
                                        <td><span class="badge bg-primary">Research</span></td>
                                        <td><span class="badge bg-warning text-dark">FO1</span></td>
                                        <td>Reports</td>
                                        <td>2025-09-01</td>
                                        <td><span class="badge rounded-pill bg-success">Active</span></td>
                                        <td>
                                            <a href="<?= base_url('assets/uploads/AnnualResearchReport2025.pdf'); ?>" class="btn btn-sm btn-secondary">
                                                <i class="bi bi-printer"></i> Print
                                            </a>
                                            <a href="<?= base_url('admin/file/view'); ?>" class="btn btn-sm btn-success">View</a>
                                            
                                        </td>
                                    </tr>
                                    <!-- Row 2 -->
                                    <tr>
                                        <td>Community Training Plan.docx</td>
                                        <td><span class="badge bg-info">Extension</span></td>
                                        <td><span class="badge bg-warning text-dark">FO2</span></td>
                                        <td>Plans</td>
                                        <td>2025-08-28</td>
                                        <td><span class="badge rounded-pill bg-danger">Inactive</span></td>
                                        <td>
                                            <a href="<?= base_url('assets/uploads/CommunityTrainingPlan.docx'); ?>" class="btn btn-sm btn-secondary">
                                                <i class="bi bi-printer"></i> Print
                                            </a>
                                            <a href="#" class="btn btn-sm btn-success">View</a>
                                            
                                        </td>
                                    </tr>
                                    <!-- Row 3 -->
                                    <tr>
                                        <td>ApisMellifera.docx</td>
                                        <td><span class="badge bg-primary">Research</span></td>
                                        <td><span class="badge bg-warning text-dark">FO3</span></td>
                                        <td>Study</td>
                                        <td>2025-07-15</td>
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
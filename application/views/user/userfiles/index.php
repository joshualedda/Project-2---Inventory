<div id="main">
    <!-- Breadcrumb -->
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb" class="rounded-3 mb-4">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">My Files</li>
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

                        <h5 class="card-title mb-2">My Files</h5>

                        <div class="table-responsive mb-3">
                            <!-- Filters -->
                            <div class="row mb-2">
                                <!-- Category Filter -->
                                <div class="col-md-3">
                                    <label for="categoryFilter" class="form-label fw-bold">Filter by Category:</label>
                                    <select id="categoryFilter" class="form-select">
                                        <option value="">All Categories</option>
                                        <option value="Reports">Reports</option>
                                        <option value="Plans">Plans</option>
                                        <option value="Study">Study</option>
                                    </select>
                                </div>

                                <!-- Confidentiality Filter -->
                                <div class="col-md-3">
                                    <label for="confidentialityFilter" class="form-label fw-bold">Filter by Confidentiality:</label>
                                    <select id="confidentialityFilter" class="form-select">
                                        <option value="">All Levels</option>
                                        <option value="Public">Public</option>
                                        <option value="Internal">Internal</option>
                                        <option value="Confidential">Confidential</option>
                                        <option value="Top Secret">Top Secret</option>
                                    </select>
                                </div>

                                <!-- Date Range Filter -->
                                <div class="col-md-3">
                                    <label for="minDate" class="form-label fw-bold">From:</label>
                                    <input type="date" id="minDate" class="form-control">
                                </div>
                                <div class="col-md-3">
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
                                        <th>Confidentiality</th>
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
                                        <td><span class="badge bg-danger">Confidential</span></td>
                                        <td>2025-09-01</td>
                                        <td><span class="badge rounded-pill bg-success">Active</span></td>
                                        <td>
                                            <a href="<?= base_url('assets/uploads/AnnualResearchReport2025.pdf'); ?>" class="btn btn-sm btn-secondary">
                                                <i class="bi bi-printer"></i> Print
                                            </a>
                                            <a href="<?= base_url('admin/file/view'); ?>" class="btn btn-sm btn-success">View</a>
                                            <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <!-- Row 2 -->
                                  
                                    <tr>
                                        <td>ApisMellifera.docx</td>
                                        <td><span class="badge bg-primary">Research</span></td>
                                        <td><span class="badge bg-warning text-dark">FO3</span></td>
                                        <td>Study</td>
                                        <td><span class="badge bg-success">Public</span></td>
                                        <td>2025-07-15</td>
                                        <td><span class="badge rounded-pill bg-success">Active</span></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-secondary">
                                                <i class="bi bi-printer"></i> Print
                                            </a>
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

        // Confidentiality filter
        $('#confidentialityFilter').on('change', function() {
            var level = $(this).val();
            table.column(4).search(level).draw(); // Confidentiality column index = 4
        });

        // Custom date range filter
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = $('#minDate').val();
                var max = $('#maxDate').val();
                var date = data[5]; // Date Uploaded column index = 5

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

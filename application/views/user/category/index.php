<div id="main">
    <div class="main-container">

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

        <!-- Add Button -->
        <div class="d-flex justify-content-end my-2">
            <a href="<?= base_url('files/create') ?>" class="btn btn-success">
                <i class="bi bi-plus-lg"></i> Add File
            </a>
        </div>

        <!-- Files Index -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <h5 class="card-title mb-2">Files Index</h5>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="datatable-category">
                                    <thead>
                                        <tr>
                                            <th>Category Name</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Row 1 -->
                                        <tr>
                                            <td>Reports</td>
                                            <td><span class="badge rounded-pill bg-success">Active</span></td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        <!-- Row 2 -->
                                        <tr>
                                            <td>Plans</td>
                                            <td><span class="badge rounded-pill bg-success">Active</span></td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        <!-- Row 3 -->
                                        <tr>
                                            <td>Checklist</td>
                                            <td><span class="badge rounded-pill bg-danger">Inactive</span></td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        <!-- Row 4 -->
                                        <tr>
                                            <td>Strategy</td>
                                            <td><span class="badge rounded-pill bg-success">Active</span></td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        <!-- Row 5 -->
                                        <tr>
                                            <td>Memorandum</td>
                                            <td><span class="badge rounded-pill bg-success">Active</span></td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        <!-- Row 6 -->
                                        <tr>
                                            <td>Study</td>
                                            <td><span class="badge rounded-pill bg-success">Active</span></td>
                                            <td>
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
</div>
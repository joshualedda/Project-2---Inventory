<div id="main">
    <div class="main-container">

        <!-- Breadcrumb -->
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Department</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Back Button -->
        <div class="d-flex justify-content-end my-2">
            <a href="<?= base_url('department') ?>" class="btn btn-success">Back</a>
        </div>

        <!-- Alerts -->
        <?php if ($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
        <?php endif; ?>

        <!-- Department Form -->
        <div class="card">
            <h3 class="card-title mx-4 mt-4">
                Department Information
            </h3>
            <div class="card-body">
                <form action="<?= base_url('departments/store') ?>" method="post">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="department_name" class="form-label">Department</label>
                            <input type="text" class="form-control" name="department_name" value="<?= set_value('department_name') ?>">
                            <?= form_error('department_name', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <div class="col-md-6">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" class="form-select" aria-label="Default select example">
                                <option selected value="">Select status</option>
                                <option value="0">Active</option>
                                <option value="1">Inactive</option>
                            </select>
                            <?= form_error('status', '<div class="error text-danger">', '</div>') ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Department Files Dummy Data -->
        <div class="col-lg-12 my-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Department Files</h5>
                    <div class="table-responsive">
                        <table class="table datatable table-striped table-hover" id="datatable">
                            <thead>
                                <tr>
                                    <th>File Name</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Annual Research Report 2025.pdf</td>
                                    <td>Reports</td>
                                    <td><span class="badge rounded-pill bg-success">Active</span></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-success">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Community Training Plan.docx</td>
                                    <td>Plans</td>
                                    <td><span class="badge rounded-pill bg-danger">Inactive</span></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-success">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Quality Assurance Checklist.xlsx</td>
                                    <td>Checklist</td>
                                    <td><span class="badge rounded-pill bg-success">Active</span></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-success">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Strategic Plan 2025.pptx</td>
                                    <td>Strategy</td>
                                    <td><span class="badge rounded-pill bg-secondary">Unknown</span></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-success">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Director’s Memo.pdf</td>
                                    <td>Memorandum</td>
                                    <td><span class="badge rounded-pill bg-success">Active</span></td>
                                    <td>
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
</div>
<div id="main">
    <div class="main-container">
        <div class="d-flex justify-content-end my-2">
            <a href="<?= base_url('files') ?>" class="btn btn-success">Back</a>
        </div>

        <?php if ($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
        <?php endif; ?>

        <div class="card">
            <h3 class="card-title mx-4 mt-4">Upload File</h3>
            <div class="card-body">
                <form action="<?= base_url('files/upload') ?>" method="post" enctype="multipart/form-data">
                    <div class="row g-3">

                        <!-- File Name -->
                        <div class="col-md-6">
                            <label for="file_name" class="form-label">File Name</label>
                            <input type="text" class="form-control" name="file_name" 
                                   value="<?= set_value('file_name', 'Annual Report 2025') ?>">
                            <?= form_error('file_name', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <!-- Department -->
                        <div class="col-md-6">
                            <label for="department_id" class="form-label">Department</label>
                            <select name="department_id" class="form-select">
                                <option value="">Choose Department</option>
                                <option value="1" selected>Research</option>
                                <option value="2">Extension</option>
                                <option value="3">AQA</option>
                                <option value="4">Planning</option>
                                <option value="5">OED (Office of the Executive Director)</option>
                            </select>
                            <?= form_error('department_id', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <!-- Field Office -->
                        <div class="col-md-6">
                            <label for="field_office" class="form-label">Field Office</label>
                            <select name="field_office" class="form-select">
                                <option value="">Choose Field Office</option>
                                <option value="FO1" selected>FO1</option>
                                <option value="FO2">FO2</option>
                                <option value="FO3">FO3</option>
                                <option value="FO4">FO4</option>
                            </select>
                            <?= form_error('field_office', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <!-- Category -->
                        <div class="col-md-6">
                            <label for="category" class="form-label">Category</label>
                            <select name="category" class="form-select">
                                <option value="">Choose Category</option>
                                <option value="Reports" selected>Reports</option>
                                <option value="Plans">Plans</option>
                                <option value="Checklist">Checklist</option>
                                <option value="Strategy">Strategy</option>
                                <option value="Memorandum">Memorandum</option>
                                <option value="Study">Study</option>
                            </select>
                            <?= form_error('category', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <!-- Status -->
                        <div class="col-md-6">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="0" selected>Active</option>
                                <option value="1">Inactive</option>
                                <option value="2">Unknown</option>
                            </select>
                            <?= form_error('status', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <!-- File Upload -->
                        <div class="col-md-6">
                            <label for="document" class="form-label">Upload File 
                                <i class="text-danger text-xs">(doc, docx, pdf, xlsx, pptx)</i>
                            </label>
                            <input type="file" class="form-control" name="document">
                            <?= form_error('document', '<div class="error text-danger">', '</div>') ?>
                            <small class="text-muted">💡 For testing, you can place a file inside <code>/assets/uploads/</code></small>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

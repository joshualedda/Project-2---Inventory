<div id="main">
    <div class="main-container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/scholarshipprogram') ?>">Scholarship Programs</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Program</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="d-flex justify-content-end my-2">
            <a href="<?= base_url('admin/scholarshipprogram') ?>" class="btn btn-success">Back</a>
        </div>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
        <?php endif; ?>
        <?php if (validation_errors()): ?>
            <div class="alert alert-danger"><?= validation_errors() ?></div>
        <?php endif; ?>

        <div class="card">
        <div class="card-header">
        <h5 class="card-title mb-0">
                Create Scholarship Program
            </h5>
            </div>

            <div class="card-body">
                <form action="<?= base_url('admin/scholarshipprogram/store') ?>" method="POST">
                    <div class="row g-3">

                        <!-- Scholarship Name -->
                        <div class="col-12">
                            <label class="form-label">Scholarship Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="scholarship_name" 
                                   value="<?= set_value('scholarship_name') ?>" 
                                   placeholder="Enter scholarship program name" maxlength="50">
                            <?= form_error('scholarship_name', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <!-- Description -->
                        <div class="col-12">
                            <label class="form-label">Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="description" rows="4" 
                                      placeholder="Enter program description" maxlength="200"><?= set_value('description') ?></textarea>
                            <div class="form-text">Maximum 200 characters</div>
                            <?= form_error('description', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <!-- Source -->
                        <div class="col-md-6">
                            <label class="form-label">Source <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="source" 
                                   value="<?= set_value('source') ?>" 
                                   placeholder="Enter funding source" maxlength="100">
                            <?= form_error('source', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <!-- Type -->
                        <div class="col-md-6">
                            <label class="form-label">Type <span class="text-danger">*</span></label>
                            <select name="type" class="form-select">
                                <option value="">Select Program Type</option>
                                <option value="1" <?= set_select('type', '1') ?>>Academic Excellence</option>
                                <option value="2" <?= set_select('type', '2') ?>>Financial Need</option>
                                <option value="3" <?= set_select('type', '3') ?>>Athletic</option>
                                <option value="4" <?= set_select('type', '4') ?>>Cultural</option>
                                <option value="5" <?= set_select('type', '5') ?>>Merit-Based</option>
                                <option value="6" <?= set_select('type', '6') ?>>Need-Based</option>
                                <option value="7" <?= set_select('type', '7') ?>>Special Category</option>
                            </select>
                            <?= form_error('type', '<div class="error text-danger">', '</div>') ?>
                        </div>

                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary me-2">Create Program</button>
                            <a href="<?= base_url('admin/scholarshipprogram') ?>" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Character counter for description
    $('textarea[name="description"]').on('input', function() {
        var length = $(this).val().length;
        var remaining = 200 - length;
        $(this).next('.form-text').text(remaining + ' characters remaining');
        
        if (remaining < 20) {
            $(this).next('.form-text').addClass('text-warning');
        } else {
            $(this).next('.form-text').removeClass('text-warning');
        }
    });

    // Character counter for scholarship name
    $('input[name="scholarship_name"]').on('input', function() {
        var length = $(this).val().length;
        var remaining = 50 - length;
        if (remaining < 10) {
            $(this).addClass('border-warning');
        } else {
            $(this).removeClass('border-warning');
        }
    });
});
</script>

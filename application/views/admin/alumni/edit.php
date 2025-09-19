<div id="main">
    <div class="main-container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/alumni') ?>">Alumni</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="d-flex justify-content-end my-2">
            <a href="<?= base_url('admin/alumni') ?>" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
        <?php endif; ?>

        <div class="card">
            <div class="card-header bg-white border-bottom">
                <h5 class="card-title mb-0 text-dark">Edit Alumni</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/alumni/update/'.$alumni['id']) ?>" method="POST">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Student</label>
                            <select name="student_id" class="form-select" required>
                                <?php if (!empty($students)): foreach ($students as $s): ?>
                                    <option value="<?= $s->id ?>" <?= (int)$alumni['student_id'] === (int)$s->id ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($s->last_name.', '.$s->first_name.' ('.$s->student_id.') - '.($s->course_name ?? 'No Course').' '.$s->year_level) ?>
                                    </option>
                                <?php endforeach; endif; ?>
                            </select>
                            <?= form_error('student_id', '<div class="text-danger small">', '</div>') ?>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Graduation Year</label>
                            <input type="number" name="graduation_year" class="form-control" value="<?= (int)$alumni['graduation_year'] ?>" required>
                            <?= form_error('graduation_year', '<div class="text-danger small">', '</div>') ?>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select" required>
                                <option value="0" <?= (int)$alumni['status'] === 0 ? 'selected' : '' ?>>Active</option>
                                <option value="1" <?= (int)$alumni['status'] === 1 ? 'selected' : '' ?>>Inactive</option>
                            </select>
                            <?= form_error('status', '<div class="text-danger small">', '</div>') ?>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Employment Status</label>
                            <select name="employment_status" class="form-select" required>
                                <option value="Employed" <?= $alumni['employment_status'] === 'Employed' ? 'selected' : '' ?>>Employed</option>
                                <option value="Unemployed" <?= $alumni['employment_status'] === 'Unemployed' ? 'selected' : '' ?>>Unemployed</option>
                            </select>
                            <?= form_error('employment_status', '<div class="text-danger small">', '</div>') ?>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Company</label>
                            <input type="text" name="company" class="form-control" value="<?= htmlspecialchars($alumni['company'] ?? '') ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Position</label>
                            <input type="text" name="position" class="form-control" value="<?= htmlspecialchars($alumni['position'] ?? '') ?>">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>



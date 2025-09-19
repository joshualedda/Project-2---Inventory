<div id="main">
    <div class="main-container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/scholarships') ?>">Scholarships</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Scholarship</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="d-flex justify-content-end my-2">
            <a href="<?= base_url('admin/scholarships') ?>" class="btn btn-secondary">Back</a>
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
                <h5 class="card-title mb-0">Edit Scholarship Application</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/scholarship/update/' . $scholarship->id) ?>" method="POST">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Application Type</label>
                            <select name="application_type" class="form-select" required>
                                <option value="New" <?= set_select('application_type', 'New', $scholarship->application_type === 'New') ?>>New</option>
                                <option value="Renewal" <?= set_select('application_type', 'Renewal', $scholarship->application_type === 'Renewal') ?>>Renewal</option>
                            </select>
                            <?= form_error('application_type', '<div class="text-danger small">', '</div>') ?>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Semester</label>
                            <select name="semester" class="form-select" required>
                                <option value="1" <?= set_select('semester', '1', (int)$scholarship->semester === 1) ?>>1st Semester</option>
                                <option value="2" <?= set_select('semester', '2', (int)$scholarship->semester === 2) ?>>2nd Semester</option>
                            </select>
                            <?= form_error('semester', '<div class="text-danger small">', '</div>') ?>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Scholarship Program</label>
                            <select name="scholarship_id" class="form-select" required>
                                <?php foreach ($scholarship_programs as $program): ?>
                                    <option value="<?= $program->id ?>" <?= set_select('scholarship_id', $program->id, (int)$scholarship->scholarship_id === (int)$program->id) ?>>
                                        <?= htmlspecialchars($program->scholarship_name) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('scholarship_id', '<div class="text-danger small">', '</div>') ?>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Contact Number</label>
                            <input type="text" name="contact_no" class="form-control" value="<?= set_value('contact_no', $scholarship->contact_no) ?>" required>
                            <?= form_error('contact_no', '<div class="text-danger small">', '</div>') ?>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="<?= set_value('email', $scholarship->email) ?>" required>
                            <?= form_error('email', '<div class="text-danger small">', '</div>') ?>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" value="<?= set_value('address', $scholarship->address) ?>" required>
                            <?= form_error('address', '<div class="text-danger small">', '</div>') ?>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Birth Date</label>
                            <input type="date" name="birth_date" class="form-control" value="<?= set_value('birth_date', $scholarship->birth_date) ?>" required>
                            <?= form_error('birth_date', '<div class="text-danger small">', '</div>') ?>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Gender</label>
                            <select name="gender" class="form-select" required>
                                <option value="Male" <?= set_select('gender', 'Male', $scholarship->gender === 'Male') ?>>Male</option>
                                <option value="Female" <?= set_select('gender', 'Female', $scholarship->gender === 'Female') ?>>Female</option>
                            </select>
                            <?= form_error('gender', '<div class="text-danger small">', '</div>') ?>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Facebook</label>
                            <input type="text" name="facebook" class="form-control" value="<?= set_value('facebook', $scholarship->facebook) ?>">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Birth Place</label>
                            <input type="text" name="birth_place" class="form-control" value="<?= set_value('birth_place', $scholarship->birth_place) ?>">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Religion</label>
                            <input type="text" name="religion" class="form-control" value="<?= set_value('religion', $scholarship->religion) ?>" required>
                            <?= form_error('religion', '<div class="text-danger small">', '</div>') ?>
                        </div>

                        <div class="col-12 mt-3">
                            <h6>Family Background</h6>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Father Name</label>
                            <input type="text" name="father_name" class="form-control" value="<?= set_value('father_name', $scholarship->father_name) ?>" required>
                            <?= form_error('father_name', '<div class="text-danger small">', '</div>') ?>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Father Address</label>
                            <input type="text" name="father_address" class="form-control" value="<?= set_value('father_address', $scholarship->father_address) ?>" required>
                            <?= form_error('father_address', '<div class="text-danger small">', '</div>') ?>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Father Contact</label>
                            <input type="text" name="father_contact" class="form-control" value="<?= set_value('father_contact', $scholarship->father_contact) ?>" required>
                            <?= form_error('father_contact', '<div class="text-danger small">', '</div>') ?>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Father Occupation</label>
                            <input type="text" name="father_occupation" class="form-control" value="<?= set_value('father_occupation', $scholarship->father_occupation) ?>" required>
                            <?= form_error('father_occupation', '<div class="text-danger small">', '</div>') ?>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Father Employment</label>
                            <input type="text" name="father_employment" class="form-control" value="<?= set_value('father_employment', $scholarship->father_employment) ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Father Education</label>
                            <input type="text" name="father_education" class="form-control" value="<?= set_value('father_education', $scholarship->father_education) ?>" required>
                            <?= form_error('father_education', '<div class="text-danger small">', '</div>') ?>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Mother Name</label>
                            <input type="text" name="mother_name" class="form-control" value="<?= set_value('mother_name', $scholarship->mother_name) ?>" required>
                            <?= form_error('mother_name', '<div class="text-danger small">', '</div>') ?>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Mother Address</label>
                            <input type="text" name="mother_address" class="form-control" value="<?= set_value('mother_address', $scholarship->mother_address) ?>" required>
                            <?= form_error('mother_address', '<div class="text-danger small">', '</div>') ?>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Mother Contact</label>
                            <input type="text" name="mother_contact" class="form-control" value="<?= set_value('mother_contact', $scholarship->mother_contact) ?>" required>
                            <?= form_error('mother_contact', '<div class="text-danger small">', '</div>') ?>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Mother Occupation</label>
                            <input type="text" name="mother_occupation" class="form-control" value="<?= set_value('mother_occupation', $scholarship->mother_occupation) ?>" required>
                            <?= form_error('mother_occupation', '<div class="text-danger small">', '</div>') ?>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Mother Employment</label>
                            <input type="text" name="mother_employment" class="form-control" value="<?= set_value('mother_employment', $scholarship->mother_employment) ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Mother Education</label>
                            <input type="text" name="mother_education" class="form-control" value="<?= set_value('mother_education', $scholarship->mother_education) ?>" required>
                            <?= form_error('mother_education', '<div class="text-danger small">', '</div>') ?>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Application Status</label>
                            <select name="application_status" class="form-select">
                                <?php $status = $scholarship->application_status ?: 'Pending'; ?>
                                <option value="Pending" <?= set_select('application_status', 'Pending', $status === 'Pending') ?>>Pending</option>
                                <option value="Under Review" <?= set_select('application_status', 'Under Review', $status === 'Under Review') ?>>Under Review</option>
                                <option value="Approved" <?= set_select('application_status', 'Approved', $status === 'Approved') ?>>Approved</option>
                                <option value="Rejected" <?= set_select('application_status', 'Rejected', $status === 'Rejected') ?>>Rejected</option>
                                <option value="On Hold" <?= set_select('application_status', 'On Hold', $status === 'On Hold') ?>>On Hold</option>
                            </select>
                            <?= form_error('application_status', '<div class="text-danger small">', '</div>') ?>
                        </div>


                        <div class="col-md-6">
                            <label class="form-label">Reasons for Applying Scholarship</label>
                            <input type="text" name="scholar_reason" class="form-control" value="<?= set_value('scholar_reason', $scholarship->scholar_reason) ?>" required>
                            <?= form_error('scholar_reason', '<div class="text-danger small">', '</div>') ?>
                        </div>



                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="<?= base_url('admin/scholarships') ?>" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



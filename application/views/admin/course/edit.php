<div id="main">
    <div class="main-container">
        <section>
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="rounded-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/courses') ?>">Courses</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Course</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Course</h5>

                            <!-- Flash Messages -->
                            <?php if ($this->session->flashdata('error_message')): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?= $this->session->flashdata('error_message') ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            <?php endif; ?>

                            <form action="<?= base_url('admin/course/update/' . $course['id']) ?>" method="POST">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="course" class="form-label">Course Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="course" name="course" 
                                               value="<?= set_value('course', $course['course']) ?>" required>
                                        <?= form_error('course', '<div class="text-danger small">', '</div>') ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="description" name="description" rows="3" 
                                                  placeholder="Enter course description..." required><?= set_value('description', $course['description']) ?></textarea>
                                        <?= form_error('description', '<div class="text-danger small">', '</div>') ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="">Select Status</option>
                                            <option value="0" <?= set_select('status', '0', $course['status'] == 0) ?>>Active</option>
                                            <option value="1" <?= set_select('status', '1', $course['status'] == 1) ?>>Inactive</option>
                                        </select>
                                        <?= form_error('status', '<div class="text-danger small">', '</div>') ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">
                                            <i class='bx bx-save'></i> Update Course
                                        </button>
                                        <a href="<?= base_url('admin/courses') ?>" class="btn btn-secondary">
                                            <i class='bx bx-arrow-back'></i> Cancel
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Course Information</h5>
                            <div class="alert alert-info">
                                <h6 class="alert-heading">Course Guidelines:</h6>
                                <ul class="mb-0">
                                    <li>Course name must be unique</li>
                                    <li>Use clear and descriptive course names</li>
                                    <li>Provide a detailed description (max 100 characters)</li>
                                    <li>Set status to Active for available courses</li>
                                    <li>Set status to Inactive to disable enrollment</li>
                                </ul>
                            </div>

                            <div class="mt-3">
                                <h6>Current Status:</h6>
                                <?php if ($course['status'] == 0): ?>
                                    <span class="badge bg-success">Active</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">Inactive</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

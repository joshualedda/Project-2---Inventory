<div id="main">
    <div class="main-container">
        <section>
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="rounded-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Courses</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="d-flex justify-content-end my-2">
                                <a href="<?= base_url('admin/course/create') ?>" class="btn btn-primary">
                                    <i class='bx bx-plus'></i> Add New Course
                                </a>
                            </div>

                                <?php if ($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
        <?php endif; ?>

        
            <!-- Statistics Cards (consistent with Programs index) -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title mb-1 text-dark"><?= $statistics['total_courses'] ?? 0 ?></h5>
                                    <p class="card-text mb-0 small text-muted">Total Courses</p>
                                </div>
                                <div>
                                    <i class="bi bi-mortarboard-fill text-primary" style="font-size: 1.8rem;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title mb-1 text-dark"><?= $statistics['active_courses'] ?? 0 ?></h5>
                                    <p class="card-text mb-0 small text-muted">Active Courses</p>
                                </div>
                                <div>
                                    <i class="bi bi-check-circle-fill text-success" style="font-size: 1.8rem;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title mb-1 text-dark"><?= $statistics['inactive_courses'] ?? 0 ?></h5>
                                    <p class="card-text mb-0 small text-muted">Inactive Courses</p>
                                </div>
                                <div>
                                    <i class="bi bi-x-circle-fill text-danger" style="font-size: 1.8rem;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title mb-1 text-dark"><?= array_sum(array_column($statistics['students_per_course'] ?? [], 'student_count')) ?></h5>
                                    <p class="card-text mb-0 small text-muted">Total Enrolled Students</p>
                                </div>
                                <div>
                                    <i class="bi bi-people-fill text-info" style="font-size: 1.8rem;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title mb-2">Students</h5>

                        

                            <div class="table-responsive">
                                <table class="table table-striped" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>Course Name</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Total Students</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($courses)): ?>
                                            <?php foreach ($courses as $course): ?>
                                                <tr>
                                                    <td><?= htmlspecialchars($course['course']) ?></td>
                                                    <td><?= htmlspecialchars($course['description']) ?></td>
                                                    <td>
                                                        <?php if ($course['status'] == 0): ?>
                                                            <span class="badge bg-success">Active</span>
                                                        <?php else: ?>
                                                            <span class="badge bg-danger">Inactive</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $student_count = 0;
                                                        foreach ($statistics['students_per_course'] as $stat) {
                                                            if ($stat['course'] == $course['course']) {
                                                                $student_count = $stat['student_count'];
                                                                break;
                                                            }
                                                        }
                                                        echo $student_count;
                                                        ?>
                                                    </td>
                                                    <td>
                                                     
                                                            <a href="<?= base_url('admin/course/view/' . $course['id']) ?>" 
                                                               class="btn btn-info btn-sm" title="View">
                                                                <i class='bx bx-show'></i> View
                                                            </a>
                                                            <a href="<?= base_url('admin/course/edit/' . $course['id']) ?>" 
                                                               class="btn btn-warning btn-sm" title="Edit">
                                                                <i class='bx bx-edit'></i> Edit
                                                            </a>
                                                            <button type="button" class="btn btn-danger btn-sm" title="Delete"
                                                                    data-bs-toggle="modal" data-bs-target="#deleteModal" 
                                                                    data-course-id="<?= $course['id'] ?>" 
                                                                    data-course-name="<?= htmlspecialchars($course['course']) ?>">
                                                                <i class='bx bx-trash'></i> Delete
                                                            </button>
                                                     
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="6" class="text-center">No courses found.</td>
                                            </tr>
                                        <?php endif; ?>
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

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the course <strong id="courseName"></strong>?</p>
                <div class="alert alert-warning">
                    <i class='bx bx-error'></i>
                    <strong>Warning:</strong> This action cannot be undone. If this course has associated students, the deletion will be prevented.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="#" id="confirmDeleteBtn" class="btn btn-danger">
                    <i class='bx bx-trash'></i> Delete Course
                </a>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Handle delete modal
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var courseId = button.data('course-id');
        var courseName = button.data('course-name');
        
        var modal = $(this);
        modal.find('#courseName').text(courseName);
        modal.find('#confirmDeleteBtn').attr('href', '<?= base_url('admin/course/delete/') ?>' + courseId);
    });
});
</script>

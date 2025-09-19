<div id="main">
    <div class="main-container">
        <section>
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="rounded-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/courses') ?>">Courses</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($course['course']) ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="d-flex justify-content-end my-2">
            <a href="<?= base_url('admin/courses') ?>" class="btn btn-primary">
                                            <i class='bx bx-arrow-back'></i> Cancel
                                        </a>
                                        </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Course Details</h5>
                            
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <strong>Course ID:</strong>
                                </div>
                                <div class="col-sm-8">
                                    <?= $course['id'] ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <strong>Course Name:</strong>
                                </div>
                                <div class="col-sm-8">
                                    <?= htmlspecialchars($course['course']) ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <strong>Description:</strong>
                                </div>
                                <div class="col-sm-8">
                                    <?= htmlspecialchars($course['description']) ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <strong>Status:</strong>
                                </div>
                                <div class="col-sm-8">
                                    <?php if ($course['status'] == 0): ?>
                                        <span class="badge bg-success">Active</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Inactive</span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <strong>Total Students:</strong>
                                </div>
                                <div class="col-sm-8">
                                    <span class="badge bg-primary"><?= count($students) ?> Students</span>
                                </div>
                            </div>

                            <hr>

                            <div class="d-flex gap-2">
                                <a href="<?= base_url('admin/course/edit/' . $course['id']) ?>" class="btn btn-warning btn-sm">
                                    <i class='bx bx-edit'></i> Edit Course
                                </a>
                                <a href="<?= base_url('admin/courses') ?>" class="btn btn-secondary btn-sm">
                                    <i class='bx bx-arrow-back'></i> Back to List
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title mb-0">Students in <?= htmlspecialchars($course['course']) ?></h5>
                                <span class="badge bg-primary"><?= count($students) ?> Students</span>
                            </div>

                            <?php if (!empty($students)): ?>
                                <div class="table-responsive">
                                    <table class="table table-striped" id="studentsTable">
                                        <thead>
                                            <tr>
                                                <th>Student ID</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($students as $student): ?>
                                                <tr>
                                                    <td><?= $student['id'] ?></td>
                                                    <td>
                                                        <strong><?= htmlspecialchars($student['first_name'] . ' ' . $student['last_name']) ?></strong>
                                                    </td>
                                                    <td><?= htmlspecialchars($student['phone'] ?? 'N/A') ?></td>
                                                    <td>
                                                        <?php if ($student['status'] == 1): ?>
                                                            <span class="badge bg-success">Active</span>
                                                        <?php else: ?>
                                                            <span class="badge bg-danger">Inactive</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url('admin/student/view/' . $student['id']) ?>" 
                                                           class="btn btn-info btn-sm" title="View Student">
                                                            <i class='bx bx-show'></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php else: ?>
                                <div class="text-center py-4">
                                    <i class='bx bx-user-x display-1 text-muted'></i>
                                    <h5 class="text-muted mt-3">No Students Found</h5>
                                    <p class="text-muted">There are no students enrolled in this course yet.</p>
                                    <a href="<?= base_url('admin/student/create') ?>" class="btn btn-primary">
                                        <i class='bx bx-plus'></i> Add Student
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#studentsTable').DataTable({
        "pageLength": 10,
        "order": [[1, "asc"]],
        "columnDefs": [
            { "orderable": false, "targets": 5 }
        ]
    });
});
</script>

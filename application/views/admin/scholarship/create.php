<div id="main">
    <div class="main-container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Scholarship Application</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="d-flex justify-content-end my-2">
            <a href="<?= base_url('admin/scholarships') ?>" class="btn btn-success">Back</a>
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
            <h3 class="card-title mx-4 mt-4">
                Scholarship Application Form
            </h3>

            <div class="card-body">
            <form action="<?= base_url('admin/scholarship/store') ?>" method="POST">
    <div class="row g-3">

        <!-- Applicant Type -->
        <div class="col-12">
            <h5 class="text-primary mb-3">Scholarship Application</h5>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="application_type" value="New" <?= set_radio('application_type', 'New') ?>>
                <label class="form-check-label">New Applicant</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="application_type" value="Renewal" <?= set_radio('application_type', 'Renewal') ?>>
                <label class="form-check-label">Renewal</label>
            </div>
            <?= form_error('application_type', '<div class="error text-danger">', '</div>') ?>
        </div>

        <!-- Scholarship (ID from scholars table) -->
        <div class="col-md-6">
            <label class="form-label">Scholarship ID</label>
            <input type="number" class="form-control" name="scholarship_id" value="<?= set_value('scholarship_id') ?>" placeholder="Enter scholarship ID">
            <?= form_error('scholarship_id', '<div class="error text-danger">', '</div>') ?>
        </div>

        <!-- Semester -->
        <div class="col-md-6">
            <label class="form-label">Semester</label>
            <select name="semester" class="form-select">
                <option value="">Select Semester</option>
                <option value="1" <?= set_select('semester', '1') ?>>1st Semester</option>
                <option value="2" <?= set_select('semester', '2') ?>>2nd Semester</option>
            </select>
            <?= form_error('semester', '<div class="error text-danger">', '</div>') ?>
        </div>

        <!-- Personal Information -->
        <div class="col-12 mt-4">
            <h5 class="text-primary mb-3">I. Personal Information</h5>
        </div>

 
                        <div class="col-md-6">
                            <label for="selected_student_id" class="form-label">Name of Receipeint</label>
                            <select name="student_id" class="form-select" id="studentSelect">
                                <option value="">Select Student</option>
                                <?php if (!empty($students)): ?>
                                    <?php foreach ($students as $student): ?>
                                        <?php
                                        $course_names = [1 => 'BSIT', 2 => 'BSBA', 3 => 'BSED'];
                                        $course_name = isset($course_names[$student->course]) ? $course_names[$student->course] : 'Unknown';
                                        $display_name = $student->last_name . ', ' . $student->first_name;
                                        if (!empty($student->middle_name)) {
                                            $display_name .= ' ' . $student->middle_name;
                                        }
                                        $display_name .= ' (' . $student->student_id . ') - ' . $course_name . ' ' . $student->year_level;
                                        ?>
                                        <option value="<?= $student->id ?>" <?= set_select('selected_student_id', $student->id) ?>>
                                            <?= $display_name ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <?= form_error('student_id', '<div class="error text-danger">', '</div>') ?>
                        </div>

        <div class="col-md-6">
            <!-- Student Number -->
        <label class="form-label">Student Id.</label> 
            <input type="text" class="form-control" name="student_no" id="student_no" value="<?= set_value('student_no') ?>" readonly>
        </div>

        <div class="col-md-6">
            <label class="form-label">Contact Number</label>
            <input type="text" class="form-control" name="contact_no" id="contact_no" value="<?= set_value('contact_no') ?>" placeholder="09XXXXXXXXX">
            <?= form_error('contact_no', '<div class="error text-danger">', '</div>') ?>
        </div>

        <div class="col-md-6">
            <label class="form-label">Address</label>
            <input type="text" class="form-control" name="address" id="address" value="<?= set_value('address') ?>" placeholder="House No., Street, Barangay, City">
            <?= form_error('address', '<div class="error text-danger">', '</div>') ?>
        </div>


        <div class="col-md-6">
            <label class="form-label">Email Address</label>
            <input type="email" class="form-control" name="email" value="<?= set_value('email') ?>">
            <?= form_error('email', '<div class="error text-danger">', '</div>') ?>
        </div>

        <div class="col-md-6">
            <label class="form-label">Date of Birth</label>
            <input type="date" class="form-control" name="birth_date" value="<?= set_value('birth_date') ?>">
            <?= form_error('birth_date', '<div class="error text-danger">', '</div>') ?>
        </div>



        <div class="col-md-3">
            <label class="form-label">Gender</label>
            <select name="gender" class="form-select">
                <option value="">Select</option>
                <option value="Male" <?= set_select('gender', 'Male') ?>>Male</option>
                <option value="Female" <?= set_select('gender', 'Female') ?>>Female</option>
            </select>
            <?= form_error('gender', '<div class="error text-danger">', '</div>') ?>
        </div>

          <div class="col-md-6">
            <label class="form-label">Facebook Account</label>
            <input type="text" class="form-control" name="facebook" value="<?= set_value('facebook') ?>">
        </div>

      <div class="col-md-6">
            <label class="form-label">Birthplace</label>
            <input type="text" class="form-control" name="birth_place" value="<?= set_value('birth_place') ?>">
        </div>


        <div class="col-md-6">
            <label class="form-label">Religion</label>
            <input type="text" class="form-control" name="religion" value="<?= set_value('religion') ?>">
            <?= form_error('religion', '<div class="error text-danger">', '</div>') ?>
        </div>

        <!-- Education Background -->
        <div class="col-12 mt-4">
            <h5 class="text-primary mb-3">Education Background</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Level</th>
                        <th>Name of School</th>
                        <th>Year Graduated</th>
                        <th>Honors Received</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $levels = ['Pre-School','Elementary','Junior High School','Senior High School','College'];
                    foreach ($levels as $level): ?>
                        <tr>
                            <td><?= $level ?></td>
                            <td><input type="text" name="school_name[<?= $level ?>]" class="form-control"></td>
                            <td><input type="text" name="year_graduated[<?= $level ?>]" class="form-control"></td>
                            <td><input type="text" name="honors[<?= $level ?>]" class="form-control"></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Family Background -->
        <div class="col-12 mt-4">
            <h5 class="text-primary mb-3">II. Family Background</h5>
        </div>

        <div class="col-md-6">
            <label class="form-label">Father's Name</label>
            <input type="text" class="form-control" name="father_name" value="<?= set_value('father_name') ?>">
            <?= form_error('father_name', '<div class="error text-danger">', '</div>') ?>
        </div>

        <div class="col-md-6">
            <label class="form-label">Father Address</label>
            <input type="text" class="form-control" name="father_address" value="<?= set_value('father_address') ?>">
            <?= form_error('father_address', '<div class="error text-danger">', '</div>') ?>
        </div>

        
        <div class="col-md-6">
            <label class="form-label">Contact Details</label>
            <input type="text" class="form-control" name="father_contact" value="<?= set_value('father_contact') ?>">
            <?= form_error('father_contact', '<div class="error text-danger">', '</div>') ?>
        </div>
        
             <div class="col-md-6">
            <label class="form-label">Occupation</label>
            <input type="text" class="form-control" name="father_occupation" value="<?= set_value('father_occupation') ?>">
            <?= form_error('father_occupation', '<div class="error text-danger">', '</div>') ?>
        </div>

           
             <div class="col-md-6">
            <label class="form-label">Highest Educational Attainment</label>
            <input type="text" class="form-control" name="father_education" value="<?= set_value('father_education') ?>">
            <?= form_error('father_education', '<div class="error text-danger">', '</div>') ?>
        </div>

         <div class="col-md-6">
            <label class="form-label">Father Employment</label>
            <input type="text" class="form-control" name="father_employment" value="<?= set_value('father_employment') ?>">
            <?= form_error('father_employment', '<div class="error text-danger">', '</div>') ?>
        </div>



          <div class="col-md-6">
            <label class="form-label">Mother's Name</label>
            <input type="text" class="form-control" name="mother_name" value="<?= set_value('mother_name') ?>">
            <?= form_error('mother_name', '<div class="error text-danger">', '</div>') ?>
        </div>

        <div class="col-md-6">
            <label class="form-label">Mother's Address</label>
            <input type="text" class="form-control" name="mother_address" value="<?= set_value('mother_address') ?>">
            <?= form_error('mother_address', '<div class="error text-danger">', '</div>') ?>
        </div>

        
        <div class="col-md-6">
            <label class="form-label">Contact Details</label>
            <input type="text" class="form-control" name="mother_contact" value="<?= set_value('mother_contact') ?>">
            <?= form_error('mother_contact', '<div class="error text-danger">', '</div>') ?>
        </div>
        
             <div class="col-md-6">
            <label class="form-label">Occupation</label>
            <input type="text" class="form-control" name="mother_occupation" value="<?= set_value('mother_occupation') ?>">
            <?= form_error('mother_occupation', '<div class="error text-danger">', '</div>') ?>
        </div>

           
             <div class="col-md-6">
            <label class="form-label">Highest Educational Attainment</label>
            <input type="text" class="form-control" name="mother_education" value="<?= set_value('mother_education') ?>">
            <?= form_error('mother_education', '<div class="error text-danger">', '</div>') ?>
        </div>

         <div class="col-md-6">
            <label class="form-label">Mother Employment</label>
            <input type="text" class="form-control" name="mother_employment" value="<?= set_value('mother_employment') ?>">
            <?= form_error('mother_employment', '<div class="error text-danger">', '</div>') ?>
        </div>







        
        <!-- Siblings -->
        <div class="col-12 mt-4">
            <h5 class="text-primary mb-3">Siblings</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Course/Year Level</th>
                        <th>School Enrolled</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i=1; $i<=5; $i++): ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><input type="text" name="sibling_name[<?= $i ?>]" class="form-control"></td>
                            <td><input type="number" name="sibling_age[<?= $i ?>]" class="form-control"></td>
                            <td><input type="text" name="sibling_course[<?= $i ?>]" class="form-control"></td>
                            <td><input type="text" name="sibling_school[<?= $i ?>]" class="form-control"></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>

        <!-- Reason for Scholarship (code/reference) -->
        <div class="col-12 mt-4">
            <h5 class="text-primary mb-3">Reason for Scholarship</h5>
            <input type="number" class="form-control" name="scholar_reason" value="<?= set_value('scholar_reason') ?>" placeholder="Enter reason code/reference">
            <?= form_error('scholar_reason', '<div class="error text-danger">', '</div>') ?>
        </div>

    </div>

    <button type="submit" class="btn btn-primary mt-4">Submit Application</button>
</form>

            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#studentSelect').on('change', function() {
        var selectedStudentId = $(this).val();
        
        if (selectedStudentId) {
            // Make AJAX request to get student details
            $.ajax({
                url: '<?= base_url("admin/scholarship/get_student_details") ?>',
                type: 'POST',
                data: {
                    student_id: selectedStudentId
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Populate the student ID field
                        $('#student_no').val(response.student.student_id);
                        
                        // Optionally populate other fields if they exist
                        if ($('input[name="contact_no"]').length) {
                            $('input[name="contact_no"]').val(response.student.contact_number || '');
                        }
                        if ($('input[name="email"]').length) {
                            $('input[name="email"]').val(response.student.email || '');
                        }
                        if ($('input[name="address"]').length) {
                            $('input[name="address"]').val(response.student.address || '');
                        }
                        if ($('input[name="birth_date"]').length) {
                            $('input[name="birth_date"]').val(response.student.date_of_birth || '');
                        }
                        if ($('select[name="gender"]').length) {
                            $('select[name="gender"]').val(response.student.gender || '');
                        }
                        if ($('input[name="father_name"]').length) {
                            $('input[name="father_name"]').val(response.student.father_name || '');
                        }
                        if ($('input[name="father_occupation"]').length) {
                            $('input[name="father_occupation"]').val(response.student.father_occupation || '');
                        }
                        if ($('input[name="mother_name"]').length) {
                            $('input[name="mother_name"]').val(response.student.mother_name || '');
                        }
                        if ($('input[name="mother_occupation"]').length) {
                            $('input[name="mother_occupation"]').val(response.student.mother_occupation || '');
                        }
                        if ($('input[name="religion"]').length) {
                            $('input[name="religion"]').val(response.student.religion || '');
                        }
                    } else {
                        console.error('Error fetching student details:', response.message);
                        $('#student_no').val('');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                    $('#student_no').val('');
                }
            });
        } else {
            // Clear the student ID field if no student is selected
            $('#student_no').val('');
        }
    });
});
</script>
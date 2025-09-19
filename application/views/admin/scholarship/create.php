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


        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    Scholarship Application Form
                </h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/scholarship/store') ?>" method="POST">
                    <div class="row g-3">

                        <!-- Applicant Type -->
                        <div class="col-12">
                            <h5 class="text-primary mb-3">Scholarship Application</h5>
                            <div class="form-check form-check-inline">
                                <input required class="form-check-input" type="radio" name="application_type" value="New" <?= set_radio('application_type', 'New') ?>>
                                <label class="form-check-label">New Applicant</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input required class="form-check-input" type="radio" name="application_type" value="Renewal" <?= set_radio('application_type', 'Renewal') ?>>
                                <label class="form-check-label">Renewal</label>
                            </div>
                            <?= form_error('application_type', '<div class="error text-danger">', '</div>') ?>
                            <span class="error text-danger" id="application_type_error"></span>
                        </div>

                        <!-- Scholarship (ID from scholars table) -->
                        <div class="col-md-6">
                            <label class="form-label">Scholarship ID</label>
                            <select required class="form-select" name="scholarship_id" id="scholarship_id">
                                <option value="">Select Scholarship Program</option>
                                <?php if (!empty($scholarship_programs)): ?>
                                    <?php foreach ($scholarship_programs as $program): ?>
                                        <option value="<?= $program->id ?>" <?= set_select('scholarship_id', $program->id) ?>>
                                            <?= htmlspecialchars($program->scholarship_name) ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <span class="error text-danger" id="scholarship_id_error"></span>
                        </div>

                        <!-- Semester -->
                        <div class="col-md-6">
                            <label class="form-label">Semester</label>
                            <select required name="semester" class="form-select">
                                <option value="">Select Semester</option>
                                <option value="1" <?= set_select('semester', '1') ?>>1st Semester</option>
                                <option value="2" <?= set_select('semester', '2') ?>>2nd Semester</option>
                            </select>
                            <?= form_error('semester', '<div class="error text-danger">', '</div>') ?>
                            <span class="error text-danger" id="semester_error"></span>
                        </div>

                        <!-- Personal Information -->
                        <div class="col-12 mt-4">
                            <h5 class="text-primary mb-3">I. Personal Information</h5>
                        </div>


                        <div class="col-md-6">
                            <label for="selected_student_id" class="form-label">Name of Receipeint</label>
                            <select required name="student_id" class="form-select" id="studentSelect">
                                <option value="">Select Student</option>
                                <?php if (!empty($students)): ?>
                                    <?php foreach ($students as $student): ?>
                                        <?php
                                        $display_name = $student->last_name . ', ' . $student->first_name;
                                        if (!empty($student->middle_name)) {
                                            $display_name .= ' ' . $student->middle_name;
                                        }
                                        $display_name .= ' (' . $student->student_id . ') - ' . ($student->course_name ?? 'No Course') . ' ' . $student->year_level;
                                        ?>
                                        <option value="<?= $student->id ?>" <?= set_select('student_id', $student->id) ?>>
                                            <?= $display_name ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <?= form_error('student_id', '<div class="error text-danger">', '</div>') ?>
                            <span class="error text-danger" id="student_id_error"></span>
                        </div>

                        <div class="col-md-6">
                            <!-- Student Number -->
                            <label class="form-label">Student Id.</label>
                            <input required type="text" class="form-control" name="student_no" id="student_no" value="<?= set_value('student_no') ?>" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Contact Number</label>
                            <input required type="text" class="form-control" name="contact_no" id="contact_no" value="<?= set_value('contact_no') ?>" placeholder="09XXXXXXXXX">
                            <?= form_error('contact_no', '<div class="error text-danger">', '</div>') ?>
                            <span class="error text-danger" id="contact_no_error"></span>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Address</label>
                            <input required type="text" class="form-control" name="address" id="address" value="<?= set_value('address') ?>" placeholder="House No., Street, Barangay, City">
                            <?= form_error('address', '<div class="error text-danger">', '</div>') ?>
                            <span class="error text-danger" id="address_error"></span>
                        </div>


                        <div class="col-md-6">
                            <label class="form-label">Email Address</label>
                            <input required type="email" class="form-control" name="email" id="email" value="<?= set_value('email') ?>">
                            <?= form_error('email', '<div class="error text-danger">', '</div>') ?>
                            <span class="error text-danger" id="email_error"></span>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Date of Birth</label>
                            <input required type="date" class="form-control" name="birth_date" id="birth_date" value="<?= set_value('birth_date') ?>">
                            <?= form_error('birth_date', '<div class="error text-danger">', '</div>') ?>
                            <span class="error text-danger" id="birth_date_error"></span>
                        </div>



                        <div class="col-md-3">
                            <label class="form-label">Gender</label>
                            <select required name="gender" class="form-select" id="gender">
                                <option value="">Select</option>
                                <option value="Male" <?= set_select('gender', 'Male') ?>>Male</option>
                                <option value="Female" <?= set_select('gender', 'Female') ?>>Female</option>
                            </select>
                            <?= form_error('gender', '<div class="error text-danger">', '</div>') ?>
                            <span class="error text-danger" id="gender_error"></span>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Facebook Account</label>
                            <input required type="text" class="form-control" name="facebook" id="facebook" value="<?= set_value('facebook') ?>">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Birthplace</label>
                            <input required type="text" class="form-control" name="birth_place" id="birth_place" value="<?= set_value('birth_place') ?>">
                        </div>


                        <div class="col-md-6">
                            <label class="form-label">Religion</label>
                            <input required type="text" class="form-control" name="religion" id="religion" value="<?= set_value('religion') ?>">
                            <?= form_error('religion', '<div class="error text-danger">', '</div>') ?>
                            <span class="error text-danger" id="religion_error"></span>
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
                                    $levels = ['Pre-School', 'Elementary', 'Junior High School', 'Senior High School', 'College'];
                                    foreach ($levels as $level): ?>
                                        <tr>
                                            <td><?= $level ?></td>
                                            <td><input type="text" name="school_name[<?= $level ?>]" class="form-control" value="<?= set_value('school_name[' . $level . ']') ?>"></td>
                                            <td><input type="text" name="year_graduated[<?= $level ?>]" class="form-control" value="<?= set_value('year_graduated[' . $level . ']') ?>"></td>
                                            <td><input type="text" name="honors[<?= $level ?>]" class="form-control" value="<?= set_value('honors[' . $level . ']') ?>"></td>
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
                            <input required type="text" class="form-control" name="father_name" id="father_name" value="<?= set_value('father_name') ?>">
                            <?= form_error('father_name', '<div class="error text-danger">', '</div>') ?>
                            <span class="error text-danger" id="father_name_error"></span>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Father Address</label>
                            <input required type="text" class="form-control" name="father_address" id="father_address" value="<?= set_value('father_address') ?>">
                            <?= form_error('father_address', '<div class="error text-danger">', '</div>') ?>
                            <span class="error text-danger" id="father_address_error"></span>
                        </div>


                        <div class="col-md-6">
                            <label class="form-label">Contact Details</label>
                            <input required type="text" class="form-control" name="father_contact" id="father_contact" value="<?= set_value('father_contact') ?>">
                            <?= form_error('father_contact', '<div class="error text-danger">', '</div>') ?>
                            <span class="error text-danger" id="father_contact_error"></span>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Occupation</label>
                            <input required type="text" class="form-control" name="father_occupation" id="father_occupation" value="<?= set_value('father_occupation') ?>">
                            <?= form_error('father_occupation', '<div class="error text-danger">', '</div>') ?>
                            <span class="error text-danger" id="father_occupation_error"></span>
                        </div>


                        <div class="col-md-6">
                            <label class="form-label">Highest Educational Attainment</label>
                            <input required type="text" class="form-control" name="father_education" id="father_education" value="<?= set_value('father_education') ?>">
                            <?= form_error('father_education', '<div class="error text-danger">', '</div>') ?>
                            <span class="error text-danger" id="father_education_error"></span>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Father Employment</label>
                            <input required type="text" class="form-control" name="father_employment" id="father_employment" value="<?= set_value('father_employment') ?>">
                            <?= form_error('father_employment', '<div class="error text-danger">', '</div>') ?>
                        </div>



                        <div class="col-md-6">
                            <label class="form-label">Mother's Name</label>
                            <input required type="text" class="form-control" name="mother_name" id="mother_name" value="<?= set_value('mother_name') ?>">
                            <?= form_error('mother_name', '<div class="error text-danger">', '</div>') ?>
                            <span class="error text-danger" id="mother_name_error"></span>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Mother's Address</label>
                            <input required type="text" class="form-control" name="mother_address" id="mother_address" value="<?= set_value('mother_address') ?>">
                            <?= form_error('mother_address', '<div class="error text-danger">', '</div>') ?>
                            <span class="error text-danger" id="mother_address_error"></span>
                        </div>


                        <div class="col-md-6">
                            <label class="form-label">Contact Details</label>
                            <input required type="text" class="form-control" name="mother_contact" id="mother_contact" value="<?= set_value('mother_contact') ?>">
                            <?= form_error('mother_contact', '<div class="error text-danger">', '</div>') ?>
                            <span class="error text-danger" id="mother_contact_error"></span>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Occupation</label>
                            <input required type="text" class="form-control" name="mother_occupation" value="<?= set_value('mother_occupation') ?>">
                            <?= form_error('mother_occupation', '<div class="error text-danger">', '</div>') ?>
                        </div>


                        <div class="col-md-6">
                            <label class="form-label">Highest Educational Attainment</label>
                            <input required type="text" class="form-control" name="mother_education" value="<?= set_value('mother_education') ?>">
                            <?= form_error('mother_education', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Mother Employment</label>
                            <input required type="text" class="form-control" name="mother_employment" id="mother_employment" value="<?= set_value('mother_employment') ?>">
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
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><input type="text" name="sibling_name[<?= $i ?>]" class="form-control" value="<?= set_value('sibling_name[' . $i . ']') ?>"></td>
                                            <td><input type="number" name="sibling_age[<?= $i ?>]" class="form-control" value="<?= set_value('sibling_age[' . $i . ']') ?>"></td>
                                            <td><input type="text" name="sibling_course[<?= $i ?>]" class="form-control" value="<?= set_value('sibling_course[' . $i . ']') ?>"></td>
                                            <td><input type="text" name="sibling_school[<?= $i ?>]" class="form-control" value="<?= set_value('sibling_school[' . $i . ']') ?>"></td>
                                        </tr>
                                    <?php endfor; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Reason for Scholarship (code/reference) -->
                        <div class="col-12 mt-4">
                            <h5 class="text-primary mb-3">Reason for Scholarship</h5>
                            <input required type="number" class="form-control" name="scholar_reason" value="<?= set_value('scholar_reason') ?>" placeholder="Enter reason code/reference">
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
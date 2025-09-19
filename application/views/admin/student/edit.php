<div id="main">
  <div class="main-container">

    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="rounded-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Student</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="d-flex justify-content-end my-2">
      <a href="<?= base_url('admin/students') ?>" class="btn btn-success">Back</a>
    </div>

    <?php if ($this->session->flashdata('error')): ?>
      <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('success')): ?>
      <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>

    <div class="card">
      <h3 class="card-title mx-4 mt-4">
        Edit Student
      </h3>
      <div class="card-body">
        <form action="<?= base_url('admin/student/update/' . $student->id) ?>" method="POST">
          <div class="row g-3">

            <!-- First Name -->
            <div class="col-md-4">
              <label for="first_name" class="form-label">First Name</label>
              <input type="text" class="form-control" name="first_name" value="<?= set_value('first_name', $student->first_name) ?>">
              <?= form_error('first_name', '<div class="error text-danger">', '</div>') ?>
            </div>

            <!-- Middle Name -->
            <div class="col-md-4">
              <label for="middle_name" class="form-label">Middle Name</label>
              <input type="text" class="form-control" name="middle_name" value="<?= set_value('middle_name', $student->middle_name) ?>">
              <?= form_error('middle_name', '<div class="error text-danger">', '</div>') ?>
            </div>

            <!-- Last Name -->
            <div class="col-md-4">
              <label for="last_name" class="form-label">Last Name</label>
              <input type="text" class="form-control" name="last_name" value="<?= set_value('last_name', $student->last_name) ?>">
              <?= form_error('last_name', '<div class="error text-danger">', '</div>') ?>
            </div>

            <!-- Student Number -->
            <div class="col-md-4">
              <label for="student_id" class="form-label">Student ID</label>
              <input type="text" class="form-control" name="student_id" value="<?= set_value('student_id', $student->student_id) ?>">
              <?= form_error('student_id', '<div class="error text-danger">', '</div>') ?>
            </div>

            <!-- Contact -->
            <div class="col-md-4">
              <label for="contact" class="form-label">Contact</label>
              <input type="text" class="form-control" name="contact" value="<?= set_value('contact', $student->contact ?? '') ?>" placeholder="09XXXXXXXXX">
              <?= form_error('contact', '<div class="error text-danger">', '</div>') ?>
            </div>

            <!-- Date of Birth -->
            <div class="col-md-4">
              <label for="date_of_birth" class="form-label">Date of Birth</label>
              <input type="date" class="form-control" name="date_of_birth" value="<?= set_value('date_of_birth', $student->date_of_birth) ?>">
              <?= form_error('date_of_birth', '<div class="error text-danger">', '</div>') ?>
            </div>

            <!-- Gender -->
            <div class="col-md-4">
              <label for="gender" class="form-label">Gender</label>
              <select name="gender" class="form-select">
                <option value="">Select Gender</option>
                <option value="Male" <?= set_select('gender', 'Male', ($student->gender == 'Male')) ?>>Male</option>
                <option value="Female" <?= set_select('gender', 'Female', ($student->gender == 'Female')) ?>>Female</option>
              </select>
              <?= form_error('gender', '<div class="error text-danger">', '</div>') ?>
            </div>

            <!-- Course -->
            <div class="col-md-4">
              <label for="course_id" class="form-label">Course</label>
              <select name="course_id" class="form-select">
                <option value="">Select Course</option>
                <?php 
                $courses = $this->CourseModel->get_courses_for_dropdown();
                foreach ($courses as $course): 
                ?>
                <option value="<?= $course['id'] ?>" <?= set_select('course_id', $course['id'], ($student->course_id == $course['id'])) ?>>
                    <?= $course['course'] ?>
                </option>
                <?php endforeach; ?>
              </select>
              <?= form_error('course_id', '<div class="error text-danger">', '</div>') ?>
            </div>

            <!-- Year Level -->
            <div class="col-md-4">
              <label for="year_level" class="form-label">Year Level</label>
              <select name="year_level" class="form-select">
                <option value="">Select Year</option>
                <option value="1st Year" <?= set_select('year_level', '1st Year', ($student->year_level == '1st Year')) ?>>1st Year</option>
                <option value="2nd Year" <?= set_select('year_level', '2nd Year', ($student->year_level == '2nd Year')) ?>>2nd Year</option>
                <option value="3rd Year" <?= set_select('year_level', '3rd Year', ($student->year_level == '3rd Year')) ?>>3rd Year</option>
                <option value="4th Year" <?= set_select('year_level', '4th Year', ($student->year_level == '4th Year')) ?>>4th Year</option>
              </select>
              <?= form_error('year_level', '<div class="error text-danger">', '</div>') ?>
            </div>

            <!-- Section -->
            <div class="col-md-4">
              <label for="section" class="form-label">Section</label>
              <input type="text" class="form-control" name="section" value="<?= set_value('section', $student->section) ?>">
              <?= form_error('section', '<div class="error text-danger">', '</div>') ?>
            </div>

            <!-- School Year -->
            <div class="col-md-4">
              <label for="school_year" class="form-label">School Year</label>
              <input type="text" class="form-control" name="school_year" value="<?= set_value('school_year', $student->school_year) ?>"
                placeholder="e.g. 2024-2025">
              <?= form_error('school_year', '<div class="error text-danger">', '</div>') ?>
            </div>

            <!-- Scholarship -->
            <div class="col-md-4">
              <label for="scholarship_type" class="form-label">Scholarship Type</label>
              <select name="scholarship_type" class="form-select">
                <option value="">None</option>
                <option value="1" <?= set_select('scholarship_type', '1', ($student->scholarship_type == 1)) ?>>Academic</option>
                <option value="2" <?= set_select('scholarship_type', '2', ($student->scholarship_type == 2)) ?>>Athletic</option>
                <option value="3" <?= set_select('scholarship_type', '3', ($student->scholarship_type == 3)) ?>>Financial Aid</option>
              </select>
              <?= form_error('scholarship_type', '<div class="error text-danger">', '</div>') ?>
            </div>

            <!-- Office -->
            <div class="col-md-4">
              <label for="office" class="form-label">Office Belong</label>
              <select name="office" class="form-select">
                <option value="">Select Office</option>
                <option value="1" <?= set_select('office', '1', ($student->office == 1)) ?>>Registrar</option>
                <option value="2" <?= set_select('office', '2', ($student->office == 2)) ?>>Guidance</option>
                <option value="3" <?= set_select('office', '3', ($student->office == 3)) ?>>Library</option>
              </select>
              <?= form_error('office', '<div class="error text-danger">', '</div>') ?>
            </div>

            <!-- Guardian Name -->
            <div class="col-md-4">
              <label for="guardian_name" class="form-label">Guardian Name</label>
              <input type="text" class="form-control" name="guardian_name" value="<?= set_value('guardian_name', $student->guardian_name) ?>">
              <?= form_error('guardian_name', '<div class="error text-danger">', '</div>') ?>
            </div>

            <!-- Guardian Contact -->
            <div class="col-md-4">
              <label for="guardian_contact" class="form-label">Guardian Contact</label>
              <input type="text" class="form-control" name="guardian_contact"
                value="<?= set_value('guardian_contact', $student->guardian_contact) ?>" placeholder="09XXXXXXXXX">
              <?= form_error('guardian_contact', '<div class="error text-danger">', '</div>') ?>
            </div>

            <!-- Date of Admission -->
            <div class="col-md-4">
              <label for="admission_date" class="form-label">Date of Admission</label>
              <input type="date" class="form-control" name="admission_date" value="<?= set_value('admission_date', $student->admission_date) ?>">
              <?= form_error('admission_date', '<div class="error text-danger">', '</div>') ?>
            </div>

          </div>
          <button type="submit" class="btn btn-primary mt-3">Update Student</button>
        </form>

      </div>
    </div>

  </div>
</div>

<div id="main">
    <div class="main-container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/clinic-patients') ?>">Clinic Patients</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Record</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="d-flex justify-content-end my-1">
            <a href="<?= base_url('clinic/clinic-patients') ?>" class="btn btn-success">Back</a>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Clinic Patient Record</h5>
                <form action="<?= base_url('clinic/clinic-patients/update/'.$patient['id']) ?>" method="POST">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Student</label>
                            <select name="student_id" class="form-select" required>
                                <option value="">Select Student</option>
                                <?php foreach ($students as $s): ?>
                                    <option value="<?= $s['id'] ?>" <?= set_select('student_id', $s['id'], ($patient['student_id']==$s['id'])) ?>>
                                        <?= htmlspecialchars($s['last_name'].', '.$s['first_name'].' ('.$s['student_id'].')') ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('student_id', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Age</label>
                            <input type="number" name="age" class="form-control" value="<?= set_value('age', $patient['age']) ?>" required>
                            <?= form_error('age', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Sex</label>
                            <select name="sex" class="form-select" required>
                                <option value="">Select Sex</option>
                                <option value="Male" <?= set_select('sex', 'Male', ($patient['sex']=='Male')) ?>>Male</option>
                                <option value="Female" <?= set_select('sex', 'Female', ($patient['sex']=='Female')) ?>>Female</option>
                            </select>
                            <?= form_error('sex', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Weight (kg)</label>
                            <input type="number" name="weight" class="form-control" value="<?= set_value('weight', $patient['weight']) ?>" required>
                            <?= form_error('weight', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Height (cm)</label>
                            <input type="number" name="height" class="form-control" value="<?= set_value('height', $patient['height']) ?>" required>
                            <?= form_error('height', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Temperature (°C)</label>
                            <input type="number" name="temperature" class="form-control" value="<?= set_value('temperature', $patient['temperature']) ?>" required>
                            <?= form_error('temperature', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Blood Pressure</label>
                            <input type="text" name="blood_pressure" class="form-control" value="<?= set_value('blood_pressure', $patient['blood_pressure']) ?>" required>
                            <?= form_error('blood_pressure', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Pulse</label>
                            <input type="text" name="pulse" class="form-control" value="<?= set_value('pulse', $patient['pulse']) ?>" required>
                            <?= form_error('pulse', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Respiration</label>
                            <input type="text" name="respiration" class="form-control" value="<?= set_value('respiration', $patient['respiration']) ?>" required>
                            <?= form_error('respiration', '<div class="error text-danger">', '</div>') ?>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>



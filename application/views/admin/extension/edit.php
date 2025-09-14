<div id="main">
    <div class="main-container">
        <div class="d-flex justify-content-end my-2">
            <a href="<?= base_url('research') ?>" class="btn btn-success">Back</a>
        </div>

        <?php if ($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
        <?php endif; ?>



        <div class="card">
            <h3 class="card-title mx-4 mt-4">
                Update Research
            </h3>

            <div class="card-body">
            <form action="<?= base_url('research/update/' . $research['id']) ?>" method="post" enctype="multipart/form-data">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="first_name" value="<?= isset($research['first_name']) ? htmlspecialchars($research['first_name']) : set_value('first_name') ?>">
                            <?= form_error('first_name', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <div class="col-md-6">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="last_name" value="<?= isset($research['last_name']) ? htmlspecialchars($research['last_name']) : set_value('last_name') ?>">
                            <?= form_error('last_name', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <div class="col-md-6">
                            <label for="department_id" class="form-label">Research Department</label>
                            <select name="department_id" class="form-select" aria-label="Default select example">
                                <option value="" <?= isset($research['department_id']) && $research['department_id'] == '' ? 'selected' : '' ?>>Open this select menu</option>
                                <option value="1" <?= isset($research['department_id']) && $research['department_id'] == '1' ? 'selected' : '' ?>>Research</option>
                                <option value="2" <?= isset($research['department_id']) && $research['department_id'] == '2' ? 'selected' : '' ?>>Extension</option>
                            </select>
                            <?= form_error('department_id', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <div class="col-md-6">
                            <label for="research_title" class="form-label">Research Title</label>
                            <input type="text" class="form-control" name="research_title" value="<?= isset($research['research_title']) ? htmlspecialchars($research['research_title']) : set_value('research_title') ?>">
                            <?= form_error('research_title', '<div class="error text-danger">', '</div>') ?>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="document" class="form-label">Document <i class="text-danger text-xs">(doc, pdf)</i></label>
                            <div class="input-group">
                                <input type="file" class="form-control" id="document" name="document" aria-label="Upload">
                                <label class="input-group-text" for="document" id="file-label">Update File</label>
                            </div>
                            <?= form_error('document', '<div class="error text-danger">', '</div>') ?>
                            <?php if (isset($research['document'])) : ?>
                                <a href="<?= base_url('assets/uploads/' . htmlspecialchars($research['document'])) ?>" download>Download Current Document</a>
                            <?php endif; ?>
                        </div>


                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Update</button>
                </form>
            </div>
        </div>






    </div>
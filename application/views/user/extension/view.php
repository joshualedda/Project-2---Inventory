<div id="main">
    <div class="main-container">
        <div class="d-flex justify-content-end my-2">
            <a href="<?= base_url('research') ?>" class="btn btn-success">Back</a>
        </div>


        <div class="card">
            <h3 class="card-title mx-4 mt-4">
                Research Information
            </h3>

            <div class="card-body">
                <form>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="first_name" value="<?= isset($research['first_name']) ? htmlspecialchars($research['first_name']) : set_value('first_name') ?>">
                        </div>

                        <div class="col-md-6">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="last_name" value="<?= isset($research['last_name']) ? htmlspecialchars($research['last_name']) : set_value('last_name') ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="department_id" class="form-label">Research Department</label>
                            <select name="department_id" class="form-select" aria-label="Default select example">
                                <option value="" <?= isset($research['department_id']) && $research['department_id'] == '' ? 'selected' : '' ?>>Open this select menu</option>
                                <option value="1" <?= isset($research['department_id']) && $research['department_id'] == '1' ? 'selected' : '' ?>>Research</option>
                                <option value="2" <?= isset($research['department_id']) && $research['department_id'] == '2' ? 'selected' : '' ?>>Extension</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="research_title" class="form-label">Research Title</label>
                            <input type="text" class="form-control" name="research_title" value="<?= isset($research['research_title']) ? htmlspecialchars($research['research_title']) : set_value('research_title') ?>">
                        </div>

                        <div class="col-md-6">
                            <label for="document" class="form-label">Document <i class="text-danger text-xs">(doc, pdf)</i></label>
                            <br>
                            <?php if (isset($research['document'])) : ?>
                                <a class="btn btn-sm btn-success" href="<?= base_url('assets/uploads/' . htmlspecialchars($research['document'])) ?>" download>Download File</a>
                            <?php endif; ?>
                            <?= form_error('document', '<div class="error text-danger">', '</div>') ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
        </div>






    </div>

    
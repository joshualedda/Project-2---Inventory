<div id="main">
  <div class="main-container">

    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="rounded-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Department</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="d-flex justify-content-end my-2">
      <a href="<?= base_url('department') ?>" class="btn btn-success">Back</a>
    </div>

    <?php if ($this->session->flashdata('error')) : ?>
      <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('success')) : ?>
      <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>

    <div class="card">
      <h3 class="card-title mx-4 mt-4">
        Create New Department
      </h3>
      <div class="card-body">

        <form action="<?= base_url('departments/store') ?>" method="post">
          <div class="row g-3">
            <div class="col-md-6">
              <label for="department_name" class="form-label">Department Name</label>
              <input type="text" class="form-control" name="department_name" value="<?= set_value('department_name') ?>">
              <?= form_error('department_name', '<div class="error text-danger">', '</div>') ?>
            </div>

            <div class="col-md-6">
              <label for="status" class="form-label">Status</label>
              <select name="status" class="form-select" aria-label="Default select example">
                <option selected value="">Select status</option>
                <option value="0">Active</option>
                <option value="1">Inactive</option>
              </select>
              <?= form_error('status', '<div class="error text-danger">', '</div>') ?>
            </div>
          </div>
          <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
      </div>
    </div>

  </div>
</div>

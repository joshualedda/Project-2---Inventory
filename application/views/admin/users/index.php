<div id="main">
  <div class="main-container">

    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="rounded-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
          </ol>
        </nav>
      </div>
    </div>



    <div class="d-flex justify-content-end my-2">
      <a href="<?= base_url('user/create') ?>" class="btn btn-success">Add</a>
    </div>
    <section class="section">
      <div class="row">
        <div class="col-md-12 mb-3">
          <div class="card">




            <div class="card-body">

              <h5 class="card-title">Users</h5>

              <div class="d-flex align-items-center justify-content-end">
                <label for="filter" class="mb-0 me-2">Filter</label>
                <div class="mb-2">
                  <select id="filter" class="custom-select" style="width: 150px;" aria-label="Default select example">
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
              </div>



              <div class="table-responsive">
                <table
                  id="datatable"
                  class="table table-striped data-table"
                  style="width: 100%">
                  <thead>
                    <tr>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Department</th>
                      <th>Status</th>
                      <th>Manage</th>
                    </tr>
                  </thead>
                  <?php foreach ($users as $user) : ?>
                    <tr>
                      <td><?= htmlspecialchars($user['first_name']) ?></td>
                      <td><?= htmlspecialchars($user['last_name']) ?></td>

                      <td> <?= $user['department_id'] == 1 ? 'Research' : ($user['department_id'] == 2 ? 'Extension' : 'Unknown') ?></td>

                      <td>
                        <span class="badge rounded-pill <?= $user['status'] == 0 ? 'bg-success' : ($user['status'] == 1 ? 'bg-danger' : 'bg-secondary') ?>">
                          <?= $user['status'] == 0 ? 'Active' : ($user['status'] == 1 ? 'Inactive' : 'Unknown') ?>
                        </span>
                      </td>

                      <td>
                        <a href="<?= base_url('user/view/' . $user['id']) ?>" class="btn btn-sm btn-success">View</a>
                        <a href="<?= base_url('user/edit/' . $user['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>

                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


  </div>
</div>
</div>
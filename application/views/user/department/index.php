<div id="main">
    <div class="main-container">

        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Departments</li>
                    </ol>
                </nav>
            </div>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-2">Departments</h5>
                            <div class="table-responsive">
                             <table class="table datatable table-striped table-hover" id="datatable">
    <thead>
        <tr>
            <th>Department</th>
            <th>Status</th>
            <th>Total Files</th>
            <th>Manage</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Research</td>
            <td><span class="badge rounded-pill bg-success">Active</span></td>
            <td>152</td>
            <td>
                <a href="<?= base_url('admin/department/view/1'); ?>" class="btn btn-sm btn-success">View</a>
            </td>
        </tr>
        <tr>
            <td>Extension</td>
            <td><span class="badge rounded-pill bg-danger">Inactive</span></td>
            <td>89</td>
            <td>
                <a href="<?= base_url('admin/department/view/2'); ?>" class="btn btn-sm btn-success">View</a>
            </td>
        </tr>
        <tr>
            <td>AQA</td>
            <td><span class="badge rounded-pill bg-success">Active</span></td>
            <td>47</td>
            <td>
                <a href="<?= base_url('admin/department/view/3'); ?>" class="btn btn-sm btn-success">View</a>
            </td>
        </tr>
        <tr>
            <td>Planning</td>
            <td><span class="badge rounded-pill bg-secondary">Unknown</span></td>
            <td>12</td>
            <td>
                <a href="<?= base_url('admin/department/view/4'); ?>" class="btn btn-sm btn-success">View</a>
            </td>
        </tr>
        <tr>
            <td>OED (Office of the Executive Director)</td>
            <td><span class="badge rounded-pill bg-success">Active</span></td>
            <td>203</td>
            <td>
                <a href="<?= base_url('admin/department/view/5'); ?>" class="btn btn-sm btn-success">View</a>
            </td>
        </tr>
    </tbody>
</table>


                            </div>
                        </div>
                    </div>
                </div>


        </section>


    </div>
</div>
</div>
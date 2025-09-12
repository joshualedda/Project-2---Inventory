<div id="main">
    <div class="main-container">

        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Extension</li>
                    </ol>
                </nav>
            </div>
        </div>



        <div class="d-flex justify-content-end my-2">
            <a href="<?= base_url('research/create') ?>" class="btn btn-success">Add Research</a>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Extension</h5>

                            <div class="table-responsive">
                                <table class="table datatable table-striped table-hover" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>Researcher</th>
                                            <th>Research Name</th>
                                            <th>File</th>
                                            <th>Status</th>
                                            <th>Manage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($researches as $research) : ?>
                                            <tr>
                                                <td><?= htmlspecialchars($research['name']) ?></td>
                                                <td><?= htmlspecialchars($research['research_title']) ?></td>
                                                <td> 
                                                    <?php if (!empty($research['document'])): ?>
                                                        <a href="<?= base_url('./assets/uploads/' . basename($research['document'])) ?>" target="_blank">Download</a>
                                                        <?php else: ?>
                                                            No File
                                                            <?php endif; ?></td>
                                                            <td><?= htmlspecialchars($research['status']) ?></td>
                                                <td>
                                        <a href="<?= base_url('research/view/' . $research['id']) ?>" class="btn btn-sm btn-success">View</a>
                                        <a href="<?= base_url('research/edit/' . $research['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
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
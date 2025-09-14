<div id="main">
    <div class="main-container">

        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Backup</li>
                    </ol>
                </nav>
            </div>
        </div>


        <section class="section">
            <div class="row">

                <div class="card col-md-6 ">
                    <div class="card-body">

                        <?php if ($this->session->flashdata('success')) : ?>
                            <div id="success-alert" class="alert alert-success" role="alert">
                                <?= $this->session->flashdata('success') ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($this->session->flashdata('error')) : ?>
                            <div id="error-alert" class="alert alert-danger" role="alert">
                                <?= $this->session->flashdata('error') ?>
                            </div>
                        <?php endif; ?>

                        <h5 class="card-title">Back Up</h5>
                        <form class="row my-3" action="<?= base_url('backup/backupData') ?>" method="POST">

                            <p>
                                Creating regular backups of your database is crucial for data integrity and system recovery.
                                In case of unexpected events or data loss, having a recent backup ensures that you can
                                restore your system to a known, stable state. Please follow the steps below to perform a
                                system backup:
                            </p>
                            <p>

                                <li>Click the "Perform System Backup" button below.</li>
                                <li>Wait for the backup process to complete.</li>
                                <li>A notification will be show once complete.</li>
                            </p>


                            <div class="d-flex justify-content-end mx-2 ">

                                <button name="backup" class="btn btn-primary btn-md mx-2">
                                    Perform System Backup
                                </button>

                            </div>


                        </form>

                    </div>
                </div>



                <div class="card col-md-6 ">
                    <div class="card-body">

                        <h5 class="card-title">Restore</h5>
                        <?php if ($this->session->flashdata('successRestore')) : ?>
                            <div id="success-alert" class="alert alert-success" role="alert">
                                <?= $this->session->flashdata('successRestore') ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($this->session->flashdata('errorRestore')) : ?>
                            <div id="error-alert" class="alert alert-danger" role="alert">
                                <?= $this->session->flashdata('errorRestore') ?>
                            </div>
                        <?php endif; ?>
                        <form class="row my-3" action="<?= base_url('backup/restoreData') ?>" method="POST">

                            <p>
                                Restoring your database is essential for system recovery and maintaining data integrity.
                                In the event of unexpected issues or data loss, a recent backup allows you to restore your system to a known,
                                stable state. Follow the steps below to perform a database restore:
                            </p>

                            <ul>
                                <li>Restore the database to a previous state.</li>
                                <li>Undo any changes made after the backup date.</li>
                                <li>Data added or modified after the backup will be lost.</li>
                            </ul>



                            <div class="d-flex justify-content-end mx-2 ">

                                <button type="button" class="btn btn-primary btn-md mx-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Perform System Restore
                                </button>

                            </div>



                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to Restore?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Restore</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </section>


    </div>
</div>
</div>
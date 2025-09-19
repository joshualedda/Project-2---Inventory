<?php
$institutions = [
    1 => 'NARTDI',
    2 => 'SRDI'
];

$departments = [
    1 => 'Research',
    2 => 'Extension'
];
?>

<div id="main">
    <div class="main-container">
        <section>
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="rounded-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">


                        <div class="card-body text-center">
                            <h5 class="my-3"><?= $user['first_name'] . ' ' . $user['last_name']; ?></h5>
                            <p class="text-muted mb-1">
                                <?= ucfirst($user['office'] ?? 'Unknown'); ?>
                            </p>

                        </div>
                    </div>

                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush rounded-3">
                                <p class="pt-4 px-4 fw-bold text-primary">Uploaded Files List</p>
                                <li class="list-group-item d-flex px-4 py-3">
                                    <div class="w-50">
                                        <p class="mb-0"><strong>Name</strong></p>
                                    </div>
                                    <div class="w-50">
                                        <p class="mb-0"><strong>Status</strong></p>
                                    </div>
                                </li>
                                <?php if (!empty($researches)) : ?>
                                    <?php foreach ($researches as $research) : ?>
                                        <li class="list-group-item d-flex px-4 py-3">
                                            <div class="w-50">
                                                <i class="fas fa-globe fa-lg text-warning"></i>
                                                <p class="mb-0"><?= htmlspecialchars($research['research_title']); ?></p>
                                            </div>
                                            <?php
                                            $statusLabels = [
                                                0 => ['label' => 'Proposal',   'badge' => 'secondary'],
                                                1 => ['label' => 'Evaluation', 'badge' => 'info'],
                                                2 => ['label' => 'On Going',   'badge' => 'warning'],
                                                3 => ['label' => 'Completed',  'badge' => 'success']
                                            ];

                                            $status = $research['status'];
                                            $label = $statusLabels[$status]['label'] ?? 'Unknown';
                                            $badge = $statusLabels[$status]['badge'] ?? 'dark';
                                            ?>

                                            <div class="w-50">
                                                <p class="mb-0">
                                                    <span class="badge bg-<?= $badge; ?>">
                                                        <?= $label; ?>
                                                    </span>
                                                </p>
                                            </div>

                                        </li>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <li class="list-group-item d-flex px-4 py-3">
                                        <p class="mb-0">No files records found.</p>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="card mb-4" id="first">
                        <div class="card-body">
                            <div id="success-alert" class="alert alert-success" role="alert" style="display: none;">
                                Successfully Updated
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0" id="userName"><?= $user['first_name'] . ' ' . $user['last_name']; ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0" id="userEmail"><?= $user['email']; ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Role</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?= ($user['role_id'] == 1) ? 'Admin' : 'User'; ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Office</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <?= ucfirst($user['office'] ?? 'Unknown'); ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Status</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <?= ($user['status'] == 1) ? 'Active' : 'Inactive'; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-success" id="editButton" type="button">Edit</button>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4" id="hidden" style="display:none;">

                        <div class="card-body">
                            <div id="danger-alert" class="alert alert-danger" role="alert" style="display: none;"></div>
                            <form id="profileForm" action="<?= base_url('profile/editProfile/' . $user['id']) ?>" method="POST">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">First Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" name="first_name" class="form-control" value="<?= $user['first_name']; ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Last Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" name="last_name" class="form-control" value="<?= $user['last_name']; ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control" value="<?= $user['email']; ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Office</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <select name="office" class="form-control">
                                            <option value="admin" <?= ($user['office'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                                            <option value="scholar" <?= ($user['office'] == 'scholar') ? 'selected' : ''; ?>>Scholar</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Password</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                </div>
                                <hr>



                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Role</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                            <?= ($user['role_id'] == 1) ? 'Admin' : 'User'; ?>
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Status</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                            <?= ($user['status'] == 1) ? 'Active' : 'Inactive'; ?>
                                        </p>
                                    </div>
                                </div>



                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-primary mx-2" id="backButton" type="button">Back</button>
                                    <button class="btn btn-success" id="saveButton" type="submit">Save</button>
                                </div>

                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Recently Uploaded Files -->
                        <div class="col-md-6">
                            <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                    <p class="mb-4 text-primary font-italic me-1">Recently Uploaded Files</p>

                                    <p class="mb-1" style="font-size: .77rem;">File_01.pdf</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100"></div>
                                    </div>

                                    <p class="mt-4 mb-1" style="font-size: .77rem;">File_02.docx</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="100"></div>
                                    </div>

                                    <p class="mt-4 mb-1" style="font-size: .77rem;">File_03.xlsx</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="100"></div>
                                    </div>

                                    <p class="mt-4 mb-1" style="font-size: .77rem;">File_04.pptx</p>
                                    <div class="progress rounded mb-2" style="height: 5px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Department Uploads -->
                        <div class="col-md-6">
                            <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                    <p class="mb-4 text-primary font-italic me-1">Department Uploads</p>

                                    <p class="mb-1" style="font-size: .77rem;">Research Department</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75"></div>
                                    </div>

                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Extension Department</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="60"></div>
                                    </div>

                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Planning Department</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40"></div>
                                    </div>

                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Office of the Director (OED)</p>
                                    <div class="progress rounded mb-2" style="height: 5px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>


            </div>

        </section>


    </div>
</div>

<!-- In developmenmt -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#editButton').on('click', function() {
            $('#first').hide();
            $('#hidden').show();
        });

        $('#backButton').on('click', function() {
            $('#first').show();
            $('#hidden').hide();
        });

        $('#profileForm').on('submit', function(e) {
            e.preventDefault();

            var form = $(this);
            var actionUrl = form.attr('action');

            $.ajax({
                url: actionUrl,
                type: 'POST',
                data: form.serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        // Update user details
                        $('#userName').text(response.data.first_name + ' ' + response.data.last_name);
                        $('#userEmail').text(response.data.email);

                        // Show and hide the success alert
                        $('#success-alert').show();
                        setTimeout(function() {
                            $('#success-alert').fadeOut();
                        }, 3000); // Hide alert after 3 seconds

                        // Toggle forms
                        $('#first').show();
                        $('#hidden').hide();

                        // Hide any previously shown danger alert
                        $('#danger-alert').hide();
                    } else {
                        // Show the error message with HTML content
                        $('#danger-alert').html(response.message).show();
                        setTimeout(function() {
                            $('#danger-alert').fadeOut();
                        }, 3000); // Hide alert after 3 seconds
                    }
                },
                error: function(xhr, status, error) {
                    // Debugging: Log the actual error
                    console.log("Ajax error:", xhr.responseText);
                }
            });
        });
    });
</script>
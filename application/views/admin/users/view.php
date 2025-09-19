<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<div id="main">
    <div class="main-container">


        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>


        <div class="d-flex justify-content-end my-2">
            <a href="<?= base_url('admin/users') ?>" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Back to Users
            </a>
        </div>


        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>



        <div class="row">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-bottom">
                        <h5 class="card-title mb-0 text-dark">User Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <h3 class="text-primary mb-2"><?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?></h3>
                            <p class="text-muted mb-0">User Profile</p>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-hash text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">User ID</small>
                                        <span class="fw-semibold">#<?= $user['id'] ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Full Name</small>
                                        <span class="fw-semibold"><?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-envelope text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Email</small>
                                        <span class="fw-semibold"><?= htmlspecialchars($user['email']) ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-shield-lock text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Role</small>
                                        <span class="badge bg-info"><?= (int)$user['role_id'] === 1 ? 'Admin' : 'User' ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-building text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Office</small>
                                        <span class="fw-semibold text-uppercase"><?= htmlspecialchars($user['office']) ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-circle-fill text-muted me-2"></i>
                                    <div>
                                        <small class="text-muted d-block">Status</small>
                                        <?php if ((int)$user['status'] === 0): ?>
                                            <span class="badge bg-success">Active</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">Inactive</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-header bg-white border-bottom">
                        <h6 class="card-title mb-0 text-dark">Quick Actions</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="<?= base_url('admin/users/edit/' . $user['id']) ?>" class="btn btn-warning">
                                <i class="bi bi-pencil me-2"></i>Edit User
                            </a>
                            <a href="<?= base_url('admin/users') ?>" class="btn btn-outline-secondary">
                                <i class="bi bi-list me-2"></i>All Users
                            </a>
                            <a href="<?= base_url('admin/users/create') ?>" class="btn btn-primary">
                                <i class="bi bi-plus-circle me-2"></i>New User
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>






    </div>
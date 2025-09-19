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
            <a href="<?= base_url('users') ?>" class="btn btn-success">Back</a>
        </div>


        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>



        <div class="card">
            <h3 class="card-title mx-4 mt-4">
                Edit User
            </h3>

            <div class="card-body">
                <form action="<?= base_url('Users/update/' . $user['id']) ?>" method="POST">
                    <div class="row g-3">


                        <div class="col-md-6">
                            <label for="exampleInputEmail1" class="form-label">First Name</label>
                            <input disabled name="first_name" type="text" class="form-control"
                                value="<?= isset($user['first_name']) ? htmlspecialchars($user['first_name']) : set_value('first_name') ?>">
                            <?= form_error('first_name', '<div class="error text-danger">', '</div>') ?>

                        </div>

                        <div class="col-md-6">
                            <label for="exampleInputEmail1" class="form-label">Last Name</label>
                            <input disabled name="last_name" type="text" class="form-control"
                                value="<?= isset($user['last_name']) ? htmlspecialchars($user['last_name']) : set_value('last_name') ?>">
                            <?= form_error('last_name', '<div class="error text-danger">', '</div>') ?>

                        </div>


                        <div class="col-md-6">
                            <label for="exampleInputEmail1" class="form-label">Institution</label>
                            <input disabled type="text" class="form-control" value="Unknown">
                        </div>


                        <div class="col-md-6">
                            <label for="exampleInputEmail1" class="form-label">Department</label>
                            <select disabled name="department_id" class="form-select" aria-label="Default select example">
                                <option value="" <?= empty($user['department_id']) ? 'selected' : '' ?>>Open this select menu</option>
                                <option value="1" <?= isset($user['department_id']) && $user['department_id'] == 1 ? 'selected' : '' ?>>Research</option>
                                <option value="2" <?= isset($user['department_id']) && $user['department_id'] == 2 ? 'selected' : '' ?>>Extension</option>
                            </select>
                            <?= form_error('department_id', '<div class="error text-danger">', '</div>') ?>
                        </div>


                        <div class="col-md-6">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input disabled name="email" type="text" class="form-control" value="<?= isset($user['email']) ? htmlspecialchars($user['email']) : set_value('email') ?>">
                            <?= form_error('email', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <div class="col-md-6">
                            <label for="exampleInputEmail1" class="form-label">Employee No.</label>
                            <input disabled name="employee_no" type="number" class="form-control"
                                value="<?= isset($user['employee_no']) ? htmlspecialchars($user['employee_no']) : set_value('employee_no') ?>">
                            <?= form_error('employee_no', '<div class="error text-danger">', '</div>') ?>

                        </div>


                    </div>
                </form>
            </div>
        </div>






    </div>
<div id="main">
    <div class="main-container">


        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User</li>
                    </ol>
                </nav>
            </div>
        </div>


        <div class="d-flex justify-content-end my-2">
            <a href="<?= base_url('users') ?>" class="btn btn-success">Back</a>
        </div>


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


        <div class="card">
            <h3 class="card-title mx-4 mt-4">
                Add User
            </h3>




            <div class="card-body">
                <form action="<?= base_url('Users/createUser') ?>" method="POST">
                    <div class="row g-3">

                        <div class="col-md-6">
                            <label for="exampleInputEmail1" class="form-label">First Name</label>
                            <input name="first_name" type="text" class="form-control">
                            <?= form_error('first_name', '<div class="error text-danger">', '</div>') ?>

                        </div>

                        <div class="col-md-6">
                            <label for="exampleInputEmail1" class="form-label">Last Name</label>
                            <input name="last_name" type="text" class="form-control">
                            <?= form_error('last_name', '<div class="error text-danger">', '</div>') ?>

                        </div>


                        

                        <div class="col-md-6">
                            <label for="exampleInputEmail1" class="form-label">Department</label>
                            <select name="department_id" class="form-select" aria-label="Default select example">
                                <option selected value="">Open this select menu</option>
                                <option value="1">Research</option>
                                <option value="2">Extension</option>
                            </select>
                            <?= form_error('department_id', '<div class="error text-danger">', '</div>') ?>

                        </div>

                        <div class="col-md-6">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input name="email" type="text" class="form-control">
                            <?= form_error('email', '<div class="error text-danger">', '</div>') ?>

                        </div>

                        <div class="col-md-6">
                            <label for="employeeNO" class="form-label">Employee No.</label>
                            <input name="employee_no" type="number" class="form-control" id="employeeNO">
                            <span id="employeeNOError" class="text-danger"></span>
                            <?= form_error('employee_no', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" id="password">
                            <span id="passwordError" class="text-danger"></span>
                            <?= form_error('password', '<div class="error text-danger">', '</div>') ?>
                        </div>

                        <div class="col-md-6">
                            <label for="passwordConfirmation" class="form-label">Password Confirmation</label>
                            <input name="password" type="password" class="form-control" id="passwordConfirmation">
                            <span id="passwordConfirmationError" class="text-danger"></span>
                            <?= form_error('password', '<div class="error text-danger">', '</div>') ?>
                        </div>



                    </div>
                    <button id="submitBtn" name="submit" type="submit" class="btn btn-primary mt-2">Create</button>


                </form>
            </div>
        </div>






    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const password = document.getElementById("password");
            const passwordConfirmation = document.getElementById("passwordConfirmation");
            const passwordError = document.getElementById("passwordError");
            const passwordConfirmationError = document.getElementById("passwordConfirmationError");
            const employeeNO = document.getElementById("employeeNO");
            const employeeNOError = document.getElementById("employeeNOError");
            const submitBtn = document.getElementById("submitBtn");
            const form = document.querySelector("form"); // Assuming form element is present

            // Function to validate passwords
            function validatePasswords() {
                // Clear previous error messages
                passwordError.textContent = "";
                passwordConfirmationError.textContent = "";

                let isValid = true;

                // Enable submit button if both fields are empty
                if (password.value === "" && passwordConfirmation.value === "") {
                    submitBtn.disabled = false;
                    return; // No need to check further if both are empty
                }

                // Password requirements (e.g., minimum length)
                if (password.value.length > 0 && password.value.length < 8) {
                    passwordError.textContent = "Password must be at least 8 characters long.";
                    isValid = false;
                }

                // Check if the passwords match
                if (password.value !== passwordConfirmation.value) {
                    passwordConfirmationError.textContent = "Passwords do not match.";
                    isValid = false;
                }

                // Disable or enable the submit button based on validation
                submitBtn.disabled = !isValid;
            }

            // Function to validate employee number
            function validateEmployeeNO() {
                const employeeNOValue = employeeNO.value;
                employeeNOError.textContent = "";

                // Ensure the employee number is at least 5 digits
                if (employeeNOValue.length > 0 && employeeNOValue.length < 5) {
                    employeeNOError.textContent = "Employee number must be at least 5 digits long.";
                    submitBtn.disabled = true;
                } else {
                    submitBtn.disabled = false;
                }
            }

            // Add event listeners
            password.addEventListener("input", validatePasswords);
            passwordConfirmation.addEventListener("input", validatePasswords);
            employeeNO.addEventListener("input", validateEmployeeNO);

            // Handle form submission
            form.addEventListener("submit", function(event) {
                // Run validations
                validatePasswords();
                validateEmployeeNO();

                // Check if form is valid before submission
                if (submitBtn.disabled) {
                    event.preventDefault(); // Prevent form submission if validation fails
                }
            });
        });
    </script>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-lg-6 col-xxl-3">
                    <div class="card mb-0">
                        <div class="card-body">
                            <a href="./index.html" class="text-nowrap logo-img text-center d-block py-1 w-100">
                                <img src="<?= base_url('assets/images/logo.jpg'); ?>" width="70" alt="">
                            </a>
                            <p class="text-center">Student Affairs and Services</p>
                            <?php if (!empty($error_message)) : ?>
                                <div class="alert alert-danger"><?= $error_message ?></div>
                            <?php endif; ?>

                            <form id="loginForm" method="post" action="<?= base_url('login/authenticate') ?>">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input value="admin@gmail.com" name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= set_value('email') ?>">
                                    <?= form_error('employee_no', '<div class="error text-danger">', '</div>') ?>
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input value="Pa$$w0rd!" name="password" type="password" class="form-control" id="exampleInputPassword1" value="<?= set_value('password') ?>">
                                    <?= form_error('password', '<div class="error text-danger">', '</div>') ?>
                                </div>

                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="form-check"></div>
                                    <a class="text-primary fw-bold" href="#">Forgot Password?</a>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
                                <div class="d-flex align-items-center justify-content-center">
                                    <p class="fs-4 mb-0 fw-bold">Don't have an Account?</p>
                                    <a class="text-primary fw-bold ms-2" href="<?= base_url('register') ?>">Create an account</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script>
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault();

        var email = document.getElementById('exampleInputEmail1').value;
        var password = document.getElementById('exampleInputPassword1').value;

        if (email === '12345' && password === '12345') {
            window.location.href = '../admin/dashboard/dashboard.php';
        } else if (email === 'user@gmail.com' && password === '12345') {
            window.location.href = '../user/homepage.php';
        } else {
            var alertDiv = document.getElementById('success-alert');
            alertDiv.classList.remove('d-none');
            alertDiv.textContent = 'Invalid credentials, please try again.';
        }
    });
</script> -->
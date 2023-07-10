<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->
    <link rel="stylesheet" href="<?= base_url('adminlte/dist/css/adminlte.min.css') ?>">
    <style>
        body {
            background-image: url("https://edunitas.com/file/BiayaKuliahKaryawanUniversitasPelitaBangsaBekasi.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
        }

        /* Add additional styles for other elements */
    </style>
    <title>Register as Admin</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-lg-9">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            Register a New Admin Account
                        </h3>
                    </div>
                    <div class="card-body login-card-body">
                        <form id="register-form" action="<?= base_url('admin/register') ?>" method="post">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="name" placeholder="Name" autofocus="true"
                                    required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input id="password" type="password" class="form-control" name="password"
                                    placeholder="Password" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="password_confirmation"
                                    placeholder="Retype Password" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                                </div>
                            </div>
                        </form>
                        <!-- Display validation errors -->
                        <?php if (session()->has('errors')): ?>
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    <?php foreach (session('errors') as $error): ?>
                                        <li>
                                            <?= $error ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <div class="card-footer text-center">
                            <a href="javascript:history.back();">Back To Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
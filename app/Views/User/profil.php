<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('layouts/head.php'); ?>
</head>

<body background="https://blusignalsystems.com/wp-content/uploads/2016/12/Savin-NY-Website-Background-Web1.jpg">
    <!-- Content Header -->
    <?php include('layouts/header.php'); ?>
    <!-- /.content-header -->

    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 h5">
                    Profil
                </div>
            </div>
        </div>
    </section>
    <!-- /.content-header -->
    <?php

    ?>
    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">User Information</h3>
                        </div>
                        <div class="card-body">
                            <form id="biodata-form">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="<?= $user['name'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="<?= $user['email'] ?>" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Change Password</h3>
                        </div>
                        <div class="card-body">
                            <form id="password-form">
                                <div class="form-group">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" class="form-control" id="current_password"
                                        name="current_password" required>
                                </div>
                                <div class="form-group">
                                    <label for="new_password">New Password</label>
                                    <input type="password" class="form-control" id="new_password" name="new_password"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Confirm New Password</label>
                                    <input type="password" class="form-control" id="confirm_password"
                                        name="confirm_password" required>
                                </div>
                                <button type="submit" class="btn btn-primary" id="change-password-form">Change
                                    Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

    <!-- Edit Password -->
    <script>
        $(document).ready(function () {
            $('#biodata-form').on('submit', function (e) {
                e.preventDefault();

                // Perform client-side validation if needed

                $.ajax({
                    url: 'profile/update',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function (response) {
                        if (response.success) {
                            // Password changed successfully
                            alert(response.message);
                            // You can redirect to another page or perform any other action here
                        } else {
                            // Error occurred, display error message
                            alert(response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        // Error occurred, display error message
                        console.log(error);
                        alert('An error occurred while changing profile data. Please try again later.');
                    }
                });
            });
        });

    </script><!-- Edit Password -->
    <script>
        $(document).ready(function () {
            $('#password-form').on('submit', function (e) {
                e.preventDefault();

                var currentPassword = $('#current-password').val();
                var newPassword = $('#new-password').val();
                var confirmPassword = $('#confirm-password').val();

                // Perform client-side validation if needed

                $.ajax({
                    url: 'profile/changepassword',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function (response) {
                        if (response.success) {
                            // Password changed successfully
                            alert(response.message);
                            // You can redirect to another page or perform any other action here
                        } else {
                            // Error occurred, display error message
                            alert(response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        // Error occurred, display error message
                        alert('An error occurred while changing the password. Please try again later.');
                    }
                });
            });
        });

    </script>

    <!-- build the navbar -->
    <script>
        // Get the current page URL
        var currentUrl = window.location.href;

        // Get the list of navbar links
        var navbarLinks = document.querySelectorAll('.navbar-nav .nav-link');

        // Loop through each link and check if the URL matches
        navbarLinks.forEach(function (link) {
            if (link.href === currentUrl) {
                link.classList.add('active'); // Add the 'active' class to the matching link
            }
        });
    </script>
</body>

</html>

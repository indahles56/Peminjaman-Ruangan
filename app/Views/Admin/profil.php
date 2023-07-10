<!DOCTYPE html>
<html>

<head>
    <title>Admin Profile - Peminjaman Ruang Kelas</title>
    <link rel="stylesheet" href="<?= base_url('adminlte/dist/css/adminlte.min.css') ?>">
    <!-- AdminLTE v3 JS -->
    <script src="<?= base_url('adminlte/dist/js/adminlte.min.js') ?>"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tentang</a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <h1>Admin Profile</h1>

                    <?php
                    // User data (retrieve from the database or any other data source)
                    $user = [
                        'name' => 'Jane Smith',
                        'email' => 'janesmith@example.com',
                        'role' => 'Student',
                        'classroom' => 'A101',
                    ];
                    ?>

                    <h2>Profile Information</h2>
                    <p><strong>Name:</strong> <?php echo $user['name']; ?></p>
                    <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
                    <p><strong>Role:</strong> <?php echo $user['role']; ?></p>
                    <p><strong>Classroom:</strong> <?php echo $user['classroom']; ?></p>

                    <br>

                    <!-- Room booking form -->
                    <h2>Room Booking</h2>
                    <form action="process_booking.php" method="post">
                        <div class="form-group">
                            <label for="room">Room:</label>
                            <input type="text" name="room" id="room" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="date" name="date" id="date" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Book Room</button>
                    </form>
                </div>
            </section>
        </div>

        <!-- Footer -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>
    </div>
</body>


</html>

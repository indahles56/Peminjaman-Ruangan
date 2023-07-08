<!DOCTYPE html>
<html>
<head>
    <title>User Profile - Peminjaman Ruang Kelas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
	<!-- AdminLTE v3 JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <span class="brand-text font-weight-light">Peminjaman Ruang Kelas</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    User Profile
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-clipboard"></i>
                                <p>
                                    Room Booking
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">User Profile</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <h2>Profile Information</h2>
                            <p><strong>Name:</strong> <?php echo $user['name']; ?></p>
                            <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
                            <p><strong>Role:</strong> <?php echo $user['role']; ?></p>
                            <p><strong>Classroom:</strong> <?php echo $user['classroom']; ?></p>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-body">
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
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->
</body>
</html>

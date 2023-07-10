<!-- Content Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                Admin Peminjaman Ruangan
            </div>
        </div>
    </div>
</section>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-6">
                <!-- Total Users Small Box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>
                            <?= $totalUsers ?>
                        </h3>
                        <p>Total Users</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <!-- Total Bookings Small Box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>
                            <?= $totalBookings ?>
                        </h3>
                        <p>Total Bookings</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <!-- Total Rooms Small Box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>
                            <?= $totalRooms ?>
                        </h3>
                        <p>Total Rooms</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-door-open"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

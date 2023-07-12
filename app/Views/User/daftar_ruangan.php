<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('layouts/head.php'); ?>
</head>

<body background="https://blusignalsystems.com/wp-content/uploads/2016/12/Savin-NY-Website-Background-Web1.jpg">
    <!-- Content Header -->
    <?php include('layouts/header.php'); ?>
    <!-- /.content-header -->
    
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <?php $counter = 0; ?>
            <?php foreach ($rooms as $room): ?>
                <?php if ($counter % 3 === 0): ?>
                </div>
                <div class="row">
                    <?php endif; ?>
                    <div class="col-md-4">
                        <div class="card my-3 mx-3">
                        <img src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/138495562.jpg?k=7ea8400a0a5ca711d6d3fee2258fcf9920c22701f39d9bafafae0c6dab1f4d6d&o=&hp=1"
                            class="card-img-top" alt="Room Image">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= $room['kode_ruang'] ?>
                            </h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                <?= $room['nama_ruang'] ?>
                            </h6>
                            <p class="card-text">
                                <?= $room['spesifikasi'] ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php $counter++; ?>
            <?php endforeach; ?>
        </div>
    </div>


    <!-- /.content -->


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

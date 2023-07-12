<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('adminlte/dist/css/adminlte.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="<?= base_url('adminlte/plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('adminlte/dist/js/adminlte.min.js') ?>"></script>

    <title>Admin Peminjaman Ruangan</title>

</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        <?php include('sidebar.php') ?>


        <!-- Header Container -->
        <?php include('header.php'); ?>

        <!-- Content Wrapper -->
        <div class="content-wrapper" id="content">
            <?php include(__DIR__ . '/../dashboard.php'); ?>
        </div>
        <!-- /.content-wrapper -->

        <!-- Footer Container -->
        <?php include('footer.php'); ?>
    </div>
    <!-- ./wrapper -->


    <!-- Javascript untuk ubah konten -->
    <script>
        $(document).ready(function () {
            // Handle sidebar item clicks
            $('.nav-link').click(function (e) {
                // Check if the clicked element is the logout button
                if ($(this).attr('id') === 'logout-button') {
                    // Allow the default link behavior to execute
                    return true;
                }

                e.preventDefault();

                // Get the URL from the clicked sidebar item
                var url = $(this).attr('href');

                // Load the content from the URL and update the dashboard-content element
                $('#content').load(url);
            });
        });

    </script>
</body>

</html>

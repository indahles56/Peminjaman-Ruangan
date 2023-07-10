<!-- Content Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 h5">
                Kelola Akun Pengguna
            </div>
        </div>
    </div>
</section>
<!-- /.content-header -->

<!-- Main Content -->
<section class="content">
    <table id="user-table" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td>
                        <?= $user['id'] ?>
                    </td>
                    <td>
                        <?= $user['name'] ?>
                    </td>
                    <td>
                        <?= $user['email'] ?>
                    </td>
                    <td>
                        <!-- <a href="#" class="btn btn-primary" onclick="">Blokir</a> -->
                        <a href="<?php echo base_url('admin/users/delete/'); echo $user['id']; ?>" class="btn btn-danger delete-btn" data-id="<?= $user['id'] ?>">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>


</section>
<!-- /.content -->

<script>
    $('.delete-btn').on('click', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var url = $(this).attr('href');
        // Send an AJAX request to the delete endpoint
        $.ajax({
            url: url,
            type: 'DELETE',
            success: function (response) {
                // Process the response
                if (response.success) {
                    // User deleted successfully
                    alert("Success delete the user");

                    // Update the user list on the page with the updated HTML
                    // $('#userListContainer').html(response.html);
                    $('#content').load('users');

                } else {
                    // Error occurred
                    alert(response.message);
                }
            },
            error: function (response) {
                // Error occurred during the AJAX request
                alert(response.message);
            }
        });
    });

</script>

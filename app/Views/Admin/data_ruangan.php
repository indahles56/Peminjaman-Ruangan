<!-- Content Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 h5">
                Kelola Data Ruangan
            </div>
        </div>
        <button href="" class="btn btn-primary add-room">Tambah Ruangan Baru</button>
    </div>
</section>
<!-- /.content-header -->

<!-- Main Content -->
<section class="content">
    <table id="user-table" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Kode Ruang</th>
                <th>Nama Ruang</th>
                <th>Spesifikasi</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($rooms as $room): ?>
                <tr>
                    <td>
                        <?= $room['kode_ruang'] ?>
                    </td>
                    <td>
                        <?= $room['nama_ruang'] ?>
                    </td>
                    <td>
                        <?= $room['spesifikasi'] ?>
                    </td>
                    <td>
                        <a href="#" class="btn btn-primary edit-btn" data-id="<?= $room['id'] ?>"
                            data-json="<?php echo htmlentities(json_encode($room)); ?>">Edit</a>
                        <a href="" class="btn btn-danger delete-btn" data-id="<?= $room['id'] ?>">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>


</section>
<!-- /.content -->


<!-- Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document" id="myModal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Tambah Data Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add-user" class="form">
                    <div class="form-group">
                        <label for="name">Kode Ruang</label>
                        <input type="text" class="form-control" id="kode_ruang" name="kode_ruang" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Ruangan</label>
                        <input type="text" class="form-control" id="nama_ruang" name="nama_ruang" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Spesifikasi</label>
                        <input type="text" class="form-control" id="spesifikasi" name="spesifikasi" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="add-button">Tambah</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- Edit Button -->
<script>
    $('.delete-btn').on('click', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var url = 'admin/rooms/delete/' + id;

        // Send an AJAX request to the delete endpoint
        $.ajax({
            url: url,
            type: 'DELETE',
            success: function (response) {
                // Process the response
                if (response.success) {
                    // User deleted successfully
                    alert("Success delete the room");

                    // Update the user list on the page with the updated HTML
                    $('#content').load('rooms');

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

<!-- Add Button -->
<script>
    $('.add-room').on('click', function (e) {
        e.preventDefault();
        $('#addUserModal').modal('show');

        $('form').submit(function (e) {
            e.preventDefault();
            var data = $(this).serialize();
            console.log(data);
            var url = 'add-room';
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                success: function (response) {
                    if (response.success) {
                        alert('Data Sukses Ditambahkan');
                        $('#addUserModal').modal('hide');
                        $('.modal-backdrop').remove();
                        $('body').removeClass('modal-open');
                        $('#content').load('rooms');

                    } else {
                        alert(response.message);
                        // Jika terdapat error, tampilkan pesan error
                        $('#addUserModal').modal('hide');
                        $('.modal-backdrop').remove();
                        $('body').removeClass('modal-open');
                        $('#form-add-user .error-message').text(response.message)
                            .show();
                    }
                },
                error: function (response) {
                    // Handle error response, display error messages in the modal

                    alert(response.message);
                }
            })
        });
        $('#addUserModal').modal('hide');
    })
</script>


<script>
    $('.edit-btn').on('click', function (e) {
        e.preventDefault();

        $('#addUserModalLabel').text('Ubah Data Ruang');
        $('#add-button').text('Konfirmasi Edit');

        var data = $(this).data('json');
        console.log(data);
        $('#addUserModal').modal('show');

        $('#kode_ruang').val(data.kode_ruang);
        $('#nama_ruang').val(data.nama_ruang);
        $('#spesifikasi').val(data.spesifikasi);

        $('#form-add-user').submit(function (e) {
            e.preventDefault();

            var url = 'rooms/update/' + data.id;
            var formData = $(this).serialize();
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function (response) {
                    // Process the response
                    if (response.success) {
                        // User deleted successfully
                        alert(response.message);
                        $('#addUserModal').modal('hide');
                        $('.modal-backdrop').remove();
                        $('body').removeClass('modal-open');
                        $('#content').load('rooms');

                    } else {
                        console.log(formData);

                        $('#addUserModal').modal('hide');
                        $('.modal-backdrop').remove();
                        $('body').removeClass('modal-open');
                        // Error occurred
                        alert(response.message);
                    }
                },
                error: function (response) {
                    // Error occurred during the AJAX request
                    alert(response.message);
                }
            });
        })
    })

</script>

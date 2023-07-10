<!-- Content Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 h5">
                Kelola Feedback
            </div>
        </div>
    </div>
</section>
<!-- /.content-header -->

<!-- Main Content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Feedback</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Keterangan</th>
                        <th>Ruang</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop through the feedback data and generate table rows -->
                    <?php foreach ($feedbacks as $feedback): ?>
                        <tr>
                            <td>
                                <?= $feedback['id'] ?>
                            </td>
                            <td>
                                <?= $feedback['user'] ?>
                            </td>
                            <td>
                                <?= $feedback['keterangan'] ?>
                            </td>
                            <td>
                                <?= $feedback['ruang'] ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<!-- /.content -->
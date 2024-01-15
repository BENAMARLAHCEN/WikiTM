<?php
if (isset($_SESSION["valid"])) {
    echo "
    <script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: '$_SESSION[valid]',
        showConfirmButton: false,
        timer: 1500
    });
</script>
    ";
    unset($_SESSION["valid"]);
}
if (isset($_SESSION["errors"])) {
    echo "
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '$_SESSION[errors]'
    });
</script>
    ";
    unset($_SESSION["errors"]);
}
?>
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">WIKI LIST</h5>
                    <a href="AddWiki" class="btn btn-dark"><i class="bi bi-clipboard-plus"></i></a>

                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Views</th>
                                <th>Status</th>
                                <th data-type="date" data-format="YYYY-DD-MM H:M:S">Create Date</th>
                                <th data-type="date" data-format="YYYY-DD-MM H:M:S">Update Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($wikis as $wiki) { ?>
                                <tr>
                                    <td><?= $wiki->id ?></td>
                                    <td><?= $wiki->title ?></td>
                                    <td><?= "" ?></td>
                                    <td><?= $wiki->views ?></td>
                                    <td><?php if (!$wiki->archived) { ?>
                                            Public
                                        <?php } else { ?>
                                            archived
                                        <?php } ?></td>
                                    <td><?= $wiki->create_date ?></td>
                                    <td><?= $wiki->update_date ?></td>
                                    <td>
                                        <a href="EditWiki?id=<?= $wiki->id ?>" class="btn btn-secondary"><i class="bi bi-pencil-square"></i></a>
                                        <form method="post"><button type="submit" class="btn btn-danger" name="delete" value="<?= $wiki->id ?>"><i class="bi bi-eraser"></i></button></form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>
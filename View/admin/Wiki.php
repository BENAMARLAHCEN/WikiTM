<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">WIKI LIST</h5>
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bi bi-clipboard-plus"></i></button>

                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Views</th>
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
                                    <td><?= $wiki->create_date ?></td>
                                    <td><?= $wiki->update_date ?></td>
                                    <td>
                                        <?php if ($wiki->archived) { ?>
                                            <button type="button" class="btn btn-success">Accept</button>
                                        <?php } else { ?>
                                            <button type="button" class="btn btn-danger">archived</button>
                                        <?php } ?>
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


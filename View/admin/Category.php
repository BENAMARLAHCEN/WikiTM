<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">CATEGORY LIST</h5>
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bi bi-clipboard-plus"></i></button>

                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th data-type="date" data-format="YYYY-DD-MM H:M:S">Create Date</th>
                                <th data-type="date" data-format="YYYY-DD-MM H:M:S">Update Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($category as $cat){?>
                            <tr>
                                <td><?=$cat->id?></td>
                                <td><?=$cat->name?></td>
                                <td><?=$cat->create_date?></td>
                                <td><?=$cat->update_date?></td>
                                <td>
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editModal"><i class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-danger"><i class="bi bi-eraser"></i></button>
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

<!-- insert modal -->
<div class="modal fade" id="basicModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Floating Labels Form -->
            <form class="row g-3" method="post" action="Category/insert" >
                <div class="modal-body">

                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" name="name" class="form-control" id="floatingName" placeholder="Category Name">
                            <label for="floatingName">Category Name</label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>

            </form><!-- End floating Labels Form -->
        </div>
    </div>
</div><!-- END Modal-->

<!-- update modal -->

<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Floating Labels Form -->
            <form class="row g-3"  method="post" action="Category/update">
                <div class="modal-body">

                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" name="name" class="form-control" id="floatingName" placeholder="Category Name">
                            <label for="floatingName">Category Name</label>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="2">

                </div>
                <div class="modal-footer text-center">
                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>

            </form><!-- End floating Labels Form -->
        </div>
    </div>
</div><!-- END Modal-->
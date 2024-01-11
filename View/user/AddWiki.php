<section class="section dashboard">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add Wiki Form</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" method="post" enctype="multipart/form-data">
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" name="title" class="form-control" id="floatingTitle" placeholder="Titel">
                        <label for="floatingTitle">Title</label>
                    </div>
                </div>

                <div class="col-12">
                    <!-- <label>Team detail</label> -->
                    <div class="form-floating">
                        <!-- TinyMCE Editor -->
                        <textarea name="content" class="tinymce-editor">

                        </textarea>

                        <!-- End TinyMCE Editor -->
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-floating mb-3">
                        <select class="form-select" name="category" id="categorySelect">
                            <?php foreach ($category as $cat) { ?>
                                <option value="<?= $cat->id ?>"><?= $cat->name ?></option>
                            <?php } ?>
                        </select>
                        <label for="categorySelect">Category</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select" name="tags[]" id="multiple-select-field" data-placeholder="Choose tags" multiple>
                            <?php foreach ($tags as $tag) { ?>
                                <option value="<?= $tag->id ?>"><?= $tag->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form>

        </div>
    </div>
</section>
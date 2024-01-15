<?php $wiki = $wiki[0] ?>
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
<section class="section dashboard">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit Wiki Form</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" id="form" method="post" enctype="multipart/form-data">
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" name="title" value="<?= $wiki->title ?>" class="form-control" id="floatingTitle" placeholder="Titel">
                        <label for="floatingTitle">Title</label>
                    </div>
                </div>

                <div class="col-12">
                    <!-- <label>Team detail</label> -->
                    <div class="form-floating">
                        <!-- TinyMCE Editor -->
                        <textarea name="content" class="tinymce-editor">
                        <?= $wiki->content ?>
                        </textarea>

                        <!-- End TinyMCE Editor -->
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input class="form-control" onchange="validationImage()" type="file" name="image" id="image">
                        <label for="image">Image</label>
                        <span id="imageM" class=" text-danger"></span>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="form-floating mb-3">
                        <select class="form-select" name="category" id="categorySelect">
                            <?php foreach ($category as $cat) {
                                $selected = '';
                                if ($cat->id == $wiki->category) {
                                    $selected = 'selected';
                                }
                            ?>
                                <option <?= $selected ?> value="<?= $cat->id ?>"><?= $cat->name ?></option>
                            <?php } ?>
                        </select>
                        <label for="categorySelect">Category</label>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="form-floating mb-3">
                        <select class="form-select" name="tags[]" id="multiple-select-field" data-placeholder="Choose tags" multiple>
                            <?php foreach ($tags as $tag) {
                                $selected = '';
                                foreach ($wtag as $wtg) {

                                    if ($tag->id == $wtg->tag_id) {
                                        $selected = 'selected';
                                    }
                                } ?>
                                <option <?= $selected ?> value="<?= $tag->id ?>"><?= $tag->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form>

        </div>
    </div>
</section>

<script>
    document.getElementById('form').addEventListener('submit', function(event) {
        var title = document.getElementById('floatingTitle');
        var content = document.querySelector('textarea[name="content"]');
        var categorySelect = document.getElementById('categorySelect');
        var tagsSelect = document.getElementById('multiple-select-field');



        // Validate Title
        if (!isValidName(title.value)) {
            title.classList.add('is-invalid');
            title.classList.remove('is-valid');
            event.preventDefault();
        } else {
            title.classList.add('is-valid');
            title.classList.remove('is-invalid');
        }

        // Validate Content
        if (content.value.trim() === "") {
            content.classList.add('is-invalid');
            content.classList.remove('is-valid');
            event.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please enter some content.'
            });
        } else {
            content.classList.add('is-valid');
            content.classList.remove('is-invalid');
        }

        // Validate Category
        var selectedCategoryId = categorySelect.value;

        if (selectedCategoryId === "") {
            console.log("Category is empty");
            categorySelect.classList.add('is-invalid');
            categorySelect.classList.remove('is-valid');
            event.preventDefault();
        } else if (isNaN(selectedCategoryId) || parseInt(selectedCategoryId) <= 0) {
            console.log("Category is not a valid number");
            categorySelect.classList.add('is-invalid');
            categorySelect.classList.remove('is-valid');
            event.preventDefault();
        } else {
            console.log("Category is valid");
            categorySelect.classList.add('is-valid');
            categorySelect.classList.remove('is-invalid');
        }

        // Validate Tags
        var selectedTags = Array.from(tagsSelect.selectedOptions).map(option => option.value);

        if (selectedTags.length === 0) {
            console.log("No tags selected");
            tagsSelect.classList.add('is-invalid');
            tagsSelect.classList.remove('is-valid');
            event.preventDefault();
        } else {
            console.log("Tags are valid");
            tagsSelect.classList.add('is-valid');
            tagsSelect.classList.remove('is-invalid');
        }
    });

    function validationImage() {
        var imageInput = document.getElementById('image');
        var submitButton = document.querySelector('button[type="submit"]');
        // Validate Image
        if (!validateImage(imageInput.value)) {
            imageInput.classList.add('is-invalid');
            imageInput.classList.remove('is-valid');
            imageM.innerHTML = "Please select a file with a valid extension (JPG, JPEG, PNG, SVG).";
            submitButton.disabled = false;
        } else {
            imageInput.classList.add('is-valid');
            imageInput.classList.remove('is-invalid');
            submitButton.disabled = true;
            imageM.innerHTML = "";
        }
    }
</script>
<?php $wiki=$wiki[0]?>
<section class="section dashboard">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit Wiki Form</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" method="post" enctype="multipart/form-data">
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

                <div class="col-md-5">
                    <div class="form-floating mb-3">
                        <select class="form-select" name="category" id="categorySelect">
                            <?php foreach ($category as $cat) { 
                                $selected = '';
                                if ($cat->id == $wiki->categoryID) {
                                    $selected = 'selected';
                                }
                                ?>
                                <option <?= $selected ?>  value="<?= $cat->id ?>"><?= $cat->name ?></option>
                            <?php } ?>
                        </select>
                        <label for="categorySelect">Category</label>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="form-floating mb-3">
                        <select class="form-select" name="tag[]" id="multiple-select-field" data-placeholder="Choose tags" multiple>
                            <?php foreach ($tags as $tag) {
                                $selected = ''; 
                                foreach ($wtag as $wtg) {
                                    
                                    if ($tag->id == $wtg->tag_id) {
                                        $selected = 'selected';
                                    } 
                                }?>
                                <option <?= $selected ?>  value="<?= $tag->id ?>"><?= $tag->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?=$_GET['id']?>">

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form>

        </div>
    </div>
</section>
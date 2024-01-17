<div class="">
    <div class="w-100">
        <img class="w-100" src="assets/upload/wiki/<?= $wiki->image ?>" alt="wiki image">
    </div>
    <div class="d-flax flex-column align-items-center m-md-5 m-sm-2 mt-sm-4">
        <div class="row">
            <div class=" col col-lg-9 col-md-12 p-3 mt-sm-4">
                <h1 class="w-100 text-center "><?= $wiki->title ?></h1>
                <div class="w-100 text-center mt-3 "><?= $wiki->username ?> . <?= $wiki->create_date ?></div>
                <div class="w-100 text-center mt-1 "><?= $wiki->name ?></div>
                <div class="w-100 mt-4 mx-2">
                    <?= $wiki->content ?>
                </div>
            </div>
            <div class="col-lg-3  col-md-12 flex-md-wrap-reverse">
                <h3 class=" mt-4 mb-3 text-opacity-75">ABOUT THE AUTHOR</h3>
                <div class="row">
                    <div class="d-flex  justify-content-center col-lg-12 col-md-3 mb-lg-4 col-sm-4">
                        <img src="./assets/upload/user/<?= $wiki->imageUser ?>" alt="auhtor image" class=" w-75 img-fluid rounded-circle">
                    </div>
                    <div class="col-sm-8 col-lg-12 col-md-9">
                        <div class="d-flax flex-column ">
                            <div class=" h3"><?= $wiki->username ?></div>
                            <div class=""><?= $wiki->Job ?></div>
                            <p class=" "> <?= $wiki->about ?></p>
                        </div>
                    </div>
                </div>
                <div class=" d-flex flex-column align-items-center">
                    <h2 class="fw-bold">Tags</h2>
                    <div class="d-flex gap-2 flex-wrap justify-content-center">
                        <?php foreach ($tags as $tag) :  ?>
                            <span class="badge badge-soft-secondary p-2">#<?= $tag->name ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>

</div>
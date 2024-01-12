<?php foreach ($wikis as $wiki) :  ?>
    <div class="col-md-10 overflow-hidden">
        <div class="row p-2 bg-white border rounded card-height">
            <div class="col-md-4 mt-1 card-image">
                <img class="img-fluid rounded h-100" src="assets/upload/wiki/<?= $wiki->image ?>">
            </div>
            <div class="col-md-8 mt-1 overflow-hidden pb-2">
                <p class="text-uppercase"> <?= $wiki->name ?></p>
                <h3><?= $wiki->title ?></h3>

                <div class=" mr-2">
                    <div><?= $wiki->username ?> . <?= $wiki->create_date ?></div>
                    <p class="text-justify text-truncate para mb-0 white-space-wrap"><?= $wiki->content ?><br><br></p>

                </div>

            </div>
        </div>
    </div>
<?php endforeach; ?>
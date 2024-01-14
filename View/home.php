<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 hero-text">
                <h1 class="fw-bold">Welcome to WikiTM</h1>
                <p>Your text description goes here.</p>
                <button class="btn btn-dark">Learn More</button>
            </div>
            <div class="col-md-6 mt-4 ">
                <img src="assets/img/hausbau-wiki-1.jpg" alt="Hero Image" class="hero-image">
            </div>
        </div>
    </div>
</section>

<section id="Tag" class="tag-section mt-3">
    <div class="container d-flex flex-column align-items-center">
        <h2 class="fw-bold">Tags</h2>

        <div class="d-flex gap-2 flex-wrap justify-content-center">
            <?php foreach ($tags as $tag) :  ?>
                <span class="badge badge-soft-secondary p-2">#<?= $tag->name ?></span>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section id="Wiki" class="search-section mt-5">
    <div class="container d-flex flex-column align-items-center">
        <div class="fw-bold h1 text-black">Search for Wiki</div>
        <input type="search" name="search" oninput="Filter()" id="searchWiki" class="form-control">
            <!-- category  -->
            <div class="d-flex gap-2 flex-wrap justify-content-center">
                <?php foreach ($category as $cat) :  ?>
                    <button onclick="FilterByCategory(<?= $cat->id ?>)" class="btn btn-outline-secondary btn-category"><?= $cat->name ?></button>
                <?php endforeach; ?>
            </div>
    </div>
</section>


<section class="wiki-section">
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row gap-3" id="wiki-card">
            <?php foreach ($wikis as $wiki) :  ?>
                <div class="col-md-10 overflow-hidden">
                    <div class="row p-2 bg-white border rounded card-height">
                        <div class="col-md-4 mt-1 card-image">
                            <img class="img-fluid rounded " src="assets/upload/wiki/<?= $wiki->image ?>">
                        </div>
                        <div class="col-md-8 mt-1 overflow-hidden pb-2">
                            <p class="text-uppercase"> <?= $wiki->name ?></p>
                            <h3><?= $wiki->title ?></h3>

                            <div class=" mr-2 overflow-hidden">
                                <div><?= $wiki->username ?> . <?= $wiki->create_date ?></div>

                            </div>
                            <div class=" card-footer float-end">
                                <a class="btn btn-outline-secondary" href="/WikiTM/wikiDetail?wk=<?= $wiki->id ?>">Read More</a>
                            </div>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
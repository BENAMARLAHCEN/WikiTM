
<div class="row">
    <!--  Card -->
    <div class="col col-md-3">
        <div class="card info-card ">
            <div class="card-body">
                <h5 class="card-title">Wiki</h5>
                <div class="d-flex align-items-center justify-content-between pe-3">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-file-post-fill"></i>
                    </div>
                    <div class="ps-3">
                        <h6><?=$wikiCount?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End  Card -->
     <!--  Card -->
     <div class="col col-md-3">
        <div class="card info-card ">
            <div class="card-body">
                <h5 class="card-title">Tags </h5>
                <div class="d-flex align-items-center justify-content-between pe-3">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-tags"></i>
                    </div>
                    <div class="ps-3">
                        <h6><?=$tagCount?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End  Card -->
     <!--  Card -->
     <div class="col col-md-3">
        <div class="card info-card ">
            <div class="card-body">
                <h5 class="card-title">Category </h5>
                <div class="d-flex align-items-center justify-content-between pe-3">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-grid"></i>
                    </div>
                    <div class="ps-3">
                        <h6><?=$catCount?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End  Card -->
     <!--  Card -->
     <div class="col col-md-3">
        <div class="card info-card ">
            <div class="card-body">
                <h5 class="card-title">Author </h5>
                <div class="d-flex align-items-center justify-content-between pe-3">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-person"></i>
                    </div>
                    <div class="ps-3">
                        <h6><?=$authors?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End  Card -->
</div>

<!-- Top Selling -->
<div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="card-body pb-0">
                  <h5 class="card-title">Top Wiki <span>| View</span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">Title</th>
                        <th scope="col">View</th>
                        <th scope="col">Create Date</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($wikis as $wiki) { ?>
                               
                      <tr>
                        <th >#<?= $wiki->id ?></th>
                        <td><?= $wiki->title ?></td>
                        <td><?= $wiki->views ?></td>
                        <td><?= $wiki->create_date ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->
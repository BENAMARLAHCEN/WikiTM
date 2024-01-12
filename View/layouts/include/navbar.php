<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="/WikiTM" class="logo d-flex align-items-center">
            <img src="assets/img/LogoN.svg" alt="">
        </a>
    </div><!-- End Logo -->

    <div class="search-bar">
        <div class="d-flex gap-5 text-dark-emphasis">
            <a href="/WikiTM">Home</a>
            <a href="/WikiTM/#Tag">Tags</a>
            <a href="/WikiTM/#Wiki">Wiki</a>
        </div>
    </div><!-- End Search Bar -->




    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item d-block  d-md-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-list"></i>
                </a>
            </li><!-- End Search Icon-->
            <?php

            use App\core\Helper;
            use App\core\Session;

            if (Helper::hasrole(['guest'])) :
            ?>
                <div class="nav-item d-flex gap-2">
                    <a href="<?= BS_URI ?>/login" class="btn btn-outline-secondary">Login</a>
                    <a href="<?= BS_URI ?>/sinup" class="btn btn-secondary">Sinup</a>
                </div>
            <?php endif;
            if (Helper::hasrole(['admin', 'author'])) : ?>
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="assets/upload/user/<?= Session::get('image') ?>" alt="Profile" class="rounded-circle">
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?= Session::get('username') ?></h6>
                            <span><?= Session::get('email') ?></span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <?php
                        if (Helper::hasrole(['author'])) :
                        ?>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="/WikiTM/MyWiki">
                                    <i class="bi bi-gear"></i>
                                    <span>My Wiki</span>
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="/WikiTM/Profile">
                                    <i class="bi bi-person"></i>
                                    <span>My Profile</span>
                                </a>
                            </li>
                        <?php endif;
                        if (Helper::hasrole(['admin'])) : ?>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="/WikiTM/Dashboard">
                                    <i class="bi bi-gear"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                        <?php endif ?>


                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/WikiTM/logout">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->
            <?php endif ?>

        </ul>
    </nav><!-- End Icons Navigation -->

</header>
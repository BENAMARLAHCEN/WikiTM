<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <?php

        use App\core\Helper;

        if (Helper::hasrole(['admin'])) :
        ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="/WikiTM/Dashboard">
                    <i class="bi bi-graph-up-arrow"></i>
                    <span>Statistiques </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= BS_URI ?>/Category">
                    <i class="bi bi-grid"></i>
                    <span>Categories</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= BS_URI ?>/Tags">
                    <i class="bi bi-tags-fill"></i>
                    <span>Tags</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link collapsed" href="<?= BS_URI ?>/Wiki">
                    <i class="bi bi-file-post-fill"></i>
                    <span>Wiki Management</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link collapsed" href="<?= BS_URI ?>/Users">
                    <i class="bi bi-people-fill"></i>
                    <span>Users</span>
                </a>
            </li>
        <?php endif;
        if (Helper::hasrole(['author'])) : ?>

            <li class="nav-item ">
                <a class="nav-link <?php if ($URI[0] !== 'MyWiki') echo 'collapsed' ?>" href="<?= BS_URI ?>/MyWiki">
                    <i class="bi bi-file-post-fill"></i>
                    <span>My Wiki</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link <?php if ($URI[0] !== 'Profile') echo 'collapsed' ?>" href="<?= BS_URI ?>/Profile">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li>
        <?php endif ?>

    </ul>

</aside>
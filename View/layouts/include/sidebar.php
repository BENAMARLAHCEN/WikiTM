<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
        <a class="nav-link <?php if ($URI[0] !== 'Overview') echo 'collapsed' ?>" href="index.php">
            <i class="bi bi-graph-up-arrow"></i>
            <span>Statistiques </span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php if ($URI[0] !== 'Team') echo 'collapsed' ?>" href="<?=BS_URI?>/Team">
            <i class="bi bi-grid"></i>
            <span>Categories</span>
        </a>
    </li>   
    <li class="nav-item">
        <a class="nav-link <?php if ($URI[0] !== 'Match') echo 'collapsed' ?>" href="Match">
            <i class="bi bi-tags-fill"></i>
            <span>Tags</span>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link <?php if ($URI[0] !== 'User') echo 'collapsed' ?>" href="UserManager">
            <i class="bi bi-file-post-fill"></i>
            <span>Wiki Management</span>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link <?php if ($URI[0] !== 'User') echo 'collapsed' ?>" href="UserManager">
            <i class="bi bi-people-fill"></i>
            <span>Users</span>
        </a>
    </li>
</ul>

</aside>
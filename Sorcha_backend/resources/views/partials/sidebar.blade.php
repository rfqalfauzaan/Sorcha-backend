<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::is('dashboard/posts*')?'active':''}}" href="/shop">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Laundry
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::is('dashboard/posts*')?'active':''}}" href="/user">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    User
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::is('dashboard/posts*')?'active':''}}" href="/laundry">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Laundry Proggress
                </a>
        </ul>

    </div>
</nav>

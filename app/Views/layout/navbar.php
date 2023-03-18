<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    </ul>
    <ul class="navbar-nav navbar-right ml-auto">
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
        </li>
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
        </li>
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="<?= auth()->user()->avatar; ?>" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, <?= auth()->user()->first_name; ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Logged in 5 min ago</div>
                <a href="/profile" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="/log" class="dropdown-item has-icon">
                    <i class="fas fa-bolt"></i> Activities
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" id="logout" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
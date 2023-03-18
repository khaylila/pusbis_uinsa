<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/dashboard">
                <img src="/img/uinsa-logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top" />
                Pusbis UINSA
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/dashboard">
                <img src="/img/uinsa-logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top" />
            </a>
        </div>
        <ul class="sidebar-menu">
            <?php if (!canteen_setup_check()) : ?>
                <li class="<?= $sidebar[0] == 'dashboard' ? 'active' : ''; ?>"><a class="nav-link" href="/dashboard"><i class="fas fa-fire"></i> <span>Dasbor</span></a></li>
                <li class="menu-header">Kantin Area</li>
                <li class="dropdown <?= $sidebar[0] == 'canteen' ? 'active' : ''; ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-utensils"></i> <span>Kantin</span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (auth()->user()->inGroup('superadmin')) : ?>
                            <li class="<?= ($sidebar[0] == 'canteen' && $sidebar[1] == 'create') ? 'active' : ''; ?>"><a class="nav-link" href="/admin/canteen/create">Buat</a></li>
                            <li class="<?= ($sidebar[0] == 'canteen' && $sidebar[1] == 'list') ? 'active' : ''; ?>"><a class="nav-link" href="/admin/canteen">Daftar</a></li>
                        <?php else : ?>
                            <li class="<?= ($sidebar[0] == 'canteen' && $sidebar[1] == 'create') ? 'active' : ''; ?>"><a class="nav-link" href="/canteen/menu/create">Tambah Menu</a></li>
                            <li class="<?= ($sidebar[0] == 'canteen' && $sidebar[1] == 'list') ? 'active' : ''; ?>"><a class="nav-link" href="/canteen/menu">Daftar Menu</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php else : ?>
                <?php if (auth()->user()->inGroup('canteenseller')) : ?>
                    <li class="menu-header">Add On</li>
                    <li class="<?= $sidebar[0] == 'wizzard' ? 'active' : ''; ?>">
                        <a class="nav-link" href="/setup-wizzard"><i class="fas fa-gears"></i> <span>Setup Wizzard</span></a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
        </ul>
    </aside>
</div>
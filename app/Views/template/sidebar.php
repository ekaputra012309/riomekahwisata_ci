<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?=site_url('dashboard')?>"><span id="namasidebar">Stisla</span></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?=site_url('dashboard')?>"><span id="aliassidebar">St</span></a>
        </div>
        <ul class="sidebar-menu">
            <!-- <li class="menu-header">Dashboard</li> -->
            <li class="active"><a class="nav-link" href="<?=site_url('dashboard')?>"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>

            <li class="menu-header">Master</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-th-large"></i> <span>Master Data</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?=site_url('jamaah')?>">Jamaah</a></li>
                    <li><a class="nav-link" href="<?=site_url('paket')?>">Paket</a></li>
                </ul>
            </li>

            <li class="menu-header">Settings</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cogs"></i> <span>Features</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?=site_url('user')?>">Management Users</a></li>
                    <li><a class="nav-link" href="<?=site_url('about')?>">About</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
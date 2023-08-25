<?php
$session = \Config\Services::session();
?>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="<?= site_url('/') ?>" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <?php if (session('logged_in') && session('user_photo')) : ?>
                    <img alt="image" src="<?=site_url()?>uploads/<?= $_SESSION['user_photo']; ?>" class="rounded-circle mr-1 bg-white">
                    <div class="d-sm-none d-lg-inline-block">Hi, <?= $_SESSION['user_name']; ?></div>
                <?php else : ?>
                    <img alt="image" src="<?=site_url()?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1 bg-white">
                    <div class="d-sm-none d-lg-inline-block">Hi, <?= $_SESSION['user_name']; ?></div>
                <?php endif; ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <?= anchor('profile', '<i class="fas fa-user"></i> Profile', ['class' => 'dropdown-item has-icon']) ?>
                <?= anchor('about', '<i class="fas fa-cog"></i> Settings', ['class' => 'dropdown-item has-icon']) ?>

                <div class="dropdown-divider"></div>
                <?= anchor('auth/logout', '<i class="fas fa-sign-out-alt"></i> Logout', ['class' => 'dropdown-item has-icon text-danger']) ?>
            </div>
        </li>
    </ul>
</nav>
<div class="navbar-bg"></div>

<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
        <div class="search-element">

        <div class="search-backdrop"></div>

        </div>
    </form>
    <ul class="navbar-nav navbar-right">

        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
    
        <div class="d-sm-none d-lg-inline-block">Olá, <?= session("userInfo")->usr_nome; ?></div></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a href="features-profile.html" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile
            </a>
            <a href="features-activities.html" class="dropdown-item has-icon">
            <i class="fas fa-bolt"></i> Activities
            </a>
            <a href="features-settings.html" class="dropdown-item has-icon">
            <i class="fas fa-cog"></i> Settings
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?= route_to('back.logOut')?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Sair
            </a>
        </div>
        </li>
    </ul>
</nav>
<nav class="main-header navbar navbar-expand navbar-warning" id="mainNavbar">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars" style="color: #fff;"></i>
            </a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link" style="color: #fff;">
                Home
            </a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#" id="themeToggle" style="color: #fff;">
            <i class="fas fa-sun"></i>
        </a>
       </li>

        <li class="nav-item">
            <a style="color: #fff;" class="nav-link" href="#">
                <?= session()->get('email') ?> 
                <i class="far fa-user-circle" style="color: #fff; margin-left: 5px;"></i>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/logout') ?>" style="color: #fff;">
                Logout <i class="fa fa-sign-out-alt fa-fw"></i>
            </a>
        </li>
    </ul>
</nav>

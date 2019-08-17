<header class="header">
    <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow"><a href="#" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead"><i class="fas fa-align-left"></i></a><a href="index.php" class="navbar-brand font-weight-bold text-uppercase text-base">Dashboard</a>
    <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
        <li class="nav-item">
        <form id="searchForm" class="ml-auto d-none d-lg-block">
            <div class="form-group position-relative mb-0">
            <button type="submit" style="top: -3px; left: 0;" class="position-absolute bg-white border-0 p-0"><i class="o-search-magnify-1 text-gray text-lg"></i></button>
            <input type="search" name="search" placeholder="Search ..." class="form-control form-control-sm border-0 no-shadow pl-4">
            </div>
        </form>
        </li>
        <?php if(isset($_SESSION['login_user'])) { ?>
        <li class="nav-item dropdown ml-auto"><a id="userInfo" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><img src="img/avatar-6.jpg" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></a>
            <div aria-labelledby="userInfo" class="dropdown-menu"><a href="#" class="dropdown-item"><strong class="d-block text-uppercase headings-font-family"><?=$_SESSION['login_user']?></strong><small><?=$_SESSION['login_email']?></small></a>
            <div class="dropdown-divider"></div><a href="login.php" class="dropdown-item">Logout</a>
            </div>
        </li>
        <?php } ?>
    </ul>
    </nav>
</header>
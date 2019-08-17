<div id="sidebar" class="sidebar py-3 shrink show">
    <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">
        MAIN
    </div>
    <ul class="sidebar-menu list-unstyled">
            <li class="sidebar-list-item"><a href="index.php" class="sidebar-link text-muted"><i class="o-home-1 mr-3 text-gray"></i><span>Home</span></a></li>
            <?php if(!isset($_SESSION['login_user'])) { ?>
            <li class="sidebar-list-item"><a href="login.php" class="sidebar-link text-muted"><i class="o-exit-1 mr-3 text-gray"></i><span>Login</span></a></li>
            <li class="sidebar-list-item"><a href="sign-up.php" class="sidebar-link text-muted"><i class="o-paperwork-1 mr-3 text-gray"></i><span>Signup</span></a></li>
            <?php } ?>
    </ul>
</div>
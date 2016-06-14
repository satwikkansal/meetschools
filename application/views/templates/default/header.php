<?php
global $CI;
global $session;
$role = $session->role();
?>

<!--=== Header ===-->
<div class="header">
    <div class="container">
        <!-- Logo -->
        <a class="logo" href="/">
            <img src="/static/img/logo.png" alt="Logo" style="height: 90px;">
        </a>
        <!-- End Logo -->



        <!-- Toggle get grouped for better mobile display -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="fa fa-bars"></span>
        </button>
        <!-- End Toggle -->
    </div><!--/end container-->

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
        <div class="container">
            <ul class="nav navbar-nav">
                <!-- Home -->
                <li class="dropdown active">
                    <a href="/">
                        Home
                    </a>

                </li>
                 <!-- Pages -->
                <li class="dropdown">
                    <a href="/school/search">
                        Schools
                    </a>

                </li>
                <!-- End Pages -->
                <!-- End Home -->
                <?php if (!$user->isGuest) { ?>
                    <li><a href="<?= $role->dashboard_url() ?>">Dashboard</a></li>
                    <li><a href="/logout">Logout</a></li>
                <?php } else {?>
                

                <!-- Blog -->
                <li>
                    <a href="/login">
                        Login
                    </a>

                </li>
                <!-- End Blog -->

                <?php }
                ?>

               
            </ul>
        </div><!--/end container-->
    </div><!--/navbar-collapse-->
</div>
<!--=== End Header ===-->
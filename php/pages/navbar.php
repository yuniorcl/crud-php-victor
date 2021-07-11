<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./"><b><?php echo SITE_NAME ?></b></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li><a href="./about-us.php" <?php echo ($currentPage == "about-us") ? ' class="current-page-item"' : '' ?> >Nosotros</a></li>
                <li><a href="./category.php" <?php echo ($currentPage == "category") ? ' class="current-page-item"' : '' ?>>Categorías</a></li>
                <li><a href="./ver.php" <?php echo ($currentPage == "category") ? ' class="current-page-item"' : '' ?>>Empleados</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>
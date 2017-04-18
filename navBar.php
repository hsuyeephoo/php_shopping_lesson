<nav class="navbar navbar-default navbar-primary navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/" id="myHeader"><span class="glyphicon glyphicon-shopping-cart" ></span> Shopping System</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
            <li><a href="/cartDetail"><span id="cartInfo"></span></a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php session_start(); if($_SESSION['login']) { ?>
                    <li><a href="/dashboard"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                    <li><a href="/categories"><span class="glyphicon glyphicon-list-alt"></span> Categories</a></li>
                    <li><a href="/orders"><span class="glyphicon glyphicon-sort-by-order"></span> Orders</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['userName'] ?>
                    <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" id="btnLogout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>


                        </ul>
                    </li>

                <?php } else { ?>
                <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <li><a href="/register"><span class="glyphicon glyphicon-registration-mark"></span> Register</a></li>
                <?php } ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
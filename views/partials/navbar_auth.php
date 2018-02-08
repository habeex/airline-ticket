<ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["logged"]; ?> </a>

        <ul class="dropdown-menu" role="menu">
            <li><a href="#">Bookings</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span>  Checkout</a></li>
        </ul>
    </li>

  	<li><a href="/auth/logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>

</ul>
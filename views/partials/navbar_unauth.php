<ul class="nav navbar-nav navbar-right">
  <li><a href="airline-ticket/views/users/create.php"><span class="glyphicon glyphicon-user"></span>Register Now</a></li>
  <li class="dropdown" id="menuLogin">
    <a class="dropdown-toggle" href="#" role="button" aria-expanded="false" data-toggle="dropdown" id="navLogin"><span class="glyphicon glyphicon-log-in"></span> Login<strong class="caret"></strong></a>
    <div class="dropdown-menu" style="padding: 17px; padding-bottom: 4px;">
      <form class="form" id="formLogin" method="POST" action="/auth/login.php" accept-charset="UTF-8">
        <input type="hidden" name="ac" value="log">
        <div class="form-group">
          <label for="input-username">Email</label>
          <input class="form-control" style="margin-bottom: 15px;" type="text" placeholder="something@abc.com" id="input-username" name="email">
        </div>
        <div class="form-group">
          <label for="input-password">Password</label>
          <input class="form-control" style="margin-bottom: 15px;" type="password" placeholder="Password" id="input-password" name="password">
        </div>
        <input class="btn btn-primary btn-block" type="submit" id="btnLogin" value="Login">
      </form>
    </div>
  </li>
</ul>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">
        <img alt="Brand" class="logo" src="airline-ticket/views/images/logo.png">
      </a>
      <a class="navbar-brand" href="airline-ticket/index.php">
        Discount Airlines
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="/views/users/profile.php">Profile</a></li>
        <?php
          if(isset($_SESSION["admin"])){
            if($_SESSION["admin"] == 1){
              include 'navbar_admin.php';
            }
          }
        ?>
      </ul>

      <?php
      if(isset($_SESSION["logged"])){
          include 'navbar_auth.php';
      }
      else{
          include 'navbar_unauth.php';
      }
      ?>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<script>
  $(document).ready(function(){
    //Handles menu drop down
    $('.dropdown-menu').find('form').click(function (e) {
        e.stopPropagation();
    });

    $.ajax()
  });
</script>
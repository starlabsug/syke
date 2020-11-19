
<?php
session_start();

$firstname = $_SESSION['firstnameTeam'];
$lastname = $_SESSION['lastnameTeam'];
$email = $_SESSION['emailTeam'];
$photo = $_SESSION['photoTeam'];
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SYKE World Administration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css" media="screen,projection" />
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="black white-text">
  <?php include('nav.php'); ?>
    <div class="row grey darken-4">
      <div class="col l2 s12 hide-on-med-and-small black numbers">
        <div class="row">
          <h4 class="white-text hide-on-med-and-down"><i class="small material-icons red-text">dashboard</i> Dashboard</h4>
        </div>
        <nav class="black">
        <div class="nav-wrapper black">
          <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          <ul class="left hide-on-med-and-down">
            <li title="Administrators"><a href="Admin.php"><img src="admin.png" class="responsive-img"> Administrators</a></li><br>
            <li title="Employees"><a href="Employees.php"><img src="employees.png" class="responsive-img"> Employees</a></li><br>
            <li title="Your guests"><a href="Guests.php"><img src="guests.png" class="responsive-img"> Guests</a></li><br>
            <li title="Bookings"><a href="Bookings.php"><img src="bookings.png" class="responsive-img"> Bookings</a></li><br>
            <li title="newsletters"><a href="Newsletters.php"><img src="newsletters.png" class="responsive-img"> Newsletters</a></li><br>
            <li title="comments"><a href="Comments.php"><img src="comments.svg" class="responsive-img"> Comments</a></li><br>
            <li title="Rooms"><a href="Rooms.php"><img src="comments.svg" class="responsive-img"> Rooms</a></li><br>

          </ul>

        </div>
        </nav>

        <ul class="sidenav" id="mobile-demo">
          <li><a href="Admin.php">Administrators</a></li>
          <li><a href="Employees.php">Employees</a></li>
          <li><a href="Guests.php">Guests</a></li>
          <li><a href="Bookings.php">Bookings</a></li>
          <li><a href="Newsletters.php">Newsletters</a></li>
          <li><a href="Comments.php">Comments</a></li>
          <li><a href="Rooms.php">Rooms</a></li>
        </ul>

      </div>

      <div class="col l10 s12 hide-on-med-and-small">

        <div class="row center grey darken-4">
          <h2 class="white-text">SYKE World Hotel</h2>
          <div class="row black white-text s numbers main">
            <div class="col l6 s12">
              <i class="medium material-icons red-text">person</i><h4 class="orange-text">Admin Page</h4>
              <p>Welcome to the Admin Page. <br>Here you can manage all tables and transactions and as an Administrator, explore all your priveledges and exercise them. </p>
            </div>
            <div class="col l6 s12">
              <i class="medium material-icons red-text">insert_emoticon</i><h4 class="orange-text">Get Started</h4>
              <p>To get started, use the nav menu on the left to manage all your records.</p>
            </div>
            <div class="row">

            </div>
            <div class="row">
              <div class="col l4 s12 blue white-text">
                <div class="row">
                  <a class="btn-floating btn-large waves-effect waves-light blue white-text"><?php echo $_SESSION['countadmin']; ?></a>
                  <i class="material-icons medium circle">person</i>
                </div>
                <div class="row blue">
                  <a class="btn blue">Administrators</a>
                </div>
              </div>
              <div class="col l4 s12 white black-text">
                <a class="btn-floating btn-large waves-effect waves-light white black-text"><?php echo $_SESSION['countemployee']; ?></a>
                <i class="material-icons medium">people_outline</i>
                <div class="row white">
                  <a class="btn white black-text">Employees</a>
                </div>
              </div>
              <div class="col l4 s12 orange white-text">
                <a class="btn-floating btn-large waves-effect waves-light orange"><?php echo $_SESSION['countguest']; ?></a>
                <i class="material-icons medium">people</i>
                <div class="row orange">
                  <a class="btn orange">Guests</a>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>

    <!--create modal login-->
    <div class="loggging modal">
      <div class="row grey darken-4 white-text numbers">
        <h4 class="orange-text">Login</h4>
        <form class="white-text col l4 s12" action="login.php" method="post">
          <div class="form-group">
            <label for="username">username</label> <br>
            <input type="text" name="username" value="" placeholder="username">
          </div>
          <div class="form-group">
            <label for="password">password</label> <br>
            <input type="text" name="password" value="" placeholder="password">
          </div>
          <button type="submit" name="button" class="btn black number">Login</button>
        </form>
      </div>
    </div>

    <div class="grey darken-4 grey-text center">
      <div class="grey-text black">
        <i class="small material-icons orange-text">phone</i> Phone: 0772971878 | 0756443353
        <i class="small material-icons orange-text">email</i> Email: personal@gmail.com
      </div>
      <p>&copy;Copyright@2020SYKEWorldHotel Inc. Management.</p>
    </div>
  </body>
  <script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.sidenav');
  var instances = M.Sidenav.init(elems, options);
});

// Or with jQuery

$(document).ready(function(){
  $('.sidenav').sidenav();
  $(".dropdown-trigger").dropdown();
});
  </script>
</html>

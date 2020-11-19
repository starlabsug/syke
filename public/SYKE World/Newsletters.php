<?php
require('../config/config.php');
require('../config/db.php');
//initialize the session
session_start();
$count = 0;
$firstname = $_SESSION['firstnameTeam'];
$email = $_SESSION['emailTeam'];
$photo = $_SESSION['photoTeam'];
$lastname = $_SESSION['lastnameTeam'];
//prepare a select query to fetch all admins from the db
$quer = "SELECT * FROM newsletters";
$result = $conn->query($quer);

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
    <div class="row grey darken-4 numbers">
      <div class="col l3 s12 hide-on-med-and-small black numbers">
        <div class="row">
          <a href="Administration.php"><h4 class="white-text hide-on-med-and-down"><i class="small material-icons red-text">dashboard</i> Dashboard</h4></a>
        </div>
        <nav class="black">
        <div class="nav-wrapper black">
          <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          <ul class="left hide-on-med-and-down">
            <li title="Administrators"><a href="Admin.php"><img src="admin.png" class="responsive-img"> Administrators</a></li><br>
            <li title="Employees"><a href="Employees.php"><img src="employees.png" class="responsive-img"> Employees</a></li><br>
            <li title="Your guests"><a href="Guests.php"><img src="guests.png" class="responsive-img"> Guests</a></li><br>
            <li title="Bookings"><a href="Bookings.php"><img src="bookings.png" class="responsive-img"> Bookings</a></li><br>
            <li title="newsletters" class="active orange"><a href="Newsletters.php"><img src="newsletters.png" class="responsive-img"> Newsletters</a></li><br>
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
          <li class="active"><a href="Newsletters.php">Newsletters</a></li>
          <li><a href="Comments.php">Comments</a></li>
          <li><a href="Rooms.php">Rooms</a></li>
        </ul>

      </div>

      <div class="col l9 s12 hide-on-med-and-small">

        <div class="row center black white-text numbers s">
          <h2 class="white-text">SYKE World Hotel</h2>
          <div class="row black white-text numbers main">
          <h4 class="orange-text"><i class="small material-icons blue-text">email</i> Newsletters</h4>
            <p class="white-text">See your newsletter subscriptions, add new, modify and manage.</p>

                 <table class="stripped grey darken-4 white-text">
                  <thead>
                    <tr class="orange-text">
                        <th>email</th>
                        <th>Date subscribed</th>
                        <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php if ($result->num_rows>0) {
                     while ($row = $result->fetch_assoc()) { $count = $count + 1; ?>
                    <tr>
                      <td>	<?php
                      	echo $row["email"];
                      	 ?></td>
                      <td><?php
                    	echo $row["createdAt"];
                    	 ?></td>
                       <td><a href="delete3.php?id=<?php echo $row["id"]; ?>">
                         <button type="submit" name="submit" class="btn black white-text">Delete</button></a>
                       </td>
                    </tr>
                    <?php }} ?>
                  </tbody>
                </table>
              <div class="black white-text">
                <?php echo "Number of Subscriptions: ".$count; ?>
              </div>
          </div>
        </div>
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

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
  <body class="orange white-text">
    <!--<a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>-->
    <div class="row white-text grey darken-4">
      <div class="col l4 s12 black numbers center">
        <h4 class="orange-text text-lighten-1"><i class="small material-icons left blue-text">folder_shared</i> Admin Profile</h4>
        <p>You are signed in as an Administrator of SYKE World Hotel to the HomePage!</p><p class="hide-on-large-only center">Profile</p>
      </div>
      <div class="col l5 s12 white-text orange profile numbers">
        <p><i class="material-icons black-text">info</i> Below is your Admin profile! if it is not you? Report below</p>
        <div class="col l4 s12">
          photo
        </div>
        <div class="col l4 s12">
          Admin1
        </div>
        <div class="col l4 s12">
          Name
        </div>
        <button type="button" name="button" class="btn right black darken-3" title="Reports a wrong profile setting">Report</button>
      </div>
      <div class="col l3 s12">
        <p>As an administrator, always remember to <span style="color:red">Logout</span> for <span style="color:aqua">security</span> purposes and donot share your credentials</p>
        <a class="btn-floating btn-large pulse red"><i class="material-icons">lock</i></a><button type="button" name="button" class="btn right orange" title="Click to LogOut">LogOut</button>
      </div>
    </div>
    <div class="row grey darken-4 numbers">
      <div class="col l3 s12 hide-on-med-and-small black numbers">
        <div class="row">
          <h4 class="white-text hide-on-med-and-down"><i class="small material-icons red-text">dashboard</i> Dashboard</h4>
        </div>
        <nav class="black">
        <div class="nav-wrapper black">
          <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          <ul class="left hide-on-med-and-down">
            <li title="Administrators"><a href="Admin.html" onclick="M.toast({html: 'Redirecting you, please wait'})"><img src="admin.png" class="responsive-img"> Administrators</a></li><br>
            <li title="Employees"><a href="Employees.html"><img src="employees.png" class="responsive-img"> Employees</a></li><br>
            <li title="Your guests"><a href="Guests.html"><img src="guests.png" class="responsive-img"> Guests</a></li><br>
            <li title="Bookings"><a href="Bookings.html"><img src="bookings.png" class="responsive-img"> Bookings</a></li><br>
            <li title="newsletters"><a href="Newsletters.html"><img src="newsletters.png" class="responsive-img"> Newsletters</a></li><br>
            <li title="comments"><a href="Comments.html"><img src="comments.svg" class="responsive-img"> Comments</a></li><br>

          </ul>

        </div>
        </nav>

        <ul class="sidenav" id="mobile-demo">
          <li><a href="Admin.html">Administrators</a></li>
          <li><a href="Employees.html">Employees</a></li>
          <li><a href="Guests.html">Guests</a></li>
          <li><a href="Bookings.html">Bookings</a></li>
          <li><a href="Newsletters.html">Newsletters</a></li>
          <li><a href="Comments.html">Comments</a></li>
        </ul>

      </div>

      <div class="col l9 s12 hide-on-med-and-small">

        <div class="row center orange numbers">
          <h2 class="black-text">SYKE World Hotel Mgt.</h2>
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
                <h4>10</h4>
                <i class="material-icons medium circle">person</i>
                <p>Administrators</p>
              </div>
              <div class="col l4 s12 white black-text">
                <h4>10</h4>
                <i class="material-icons medium">people_outline</i>
                <p>Employees</p>
              </div>
              <div class="col l4 s12 orange darken-3 white-text">
                <h4>10</h4>
                <i class="material-icons medium">people</i>
                <p>Guests</p>
              </div>
            </div>
            <div class="row">
              <i class="medium material-icons red-text">insert_chart</i>   <i class="medium material-icons blue-text">pie_chart</i><h4 class="orange-text">Plain VIsuals</h4>
              <p>See your progress Every single day.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Trigger -->

    <div id="modal1" class="modal black">
      <div class=" modal-content black">
        <div class="row grey darken-4 white-text numbers">
          <h4 class="orange-text center">Login</h4>
          <form class="white-text loginForm">
            <div class="form-group">
              <i class="small material-icons grey-text">person</i>
              <input type="text" name="username" value="" placeholder="username" >
            </div>
            <div class="form-group">
              <i class="small material-icons grey-text">lock</i>
              <input type="text" name="password" value="" placeholder="password" >
            </div>
            <button type="submit" name="button" class="log modal-close btn orange">Login</button>
          </form>
        </div>
      </div>
    </div>
    <!--create modal login-->


    <footer class="black white-text center">
      <div class="white-text">
        <i class="small material-icons orange-text">phone</i> Phone: 0772971878 | 0756443353
        <i class="small material-icons orange-text">email</i> Email: personal@gmail.com
      </div>
      <p>&copy;Copyright@2020SYKEWorldHotel Inc. Management.</p>
    </footer>
    <script type="text/javascript" src="jquery-3.3.1/dist/jquery.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.js"></script>
  </body>
  <script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.tooltipped');
    var instances = M.Tooltip.init(elems, options);
    var instances = M.Modal.init(elems, options);
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, options);

  });
  // Or with jQuery
    $('.tooltipped').tooltip();
    $('.sidenav').sidenav();
    $(".dropdown-trigger").dropdown();
  });
  $(document).ready(function(){
    $('.modal').modal({
      dismissible: false
    });
    $('.modal').modal('open');
  })
  </script>
</html>

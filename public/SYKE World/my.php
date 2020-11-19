<?php
//creating unique IDs with prefixes
//define the constant for guests eg GST
define("GST", "GST", );
$a = uniqid(GST);

//with a longer ID
$b = uniqid(GST, true);

//with a random number prefix
$c = uniqid(rand(), true);

//nl2br for new lines printing
echo nl2br("IDs generation in php \n $a; \n $b; \n $c;");

//login
//start the session
session_start();

//check connection to the db
require 'config.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User Authentication</title>
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
  <body>
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
      <div class="col l4 s12">
        <h4>Sign Up</h4>
        <form class="black-text" action="login.php" method="post">
          <div class="form-group">
            <label for="username">username</label> <br>
            <input type="text" name="username" value="" placeholder="username">
          </div>
          <div class="form-group">
            <label for="password">password</label> <br>
            <input type="text" name="password" value="" placeholder="password">
          </div>
          <div class="form-group">
            <label for="confirm_password">confirm password</label> <br>
            <input type="text" name="confirm_password" value="" placeholder="confirm_password">
          </div>
          <button type="submit" name="button" class="btn black number">Sign Up</button>
        </form>
      </div>
    </div>
  </body>
</html>

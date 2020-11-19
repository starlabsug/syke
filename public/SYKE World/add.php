<?php
require('../config/config.php');
require('../config/db.php');
//initialize the session
session_start();
$count = 0;
$firstname = $_SESSION['firstnameTeam'];
$email = $_SESSION['emailTeam'];
$photo = $_SESSION['photoTeam'];
//prepare a select query to fetch all admins from the db
$quer = "SELECT * FROM team";
$result = $conn->query($quer);

$firstname = $lastname = $email = $phonenumber = $photo = $password ="";
$firstnameErr = $lastnameErr = $emailErr = $phonenumberErr = $photoErr = $passwordErr ="";
$errorA = [];

//create query
$query1 = "SELECT email FROM users";

//Get result
$result = mysqli_query($conn, $query1);

//fetch data
$emails = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free result
mysqli_free_result($result);
    
    // submit
    if(isset($_POST['submit'])) {
        if(empty($_POST['firstname'])) {
            $firstnameErr = "Firstname is required";
            $errorA[] = $firstnameErr;
        } else {
            $firstnameErr = "";
            $firstname = test_input($_POST['firstname']);
            unset($errorA['$firstnameErr']);
        }

        if(empty($_POST['lastname'])) {
            $lastnameErr = "Lastname is required";
            $errorA[] = $lastnameErr;
        } else {
            $lastnameErr = "";
            unset($errorA['$lastnameErr']);
            $lastname = test_input($_POST['lastname']);
        }

        if(empty($_POST['email'])) {
            $emailErr = "Email is required";
            $errorA[] = $emailErr;
        } else {
            // check if e-mail address is well-formed
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format"; 
            } else {
                foreach ($emails as $emailA) {
                    if($emailA['email'] === $_POST['email']) {
                        $emailErr = "Email already exists";
                        $errorA[] = $emailErr;
                    } else {
                        $email = test_input($_POST['email']);
                        // $emailErr = "";
                        unset($errorA['$emailErr']);
                    }
                    
                }
                
            }
        }
        if(empty($_FILES['photo'])) {
            $photoErr = "Image is required";
            $errorA[] = $photoErr;
        } else {
            $photoErr= "";
            unset($errorA['$photoErr']);
            $photo = $_FILES['photo']['name'];
            $tempname = $_FILES['photo']['tmp_name'];

            $folder = "image/".$photo;

            //Now lets move the uploaded image into the folder: image
            if(move_uploaded_file($tempname, $folder)) {
                $msg = "Image uploaded successfully";
            } else {
                $msg = "Failed to upload image";
            }
        }

        if(empty($_POST['phonenumber'])) {
            $phonenumberErr = "Phone number is required";
            $errorA[] = $phonenumberErr;
        } else {
            unset($errorA['$phonenumberErr']);
            $phonenumber = test_input($_POST['phonenumber']);
            $phonenumberErr="";
        }

        if(empty($_POST['password'])) {
            $passwordErr = "Password is required";
            $errorA[] = $passwordErr;
        } else {
            unset($errorA['$passwordErr']);
            $password = test_input($_POST['password']);
            $passwordrErr="";
        }

        if(count($errorA) == 0) {
            $query = "INSERT INTO users(firstname, lastname, email, phonenumber, photo, password) VALUES('$firstname','$lastname','$email','$phonenumber','$photo','$password')";

            if(mysqli_query($conn, $query)) {
                header("Location: Admin.php");
            } else {
                echo 'ERROR: '.mysqli_error($conn);
            }
        }
    }

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
return $data;
}
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
  <body class="orange white-text">
<div class="row black"></div>
      <h2 class="black white-text center">Users.</h2>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
          <h4>Users' form</h4>
          <div class="form-group">
            <input type="text" name="firstname" id="firstname" class="white-text">
            <p class="red-text"><?php echo $firstnameErr; ?></p>
          </div>
          <div class="form-group">
            <input type="text" name="lastname" id="lastname" class="white-text">
            <p class="red-text"><?php echo $lastnameErr; ?></p>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="white-text" id="loginEmail">
            <p class="red-text"><?php echo $emailErr; ?></p>
          </div>
          <div class="form-group">
            <input type="password" name="password" class="white-text" id="psd">
            <p class="red-text"><?php echo $passwordErr; ?></p>
          </div>
          <div class="form-group">
            <input type="text" name="phonenumber" id="pnumber" class="white-text">
            <p class="red-text"><?php echo $phonenumberErr; ?></p>
          </div>
          <div class="file-field input-field">
            <div class="btn black">
              <i class="small material-icons white-text">add_a_photo</i>
              <input type="file"name="photo" value=""  class="white-text">
              <p class="red-text"><?php echo $photoErr; ?></p>
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text">
            </div>
          </div>
          <p>Select the type of user</p>
          <label>
            <input type="radio" name="type" required/>
            <span>Admin</span>
          </label>
          <label>
            <input type="radio" name="type" required/>
            <span>Employee</span>
          </label>
          <label>
            <input type="radio" name="type" required/>
            <span>Guest</span>
          </label> <br>
          <button type="submit" name="submit" class="btn orange darken-4 number">Sign Up</button>
          <button type="submit" name="submit" class="btn grey darken-4 number">Update</button>
        </form>
        <div class="col l6 center">
          <i class="medium material-icons blue-text">person_add</i>
          <h5 class="orange-text">Add or update fields here!</h5>
          <p>Add an administrator, Employee or new Guest and updates plus any other changes to the user credentials can be processed here.</p>
        </div>
        <footer class="black white-text center">
      <div class="white-text">
        <i class="small material-icons orange-text">phone</i> Phone: 0772971878 | 0756443353
        <i class="small material-icons orange-text">email</i> Email: personal@gmail.com
      </div>
      <p>&copy;Copyright@2020SYKEWorldHotel Inc. Management.</p>
    </footer>
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
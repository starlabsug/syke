<?php
    require('config/config.php');
    require('config/db.php');

    $firstname = $lastname = $email = $phonenumber = $photo = $password = $type ="";
    $firstnameErr = $lastnameErr = $emailErr = $phonenumberErr = $photoErr = $passwordErr = $typeErr="";
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

            if(empty($_POST['type'])) {
                $typeErr = "type is required";
                $errorA[] = $typeErr;
            } else {
                $typeErr = "";
                unset($errorA['$typeErr']);
                $type = test_input($_POST['type']);
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
                $query = "INSERT INTO team(firstname, lastname, email, phonenumber, photo, password, type) VALUES('$firstname','$lastname','$email','$phonenumber','$photo','$password','$type')";

                if(mysqli_query($conn, $query)) {
                    var_dump($type);
                    header("Location: Administration.php");
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

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syke World</title>

    <!-- cdn importation -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/12c18de3e7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/">

    <!-- materialise cdn -->
    <link rel="stylesheet" href="plugins/materialise/css/materialize.css">
    <link rel="stylesheet" href="plugins/materialise/css/materialize.min.css">

    <!-- css links -->
    <link rel="stylesheet" href="css/account.css">
    <link rel="stylesheet" href="css/main.css">

</head>

<body>
    <?php include('inc/nav2.php');?>

    <!-- content -->
    <div class="content">
        <div class="container">
            <!-- login form -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                <div class="formImg center">
                    <img src="images/icons/user.svg" class="center" height="100px" width="100px" alt="" srcset="">
                    <h2 class="white-text">Sign Up</h2>
                </div>
                <div class="row">
                    <div class="input-field col s12 l6 m6">
                        <i class="material-icons prefix orange-text text-darken-4">person</i>
                        <label for="firstname">Firstname</label>
                        <input type="text" name="firstname" id="firstname" class="white-text">
                        <p class="red-text"><?php echo $firstnameErr; ?></p>
                    </div>
                    <div class="input-field col s12 l6 m6">
                        <i class="material-icons prefix orange-text text-darken-4">person</i>
                        <label for="secondname">Lastname</label>
                        <input type="text" name="lastname" id="lastname" class="white-text">
                        <p class="red-text"><?php echo $lastnameErr; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 l6 m6">
                        <input type="file" name="photo" value=""  class="white-text">
                        <!-- <div class="btn orange darken-4">
                            <span>Upload</span>
                            <input type="file" name="photo">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate white-text" type="text" placeholder="Upload profile photo">
                        </div> -->
                        <p class="red-text"><?php echo $photoErr; ?></p>
                    </div>

                    <div class="input-field col s12 l6 m6">
                        <i class="material-icons prefix orange-text text-darken-4">phone</i>
                        <label for="pnumber">Phone number</label>
                        <input type="text" name="phonenumber" id="pnumber" class="white-text">
                        <p class="red-text"><?php echo $phonenumberErr; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 l12 m12">
                        <i class="material-icons prefix orange-text text-darken-4">email</i>
                        <label for="email">Email</label>
                        <input type="email" name="email" class="white-text" id="loginEmail">
                        <p class="red-text"><?php echo $emailErr; ?></p>
                    </div>
                    <div class="input-field col s12 l12 m12">
                        <i class="material-icons prefix orange-text text-darken-4">lock</i>
                        <label for="psd">Password</label>
                        <input type="password" name="password" class="white-text" id="psd">
                        <p class="red-text"><?php echo $passwordErr; ?></p>
                    </div>
                    <p>
                    <label>
                        <input type="checkbox" class="filled-in" name="type" id="type" value="admin">
                        <span>admin</span>
                        <p class="red-text"><?php echo $typeErr; ?></p>
                    </label>
                </p>
                <p>
                    <label>
                        <input type="checkbox" class="filled-in" name="type" id="type" value="employee">
                        <span>employee</span>
                        <p class="red-text"><?php echo $typeErr; ?></p>
                    </label>
                </p>
                </div>
                <div class="input-field">
                    <input type="submit" value="Sign up" name="submit" class="btn orange darken-4">
                </div>
                <!-- <a class="btn orange darken-4" type="submit">Sign Up</a> -->
            </form>
            <!-- end of login -->
        </div>
    </div>
    <!-- end of content -->

    <?php include('inc/footer1.php');?>

    <!-- jquery importation -->
    <script src="plugins/jquery-3.4.1/dist/jquery.min.js"></script>

    <!-- materialise importation -->
    <script src="plugins/materialise/js/materialize.js"></script>
    <script src="plugins/materialise/js/materialize.min.js"></script>

    <script>
        $(document).ready(function() {
            // initializing sidenav
            $('.sidenav').sidenav();

        });
    </script>

</body>

</html>
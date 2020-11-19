<?php
    require('config/config.php');
    require('config/db.php');

    $email = $password = "";
    $emailErr = $passwordErr = $emailErr2 = $passwordErr2 = $err = $hashed_password = $userFound = $passwordVerified = "";
    $firstname = $lastname = $email = $photo = "";
    $loggedin = [];

    if(isset($_POST['submit'])) {
        if(empty($_POST['email'])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format"; 
            }
        }

        if(empty($_POST['password'])) {
            $passwordErr = "Password is required";   
        } else{
            $password = test_input($_POST['password']);
        }


        //create query
        $query = "SELECT * FROM users WHERE email='$email'";

        //Get result
        $result = mysqli_query($conn, $query);

        // Count rows
        // $count = mysql_num_rows($result);

        //fetch data
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

        //free result
        mysqli_free_result($result);

        if(count($users) === 1) {
            $userFound = true;
            foreach ($users as $user) {
                $firstname = $user['firstname'];
                $lastname = $user['lastname'];
                $phonenumber = $user['phonenumber'];
                $email = $user['email'];
                $photo = $user['photo'];
                $userid = $user['userid'];
                $hashed_password = $user['password'];
                // var_dump($user);
            }
        } else {
            $emailErr2 = "Email incorrect";
        }

        if($userFound === true) {
            if(password_verify($password, $hashed_password)) {
                $passwordVerified = true;
            } else{
                $passwordErr2 = "Password incorrect";
            }
        }

        if($userFound === true && $passwordVerified === true) {

            //Start session
            session_name('user');
            session_start();
            // var_dump($users);
            $_SESSION['loggedin'] = true;
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['email'] = $email;
            $_SESSION['photo'] = $photo;
            

            $sql = "INSERT INTO loggedin(userid) VALUES ('$userid')";

            if(mysqli_query($conn, $sql)) {
                header('Location: '.ROOT_URL.'');
                //Close connection
                mysqli_close($conn);
            } else {
                $err = 'ERROR: '.mysqli_error($conn);
            }
        }

    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    return $data;
    }

    // foreach ($users as $user) {
    //     if(isset($_POST['email']) && isset($_POST['password'])) {
    //         if($_POST['email'] === $user['email'] && $_POST['password'] === ) {
                
    //         } else {
    //             echo 'Login Failed';
    //         }
    //     }
    // }
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

        <!-- Owl carousel importation -->
        <link rel="stylesheet" href="plugins/OwlCarousel2-develop/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="plugins/OwlCarousel2-develop/dist/assets/owl.theme.default.min.css">

    </head>

    <body>
    <?php include('inc/nav2.php');?>

        <!-- content -->
        <div class="content">
            <div class="container">
                <!-- login form -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="formImg center">
                        <img src="images/icons/user.svg" class="center" height="100px" width="100px" alt="" srcset="">
                        <h2 class="white-text">Login</h2>
                    </div>
                    <p class="red-text"><?php echo $emailErr;?></p>
                    <p class="red-text"><?php echo $emailErr2;?></p>
                    <div class="input-field">
                        <i class="material-icons prefix orange-text text-darken-4">email</i>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="loginEmail" class="white-text">
                    </div>
                    <p class="red-text"><?php echo $passwordErr;?></p>
                    <p class="red-text"><?php echo $passwordErr2;?></p>
                    <div class="input-field">
                        <i class="material-icons prefix orange-text text-darken-4">lock</i>
                        <label for="psd">Password</label>
                        <input type="password" name="password" id="psd" class="white-text">
                    </div>
                    <span>
                    <p class="white-text">Dont have an account <a href="<?php echo htmlspecialchars(ROOT_URL); ?>signup.php" class="white-text orange-text text-darken-4"> Register</a></p>
                </span>

                    <div class="input-field">
                        <input type="submit" value="Login" name="submit" class="btn orange darken-4">
                    </div>
                    <!-- <a class="btn orange darken-4">Sign Up</a> -->
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
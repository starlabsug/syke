<?php
    require('config/config.php');
    require('config/db.php');
    
    //Define variables and set them to empty fields
    $firstname = $lastname = $phonenumber = $email = $email = $checkin = $checkout = $room = $guest = "";
    $firstnameErr = $lastnameErr = $phonenumberErr= $emailErr = $emailErr = $checkinErr = $checkoutErr= $roomErr = $guestErr = "";

    //check or submit
    if(isset($_POST['submit'])) {

        // start session booking
        session_name('booking');
        session_start();
        $errorA =[];

        if(empty($_POST['firstname'])) {
            $firstnameErr = "Firstname is required";
            $errorA[] = $firstnameErr; 
        } else {
            $firstname = test_input($_POST['firstname']);
            $_SESSION['firstname'] = htmlentities($firstname);
        }
        if(empty($_POST['lastname'])) {
            $lastnameErr = "lastname is required";
            $errorA[] = $lastnameErr;
        } else {
            $lastname = test_input($_POST['lastname']);
            $_SESSION['lastname'] = htmlentities($lastname);
        }
        if(empty($_POST['phonenumber'])) {
            $phonenumberErr = "Phone number is required";
            $errorA[] = $phonenumberErr;
        } else {
            $phonenumber= test_input($_POST['phonenumber']);
            $_SESSION['phonenumber'] = htmlentities($phonenumber);
        }
        if(empty($_POST['email'])) {
            $emailErr = "Email is required";
            $errorA[] = $emailErr;
        } else {
            $email = test_input($_POST["email"]);
            $_SESSION['email'] = htmlentities($email);

             // check if e-mail address is well-formed
             if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format"; 
            }
        }
        if(empty($_POST['checkin'])) {
            $checkinErr = "Date is required";
            $errorA[] = $checkinErr;
        } else {
            $checkin = test_input($_POST['checkin']);
            $_SESSION['checkin'] = htmlentities($checkin);
        }
        if(empty($_POST['checkout'])) {
            $checkoutErr = "Date is required";
            $errorA[] = $checkoutErr;
        } else {
            $checkout = test_input($_POST['checkout']);
            $_SESSION['checkout'] = htmlentities($checkout);
        }
        if(empty($_POST['room'])) {
            $roomErr = "Room is required";
            $errorA[] = $roomErr;
        } else {
            $room = test_input($_POST['room']);
            $_SESSION['room'] = htmlentities($room);
        }
        if(empty($_POST['guest'])) {
            $guestErr = "Number of guests is required";
            $errorA[] = $guestErr;
        } else {
            $guest = test_input($_POST['guest']);
            $_SESSION['guest'] = htmlentities($guest);
        }
        
        if(count($errorA) == 0){
            header('Location: '.ROOT_URL.'/booking2.php');
        }


        $roomType = $_SESSION['room'];
        //create query
        $query = "SELECT * FROM rooms WHERE type='$roomType' AND available='1'";

        //Get result
        $result = mysqli_query($conn, $query);

        // Count rows
        // $count = mysql_num_rows($result);

        //fetch data
        $rooms = mysqli_fetch_all($result, MYSQLI_ASSOC);

        //free result
        mysqli_free_result($result);

       
        foreach ($rooms as $room) {
            $_SESSION['roomId'] = $room['roomid'];
        }
        
        $roomId = $_SESSION['roomId'];
        $sql = "UPDATE rooms SET available='0' WHERE rooms.roomid='$roomId'";
        if(mysqli_query($conn, $sql)) {
            echo "Error";
        } else {
            echo 'ERROR: '.mysqli_error($conn);
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
    <link rel="stylesheet" href="css/booking.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- Owl carousel importation -->
    <link rel="stylesheet" href="plugins/OwlCarousel2-develop/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="plugins/OwlCarousel2-develop/dist/assets/owl.theme.default.min.css">

</head>

<body>
    <nav class="grey darken-4 z-depth-0">
        <div class="nav-wrapper">
            <a href="<?php echo htmlspecialchars(ROOT_URL); ?>" class="brand-logo orange-text darken-3"><span class="white-text">Syke</span> World</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>

    <ul class="sidenav grey darken-4" id="mobile-demo">
        <div class="footer center white-text">
            <h4 class="center">Syke World</h4>
            <a href="signin.html" class="center orange-text">Sign Up or Sign In</a>
            <div class="socialLinks white-text">
                <h5 class="left-align">Follow Us</h5>
                <div class="links">
                    <a href="" class="white-text">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="white-text"><i class="fab fa-twitter"></i></a>
                    <a href="" class="white-text"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <p class="white-text center"> © 2020 Copyright. All Rights Reserved</p>
        </div>
    </ul>

    <!-- content -->
    <div class="content">
        <!-- booking form -->
        <div id="booking">
            <form action="booking.php" method="POST" class="">
                <div class="row">
                    <div class="userDetails col s12 l6 m12">
                        <h5 class="white-text">User Details</h5>
                        <div class="row">
                            <div class="input-field col s12 l6 m6">
                                <i class="material-icons prefix orange-text text-darken-3">person</i>
                                <label for="firstname" class="orange-text text-darken-3">Firstname</label>
                                <input type="text" name="firstname" id="firstname" class="white-text">
                                <p class="red-text"><?php echo $firstnameErr; ?></p>
                            </div>
                            <div class="input-field col s12 l6 m6">
                                <i class="material-icons prefix orange-text text-darken-3">person</i>
                                <label for="lastname" class="orange-text text-darken-3">Lastname</label>
                                <input type="text" name="lastname" id="lastname" class="white-text">
                                <p class="red-text"><?php echo $lastnameErr; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 l6 m6">
                                <i class="material-icons prefix orange-text text-darken-3">phone</i>
                                <label for="phonenumber" class="orange-text text-darken-3">Phone number</label>
                                <input type="number" name="phonenumber" id="phonenumber" class="white-text">
                                <p class="red-text"><?php echo $phonenumberErr; ?></p>
                            </div>
                            <div class="input-field col s12 l6 m6">
                                <i class="material-icons prefix orange-text text-darken-3">email</i>
                                <label for="email" class="orange-text text-darken-3">Email</label>
                                <input type="email" name="email" id="email" class="white-text">
                                <p class="red-text"><?php echo $emailErr; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="bookDetails col s12 l6 m12">
                        <h5 class="white-text">Booking Details</h5>
                        <div class="row">
                            <div class="input-field col s6 l6 m6">
                                <i class="material-icons prefix orange-text text-darken-3">date_range</i>
                                <label for="checkIn" class="orange-text text-darken-3">Check In</label>
                                <input type="text" name="checkin" id="" class="datepicker white-text" value="<?php echo date('Y-m-d');?>">
                                <p class="red-text"><?php echo $checkinErr; ?></p>
                            </div>
                            <div class="input-field col s12 l6 m6">
                                <i class="material-icons prefix orange-text text-darken-3">date_range</i>
                                <label for="checkOut" class="orange-text text-darken-3">Check Out</label>
                                <input type="text" name="checkout" id="" class="datepicker white-text" value="<?php echo date('Y-m-d');?>">
                                <p class="red-text"><?php echo $checkoutErr; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col s12 l6 m6 input-field">
                                <select class="orange-text text-darken-3 browser-default transparent" name="room">
                                    <option value="" disabled selected>Choose a room</option>
                                    <option value="single" >Single Room</option>
                                    <option value="double">Double Room</option>
                                    <option value="master">Master Room</option>
                                </select>
                                <p class="red-text"><?php echo $roomErr; ?></p>
                            </div>

                            <div class="col col s12 l6 m6 input-field">
                                <i class="material-icons prefix orange-text text-darken-3">account_circle</i>
                                <label for="guest" class="orange-text text-darken-3">Number of Guests</label>
                                <input type="number" name="guest" id="" class="white-text" value="1">
                                <p class="red-text"><?php echo $guestErr; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="submit" value="submit" name="submit" class="btn orange darken-4">
            </form>
        </div>
    </div>
    <!-- end of content -->

    <!-- footer section -->
    <footer class="page-footer z-depth-0">
        <div class="container center">
            © 2020 Copyright. All Rights Reserved
        </div>
    </footer>
    <!-- end of footer section -->

    <!-- jquery importation -->
    <script src="plugins/jquery-3.4.1/dist/jquery.min.js"></script>

    <!-- materialise importation -->
    <script src="plugins/materialise/js/materialize.js"></script>
    <script src="plugins/materialise/js/materialize.min.js"></script>

    <!-- masonry importation -->
    <script src="plugins/masonry/masonry.pkgd.min.js"></script>
    <script src="plugins/masonry/masonry.pkgd.js"></script>

    <!-- owl carousel -->
    <script src="plugins/OwlCarousel2-develop/dist/owl.carousel.min.js"></script>
    <script src="plugins/OwlCarousel2-develop/dist/owl.carousel.js"></script>

    <script>
        $(document).ready(function() {
            // initializing sidenav
            $('.sidenav').sidenav();

        });
        $(document).ready(function() {

            // initializing datepicker
            $('.datepicker').datepicker({
                autoClose: true,
                format: 'yyyy-mm-dd'
            });

            $('select').formSelect();
        });
    </script>

</body>

</html>
<?php

require('config/config.php');
require('config/db.php');

// start session
session_name('booking');
session_start();

    $firstname = $_SESSION['firstname'];
    $lastname = $_SESSION['lastname'];
    $phonenumber = $_SESSION['phonenumber'];
    $email = $_SESSION['email'];
    $checkin = $_SESSION['checkin'];
    $checkout = $_SESSION['checkout'];
    $room = $_SESSION['room'];
    $guest = $_SESSION['guest'];
    $roomid = $_SESSION['roomId'];

    $confirm = "";
    $confirmErr = "";

      //check or submit
        if(isset($_POST['continue'])) {
            $query = "INSERT INTO booking(roomNum, firstname, lastname, email, phonenumber, checkin, checkout, room, guests) VALUES('$roomid','$firstname','$lastname','$email','$phonenumber','$checkin','$checkout','$room','$guest')";

            if(empty($_POST['confirm'])) {
                $confirmErr = "Please check confirmation";
            } else {
                if(mysqli_query($conn, $query)) {
                    echo "<script type='text/javascript'>
        Swal.fire({
            position:'top-end',
            icon: 'success',
            title: 'The client has been checked out successfully',
            showConfirmationButton: false,
            timer: 1400,
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
              },
              hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
              }
        })
    </script>";
                    header('Location: '.ROOT_URL.'');
                } else {
                    header('Location: '.ROOT_URL.'/booking2.php');
                }
            }  
        }

        if(isset($_POST['back'])){
            header('Location: '.ROOT_URL.'/booking.php');
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
    <link rel="stylesheet" type="text/css" href="sweetalert2-10.8.0/package/dist/sweetalert2.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/12c18de3e7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/">

    <!-- materialise cdn -->
    <link rel="stylesheet" href="plugins/materialise/css/materialize.css">
    <link rel="stylesheet" href="plugins/materialise/css/materialize.min.css">

    <!-- css links -->
    <link rel="stylesheet" href="css/booking2.css">
    <link rel="stylesheet" href="css/main.css">

</head>

<body>
    <nav class="grey darken-4 z-depth-0">
        <div class="nav-wrapper">
            <a href="index.html" class="brand-logo orange-text darken-3"><span class="white-text">Syke</span> World</a>
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
        <h2>Comfirm Booking</h2>

        <div class="bookingForm">
            <table class="striped responsive-table">
                <thead>
                    <tr>
                        <th>
                            <h5 class="orange-text text-darken-3 text-darken-4">Personal Details</h5>
                        </th>
                        <th>
                            <h5 class="orange-text text-darken-3 text-darken-4">Booking Information</h5>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td><span>Firstname: </span><?php echo $firstname; ?></td>
                        <td><span>Check In: </span><?php echo $checkin; ?></td>
                    </tr>
                    <tr>
                        <td><span>Lastname: </span><?php echo $lastname; ?></td>
                        <td><span>Check Out: </span><?php echo $checkout; ?></td>
                    </tr>
                    <tr>
                        <td><span>Email: </span><?php echo $email; ?></td>
                        <td><span>Room Type: </span><?php echo $room; ?></td>
                    </tr>
                    <tr>
                        <td><span>Phone number: </span><?php echo $phonenumber; ?></td>
                        <td><span class="text-accent-1">Number Of Guests: </span><?php echo $guest; ?></td>
                    </tr>
                </tbody>
            </table>
            <p>Your Room ID R<?php echo $roomid;?></p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <p>
                    <label>
                        <input type="checkbox" class="filled-in" name="confirm">
                        <span>I confirm the above information is correct.</span>
                        <p class="red-text"><?php echo $confirmErr; ?></p>
                    </label>
                </p>
                <div class="input-field">
                    <input type="submit" value="Back" name="back" class="btn orange darken-4">
                    <input type="submit" value="Continue" name="continue" class="btn right orange darken-4">
                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function() {
            // initializing sidenav
            $('.sidenav').sidenav();

        });
        $(document).ready(function() {

            // initializing datepicker
            $('.datepicker').datepicker({
                autoClose: true
            });

            $('select').formSelect();
        });
    </script>

</body>

</html>
<?php
require('config/config.php');
require('config/db.php');

session_name('user');
session_start();

$email = $comment = "";
$commentErr = $emailErr = "";
$errorA = [];

if(isset($_POST['submitComment'])) {
    if(empty($_POST['email'])) {
        $emailErr = "email is required";
        $errorA[] = $emailErr;
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        $errorA[] = $emailErr;
    }  
    else {
        $emailErr = "";
        $email = test_input($_POST['email']);
        unset($errorA['$emailErr']);
    }

    if(empty($_POST['comment'])) {
        $commentErr = "Comment is required";
        $errorA[] = $commentErr;
    } else {
        $commentErr = "";
        $comment = test_input($_POST['comment']);
        unset($errorA['$commentErr']);
    }

    if(count($errorA) === 0) {
        $query = "INSERT INTO comments(email, comment) VALUES('$email','$comment')";

        if(mysqli_query($conn, $query)) {
            header('Location: '.ROOT_URL.'/contact.php');
        } else {
            header('Location: '.ROOT_URL.'/contact.php');
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
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- Owl carousel importation -->
    <link rel="stylesheet" href="plugins/OwlCarousel2-develop/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="plugins/OwlCarousel2-develop/dist/assets/owl.theme.default.min.css">

</head>

<body>
<?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        include('inc/nav1.php');
    } else {
        include('inc/nav.php');
    }
?>

    <!-- content -->
    <div class="content">
        <div class="contentHeader">
            <h3 class="center">Contact Us</h3>
            <div class="divider center container" style="width: 15%;"></div>
        </div>

        <!-- contact section -->
        <div class="contact">
            <div class="row">
                <div class="col s12 l5 m5">
                    <div class="contactInfo">
                        <h4>Reach Us Easily</h4>
                        <p><i class="material-icons orange-text text-darken-4">phone</i>(123) 456-78-910</p>
                        <p><i class="material-icons orange-text text-darken-4">phone</i>(123) 456-78-910</p>
                        <p><i class="material-icons orange-text text-darken-4">email</i>info@sykeworld.com</p>
                    </div>
                    <div class="addressInfo">
                        <h4>Address</h4>
                        <p><i class="material-icons orange-text text-darken-4">location_on</i>9+h Street, Z Avenue</p>
                        <p><i class="material-icons orange-text text-darken-4">location_on</i>Paidha, Zombo</p>
                    </div>
                    <div class="officeTime">
                        <h4>Open Time</h4>
                        <h5 class="grey-text text-darken-3">Week Days</h5>
                        <p>8am - 9pm</p>

                        <h5 class="grey-text text-darken-3">Weekends</h5>
                        <p>8am - 6pm</p>
                    </div>
                </div>

                <!-- contact us form -->
                <div class="col s12 l7 m7 grey darken-4 contactUs">
                    <form action="query.php" method="POST" class="">
                        <h4 class="center white-text">Contact Us</h4>
                        <h5 class="orange-text center text-darken-2">Quick replies within 24Hrs</h5>
                        <div class="row">
                            <div class="col s12 l6 m6 input-field">
                                <label for="firstname">Firstname</label>
                                <input type="text" id="firstname" name="firstname" class="white-text">
                            </div>
                            <div class="col s12 l6 m6 input-field">
                                <label for="secondname">Secondname</label>
                                <input type="text" id="secondname" name="secondname" class="white-text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 l12 m12">
                                <label for="contactEmail">Email</label>
                                <input type="email" name="email" id="contactEmail" class="white-text">
                            </div>
                            <div class="input-field col s12 l12 m12">
                                <label for="message">Your Message</label>
                                <textarea name="message" id="message" class="materialize-textarea white-text"></textarea>
                            </div>
                        </div>
                        <input type="submit" value="submit" name="submit" class="btn orange darken-4">
                    </form>
                </div>
                <!-- end of contact us form -->
            </div>
        </div>
        <!-- end of contact section -->

        <!-- google maps section -->
        <div id="googlemaps">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.276150092658!2d30.978769814089986!3d2.414503957904137!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x176fa1fc50041e1d%3A0xddad62820562905c!2sSYKE%20WORLD%20HOTEL!5e0!3m2!1sen!2sug!4v1597564182068!5m2!1sen!2sug"
                width="100%" height="550" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        <!-- end of google maps section -->

        <!-- comment form -->
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
                    <div id="commentForm" class="center">
                        <h2 class="center black-text">Leave a comment</h2>
                        <div class="container">
                            <form action="" method="post">
                                <div class="input-field">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email">

                                </div>
                                <div class="input-field">
                                    <label for="comment">Comment</label>
                                    <textarea name="comment" class="materialize-textarea"></textarea>

                                </div>
                                <div class="input-field">
                                    <input type="submit" name="submitComment" value="Submit" class="orange darken-4 btn">
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php endif; ?>
                    <!-- end of comment form -->
    </div>
    <!-- end of content -->

    <!-- footer section -->
    <?php include('inc/footer.php'); ?>
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

        $('.owl-carousel').owlCarousel({
            items: 3,
            margin: 10,
            loop: true,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            animateOut: 'easeInOut',
            animateIn: 'flipInX',
            stagePadding: 30,
            smartSpeed: 450
        });
    </script>

</body>

</html>
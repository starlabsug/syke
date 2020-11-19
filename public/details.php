<?php
require('config/config.php');
require('config/db.php');

session_name('user');
session_start();
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
    <link rel="stylesheet" href="css/rooms.css">
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
        <div class="contentHeader hide-on-med-and-down">
            <h3 class="center white-text">Our Rooms</h3>
            <div class="divider center container" style="width: 10%;"></div>
        </div>
        <div class="contentHeader-m hide-on-large-only">
            <h3 class="center white-text">Our Rooms</h3>
            <div class="divider center container" style="width: 24%;"></div>
        </div>

        <!-- rooms  -->
        <div id="rooms">
            <div class="room">
                <div class="row">
                    <div class="col s12 l6 m6">
                        <div class="roomBody">
                            <h5>Single Room</h5>
                            <h4 class="orange-text text-darken-4">UGX 80,000</h4>
                            <span>
                                        <p>Size: 30ft</p>
                                    </span>
                            <span>
                                        <p>Bed: King Size</p>
                                    </span>
                            <span>
                                        <p>Capacity: 1 Person</p>
                                    </span>
                            <span>
                                        <h5>Services</h5>
                                        <p><i class="material-icons">wifi</i>WiFi, <i class="material-icons">tv</i>Smart TV, <i class="material-icons">ac_unit</i>AC</p>
                                    </span>
                            <a href="<?php echo htmlspecialchars(ROOT_URL); ?>booking.php" class="btnC orange darken-4">Book Now</a>
                        </div>
                    </div>
                    <div class="col s12 l6 m6">
                        <img src="images/rooms-1.jpg" class="responsive-img" alt="" srcset="">
                    </div>
                </div>

                <div class="roomGallery hide-on-med-and-down owl-carousel owl-theme">
                    <div class="item">
                        <img src="images/rooms-1.jpg" alt="" srcset="">
                    </div>
                    <div class="item">
                        <img src="images/rooms-2.jpg" alt="" srcset="">
                    </div>
                    <div class="item">
                        <img src="images/rooms-1.jpg" alt="" srcset="">
                    </div>
                    <div class="item">
                        <img src="images/rooms-2.jpg" alt="" srcset="">
                    </div>
                    <div class="item">
                        <img src="images/rooms-2.jpg" alt="" srcset="">
                    </div>
                    <div class="item">
                        <img src="images/rooms-1.jpg" alt="" srcset="">
                    </div>
                    <div class="item">
                        <img src="images/rooms-2.jpg" alt="" srcset="">
                    </div>
                </div>
            </div>

            <div class="room grey darken-4">
                <div class="row">
                    <div class="col s12 l6 m6">
                        <div class="roomBody">
                            <h5 class="white-text">Single Room</h5>
                            <h4 class="orange-text text-darken-4">UGX 80,000</h4>
                            <span>
                                        <p class="white-text">Size: 30ft</p>
                                    </span>
                            <span>
                                        <p class="white-text">Bed: King Size</p>
                                    </span>
                            <span>
                                        <p class="white-text">Capacity: 1 Person</p>
                                    </span>
                            <span>
                                        <h5 class="white-text">Services</h5>
                                        <p class="white-text"><i class="material-icons">wifi</i>WiFi, <i class="material-icons">tv</i>Smart TV, <i class="material-icons">ac_unit</i>AC</p>
                                    </span>
                            <a href="<?php echo htmlspecialchars(ROOT_URL); ?>booking.php" class="btnC orange darken-4 white-text">Book Now</a>
                        </div>
                    </div>
                    <div class="col s12 l6 m6">
                        <img src="images/rooms-1.jpg" class="responsive-img" alt="" srcset="">
                    </div>
                </div>

                <div class="roomGallery hide-on-med-and-down owl-carousel owl-theme">
                    <div class="item">
                        <img src="images/rooms-1.jpg" alt="" srcset="">
                    </div>
                    <div class="item">
                        <img src="images/rooms-2.jpg" alt="" srcset="">
                    </div>
                    <div class="item">
                        <img src="images/rooms-1.jpg" alt="" srcset="">
                    </div>
                    <div class="item">
                        <img src="images/rooms-2.jpg" alt="" srcset="">
                    </div>
                    <div class="item">
                        <img src="images/rooms-2.jpg" alt="" srcset="">
                    </div>
                    <div class="item">
                        <img src="images/rooms-1.jpg" alt="" srcset="">
                    </div>
                    <div class="item">
                        <img src="images/rooms-2.jpg" alt="" srcset="">
                    </div>
                </div>
            </div>

            <div class="room">
                <div class="row">
                    <div class="col s12 l6 m6">
                        <div class="roomBody">
                            <h5>Single Room</h5>
                            <h4 class="orange-text text-darken-4">UGX 80,000</h4>
                            <span>
                                        <p>Size: 30ft</p>
                                    </span>
                            <span>
                                        <p>Bed: King Size</p>
                                    </span>
                            <span>
                                        <p>Capacity: 1 Person</p>
                                    </span>
                            <span>
                                        <h5>Services</h5>
                                        <p><i class="material-icons">wifi</i>WiFi, <i class="material-icons">tv</i>Smart TV, <i class="material-icons">ac_unit</i>AC</p>
                                    </span>
                            <a href="<?php echo htmlspecialchars(ROOT_URL); ?>booking.php" class="btnC orange darken-4">Book Now</a>
                        </div>
                    </div>
                    <div class="col s12 l6 m6">
                        <img src="images/rooms-1.jpg" class="responsive-img" alt="" srcset="">
                    </div>
                </div>

                <div class="roomGallery hide-on-med-and-down owl-carousel owl-theme">
                    <div class="item">
                        <img src="images/rooms-1.jpg" alt="" srcset="">
                    </div>
                    <div class="item">
                        <img src="images/rooms-2.jpg" alt="" srcset="">
                    </div>
                    <div class="item">
                        <img src="images/rooms-1.jpg" alt="" srcset="">
                    </div>
                    <div class="item">
                        <img src="images/rooms-2.jpg" alt="" srcset="">
                    </div>
                    <div class="item">
                        <img src="images/rooms-2.jpg" alt="" srcset="">
                    </div>
                    <div class="item">
                        <img src="images/rooms-1.jpg" alt="" srcset="">
                    </div>
                    <div class="item">
                        <img src="images/rooms-2.jpg" alt="" srcset="">
                    </div>
                </div>
            </div>
        </div>
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
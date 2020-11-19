<?php
    require('config/config.php');
    require('config/db.php');

    session_name('user');
    session_start();
?>

    <?php
    //create query
    
    $sql = "SELECT * FROM comments";
    
    //Get result
    $result = mysqli_query($conn, $sql);

    //fetch data
    $comments = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //free result
    mysqli_free_result($result);

    

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
            <link rel="stylesheet" href="css/style.css">
            <link rel="stylesheet" href="css/main.css">

            <!-- importing swiper library -->
            <link rel="stylesheet" href="plugins/swiper/swiper-bundle.css">
            <link rel="stylesheet" href="plugins/swiper/swiper-bundle.min.css">

            <!-- hover master importation -->
            <link rel="stylesheet" href="plugins/hover/hover-min.css">
            <link rel="stylesheet" href="plugins/hover/hover.css">

            <!-- Owl carousel importation -->
            <link rel="stylesheet" href="plugins/OwlCarousel2-develop/dist/assets/owl.carousel.min.css">
            <link rel="stylesheet" href="plugins/OwlCarousel2-develop/dist/assets/owl.theme.default.min.css">

            <!-- importing aos -->
            <link rel="stylesheet" href="plugins/aos/dist/aos.css">
            <script src="plugins/aos/dist/aos.js"></script>

            <!-- importing anime js -->
            <link rel="stylesheet" href="plugins/anime/css/anime.css">
            <link rel="stylesheet" href="plugins/anime/css/anime-theme.css">

        </head>

        <body class="">
            <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        include('inc/nav1.php');
    } else {
        include('inc/nav.php');
    }
    ?>

                <div class="nav center hide-on-large-only">
                    <div class="nav-header left-align header-sl">
                        <h3 class="orange-text text-darken-4"><span class="white-text">Syke</span> World</h3>
                        <h4 class="white-text">Lorem ipsum dolor sit amet consectetur adipisicig..</h4>
                    </div>

                    <a href="" class="center"><img src="images/icons/chevron-down.svg" width="30px" height="30px" alt="" srcset=""></a>
                </div>
                <div class="swiper-container hide-on-med-and-down">
                    <!-- Additional required wrapper -->

                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide" style="background: url(images/new/FB_IMG_1597857222190.jpg); background-size: cover;">
                            <div class="slideBody zoom-out-down">
                                <h4 class="grey-text text-darken-4 right">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam facere sunt quia itaque ipsa!</h4>
                            </div>
                        </div>
                        <div class="swiper-slide" style="background: url(images/bruna-branco-7r1HxvVC7AY-unsplash.jpg);background-size: cover;">
                            <div class="slideBody right zoom-out-up">
                                <h4 class="grey-text text-lighten-2 left-align">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam facere sunt quia itaque ipsa!</h4>
                            </div>
                        </div>
                        <div class="swiper-slide" style="background: url(images/menu/menu-1.jpg); background-size: cover;">
                            <div class="slideBody right zoom-out-down">
                                <h4 class="grey-text text-darken-3 right">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam facere sunt quia itaque ipsa!</h4>
                            </div>
                        </div>
                        <div class="swiper-slide" style="background: url(images/pexels-chan-walrus-941864.jpg); background-size: cover;">
                            <div class="slideBody right zoom-out-left">
                                <h4 class="grey-text text-darken-3 right">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam facere sunt quia itaque ipsa!</h4>
                            </div>
                        </div>
                        <div class="swiper-slide" style="background: url(images/pexels-creative-vix-370984.jpg); background-size: cover;">
                            <div class="slideBody right zoom-out-down">
                                <h4 class="grey-text text-darken-3 right">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam facere sunt quia itaque ipsa!</h4>
                            </div>
                        </div>
                        <div class="swiper-slide" style="background: url(images/pexels-negative-space-34650.jpg); background-size: cover;">
                            <div class="slideBody right zoom-out-down">
                                <h4 class="grey-text text-darken-3 right">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam facere sunt quia itaque ipsa!</h4>
                            </div>
                        </div>
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <!-- <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div> -->

                    <!-- If we need scrollbar -->
                    <!-- <div class="swiper-scrollbar"></div> -->
                </div>

                <!-- content -->
                <div class="content">

                    <!-- Booking form -->
                    <div id="bookingForm">

                        <form action="check.php" method="post" id="bookForm" class="row hide-on-med-and-down left zoom-out-right white">
                            <h2 class="center white-text">Check Availability</h2>
                            <!-- <h3 class="white-text">Book A Room</h3> -->
                            <div class="row col s12 l12 m12">
                                <div class="col s12 l3 m12 input-field">
                                    <i class="material-icons prefix orange-text text-darken-3">date_range</i>
                                    <label for="checkIn" class="orange-text text-darken-3">Check In</label>
                                    <input type="text" name="checkIn" id="" class="datepicker white-text" value="<?php echo date('Y-m-d');?>">
                                </div>

                                <div class="col s12 l3 m12 input-field">
                                    <i class="material-icons prefix orange-text text-darken-3">date_range</i>
                                    <label for="checkOut" class="orange-text text-darken-3">Check Out</label>
                                    <input type="text" name="checkOut" id="" class="datepicker white-text" value="<?php echo date('Y-m-d');?>">
                                </div>
                                <div class="col s12 l3 m12 input-field">
                                    <select class="orange-text text-darken-3 browser-default transparent" name="room">
                            <option value="" disabled selected>Choose a room</option>
                            <option value="single">Single Room</option>
                            <option value="double">Double Room</option>
                            <option value="master">Master Room</option>
                            <label for="room">Room</label>
                        </select>
                                </div>

                                <div class="col s12 l3 m12 input-field">
                                    <i class="material-icons prefix orange-text text-darken-3">account_circle</i>
                                    <label for="guest" class="orange-text text-darken-3">Number of Guests</label>
                                    <input type="number" name="guest" id="" class="white-text" value="1">
                                </div>
                            </div>
                            <div class="row col s12 l4 m4">
                                <input type="submit" value="Check Availability" name="check" class="btnC orange darken-4">
                            </div>
                        </form>

                        <form action="check.php" method="post" id="bookForm bookForm-m" class="row hide-on-large-only center zoom-out-right">
                            <h3 class="white-text">Book A Room</h3>
                            <div class="row col s12 l4 m4">
                                <div class="col s12 l12 m12 input-field">
                                    <i class="material-icons prefix orange-text text-darken-3">date_range</i>
                                    <label for="checkIn" class="orange-text text-darken-3">Check In</label>
                                    <input type="text" name="checkIn" id="" class="datepicker white-text" value="<?php echo date('Y-m-d');?>">
                                </div>

                                <div class="col s12 l12 m12 input-field">
                                    <i class="material-icons prefix orange-text text-darken-3">date_range</i>
                                    <label for="checkOut" class="orange-text text-darken-3">Check Out</label>
                                    <input type="text" name="checkOut" id="" class="datepicker white-text" value="<?php echo date('Y-m-d');?>">
                                </div>
                            </div>
                            <div class="row col s12 l4 m4">
                                <div class="col s12 l12 m12 input-field">
                                    <select class="orange-text text-darken-3 browser-default transparent" name="room">
                            <option value="" disabled selected>Choose a room</option>
                            <option value="single">Single Room</option>
                            <option value="double">Double Room</option>
                            <option value="master">Master Room</option>
                            <label for="room">Room</label>
                        </select>
                                </div>

                                <div class="col s12 l12 m12 input-field">
                                    <i class="material-icons prefix orange-text text-darken-3">account_circle</i>
                                    <label for="guest" class="orange-text text-darken-3">Number of Guests</label>
                                    <input type="number" name="guest" id="" class="white-text" value="1">
                                </div>
                            </div>
                            <div class="row col s12 l4 m4">
                                <input type="submit" value="Check Availability" name="check" class="btnC orange darken-4">
                            </div>
                        </form>
                    </div>
                    <!-- end of booking form -->

                    <!-- rooms section-->
                    <div id="rooms slidedown" class="rooms">
                        <h2 class="center black-text">Explore more luxury</h2>
                        <h5 class="orange-text text-darken-3 center">Our rooms</h5>
                        <div class="row">
                            <div class="col s12 l4 m6 zoom-out-down white">
                                <div class="room z-depth-3 hoverable orange">
                                    <div class="roomImg">
                                        <img src="images/new/FB_IMG_1597857210469.jpg" class="responsive-img" alt="" srcset="">
                                    </div>
                                    <div class="roomText">
                                        <h4 class="grey-text text-lighten-3">Single Room</h4>
                                        <p class="orange-text text-darken-3">UGX 80,000</p>
                                        <a href="<?php echo htmlspecialchars(ROOT_URL); ?>details.php" class="btnC orange darken-4">View more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 l4 m6 zoom-out-up white">
                                <div class="room z-depth-3 hoverable">
                                    <div class="roomImg">
                                        <img src="images/new/FB_IMG_1597857213053.jpg" class="responsive-img" alt="" srcset="">
                                    </div>
                                    <div class="roomText">
                                        <h4 class="grey-text text-lighten-3">Double Room</h4>
                                        <p class="orange-text text-darken-3">UGX 80,000</p>
                                        <a href="<?php echo htmlspecialchars(ROOT_URL); ?>details.php" class="btnC orange darken-4">View more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 l4 m6 zoom-out-down white">
                                <div class="room z-depth-3 hoverable">
                                    <div class="roomImg">
                                        <img src="images/new/FB_IMG_1597857224592.jpg" class="responsive-img" alt="" srcset="">
                                    </div>
                                    <div class="roomText">
                                        <h4 class="grey-text text-lighten-3">Master Room</h4>
                                        <p class="orange-text text-darken-3">UGX 80,000</p>
                                        <a href="<?php echo htmlspecialchars(ROOT_URL); ?>details.php" class="btnC orange darken-4">View more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of rooms section-->

                    <!-- service centers section -->
                    <div id="services" class="servicesBg">
                        <h2 class="center white-text">Discover Our Services</h2>
                        <div class="row">
                            <div class="col s12 l4 m4 service center">
                                <div class="serviceImg center">
                                    <img src="images/icons/services-1.png" alt="" srcset="">
                                </div>
                                <div class="serviceBody">
                                    <h5 class="orange-text text-darken-3 center">Free WiFi</h5>
                                    <p class="grey-text">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate natus porro repellendus iusto totam atque accusamus, nesciunt quasi, dolor quas
                                    </p>
                                    <a href="<?php echo htmlspecialchars(ROOT_URL); ?>about.php" class="btnC orange darken-4 left-align">View more</a>
                                </div>
                            </div>
                            <div class="col s12 l4 m4 service center">
                                <div class="serviceImg center">
                                    <img src="images/icons/services-2.png" alt="" srcset="">
                                </div>
                                <div class="serviceBody">
                                    <h5 class="orange-text text-darken-3 center">Pool</h5>
                                    <p class="grey-text">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate natus porro repellendus iusto totam atque accusamus, nesciunt quasi, dolor quas
                                    </p>
                                    <a href="<?php echo htmlspecialchars(ROOT_URL); ?>about.php" class="btnC orange darken-4 left-align">View more</a>
                                </div>
                            </div>
                            <div class="col s12 l4 m4 service center">
                                <div class="serviceImg center">
                                    <img src="images/icons/services-4.png" alt="" srcset="">
                                </div>
                                <div class="serviceBody">
                                    <h5 class="orange-text text-darken-3 center">Bar & Restaurant</h5>
                                    <p class="grey-text">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate natus porro repellendus iusto totam atque accusamus, nesciunt quasi, dolor quas
                                    </p>
                                    <a href="<?php echo htmlspecialchars(ROOT_URL); ?>about.php" class="btnC orange darken-4 left-align">View more</a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 l4 m4 service center">
                                <div class="serviceImg center">
                                    <img src="images/icons/services-5.png" alt="" srcset="">
                                </div>
                                <div class="serviceBody">
                                    <h5 class="orange-text text-darken-3 center">TV HD</h5>
                                    <p class="grey-text">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate natus porro repellendus iusto totam atque accusamus, nesciunt quasi, dolor quas
                                    </p>
                                    <a href="<?php echo htmlspecialchars(ROOT_URL); ?>about.php" class="btnC orange darken-4 left-align">View more</a>
                                </div>
                            </div>
                            <div class="col s12 l4 m4 service center">
                                <div class="serviceImg center">
                                    <img src="images/icons/services-6.png" alt="" srcset="">
                                </div>
                                <div class="serviceBody">
                                    <h5 class="orange-text text-darken-3 center">Room Service</h5>
                                    <p class="grey-text">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate natus porro repellendus iusto totam atque accusamus, nesciunt quasi, dolor quas
                                    </p>
                                    <a href="<?php echo htmlspecialchars(ROOT_URL); ?>about.php" class="btnC orange darken-4 left-align">View more</a>
                                </div>
                            </div>
                            <div class="col s12 l4 m4 service center">
                                <div class="serviceImg center">
                                    <img src="images/icons/services-1.png" alt="" srcset="">
                                </div>
                                <div class="serviceBody">
                                    <h5 class="orange-text text-darken-3 center">Security</h5>
                                    <p class="grey-text">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate natus porro repellendus iusto totam atque accusamus, nesciunt quasi, dolor quas
                                    </p>
                                    <a href="<?php echo htmlspecialchars(ROOT_URL); ?>about.php" class="btnC orange darken-4 left-align">View more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of service centers section -->

                    <!-- image gallery slider -->
                    <!-- end of image gallery slider -->

                    <!-- bar and restaurant section -->
                    <div id="diner">
                        <h2 class="center white-text darken-4">Bar & Restaurant</h2>
                        <div class="row">
                            <div class="col s12 l12 m12 menu">
                                <div class="row grey darken-4 z-depth-4">
                                    <div class="col s12 l6 m12 restaurant">
                                        <div class="hdr">
                                            <h3 class="orange-text text-darken-3">Restaurant</h3>
                                        </div>

                                        <span>
                                <h4 class="white-text text-darken-3">Open time</h4>
                                <p class="orange-text text-darken-3">06:30 HRS - 23:00 HRS</p>
                                <p class="white-text text-darken-3">Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Distinctio adipisci ipsa labore exercitationem nostrum accusantium hic.
                                    Tempore consectetur reprehenderit quidem soluta, eaque harum aut unde temporibus
                                    culpa explicabo illo ratione!</p>
                            </span>
                                    </div>
                                    <div class="col s12 l6 m12 restaurant">
                                        <div class="hdr">
                                            <h3 class="orange-text text-darken-3">Bar</h3>
                                        </div>

                                        <span>
                                <h4 class="white-text text-darken-3">Open time</h4>
                                <p class="orange-text text-darken-3">06:30 HRS - 23:00 HRS</p>
                                <p class="white-text text-darken-3">Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Distinctio adipisci ipsa labore exercitationem nostrum accusantium hic.
                                    Tempore consectetur reprehenderit quidem soluta, eaque harum aut unde temporibus
                                    culpa explicabo illo ratione!</p>
                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 l6 m12 menu hvr-backward" hidden>
                                <div class="row white z-depth-4">
                                    <div class="col s12 l8 m8 black-text">
                                        <h5>Lorem Ipsum</h5>
                                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officiis reiciendis aperiam sunt. Corrupti rerum </p>
                                        <a href="<?php echo htmlspecialchars(ROOT_URL); ?>about.php" class="btnC orange darken-4">View More</a>
                                    </div>
                                    <div class="col s12  center l4 m4">
                                        <img src="images/menu/menu-1.jpg" class="z-depth-3" height="160px" width="160px" alt="" srcset="">
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 l6 m12 menu hvr-forward" hidden>
                                <div class="row white z-depth-4">
                                    <div class="col s12 center l4 m4">
                                        <img src="images/menu/menu-2.jpg" class="z-depth-3" height="160px" width="160px" alt="" srcset="">
                                    </div>
                                    <div class="col s12 l8 m8 black-text">
                                        <h5>Lorem Ipsum</h5>
                                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officiis reiciendis aperiam sunt. Corrupti rerum </p>
                                        <a href="<?php echo htmlspecialchars(ROOT_URL); ?>about.php" class="btnC orange darken-4">View More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 l6 m12 menu hvr-backward" hidden>
                                <div class="row grey darken-4 z-depth-4">
                                    <div class="col s12 l8 m8 white-text">
                                        <h5>Lorem Ipsum</h5>
                                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officiis reiciendis aperiam sunt. Corrupti rerum </p>
                                        <a href="<?php echo htmlspecialchars(ROOT_URL); ?>about.php" class="btnC orange darken-4">View More</a>
                                    </div>
                                    <div class="col s12 center l4 m4">
                                        <img src="images/menu/menu-1.jpg" class="z-depth-3" height="160px" width="160px" alt="" srcset="">
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 l6 m12 menu hvr-forward" hidden>
                                <div class="row grey darken-4 z-depth-4">
                                    <div class="col s12 center l4 m4">
                                        <img src="images/menu/menu-2.jpg" class="z-depth-3" height="160px" width="160px" alt="" srcset="">
                                    </div>
                                    <div class="col s12 l8 m8 white-text">
                                        <h5>Lorem Ipsum</h5>
                                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officiis reiciendis aperiam sunt. Corrupti rerum </p>
                                        <a href="<?php echo htmlspecialchars(ROOT_URL); ?>about.php" class="btnC orange darken-4">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of bar and restaurant section -->


                    <!-- testimonial section -->
                    <?php if(count($comments) > 0 ): ?>
                    <div id="testimonial">
                        <h2 class="center">What Our Guests Say</h2>
                        <div class="owl-carousel owl-theme">
                            <?php foreach ($comments as $comment): ?>
                            <div class="comment center grey darken-4 item">
                                <div class="commentImg">
                                    <h1 class="white-text">
                                        <?php //$photo = $comment['photo']; echo '<img style="border-radius: 100%; padding: 0 !important;" class="responsive-img" height="200px" width="200px" src="image/'.$photo.'">'; 
                                    echo strtoupper(substr($comment['email'], 0,1));
                                    ?>
                                    </h1>

                                </div>
                                <div class="commentBody">
                                    <p class="grey-text">"
                                        <?php echo $comment['comment']; ?>"</p>
                                    <h6 class="orange-text text-darken-3">
                                        <?php echo $comment['email']; ?>
                                    </h6>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <!-- end of testimonial section -->
                    <!-- comment form -->
                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
                    <div id="commentForm" class="center">
                        <h2 class="center black-text">Leave a comment</h2>
                        <div class="container">
                            <form action="comment.php" method="post">
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

                <?php include('inc/footer.php'); ?>

                <!-- jquery importation -->
                <script src="plugins/jquery-3.4.1/dist/jquery.min.js"></script>
                <script src="js/index.js"></script>

                <!-- materialise importation -->
                <script src="plugins/materialise/js/materialize.js"></script>
                <script src="plugins/materialise/js/materialize.min.js"></script>

                <!-- importing swiper js library -->
                <script src="plugins/swiper/swiper-bundle.js"></script>
                <script src="plugins/swiper/swiper-bundle.min.js"></script>

                <!-- owl carousel -->
                <script src="plugins/OwlCarousel2-develop/dist/owl.carousel.min.js"></script>
                <script src="plugins/OwlCarousel2-develop/dist/owl.carousel.js"></script>

                <script>
                    $(document).ready(function() {

                        // initializing datepicker
                        $('.datepicker').datepicker({
                            autoClose: true,
                            format: 'yyyy-mm-dd'
                        });

                        $('.slider').slider();

                        // initializing sidenav
                        $('.sidenav').sidenav();

                        $('.carousel.carousel-slider').carousel({
                            fullWidth: true,
                            indicators: true,
                            duration: 200,
                            loop: true
                        });
                        $('select').formSelect();
                    });
                    // $('.grid').masonry({
                    //     // options
                    //     itemSelector: '.grid-item',
                    //     columnWidth: 200
                    // });

                    $('.owl-carousel').owlCarousel({
                        items: 2,
                        margin: 20,
                        loop: true,
                        autoplay: true,
                        autoplayTimeout: 4000,
                        autoplayHoverPause: true,
                        responsiveClass: true,
                        responsive: {
                            0: {
                                items: 1,
                            },
                            600: {
                                items: 2,
                                nav: false
                            },
                            1000: {
                                items: 2,
                                nav: false,
                                loop: true
                            }
                        }
                    });

                    AOS.init({
                        easing: 'ease-in-out-sine'
                    });
                </script>
                <script>
                    var mySwiper = new Swiper('.swiper-container', {
                        // Optional parameters
                        direction: 'vertical',
                        loop: true,

                        // If we need pagination
                        pagination: {
                            el: '.swiper-pagination',
                        },

                        // Navigation arrows
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },

                        // And if we need scrollbar
                        scrollbar: {
                            el: '.swiper-scrollbar',
                        },

                        autoplay: {
                            delay: 5000
                        },

                        setWrapperSize: true,
                        effect: "coverflow",
                        zoom: {
                            toggle: true,
                            maxRatio: 7
                        }
                    });
                </script>
        </body>

        </html>
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

    //Close connection
    mysqli_close($conn);

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
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- Owl carousel importation -->
    <link rel="stylesheet" href="plugins/OwlCarousel2-develop/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="plugins/OwlCarousel2-develop/dist/assets/owl.theme.default.min.css">

    <!-- izmir importation -->
    <link rel="stylesheet" href="plugins/izmir/izmir.min.css">

    <!-- importing fancybox -->
    <link rel="stylesheet" href="plugins/fancybox/dist/jquery.fancybox.min.css">

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
        <div class="contentHeader center">
            <h2>Little About Us</h2>
            <div class="divider center hide-on-med-and-down container" style="width: 15%;"></div>
            <div class="divider center hide-on-large-only container" style="width: 45%;"></div>
        </div>

        <!-- mission and vission -->
        <div class="mission">
            <div class="row">
                <div class="mission col s12 l6 m6">
                    <h4 class="orange-text text-darken-4">MISSION</h4>
                    <p class="grey-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus molestiae similique eligendi itaque earum possimus non? Quas, numquam obcaecati.</p>
                    <h4 class="orange-text  text-darken-4">VISION</h4>
                    <p class="grey-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus molestiae similique eligendi itaque earum possimus non? Quas, numquam obcaecati.</p>
                </div>
                <div class="mission col s12 l6 m6">
                    <img src="images/pexels-chan-walrus-941864.jpg" class="responsive-img" style="" alt="" srcset="">
                </div>
            </div>
        </div>
        <!-- end of mission and vision -->

        <!-- services section -->
        <div id="services" class="grey row darken-4">
            <h2 class="orange-text center text-darken-4">Our services</h2>
            <div class="row">
                <div class="col s12 l6 m6 service">
                    <div class="serviceBody">
                        <p class="grey-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate natus porro repellendus iusto totam atque accusamus, nesciunt quasi, dolor quas. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptates ex explicabo alias sunt repellat
                            consectetur veritatis perferendis sapiente doloribus, excepturi ut in molestias nam temporibus odit non sint libero. Similique.
                        </p>
                        <p class="grey-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate natus porro repellendus iusto totam atque accusamus, nesciunt quasi, dolor quas. Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, praesentium, asperiores ratione error
                            fugiat assumenda harum libero ullam dignissimos adipisci voluptatibus, incidunt amet numquam maiores? Quidem facere similique minima commodi!
                        </p>
                    </div>
                </div>
                <div class="col s12 l6 m6 service">
                    <div class="serviceImg">
                        <img src="images/pexels-chan-walrus-941864.jpg" class="responsive-img" style="" alt="" srcset="">
                    </div>
                </div>
                <div class="col s12 l6 m6 service">
                    <div class="serviceImg">
                        <img src="images/pexels-chan-walrus-941864.jpg" class="responsive-img" style="" alt="" srcset="">
                    </div>
                </div>
                <div class="col s12 l6 m6 service">
                    <div class="serviceBody">
                        <p class="grey-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate natus porro repellendus iusto totam atque accusamus, nesciunt quasi, dolor quas. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ea eius, voluptate doloremque corrupti odio
                            ut sequi alias consequuntur perferendis, est tempora. Ad non, quibusdam et enim est sequi laudantium ducimus.
                        </p>
                        <p class="grey-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate natus porro repellendus iusto totam atque accusamus, nesciunt quasi, dolor quas. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ea eius, voluptate doloremque corrupti odio
                            ut sequi alias consequuntur perferendis, est tempora. Ad non, quibusdam et enim est sequi laudantium ducimus.
                        </p>
                    </div>
                </div>
                
            </div>

        </div>
        <!-- end of diner -->


    </div>
    <!-- end of services section -->

    <!-- our staff section -->
    <div class="aboutUs">
        <h2 class="center">Our staff</h2>
        <div class="container-wrapper hide-on-med-and-down">
            <div class="box">
                <figure class="c4-izmir c4-border-ccc-3 c4-image-rotate-right c4-gradient-bottom-right" tabindex="0" style="--primary-color: #181818; --secondary-color: #f15111; --image-opacity: .1;">
                    <img src="images/pexels-chan-walrus-941864.jpg" alt="" srcset="">
                    <figcaption class="c4-layout-bottom-left">
                        <div class="c4-reveal-right c4-delay-100">
                            <h3>Hello World</h3>
                            <p>Life is too important to be taken seriously!</p>
                        </div>
                    </figcaption>
                </figure>

            </div>
            <div class="box">
                <figure class="c4-izmir c4-border-ccc-2 c4-image-zoom-out c4-gradient-bottom-right" tabindex="0" style="--primary-color: #f15111; --secondary-color: #181818; --image-opacity: .1;">
                    <img src="images/menu/menu-1.jpg" alt="" srcset="">
                    <figcaption class="c4-reveal-right c4-delay-100">
                        <h3>Hello World</h3>
                        <p>Life is too important to be taken seriously!</p>
                    </figcaption>
                </figure>

            </div>
            <div class="box">
                <figure class="c4-izmir c4-border-ccc-1 c4-image-zoom-out c4-gradient-bottom-right" tabindex="0" style="--primary-color: #181818; --secondary-color: #f15111; --image-opacity: .1;">
                    <img src="images/annie-spratt--KKLWDAgj2Q-unsplash.jpg" alt="" srcset="">
                    <figcaption class="c4-reveal-right c4-delay-100">
                        <h3>Hello World</h3>
                        <p>Life is too important to be taken seriously!</p>
                    </figcaption>
                </figure>

            </div>
            <div class="box">
                <figure class="c4-izmir c4-border-ccc-1 c4-image-pan-up c4-gradient-bottom-right" tabindex="0" style="--primary-color: #f15111; --secondary-color: #181818; --image-opacity: .1;">
                    <img src="images/pexels-negative-space-34650.jpg" alt="" srcset="">
                    <figcaption class="c4-reveal-right c4-delay-100">
                        <h3>Hello World</h3>
                        <p>Life is too important to be taken seriously!</p>
                    </figcaption>
                </figure>

            </div>
            <div class="box">
                <figure class="c4-izmir c4-border-top c4-image-pan-right c4-gradient-bottom-right" tabindex="0" style="--primary-color: #181818; --secondary-color: #f15111; --image-opacity: .1;">
                    <img src="images/brooke-lark-08bOYnH_r_E-unsplash.jpg" alt="" srcset="">
                    <figcaption class="c4-reveal-right c4-delay-100">
                        <h3>Hello World</h3>
                        <p>Life is too important to be taken seriously!</p>
                    </figcaption>
                </figure>

            </div>
        </div>

        <div class="row hide-on-large-only">
            <div class="col s12">
                <figure class="c4-izmir c4-border-ccc-3 c4-image-rotate-right c4-gradient-bottom-right" tabindex="0" style="--primary-color: #181818; --secondary-color: #f15111; --image-opacity: .1;">
                    <img src="images/pexels-chan-walrus-941864.jpg" alt="" srcset="">
                    <figcaption class="c4-layout-bottom-left">
                        <div class="c4-reveal-right c4-delay-100">
                            <h3>Hello World</h3>
                            <p>Life is too important to be taken seriously!</p>
                        </div>
                    </figcaption>
                </figure>
            </div>
            <div class="col s12">
                <figure class="c4-izmir c4-border-ccc-2 c4-image-zoom-out c4-gradient-bottom-right" tabindex="0" style="--primary-color: #f15111; --secondary-color: #181818; --image-opacity: .1;">
                    <img src="images/menu/menu-1.jpg" alt="" srcset="">
                    <figcaption class="c4-reveal-right c4-delay-100">
                        <h3>Hello World</h3>
                        <p>Life is too important to be taken seriously!</p>
                    </figcaption>
                </figure>
            </div>
            <div class="col s12">
                <figure class="c4-izmir c4-border-ccc-1 c4-image-zoom-out c4-gradient-bottom-right" tabindex="0" style="--primary-color: #181818; --secondary-color: #f15111; --image-opacity: .1;">
                    <img src="images/annie-spratt--KKLWDAgj2Q-unsplash.jpg" alt="" srcset="">
                    <figcaption class="c4-reveal-right c4-delay-100">
                        <h3>Hello World</h3>
                        <p>Life is too important to be taken seriously!</p>
                    </figcaption>
                </figure>
            </div>
            <div class="col s12">
                <figure class="c4-izmir c4-border-ccc-1 c4-image-pan-up c4-gradient-bottom-right" tabindex="0" style="--primary-color: #f15111; --secondary-color: #181818; --image-opacity: .1;">
                    <img src="images/pexels-negative-space-34650.jpg" alt="" srcset="">
                    <figcaption class="c4-reveal-right c4-delay-100">
                        <h3>Hello World</h3>
                        <p>Life is too important to be taken seriously!</p>
                    </figcaption>
                </figure>
            </div>
            <div class="col s12">
                <figure class="c4-izmir c4-border-top c4-image-pan-right c4-gradient-bottom-right" tabindex="0" style="--primary-color: #181818; --secondary-color: #f15111; --image-opacity: .1;">
                    <img src="images/brooke-lark-08bOYnH_r_E-unsplash.jpg" alt="" srcset="">
                    <figcaption class="c4-reveal-right c4-delay-100">
                        <h3>Hello World</h3>
                        <p>Life is too important to be taken seriously!</p>
                    </figcaption>
                </figure>
            </div>
        </div>
    </div>
    <!-- end of our staff section -->

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
                            <p class="grey-text">"<?php echo $comment['comment']; ?>"</p>
                            <h6 class="orange-text text-darken-3"><?php echo $comment['email']; ?></h6>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
        <!-- end of testimonial section -->
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

    <!-- owl carousel -->
    <script src="plugins/OwlCarousel2-develop/dist/owl.carousel.min.js"></script>
    <script src="plugins/OwlCarousel2-develop/dist/owl.carousel.js"></script>

    <!-- fancy box importation -->
    <script src="plugins/fancybox/dist/jquery.fancybox.min.js"></script>

    <script>
        $(document).ready(function() {
            // initializing sidenav
            $('.sidenav').sidenav();

        });

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
    </script>

</body>

</html>
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

    <!-- materialise cdn -->
    <link rel="stylesheet" href="plugins/materialise/css/materialize.css">
    <link rel="stylesheet" href="plugins/materialise/css/materialize.min.css">

    <!-- css links -->
    <link rel="stylesheet" href="css/gallery.css">
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
    <div class="gallery">
        <div class="box">
            <a href="images/andrew-buchanan-kS_Q9o2KssA-unsplash.jpg" data-fancybox="gallery">
                <img src="images/andrew-buchanan-kS_Q9o2KssA-unsplash.jpg" class="responsive-img" alt="" srcset="">
            </a>
        </div>
        <div class="box">
            <a href="images/annie-spratt--KKLWDAgj2Q-unsplash.jpg" data-fancybox="gallery">
                <img src="images/annie-spratt--KKLWDAgj2Q-unsplash.jpg" class="responsive-img" alt="" srcset="">
            </a>
        </div>
        <div class="box">
            <a href="images/annie-spratt-8cSOLNe_9ow-unsplash.jpg" data-fancybox="gallery">
                <img src="images/annie-spratt-8cSOLNe_9ow-unsplash.jpg" class="responsive-img" alt="" srcset="">
            </a>
        </div>
        <div class="box">
            <a href="images/brooke-lark-08bOYnH_r_E-unsplash.jpg" data-fancybox="gallery">
                <img src="images/brooke-lark-08bOYnH_r_E-unsplash.jpg" class="responsive-img" alt="" srcset="">
            </a>
        </div>
        <div class="box">
            <a href="images/bruna-branco-7r1HxvVC7AY-unsplash.jpg" data-fancybox="gallery">
                <img src="images/bruna-branco-7r1HxvVC7AY-unsplash.jpg" class="responsive-img" alt="" srcset="">
            </a>
        </div>
        <div class="box">
            <a href="images/checked-tablecloth-maria-toutoudaki.jpg" data-fancybox="gallery">
                <img src="images/checked-tablecloth-maria-toutoudaki.jpg" class="responsive-img" alt="" srcset="">
            </a>
        </div>
        <div class="box">
            <a href="images/dose-juice-sTPy-oeA3h0-unsplash.jpg" data-fancybox="gallery">
                <img src="images/dose-juice-sTPy-oeA3h0-unsplash.jpg" class="responsive-img" alt="" srcset="">
            </a>
        </div>
        <div class="box">
            <a href="images/pexels-chan-walrus-941864.jpg" data-fancybox="gallery">
                <img src="images/pexels-chan-walrus-941864.jpg" class="responsive-img" alt="" srcset="">
            </a>
        </div>
        <div class="box">
            <a href="images/pexels-creative-vix-370984.jpg" data-fancybox="gallery">
                <img src="images/pexels-creative-vix-370984.jpg" class="responsive-img" alt="" srcset="">
            </a>
        </div>
        <div class="box">
            <a href="images/pexels-negative-space-34650.jpg" data-fancybox="gallery">
                <img src="images/pexels-negative-space-34650.jpg" class="responsive-img" alt="" srcset="">
            </a>
        </div>
        <div class="box">
            <a href="images/volodymyr-hryshchenko-8bNryfuu71c-unsplash.jpg" data-fancybox="gallery">
                <img src="images/volodymyr-hryshchenko-8bNryfuu71c-unsplash.jpg" class="responsive-img" alt="" srcset="">
            </a>
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


    <!-- fancy box importation -->
    <script src="plugins/fancybox/dist/jquery.fancybox.min.js"></script>

    <script>
        $(document).ready(function() {
            // initializing sidenav
            $('.sidenav').sidenav();

        });
    </script>

</body>

</html>
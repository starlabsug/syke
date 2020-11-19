<?php

$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$email = $_SESSION['email'];
$photo = $_SESSION['photo'];

// <?php $profile = substr($firstname, 0, 1); echo strtoupper($profile);
?>
<div class="navbar-fixed">
    <nav class="z-depth-0">
        <div class="nav-wrapper">
            <a href="<?php echo htmlspecialchars(ROOT_URL); ?>" class="brand-logo orange-text darken-3"><span class="white-text">Syke</span> World</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li class="active"><a href="<?php echo htmlspecialchars(ROOT_URL); ?>" class="orange-text text-darken-3">Home</a></li>
                <li><a href="<?php echo htmlspecialchars(ROOT_URL); ?>details.php" class="orange-text text-darken-3">Details</a></li>
                <li><a href="<?php echo htmlspecialchars(ROOT_URL); ?>gallery.php" class="orange-text text-darken-3">Gallery</a></li>
                <li><a href="<?php echo htmlspecialchars(ROOT_URL); ?>contact.php" class="orange-text text-darken-3">Contact</a></li>
                <li><a href="<?php echo htmlspecialchars(ROOT_URL); ?>about.php" class="orange-text text-darken-3">About</a></li>
                <li><a href="<?php echo htmlspecialchars(ROOT_URL); ?>logout.php" class="orange darken-4 grey-text text-lighten-3">LOG OUT</a></li>
                <!-- <li class="white-text profile"><h5 class="white-text center darken-4"></h5></li>  -->
            </ul>
        </div>
    </nav>

    <ul class="sidenav grey darken-4" id="mobile-demo">
        <li class="active"><a href="<?php echo htmlspecialchars(ROOT_URL); ?>" class="orange-text darken-3"><i class="material-icons small orange-text text-darken-4">home</i>Home</a></li>
        <li><a href="<?php echo htmlspecialchars(ROOT_URL); ?>details.php" class="orange-text text-darken-3"><i class="material-icons orange-text text-darken-4">hotel</i>Details</a></li>
        <li><a href="<?php echo htmlspecialchars(ROOT_URL); ?>gallery.php" class="orange-text text-darken-3"><i class="material-icons orange-text text-darken-4">photo_album</i>Gallery</a></li>
        <li><a href="<?php echo htmlspecialchars(ROOT_URL); ?>contact.php" class="orange-text text-darken-3"><i class="material-icons orange-text text-darken-4">phone</i>Contact</a></li>
        <li><a href="<?php echo htmlspecialchars(ROOT_URL); ?>about.php" class="orange-text text-darken-3"><i class="material-icons orange-text text-darken-4">contacts</i>About</a></li>
        <div class="divider"></div>
        <div class="center"><?php echo '<img style="border-radius: 100%;" height="50px" width="50px" src="image/'.$photo.'">'; ?>
        <h5 class="white-text center darken-4"><?php echo $firstname;?></h5>
        </div>
        <div class="footer center white-text">
            <h4 class="center">Syke World</h4>
            <a href="<?php echo htmlspecialchars(ROOT_URL); ?>logout.php" class="center orange-text">Log Out</a>

            <p class="white-text center"> © 2020 Copyright. All Rights Reserved</p>
        </div>
    </ul>
</div>
    <header class="z-depth-0 hide-on-med-and-down navHeader grey darken-4" style="padding: 10px 0; margin: 0 !important;">
        <div class="nav-content white-text row center">
            <div class="navlinks container col s8 l8 m8">
                <div>
                    <p><i class="material-icons orange-text text-darken-4">phone</i> +233 2333 23312</p>
                    <p><i class="material-icons orange-text text-darken-4">location</i> Paidha, Zombo</p>
                </div>
                <div class="links" style="display: flex;">
                    <a href="https://www.facebook.com/Syke-World-118621122865541/" class="white-text">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="white-text"><i class="fab fa-twitter"></i></a>
                    <a href="" class="white-text"><i class="fab fa-instagram"></i></a>
                </div>
                <span><h6 class="center white-text">"Lorem, ipsum dolor sit amet consectetur adipisicing elit."</h6></span>
            </div>
            
            <div class="navProfile right col s4 l4 m4" style="">
                <div class="profileImg">
                    <?php if(empty($photo)): ?>
                        <h5 style="padding: 7px 12px; border: 1px solid #fff; border-radius: 100%;"><?php echo strtoupper(substr($firstname, 0,1)); ?></h5>
                    <?php endif; ?>
                    <?php if(!empty($photo)): ?>
                        <?php echo '<img style="border-radius: 100%; padding: 0 !important;" class="responsive-img" height="70px" width="70px" src="image/'.$photo.'">'; ?>
                    <?php endif; ?>
                </div>
                <div class="profileBody left-align" style="margin: 0 10px">
                    <p style="margin:4px 8px 0 8px"><?php echo strtoupper($firstname)." ".strtoupper($lastname); ?></p>
                    <a href="<?php echo htmlspecialchars(ROOT_URL); ?>profile.php" class="orange-text text-darken-4">View Profile</a>
                </div>
            </div>
        </div>
    </header>
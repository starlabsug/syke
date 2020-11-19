<?php
    require('config/config.php');
    require('config/db.php');

    // submit

    if(isset($_POST['submit'])) {
        
        $subscribe = mysqli_real_escape_string($conn, $_POST['subscribe']);

        $query = "INSERT INTO newsletters(email) VALUES('$subscribe')";

        if(mysqli_query($conn, $query)) {
            header('Location: '.ROOT_URL.'');
        } else {
            echo 'ERROR: '.mysqli_error($conn);
        }
    }
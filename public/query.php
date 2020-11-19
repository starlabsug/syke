<?php
    require('config/config.php');
    require('config/db.php');

    // submit

    if(isset($_POST['submit'])) {
        
        $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
        $secondname = mysqli_real_escape_string($conn, $_POST['secondname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        $query = "INSERT INTO query(firstname, secondname, email, message) VALUES('$firstname','$secondname','$email','$message')";

        if(mysqli_query($conn, $query)) {
            header('Location: '.ROOT_URL.'/contact.php');
        } else {
            echo 'ERROR: '.mysqli_error($conn);
        }
    }
<?php

    require('config/config.php');
    require('config/db.php');

    
    $emailerr = $commentErr ="";
    $email = $comment = "";
    $userid = "";
    $unregistered = "sorry, you are not a registered guest, please register";

    if(isset($_POST['submitComment'])) {
        if(empty($_POST['email'])) {
            $emailErr = "Email is required";
            $errorA[] = $emailErr;
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format"; 
            }
        }

        if(empty($_POST['comment'])) {
            $commentErr = "Comment is required";
            $errorA[] = $commentErr;
        } else{
            $comment = test_input($_POST['comment']);
        }

        //create query
        $query1 = "SELECT * FROM users WHERE email='$email'";

        //Get result
        $result = mysqli_query($conn, $query1);

        //fetch data
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

        //free result
        mysqli_free_result($result);

        if(count($users) > 0) {
            foreach ($users as $user) {
                $userid = $user['userid'];
                $userPhoto = $user['photo'];
            }
        }
        
        var_dump($users);

        $query = "INSERT INTO comments(email, comment) VALUES('$email','$comment')";

        if(mysqli_query($conn, $query)) {
            header('Location: '.ROOT_URL.'');
        } else {
            echo 'ERROR: '.mysqli_error($conn); //if the guest is not registered.
        }
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
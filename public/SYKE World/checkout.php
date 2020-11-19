<?php
require('../config/config.php');
require('../config/db.php');

//initialize the session
session_start();
//get room id
$roomId = mysqli_real_escape_string($conn, $_GET['id']);
//update records on checkout
$query = "UPDATE rooms SET available='1' where rooms.roomid='$roomId";
$result = $conn->query($query);
if($result)
{
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
    
    header("Location: Bookings.php");
    exit;
}
else{
    echo "<script type='text/javascript'>
        Swal.fire({
            position:'top-end',
            icon: 'error',
            title: 'Sorry, client checkout failed!',
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
}
mysqli_close($conn);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>
    <link rel="stylesheet" type="text/css" href="sweetalert2-10.8.0/package/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css" media="screen,projection" />
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
    <script src="sweetalert2-10.8.0/package/dist/sweetalert2.min.js"></script>
</body>
</html>
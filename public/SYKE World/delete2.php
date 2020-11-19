<?php
require('../config/config.php');
require('../config/db.php');

//initialize the session
session_start();

//get id
$id = mysqli_real_escape_string($conn, $_GET['id']);

$quer = 'DELETE FROM comments WHERE id='.$id;
$result = $conn->query($quer);
if($result)
{
    mysqli_close($conn);
    header("Location: comments.php");
    exit;
    echo "yaayy, its gone!";
}
else{
    echo "couldnt delete";
}
?>
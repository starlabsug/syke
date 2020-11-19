<?php
require('../config/config.php');
require('../config/db.php');

//initialize the session
session_start();

//get id
$id = mysqli_real_escape_string($conn, $_GET['id']);

$querrr = 'DELETE FROM newsletters WHERE id='.$id;
$result = $conn->query($querrr);
if($result)
{
    mysqli_close($conn);
    header("Location: Newsletters.php");
    exit;
    echo "yaayy, its gone!";
}
else{
    echo "couldnt delete";
}
?>
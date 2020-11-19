<?php
    require('config/config.php');
    require('config/db.php');
    
    session_start();
    session_destroy();

    header("Location: index.php");
?>
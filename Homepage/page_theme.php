<?php
    session_start();
    $var = '';
    $var = $_GET['msg'];
    $_SESSION['theme'] = $var;
    echo "<h1>". $_SESSION['theme']." on </h1>";
?>
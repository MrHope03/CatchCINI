<?php
    session_start();
    session_unset();
    session_destroy();
    die("Logged_Out");
?>
<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "catchcini";
    $con = mysqli_connect($server, $user, $pass, $db);
    if (!$con) {
        echo '<script> alert("Server Down!!! Try again Later"); </script>';
    }

    $cmd = "INSERT INTO user_details (first_name, last_name, mail, username, phone_no, password) VALUES ('$first_name', '$last_name', '$mail', '$username', '$phone_no', '$password')";
    $data = mysqli_query($con,$cmd);
?>
<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "catchcini";

    $password = $_POST["password"];
    $login = $_POST["login"];

    $con = mysqli_connect($server, $user, $pass, $db);
    $cmd = "SELECT username,mail,phone_no,password FROM user_details";
    $data = mysqli_query($con, $cmd);
    $flag = 0;
    if($data) {
        while($row = mysqli_fetch_assoc($data)){
            if($row["username"]==$login || $row["mail"]==$login || $row["phone_no"]==$login){
                if($row["password"]==$password){
                    $flag = 1;
                    break;
                }
            }  
        } if($flag) {
            echo '<script> alert("Welcome Back :)"); </script>';
        } else {
            echo '<script> alert("Incorrect Username or Password.\nPlease try again."); window.location.href="User_Login.php"; </script>';
        }
    } else {
        echo $con->error;
    }
?>


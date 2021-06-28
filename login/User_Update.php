<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "catchcini";
    $con = mysqli_connect($server, $user, $pass, $db);
    if (!$con) {
        echo '<script> alert("Server Down!!! Try again Later"); </script>';
    }

    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $mail = $_POST["mail"];
    $username = $_POST["username"];
    $phone_no = $_POST["phone_no"];
    $password = $_POST["password"];
    $con_password = $_POST["con_password"];

    if($password!=$con_password){
        echo '<script> alert("Password Mismatch!!!"); document.location.href="User_Signup.php";</script>';
    }
    $cmd = "SELECT * FROM user_details WHERE phone_no=$phone_no";
    $data = mysqli_query($con, $cmd);
    if($data) {
        if($row = mysqli_fetch_assoc($data)){
            echo '<script> alert("Mail or Phone No already Registered.\n Login using your mail or phone."); </script>';
        } else {
            $cmd = "INSERT INTO user_details (first_name, last_name, mail, username, phone_no, password) VALUES ('$first_name', '$last_name', '$mail', '$username', '$phone_no', '$password')";
            $data = mysqli_query($con,$cmd);
        }
    } else {
        echo $con->error;
    }
    echo "<script> document.location.href='User_Login.php'; </script>"; 

?>
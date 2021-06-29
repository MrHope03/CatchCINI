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
    $flag = 1;
    if($password!=$con_password){
        echo '<script> alert("Password Mismatch!!!"); document.location.href="User_Signup.php";</script>';
    }
    $cmd = "SELECT username,mail,phone_no FROM user_details";
    $data = mysqli_query($con, $cmd);
    if($data) {
        while($row = mysqli_fetch_assoc($data)){
            if($row["username"]==$username || $row["mail"]==$mail || $row["phone_no"]==$phone_no){
                $flag = 0;
                break;
            }
        }
        if(!$flag){
            echo '<script> alert("Mail or Phone No already Registered.\nLogin using your mail or phone."); </script>';
        } else {
            echo '<script> alert("Successful.\nLogin using your credentials."); </script>';
            $cmd = "INSERT INTO user_details (first_name, last_name, mail, username, phone_no, password) VALUES ('$first_name', '$last_name', '$mail', '$username', '$phone_no', '$password')";
            $data = mysqli_query($con,$cmd);
            $cmd = "CREATE TABLE `$username` (
                `sno` int(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
                `first_name` varchar(50) NOT NULL DEFAULT '$first_name',
                `last_name` varchar(50) NOT NULL DEFAULT '$last_name',
                `mail` varchar(50) NOT NULL DEFAULT '$mail',
                `phone_no` bigint(20) NOT NULL DEFAULT '$phone_no',
                `question` varchar(200) DEFAULT NULL,
                `option_a` varchar(100) DEFAULT NULL,
                `count_a` int(10) DEFAULT NULL,
                `option_b` varchar(100) DEFAULT NULL,
                `count_b` int(10) DEFAULT NULL,
                `option_c` varchar(100) DEFAULT NULL,
                `count_c` int(10) DEFAULT NULL,
                `option_d` varchar(100) DEFAULT NULL,
                `count_d` int(10) DEFAULT NULL,
                `option_e` varchar(100) DEFAULT NULL,
                `count_e` int(10) DEFAULT NULL,
                `option_f` varchar(100) DEFAULT NULL,
                `count_f` int(10) DEFAULT NULL,
                `total_options` int(10) NOT NULL,
                `ref` bigint(50) NOT NULL UNIQUE KEY,
                `reg_date` date NOT NULL DEFAULT current_timestamp()
              ) ";
            $data = mysqli_query($con,$cmd);
        }
    } else {
        echo $con->error;
    }
    echo '<script> document.location.href="User_Login.php";</script>';

?>

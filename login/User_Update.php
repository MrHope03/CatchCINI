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
            $user_check = 1;
            $mail_check = 1;
            $phone_check = 1;
            if($row["username"]==$username || $row["mail"]==$mail || $row["phone_no"]==$phone_no){
                if ($row["username"] == $username){
                    $user_check = 0;
                }
                if ($row["mail"] == $mail){
                    $mail_check = 0;
                }
                if ($row["phone_no"] == $phone_no){
                    $phone_check = 0;
                }
                $flag = 0;
                break;
            }
        }
        if(!$flag){
            if ($user_check == 0){
                echo '<script> alert("Username Already Registered.\nUse the Check Username Availability feature!!!\n"); </script>';
            }
            if ($mail_check == 0){
                echo '<script> alert("Mail already Registered.\nLogin using your mail or phone."); </script>';
            }
            if ($phone_check == 0){
                echo '<script> alert("Phone No already Registered.\nLogin using your mail or phone."); </script>';
            }
            echo '<script> document.location.href="User_Signup.php";</script>';
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
                `question` varchar(200) DEFAULT NULL UNIQUE KEY,
                `option_1` varchar(100) DEFAULT NULL,
                `count_1` int(10) DEFAULT NULL,
                `option_2` varchar(100) DEFAULT NULL,
                `count_2` int(10) DEFAULT NULL,
                `option_3` varchar(100) DEFAULT NULL,
                `count_3` int(10) DEFAULT NULL,
                `option_4` varchar(100) DEFAULT NULL,
                `count_4` int(10) DEFAULT NULL,
                `option_5` varchar(100) DEFAULT NULL,
                `count_5` int(10) DEFAULT NULL,
                `option_6` varchar(100) DEFAULT NULL,
                `count_6` int(10) DEFAULT NULL,
                `total_options` int(10) NOT NULL,
                `total_count` int(10) NULL,
                `ref` varchar(20) NOT NULL UNIQUE KEY,
                `reg_date` date NOT NULL DEFAULT current_timestamp()
              ) ";
            $data = mysqli_query($con,$cmd);
            echo '<script> document.location.href="User_Login.php";</script>';
        }
    } else {
        echo $con->error;
    }
?>

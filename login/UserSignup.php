<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "catchcini";
    include "User_Signup.php";
    $con = mysqli_connect($server, $user, $pass, $db);
    $user = $_GET['username'];
    $cmd = "SELECT username FROM user_details";
    $data = mysqli_query($con, $cmd);
    $flag = 1;
    if($data) {
        while($row = mysqli_fetch_assoc($data)){
            if($row["username"]==$user){
                echo '<script> document.getElementById("user_msg").innerHTML = "Username Not Available"; </script>';
                $flag = 0;
                break;
            }  
        } if($flag) {
            echo '<script> document.getElementById("user_msg").innerHTML = "Username Available"; </script>';
        }
    } else {
        echo $con->error;
    }
?>

<script>
    document.getElementById("first_name_id").value = localStorage.getItem("first_name");
    document.getElementById("last_name_id").value = localStorage.getItem("last_name");
    document.getElementById("mail_id").value = localStorage.getItem("mail");
    document.getElementById("phone_no_id").value = localStorage.getItem("phone_no");
    document.getElementById("username_id").value = localStorage.getItem("username");
    localStorage.removeItem("first_name");
    localStorage.removeItem("last_name");
    localStorage.removeItem("mail_id");
    localStorage.removeItem("phone_no");
    localStorage.removeItem("username");
</script>

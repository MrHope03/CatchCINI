<?php
    session_start();
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "catchcini";
    $con = mysqli_connect($server, $user, $pass, $db);
    if (!$con) {
        echo '<script> alert("Server Down!!! Try again Later"); </script>';
    }

    $hidden_val = $_POST["hidden_val"];
    $question = $_POST["question"];
    for($i =1; $i <= $hidden_val; $i++) {
        $index = "options$i";
        $options[$i] = $_POST[$index];
    }
    $username = $_SESSION["username"];
    $ref = base_convert(mt_rand(100000000000,208827064575),10,36);
    $cmd = "INSERT INTO $username (question, total_options, ref) VALUES ('$question', '$hidden_val', '$ref')";
    $data = mysqli_query($con,$cmd);
    $cmd = "SELECT ref,phone_no FROM $username";
    $data = mysqli_query($con, $cmd);
    if($data) {
        while($row = mysqli_fetch_assoc($data)){
            if($row["ref"]==$ref){
                $phone_no = $row["phone_no"];
                break;
            }  
        }
    }
    $cmd = "INSERT INTO polls (username, phone_no, question, total_options, ref) VALUES ('$username', '$phone_no', '$question', '$hidden_val', '$ref')";
    $data = mysqli_query($con,$cmd);
    for($i =1; $i <= $hidden_val; $i++) {
        $opt = "option_$i";
        $cmd = "UPDATE $username SET $opt = '$options[$i]' WHERE phone_no = $phone_no";
        $data = mysqli_query($con,$cmd);
        $cmd = "UPDATE polls SET $opt = '$options[$i]' WHERE phone_no = $phone_no";
        $data = mysqli_query($con,$cmd);
    }
    echo '<script> window.location.href="User.php"; </script>';
?>

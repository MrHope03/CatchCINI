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
    $ref = base_convert(mt_rand(100000000000),208827064575,10,26);
    $cmd = "INSERT INTO $username (question, total_options, ref) VALUES ('$question', '$hidden_val', '$ref')";
    $data = mysqli_query($con,$cmd);
    if(!$data){
        echo $con->error;
    }
    for($i =1; $i <= $hidden_val; $i++) {
        $opt = "option_$i";
        $cmd = "UPDATE $username SET $opt = '$options[$i]' WHERE ref = $ref";
        $data = mysqli_query($con,$cmd);
        if(!$data){
            echo $con->error;
        }
    }
?>

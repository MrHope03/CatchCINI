<?php
    session_start();
    if(isset($_SESSION["username"])){
      $username = $_SESSION["username"];
    } else {
      echo '<script> alert("Log in to get access!!"); </script>';
      $_SESSION["location"] = "polling_site";
      echo '<script> window.location.href="../login/User_Login.php"; </script>';
    }

    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "catchcini";
    $con = mysqli_connect($server, $user, $pass, $db);
    if (!$con) {
        echo '<script> alert("Server Down!!! Try again Later"); </script>';
    }
    $cmd = "SELECT first_name,last_name,mail,phone_no,username FROM user_details";
    $data = mysqli_query($con, $cmd);
    if($data) {
        while($row = mysqli_fetch_assoc($data)){
            if($row["username"]==$username){
                $phone_no = $row["phone_no"];
                $first_name = $row["first_name"];
                $last_name = $row["last_name"];
                $mail = $row["mail"];
                break;
            }  
        }
    }
    $cmd = "SELECT COUNT(*) FROM $username";
    $data = mysqli_query($con, $cmd);
    $total_polls = mysqli_fetch_row($data)[0];
    if($total_polls>4){
      $max_limit = 4;
    } else {
      $max_limit = $total_polls;
    }
    $cmd = "SELECT question,total_count FROM $username";
    $data = mysqli_query($con, $cmd);
    $i = 1;
    if($data) {
      while(($row = mysqli_fetch_assoc($data)) && $i<=$max_limit){
          $question[$i-1] = $row["question"];
          $total_count[$i-1] = "No of votes: ".$row["total_count"];
          $i++;
      }
    }
    $null_msg = "#No Polls";
    $create_msg = "<a href='poll_create.php'>Create</a>";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Poll</title>
    <script
            src="https://kit.fontawesome.com/704ddf1c0b.js"
            crossorigin="anonymous">
            function a(){
            document.getElementById("poll_question_01").innerHTML = "hello"; }
            a();
    </script>
    
    <link rel="stylesheet" href="main-template.css">
    <link rel="stylesheet" href="User-profile.css">
    <link rel="stylesheet" href="box-arrange.css">
    <style>
        body{
            background-image: url('movie\ roll.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-blend-mode:multiply;
            background-color: #ffebcd25;
            background-position: center;
            background-size: cover;
            background-size: 800px;
        }
        @media (min-width : 1040px){
          body{
            background-image: url('tenor.gif');
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-blend-mode:lighten;
            background-color: #ffebcd25;
            background-position: bottom right;
            background-size: 20vw;
          }
        }
        .close{
            visibility: hidden;
        }
      </style>
</head>
  <body>
    <header class="header">
      <nav class="nav">
          <ul>
            <li class="poll">
                <a href="poll_home.php"><i class="fas fa-poll fa-2x"></i></a>
            </li>
            <li class="web-tag l-tag">
              Popcorn Meter
            </li>
            <li>
                <a href="User.php"><i class="fas fa-user fa-2x"></i></a>
            </li>
            <li class="movie">
                <a href="movie_home.php"><i class="fas fa-film fa-2x"></i></a>
            </li>
            <li class="web-tag r-tag">
              Movie center
            </li>
          </ul>
      </nav>
      <div>
          <h1 class="main-heading">User Profile</h1>
      </div>
    </header>
    <section class="container">
        <table class="box">
            <tr>
                <td>First Name :</td> <td><?php echo $first_name; ?></td>
            </tr>
            <tr>
                <td>Last Name :</td> <td><?php echo $last_name; ?></td>
            </tr>
            <tr>
                <td>Username :</td> <td><?php echo $username; ?></td>
            </tr>
            <tr>
                <td>Email ID :</td> <td><?php echo $mail; ?></td>
            </tr>
            <tr>
                <td>Phone No. :</td> <td><?php echo $phone_no; ?></td>
            </tr>
            <tr>
                <td>No. of Polls Created :</td> <td><?php echo $total_polls; ?></td>
            </tr>
        </table>
    </section>

    <div>
        <button class="btn new-poll manage"  id="manage" onclick="edit()">Manage My Polls</button>
    </div>

    <section>
        <div class="sub-heading">Your Polls</div>
        <!-- NEED TO ATTACH THE POLLS TO IT -->
        <ul class="universe">
          <li class="box">
            <div onclick="location.href=''" class="item">
              <h3><?php if(isset($question[0])){echo $question[0];} else {echo $null_msg;} ?></h3>
              <p><?php if(isset($total_count[0])){echo $total_count[0];} else {echo $create_msg;} ?></p>
            <i class="far fa-times-circle fa-2x close"></i>
            </div>
          </li>
          <li class="box">
            <div onclick="location.href=''" class="item">
              <h3><?php if(isset($question[1])){echo $question[1];} else {echo $null_msg;} ?></h3>
              <p><?php if(isset($total_count[1])){echo $total_count[1];} else {echo $create_msg;} ?></p>
            <i class="far fa-times-circle fa-2x close"></i>
            </div>
          </li>
          <li class="box">
            <div onclick="location.href=''" class="item">
              <h3><?php if(isset($question[2])){echo $question[2];} else {echo $null_msg;} ?></h3>
              <p><?php if(isset($total_count[2])){echo $total_count[2];} else {echo $create_msg;} ?></p>
            <i class="far fa-times-circle fa-2x close"></i>
            </div>
          </li>
          <li  class="box">
            <div onclick="location.href=''" class="item">
              <h3><?php if(isset($question[3])){echo $question[3];} else {echo $null_msg;} ?></h3>
              <p><?php if(isset($total_count[3])){echo $total_count[3];} else {echo $create_msg;} ?></p>
            <i class="far fa-times-circle fa-2x close"></i>
            </div>
          </li>
        </ul>
      </section>

    <footer class="end-credit">
        <b style="color: white">POPCORNCRUNCHERS</b>
        <div class="white">
            <a href="#"
                ><i style="color: white" class="fab fa-instagram fa-2x"></i
            ></a>
            <a href="#"
                ><i style="color: white" class="fab fa-twitter fa-2x"></i
            ></a>
            <a href="#"
                ><i style="color: white" class="fab fa-pinterest fa-2x"></i
            ></a>
            <a href="#"
                ><i style="color: white" class="fas fa-envelope fa-2x"></i
            ></a>
        </div>
    </footer>
    </body>
    <script>
        function edit(){
            document.getElementById('manage').innerHTML = "Confirm Changes";
            document.getElementById('manage').removeEventListener('click',edit);
            document.getElementById('manage').addEventListener('click',confirm);
            let close = document.getElementsByClassName('close');
            for (let i = 0; i < close.length; i++){
                close[i].style.visibility="visible";
            }
            
        }
        function confirm(){
            document.getElementById('manage').innerHTML = "Manage my Polls";
            document.getElementById('manage').removeEventListener('click',confirm);
            document.getElementById('manage').addEventListener('click',edit);
            let close = document.getElementsByClassName('close');
            for (let i = 0; i < close.length; i++){
                close[i].style.visibility="hidden";
            }
        }
    </script>
  </html>

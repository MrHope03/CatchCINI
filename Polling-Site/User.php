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
    
    $i = 0;
    $array = array();
    while(!empty($_GET['var'.$i])){
        array_push($array,$_GET['var'.$i]);
        $i++;
    }
    if (!empty($array)){
      for ($i = 0; $i < count($array); $i++){
        $ref_id = $array[$i];
        $cmd = "DELETE FROM $username WHERE ref = '$ref_id'";
        $q = mysqli_query($con,$cmd);
        $cmd = "DELETE FROM polls WHERE ref = '$ref_id'";
        $q = mysqli_query($con,$cmd);
        if (!$q){
            echo "couldn't delete";
        }
      }
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
    $cmd = "SELECT question,total_count,ref FROM $username ORDER BY sno DESC";
    $data = mysqli_query($con, $cmd);
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
            /* background-image: url('movie\ roll.png'); */
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-blend-mode: screen;
            background-color: #ffebcd25;
            background-position: center;
            background-size: cover;
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
            display:none;
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
        <button class="btn new-poll manage"  id="manage" onclick="edit();">Manage My Polls</button>
        <span id="reset" onclick="refresh();"><i class="fas fa-undo fa-2x reset"></i></span>
    </div>
    
    <section>
        <div class="sub-heading">Your Polls</div>
        <ul class="universe" id="polls">
          <?php
          function read($data){
            if($data) {
              while(($row = mysqli_fetch_assoc($data))){
                  echo '<li class="box"  id='. $row['ref'].'>';
                  echo '<div class="item">'; //Add function manage_poll() to redirect for individual polls
                  echo '<h3 onclick="view_poll();">'.$row["question"].'</h3>';
                  echo '<p> No of votes: '.$row["total_count"].'</p>';
                  echo '<i class="far fa-times-circle fa-2x close" onclick="remove(this.id);" id="rem'. $row['ref'].'"></i>';
                  echo '</div>';
                  echo ' </li>';
              }
            }
          }
          read($data);
          ?>
          <li  class="box">
            <div class="item">
              <h3>#No Polls</h3>
              <p><a href='poll_create.php'>Create</a></p> <!-- Add styling here -->
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
          
           // TODO: change the php hyperlink
            function view_poll(){
              location.href= "User.php";
            }
            function edit(){
                    document.getElementById('manage').innerHTML = "Confirm Changes";
                    document.getElementById('reset').style.display = "block";
                    document.getElementById('manage').removeEventListener('click',edit);
                    document.getElementById('manage').addEventListener('click',confirm);
                    let close = document.getElementsByClassName('close');
                    for (let i = 0; i < close.length; i++){
                        close[i].style.display="block";
                    }
            }
            var remove_list = new Array;
            function remove(id){
              var id_temp = id.substring(3);
              document.getElementById(id_temp).outerHTML = "";
              remove_list.push(id);
            }
            function refresh(){
              document.getElementById('polls').innerHTML = '<?php $cmd = "SELECT question,total_count,ref FROM $username ORDER BY sno DESC";
                      $data = mysqli_query($con, $cmd);read($data); ?>'+
                      '<li  class="box">'+
                      '<div class="item">'+
                      '<h3>#No Polls</h3>'+
                      '<p><a href="poll_create.php">Create</a></p>'+
                      '</div></li>';
                    let close = document.getElementsByClassName('close');
                    for (let i = 0; i < close.length; i++){
                        close[i].style.display="block";
                    }
                    remove_list = [];
            }
            function confirm(){
              document.getElementById('manage').innerHTML = "Manage my Polls";
              document.getElementById('reset').style.display = "none";
              document.getElementById('manage').removeEventListener('click',confirm);
              document.getElementById('manage').addEventListener('click',edit);
              let close = document.getElementsByClassName('close');
              for (let i = 0; i < close.length; i++){
                  close[i].style.display = "none";
              }
              var msg = "User.php?";
              for (let i = 0; i < remove_list.length; i++){
                let str = remove_list[i].slice(3,12);
                msg += ("var"+i+"="+str);
                if (i != (remove_list.length - 1)){
                  msg += "&";
                }
              }
              window.location.href = msg;
            }
    </script>
    
  </html>

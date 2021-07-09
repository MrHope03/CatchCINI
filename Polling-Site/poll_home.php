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
    if (!isset($_SESSION['theme'])){
      $_SESSION['theme'] = 'light';
    }
    $cmd = "SELECT COUNT(*) FROM polls";
    $data = mysqli_query($con, $cmd);
    $total_polls = mysqli_fetch_row($data)[0];
    if($total_polls>4){
      $max_limit = 4;
    } else {
      $max_limit = $total_polls;
    }
    $cmd = "SELECT question,total_count,ref FROM polls ORDER BY total_count DESC";
    $data = mysqli_query($con, $cmd);
    $i = 1;
    if($data) {
      while(($row = mysqli_fetch_assoc($data)) && $i<=$max_limit){
        if ($row["total_count"]==NULL) {$row["total_count"]=0;}
          $question[$i-1] = $row["question"];
          $total_count[$i-1] = "No of votes: ".$row["total_count"];
          $ref[$i-1] = $row["ref"];
          $i++;
      }
    }
    $null_msg = "#No Polls";
    $create_msg = "<a href='poll_create.php'>Create</a>"; //Add styling here
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Poll</title>
    <script
            src="https://kit.fontawesome.com/704ddf1c0b.js"
            crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" id="page-theme" href="<?php if($_SESSION['theme'] == 'light'){echo 'light-main-template.css';}else{echo 'dark-main-template.css';} ?>">
    <link rel="stylesheet" id="box-theme" href="<?php if($_SESSION['theme'] == 'light'){echo 'light-box.css';}else{echo 'dark-box.css';} ?>">
    <style>
      body{
            background-image: url('giphy.gif');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-blend-mode: color-dodge;
            background-position: center;
            background-size: 70vw;
      }
      @media (min-width : 1040px){
        body{
          background-image: url('tenor.gif');
          background-attachment: fixed;
          background-repeat: no-repeat;
          background-blend-mode:lighten;
          background-position: bottom right;
          background-size: 20vw;
        }
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
                  <a href="User.php" title="User Profile"><i class="fas fa-user fa-2x"></i></a>
              </li>
              <li class="movie">
                  <a href="../movie-center/movie_home.php"><i class="fas fa-film fa-2x"></i></a>
              </li>
              <li class="web-tag r-tag">
                Movie center
              </li>
          </ul>
      </nav>
      <div>
          <h1 class="main-heading">Popcorn Meter</h1>
      </div>
      <div class="theme">
        <i id="light" class="far fa-sun fa-2x"></i>
        <i id="dark" class="far fa-moon fa-2x"></i>
      </div>
  </header>
  
  <section class="box">
    <button class="btn new-poll" onclick="location.href='poll_create.php'">Create New Poll</button>
  </section>
  <section>
    <div class="sub-heading">Check Out Popular Polls</div>
    <ul class="universe">
      <li class="box">
        <div  class="item">
          <h3 class="wrap" id=<?php if(isset($ref[0])){echo $ref[0];} ?> onclick="view_polls(this.id)"><?php if(isset($question[0])){echo $question[0];} else {echo $null_msg;} ?></h3>
          <p><?php if(isset($total_count[0])){echo $total_count[0];} else {echo $create_msg;} ?></p>
        </div>
      </li>
      <li class="box">
        <div  class="item">
          <h3 class="wrap" id=<?php if(isset($ref[1])){echo $ref[1];}?> onclick="view_polls(this.id)"><?php if(isset($question[1])){echo $question[1];} else {echo $null_msg;} ?></h3>
          <p><?php if(isset($total_count[1])){echo $total_count[1];} else {echo $create_msg;} ?></p>
        </div>
      </li>
      <li class="box">
        <div  class="item">
          <h3 class="wrap" id=<?php if(isset($ref[2])){echo $ref[2];}?> onclick="view_polls(this.id)"><?php if(isset($question[2])){echo $question[2];} else {echo $null_msg;} ?></h3>
          <p><?php if(isset($total_count[2])){echo $total_count[2];} else {echo $create_msg;} ?></p>
        </div>
      </li>
      <li  class="box">
        <div  class="item">
          <h3 class="wrap" id=<?php if(isset($ref[3])){echo $ref[3];}?> onclick="view_polls(this.id)"><?php if(isset($question[3])){echo $question[3];} else {echo $null_msg;} ?></h3>
          <p><?php if(isset($total_count[3])){echo $total_count[3];} else {echo $create_msg;} ?></p>
        </div>
      </li>
      <li>
          <div class="link">
            <b>for more </b><a href="poll_search.php">Click here</a>
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
</html>
<script>
  function view_polls(id){
    location.href = "form_template.php?ref=" + id;
  }
  $(document).ready(function(){
  function dark_theme(){
      $.ajax({
          type: "GET",
          url: "../Homepage/page_theme.php",
          data: "msg=dark",
          success: function(data){
              document.getElementById("page-theme").setAttribute("href", "dark-main-template.css");
              document.getElementById("box-theme").setAttribute("href", "dark-box.css");
          }
      });
  }
  function light_theme(){
      $.ajax({
          type: "GET",
          url: "../Homepage/page_theme.php",
          data: "msg=light",
          success: function(data){
              document.getElementById("page-theme").setAttribute("href", "light-main-template.css");
              document.getElementById("box-theme").setAttribute("href", "light-box.css");
            }                    
      });
  }
      $('#light').click(light_theme);
      $('#dark').click(dark_theme);
  });
</script>


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
    <link rel="stylesheet" href="main-template.css">
    <link rel="stylesheet" href="box-arrange.css">
    <style>
      body{
          background-color: #ffebcd25;
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
          <h1 class="main-heading">Popcorn Meter</h1>
      </div>
      <div class="search-bar">
           <textarea id="query"></textarea><i class="fas fa-search fa-2x" onclick="search();"></i>
      </div>
  </header>

  <?php

          $i = 0;
          $array = array();
          while(!empty($_GET['var'.$i])){
              array_push($array,$_GET['var'.$i]);
              $i++;
          }
          if (!empty($array)){
            $cmd = "SELECT question,total_count FROM polls WHERE question LIKE ";
            for ($i = 0; $i < count($array); $i++){
              $str = $array[$i];
              $cmd .= "'%$str%'";
              if ($i != (count($array) -1)){
                $cmd .= "AND question LIKE";
              }
            }
            $cmd_2 = str_replace("question,total_count",'COUNT(*)',$cmd);
            $ct_info = mysqli_query($con, $cmd_2);
            $count = mysqli_fetch_row($ct_info)[0];
            if ($count > 0){
              $cmd .= " ORDER BY reg_date DESC";
              $data = mysqli_query($con, $cmd);
            }
            else{
              echo "<p style='color:red;text-align:center;'>We couldn't find your search. But Here are some matching results</p>";
                $cmd_2 = str_replace("AND","OR",$cmd_2);
                $ct_info = mysqli_query($con, $cmd_2);
                $count = mysqli_fetch_row($ct_info)[0];
                if ($count > 0){
                  $cmd = str_replace("AND","OR",$cmd);
                  $cmd .= " ORDER BY reg_date DESC";
                  $data = mysqli_query($con,$cmd);
                }
                else{
                  $cmd = "SELECT question,total_count FROM polls ORDER BY sno DESC";
                  $data = mysqli_query($con, $cmd);
                }
            }
          }
          else{
            $cmd = "SELECT question,total_count FROM polls ORDER BY sno DESC";
            $data = mysqli_query($con, $cmd); 
          } 
  ?>
  <section>
        <ul class="universe" id="polls">
          <?php
          function read($data){
            if($data) {
              while(($row = mysqli_fetch_assoc($data))){
                  echo '<li class="box">';
                  echo '<div class="item">'; //Add function view_poll() to redirect for individual polls
                  echo '<h3 onclick="view_poll();">'.$row["question"].'</h3>';
                  echo '<p> No of votes: '.$row["total_count"].'</p>';
                  echo '</div>';
                  echo '</li>';
              }
            }
          }
          read($data);
          ?>
        </ul>
  </section>
    <script>
        function view_poll(){
              location.href= "User.php"; // NEED TO ADD THE TEMPLATE PAGE LINKAGE TO THIS
        }
        function search(){
          var msg = "poll_search.php?";

          var query = document.getElementById('query').value;
          query = query.trim();
          var search_string = query.split(' ');
          for (let i = 0; i < search_string.length; i++){
            let str = search_string[i];
              msg += ("var"+i+"="+str);
               if (i != (search_string.length - 1)){
                msg += "&";
              }
            }
            window.location.href = msg;
        }
    </script>
  </body>
</html>
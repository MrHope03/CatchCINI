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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
    .header{
      background-image: url('search.png');
      background-position: center;
    }
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
                  <a href="User.php" title="User Profile"><i class="fas fa-user fa-2x"></i></a>
              </li>
              <li class="movie">
              <!-- CAn't able to link to movie center -->
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
      <div class="search-bar">
           <input type="text" id="query"></input>
           <i class="fas fa-search fa-2x" onclick="complete_search();"></i>
              <ul id="query-ans">
              </ul>
      </div>
  </header>
  <section>
        <ul class="universe" id="polls">
          <?php
           $cmd = "SELECT question,total_count,ref FROM polls ORDER BY sno DESC";
           $data = mysqli_query($con, $cmd);
          function read($data){
            if($data) {
              while(($row = mysqli_fetch_assoc($data))){
                if ($row["total_count"]==NULL) {$row["total_count"]=0;}
                  echo '<li class="box">';
                  echo '<div class="item">'; //Add function view_poll() to redirect for individual polls
                  echo '<h3 id="ref'.$row['ref'].'" onclick="view_poll(this.id);">'.$row["question"].'</h3>';
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
          $(document).ready(function(){
          function send_data(){
              $.ajax({
                  type: "GET",
                  url: "poll_cache.php?search=float",
                  data: search(),
                success:function(data){
                  document.getElementById('query-ans').innerHTML = data;
                }
              });
            }
          function send(){
              $.ajax({
                  type: "GET",
                  url: "poll_cache.php?search=static",
                  data: search(),
                  success:function(data){
                      document.getElementById('polls').innerHTML = data
                  }
              });
            }
            $("#query").keypress(function(event){
              var key = (event.keyCode ? event.keyCode : event.which);
              if(key == '13'){
                  send();
                  $('#query').blur();
                  no_search();
              }
            });
            $('#query').keyup(send_data);
          });
          document.getElementById('polls').addEventListener('mousedown',no_search);
          function view_poll(ref){
              var temp_ref = ref.slice(3);
              location.href= "form_template.php?ref="+temp_ref;
            }
          function no_search(){
              document.getElementById('query-ans').innerHTML = "";
          }
        function search(){
          var msg = "";

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
            return msg;
        }
    </script>
  </body>
</html>

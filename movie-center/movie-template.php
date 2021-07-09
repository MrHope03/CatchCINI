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

    if (isset($_SESSION["username"])){
    $username = $_SESSION["username"];
    }
    $movie_ref = $_GET["ref"];
    include 'movie_poll_cache.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <title><?=$movie_name?></title>
        <script
            src="https://kit.fontawesome.com/704ddf1c0b.js"
            crossorigin="anonymous"
        ></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="main-template.css" />
        <link rel="stylesheet" href="indiv-movie.css" />
    </head>
    <body>
        <header class="header" style="background-image: url(<?=$main_poster?>),linear-gradient(to bottom, #000000, #5f5f5f);">
            <nav class="nav">
                <ul>
                    <li class="poll">
                        <a href="../Polling-Site/poll_home.php"
                            ><i class="fas fa-poll fa-2x"></i
                        ></a>
                    </li>
                    <li class="web-tag l-tag">Popcorn Meter</li>
                    <li>
                        <a href="../Polling-Site/User.php"
                          title="User Profile"  ><i class="fas fa-user fa-2x"></i
                        ></a>
                    </li>
                    <li class="movie">
                        <a href="../movie-center/movie_home.php"
                            ><i class="fas fa-film fa-2x"></i
                        ></a>
                    </li>
                    <li class="web-tag r-tag">Movie center</li>
                </ul>
            </nav>
            <div class="movie-heading" >
                <h1><?=$movie_name?></h1>
                <div id="star_rating" class="movie-rating star-ratings-sprite">
                    <span style="width:<?=$percentage?>%" class="star-ratings-sprite-rating"></span>
                </div>
            </div>
        </header>
        <nav>
            <ul class="links">
                <li>
                    <a href="#story">STORY</a>
                </li>
                <li>
                    <a href="#cast">CAST</a>
                </li>
                <li>
                    <a href="#crew">CREW</a>
                </li>
                <li>
                    <a href="#trailer">TRAILER</a>
                </li>
                <li>
                    <a href="#polls">POLLS</a>
                </li>
                <li>
                    <a href="#comments">COMMENTS</a>
                </li>
            </ul>
        </nav>
        <section class="box">
            <!-- READ THE MOVIE INFO INTO THIS DA -->
            <div id="story">
                <h3>STORY</h3>
                <p class="text"><?=$story?></p>
            </div>
            <div id="cast">
                <h3>CAST</h3>
                <ul>
                    <li class="text">
                        <span class="cast"><?=$cast_01?></span> as
                        <span class="character"><?=$char_01?></span>
                    </li>
                </ul>
                <ul>
                    <li class="text">
                        <span class="cast"><?=$cast_02?></span> as
                        <span class="character"><?=$char_02?></span>
                    </li>
                </ul>
                <ul>
                    <li class="text">
                        <span class="cast"><?=$cast_03?></span> as
                        <span class="character"><?=$char_03?></span>
                    </li>
                </ul>
                <!-- Continue so on upto 5 is enough -->
            </div>
            <div id="crew">
                <h3>CREW</h3>
                <ul>
                    <li class="text">
                        <span class="cast">DIRECTED BY: </span>
                        <span class="character"><?=$crew_01?></span>
                    </li>
                </ul>
                <ul>
                    <li class="text">
                        <span class="cast">MUSIC BY: </span>
                        <span class="character"><?=$crew_02?></span>
                    </li>
                </ul>
                <ul>
                    <li class="text">
                        <span class="cast">PRODUCED BY: </span>
                        <span class="character"><?=$crew_03?></span>
                    </li>
                </ul>
                <!-- Continue so on upto 3/5 is enough -->
            </div>
            <div id="trailer">
                <h3>TRAILER</h3>
                <iframe class="trailer" src="https://www.youtube.com/embed/zheMCw4J-jI" width="560" height="315" frameborder="0"></iframe>
                <!--<video autoplay controls muted class="trailer">
                    <source src= type="video/mp4" />
                </video>-->
            </div>
            <div id="polls">
                <h3>POLLS</h3>
                <ul class="universe">
                    <?php
                        $i = 0;
                        if(isset($data)){
                            while($row = mysqli_fetch_assoc($data)){
                                if($row["total_count"]==null){$row["total_count"]=0;}
                                echo '<li class="outline">';
                                echo '<div  class="item">';
                                echo '<h3 class="wrap" id="'.$row["ref"].'" onclick="view_polls(this.id)">'.$row["question"].'</h3>';
                                echo '<p>No of Votes: '.$row["total_count"].'</p>';
                                echo '</div>';
                                echo '</li>';
                                $i++;
                            }
                        }
                        if($i<3){
                            $location = "location.href='../Polling-Site/poll_create.php'";
                            echo '<li class="outline">';
                            echo '<div  class="item" onclick="'.$location.'">';
                            echo '<h3 class="wrap"> #No More Polls Found </h3>';
                            echo '<p>Click to Create</p>';
                            echo '</div>';
                            echo '</li>';
                            // Add else part of link here to check
                        } else {
                            echo '<li>';
                            echo '<div class="link">';
                            echo '<b> for more </b><a href="movie_poll_site.php?ref='.$movie_ref.'">Click here</a>';
                            echo '</div>';
                            echo '</li>';
                        }
                    ?>

                </ul>
            </div>

        </section>
        <section id="comments" class="comment-section">
            <h3 class="comm-heading">COMMENTS</h3>
            <div>
                <i class="fas fa-filter fa-2x" onclick="filter()"></i> -
                <span>
                <i class="fas fa-star fa-x"></i>
                <i class="fas fa-star fa-x"></i>
                <i class="fas fa-star fa-x"></i>
                <i class="fas fa-star fa-x"></i>
                <i class="fas fa-star fa-x"></i>
                </span>
            </div>
            <div class="user-comments">
                <span class="user">USERNAME - </span>
                <span class="user-rating">
                    <i class="fas fa-star fa-x" id="sr-0" onclick="rate(this.id)" ></i>
                    <i class="fas fa-star fa-x" id="sr-1" onclick="rate(this.id)" ></i>
                    <i class="fas fa-star fa-x" id="sr-2" onclick="rate(this.id)" ></i>
                    <i class="fas fa-star fa-x" id="sr-3" onclick="rate(this.id)" ></i>
                    <i class="fas fa-star fa-x" id="sr-4" onclick="rate(this.id)" ></i>
                </span>
                <div class="new-comment">
                    <textarea placeholder="Comment Here..." id="new-comment" oninput="auto_grow(this)"></textarea>
                </div>
                <button class="submit-btn" onclick="submit()">SUBMIT</button>
            </div>

            <!-- READ COMMENTS INTO THIS DA -->
                  <?php
                  $cmd = "SELECT * from comments WHERE movie_ref like '%$movie_ref%'";
                  $data = mysqli_query($con, $cmd);
                  $i = 1;
                  if ($data){
                    while(($row = mysqli_fetch_assoc($data)) && ($i<=10)){
                      echo '<div class="comment" id="comment_'.$i.'"><div class="root"><p class="username">';
                      //$replies = explode(';',$row['replies']);
                      $temp = $row['root'];
                      //echo "<script>alert('$replies[0]');</script>";
                      if ($row['username']){
                        echo '<span class="user">'.$row['username'].' commented</span>';
                      }
                      else{
                        echo '<span class="user">Anonymous commented</span>';
                      }
                      if ($row['star_rating']==NULL) {
                        $row['star_rating'] = 0;
                      }
                      echo "<span class='user-star'>";
                      for($j=1; $j<=$row['star_rating']; $j++){
                        echo '<i class="fas fa-star fa-x" style="color: gold"></i>';
                      }
                      for($j=$row['star_rating']+1; $j<=5; $j++){
                        echo '<i class="fas fa-star fa-x" ></i>';
                      }
                      echo "</span>";
                      $i++;
                      echo '</p><p class="text">'.$temp.'</p><p class="shw-rpl"><span class="sel-rpl" style="display:none">'.$row['com_ref'].'</span><i class="fas fa-caret-down"></i>Show Replies</p></div></div>';
                    }
                  }
                  echo "<script>var mov = '$movie_ref';</script>";
                  echo "<script>var usern = '$username';</script>";
                  ?>
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

        $('.submit-btn').click(function(){
          var comm = "new-comment=" + document.getElementById('new-comment').value;
          comm += "&movie-ref=" + mov + "&star=" + star + "&user=" + usern;
          alert(comm);
          $.ajax({
            type: "GET",
            url: "movie-replies.php",
            data: comm,
            success:function(data){
              $('.comments-section').append(data);
            }
          });
        });

        function auto_grow(element) {
            element.style.height = "5px";
            element.style.height = (element.scrollHeight)+"px";
        }
        //document.getElementById('youtube').innerHTML = '<iframe src="https://www.youtube.com/embed/2OtgYcd83Qg" width="560" height="315" frameborder="0"></iframe>';

        $('.shw-rpl').click(function() {
          if ($(this).find('i').hasClass('fa-caret-down')){
            var obj = $(this).find('span').text();
            var id = $(this).parent().parent().attr('id');
            //alert(id);
          $(this).html('<span class="sel-rpl" style="display:none">'+obj+'</span><i class="fas fa-caret-up"></i>Hide Replies');
          obj = 'com_ref='+obj;
          $.ajax({
              type: "GET",
              url: "movie-replies.php",
              data: obj,
              success:function(data){
                  //alert(data);
                  $('#'+id).append(data);
                  //document.getElementById(id).innerHTML += data;
              }
          });
          }
          else{
          var obj = $(this).find('span').text();
          $(this).html('<span class="sel-rpl" style="display:none">'+obj+'</span><i class="fas fa-caret-down"></i>Show Replies');
          var id = $(this).parent().parent().attr('id');
          var i = 1;
          while($('#'+id+' div').length > 1){
            $('#reply_'+obj+'_'+i).remove();
            i++;
          }
          }
        });

        var star = 0;

        function view_polls(id){
            location.href = "../Polling-Site/form_template.php?ref="+id;
        }

        $('a[href^="#"]').click(function() {
            var href = $.attr(this, 'href');
            $('html,body').animate({
                scrollTop: $(href).offset().top
            }, 500);
        });

        function movie_rating(rating){
            // ratiing is the variable
            for (let i = 0; i < rating; i++){
                document.getElementById('r-'+i).style.color = "gold";
            }
        }
        movie_rating(4); // Substitute rating varaible in here
        function rate(id){
            id = Number(id.substring(3));
            star = id+1;
            for (let i = 0; i <= 4; i++){
                document.getElementById('sr-'+i).style.color = "whitesmoke";
            }
            for (let i = 0; i <= id; i++){
                document.getElementById('sr-'+i).style.color = "gold";
            }
        }
    </script>
</html>

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
    }else {
      $username = "Anonymous";
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
        <link rel="stylesheet" href="light-main-template.css" />
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
                <iframe class="trailer" src=<?=$trailer?> width="560" height="315" frameborder="0"></iframe>
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
                <span class='sort'>
                  <span class="r1" id="sel-sort">Most Recent</span>
                  |
                  <span class="r2">Least Recent</span>
                  |
                  <span class="r3">Most Rated</span>
                  |
                  <span class="r4">Least Rated</span>
                </span>
            </div>
            <div class="user-comments">
              <span id="input-star">
                <span class="user">Rate Here - </span>
                <span class="user-rating">
                    <i class="fas fa-star fa-x" id="sr-0" onclick="rate(this.id)" ></i>
                    <i class="fas fa-star fa-x" id="sr-1" onclick="rate(this.id)" ></i>
                    <i class="fas fa-star fa-x" id="sr-2" onclick="rate(this.id)" ></i>
                    <i class="fas fa-star fa-x" id="sr-3" onclick="rate(this.id)" ></i>
                    <i class="fas fa-star fa-x" id="sr-4" onclick="rate(this.id)" ></i>
                </span>
              </span>
                <div class="new-comment">
                    <textarea placeholder="Comment Here..." id="new-comment" oninput="auto_grow(this)"></textarea>
                </div>
                <button class="submit-btn">SUBMIT</button>
            </div>

            <!-- READ COMMENTS INTO THIS DA -->
                  <?php
                  $cmd = "SELECT * from comments WHERE movie_ref like '%$movie_ref%' ORDER BY sno DESC";
                  $data = mysqli_query($con, $cmd);
                  $i = 1;
                  if ($data){
                    while(($row = mysqli_fetch_assoc($data))){
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
                      echo '</p>';
                      echo '<p class="text">'.$temp.'</p>';
                      //echo '<p class="reply-here">Reply Here</p>';
                      echo '<p class="shw-rpl"><i class="fas fa-caret-down">
                      <span class="sel-rpl" style="display:none">'.$row['com_ref'].
                      '</span><span class="show">Show Replies</span></i><i class="fas fa-reply">
                      <span class="reply-here">Reply Here</span></i></p></div></div>';
                    }
                  }
                  echo "<script>var no = $i; var mov = '$movie_ref';
                  var sel_sort = $('#sel-sort').attr('class');</script>";
                  if (isset($username)){
                    echo "<script>var usern = '$username';</script>";
                  }
                  else{
                    echo "<script>var usern = 'Anonymous';</script>";
                  }

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

        $(document).on('click','.r1, .r2, .r3, .r4', function(){
          document.getElementById('sel-sort').id = "";
          $(this).attr('id','sel-sort');
          sel_sort = $(this).attr('class');
          var filt = "sel_sort="+sel_sort+"&movie-ref="+mov;
          //alert(sel_sort);
          $.ajax({
            type: "GET",
            url: "movie-replies.php",
            data: filt,
            success:function(data){
          while($('.comment-section div').length >= 4){
            $('.comment-section div').last().remove();
          }
          $('.comment-section').append(data);
        }
        });

        });

        $('.submit-btn').click(function(){
          var comm = "new-comment=" + document.getElementById('new-comment').value;
          comm += "&movie-ref=" + mov + "&star=" + star + "&user=" + usern + "&no=" + no + "&sel-sort=" + sel_sort;
          no++;
          $.ajax({
            type: "GET",
            url: "movie-replies.php",
            data: comm,
            success:function(data){
              for (let i = 0; i <= 4; i++){
                  document.getElementById('sr-'+i).style="";
              }
              star = 0;
              document.getElementById('new-comment').value = "";
              while($('.comment-section div').length >= 4){
                $('.comment-section div').last().remove();
              }
              $('.comment-section').append(data);
            }
          });
        });

        function auto_grow(element) {
            element.style.height = "5px";
            element.style.height = (element.scrollHeight)+"px";
        }

        $(document).on('click','.rep-submit-btn',function(){
          var rep_msg = $(this).prev().val();
          var id = $(this).parent().prev();
          rep_msg = "rep_msg=" + rep_msg;
          rep_msg = rep_msg + "&comm_ref=" + $(this).parent().prev().find('.sel-rpl').text();
          rep_msg = rep_msg + "&usern=" + usern;
          //alert(rep_msg);
          $.ajax({
            type: "GET",
            url: "movie-replies.php",
            data: rep_msg,
            success:function(data){
              id.next().remove();
              id.find('.fa-reply').css('display','inline-block');
              var tl = id.parent().attr('id');
              while($('#'+tl+' div').length >= 2){
                $('#'+tl+' div').last().remove();
              }
              id.parent().append(data);
              //alert(tl);
            }
          });
        });

        var corr = [];
        //$(document).on('click','.fa-caret-down',reply_modify());
        $(document).on('click', '.fa-caret-down, .fa-caret-up', function() {
            var obj = $(this).find('.sel-rpl').text();
            var id = $(this).parent().parent().parent().attr('id');
            //alert(id);
          obje = 'com_ref='+obj;
          if (typeof corr[id.substr(-1)] === 'undefined'){
            corr[id.substr(-1)]=1;
          }
          else{
            corr[id.substr(-1)]++;
          }
          //alert(corr[id.substr(-1)]);
          if ((corr[id.substr(-1)]%2)==1)
        {
          $(this).html('<span class="sel-rpl" style="display:none">'+obj+'</span><span class="hide">Hide Replies</span>');
          $(this).removeClass('fa-caret-down').addClass('fa-caret-up');
          $.ajax({
              type: "GET",
              url: "movie-replies.php",
              data: obje,
              success:function(data){
                  //alert(data);
                  $('#'+id).append(data);
                  //document.getElementById(id).innerHTML += data;
              }
          });
        }
        else
        {
          $(this).addClass('fa-caret-down').removeClass('fa-caret-up');
          $(this).html('<span class="sel-rpl" style="display:none">'+obj+'</span><span class="show">Show Replies</span>');
          id = $(this).parent().parent().parent().attr('id');
          while($('#'+id+' div').length >= 2){
            $('#'+id+' div').last().remove();
          }
          $(this).next().css('display','inline-block');
        }
        }
      );

        $(document).on('click', '.reply-here', function(){
          var pre = $(this).parent().prev();
          var obj = pre.find('.sel-rpl').text();
          var id = pre.parent().parent().parent().attr('id');
          //alert(id);
          obje = 'com_ref='+obj;
          if (typeof corr[id.substr(-1)] === 'undefined'){
            corr[id.substr(-1)]=1;
          }
          else{
            corr[id.substr(-1)]++;
          }
          if ((corr[id.substr(-1)]%2)==1)
          {
            pre.html('<span class="sel-rpl" style="display:none">'+obj+'</span><span class="hide">Hide Replies</span>');
            pre.removeClass('fa-caret-down').addClass('fa-caret-up');
            $.ajax({
              type: "GET",
              url: "movie-replies.php",
              data: obje,
              success:function(data){
                $('#'+id).append(data);
              }
            });
          }
          else{
            corr[id.substr(-1)]--;
            while($('#'+id+' div').length >= 2){
              $('#'+id+' div').last().remove();
            }
            $.ajax({
              type: "GET",
              url: "movie-replies.php",
              data: obje,
              success:function(data){
                $('#'+id).append(data);
              }
            });
          }
          var str = '<div class="reply"><textarea class="reply-text" oninput="auto_grow(this)"></textarea><input type="button" class="rep-submit-btn" value="Submit Reply"></div>';
          $('#'+id).append(str);
          pre.parent().parent().css('margin-bottom','20px');
          pre.parent().parent().next().css('background-color','#00000000');
          $(this).parent().css('display','none');
          return false;
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

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
        .header{
            background-image: url('Movie.jpg');
            background-blend-mode: overlay;
        }
    </style>
  </head>
  <body>
    <header class="header">
        <nav class="nav">
            <ul>
                <li class="poll">
                    <a href="../Polling-Site/poll_home.php"><i class="fas fa-poll fa-2x"></i></a>
                </li>
                <li class="web-tag l-tag">
                    Popcorn Meter
                </li>
                <li>
                    <a href="../Polling-Site/User.php" title="User Profile"><i class="fas fa-user fa-2x"></i></a>
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
            <h1 class="main-heading">Movie Center</h1>
        </div>
    </header>
    <section>
        <ul class="universe" id="polls">
            <div class="sub-heading">Check Out Latest Movies</div>
            <div class="search-bar">
                <i class="fas fa-search fa-2x"></i>
                 <input type="text" id="query"></input>
            </div>
            <li class="box">
                <div class="item">
                    <div class="movie-tile">
                        <div>
                            <img src="Jagame thandiram.gif" height="70px">
                        </div>
                        <div>
                        <h3 class="movie-heading" onclick="location.href='movie-template.php'">JAGAME THANDIRAM</h3>
                        </div>
                        <div>
                        <p>2021</p>
                        </div>
                        <div>
                        <i class="fas fa-star fa-x"></i>
                        <i class="fas fa-star fa-x"></i>
                        <i class="fas fa-star fa-x"></i>
                        <i class="fas fa-star fa-x"></i>
                        <i class="fas fa-star fa-x"></i>
                        </div>
                    </div>
                </div>
            </li>
            <!-- <?php
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
            ?> -->
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
    <script>
            function movie_rating(rating){
            // ratiing is the variable
            for (let i = 0; i < rating; i++){
                document.getElementById('r-'+i).style.color = "gold";
            }
            }
            movie_rating(4); // Substitute rating varaible in here
    </script>
  </body>
</html>
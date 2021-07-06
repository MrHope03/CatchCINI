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

    $cmd = "SELECT COUNT(*) FROM movie";
    $data = mysqli_query($con, $cmd);
    $total_movie = mysqli_fetch_row($data)[0];

    $cmd = "SELECT home_poster,movie_name,year,star_rating,movie_ref FROM movie";
    $data = mysqli_query($con, $cmd);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Movie Site</title>
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
            <?php
            while($row = mysqli_fetch_assoc($data)){
                echo  '<li class="box">';
                echo  '<div class="item">';
                echo  '<div class="movie-tile">';
                echo  '<div>';
                echo  '<img src="'.$row["home_poster"].'" height="70px">';
                echo  '</div>';
                echo  '<div>';
                echo  '<h3 class="movie-heading" id="'.$row["movie_ref"].'" onclick="redirect(this.id)">'.$row["movie_name"].'</h3>';
                echo  '</div>';
                echo  '<div>';
                echo  '<p>'.$row["year"].'</p>';
                echo  '</div>';
                echo  '<div id="star_rating">';
                echo  '<i class="fas fa-star fa-x"></i>';
                echo  '<i class="fas fa-star fa-x"></i>';
                echo  '<i class="fas fa-star fa-x"></i>';
                echo  '<i class="fas fa-star fa-x"></i>';
                echo  '<i class="fas fa-star fa-x"></i>';
                echo  '</div>';
                echo  '</div>';
                echo  '</div>';
                echo  '</li>';
            }
            ?>
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
            function redirect(id){
                window.location.href = "movie-template.php?ref="+id;
            }
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
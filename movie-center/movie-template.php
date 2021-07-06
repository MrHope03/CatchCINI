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

    $cmd = "SELECT * FROM movie where movie_ref LIKE '$movie_ref'";
    $data = mysqli_query($con, $cmd);
    if(!$data){echo $con->error;}
    $row = mysqli_fetch_assoc($data);
    $movie_name = $row["movie_name"];
    $year = $row["year"];
    $star_rating = $row["star_rating"];
    $total_votes = $row["total_votes"];
    $story = $row["story"];
    $cast_01 = $row["cast_01"];
    $cast_02 = $row["cast_02"];
    $cast_03 = $row["cast_03"];
    $char_01 = $row["char_01"];
    $char_02 = $row["char_02"];
    $char_03 = $row["char_03"];
    $crew_01 = $row["crew_01"];
    $crew_02 = $row["crew_02"];
    $crew_03 = $row["crew_03"];
    $trailer = $row["trailer"];
    $main_poster = $row["main_poster"];
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
                <div class="movie-rating">
                    <i class="fas fa-star fa-x" id="r-0"></i>
                    <i class="fas fa-star fa-x" id="r-1"></i>
                    <i class="fas fa-star fa-x" id="r-2"></i>
                    <i class="fas fa-star fa-x" id="r-3"></i>
                    <i class="fas fa-star fa-x" id="r-4"></i>
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
                <video autoplay controls muted class="trailer">
                    <source src=<?=$trailer?> type="video/mp4" />
                </video>
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
                <div>
                    <textarea rows="3"></textarea>
                </div>
                <button class="submit-btn" onclick="submit()">SUBMIT</button>
            </div>

            <!-- READ COMMENTS INTO THIS DA -->
            <div class="comment box">
                <p>
                    <span class="user">username</span> -
                    <!-- FOR LOOP USE PANNI STARS PRINT PANNU DA AUTOMATICALLY GOLD AH THAN VARUM -->
                        <i class="fas fa-star fa-x"></i>
                        <i class="fas fa-star fa-x"></i>
                        <i class="fas fa-star fa-x"></i>
                        <i class="fas fa-star fa-x"></i>
                        <i class="fas fa-star fa-x"></i>
                </p>
                <p class="text">Was an excellent Commercial movie</p>
            </div>
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
            for (let i = 0; i <= 4; i++){
                document.getElementById('sr-'+i).style.color = "whitesmoke";
            }
            for (let i = 0; i <= id; i++){
                document.getElementById('sr-'+i).style.color = "gold";
            }
        }
    </script>
</html>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <title>Poll</title>
        <script
            src="https://kit.fontawesome.com/704ddf1c0b.js"
            crossorigin="anonymous"
        ></script>
        <link rel="stylesheet" href="main-template.css" />
        <link rel="stylesheet" href="indiv-movie.css" />
        <style>
            body {
                background-image: url("giphy.gif");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-blend-mode: color-dodge;
                background-color: #ffebcd25;
                background-position: center;
                background-size: 70vw;
            }
            @media (min-width: 1040px) {
                body {
                    background-image: url("tenor.gif");
                    background-attachment: fixed;
                    background-repeat: no-repeat;
                    background-blend-mode: lighten;
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
                        <a href="../Polling-Site/poll_home.php"
                            ><i class="fas fa-poll fa-2x"></i
                        ></a>
                    </li>
                    <li class="web-tag l-tag">Popcorn Meter</li>
                    <li>
                        <a href="../Polling-Site/User.php"
                            ><i class="fas fa-user fa-2x"></i
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
            <div class="movie-heading">
                <h1>JAGAME THANDIRAM</h1>
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
                <p class="text">
                    A nomadic gangster finds himself caught between good and
                    evil in a fight for a place to call home. Starring Dhanush,
                    Aishwarya Lekshmi and James Cosmo.
                </p>
            </div>
            <div id="cast">
                <h3>CAST</h3>
                <ul>
                    <li class="text">
                        <span class="cast">DHANUSH</span> as
                        <span class="character">SURULI</span>
                    </li>
                </ul>
                <ul>
                    <li class="text">
                        <span class="cast">DHANUSH</span> as
                        <span class="character">SURULI</span>
                    </li>
                </ul>
                <ul>
                    <li class="text">
                        <span class="cast">DHANUSH</span> as
                        <span class="character">SURULI</span>
                    </li>
                </ul>
                <!-- Continue so on upto 5 is enough -->
            </div>
            <div id="crew">
                <h3>CREW</h3>
                <ul>
                    <li class="text">
                        <span class="cast">DIRECTOR: </span>
                        <span class="character">KARTHIK SUBBURAJ</span>
                    </li>
                </ul>
                <ul>
                    <li class="text">
                        <span class="cast">MUSIC BY: </span>
                        <span class="character">SHANTOSH NARAYANAN</span>
                    </li>
                </ul>
                <ul>
                    <li class="text">
                        <span class="cast">MUSIC BY: </span>
                        <span class="character">SHANTOSH NARAYANAN</span>
                    </li>
                </ul>
                <!-- Continue so on upto 3/5 is enough -->
            </div>
            <div id="trailer">
                <h3>TRAILER</h3>
                <video autoplay controls muted class="trailer">
                    <source src="Jagame-thandiram.mp4" type="video/mp4" />
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
                    <i class="fas fa-star fa-x" id="sr-0" onclick="rate(this.id)" onmouseover="color_star(this.id)" onmouseout="uncolor_star(this.id)"></i>
                    <i class="fas fa-star fa-x" id="sr-1" onclick="rate(this.id)" onmouseover="color_star(this.id)" onmouseout="uncolor_star(this.id)"></i>
                    <i class="fas fa-star fa-x" id="sr-2" onclick="rate(this.id)" onmouseover="color_star(this.id)" onmouseout="uncolor_star(this.id)"></i>
                    <i class="fas fa-star fa-x" id="sr-3" onclick="rate(this.id)" onmouseover="color_star(this.id)" onmouseout="uncolor_star(this.id)"></i>
                    <i class="fas fa-star fa-x" id="sr-4" onclick="rate(this.id)" onmouseover="color_star(this.id)" onmouseout="uncolor_star(this.id)"></i>
                </span>
                <div>
                    <textarea rows="3"></textarea>
                </div>
                <button onclick="submit()">SUBMIT</button>
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
        function movie_rating(rating){
            // ratiing is the variable
            for (let i = 0; i < rating; i++){
                document.getElementById('r-'+i).style.color = "gold";
            }
        }
        movie_rating(4); // Substitute rating varaible in here
        function color_star(id){
            id = Number(id.substring(3));
            for (let i = 0; i <= id; i++){
                document.getElementById('sr-'+i).style.color="gold";
            }
        }
        function uncolor_star(id){
            id = Number(id.substring(3));
            for (let i = 0; i <= id; i++){
                document.getElementById('sr-'+i).style.color="blanchedalmond";
            }
        }
        function rate(id){
            id = Number(id.substring(3));
            for (let i = 0; i <= id; i++){
                document.getElementById('sr-'+i).style.color="gold";
                document.getElementById('sr-'+i).removeEventListener('mouseout',uncolor_star);
            }
        }
    </script>
</html>

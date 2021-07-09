<?php
    session_start();
    if(empty($_SESSION['theme'])){
        $_SESSION['theme'] = 'light';
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Home</title>
        <script
            src="https://kit.fontawesome.com/704ddf1c0b.js"
            crossorigin="anonymous"
        ></script>
        <link
            id="mode"
            rel="stylesheet"
            type="text/css"
            href="<?php if($_SESSION['theme'] == 'light'){echo 'home-light.css';}else{echo 'home-dark.css';}  ?>""
        />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <header class="container">
            <div class="item item-1 left-bg">
                <div class="theme">
                <i id="light" class="far fa-sun fa-2x"></i>
                <i id="dark" class="far fa-moon fa-2x"></i>
                </div>
                <div>
                    <a href="../Polling-Site/poll_home.php" class="main-heading">POPCORN METER</a>
                    <p class="caption">Make poll on movies</p>
                </div>
            </div>
            <div class="item item-2 right-bg">
                <div>
                    <a href="../movie-center/movie_home.php" class="main-heading">MOVIES CENTER</a>
                    <p class="caption">Catch the Latest movies</p>
                </div>
            </div>
        </header>
        <footer class="end-credit">
            <b style="color: white">POPCORNCRUNCHERS</b>
            <div class="white">
                <a href="#"
                    ><i style="color: white" class="fab fa-instagram fa-2x"></i
                <!-- ></a>
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
            $(document).ready(function(){
            function dark_theme(){
                $.ajax({
                    type: "GET",
                    url: "page_theme.php",
                    data: "msg=dark",
                    success: function(data){
                        document.getElementById("mode").setAttribute("href", "home-dark.css");
                    }
                });
            }
            function light_theme(){
                $.ajax({
                    type: "GET",
                    url: "page_theme.php",
                    data: "msg=light",
                    success: function(data){
                        document.getElementById("mode").setAttribute("href", "home-light.css");
                    }                    
                });
            }
                $('#light').click(light_theme);
                $('#dark').click(dark_theme);
        });
        </script>
    </body>
</html>

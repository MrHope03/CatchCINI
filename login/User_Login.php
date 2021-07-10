<?php
    session_start();
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="login-dark.css">
    </head>

    <body class="bg">
        <div class="container">
            <div class="heading">
                <h1>Welcome Back</h1>
                <h3><i>Login</i></h3>
            </div>
            <form action="User_Authentication.php" method="POST">
                <div>
                    <label for="login_id"> USERNAME </label>
                    <input type="text" name="login" id="login_id">
                </div>
                <div>
                    <label for="password_id"> PASSWORD </label>
                    <input type="password" name="password" id="password_id"><br>
                </div>
                
                <input type="submit" name="submit" id="submit_id" value="Sign In">
            </form>
            <p style="text-align:center;">
            New to PopcornCruncher?
            <a href="User_Signup.php"> Create an account. </a>
            </p>
        </div>
    </body>
</html>
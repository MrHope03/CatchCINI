<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
        <title>Login</title>
        <style>
            body {
                font-size: 16px;
                line-height: 50px;
                letter-spacing: 0.5px;
            }
            
            div {
                background-color: rgb(246, 248, 250);
                display: block;
                box-sizing: border-box;
                width: 25%;
                margin: auto;
                border: 1px solid;
                border-radius: 5px;
                line-height: 20px;
                padding: 20px;
            }
            
            input {
                margin: 5px 0px 15px;
                display: inline-block;
                font: 400 13.3333px Arial;
                padding: 5px 10px;
                border-width: 2px;
                border-style: inset;
                border-color: rgb(118, 118, 118);
                border-radius: 5px;
                width: 100%;
            }
            
            input[type=submit] {
                text-align: center;
                margin-top: 20px;
                margin-bottom: 1px;
                cursor: pointer;
                background-color: rgb(49, 175, 84);
                color: antiquewhite;
                font-weight: 800px;
            }
            
            a {
                float: right;
            }
            
            p {
                border: 1px solid grey;
                border-radius: 5px;
                padding: 5px 20px;
                text-align: center;
                margin: auto;
                display: block;
                width: 23%;
                margin-block-start: 3em;
                margin-block-end: 1em;
            }
        </style>
    </head>

    <body>
        <h1 style="text-align:center;"><i>Sign into PopcornCruncher</i></h1>
        <div>
            <form action="User_Authentication.php" method="POST">
                <label for="login_id"> Username </label>
                <input type="text" name="login" id="login_id">
                <label for="password_id"> Password </label>
                <a href="reset_password.php">Forgot Password?</a>
                <input type="password" name="password" id="password_id"><br>
                <input type="submit" name="submit" id="submit_id" value="Sign In">
            </form>
        </div>
        <p>
            New to PopcornCruncher?
            <a href="User_Signup.php"> Create an account. </a>
        </p>
    </body>
</html>
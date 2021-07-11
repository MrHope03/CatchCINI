<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="login-dark.css">
</head>

<body class="bg">
    <div class="container">
        <div class="heading">
        <h1>Welcome to PopcornCruncher</h1>
        <h4><i>Create Your New PopcornCruncher Account</i></h4>
        </div>
        <form id="form_id" name='form' action="User_Update.php" method="POST" >
            <div>
                <label>
                    FIRST NAME <span class="imp"> </span>
                    <input type="text" name="first_name" id="first_name_id" placeholder="First Name" required>
                </label>
                <label>
                    LAST NAME
                    <input type="text" name="last_name" id="last_name_id" placeholder="Last Name">
                </label>
            </div>    
            <br>
            <div>
                <label> 
                    EMAIL <span class="imp"> </span>
                    <input type="email" name="mail" id="mail_id" placeholder="Email Address" required>
                </label>
            </div>
            <br>
            <div>
                <label>
                    CREATE USERNAME
                    <span class="imp"> </span>
                    <span id="user_msg" class="error"></span>
                    <br>
                    <input style="width: 46.5%;margin: 2px 0px 5px;display: inline-block;" type="text" name="username" id="username_id" placeholder="Username" required> 
                    <a style="margin:0px 15px 30px 15px;width:23%;" href="javascript:user_check()">Check for availability</a>
                </label>
            </div>
            <br>
            <div>
                <label>
                    PHONE <span class="imp"> </span> <br> 
                    <input style="width: 46.5%;" type="tel" name="phone_no" id="phone_no_id" placeholder="Phone" pattern="[6-9][0-9]{9}" required>
                </label>
            </div>
            <div>
                <label>
                PASSWORD <span id="pass_msg" class="error"></span>
                <span class="imp"> </span>
                <input style="width: 46.5%;" type="password" name="password" id="password_id" placeholder="Password" onkeyup="check();" required>
                </label>
                <label>
                CONFIRM PASSWORD <span class="imp"> </span>
                <input style="width: 46.5%;" type="password" name="con_password" id="con_password_id" placeholder="Confirm Password" onkeyup="check();" required>
                </label>
            </div>
            <input type="submit" name="submit" id="submit_id" value="Sign Up">
        </form>
        <p style="text-align:center;">
            Already have an account?
            <a href="User_Login.php"> Log in. </a>
        </p>
    </div>
    <script>
        function check(){
            let pass1 = document.getElementById("password_id").value;
            let pass2 = document.getElementById("con_password_id").value;
            if(pass1 != pass2){
                document.getElementById("pass_msg").innerHTML = "Password Mismatch.";
            } else {
                document.getElementById("pass_msg").innerHTML = "Password Match Success.";
            }
        }
        function user_check() {
            let username = document.getElementById("username_id").value;
            let first_name = document.getElementById("first_name_id").value;
            let last_name = document.getElementById("last_name_id").value;
            let mail = document.getElementById("mail_id").value;
            let phone_no = document.getElementById("phone_no_id").value;
            localStorage.setItem("first_name",first_name);
            localStorage.setItem("last_name",last_name);
            localStorage.setItem("mail",mail);
            localStorage.setItem("phone_no",phone_no);
            localStorage.setItem("username",username);
            window.location.href = "UserSignup.php?username=" + username;
        }
    </script>
</body>

</html>

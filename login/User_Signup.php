<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
    <title>Sign Up</title>
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
            width: 60%;
            margin: auto;
            border: 1px solid;
            border-radius: 5px;
            line-height: 20px;
            padding: 10px 40px;
        }
        
        input {
            margin: 30px 10px 10px;
            display: inline-block;
            font: 400 13.3333px Arial;
            padding: 5px 10px;
            border-width: 2px;
            border-style: inset;
            border-color: rgb(118, 118, 118);
            border-radius: 5px;
            width: 96.5%;
            height: 35px;
        }
        
        input[type=submit] {
            text-align: center;
            margin: 20px 10px 10px;
            cursor: pointer;
            background-color: rgb(49, 175, 84);
            color: antiquewhite;
            font-weight: 800px;
        }
        
        p {
            border: 1px solid grey;
            border-radius: 5px;
            padding: 5px 20px;
            text-align: center;
            margin: auto;
            display: block;
            width: 30%;
            margin-block-start: 3em;
            margin-block-end: 1em;
        }
        
        h1 {
            color: #202124;
            padding-bottom: 10px;
            padding-top: 10px;
            font-size: 25px;
            font-weight: 400;
            line-height: 1.3333;
            margin: 0px 10px;
        }
        
        .inputss {
            width: 46.5%;
            margin: 0px 10px;
        }
    </style>
</head>

<body>
    <div>
        <h1><i>PopcornCruncher</i></h1>
        <h1><i>Create Your New PopcornCruncher Account</i></h1>
        <form id="form_id" name='form' action="User_Update.php" method="POST" >
            <input type="text" name="first_name" id="first_name_id" class="inputss" placeholder="First Name" required>
            <input type="text" name="last_name" id="last_name_id" class="inputss" placeholder="Last Name">
            <input type="email" name="mail" id="mail_id" placeholder="Email Address" required>
            <input style="width: 46.5%;margin: 20px 10px 0px;" type="text" name="username" id="username_id" placeholder="Username" required> 
            <input style="width: 46.5%;margin: 20px 10px 0px;" type="tel" name="phone_no" id="phone_no_id" placeholder="Phone" pattern="[6-9][0-9]{9}" required>
            <a style="margin:0px 15px 30px 15px;width:23%;" href="javascript:user_check()">Check for availability</a>
            <label id="user_msg"></label><br>
            <label id="pass_msg" style="margin:0px 30px;float:right"></label><br>
            <input style="width: 46.5%;margin: 0px 10px;" type="password" name="password" id="password_id" placeholder="Password" required>
            <input style="width: 46.5%;margin: 0px 10px;" type="password" name="con_password" id="con_password_id" placeholder="Confirm Password" onkeyup="check();" required>
            <input type="submit" name="submit" id="submit_id" value="Sign Up">
        </form>
    </div>
    <p>
        Already have an account?
        <a href="User_Login.php"> Log in. </a>
    </p>
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

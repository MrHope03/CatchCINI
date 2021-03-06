<?php
  session_start();
  if(isset($_SESSION["username"])){
    $username = $_SESSION["username"];
  } else {
    echo '<script> alert("Log in to get access!!"); </script>';
    $_SESSION["location"] = "polling_site";
    echo '<script> window.location.href="../login/User_Login.php"; </script>';
  }
  if (!isset($_SESSION['theme'])){
    $_SESSION['theme'] = 'light';
  }
  $theme = $_SESSION['theme'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
  <script src="https://kit.fontawesome.com/704ddf1c0b.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?php if($_SESSION['theme'] == 'light'){echo 'light-main-template.css';}else{echo 'dark-main-template.css';} ?>" />
  <title>Create a Poll</title>
  <?php
  if ($_SESSION['theme'] != 'light'){
    echo "<style>
    .box{
      border: 2px solid rgb(213, 240, 235); */
      color: rgb(224, 218, 218);
      box-shadow: 0px 0px 20px cyan;
    }
    </style>";
  }
  echo "<script>var theme = '$theme';</script>";
  ?>
</head>
<body>
  <header class="header">
    <nav class="nav">
      <ul>
        <li class="poll">
          <a href="poll_home.php"><i class="fas fa-poll fa-2x"></i></a>
        </li>
        <li class="web-tag l-tag">
          Popcorn Meter
        </li>
        <li>
            <a href="User.php" title="User Profile"><i class="fas fa-user fa-2x"></i></a>
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
      <h1 class="main-heading">Create ur Own poll</h1>
    </div>
  </header>
  <div class="container">
    <div class="box">
      <form action="poll_update.php" method="POST">
        <div class="poll-qn">
          <label for="question"> Give Poll Question </label>
          <textarea placeholder="Type your question here" name="question" id="q" required></textarea>
          <input type="button" class="btn add" value="Add an option" onclick="add_option()" />
        </div>
        <div class="option-table" id="options">
          <div class="option-header">
            <label for="options"> Options </label>
            <span id="error"></span>
          </div>
          <div class="option-box" id="#1">
            <input type="text" class="poll-option" name="options1" id="1" required/>
            <i id="rem1" onclick="remove_option(this.id)" class="far fa-times-circle fa-2x close"></i>
            <i id="swa1" onclick="swap_val(this.id)" class="far fa-dot-circle fa-2x edit"></i>
          </div>
          <div class="option-box" id="#2">
            <input type="text" class="poll-option" name="options2" id="2" required/>
            <i id="rem2" onclick="remove_option(this.id)" class="far fa-times-circle fa-2x close"></i>
            <i id="swa2" onclick="swap_val(this.id)" class="far fa-dot-circle fa-2x edit"></i>
          </div>
        </div>
        <input type="submit" class="btn submit" value="Create Poll" onclick="send()" />
        <input type="text" style="display:none;" name="hidden_val" id="hidden_val" >
      </form>
    </div>
  </div>
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
    var id = 2;
    var sw_1 = 1000;
    var sw_2 = 1000;

    function add_option() {
      id++;
      if (id < 7){
        var a = [];
        for (var i = 1; i <= id-1; i++) {
          a[i - 1] = document.getElementById(i).value;
        }

        var rem = "rem" + id;
        var swa = "swa" + id;
        var options = document.getElementById("options");
        options.innerHTML +=
          '<div class="option-box" id="#'+ id + '"><input type="text"class="poll-option" required name="options' + id + '" id="' +
          id +
          '"><i id="' +
          rem +
          '" onclick="remove_option(this.id)" class="far fa-times-circle fa-2x close"></i><i id="' +
          swa +
          '" onclick="swap_val(this.id)" class="far fa-dot-circle fa-2x edit"></i></div>';
        for (var i = 1; i < id; i++) {
          document.getElementById(i).value = a[i - 1];
        }
      }
      else{
        document.getElementById('error').innerHTML = "Option Limit Exceeded";
        id--;
        setTimeout(error_dis, 1000);
      }
    }

    function error_dis(){
      document.getElementById('error').innerHTML = "";
    }

    function remove_option(remid) {
      if (id > 2) {
        var rem_temp = remid.substring(0, 3);
        var id_temp = parseInt(remid.substring(3));

        var ar = [];
        for (var i = 1; i < id_temp; i++) {
          ar[i - 1] = document.getElementById(i).value;
        }
        var br = [];
        for (var i = id_temp + 1; i <= id; i++) {
          br[i - id_temp - 1] = document.getElementById(i).value;
        }
        var container = document.getElementById('#'+id_temp).outerHTML;
        var entire = document.getElementById("options");
        entire.innerHTML = entire.innerHTML.replace(container,"");
        for (var i = 1; i < id_temp; i++) {
          document.getElementById(i).value = ar[i - 1];
        }
        for (var i = id_temp + 1; i <= id; i++) {
          var z = document.getElementById('#' + i);
          var a = document.getElementById(i);
          var b = document.getElementById(rem_temp + i);
          var c = document.getElementById("swa" + i);
          var j = i - 1;
          z.id = '#'+j;
          a.id = j;
          a.value = br[i - id_temp - 1];
          b.id = rem_temp + j;
          c.id = "swa" + j;
        }
        id--;
      }
      else{
        document.getElementById('error').innerHTML = "Atleast two options neccessary";
        setTimeout(error_dis, 1000);
      }
    }

    var butt = false;
    var cl = false;

    function wait() {
      if (!butt) {
        setTimeout(wait, 150);
      } else {
        swap();
      }
    }

    function swap_val(tt) {
      if (cl == false) {
        sw_1 = parseInt(tt.substring(3));
        document.getElementById(tt).style.color="green";
        wait();
        cl = true;
      } else {
        document.getElementById(tt).style.color="green";
        sw_2 = parseInt(tt.substring(3));
        butt = true;
      }
    }

    function swap() {
      if (sw_1 != sw_2) {
        var a1 = document.getElementById(sw_1);
        var b1 = document.getElementById(sw_2);
        var temp = b1.value;
        b1.value = a1.value;
        a1.value = temp;
      }
      if (theme == 'light'){
      document.getElementById('swa'+sw_1).style.color="gray";
      document.getElementById('swa'+sw_2).style.color="gray";
    }
    else{
      document.getElementById('swa'+sw_1).style.color="rgb(204, 202, 202)";
      document.getElementById('swa'+sw_2).style.color="rgb(204, 202, 202)";
    }
      sw_1 = sw_2 = 1000;
      butt = false;
      cl = false;
    }

    function send() {
        document.getElementById("hidden_val").value = id;
    }
  </script>
</body>

</html>

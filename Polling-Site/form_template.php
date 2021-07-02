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

//remove below comments after finishing dependent checks
//$username = $_SESSION["username"];
//$ref = $_POST["ref"];
$username = 'saikumarran';
$ref = '2bpv8mxi';
$cmd = "SELECT * FROM $username where ref LIKE '%$ref%'";
$data = mysqli_query($con, $cmd);
$row = mysqli_fetch_assoc($data);
$fname = $row["first_name"];
$lname = $row["last_name"];
$ques = $row["question"];
$tot_opts = $row["total_options"];
for($i = 1; $i <= $tot_opts; $i++)
{
  $options[$i]=$row["option_$i"];
  $count[$i]=$row["count_$i"];
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://kit.fontawesome.com/704ddf1c0b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="form_style.css">
    <title><?php $ques ?></title>
    <style>
      body{
          background-image: url('movie\ roll.png');
          background-repeat: no-repeat;
          background-blend-mode:multiply;
          background-color: #ffebcd25;
          background-position: center;
          background-size: 800px;
      }
      @media (min-width : 1040px){
        body{
          background-image: url('tenor.gif');
          background-attachment: fixed;
          background-repeat: no-repeat;
          background-blend-mode:lighten;
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
                  <a href="poll_home.php"><i class="fas fa-poll fa-2x"></i></a>
              </li>
              <li class="web-tag l-tag">
                Popcorn Meter
              </li>
              <li>
                  <a href="User.php"><i class="fas fa-user fa-2x"></i></a>
              </li>
              <li class="movie">
                  <a href="movie_home.php"><i class="fas fa-film fa-2x"></i></a>
              </li>
              <li class="web-tag r-tag">
                Movie center
              </li>
          </ul>
      </nav>
    <div>
      <h1 id="question"><?php echo $ques; ?></h1>
    </div>
  <section>
    <div id="options">
      <?php for($i = 1; $i <= $tot_opts; $i++)
      echo '<div class="option_'.$i.'">'.$options[$i].'</div>';
      ?>
    <div>
    </section>

    <script>

    </script>
  </body>
</html>

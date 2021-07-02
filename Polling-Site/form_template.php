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
$ref = '2guj2llk';
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
  </header>
  <section>
    <form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
    <div id="options-box">
      <?php for($i = 1; $i <= $tot_opts; $i++)
      echo '<div class="options" id="option_'.$i.'" onclick="get_vote(this.id)">'.$options[$i].'</div>';
      ?>
    <div id="button-box">
      <input id="button" name="button" type="button" value="Vote">
      <input type="hidden" name="hidden-value" id="hidden-value">
    </div>
  </form>
    </section>

    <script>
    function isOverflown(element) {
      return element.scrollHeight > element.clientHeight || element.scrollWidth > element.clientWidth;
    }
    var ques = document.getElementById('question');
    if (!isOverflown(ques))
    {
      ques.style.display = "flex";
      ques.style.alignItems = "center";
      ques.style.justifyContent = "center";
    }

    var first_click = false;
    var sel_opt = NULL;
    var butt = NULL;

    function get_vote(opt_id){
      if (!first_click){
      sel_opt = document.getElementById(opt_id);
      document.getElementById('hidden-value').value = sel_opt.id;
      sel_opt.style.borderColor = 'rgb(2, 84, 244)';
      first_click = true;
      butt = document.getElementById('button');
      butt.type = 'submit';
      butt.style.color = 'black';
      butt.style.opacity = '100%';
      butt.style.backgroundColor = 'rgb(245, 245, 245)';
      butt.style.border = 'grey 0.5px solid';
      butt.classList.add('button-style-hover');
      butt.classList.add('button-style-active');
      }
      else{
        sel_opt.style.borderColor = 'rgb(11, 174, 185)';
        if (sel_opt.id != opt_id){
        sel_opt = document.getElementById(opt_id);
        document.getElementById('hidden-value').value = sel_opt.id;
        sel_opt.style.borderColor = 'rgb(2, 84, 244)';
        }
        else{
          butt.style.color = 'grey';
          butt.style.opacity = '50%';
          butt.style.backgroundColor = 'darkgrey';
          butt.style.border = '0px';
          butt.classList.remove('button-style-hover');
          butt.classList.remove('button-style-active');
          butt.type = 'button';
          first_click = false;
        }
      }
    }

    </script>
    <?php
    if(isset($_POST['button'])){
      $upd_id = $_POST['hidden-value'];
      echo "<script>alert('Click to view results!');</script>";
    }
    ?>

  </body>
</html>

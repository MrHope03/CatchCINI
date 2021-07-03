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
$ref = '2guj2llk';
//$ref = '1to0pob5';
$cmd = "SELECT username FROM polls where ref LIKE '%$ref%'";
$data = mysqli_query($con, $cmd);
$row = mysqli_fetch_assoc($data);
$username = $row["username"];
$cmd = "SELECT * from $username where ref LIKE '%$ref%'";
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
    <link rel="stylesheet" href="pop_animate.css">
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
      echo '<div class="options" id="'.$i.'" onclick="get_vote(this.id)">'.$options[$i].'</div>';
      ?>
    <div id="button-box">
      <input id="button" name="button" type="button" value="Vote">
      <input type="hidden" name="hidden-value" id="hidden-value">
      <input type="hidden" name="check" value="true">
    </div>
    </div>
    <div id="graph-contain">
      <div id="y-legend">
          <div>100</div>
          <div>50</div>
          <div>0</div>
      </div>
    <div id="graph">
        <div id="pop_1" class="popcorn">
            <img src="popcorn.png">
            <div class="container">
                <!-- RED -->
                <div class="red box_1"></div>
                <!-- WHITE -->
                <div class="white box_1"></div>
                <!-- RED -->
                <div class="red box_1"></div>
                <!-- WHITE -->
                <div class="white box_1"></div>
                <!-- RED -->
                <div class="red box_1"></div>
            </div>
        </div>
        <div id="pop_2" class="popcorn">
            <img src="popcorn.png">
            <div class="container">
                <!-- RED -->
                <div class="black box_2"></div>
                <!-- WHITE -->
                <div class="white box_2"></div>
                <!-- RED -->
                <div class="black box_2"></div>
                <!-- WHITE -->
                <div class="white box_2"></div>
                <!-- RED -->
                <div class="black box_2"></div>
            </div>
        </div>
        <div id="pop_3" class="popcorn">
            <img src="popcorn.png">
            <div class="container">
                <!-- RED -->
                <div class="blue box_3"></div>
                <!-- WHITE -->
                <div class="white box_3"></div>
                <!-- RED -->
                <div class="blue box_3"></div>
                <!-- WHITE -->
                <div class="white box_3"></div>
                <!-- RED -->
                <div class="blue box_3"></div>
            </div>
        </div>
        <div id="pop_4" class="popcorn">
            <img src="popcorn.png">
            <div class="container">
                <!-- RED -->
                <div class="green box_4"></div>
                <!-- WHITE -->
                <div class="white box_4"></div>
                <!-- RED -->
                <div class="green box_4"></div>
                <!-- WHITE -->
                <div class="white box_4"></div>
                <!-- RED -->
                <div class="green box_4"></div>
            </div>
        </div>
        <div id="pop_5" class="popcorn">
            <img src="popcorn.png">
            <div class="container">
                <!-- RED -->
                <div class="purple box_5"></div>
                <!-- WHITE -->
                <div class="white box_5"></div>
                <!-- RED -->
                <div class="purple box_5"></div>
                <!-- WHITE -->
                <div class="white box_5"></div>
                <!-- RED -->
                <div class="purple box_5"></div>
            </div>
        </div>
        <div id="pop_6" class="popcorn">
            <img src="popcorn.png">
            <div class="container">
                <!-- RED -->
                <div class="orange box_6"></div>
                <!-- WHITE -->
                <div class="white box_6"></div>
                <!-- RED -->
                <div class="orange box_6"></div>
                <!-- WHITE -->
                <div class="white box_6"></div>
                <!-- RED -->
                <div class="orange box_6"></div>
            </div>
        </div>
    </div>
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
    var post_first_click = false;

    function get_vote(opt_id){
      if (!first_click){
      sel_opt = document.getElementById(opt_id);
      document.getElementById('hidden-value').value = "count_" + sel_opt.id;
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
      else if(!post_first_click){
        sel_opt.style.borderColor = 'rgb(11, 174, 185)';
        if (sel_opt.id != opt_id){
        sel_opt = document.getElementById(opt_id);
        document.getElementById('hidden-value').value = "count_" + sel_opt.id;
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
      $cmd = "UPDATE $username SET $upd_id = IFNULL($upd_id,0) + 1 WHERE ref LIKE '%$ref%'";
      $data = mysqli_query($con,$cmd);
      $cmd = "UPDATE polls SET $upd_id = IFNULL($upd_id,0) + 1 WHERE ref LIKE '%$ref%'";
      $data = mysqli_query($con,$cmd);
      $cmd = "UPDATE $username SET total_count = IFNULL(total_count,0) + 1 WHERE ref LIKE '%$ref%'";
      $data = mysqli_query($con,$cmd);
      $cmd = "UPDATE polls SET total_count = IFNULL(total_count,0) + 1 WHERE ref LIKE '%$ref%'";
      $data = mysqli_query($con,$cmd);
      echo "<script>alert('Click to view results!');</script>";
    }
    if (isset($_POST["check"])){
      $cmd = "SELECT * from $username where ref LIKE '%$ref%'";
      $data = mysqli_query($con, $cmd);
      $row = mysqli_fetch_assoc($data);
      echo "<script>";
      $sel_id = substr($upd_id,6);
      //echo "alert('$sel_id');";
      echo "sel_opt = document.getElementById('$sel_id');";
      echo "sel_opt.style.borderColor = 'rgb(2, 84, 244)';";
      echo "first_click = true;";
      echo "post_first_click = true;";
      echo "document.getElementById('graph-contain').style.display = 'flex';";
      echo "var graph_data = [];";
      for($i = 1; $i <= $tot_opts; $i++){
        //echo "document.getElementById('pop_$i').style.visibility = 'visible';";
        $temp = ($row['count_'.$i]/$row['total_count'])*400;
        echo "graph_data[$i] = $temp;";
        //echo "alert(graph_data[$i-1]);";
      }
      echo "var total = $tot_opts;";
      echo "var graph_w = ((total*(67 + (1.2*16*2))));";
      echo "document.getElementById('graph').style.width = graph_w+'px';";
      echo "var size = ['--size_0','--size_1','--size_2','--size_3','--size_4','--size_5','--size_6'];";
      echo "for(var i = 1; i <= total; i++)";
      echo "{document.getElementById('pop_'+i).style.visibility = 'visible';";
      echo "document.getElementById('pop_'+i).style.display = 'flex';";
      echo "var r = document.querySelector(':root');";
      echo " r.style.setProperty(size[i], graph_data[i]+'px');";
      echo "}";
      //echo "for(var i=0; i<1; i++)";
      //echo "{";
      //echo " r.style.setProperty(size[i], graph_data[i]+'px');";
      //echo "}";
      echo "</script>";
    }
    ?>
  </body>
</html>

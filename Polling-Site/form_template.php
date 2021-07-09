<?php
session_start();
if (!isset($_SESSION['theme'])){
  $_SESSION['theme'] = 'light';
}
$server = "localhost";
$user = "root";
$pass = "";
$db = "catchcini";
$con = mysqli_connect($server, $user, $pass, $db);
if (!$con) {
    echo '<script> alert("Server Down!!! Try again Later"); </script>';
}
//remove below comments after finishing dependent checks
if (isset($_SESSION["username"])){
$username = $_SESSION["username"];
}
$ref = $_GET["ref"];
$url = "form_template.php?ref=".$ref;
$global_url = "https://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
$cmd = "SELECT * FROM polls where ref LIKE '%$ref%'";
$data = mysqli_query($con, $cmd);
$row = mysqli_fetch_assoc($data);
$actual_username = $row["username"];
$question = $row["question"];
$total_options = $row["total_options"];
for($i = 1; $i <= $total_options; $i++)
{
  $options[$i]=$row["option_$i"];
  $count[$i]=$row["count_$i"];
}
if(isset($username)){
if($actual_username==$username){
  $flag = 1;
  if (isset($_POST["check"])){
    echo "<script> function onload(){";
    echo "butt = document.getElementById('button');";
    echo "butt.style.color = 'grey';";
    echo "butt.style.opacity = '50%';";
    echo "butt.style.backgroundColor = 'darkgrey';";
    echo "butt.style.border = '0px';";
    echo "butt.classList.remove('button-style-hover');";
    echo "butt.classList.remove('button-style-active');";
    echo "butt.type = 'button';";
    echo "</script>";
  }
  else{
  echo '<script> function onload(){
      butt = document.getElementById("button");
      butt.type = "submit";
      butt.value = "Results";
      butt.style.color = "black";
      butt.style.opacity = "100%";
      butt.style.backgroundColor = "rgb(245, 245, 245)";
      butt.style.border = "grey 0.5px solid";
      butt.classList.add("button-style-hover");
      butt.classList.add("button-style-active");
      }
     </script>';
   }
}
else{
  $flag = 0;
}} else {
  $flag = 0;
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://kit.fontawesome.com/704ddf1c0b.js" crossorigin="anonymous"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <link rel="stylesheet" href="<?php if($_SESSION['theme'] == 'light'){echo 'light-main-template.css';}else{echo 'dark-main-template.css';} ?>">
    <link rel="stylesheet" href="<?php if($_SESSION['theme'] == 'light'){echo 'light-form-style.css';}else{echo 'dark-form-style.css';} ?>">
    <link rel="stylesheet" href="pop_animate.css">
    <title><?php $ques ?></title>
    <style>
      @media (min-width : 1040px){
        body{
          background-image: url('tenor.gif');
          background-attachment: fixed;
          background-repeat: no-repeat;
          background-blend-mode:lighten;
          background-position: bottom right;
          background-size: 20vw;
        }
      }
<<<<<<< Updated upstream
      .container {
          display: flex;
          justify-content: space-evenly;
          margin: 0em 1em;
          opacity: 60%;
      }
=======
>>>>>>> Stashed changes
      .header{
        height: auto;
      }
    </style>
  </head>
  <body onload=onload()>
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
      <h1 id="question"><?php echo $question; ?></h1>
    </div>
    <i class="fas fa-share-alt fa-2x share" onclick="open_share();"></i>
    <div id="share-box">
      <?php
          echo "<i class='fas fa-times fa-2x' onclick='close_share()'></i>";
          echo '<h3 id="link">'.$global_url.'&nbsp;&nbsp;&nbsp;<button id="link_button" onclick="copy()"><i class="far fa-clipboard"></i> Copy </button></h3>';
      ?>
    </div>
    <br><br>
    <script>
        function open_share(){
          document.getElementById('share-box').style.display = "block";
        }
        function close_share(){
          var close = document.getElementById('share-box');
          close.style.display = "none";
        }
      </script>
  </header>
  <section>
    <form method="post" action=<?=$url?>>
    <div id="options-box">
      <?php for($i = 1; $i <= $total_options; $i++){
      if($flag){
        echo '<div class="options" id="'.$i.'">'.$options[$i].'</div>';
      } else {
        echo '<div class="options" id="'.$i.'" onclick="get_vote(this.id)">'.$options[$i].'</div>';
      } }
      ?>
    <div id="button-box">
      <input id="button" name="button" type="button" value="Vote">
      <input type="hidden" name="hidden-value" id="hidden-value">
      <input type="hidden" name="check" value="true">
    </div>
    </div>
    <div id="graph-contain">
      <div id="y-legend">
          <div class="bottom-space">100</div>
          <div class="top-space bottom-space">50</div>
          <div class="top-space">0</div>
      </div>
    <div id="graph">
        <div id="pop_1" class="popcorn tooltip">
          <span class="tooltiptext  color_1" id="tool_1"></span>
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
        <div id="pop_2" class="popcorn tooltip">
          <span class="tooltiptext color_2" id="tool_2"></span>
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
        <div id="pop_3" class="popcorn tooltip">
          <span class="tooltiptext color_3" id="tool_3"></span>
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
        <div id="pop_4" class="popcorn tooltip">
          <span class="tooltiptext color_4" id="tool_4"></span>
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
        <div id="pop_5" class="popcorn tooltip">
          <span class="tooltiptext color_5" id="tool_5"></span>
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
        <div id="pop_6" class="popcorn tooltip">
          <span class="tooltiptext color_6" id="tool_6"></span>
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
    $('.container').mouseenter(function(){
      $(this).css("opacity", "100%");
      $(this).prev().css("opacity", "100%");
      $(this).prev().prev().css("visibility","visible");
    });

    $('.container').mouseleave(function(){
      $(this).css("opacity", "80%");
      $(this).prev().css("opacity", "80%");
      $(this).prev().prev().css("visibility","hidden");
    });

    $('img').mouseenter(function(){
      $(this).css("opacity", "100%");
      $(this).next().css("opacity", "100%");
      $(this).prev().css("visibility","visible");
    });

    $('img').mouseleave(function(){
      $(this).css("opacity", "80%");
      $(this).next().css("opacity", "80%");
      $(this).prev().css("visibility","hidden");
    });

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
      sel_opt.style.backgroundColor = 'rgba(108, 228, 236,0.3)';
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
        sel_opt.style.backgroundColor = 'rgb(48,48,48)';
        sel_opt.style.borderColor = 'rgb(11, 174, 185)';
        if (sel_opt.id != opt_id){
        sel_opt = document.getElementById(opt_id);
        document.getElementById('hidden-value').value = "count_" + sel_opt.id;
        sel_opt.style.borderColor = 'rgb(2, 84, 244)';
        sel_opt.style.backgroundColor = 'rgba(108, 228, 236,0.3)';
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
    function copy() {
      let link = document.getElementById("link");
      let str = link.innerText;
      let ele = document.createElement("textarea");
      document.body.appendChild(ele);
      ele.value = str.substr(0,str.length-7);
      ele.select();
      document.execCommand("copy");
      document.body.removeChild(ele);
      document.getElementById("link_button").innerHTML = '<i class="fas fa-clipboard"></i> Copied ';
    }
    </script>
    <?php
    if(isset($_POST['hidden-value'])){
      $upd_id = $_POST['hidden-value'];
      if (!$flag){
      $cmd = "UPDATE $actual_username SET $upd_id = IFNULL($upd_id,0) + 1 WHERE ref LIKE '%$ref%'";
      $data = mysqli_query($con,$cmd);
      $cmd = "UPDATE polls SET $upd_id = IFNULL($upd_id,0) + 1 WHERE ref LIKE '%$ref%'";
      $data = mysqli_query($con,$cmd);
      $cmd = "UPDATE $actual_username SET total_count = IFNULL(total_count,0) + 1 WHERE ref LIKE '%$ref%'";
      $data = mysqli_query($con,$cmd);
      $cmd = "UPDATE polls SET total_count = IFNULL(total_count,0) + 1 WHERE ref LIKE '%$ref%'";
      $data = mysqli_query($con,$cmd);
    }
      //echo "<script>alert('Click to view results!');</script>";
    }
    if (isset($_POST["check"])){
      $cmd = "SELECT * from $actual_username where ref LIKE '%$ref%'";
      $data = mysqli_query($con, $cmd);
      $row = mysqli_fetch_assoc($data);
      echo "<script>";
      if($upd_id){$sel_id = substr($upd_id,6);
      //echo "alert('$sel_id');";
      echo "sel_opt = document.getElementById('$sel_id');";
      echo "sel_opt.style.backgroundColor = 'rgba(108, 228, 236,0.3)';";
      echo "sel_opt.style.borderColor = 'rgb(2, 84, 244)';";
      }
      echo "first_click = true;";
      echo "post_first_click = true;";
      echo "document.getElementById('button').value = 'Results';";
      echo "document.getElementById('graph-contain').style.display = 'flex';";
      echo "var graph_data = [];";
      for($i = 1; $i <= $total_options; $i++){
        echo "document.getElementById('pop_$i').style.visibility = 'visible';";
        echo "document.getElementById('$i').classList.add('color_$i');";
        if ($row['total_count']!=0){
        $temp = ($row['count_'.$i]/$row['total_count'])*400;
        echo "graph_data[$i] = $temp;";}
        else{
          echo "graph_data[$i] = 0;";
        }
        //echo "alert(graph_data[$i-1]);";
      }
      echo "$(document).ready(function(){";
      echo '$("html, body").animate({';
      echo "scrollTop: $('#graph-contain').offset().top";
      echo "}, 1000)";
      echo "});";
      echo "var total = $total_options;";
      echo "var graph_w = ((total*(67 + (1.2*16*2))));";
      echo "document.getElementById('graph').style.width = graph_w+'px';";
      echo "var size = ['--size_0','--size_1','--size_2','--size_3','--size_4','--size_5','--size_6'];";
      echo "for(var i = 1; i <= total; i++)";
      echo "{document.getElementById('pop_'+i).style.visibility = 'visible';";
      echo "document.getElementById('pop_'+i).style.display = 'flex';";
      echo "document.getElementById('tool_'+i).innerHTML = Math.round(graph_data[i]/4) + '%' + ' - ' + document.getElementById(i).innerHTML;";
      echo "var txt = document.getElementById(i).innerHTML.length;";
      echo "document.getElementById('tool_'+i).style.width = (txt+4)+'em';";
      echo "document.getElementById('tool_'+i).style.marginTop = (400-70-graph_data[i])+'px';";
      echo "var r = document.querySelector(':root');";
      echo " r.style.setProperty(size[i], (graph_data[i])+'px');";
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

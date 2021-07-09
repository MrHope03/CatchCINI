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
    $search = $_GET["search"];
    $i = 0;
    $array = array();
    while(!empty($_GET['var'.$i])){
        array_push($array,$_GET['var'.$i]);
        $i++;
    }
    if ($search == 'float'){
      if (!empty($array)){
        $cmd = "SELECT * FROM movie WHERE movie_name LIKE ";
        for ($i = 0; $i < count($array); $i++){
          $str = $array[$i];
          $cmd .= "'%$str%'";
          if ($i != (count($array) -1)){
            $cmd .= "AND movie_name LIKE";
          }
        }
        $cmd_2 = str_replace("*",'COUNT(*)',$cmd);
        $ct_info = mysqli_query($con, $cmd_2);
        $count = mysqli_fetch_row($ct_info)[0];
        if ($count > 0){
          $cmd .= " ORDER BY year DESC LIMIT 4";
          $data = mysqli_query($con, $cmd);
        } else{
            $cmd_2 = str_replace("AND","OR",$cmd_2);
            $ct_info = mysqli_query($con, $cmd_2);
            $count = mysqli_fetch_row($ct_info)[0];
            if ($count > 0){
              $cmd = str_replace("AND","OR",$cmd);
              $cmd .= " ORDER BY year DESC LIMIT 4";
              $data = mysqli_query($con,$cmd);
            } else{
              $cmd = "SELECT * FROM movie ORDER BY year DESC LIMIT 0";
              $data = mysqli_query($con, $cmd);
            }
        }
      } else{
        $cmd = "SELECT * FROM movie ORDER BY year DESC LIMIT 0";
        $data = mysqli_query($con, $cmd);
      }
    }  else if ($search == "static") {
      if (!empty($array)){
        $cmd = "SELECT * FROM movie WHERE movie_name LIKE ";
        for ($i = 0; $i < count($array); $i++){
          $str = $array[$i];
          $cmd .= "'%$str%'";
          if ($i != (count($array) -1)){
            $cmd .= "AND movie_name LIKE";
          }
        }
        $cmd_2 = str_replace("*",'COUNT(*)',$cmd);
        $ct_info = mysqli_query($con, $cmd_2);
        $count = mysqli_fetch_row($ct_info)[0];
        if ($count > 0){
          $cmd .= " ORDER BY year DESC";
          $data = mysqli_query($con, $cmd);
        } else{
            $cmd_2 = str_replace("AND","OR",$cmd_2);
            $ct_info = mysqli_query($con, $cmd_2);
            $count = mysqli_fetch_row($ct_info)[0];
            if ($count > 0){
              $cmd = str_replace("AND","OR",$cmd);
              $cmd .= " ORDER BY year DESC";
              $data = mysqli_query($con,$cmd);
            } else{
              echo "<em style='color:red;text-align:center;'>Couldn't Find your Result. Here are other results you may be interested in</em>";
              $cmd = "SELECT * FROM movie ORDER BY year DESC";
              $data = mysqli_query($con, $cmd);
            }
        }
      } else{
        $cmd = "SELECT * FROM movie ORDER BY year DESC";
        $data = mysqli_query($con, $cmd);
      }
    }
      if(isset($data)) {
        while(($row = mysqli_fetch_assoc($data))){
            if($search=="float"){
            echo '<li>';
            echo '<b id="'.$row['movie_ref'].'" onclick="redirect(this.id);">'.$row["movie_name"].'</b>';
            echo '</li>';
            } else if ($search=="static") {
                    $star = $row["star_rating"];
                    $percentage = ($star*100)/5;
                    echo  '<li class="box">';
                    echo  '<div class="item">';
                    echo  '<div class="movie-tile">';
                    echo  '<div>';
                    echo  '<img src="'.$row["home_poster"].'" height="70px">';
                    echo  '</div>';
                    echo  '<div>';
                    echo  '<h3 class="movie-heading" id="'.$row["movie_ref"].'" onclick="redirect(this.id)">'.$row["movie_name"].'</h3>';
                    echo  '</div>';
                    echo  '<div>';
                    echo  '<p>'.$row["year"].'</p>';
                    echo  '</div>';
                    echo  '<div id="star_rating" class="star-ratings-sprite">';
                    echo  '<span style="width:'.$percentage.'%" class="star-ratings-sprite-rating"></span>';
                    echo  '</div>';
                    echo  '</div>';
                    echo  '</div>';
                    echo  '</li>';
            }
        }
      }
      exit();
?>

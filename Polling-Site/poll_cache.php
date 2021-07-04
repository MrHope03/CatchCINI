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
    $i = 0;
    $array = array();
    while(!empty($_GET['var'.$i])){
        array_push($array,$_GET['var'.$i]);
        $i++;
    }
    if (!empty($array)){
      $cmd = "SELECT question,total_count FROM polls WHERE question LIKE ";
      for ($i = 0; $i < count($array); $i++){
        $str = $array[$i];
        $cmd .= "'%$str%'";
        if ($i != (count($array) -1)){
          $cmd .= "AND question LIKE";
        }
      }
      $cmd_2 = str_replace("question,total_count",'COUNT(*)',$cmd);
      $ct_info = mysqli_query($con, $cmd_2);
      $count = mysqli_fetch_row($ct_info)[0];
      if ($count > 0){
        $cmd .= " ORDER BY reg_date DESC";
        $data = mysqli_query($con, $cmd);
      }
      else{
        echo "<p style='color:red;text-align:center;'>We couldn't find your search. But Here are some matching results</p>";
          $cmd_2 = str_replace("AND","OR",$cmd_2);
          $ct_info = mysqli_query($con, $cmd_2);
          $count = mysqli_fetch_row($ct_info)[0];
          if ($count > 0){
            $cmd = str_replace("AND","OR",$cmd);
            $cmd .= " ORDER BY reg_date DESC";
            $data = mysqli_query($con,$cmd);
          }
          else{
            $cmd = "SELECT question,total_count FROM polls ORDER BY sno DESC";
            $data = mysqli_query($con, $cmd);
          }
      }
    }
    else{
      $cmd = "SELECT question,total_count FROM polls ORDER BY sno DESC";
      $data = mysqli_query($con, $cmd);
    }
      if($data) {
        while(($row = mysqli_fetch_assoc($data))){
            echo '<li class="box">';
            echo '<div class="item">'; //Add function view_poll() to redirect for individual polls
            echo '<h3 onclick="view_poll();">'.$row["question"].'</h3>';
            echo '<p> No of votes: '.$row["total_count"].'</p>';
            echo '</div>';
            echo '</li>';
        }
      }
      exit();
?>

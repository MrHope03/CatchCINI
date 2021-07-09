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
        $cmd = "SELECT question,total_count,ref FROM polls WHERE question LIKE ";
        for ($i = 0; $i < count($array); $i++){
          $str = $array[$i];
          $cmd .= "'%$str%'";
          if ($i != (count($array) -1)){
            $cmd .= "AND question LIKE";
          }
        }
        $cmd_2 = str_replace("question,total_count,ref",'COUNT(*)',$cmd);
        $ct_info = mysqli_query($con, $cmd_2);
        $count = mysqli_fetch_row($ct_info)[0];
        if ($count > 0){
          $cmd .= " ORDER BY reg_date DESC LIMIT 4";
          $data = mysqli_query($con, $cmd);
        }
        else{
            $cmd_2 = str_replace("AND","OR",$cmd_2);
            $ct_info = mysqli_query($con, $cmd_2);
            $count = mysqli_fetch_row($ct_info)[0];
            if ($count > 0){
              $cmd = str_replace("AND","OR",$cmd);
              $cmd .= " ORDER BY reg_date DESC LIMIT 4";
              $data = mysqli_query($con,$cmd);
            }
            else{
              $cmd = "SELECT question,total_count,ref FROM polls ORDER BY sno DESC LIMIT 0";
              $data = mysqli_query($con, $cmd);
            }
        }
      }
      else{
        $cmd = "SELECT question,total_count,ref FROM polls ORDER BY sno DESC LIMIT 0";
        $data = mysqli_query($con, $cmd);
      }
  }
  else if ($search == "static"){
    if (!empty($array)){
      $cmd = "SELECT question,total_count,ref FROM polls WHERE question LIKE ";
      for ($i = 0; $i < count($array); $i++){
        $str = $array[$i];
        $cmd .= "'%$str%'";
        if ($i != (count($array) -1)){
          $cmd .= "AND question LIKE";
        }
      }
      $cmd_2 = str_replace("question,total_count,ref",'COUNT(*)',$cmd);
      $ct_info = mysqli_query($con, $cmd_2);
      $count = mysqli_fetch_row($ct_info)[0];
      if ($count > 0){
        $cmd .= " ORDER BY reg_date DESC";
        $data = mysqli_query($con, $cmd);
      }
      else{
          $cmd_2 = str_replace("AND","OR",$cmd_2);
          $ct_info = mysqli_query($con, $cmd_2);
          $count = mysqli_fetch_row($ct_info)[0];
          if ($count > 0){
            $cmd = str_replace("AND","OR",$cmd);
            $cmd .= " ORDER BY reg_date DESC";
            $data = mysqli_query($con,$cmd);
          }
          else{
            echo "<em style='color:red;text-align:center;'>Couldn't Find your Result. Here are other results you may be interested in</em>";
            $cmd = "SELECT question,total_count,ref FROM polls ORDER BY sno DESC";
            $data = mysqli_query($con, $cmd);
          }
      }
    }
    else{
      $cmd = "SELECT question,total_count,ref FROM polls ORDER BY sno DESC";
      $data = mysqli_query($con, $cmd);
    }
  }
      if($data) {
        while(($row = mysqli_fetch_assoc($data))){
          if ($row["total_count"]==NULL) {$row["total_count"]=0;}
            if($search=="float"){
              echo '<li>';
              echo '<b class="wrap" id="ref'.$row['ref'].'" onclick="view_poll(this.id);">'.$row["question"].'</b>';
              echo '</li>';
            } else if ($search=="static") {
              echo '<li class="box">';
              echo '<div class="item">'; 
              echo '<h3 class="wrap" id="ref'.$row['ref'].'" onclick="view_poll(this.id);">'.$row["question"].'</h3>';
              echo '<p> No of votes: '.$row["total_count"].'</p>';
              echo '</div>';
              echo '</li>';
            }
        }
      }
      exit();
?>

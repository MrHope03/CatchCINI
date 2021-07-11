<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "catchcini";
    $con = mysqli_connect($server, $user, $pass, $db);
    if (!$con) {
        echo '<script> alert("Server Down!!! Try again Later"); </script>';
    }
    $movie_ref = $_GET["ref"];
    $cmd = "SELECT * FROM movie where movie_ref LIKE '$movie_ref'";
    $data = mysqli_query($con, $cmd);
    if(!$data){echo $con->error;}
    $row = mysqli_fetch_assoc($data);
    $movie_name = $row["movie_name"];
    $year = $row["year"];
    $star_rating = $row["star_rating"];
    $total_votes = $row["total_votes"];
    $story = $row["story"];
    $cast_01 = $row["cast_01"];
    $cast_02 = $row["cast_02"];
    $cast_03 = $row["cast_03"];
    $char_01 = $row["char_01"];
    $char_02 = $row["char_02"];
    $char_03 = $row["char_03"];
    $crew_01 = $row["crew_01"];
    $crew_02 = $row["crew_02"];
    $crew_03 = $row["crew_03"];
    $trailer = $row["trailer"];
    $main_poster = $row["main_poster"];
    $percentage = ($star_rating*100)/5;

    $search_array = array($movie_name,$cast_01,$cast_02,$cast_03,$crew_01,$crew_02,$crew_03,$char_01,$char_02,$char_03);
    $title_array = array("question","option_1","option_2","option_3","option_4","option_5","option_6");
    $sql_cmd = array();

    foreach ($search_array as $i) {
        foreach($title_array as $j){
            $sql_cmd[] = $j.' LIKE \'%'.$i.'%\'';
        }
    }

    $cmd = "SELECT * FROM polls WHERE ".implode(" OR ",$sql_cmd);
    $cmd_2 = str_replace("*",'COUNT(*)',$cmd);
    $ct_info = mysqli_query($con, $cmd_2);
    $count = mysqli_fetch_row($ct_info)[0];
    if ($count > 0){
        $cmd .= " ORDER BY total_count DESC ";
        $search_cmd = $cmd;
        $site_data = mysqli_query($con, $cmd);
        $cmd .= " LIMIT 3 ";
        $data = mysqli_query($con, $cmd); 
    } else{
          $cmd_2 = str_replace("AND","OR",$cmd_2);
          $ct_info = mysqli_query($con, $cmd_2);
          $count = mysqli_fetch_row($ct_info)[0];
          if ($count > 0){
            $cmd = str_replace("AND","OR",$cmd);
            $cmd .= " ORDER BY total_count DESC ";
            $search_cmd = $cmd;
            $site_data = mysqli_query($con, $cmd);
            $cmd .= " LIMIT 3 ";
            $data = mysqli_query($con, $cmd); 
          }
    } 
    if(isset($_GET["search"])){
        $search = $_GET["search"];
        $cmd_3 ="DROP TABLE IF EXISTS `catchcini`.`temp`";
        mysqli_query($con,$cmd_3);
        $cmd_3 = "CREATE TABLE temp($search_cmd)";
        mysqli_query($con,$cmd_3);
        $i = 0;
        $array = array();
        while(!empty($_GET['var'.$i])){
            array_push($array,$_GET['var'.$i]);
            $i++;
        }
        if ($search == 'float'){
        if (!empty($array)){
            $cmd = "SELECT question,total_count,ref FROM temp WHERE question LIKE ";
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
                $cmd = "SELECT question,total_count,ref FROM temp ORDER BY sno DESC LIMIT 0";
                $data = mysqli_query($con, $cmd);
                }
            }
        }
        else{
            $cmd = "SELECT question,total_count,ref FROM temp ORDER BY sno DESC LIMIT 0";
            $data = mysqli_query($con, $cmd);
        }
    }
    else if ($search == "static"){
        if (!empty($array)){
        $cmd = "SELECT question,total_count,ref FROM temp WHERE question LIKE ";
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
                $cmd = "SELECT question,total_count,ref FROM temp ORDER BY sno DESC";
                $data = mysqli_query($con, $cmd);
            }
        }
        }
        else{
        $cmd = "SELECT question,total_count,ref FROM temp ORDER BY sno DESC";
        $data = mysqli_query($con, $cmd);
        }
    }
        if($data) {
            while(($row = mysqli_fetch_assoc($data))){
            if ($row["total_count"]==NULL) {$row["total_count"]=0;}
                if($search=="float"){
                echo '<li>';
                echo '<b class="wrap" id="'.$row['ref'].'" onclick="view_poll(this.id);">'.$row["question"].'</b>';
                echo '</li>';
                } else if ($search=="static") {
                echo '<li class="box">';
                echo '<div class="item">'; 
                echo '<h3 class="wrap" id="'.$row['ref'].'" onclick="view_poll(this.id);">'.$row["question"].'</h3>';
                echo '<p> No of votes: '.$row["total_count"].'</p>';
                echo '</div>';
                echo '</li>';
                }
            }
        }
        exit();
    }
?>

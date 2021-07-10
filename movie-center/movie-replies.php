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

if(isset($_GET['sel_sort'])){
  $sel = $_GET['sel_sort'];
  $mov = $_GET['movie-ref'];
  if ($sel == 'r1'){
    $cond = "sno DESC";
  }
  else if ($sel == 'r2'){
    $cond = "sno";
  }
  else if ($sel == 'r3'){
    $cond = "star_rating DESC";
  }
  else {
    $cond = "star_rating";
  }
  $cmd = "SELECT * from comments WHERE movie_ref like '%$mov%' ORDER BY ".$cond;
  $data = mysqli_query($con, $cmd);
  $i = 1;
  if ($data){
    while(($row = mysqli_fetch_assoc($data))){
      echo '<div class="comment" id="comment_'.$i.'"><div class="root"><p class="username">';
      //$replies = explode(';',$row['replies']);
      $temp = $row['root'];
      //echo "<script>alert('$replies[0]');</script>";
      if ($row['username']){
        echo '<span class="user">'.$row['username'].' commented</span>';
      }
      else{
        echo '<span class="user">Anonymous commented</span>';
      }
      if ($row['star_rating']==NULL) {
        $row['star_rating'] = 0;
      }
      echo "<span class='user-star'>";
      for($j=1; $j<=$row['star_rating']; $j++){
        echo '<i class="fas fa-star fa-x" style="color: gold"></i>';
      }
      for($j=$row['star_rating']+1; $j<=5; $j++){
        echo '<i class="fas fa-star fa-x" ></i>';
      }
      echo "</span>";
      $i++;
      echo '</p>';
      echo '<p class="text">'.$temp.'</p>';
      //echo '<p class="reply-here">Reply Here</p>';
      echo '<p class="shw-rpl"><i class="fas fa-caret-down">
      <span class="sel-rpl" style="display:none">'.$row['com_ref'].
      '</span><span class="show">Show Replies</span></i><i class="fas fa-reply">
      <span class="reply-here">Reply Here</span></i></p></div></div>';
    }
  }
}

if (isset($_GET['rep_msg'])){
  $rep_msg = $_GET['rep_msg'];
  $com_ref = $_GET['comm_ref'];
  $usern = $_GET['usern'];
  $cmd = "SELECT * from comments where com_ref LIKE '%$com_ref%'";
  $data = mysqli_query($con, $cmd);
  if ($data){
    $row = mysqli_fetch_assoc($data);
    $replies = $row['replies'];
    $users = $row['replies_user'];
    $total = $row['total_replies'];
    if(!$total){
      $total = 1;
      $cmd = "UPDATE comments set replies = '$rep_msg;', replies_user = '$usern;', total_replies = $total
      where com_ref LIKE '%$com_ref%'";
      $data = mysqli_query($con, $cmd);
    }
    else{
      $users = $users.$usern.';';
      $replies = $replies.$rep_msg.';';
      $total++;
      //echo $users.$replies.$total;
      $cmd = "UPDATE comments set replies = '$replies', replies_user = '$users', total_replies = $total
      where com_ref LIKE '%$com_ref%'";
      $data = mysqli_query($con, $cmd);
    }
    $cmd = "SELECT * from comments where com_ref LIKE '%$com_ref%'";
    $data = mysqli_query($con, $cmd);
    $row = mysqli_fetch_assoc($data);
    $replies = explode(';',$row['replies']);
    $username = explode(';',$row['replies_user']);
    for($i=($total-1); $i>=0;$i--){
      echo "<div class='reply' id='reply_".$com_ref."_".($total-$i)."'>";
      echo "<p class='username'>";
      echo "<span class='user'>".$username[$i]." replied</span></p>";
      echo "<p class='text'>".$replies[$i]."</p></div>";
    }
  }
}

if(isset($_GET['new-comment'])){
  $new = $_GET['new-comment'];
  $mov = $_GET['movie-ref'];
  $username = $_GET['user'];
  $star = $_GET['star'];
  //echo "<script>alert('hi');</script>";
  $ref = base_convert(mt_rand(100000000000,208827064575),10,36);
  $cmd = "SELECT * FROM comments where com_ref LIKE '%$ref%'";
  $data = mysqli_query($con, $cmd);
  $cmd = "INSERT INTO comments (movie_ref, root, username, star_rating, com_ref) VALUES ('$mov','$new','$username','$star','$ref')";
  $data = mysqli_query($con, $cmd);
  $sel = $_GET['sel-sort'];
  if ($sel == 'r1'){
    $cond = "sno DESC";
  }
  else if ($sel == 'r2'){
    $cond = "sno";
  }
  else if ($sel == 'r3'){
    $cond = "star_rating DESC";
  }
  else {
    $cond = "star_rating";
  }
  $cmd = "SELECT * from comments WHERE movie_ref like '%$mov%' ORDER BY ".$cond;
  $data = mysqli_query($con, $cmd);
  $i = 1;
  if ($data){
    while(($row = mysqli_fetch_assoc($data))){
      echo '<div class="comment" id="comment_'.$i.'"><div class="root"><p class="username">';
    //$replies = explode(';',$row['replies']);
      $temp = $row['root'];
    //echo "<script>alert('$replies[0]');</script>";
      if ($row['username']){
        echo '<span class="user">'.$row['username'].' commented</span>';
      }
      else{
        echo '<span class="user">Anonymous commented</span>';
      }
      if ($row['star_rating']==NULL) {
        $row['star_rating'] = 0;
      }
      echo "<span class='user-star'>";
      for($j=1; $j<=$row['star_rating']; $j++){
        echo '<i class="fas fa-star fa-x" style="color: gold"></i>';
      }
      for($j=$row['star_rating']+1; $j<=5; $j++){
        echo '<i class="fas fa-star fa-x" ></i>';
      }
      echo "</span>";
      $i++;
      echo '</p>';
      echo '<p class="text">'.$temp.'</p>';
      //echo '<p class="reply-here">Reply Here</p>';
      echo '<p class="shw-rpl"><i class="fas fa-caret-down">
      <span class="sel-rpl" style="display:none">'.$row['com_ref'].
      '</span><span class="show">Show Replies</span></i><i class="fas fa-reply">
      <span class="reply-here">Reply Here</span></i></p></div></div>';
    }
  }
/*
  echo '<div class="comment" id="comment_'.$_GET['no'].'"><div class="root"><p class="username">';
  //echo "<script>alert('$replies[0]');</script>";
  if ($username){
    echo '<span class="user">'.$username.' commented</span>';
  }
  echo "<span class='user-star'>";
  for($j=1; $j<=$star; $j++){
    echo '<i class="fas fa-star fa-x" style="color: gold"></i>';
  }
  for($j=$star+1; $j<=5; $j++){
    echo '<i class="fas fa-star fa-x" ></i>';
  }
  echo "</span>";
  echo "</p>";
  echo '<p class="text">'.$new.'</p>';
  echo '<p class="shw-rpl"><i class="fas fa-caret-down"><span class="show">
  <span class="sel-rpl" style="display:none">'.$ref.
  '</span>Show Replies</span></i><i class="fas fa-reply"><span class="reply-here">Reply Here</span></i></p></div></div>';
  */
}

if(isset($_GET['com_ref'])){
  $temp = $_GET['com_ref'];
  $cmd = "SELECT * from comments where com_ref LIKE '%$temp%'";
  $data = mysqli_query($con, $cmd);
  if ($data){
    $row=mysqli_fetch_assoc($data);
    $replies = explode(';',$row['replies']);
    $username = explode(';',$row['replies_user']);
    for($i=($row['total_replies']-1); $i>=0;$i--){
      echo "<div class='reply' id='reply_".$temp."_".($row['total_replies']-$i)."'>";
      echo "<p class='username'>";
      echo "<span class='user'>".$username[$i]." replied</span></p>";
      echo "<p class='text'>".$replies[$i]."</p></div>";
    }
  }
}
exit();
 ?>

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
}

if(isset($_GET['com_ref'])){
  $temp = $_GET['com_ref'];
  $cmd = "SELECT * from comments where com_ref LIKE '%$temp%'";
  $data = mysqli_query($con, $cmd);
  if ($data){
    $row=mysqli_fetch_assoc($data);
    $replies = explode(';',$row['replies']);
    $username = explode(';',$row['replies_user']);
    for($i=0; $i<$row['total_replies'];$i++){
      echo "<div class='reply' id='reply_".$temp."_".($i+1)."'>";
      echo "<p class='username'>";
      echo "<span class='user'>".$username[$i]." replied</span></p>";
      echo "<p class='text'>".$replies[$i]."</p></div>";
    }
  }
}
exit();
 ?>

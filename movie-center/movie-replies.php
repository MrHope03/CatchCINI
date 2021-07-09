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
  $data = 1;
  while($data){
  $ref = base_convert(mt_rand(100000000000,208827064575),10,36);
  $cmd = "SELECT * FROM comments where com_ref LIKE '%$ref%'";
  $data = mysqli_query($con, $cmd);
}
  $cmd = "INSERT INTO comments (movie_ref, root, username, star_rating, com_ref) VALUES ('$mov','$new','$username','$star','$ref')";

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

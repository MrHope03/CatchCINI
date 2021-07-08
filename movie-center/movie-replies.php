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

if(isset($_GET['com_ref'])){
  $temp = $_GET['com_ref'];
  $cmd = "SELECT * from comments where com_ref LIKE '%$temp%'";
  $data = mysqli_query($con, $cmd);
  if ($data){
    $row=mysqli_fetch_assoc($data);
    $replies = explode(';',$row['replies']);
    $user = explode(';',$row['replies_user']);
    for($i=0; $i<$row['total_replies'];$i++){
      echo "<div class='reply' id='reply_".$temp."_".($i+1)."'>";
      echo "<p class='username'>";
      echo "<span class='user'>".$user[$i]." replied</span></p>";
      echo "<p class='text'>".$replies[$i]."</p></div>";
    }
  }
}
exit();
 ?>

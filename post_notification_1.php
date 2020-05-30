<?php
include('dbcon.php');
$content = $_GET['content'];
$user = $_GET['user'];
$user_id = $_GET['user_id'];
$deptt = $_GET['dept'];
$id=$user_id;
$time = strtotime("now");
date_default_timezone_set('GMT');
$temp= strtotime("+5 hours 30 minutes"); 
$date = date("Y-m-d H:i:s",$temp);
$time = strtotime($date);
$query 	= mysqli_query($conn, "SELECT user_id FROM user ORDER BY user_id DESC");
$row	= mysqli_fetch_array($query);
$end=$row['user_id'];
$a=1;
while($a<=$end)
{
$query 	= mysqli_query($conn, "SELECT dept,isadmin FROM user where user_id='$a'");
$row	= mysqli_fetch_array($query);
if($deptt == $row['dept'] && $row['isadmin']!=1)
{
    mysqli_query($conn,"INSERT INTO notification(user_id, user, content, time1,type) VALUES ('$a','$user','$content','$time','2')");
    echo "hello";
}
$a=$a+1;
header("Location:admin.php?u=$id");
}
?>
